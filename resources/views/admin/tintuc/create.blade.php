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
                        <h3 class="card-title">Thêm tin tức mới</h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('tintuc.save') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="TieuDe">Tiêu đề</label>
                            <input type="text" name="TieuDe" class="form-control" id="TieuDe" placeholder="Tiêu đề tin tức">
                          </div>
                          <div class="form-group">
                            <label for="anh" class="form-label">Ảnh</label>
                            <input type="file" name="Anh" class="form-control" id="anh" placeholder="Ảnh">
                            <div><img src="abc.img" style="width:150px;"></div>
                          </div>
                          
                          <div class="form-group">
                            <label for="NgayTao">Ngày tạo</label>
                            <input type="datetime-local" name="NgayTao" class="form-control" id="NgayTao">
                          </div>
                          <div class="form-group">
                            <label for="MaNguoiDung">Người tạo</label>
                            <select class="form-control" name="MaNguoiDung" id="MaNguoiDung">
                              @foreach ($listnguoidung as $key => $value)
                              <option value="{{ $key }}">
                                  {{ $value }}
                              </option>
                              @endforeach
                            </select>
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
                          <div class="form-group">
                            <label for="NoiDung">Nội dung</label>
                            
                            <textarea name="NoiDung" class="form-control" id="NoiDung"></textarea>
                          </div>
                          
                        </div>
                        <!-- /.card-body -->
                        <div class="card-footer">
                          <button type="submit" class="btn btn-primary">Submit</button>
                          <a href="{{ route('tintuc.index') }}" class="btn btn-danger">Back</a> 
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
    CKEDITOR.replace('NoiDung');
  </script>
@endsection