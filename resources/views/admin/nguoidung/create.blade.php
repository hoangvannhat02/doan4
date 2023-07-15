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
                        <h3 class="card-title">Thêm người dùng mới</h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('nguoidung.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="HoTen">Tên người dùng</label>
                            <input type="text" name="HoTen" class="form-control" id="HoTen" placeholder="Tên người dùng ">
                          </div>
                          
                          <div class="form-group">
                            <label for="DiaChi">Địa chỉ</label>
                            <input type="text" name="DiaChi" class="form-control" id="DiaChi" placeholder="Địa chỉ">
                          </div>
                          <div class="form-group">
                            <label for="DienThoai">Số điện thoại</label>
                            <input type="number" name="DienThoai" class="form-control" id="DienThoai" placeholder="Điện thoại">
                          </div>
                          <div class="form-group">
                            <label for="Anh" class="form-label">Ảnh</label>
                            <input type="file" name="Anh" class="form-control" id="Anh" placeholder="Ảnh">
                            <div><img src="abc.img" style="width:150px;"></div>
                          </div>
                          <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="Email" class="form-control" id="Email" placeholder="Email ">
                          </div>
                          
                          <div class="form-group">
                            <label for="PassWord">PassWord</label>
                            <input type="text" name="PassWord" class="form-control" id="PassWord" placeholder="PassWord ">
                          </div>
                         
                          <div class="form-group">
                            <label for="TrangThai">Trạng thái</label>
                            <select class="form-control" name="TrangThai" id="TrangThai">
                                <option value="1">
                                    Hoạt động
                                </option>
                                <option value="0">
                                    Ngừng hoạt động
                                </option>
                            </select>
                          </div>
                          
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a href="{{ route('nguoidung.index') }}" class="btn btn-danger">Back</a> 
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
