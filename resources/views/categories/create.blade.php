@extends('layout-admin')
@section('title','Dashboard')
@section('content-admin')
   
<div class="container">
    <div class="row">
        <h1>Thêm danh mục</h1>
        @if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
        <div class="col-sm-12">
            <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div>
                    <label for="name" class="form-label">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" required>
                </div>
               
                <button type="submit" class="btn btn-primary mt-3">Create</button>
            </form>
        </div>
    </div>
</div>
@endsection
