@extends('admin.layout')
@section('content')
     <!-- Content Wrapper. Contains page content -->
 <section>
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1>Profile</h1>
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active">User Profile</li>
                </ol>
              </div>
            </div>
          </div><!-- /.container-fluid -->
        </section>
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">
            <div class="row">
              <div class="col-md-3">
    
                <!-- Profile Image -->
                <div class="card card-primary card-outline">
                  <div class="card-body box-profile">
                    <div class="text-center">
                      <img class="profile-user-img img-fluid img-circle"
                           src="{{ $nguoidung->Anh }}"
                           alt="User profile picture">
                    </div>
    
                    <h3 class="profile-username text-center">{{ $nguoidung -> name }}</h3>
    
                    <p class="text-muted text-center">Software Engineer</p>
    
                    
                   
                    <form method="POST" action="{{ route('nguoidung.updateprofile',['id'=>$nguoidung->id]) }}" enctype="multipart/form-data"> 
                      @csrf
                      <input type="file" name="Anh" id="Anh" >   
                      <button type="submit" class="btn btn-primary btn-block mt-1">Thay ảnh</button>
                    </form>

                 
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
    
              </div>
              <!-- /.col -->
              <div class="col-md-9">
                <div class="card">
                  <div class="card-header p-2">
                    <ul class="nav nav-pills">
                     
                      <li class="nav-item"><a class="nav-link active" href="#settings" data-toggle="tab">Settings</a></li>
                    </ul>
                  </div><!-- /.card-header -->
                  <div class="card-body">
                    <div class="tab-content">
                      
    
                      <div class="active tab-pane" id="settings">
                        <form class="form-horizontal" method="POST" action="{{ route('nguoidung.updateprofile',['id'=>$nguoidung->id]) }}" enctype="multipart/form-data">
                          @csrf
                          <div class="form-group row">
                            <label for="HoTen" class="col-sm-2 col-form-label">Họ và tên</label>
                            <div class="col-sm-10">
                              <input type="text" name="HoTen" value="{{ $nguoidung ->name }}" class="form-control" id="HoTen" placeholder="Họ và tên">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="DiaChi" class="col-sm-2 col-form-label">Địa chỉ</label>
                            <div class="col-sm-10">
                              <input type="text" name="DiaChi" class="form-control" value="{{ $nguoidung->Address }}" id="DiaChi" placeholder="Địa chỉ">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="Email" class="col-sm-2 col-form-label">Email</label>
                            <div class="col-sm-10">
                              <input type="email" value="{{ $nguoidung -> email }}" name="Email" class="form-control" id="Email" placeholder="Email">
                            </div>
                          </div>
                         
                          <div class="form-group row">
                            <label for="DienThoai" class="col-sm-2 col-form-label">Số điện thoại</label>
                            <div class="col-sm-10">
                                <input type="number" name="DienThoai" value="{{ $nguoidung ->Phone }}" maxlength="10" min="8" class="form-control" id="DienThoai" placeholder="Số điện thoại">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="PassWord" class="col-sm-2 col-form-label">PassWord</label>
                            <div class="col-sm-10">
                              <input type="text" class="form-control" value="{{ $nguoidung -> password }}" id="PassWord" name="PassWord" placeholder="PassWord">
                            </div>
                          </div>
                          <div class="form-group row">
                            <label for="TrangThai" class="col-sm-2 col-form-label">Trạng thái</label>
                            <div class="col-sm-10">
                              <select class="form-control" name="TrangThai">
                                @foreach(['1' => 'Hoạt động', '0' => 'Ngừng hoạt động'] as $value => $text)
                                <option value="{{ $value }}" {{ $value == $nguoidung->TrangThai ? 'selected' : '' }}>
                                    {{ $text }}
                                </option>
                                 @endforeach
                              </select>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <div class="checkbox">
                                <label>
                                  <input type="checkbox"> I agree to the <a href="#">terms and conditions</a>
                                </label>
                              </div>
                            </div>
                          </div>
                          <div class="form-group row">
                            <div class="offset-sm-2 col-sm-10">
                              <button type="submit" class="btn btn-danger">Lưu & Thay đổi</button>
                              <a href="{{ route('nguoidung.logout') }}" class="btn btn-primary">LogOut</a>
                            </div>
                          </div>
                        </form>
                      </div>
                      <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                  </div><!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
  
 </section>
  <!-- /.content-wrapper -->
@endsection