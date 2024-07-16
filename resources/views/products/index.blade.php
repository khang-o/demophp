@extends('layout-admin')
@section('title', 'Danh sách sản phẩm')
@section('content-admin')
<div class="container">
    <h3 class="my-4">Danh sách sản phẩm</h3>
    <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Thêm sản phẩm mới</a>
    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
    
    <form action="{{ route('products.search') }}" method="POST" class="mb-3">
        @csrf
        <div class="input-group">
            <input type="text" name="keyword" class="form-control" placeholder="Nhập từ khóa tìm kiếm" value="{{ old('keyword', request('keyword')) }}">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="submit">Tìm kiếm</button>
            </div>
        </div>
    </form>
    <form action="{{route('products.search')}}" method="POST">
        @csrf
        <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm" value="{{ old('keyword')
        }}">
        <button type="submit">Tìm kiếm</button>
        </form>
    @if ($products->isEmpty())
        <p>Không có sản phẩm nào</p>
    @else
        <table class="table table-striped table-hover">
            <thead>
                <tr>
                    <th>Hình ảnh</th>
                    <th>Tên sản phẩm</th>
                    <th>Danh mục</th>
                    <th>Hành động</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($products as $product)
                    <tr>
                        <td>
                            @if (Str::startsWith($product->image, 'http'))
                                <img src="{{ asset('storage/uploads/' . $product->image) }}" class="img-thumbnail" style="max-width: 100px;">
                            @else
                                <img src="{{ asset('storage/uploads/' . $product->image) }}" class="img-thumbnail" style="max-width: 100px;">
                            @endif
                        </td>
                        <td>{{ $product->title }}</td>
                        <td>{{ $product->category->name }}</td>
                        <td>
                            <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">Xem</a>
                            <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">Sửa</a>
                            <form action="{{ route('products.destroy', $product->id) }}" method="POST" style="display:inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn xóa sản phẩm này?')">Xóa</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @endif
</div>
<script>
   var imgInp = document.querySelector('[name="image"]')
    imgInp.onchange = evt => {
        const [file] = imgInp.files
        if (file) {
            var blah = document.querySelector('[name="image"]+div img');
            blah.src = URL.createObjectURL(file)
        }
    }
</script>
@endsection
