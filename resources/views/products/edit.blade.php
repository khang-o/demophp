@extends('layout-admin')
@section('title', 'Sửa sản phẩm')
@section('head')
{{-- sử dụng summernote editor --}}
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.css" rel="stylesheet">
@endsection
@section('content-admin')
<div class="container">
    <h3 class="my-4">Sửa sản phẩm</h3>
    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    <form method="POST" action="{{ route('products.update', $product->id) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="title">Tên sản phẩm:</label>
            <input type="text" class="form-control" id="title" name="title" value="{{ $product->title }}">
            @error('title')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="image">Hình ảnh:</label>
            <input type="file" class="form-control-file" id="image" name="image">
            @if (Str::startsWith($product->image, 'http'))
            <img src="{{ $product->image }}"  class="img-thumbnail mt-2" style="max-width: 100px;">
            @else
            <img src="{{ asset('public/uploads/' . $product->image) }}"  class="img-thumbnail mt-2" style="max-width: 100px;">
            @endif
        </div>
        <div class="form-group">
            <label for="description">Mô tả:</label>
            <textarea class="form-control" id="description" name="description">{{ $product->description }}</textarea>
            @error('description')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="detail">Chi tiết:</label>
            <textarea class="form-control summernote" id="detail" name="detail">{{ $product->detail }}</textarea>
            @error('detail')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="form-group">
            <label for="category_id">Danh mục:</label>
            <select class="form-control" id="category_id" name="category_id">
                @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ $product->category_id == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                @endforeach
            </select>
            @error('category_id')
            <div class="text-danger">{{ $message }}</div>
            @enderror
        </div>
        <button type="submit" class="btn btn-primary mt-3">Cập nhật sản phẩm</button>
    </form>
    <a href="{{ route('products.index') }}" class="btn btn-secondary mt-3">Quay lại danh sách</a>
</div>
<
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.18/summernote-bs4.min.js"></script>
<script>
$(document).ready(function() {
    $('.summernote').summernote({
        height: 300
    });
});
</script>
@endsection
