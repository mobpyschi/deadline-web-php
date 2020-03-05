<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<div class="row" style="background-color: #f0f0f0; height: 40px;">
		<div class="container">
		<div class="nav-top">
			<ul>
				<li><a href=""><i class="fa fa-user"></i>Hồ sơ</a></li>
				<li><a href=""><i class="fa fa-user"></i>Ưa thích</a></li>
				<li><a href=""><i class="fa fa-user"></i>Giỏ hàng</a></li>
				<li><a href=""><i class="fa fa-user"></i>Thanh toán</a></li>
				<span class="decor mt-2">Phạm Ngọc Hải - 18007761</span>
			</ul>
		</div>
		</div>
	</div>
<!-------------------------------Banner------------------------------------------------>

<div class="container">
	<div class="row">
		<div class="logo">
           <h1><a href="index.php"><img src="img/logo_header.png"></a></h1>
        </div>
	</div>
</div>


<!----------------------------------Promo------------------------------------------->

  <div class="promo-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fas fa-sync-alt"></i>
                        <p class="p-color">30 Ngày Đổi Trả</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p class="p-color">Giao Hàng Miễn Phí</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p class="p-color">Bảo Mật An Toàn</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p class="p-color">Khuyến Mãi</p>
                    </div>
                </div>
            </div>
        </div>
 </div>       

 <!----------------------------------Menu-------------------------------------------->

         <nav id="nav-1">
			  <a class="link-1" href="index.php">Trang chủ</a>
			  <a class="link-1" href="#">Sản phầm</a>
			  <a class="link-1" href="#">Phụ kiện</a>
			  <a class="link-1" href="#">Khuyến mãi</a>
			  <a class="link-1" href="#">Hỗ trợ</a>
			  <a class="link-1" href="dangky.php">Đăng ký</a>
			  <a class="link-1" href="dangnhap.php">Đăng nhập</a>
		</nav>

<!----------------------------------Content------------------------------------------->

<h1 class="mt-5">Sản phẩm</h1>
<div class="container">
	<div class="row">
		<div class="col-3" style="min-height: 500px;">
			<div class="left">
				<h2 class="pt-3 pb-3">Loại sản phẩm</h2>
				<?php 
					include("connect.php");
					$query = "SELECT * FROM loaisp";
					$result = mysqli_query($con, $query);

					if (mysqli_num_rows($result)>0) {
						echo "<ul>";
						while ($row = mysqli_fetch_assoc($result)) {
							echo "<li>";
							echo "<a href='index.php?idloaisp=".$row["Maloai"]."'>".$row["Tenloai"]."</a>";
							echo "</li>";
						}
					}else {
						echo "</ul>";
					}

				 ?>
			</div>
		</div>

<!------------------------------------Right-------------------------------------------->

		<div class="col-9">
			<div class="right">
				<div class="sanpham">
					<div class="sanphamcon">
				<?php 
					include("connect.php");
					$sql1="SELECT * FROM sanpham";
					if (isset($_GET["idloaisp"])) {
						$sql1 = $sql1." WHERE sanpham.Masp = '".$_GET["idloaisp"]."'";
					}
					$result = mysqli_query($con, $sql1);

					$items = 5;
					$pages = ceil(mysqli_num_rows($result) / $items);
					$page = 1;
					if(isset($_GET["page"])){
						$page = $_GET["page"];
					}
								
					$begin = ($page - 1)* $items;								
					$query1 = $sql1." limit $begin,$items";
								
					$result1 = mysqli_query($con, $query1);
					if(mysqli_num_rows($result1)>0)

					while ($row = mysqli_fetch_array($result1))
						  { ?>
						
						<div class="maytinh">
							<a href="chitietsp.php?idsp=<?php echo $row['IDsp'] ?>"><img  src="img/uploads/<?php echo $row['Hinhanh'];?>"></a>	
							<div class="imgg">	
							<p><a href="#" ><?php echo $row['Tensp'];?></a></p>
							<h4>Giá: <?php echo number_format(($row['Dongia']),0,",",".");?></h4>
							<div class="button">

								<h5><a href="chitietsp.php?idsp=<?php echo $row['IDsp'] ?>"><button class="btn btn-secondary">Chi tiết</button></a></h5>
											
								<h5><a href=""><button class="btn btn-secondary">Cho vào giỏ</button></a></h5>
											
							</div>
							</div>
						</div>
				<?php } ?>
				<?php 
					for($i=1; $i<=$pages; $i++){
							if(isset($_GET["idloaisp"])){
								echo "<a href='index.php?idloaisp=".$_GET["idloaisp"]."&page=".$i."'>".$i."</a>  ";
							}
							else{
								echo "<a href='index.php?page=".$i."'>".$i."</a>  ";
							}
						}
				?>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>




<!----------------------------------Footer------------------------------------------->


	<div class="row" style="background-color:#363636">
		<div class="container">
			<div class="row footer-top">
			<div class="col-3">
				<h3>u<span style="color: #b6affa">ABCD</span></h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis sunt id doloribus vero quam laborum quas alias dolores blanditiis iusto consequatur, modi aliquid eveniet eligendi iure eaque ipsam iste, pariatur omnis sint! Suscipit, debitis, quisquam. Laborum commodi veritatis magni</p>
			</div>
			<div class="col-3">
				<h2>Cá nhân</h2>
				<ul class="list-footer">
					<li><a href="">Tài khoản</a></li>
					<li><a href="">Lịch sử Order</a></li>
					<li><a href="">Yêu thích</a></li>
					<li><a href="">Thanh toán</a></li>
					<li><a href="">Kiểm tra đon hàng</a></li>
				</ul>
			</div>
			<div class="col-3">
				<h2>Sản phẩm</h2>
				<ul class="list-footer">
                     <li><a href="#">Macbook</a></li>
                     <li><a href="#">HP</a></li>
                     <li><a href="#">DELL</a></li>
                     <li><a href="#">ACER</a></li>
                     <li><a href="#">ASUS</a></li>
                </ul> 
			</div>
			<div class="col-3">
				<h2 class="mb-4">Nhận tin mới</h2>
				<p> Đăng ký email để nhận được những khuyến mãi đặc biết mà bạn sẽ không tìm thấy ở bất cứ đâu!</p>
				<form action="">
					<input type="Email" placeholder="Email">
					<input type="submit" value="Đăng ký" class="btn btn-light">
				</form>
			</div>
			</div>
		</div>		
	</div>
<!----------------------------------------------------------------------->


		<div class="contaier" style="background-color: black">
			<div class="row" style="padding: 1rem 0;">
				<span style="margin-left: 8rem; color: white">© 2019 Make by - pHAMNGOCHAI.</span>
			</div>
		</div>


</body>
</html>
T là Trực
