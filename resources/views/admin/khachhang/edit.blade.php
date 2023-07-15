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
                        <h3 class="card-title">Thông tin khách hàng</h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('khachhang.update',['id'=>$khachhang->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="HoTen">Tên khách hàng</label>
                            <input type="text" name="HoVaTen" class="form-control" value="{{ $khachhang ->HoVaTen }}" id="HoTen" placeholder="Tên khách hàng">
                          </div>
                          
                          <div class="form-group">
                            <label for="DiaChi">Địa chỉ</label>
                            <input type="text" name="DiaChi" class="form-control" value="{{ $khachhang ->DiaChi }}" id="DiaChi" placeholder="Địa chỉ">
                          </div>
                          <div class="form-group">
                            <label for="DienThoai">Số điện thoại</label>
                            <input type="number" name="SoDienThoai" class="form-control" value="{{ $khachhang ->SoDienThoai }}" id="DienThoai" placeholder="Điện thoại">
                          </div>
                          <div class="form-group">
                            <label for="Email">Email</label>
                            <input type="email" name="Email" class="form-control" value="{{ $khachhang ->Email }}" id="Email" placeholder="Email ">
                          </div>
                          <div class="form-group">
                            <label for="UserName">UserName</label>
                            <input type="text" name="UserName" class="form-control" value="{{ $khachhang ->UserName }}" id="UserName" placeholder="UserName ">
                          </div>
                          <div class="form-group">
                            <label for="PassWord">PassWord</label>
                            <input type="text" name="PassWord" class="form-control" value="{{ $khachhang ->PassWord }}" id="PassWord" placeholder="PassWord ">
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
