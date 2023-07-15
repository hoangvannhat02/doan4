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
                        <h3 class="card-title">Thông tin nhà cung cấp</h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('nhacungcap.update',['id'=>$nhacungcap->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                            <div class="form-group">
                              <label for="HoTen">Tên nhà cung cấp</label>
                              <input type="text" name="HoTen" class="form-control" value="{{ $nhacungcap->HoTen }}" id="HoTen" placeholder="Tên nhà cung cấp">
                            </div>
                            
                            <div class="form-group">
                              <label for="DiaChi">Địa chỉ</label>
                              <input type="text" name="DiaChi" class="form-control" value="{{ $nhacungcap->DiaChi}}" id="DiaChi" placeholder="Địa chỉ">
                            </div>
                            <div class="form-group">
                              <label for="DienThoai">Số điện thoại</label>
                              <input type="number" name="DienThoai" class="form-control" value="{{ $nhacungcap->DienThoai }}" id="DienThoai" placeholder="Điện thoại">
                            </div>
                            <div class="form-group">
                              <label for="Email">Email</label>
                              <input type="email" name="Email" class="form-control" value="{{ $nhacungcap->Email }}" id="Email" placeholder="Email ">
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
