<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('categories.index', compact('categories'));
    }

    public function create()
    {
        return view('categories.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            
        ]);

        Category::create($request->all());

        return redirect()->route('categories.index')->with('success', 'Thêm danh mục thành công.');
    }

    public function show(Category $category)
    {
        return view('categories.show', compact('category'));
    }

    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('categories.edit', compact('category'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        return redirect()->route('categories.index')->with('success', 'Cập nhật sản phẩm thành công .');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        Product::where('category_id', $id)->update(['category_id' => 0]);
        $category->delete();
    
        return redirect()->route('categories.index')->with('success', 'Xóa danh mục thành công ');
    }
   
}
