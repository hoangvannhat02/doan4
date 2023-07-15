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
                        <h3 class="card-title">Thông tin người dùng </h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('nguoidung.update',['id'=>$nguoidung->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="HoTen">Tên khách hàng</label>
                            <input type="text" name="HoTen" class="form-control" value="{{ $nguoidung ->name }}" id="HoTen" placeholder="Tên khách hàng">
                          </div>
                          
                          <div class="form-group">
                            <label for="DiaChi">Địa chỉ</label>
                            <input type="text" name="DiaChi" class="form-control" value="{{ $nguoidung ->Address }}" id="DiaChi" placeholder="Địa chỉ">
                          </div>
                          <div class="form-group">
                            <label for="DienThoai">Số điện thoại</label>
                            <input type="number" name="DienThoai" class="form-control" value="{{ $nguoidung ->Phone }}" id="DienThoai" placeholder="Điện thoại">
                          </div>
                          <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="Email" class="form-control" value="{{ $nguoidung ->email }}" id="Email" placeholder="Email ">
                          </div>
                          
                          <div class="form-group">
                            <label for="PassWord">PassWord</label>
                            <input type="text" name="PassWord" class="form-control" value="{{ $nguoidung ->password }}" id="PassWord" placeholder="PassWord ">
                          </div>
                          <div class="form-group">
                            <label for="anh">Ảnh</label>
                            <input type="file" name="Anh" class="form-control" value="{{ asset($nguoidung->Anh) }}" id="anh" placeholder="Ảnh">
                            <div><img src="{{$nguoidung->Anh}}" style="width:150px;"></div>
                          </div>
                       
                          <div class="form-group">
                            <label for="TrangThai">Trạng thái</label>
                            <select class="form-control" name="TrangThai" id="TrangThai">
                                @foreach(['1' => 'Hoạt động', '0' => 'Ngừng hoạt động'] as $value => $text)
                                    <option value="{{ $value }}" {{ $value == $nguoidung->TrangThai ? 'selected' : '' }}>
                                        {{ $text }}
                                    </option>
                                @endforeach
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
