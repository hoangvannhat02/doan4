@extends('admin.layout')
@section('content')
<div class="container">
    <h1>Chi tiết người dùng</h1>
    <div class="row">
      <div class="col-md-4">
        <img src="{{ $nd->Anh }}" alt="User Avatar" class="user-avatar">
      </div>
      <div class="col-md-8">
        <h2>{{ $nd->HoTen }}</h2>
        <p class="lead">Email: {{ $nd->email }}</p>
        <p>Role: Nhân viên</p>
        <a  href="{{ route('nguoidung.edit',['id'=>$nd->id]) }}" class="btn btn-primary">Sửa</a>
        <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('nguoidung.destroy',["id"=>$nd->id]) }}" class="btn btn-danger">Xóa</a>
      </div>
    </div>
    <div class="row user-info">
      <div class="col-md-12">
        <h4>Thông tin người dùng</h4>
        <ul>
         
          <li>Full Name: {{ $nd->name }}</li>
          <li>Address: {{ $nd->Address }}</li>
          <li>Phone: {{ $nd ->Phone }}</li>         
          <li>PassWord: {{ $nd->password }}</li>
          <!-- Add more user information here -->
        </ul>
      </div>
    </div>
  </div>
@endsection