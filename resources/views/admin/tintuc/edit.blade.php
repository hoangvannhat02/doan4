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
                        <h3 class="card-title">Thông tin tin tức</h3>
                      </div>
                      <!-- form start -->
                      <form id="quickForm" action="{{ route('tintuc.update',['id'=>$listtintuc->id]) }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="card-body">
                          <div class="form-group">
                            <label for="TieuDe">Tiêu đề</label>
                            <input type="text" name="TieuDe" value = "{{ $listtintuc->TieuDe}}" class="form-control" id="TieuDe" placeholder="Tiêu đề tin tức">
                          </div>
                          <div class="form-group">
                            <label for="anh" class="form-label">Ảnh</label>
                            <input type="file" name="Anh" class="form-control" value="{{ asset($listtintuc->Anh) }}" id="anh" placeholder="Ảnh">
                            <div><img src="{{$listtintuc->Anh}}" style="width:150px;"></div>
                          </div>
                          
                          <div class="form-group">
                            <label for="NgayTao">Ngày tạo</label>
                            <input type="datetime-local" value = "{{ $listtintuc->NgayTao}}" name="NgayTao" class="form-control" id="NgayTao">
                          </div>
                          <div class="form-group">
                            <label for="MaNguoiDung">Người tạo</label>
                            <select class="form-control" name="MaNguoiDung" id="MaNguoiDung">             
                              @foreach ($nd as $key => $value)
                              <option value="{{ $key }}" @if($key == old('id',$listtintuc->MaNguoiDung)) selected @endif>
                                  {{ $value }}
                              </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="TrangThai">Trạng thái</label>
                            <select class="form-control" name="TrangThai" id="TrangThai">
                              @foreach(['1' => 'Hoạt động', '0' => 'Ngừng hoạt động'] as $value => $text)
                              <option value="{{ $value }}" {{ $value == $listtintuc->TrangThai ? 'selected' : '' }}>
                                  {{ $text }}
                                </option>
                              @endforeach
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="NoiDung">Nội dung</label>
                            <textarea name="NoiDung" class="form-control" id="NoiDung">{{ $listtintuc->NoiDung }}</textarea>
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
