 <?php include("menuadmin.php"); ?>
<?php 
	$mess='';
	$conn=mysqli_connect("localhost","root","","noithat");
	if (isset($_POST['tieude'])) {
		if ($_POST['tieude']=='') {
			$mess="<p align='center'>Vui lòng điền nội dung tiêu đề</p>";
			if ($_POST['chuthich']==''){
				$mess="<p align='center'>Vui lòng điền nội dung tiêu đề và chú thích </p>";
				if ($_POST['anh']==''){
					$mess="<p align='center'>Vui lòng điền nội dung tiêu đề, chú thích và ảnh</p>";
					if ($_POST['noidung']==''){
						$mess="<p align='center'>Vui lòng điền nội dung tiêu đề, chú thích, ảnh và nội dung</p>";
					}
				}
			}
			else if ($_POST['anh']==''){
				$mess="<p align='center'>Vui lòng điền nội dung tiêu đề và ảnh</p>";
				if ($_POST['noidung']==''){
					$mess="<p align='center'>Vui lòng điền nội dung tiêu đề, ảnh và nội dung</p>";
				}
			}
			else if ($_POST['anh']==''){
				$mess="<p align='center'>Vui lòng điền nội dung tiêu đề và ảnh</p>";
			}
		}
		else if ($_POST['chuthich']==''){
			$mess="<p align='center'>Vui lòng điền nội dung chú thích</p>";
		}
		else if ($_POST['noidung']==''){
			$mess="<p align='center'>Vui lòng điền phần nội dung</p>";
		}
		else if ($_POST['anh']==''){
			$mess="<p align='center'>Vui lòng điền ảnh</p>";
		}
		else {
			$sql="INSERT INTO tintuc(tieude,chuthich,noidung,anh) VALUES('".$_POST['tieude']."','".$_POST['chuthich']."','".$_POST['noidung']."','".$_POST['anh']."')";
			$ketqua=mysqli_query($conn,$sql);
			$mess="<p align='center'>Đã thêm tin tức thành công</p>";
		}
	}
					
				
?>
<!DOCTYPE html>
<html>
<head>
	<title>Thêm tin tức</title>
	<script src="ckeditor/ckeditor.js"></script>

</head>
<body style="background: #F5F5F5">
	<div id="main1" style="margin-left: 20%">
	<div class="container" style="background: #FFF">
		<div class="col-sm-12 form-group" >
			<form action="themtintuc.php" method="POST" >
				<h2 >Thêm tin tức</h2>
				Tiêu đề: <input type="text" name="tieude"><br>
				Chú thích: <input type="text" name="chuthich"><br>
				Link ảnh: <input type="file" class="btn " id="myfile" name="anh"><br>
				Nội dung::  <textarea  class="ckeditor col-12" name="noidung" cols="80" rows="10" >
				        </textarea> 
				
				<br>
				<?php echo $mess; ?>
				<input type="submit" class="btn btn-primary " value="Thêm ">
			</form>
		</div>
	</div>
	</div>

</body>
</html>