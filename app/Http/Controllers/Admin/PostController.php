<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\CategoryPost;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Throwable;

class PostController extends Controller
{
    public function index(Request $request){
        $query = Post::with('categoryPost'); // Eager load category
        
        // Search by name
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        
        // Filter by category
        if ($request->has('category') && $request->category != '') {
            $query->where('categoryPost_id', $request->category);
        }
        
        // Filter by status
        if ($request->has('status') && $request->status !== '') {
            $query->where('status', $request->status);
        }
        
        // Paginate results
        $posts = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.post.list', compact('posts'));
    }

    public function show($id){
        $post = Post::with('categoryPost')->find($id);
        return view('admin.post.show', compact('post'));
    }

    public function create(){
        $categoryPosts = CategoryPost::where('status', 1)->orderBy('name')->get();
        return view('admin.post.create', compact('categoryPosts'));
    }

    public function store(PostRequest $request){
        DB::beginTransaction();
        try {
            $data = $request->all();
            
            // Handle image upload
            if ($request->hasFile('image')) {
                $data['image'] = $this->saveImage($request->file('image'));
            }

            Post::create($data);

            DB::commit();
            return redirect()->route('post.index')->with('success', 'Thêm bài viết thành công!');
        } catch (Throwable $e) {
            DB::rollback();
            Log::error('Error creating post: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm bài viết')->withInput();
        }
    }

    public function edit(Post $post){
        $categoryPosts = CategoryPost::where('status', 1)->orderBy('name')->get();
        return view('admin.post.edit', compact('post', 'categoryPosts'));
    }

    public function update(Request $request, Post $post){
        $request->validate([
            'name' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'title' => 'required|string',
            'content' => 'required|string',
            'categoryPost_id' => 'required|exists:category_posts,id',
            'status' => 'required|in:0,1',
            'desc' => 'required|string',
        ], [
            'name.required' => 'Tên bài viết không được để trống',
            'title.required' => 'Tiêu đề không được để trống',
            'content.required' => 'Nội dung không được để trống',
            'categoryPost_id.required' => 'Vui lòng chọn danh mục',
            'categoryPost_id.exists' => 'Danh mục không tồn tại',
            'desc.required' => 'Mô tả không được để trống',
            'image.image' => 'File phải là hình ảnh',
            'image.max' => 'Kích thước ảnh tối đa 2MB',
        ]);

        DB::beginTransaction();
        try {
            $data = $request->all();
            
            // Handle image upload
            if ($request->hasFile('image')) {
                // Delete old image if exists
                if ($post->image && Storage::disk('public')->exists($post->image)) {
                    Storage::disk('public')->delete($post->image);
                }
                $data['image'] = $this->saveImage($request->file('image'));
            }

            $post->update($data);

            DB::commit();
            return redirect()->route('post.index')->with('success', 'Cập nhật bài viết thành công!');
        } catch (Throwable $e) {
            DB::rollback();
            Log::error('Error updating post: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật bài viết')->withInput();
        }
    }

    public function destroy(Request $request){
        try {
            $post = Post::find($request->input('post_id'));

            if (!$post) {
                return response()->json([
                    'success' => false,
                    'error' => 'Không tìm thấy bài viết'
                ], 404);
            }
            
            // Delete image if exists
            if ($post->image && Storage::disk('public')->exists($post->image)) {
                Storage::disk('public')->delete($post->image);
            }
            
            $post->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Xóa bài viết thành công!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting post: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Có lỗi xảy ra khi xóa bài viết'
            ], 500);
        }
    }

    protected function saveImage($image){
        $imageName = $image->hashName();
        $path = $image->storeAs('posts', $imageName, 'public');
        return $path;
    }

    public function active($id){
        try {
            $post = Post::findOrFail($id);
            $post->status = 1; // Set to hidden
            $post->save();
            
            return redirect()->route('post.index')->with('success', 'Đã ẩn bài viết thành công!');
        } catch (\Exception $e) {
            Log::error('Error hiding post: ' . $e->getMessage());
            return redirect()->route('post.index')->with('error', 'Có lỗi xảy ra khi ẩn bài viết');
        }
    }

    public function hidden($id){
        try {
            $post = Post::findOrFail($id);
            $post->status = 0; // Set to visible
            $post->save();
            
            return redirect()->route('post.index')->with('success', 'Đã hiển thị bài viết thành công!');
        } catch (\Exception $e) {
            Log::error('Error showing post: ' . $e->getMessage());
            return redirect()->route('post.index')->with('error', 'Có lỗi xảy ra khi hiển thị bài viết');
        }
    }
}
