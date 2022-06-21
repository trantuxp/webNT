 <?php include("menuadmin.php"); ?>
<?php 
	$conn=mysqli_connect("localhost","root","","noithat");
	$mess='';
	if($_SERVER["REQUEST_METHOD"]=="POST"){
		if ($_POST['tendanhmuc']&&$_POST['anh']&&$_POST['ngay']&&$_POST['idphong']&&$_POST['mota']) {
			$sql="INSERT INTO danhmuc(tendanhmuc,anh,ngay,mota,idphong) VALUES('".$_POST['tendanhmuc']."','".$_POST['anh']."','".$_POST['ngay']."','".$_POST['mota']."','".$_POST['idphong']."')";
			$mess= "<p align='center'>Đã thêm thành công danh mục !</p> <br>";
			$ketqua=mysqli_query($conn,$sql);
			$_POST['tendanhmuc']='';$_POST['anh']='';$_POST['ngay']='';

		}
		else {
			$mess= "<p align='center'>Bạn cần nhập đúng và đủ thông tin !</p> <br>";
		}
	
	}
				
				
?>
<!DOCTYPE html>
<html>
<head>
	<title>THÊM DANH MỤC</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<script src="ckeditor/ckeditor.js"></script>



</head>
<body style="background: #F5F5F5">
	<div id="main1" style="margin-left: 20%">
	<div class="container" style="background: #FFF">
		<div class="col-sm-12 " >
			<h3 >Thêm danh mục</h3>
			<form action="themdanhmuc.php" method="post" >
				<div class="row" style="padding: 10px 0px 10px 0px">
					<div class="col-sm-2 " >
						Tên danh mục: 
					</div>
					<div class="col-sm-10 " >
						<input type="text" name="tendanhmuc" class="form-control" style="width: 35%">
					</div>
				</div>
				<div class="row" style="padding: 10px 0px 10px 0px">
					<div class="col-sm-2 " >
						Ngày:  
					</div>
					<div class="col-sm-10 " >
						<input type="date" name="ngay" class="form-control" style="width: 35%">
					</div>
				</div>
				<div class="row" style="padding: 20px 0px 20px 0px">
					<div class="col-sm-2 " >
						Ảnh:  
					</div>
					<div class="col-sm-10 " >
						<input type="file" class="btn btn-primary btn" id="myfile" accept=".jpg, .png" src="D:\"  name="anh" class="form-control">
					</div>
				</div>
				<div class="row" style="padding: 10px 0px 10px 0px">
					<div class="col-sm-2 " >
						Loại phòng:
					</div>
					<div class="col-sm-10 " >
						<select name="idphong" class="form-control" style="width: 35%">
							<?php
								$sqlPh="SELECT * FROM loaiphong";
								$ketquaPh=mysqli_query($conn,$sqlPh);
								while($row1=mysqli_fetch_assoc($ketquaPh)){
									echo '<option value="'.$row1['id'].'" >'.$row1['tenphong'].'</option>';
								}
							?>
						</select>
					</div>
				</div>
				<div class="row" style="padding: 10px 0px 10px 0px">
					<div class="col-sm-2 " >
						Phần mô tả:  
					</div>
					<div class="col-sm-10 " >
						<textarea  class="ckeditor form-control" name="mota" cols="80" rows="10" >
				        </textarea> 
					</div>
				</div>
				

				<input type="submit" class="btn btn-success " style="float: right" value="Thêm danh mục">
				 <?php echo $mess; ?>

				
			</form>
		</div>
	</div>
	</div>

</body>
</html>