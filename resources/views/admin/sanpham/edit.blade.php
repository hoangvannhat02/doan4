@extends('admin.layout')
@section('content')
    <section>
            <!-- Main content -->
            <section class="content">
              <div class="container-fluid">
                <div class="row">
                  <!-- left column -->
                  <div class="col-md-12">
                    <!-- jquery validation -->
                    <div class="card card-primary">
                      <div class="card-header">
                        <h3 class="card-title">Thông tin sản phẩm</h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('update',['id'=>$sanpham->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="tensanpham">Tên sản phẩm</label>
                            <input type="text" name="TenSanPham" value="{{ $sanpham->TenSanPham }}" class="form-control" id="tensanpham" placeholder="Tên sản phẩm">
                          </div>
                          <div class="form-group">
                            <label for="anh">Ảnh</label>
                            <input type="file" name="Anh" class="form-control" value="{{ asset($sanpham->Anh) }}" id="anh" placeholder="Ảnh">
                            <div><img src="{{$sanpham->Anh}}" style="width:150px;"></div>
                          </div>
                          <div class="form-group">
                            <label for="chitiet">Chi tiết sản phẩm</label>
                            <input type="text" name="ChiTietSanPham" class="form-control" value="{{$sanpham->ChiTietSanPham}}" id="chitiet" placeholder="Chi tiết sản phẩm">
                          </div>
                          <div class="form-group">
                            <label for="mota">Mô tả</label>
                            c
                          </div>
                          {{-- <div class="form-group">
                            <label for="maloai">Mã loại</label>
                            <input type="text" name="MaLoai" class="form-control" value="{{ $sanpham->MaLoai }}" id="maloai" placeholder="Mã loại">
                          </div> --}}
                          <div class="form-group">
                            <label for="loai">Loại Sản Phẩm</label>
                            <select class="form-control" name="MaLoai" id="MaLoai">
                              @foreach ($loaisp as $key => $value)
                              <option value="{{ $key }}" @if($key == old('id',$sanpham->MaLoai)) selected @endif>
                                  {{ $value }}
                              </option>
                              @endforeach
                            </select>
                          </div>
                         
                          
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a href="{{ route('broad') }}" class="btn btn-danger">Back</a> 
                        </div>
                      </form>
                    </div>
                    <!-- /.card -->
                    </div>
                  <!--/.col (left) -->
                  <!-- right column -->
                  <div class="col-md-6">
        
                  </div>
                  <!--/.col (right) -->
                </div>
                <!-- /.row -->
              </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
       
    </section>
@endsection
@section('ckcontent')
  <script>
    CKEDITOR.replace( 'MoTa' );
  </script>
@endsection
