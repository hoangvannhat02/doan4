@extends('admin.layout')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-inline">
              <h1 class="float-left card-title">Thông tin sản phẩm</h1>
              <a href="{{ route('create') }}" class="float-right btn btn-info">Thêm <i class="ml-2 fa fa-plus"></i> </a>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Mã sản phẩm</th>
                  <th>Tên sản phẩm</th>
                  <th>Ảnh</th>
                  <th>chiTietSanPham</th>
                  <th>Mô tả</th>                 
                  <th>Mã loại</th>
                  <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sanpham as $sp)
                <tr>
                   
                    <td>{{ $sp ->  id}}</td>
                    <td>{{ $sp ->  TenSanPham}}</td>
                    <td><img src="{{ $sp ->Anh }}" style="width:100px;" alt=""></td>
                    <td>{{ $sp ->  ChiTietSanPham}}</td>
                    <td>{!! strip_tags($sp ->  MoTa) !!}</td>               
                    <td>{{ $sp ->  MaLoai}}</td>
                    <td> <div class="d-flex">
                      <a  href="{{ route('edit',['id'=>$sp->id]) }}" class="btn btn-success mr-1">Sửa</a>
                      <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('destroy',["id"=>$sp->id]) }}" class="btn btn-danger">xóa</a>
                      </div></td>
                </tr>
                @endforeach
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