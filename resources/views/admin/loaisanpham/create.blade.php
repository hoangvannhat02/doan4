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
                        <h3 class="card-title">Thêm loại sản phẩm mới</h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('loaisanpham.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="TenLoai">Tên loại sản phẩm</label>
                            <input type="text" name="TenLoai" class="form-control" id="TenLoai" placeholder="Tên loại sản phẩm">
                          </div>
                         
                          
                          <div class="form-group">
                            <label for="mota">Mô tả</label>
                            <input type="text" name="MoTa" class="form-control" id="mota" placeholder="Mô tả">
                          </div>
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a href="{{ route('loaisanpham.index') }}" class="btn btn-danger">Back</a> 
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
