@extends('layout-admin')
@section('title', 'Edit Category')
@section('content-admin')
<div class="container">
    <div class="row">
        <div class="col-lg-8">
            <h1>Edit Category</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="{{ route('categories.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="name">Name:</label>
                    <input class="form-control" type="text" id="name" name="name" value="{{ $category->name }}" required>
                    {{-- <div class="text-danger">{{ $message }}</div> --}}
                </div>
                <button type="submit" class="btn btn-outline-success mt-4">Update</button>
            </form>
        </div>
    </div>
</div>
@endsection
