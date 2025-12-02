<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\DiscountRequest;
use App\Models\Discount;
use App\Models\Product;
use App\Models\DiscountCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;
use Throwable;

class DiscountController extends Controller
{
    public function index(Request $request){
        $query = Discount::query();
        
        // Search by name or code
        if ($request->has('name') && $request->name != '') {
            $query->where('name', 'like', '%' . $request->name . '%')
                  ->orWhere('code', 'like', '%' . $request->name . '%');
        }
        
        // Paginate results
        $discounts = $query->orderBy('id', 'desc')->paginate(10);

        // json file search
        $productList = Product::all();
        $path = public_path().'/json/';
        if(!is_dir($path)){
            mkdir($path, 0777, true);
        }
        File::put($path.'products.json', json_encode($productList));

        return view('admin.discount.list', compact('discounts'));
    }

    public function create(){
        $codes = DiscountCode::all();

        return view('admin.discount.create', compact('codes'));
    }

    public function store(DiscountRequest $request){
        $data = $request->all();
        DB::beginTransaction();
        try {
            Discount::create($data);
            DB::commit();
            return redirect()->route('discount.index')->with('success', 'Thêm mã giảm giá thành công !');
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function edit(Discount $discount){
        return view('admin.discount.edit', compact('discount'));
    }

    public function update(DiscountRequest $request ,Discount $discount){
        $data = $request->all();

        DB::beginTransaction();
        try {
            $discount->update($data);

            DB::commit();
            return redirect()->route('discount.index')->with('success', 'Cập nhật thông tin mã giảm giá thành công !');
        } catch (Throwable $e) {
            DB::rollback();
            throw $e;
        }
    }

    public function destroy(Request $request){

        try {
            $discount = Discount::find($request->input('discount_id'));

            if ($discount) {
                $discount->delete();
                return response()->json(['success' => true]);
            } else {
                return response()->json(['error' => 'Không có dữ liệu mã giảm giá'], 404);
            }
        } catch (\Exception $e) {
            Log::error('Error deleting group: ' . $e->getMessage());
            return response()->json(['error' => 'An error occurred'], 500);
        }
    }

    public function hidden($id){
        Discount::where('id', $id)->update(['status' => '1']);
        return redirect()->route('discount.index')->with('success', 'Hiện mã giảm giá thành công !');
    }

    public function active($id){
        Discount::where('id', $id)->update(['status' => '0']);
        return redirect()->route('discount.index')->with('success', 'Ẩn mã giảm giá thành công !');
    }

}
