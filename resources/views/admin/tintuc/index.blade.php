@extends('admin.layout')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-inline">
              <h1 class="float-left card-title">Thông tin tin tức</h1>
              <a href="{{ route('tintuc.create') }}" class="float-right btn btn-info">Thêm <i class="ml-2 fa fa-plus"></i> </a>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Mã tin tức</th>
                  <th>Tiêu đề</th>
                  <th>Ảnh</th>
                  <th>Ngày tạo</th>
                  <th>Nội dung</th>                 
                  <th>Người tạo</th>
                  <th>Trạng thái</th>
                  <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($tintuc as $item)
                <tr>
                   
                    <td>{{ $item ->  id}}</td>
                    <td>{{ $item ->  TieuDe}}</td>                   
                 
                    <td><img src="{{ $item ->  Anh }}" style="width:100px;" alt=""></td>
                    <td>{{ $item ->  NgayTao}}</td>
                  
                    <td>{!! strip_tags($item ->  NoiDung) !!}</td>
                    <td>{{ $item ->  HoTen}}</td>
                    <td>
                      @if($item->TrangThai)
                          <p style="color: green">Hoạt động</p>
                      @else
                        <p style="color: red">Không hoạt động</p>
                      @endif
                    </td>
                    

                    <td> <div class="d-flex">
                      <a  href="{{ route('tintuc.edit',['id'=>$item->id]) }}" class="btn btn-success mr-1">Sửa</a>
                      <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('tintuc.destroy',['id'=>$item->id]) }}" class="btn btn-danger">xóa</a>
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