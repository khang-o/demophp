<?php
namespace App\Http\Controllers;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductApiController extends Controller
{
    public function index()
    {
        try {
            $products = Product::all();
            return response()->json([
                'status' => 'success',
                'message' => 'Dữ liệu được lấy thành công',
                'data' => ProductResource::collection($products),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
                'description' => 'required',
                'detail' => 'required',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
            ], [
                'title.required' => 'Tiêu đề là bắt buộc.',
                'title.max' => 'Tiêu đề không được vượt quá :max ký tự.',
                'image.required' => 'Hình ảnh là bắt buộc.',
                'image.image' => 'Tệp phải là ảnh.',
                'image.mimes' => 'Chỉ chấp nhận các định dạng ảnh: jpeg, png, jpg, gif.',
                'image.max' => 'Kích thước ảnh không được vượt quá :max KB.',
                'description.required' => 'Mô tả là bắt buộc.',
                'detail.required' => 'Nội dung chi tiết là bắt buộc.',
                'price.required' => 'Giá là bắt buộc.',
                'price.numeric' => 'Giá phải là một số.',
                'price.min' => 'Giá không được nhỏ hơn :min.',
                'category_id.required' => 'Danh mục là bắt buộc.',
                'category_id.exists' => 'Danh mục không hợp lệ.',
            ]);

            $imagePath = $request->file('image')->store('public/uploads');
            $imageName = basename($imagePath);

            $product = Product::create([
                'title' => $request->title,
                'image' => $imageName,
                'description' => $request->description,
                'detail' => $request->detail,
                'price' => $request->price,
                'category_id' => $request->category_id
            ]);

            return response()->json([
                'status' => 'success',
                'message' => 'Thêm sản phẩm thành công',
                'data' => new ProductResource($product),
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 400);
        }
    }

    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json([
                'status' => 'success',
                'message' => 'Lấy dữ liệu thành công',
                'data' => new ProductResource($product),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 400);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            $validatedData = $request->validate([
                'title' => 'required|max:255',
                'image' => 'image',
                'description' => 'required',
                'detail' => 'required',
                'price' => 'required|numeric|min:0',
                'category_id' => 'required|exists:categories,id',
            ], [
                'title.required' => 'Tiêu đề là bắt buộc.',
                'title.max' => 'Tiêu đề không được vượt quá :max ký tự.',
                'image.image' => 'Tệp phải là ảnh.',
             
                'description.required' => 'Mô tả là bắt buộc.',
                'detail.required' => 'Nội dung chi tiết là bắt buộc.',
                'price.required' => 'Giá là bắt buộc.',
                'price.numeric' => 'Giá phải là một số.',
                'price.min' => 'Giá không được nhỏ hơn :min.',
                'category_id.required' => 'Danh mục là bắt buộc.',
                'category_id.exists' => 'Danh mục không hợp lệ.',
            ]);

            $product = Product::findOrFail($id);

            $product->title = $request->input('title');
            $product->description = $request->input('description');
            $product->detail = $request->input('detail');
            $product->price = $request->input('price');
            $product->category_id = $request->input('category_id');

            if ($request->hasFile('image')) {
                if ($product->image) {
                    Storage::delete('public/uploads/' . $product->image);
                }

                $imagePath = $request->file('image')->store('public/uploads');
                $product->image = basename($imagePath);
            }

            $product->save();

            return response()->json([
                'status' => 'success',
                'message' => 'Cập nhật sản phẩm thành công',
                'data' => new ProductResource($product),
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }

    public function destroy($id)
    {
        try {
            $product = Product::findOrFail($id);

            if ($product->image) {
                Storage::delete('public/uploads/' . $product->image);
            }

            $product->delete();

            return response()->json([
                'status' => 'success',
                'message' => 'Xóa sản phẩm thành công',
                'data' => null,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'fail',
                'message' => $e->getMessage(),
                'data' => null,
            ], 500);
        }
    }
}
