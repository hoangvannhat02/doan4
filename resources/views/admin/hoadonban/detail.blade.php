<!DOCTYPE html>
<html>
<head>
	<title>Hóa đơn bán hàng</title>
	<!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<!-- jQuery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<!-- Bootstrap JS -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8">
				<div class="card">
					<div class="card-header">
						Thông tin khách hàng
					</div>
					<div class="card-body">
						<p>Tên khách hàng: {{ $thongtinkhachhang -> HoVaTen }}</p>
						<p>Địa chỉ: {{ $thongtinkhachhang -> DiaChi }}</p>
						<p>Email: {{ $thongtinkhachhang -> Email }}</p>
						<p>Số điện thoại: {{ $thongtinkhachhang -> SoDienThoai }}</p>
					</div>
				</div>
				<br>
				<div class="card">
					<div class="card-header">
						Thông tin sản phẩm
					</div>
					<div class="card-body">
						<table class="table">
							<thead>
								<tr>
									<th>Mã sản phẩm</th>
									<th>Tên sản phẩm</th>
									<th>Đơn giá</th>
									<th>Số lượng</th>
									<th>Thành tiền</th>
								</tr>
							</thead>
							<tbody>
								@foreach ($danhsachsanpham as $id => $item)
                                <tr>
                                    <td>{{ $item[0]['id'] }}</td>
                                    <td>{{ $item[0]['TenSanPham'] }}</td>
                                    <td>{{ number_format($item[0]['GiaBan']) .'đ'}}</td>
                                    <td>{{ $item[0]['SoLuong'] }}</td>
                                    <td>{{ number_format($item[0]['TamTinh']) . 'đ'}}</td>
                                </tr>
                                @endforeach
									
								
							</tbody>
						</table>
					</div>
				</div>
				<br>
				<div class="card">
					<div class="card-header">
						Tổng tiền
					</div>
					<div class="card-body">
                      
						<p>Tổng tiền: {{ number_format($hdb -> TongTien) .'đ'}}</p>
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>