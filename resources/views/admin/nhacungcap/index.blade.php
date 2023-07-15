@extends('admin.layout')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-inline">
              <h1 class="float-left card-title">Thông tin nhà cung cấp</h1>
              <a href="{{ route('nhacungcap.create') }}" class="float-right btn btn-info">Thêm <i class="ml-2 fa fa-plus"></i> </a>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Mã nhà cung cấp</th>
                  <th>Tên nhà cung cấp</th>
                  <th>Địa chỉ</th>
                  <th>Email</th>
                  <th>Số điện thoại</th>                 
                  
                  <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($ncc as $item)
                <tr>
                   
                    <td>{{ $item ->  id}}</td>
                    <td>{{ $item ->  HoTen}}</td>                   
                    <td>{{ $item ->  DiaChi}}</td>
                    <td>{{ $item ->  Email}}</td>
                    
                    <td>{{ $item ->  DienThoai}}</td>
                    <td> <div class="d-flex">
                      <a  href="{{ route('nhacungcap.edit',['id'=>$item->id]) }}" class="btn btn-success mr-1">Sửa</a>
                      <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('nhacungcap.destroy',["id"=>$item->id]) }}" class="btn btn-danger">xóa</a>
                      </div></td>
                    @endforeach
                  
                </tr>
              
                </tbody>
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        
      </section>
  
      <!-- Main content -->
      <section class="content">
      </section>
      <!-- /.content -->
    </section>

@endsection