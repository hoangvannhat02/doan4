@extends('admin.layout')

@section('content')
    <section>
        <div class="card">
            <div class="card-header d-flex">
              <h1 class="card-title">Thông tin hóa đơn bán</h1>
            </div>
            <div>
              <a href="{{ route('hoadonban.index') }}" class="btn btn-success">Đơn hàng chờ xét</a>
              <a href="{{ route('donhangcho') }}" class="btn btn-success">Đơn hàng đang vận chuyển</a>
              <a href="{{ route('donhangdaban') }}" class="btn btn-success">Đơn hàng đã giao</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if(session('success'))
                <div class="alert alert-success">
                  {{ session('success') }}
                </div>
              @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>Mã hóa đơn</th>
                  <th>Tên khách hàng</th>
                  <th>Ngày tạo</th>
                  <th>Địa chỉ nhận</th>
                  <th>Trạng thái</th> 
                                  
                  <th>Tổng tiền</th>
                  <th>Chức năng</th>
                </tr>
                </thead>
                <tbody>
                    @foreach($listhdb as $item)
                <tr>
                   
                    <td>{{ $item ->  id}}</td>
                    <td>{{ $item -> HoVaTen}}</td>
                    <td>{{ $item -> NgayTao }}</td>
                    <td>{{ $item -> DiaChiNhan}}</td>
                    <td>
                  
                      @if($item->TrangThai==0)
                        <p style="color: red">Chờ xét duyệt</p>
                      @elseif($item->TrangThai==1)
                        <p style="color: yellow">Đang vận chuyển</p>
                      @elseif($item->TrangThai==2)
                        <p style="color: green">Đã giao hàng</p>
                      @endif
                    </td>
                    
                    
                    <td>{{ number_format($item -> TongTien)}}</td>
                    <td>
                      @if($item->TrangThai==0)
                      <div class="d-flex align-items-center justify-content-center">
                        <a  href="{{ route('hoadonban.xacnhan',['id'=>$item->id]) }}" class="mr-2"><i class="fas fa-check"></i></a>
                        <a  href="{{ route('hoadonban.detail',['id'=>$item->id]) }}" class="mr-2"><i class="fa fa-eye"></i></a>
                        <a onclick="return confirm('Bạn có muốn xóa không?')" href="{{ route('hoadonban.delete',["id"=>$item->id]) }}" ><i class="fa fa-trash"></i></a>
                        </div>
                      @elseif($item->TrangThai==1)
                      <div class="d-flex align-items-center justify-content-center">
                        <a  href="{{ route('hoadonban.xacnhandagiao',['id'=>$item->id]) }}" class="mr-2"><i class="fas fa-check"></i></a>
                        <a  href="{{ route('hoadonban.detail',['id'=>$item->id]) }}" class="mr-2"><i class="fa fa-eye"></i></a>                     
                        </div>
                        @elseif($item->TrangThai==2)
                      <div class="d-flex align-items-center justify-content-center">
                        <a  href="{{ route('hoadonban.detail',['id'=>$item->id]) }}" class="mr-2"><i class="fa fa-eye"></i></a>                      
                        </div>
                      @endif 
                      
                    </td>
                    @endforeach
                  
                </tr>
              
                </tbody>
               
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        
      </section>
  
      <!-- Main content -->
      <section class="content">
  
       
  
      </section>
      <!-- /.content -->
    </section>

@endsection