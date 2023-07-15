<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ashion | Template</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
    rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="/access/css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="/access/css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="/access/css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="/access/css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="/access/css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="/access/css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="/access/css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="/access/css/style.css" type="text/css">
</head>

<body>
    @include('header')
    @yield('content')
    @include('footer')
    
<!-- Footer Section Begin -->

<!-- Search End -->

<!-- Js Plugins -->
<script src="/access/js/jquery-3.3.1.min.js"></script>

<script src="/access/js/bootstrap.min.js"></script>
<script src="/access/js/jquery.magnific-popup.min.js"></script>
<script src="/access/js/jquery-ui.min.js"></script>
<script src="/access/js/mixitup.min.js"></script>
<script src="/access/js/jquery.countdown.min.js"></script>
<script src="/access/js/jquery.slicknav.js"></script>
<script src="/access/js/owl.carousel.min.js"></script>
<script src="/access/js/jquery.nicescroll.min.js"></script>
<script src="/access/js/main.js"></script>
<script>  
    function addtocart(event){
        event.preventDefault();
        let urlroot = $(this).data('url');
        $.ajax(
            {
                type:'GET',
                url: urlroot,
                dataType:'json',
                success: function (data){
                    if(data.code === 200){
                        alert("Thêm vào giỏ hàng thành công")
                        location.reload();
                    }
                },
                error: function (){

                },
            }
        )
    }

    function updateCart(even) {
        even.preventDefault();
        let geturl = $('.update_cart_url').data('url');
        let getid = $(this).data('id');
        let getsl = $(this).closest("tr").find("input[name='quantity']").val();
            $.ajax({
                url: geturl,
                type: 'GET',
                dataType: 'json',
                data: {
                    id: getid,
                    quantity: getsl
                },
                success: function(data) {
                    if(data.code==200){
                        alert('Cập nhật giỏ hàng thành công')
                       location.reload()
                    }
                },
                error: function (){

                },
            });
        }
        function deleteCart(even) {
        even.preventDefault();
        let geturl = $('.deletecart_url').data('url');
        let getid = $(this).data('id');
       
            $.ajax({
                url: geturl,
                type: 'GET',
                dataType: 'json',
                data: {
                    id: getid
                },
                success: function(data) {
                    if(data.code==200){
                        alert('Xóa sản phẩm trong giỏ hàng thành công')
                       location.reload()
                    }
                },
                error: function (){

                },
            });
        }

    $(function(){
        $('.add_to_cart').on('click',addtocart)
        $('.update_cart').on('click',updateCart)
        $('.delete_cart').on('click',deleteCart)
    });

    
</script>
</body>

</html>