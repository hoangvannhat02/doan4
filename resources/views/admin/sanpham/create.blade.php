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
                        <h3 class="card-title">Thêm sản phẩm mới</h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="tensanpham">Tên sản phẩm</label>
                            <input type="text" name="TenSanPham" class="form-control" id="tensanpham" placeholder="Tên sản phẩm">
                          </div>
                          <div class="form-group">
                            <label for="anh" class="form-label">Ảnh</label>
                            <input type="file" name="Anh" class="form-control" id="anh" placeholder="Ảnh">
                            <div><img src="abc.img" style="width:150px;"></div>
                          </div>
                          <div class="form-group">
                            <label for="chitiet">Chi tiết sản phẩm</label>
                            <input type="text" name="ChiTietSanPham" class="form-control" id="chitiet" placeholder="Chi tiết sản phẩm">
                          </div>
                          <div class="form-group">
                            <label for="mota">Mô tả</label>
                            <textarea type="text" name="MoTa" class="form-control" id="mota" placeholder="Mô tả"></textarea>
                          </div>
                          <div class="form-group">
                            <label for="loai">Loại Sản Phẩm</label>
                            <select class="form-control" name="MaLoai" id="MaLoai">
                              @foreach ($loaisp as $key => $value)
                              <option value="{{ $key }}">
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
