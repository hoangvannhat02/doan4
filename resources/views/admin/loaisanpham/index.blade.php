@extends('admin.layout')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-inline">
              <h1 class="float-left card-title">Thông tin loại sản phẩm </h1>
              <a href="{{ route('loaisanpham.create') }}" class="float-right btn btn-info">Thêm <i class="ml-2 fa fa-plus"></i> </a>
            </div>
            
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Mã loại sản phẩm</th>
                    <th>
                      Tên loại sản phẩm
                    </th>
                  <th>Mô tả </th>

                  
                  <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($lsp as $item)
                <tr>                  
                    <td>{{ $item ->  id}}</td>
                   
                    <td>{{ $item ->  TenLoai}}</td>                   
                    <td>{{ $item ->  MoTa}}</td>                  
                    
                    <td> <div class="d-flex">
                     
                      <a  href="{{ route('loaisanpham.edit',['id'=>$item->id]) }}" class="btn btn-success mr-1"><i class="fa fa-pen"></i></a>
                      <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('loaisanpham.destroy',["id"=>$item->id]) }}" class="btn btn-danger"><i class="fa fa-trash"></i></a>
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