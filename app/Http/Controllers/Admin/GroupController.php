<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\GroupRequest;
use App\Models\Group;
use App\Models\Module;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Throwable;
use Illuminate\Support\Facades\Log;

class GroupController extends Controller
{
    public function index(Request $request){
        $query = Group::with('admins'); // Eager load users relationship
        
        // Search by name
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%');
        }
        
        // Paginate results
        $groups = $query->orderBy('id', 'desc')->paginate(10);

        return view('admin.groups.list', compact('groups'));
    }

    public function create(){
        return view('admin.groups.create');
    }

    public function store(GroupRequest $request){
        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name',
        ], [
            'name.required' => 'Tên nhóm không được để trống',
            'name.unique' => 'Tên nhóm đã tồn tại',
        ]);

        DB::beginTransaction();
        try {
            Group::create($request->all());
            DB::commit();
            return redirect()->route('group.index')->with('success', 'Thêm nhóm thành công!');
        } catch (Throwable $e) {
            DB::rollback();
            Log::error('Error creating group: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi thêm nhóm')->withInput();
        }
    }

    public function edit(Group $group){
        return view('admin.groups.edit', compact('group'));
    }

    public function update(GroupRequest $request, Group $group){
        $request->validate([
            'name' => 'required|string|max:255|unique:groups,name,' . $group->id,
        ], [
            'name.required' => 'Tên nhóm không được để trống',
            'name.unique' => 'Tên nhóm đã tồn tại',
        ]);

        DB::beginTransaction();
        try {
            $group->update($request->all());
            DB::commit();
            return redirect()->route('group.index')->with('success', 'Cập nhật thông tin nhóm thành công!');
        } catch (Throwable $e) {
            DB::rollback();
            Log::error('Error updating group: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi cập nhật nhóm')->withInput();
        }
    }

    public function destroy(Request $request){
        try {
            $group = Group::find($request->input('group_id'));
            
            if (!$group) {
                return response()->json([
                    'success' => false,
                    'error' => 'Không tìm thấy nhóm'
                ], 404);
            }
            
            // Check if group has users
            if ($group->users && $group->users->count() > 0) {
                return response()->json([
                    'success' => false,
                    'error' => 'Không thể xóa nhóm đã có thành viên. Vui lòng chuyển thành viên sang nhóm khác trước.'
                ], 400);
            }
            
            $group->delete();
            
            return response()->json([
                'success' => true,
                'message' => 'Xóa nhóm thành công!'
            ]);
        } catch (\Exception $e) {
            Log::error('Error deleting group: ' . $e->getMessage());
            return response()->json([
                'success' => false,
                'error' => 'Có lỗi xảy ra khi xóa nhóm'
            ], 500);
        }
    }

    public function permission(Group $group){
        $modules = Module::all();
        $roles = [
            'view' => 'Xem',
            'add' => 'Thêm',
            'edit' => 'Sửa',
            'delete' => 'Xóa',
            'active' => 'Kích hoạt'
        ];
        $roleArr = [];

        if($group->permissions){
            $roleJson = $group->permissions;

            if(!empty($roleJson)){
                $roleArr = json_decode($roleJson);
            }else{
                $rolesArr = [];
            }
        }
        
        
    
        return view('admin.groups.permission', compact('group', 'modules', 'roles', 'roleArr'));
    }

    public function store_permission(Request $request, Group $group){
        if(!empty($request->role)){
            $roles = $request->role;
        }else{
            $roles = [];
        }
        $roleJson = json_encode($roles);

        $group->permissions = $roleJson;
        $group->save();

        return redirect()->route('group.index')->with('success', 'Phân quyền thành công !');
    }   
}
