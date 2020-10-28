<?php
    define("template", true);
    include_once("./connect.php");
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Thay đổi PassWord</title>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/datepicker3.css" rel="stylesheet">
<link href="css/bootstrap-table.css" rel="stylesheet">
<link href="css/styles.css" rel="stylesheet">
<link rel="stylesheet" href="./css/config.css">
<!--[if lt IE 9]>
<script src="js/html5shiv.js"></script>
<script src="js/respond.min.js"></script>
<![endif]-->

</head>

<body>
    <?php
        $email = $_GET["email"];
        $token = $_GET["token"];
        
        $sql = "SELECT * FROM `user` WHERE user_mail = '$email' AND token = '$token'";
        $num = mysqli_num_rows(mysqli_query($conn, $sql));
        if ($num > 0) {
            if (isset($_POST["sbm"])) {
                $new_token = md5(mt_rand() . time() . mt_rand());
                $pass = $_POST["pass"];
                $re_pass = $_POST["re_pass"];
                if ($pass === $re_pass) {
                    $sql_update = "UPDATE `user` SET user_pass = '$pass', token = '$new_token' WHERE user_mail = '$email'";
                    mysqli_query($conn, $sql_update);
                    $success = '<div class="alert alert-success">Thay đổi thành công !</div>';
                }else{
                    $error = '<div class="alert alert-danger">Password không hợp khớp !</div>';
                }
            }
        }else{
            $error_token = '<div class="alert alert-danger">Phiên làm việc đã hết hạn !</div>';
        }






	?>
	<div class="row">
		<div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
				<div class="panel-heading">Vietpro Mobile Shop - Thay đổi mật khẩu</div>
				<div class="panel-body">
					<!-- <div class="alert alert-danger">Tài khoản không hợp lệ !</div> -->
                    
                    
					<form role="form" method="post">
						<fieldset>
                            <?php
                                if(isset($error_token)){ echo $error_token; }
                                if(isset($error)){ echo $error; }
                                if(isset($success)){echo $success;}
                            ?>
                            <div class="form-group">
								<input class="form-control" placeholder="" name="mail" type="email" value="<?php echo $email; ?>" disabled autofocus required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Mật khẩu" name="pass" type="password" autofocus  <?php if( isset($error_token ) || isset($success) ){ echo "disabled"; } ?> required>
							</div>
							<div class="form-group">
								<input class="form-control" placeholder="Nhập lại mật khẩu" name="re_pass" type="password" value="" <?php if( isset($error_token) || isset($success) ){ echo "disabled"; } ?>  required>
							</div>
							<div class="checkbox">
								<label>
									<input name="remember" type="checkbox" value="Remember Me">Nhớ tài khoản
								</label>
							</div>
							<button type="submit" class="btn btn-primary" <?php if( isset($error_token) || isset($success) ){ echo "disabled"; } ?> name="sbm">Thay đổi</button>
							
						</fieldset>
					</form>
				</div>
			</div>
		</div><!-- /.col-->
	</div><!-- /.row -->	
</body>

</html>
