<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use App\Models\Product; 
use App\Models\Category; 

class ProductController extends Controller
{
    public function index()
    {
        $products = Product::orderBy('id', 'desc')->get();
        return view('products.index', compact('products'));
    }
    public function detail($id) {
       
        $product = Product::findOrFail($id);
        $relatedProducts = Product::where('category_id', $product->category_id)
                                  ->where('id', '!=', $product->id)
                                  ->limit(4)
                                  ->get();

        return view('products.detail', compact('product', 'relatedProducts'));
    }
    
   
    public function search(Request $request)
    {
        $keyword = $request->input('keyword');

        $products = Product::where('title', 'like', "%$keyword%")
            ->orWhere('description', 'like', "%$keyword%")
            ->orWhere('detail', 'like', "%$keyword%")
            ->orderby('id', 'desc')
            ->get();
        
        return view('products.index', compact('products'));
    }
    public function create()
    {   $products = Product::all();
        $categories = Category::all();
        return view('products.create', compact('categories','products')); 
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif',
            'description' => 'required',
            'detail' => 'required',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.max' => 'Tiêu đề không được vượt quá :max ký tự.',
            'image.required' => 'Hình ảnh là bắt buộc.',
            'image.image' => 'Tệp phải là ảnh.',
          
          
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
    
        Product::create([
            'title' => $request->title,
            'image' => $imageName,
            'description' => $request->description,
            'detail' => $request->detail,
            'price' => $request->price,
            'category_id' => $request->category_id
        ]);
    
        return redirect()->route('products.index')->with('success', 'Thêm sản phẩm thành công.');
    }
    
    public function show($id)
    {
        $product = Product::findOrFail($id);
        return view('products.show', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'image|mimes:jpeg,png,jpg,gif',
            'description' => 'required',
            'detail' => 'required',
            'category_id' => 'required|exists:categories,id',
        ], [
            'title.required' => 'Tiêu đề là bắt buộc.',
            'title.max' => 'Tiêu đề không được vượt quá :max ký tự.',
            'image.image' => 'Tệp phải là ảnh.',
            'image.mimes' => 'Chỉ chấp nhận các định dạng ảnh: jpeg, png, jpg, gif.',
          
            'description.required' => 'Mô tả là bắt buộc.',
            'detail.required' => 'Nội dung chi tiết là bắt buộc.',
            'category_id.required' => 'Danh mục là bắt buộc.',
            'category_id.exists' => 'Danh mục không hợp lệ.',
        ]);

        $product = Product::findOrFail($id);
        $product->title = $request->input('title');
        $product->description = $request->input('description');
        $product->detail = $request->input('detail');
        $product->category_id = $request->input('category_id');

        if ($request->hasFile('image')) {
            if ($product->image) {
                Storage::delete('public/uploads/' . $product->image);
            }
            
            $imagePath = $request->file('image')->store('public/uploads');
            $product->image = basename($imagePath);
        }

        $product->save();

        return redirect()->route('products.index')->with('success', 'Cập nhật sản phẩm thành công');
    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);

        if ($product->image) {
            Storage::delete('public/uploads/' . $product->image);
        }

        $product->delete();

        return redirect()->route('products.index')->with('success', 'Xóa sản phẩm thành công');
    }

    
}
