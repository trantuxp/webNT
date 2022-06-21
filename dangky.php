 <?php 
	$conn=mysqli_connect("localhost","root","","noithat");
	$tendn='';$pas='';$pas1='';$email='';$vaitro='';$sodt='';$diachi='';$usernameErr='';$PasswordErr='';$PasswordErr1='';$vaitroer='';$emailer='';$mess='';$sodter='';
	if ($_SERVER["REQUEST_METHOD"]=="POST") {
    if($_POST['tendn']==''&&$_POST['matkhau']==''&&$_POST['matkhau1']==''){
      $mess="Bạn cần nhập đủ và đúng thông tin";
    }
		else if (empty($_POST['tendn'])) 
			$usernameErr="Bạn cần nhập tên đăng nhập";
		else{
			if (!preg_match("/^[A-Za-z0-9']*$/",$_POST['tendn'])) {
			$usernameErr="Bạn cần nhập đúng ký tự";
			}
			else $tendn=$_POST['tendn'];
		}
		$pas=md5($_POST['matkhau']);
		$pas1=md5($_POST['matkhau1']);
		// $email=$_POST['email'];
		// $vaitro=$_POST['vaitro'];

    // if (preg_match("/^[0-9']*$/",$_POST['sodt'])) {
    //   $sodt=$_POST['sodt'];
    // }
    // else $sodter="Bạn cần nhập đúng ký tự";
    // $diachi=$_POST['diachi'];
		
		if($tendn&&$_POST['matkhau']&&$_POST['matkhau1'])
    {
			$sql="SELECT * FROM taikhoan WHERE tendn='$tendn'";
			$kq=mysqli_query($conn,$sql);

			if (mysqli_num_rows($kq)>0) {
				$usernameErr="Tài khoản đã tồn tại";
				
			}
			else if ($pas!=$pas1) {
				$PasswordErr1="Mật khẩu không trùng khớp";
				}
			else{
				$sql="INSERT INTO taikhoan(tendn,matkhau,email,vaitro,sodt,diachi) VALUES('$tendn','$pas','','',0,'')";
				$ketqua=mysqli_query($conn,$sql);
        $mess="Bạn đã đăng ký thành công!";
				// header('location: trangchu.php');

			}
		}
    else if ($tendn&&($_POST['matkhau']==''||$_POST['matkhau1']=='')) {
      $PasswordErr1="Bạn cần nhập mật khẩu";
    }
		else {
      
    }
	}			
?>
<!DOCTYPE html>
<html>
<head>
  <title>Đăng ký</title>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

<style>

  form.f1 {width: 50%;margin-left: 25%;}
  div.container-fluid{
  background-image: url('img/anhdangky.jpg');
  background-size: 100% 100%;
  background-repeat: no-repeat;
  font-family: sans-serif;  
  }
  input.in {
    width: 60%;
    margin-left: 20%;
    padding: 10px 12px;
    display: inline-block;
    border: 1px solid #ccc;
    box-sizing: border-box;
    border-radius: 15px;

  }

  input.in:hover{
   
  }
    p{
      color: white;
    }
     h2{
      color: white;
    }
  button.b1  {
    background-color: #4CAF50;
    color: white;
    padding: 14px 20px;
    margin: 8px 0;
    border: none;
    cursor: pointer;
    
  }
  button:hover {
    opacity: 0.8;
  }

  .cancelbtn {
    width: auto;
    padding: 10px 18px;
    background-color: #f44336;
  }
  .container1 {
    padding: 0 16px ;
    width: 100%;
   
    background-color: rgba(0,0,0,0.5) !important;
  }
  
}
</style>
</head>
<body style="height:730px">
<?php 	
		include('menu.php');
?>

<div class="container-fluid" style="height: 81%">
  <form class="f1" action="dangky.php" method="post" >
    <div class="row">
      <div class="col-12">
        <div class="container1 ">
        <p ><h3 style="color: white">Đăng ký </h3></p>
        <input class=" form-group in"  type="text" placeholder="Nhập tên đăng nhập" name="tendn"  value="<?php echo $tendn; ?>">
        <?php echo '<div align="center" style="color: white">'.$usernameErr.'</div>';?>
        
        
        <input type="password" class="form-group in" placeholder="Nhập mật khẩu" name="matkhau" >

        <input type="password" class="form-group in" placeholder="Nhập lại mật khẩu" name="matkhau1" >  
        <?php echo '<div align="center" style="color: white">'.$PasswordErr1.'</div>'; ?>
        
        <!-- <input type="email" class="form-group in" placeholder="Email@" name="email" required value="<?php echo $email; ?>">
        <br>
        <input type="text" name="sodt" class="form-group sdt" placeholder="Điện thoại " style="margin-left: 20%;border-radius: 15px;padding: 10px 12px;border: 1px solid #DCD;" value="<?php echo $sodt; ?>">
        <span style="margin-left: 0%;color: white;">Vai trò:</span><input type="radio" style="margin-left: 2%;"class="ra" placeholder="Vai trò" name="vaitro" value="khach" required><span style="color: white">Khách</span>
        <input type="radio" class="ra" style=""placeholder="Vai trò" name="vaitro" value="admin" required><span style="color: white">Admin</span>
        
        <input type="text" class="form-group in" placeholder="Địa chỉ" name="diachi" required value="<?php echo $diachi; ?>">
        <p align="left" class="t" style="align-content: left"><input type="checkbox" class="t"  name=""> Remember me</p>
        <a href="dangky.php" style="color: white;text-decoration: none;">Bạn chưa có tài khoản?(Đăng ký)</a> -->
        <?php echo '<div align="center" style="color: white">'.$mess.'</div>';?>
        <p align="center"><button class="b1 btn btn-lg" type="submit"  >Đăng ký</button></p>

      </div>
    </div>
   
  
  </div>
</form>

</body>
</html>
