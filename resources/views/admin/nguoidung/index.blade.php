@extends('admin.layout')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-inline">
              <h1 class="float-left card-title">Thông tin người dùng</h1>
              <a href="{{ route('nguoidung.create') }}" class="float-right btn btn-info">Thêm <i class="ml-2 fa fa-plus"></i> </a>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Mã người dùng</th>
                    <th>
                      Ảnh
                    </th>
                  <th>Tên người dùng </th>

                  <th>Địa chỉ</th>                
                  <th>Trạng thái</th>
                  <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($nd as $item)
                <tr>                  
                    <td>{{ $item ->  id}}</td>
                    <td><img src="{{ $item ->Anh }}" style="width:100px;" alt=""></td>
                    <td>{{ $item ->  name}}</td>                   
                    <td>{{ $item ->  Address}}</td>                               
                    <td>@if($item->TrangThai)
                            <p style="color: green">Hoạt động</p>
                        @else
                        <p style="color: red">Không hoạt động</p>
                        @endif
                    </td>
                    <td> <div class="d-flex">
                      <a href="{{ route("nguoidung.detail",['id'=>$item->id]) }}" class="btn btn-primary mr-1">
                          <i class="fa fa-eye"></i>
                      </a>
                      <a  href="{{ route('nguoidung.edit',['id'=>$item->id]) }}" class="btn btn-success mr-1"><i class="fa fa-pen"></i></a>
                      <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('nguoidung.destroy',["id"=>$item->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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