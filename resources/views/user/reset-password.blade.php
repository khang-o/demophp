@extends('layout')
@section('title','Register')
@section('content')



<form action="{{route('new_password')}}" method="post">
    @csrf
    <div class="container">
      <h1>Tạo mật Khẩu mới</h1>
      <hr>
          <label for="token"><b>token</b></label>
          @error('token')
                  <div style="color:red">{{ $message }}</div>
          @enderror
          <input type="text" placeholder="Enter token" name="token" id="token" required>
        
        <label for="psw"><b> Password</b></label>
          @error('psw')
                  <div style="color:red">{{ $message }}</div>
          @enderror
          <input type="password" placeholder="Enter Password" name="psw" id="psw" required>
  
          <label for="psw_confirmation"><b>Repeat Password</b></label>
          @error('psw_confirmation')
                  <div style="color:red">{{ $message }}</div>
          @enderror
          <input type="password" placeholder="Repeat Password" name="psw_confirmation" id="psw_confirmation" required>
      <hr>
      <button type="submit" class="registerbtn">Save</button>
    </div>
    <div class="container signin">
  
    </div>
  </form>
@endsection