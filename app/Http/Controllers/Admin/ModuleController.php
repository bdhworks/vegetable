<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class ModuleController extends Controller
{
    public function index(Request $request){
        $query = Module::query();
        
        // Search by name
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        
        // Paginate results
        $modules = $query->orderBy('id', 'desc')->paginate(10);
        
        return view('admin.module.list', compact('modules'));
    }

    public function create(){
        return view('admin.module.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:modules,name',
            'title' => 'required|string|max:255',
        ], [
            'name.required' => 'Tên module không được để trống',
            'name.unique' => 'Tên module đã tồn tại',
            'title.required' => 'Tiêu đề không được để trống',
        ]);

        DB::beginTransaction();
        try {
            Module::create([
                'name' => $request->name,
                'title' => $request->title,
            ]);
            
            DB::commit();
            return redirect()->route('module.index')->with('success', 'Thêm module thành công!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error creating module: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm module')->withInput();
        }
    }

    public function edit($id){
        $module = Module::findOrFail($id);
        return view('admin.module.edit', compact('module'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|string|max:255|unique:modules,name,' . $id,
            'title' => 'required|string|max:255',
        ], [
            'name.required' => 'Tên module không được để trống',
            'name.unique' => 'Tên module đã tồn tại',
            'title.required' => 'Tiêu đề không được để trống',
        ]);

        DB::beginTransaction();
        try {
            $module = Module::findOrFail($id);
            $module->update([
                'name' => $request->name,
                'title' => $request->title,
            ]);
            
            DB::commit();
            return redirect()->route('module.index')->with('success', 'Cập nhật module thành công!');
        } catch (\Exception $e) {
            DB::rollback();
            Log::error('Error updating module: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật module')->withInput();
        }
    }

    public function destroy(Request $request){
        try {
            $module = Module::find($request->input('module_id'));
            
            if (!$module) {
                return response()->json([
                    'success' => false,
                    'error' => 'Không tìm thấy module'
                ], 404);
            }
            
            $module->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Xóa module thành công!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting module: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Có lỗi xảy ra khi xóa module'
            ], 500);
        }
    }
}
