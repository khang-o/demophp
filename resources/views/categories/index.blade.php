@extends('layout-admin')
@section('title','Dashboard')
@section('content-admin')



   
    <div class="container">
      <a href="{{ route('categories.create') }}" class="btn btn-success float-end mt-3"> Thêm danh mục</a>
        <h2 class="my-3">Danh Mục</h2>
        <table class="table text-center align-middle">
            <thead>  
            <tr>
                
                <th>Tên danh mục</th>             
                <th class="text-end">Hành động</th>
            </tr>
            </thead>
            <tbody>
                @foreach($categories as $category)
  
                <tr>
                    <td class="text-start">{{ $category->name }}</a></td>
                    <td class="text-end">
                      <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning">Sửa</a>
                      <a href="{{ route('categories.show', $category->id) }}" class="btn btn-info btn-sm">Xem</a>
                      <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                      <button class="btn btn-danger" type="submit">Delete</button>
                    </form>
                    </td>
  
                </tr>
                @endforeach
  
            </tbody>
        </table>
  </div>
   
@endsection
