<?php
    session_start();
    ob_start();
    define("template", true);
    include_once("./connect.php");
    include "../PHPMailer-master/src/PHPMailer.php";
    include "../PHPMailer-master/src/Exception.php";
    include "../PHPMailer-master/src/OAuth.php";
    include "../PHPMailer-master/src/POP3.php";
    include "../PHPMailer-master/src/SMTP.php";
    

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;	
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password?</title>
    <!-- <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css"> -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <!-- <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script> -->
    <script src="js/bootstrap.min.js"></script>
    <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
    <script src="js/jquery-1.11.1.min.js"></script>
    <!------ Include the above in your HEAD tag ---------->

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/config.css">
</head>
<body>
<?php
  // $token = md5(mt_rand() . time() . mt_rand());
  
  if (isset($_POST["submit"])) {
    $email = $_POST["email"];
    $sql_user = "SELECT * FROM `user` WHERE user_mail = '$email'";
    $row = mysqli_fetch_array(mysqli_query($conn, $sql_user));
    $num = mysqli_num_rows(mysqli_query($conn, $sql_user));

    if ($num > 0) {
      
      $style = 'width: 500px; height: 150px; margin: auto; background: linear-gradient(to right, #0984e3, #74b9ff); padding: 50px; border-radius: 5px;';
      $str_body = '<div class="confirm_pass" style="'.$style.'">
                      <div style="width: 100%; height: 40px; text-align: center; margin-bottom: 20px"><h1 style="color: #2d3436; user-select: none;">Xác nhận thay đổi mật khẩu !</h1></div>
                      <div style="width: 100%; height: 40px; text-align: center;"><p style=" margin-top: 0; color: #2d3436;">Tài khoản của bạn là: '.$email.'</p></div>
                      <div style="width: 100%; height: 40px; text-align: center; font-size: 20px;">
                        <form action="" method="post">
                            <a href="http://localhost:8080/project02/admin/change_pass.php?email='.$email.'&token='.$row["token"].'">Bạn có thể thay đổi mật khẩu tại đây</a>
                        </form>
                      </div>
                  </div>';

      // echo $str_body;
      //////////////////////////////PHPmailer///////////////////////////////////
      $mail = new PHPMailer(true);                              // Passing 'true' enables exceptions
      try {
          //Server settings
          $mail->SMTPDebug = 2;                                 // Enable verbose debug output
          $mail->isSMTP();                                      // Set mailer to use SMTP
          $mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
          $mail->SMTPAuth = true;                               // Enable SMTP authentication
          $mail->Username = 'anhnhatdev2504@gmail.com';                 // SMTP username
          // $mail->Password = 'vietpr0sh0p';                           // SMTP password
          $mail->Password = 'aooetapcleuuisun';                           // SMTP password
          $mail->SMTPSecure = 'ssl';   
          
          
          // Enable TLS encryption, 'ssl' also accepted
          $mail->Port = 465;                                    // TCP port to connect to
      
          //Recipients
          $mail->CharSet = 'UTF-8';
          $mail->setFrom('namnpc16cntt@gmail.com', 'Vietpro Mobile Shop');				// Gửi mail tới Mail Server
          $mail->addAddress($email);               // Gửi mail tới mail người nhận
          //$mail->addReplyTo('ceo.vietpro@gmail.com', 'Information');
          $mail->addCC('namnpc16cntt@gmail.com');
          //$mail->addBCC('bcc@example.com');
      
          //Attachments
          //$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
          //$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
      
          //Content
          $mail->isHTML(true);                                  // Set email format to HTML
          $mail->Subject = 'Xác nhận thay đổi mật khẩu !';
          $mail->Body    = $str_body;
          $mail->AltBody = 'Mô tả';
      
          $mail->send();
          $_SESSION["forgot_pass"] = '<div class="alert alert-success">Link đổi mật khẩu đã được gửi vào Email của bạn!</div>'; 
          header('location:  index.php');
          
      } catch (Exception $e) {
          echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
      }


     
      /////////////////////////////////////////////////////////////////////////

    }else {
      $error = '<div class="alert alert-danger">Email không tồn tại!</div>';
    }
  }
?>
<div class="form-gap"></div>
<div class="container">
	<div class="row">
		<div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
              <div class="panel-body">
                <div class="text-center">
                  <h3><i class="fa fa-lock fa-4x"></i></h3>
                  <h2 class="text-center">Forgot Password?</h2>
                  <p>Bạn có thể khôi phục lại mật khẩu tại đây!</p>
                  <div class="panel-body">
                    <?php if(isset($error)){echo $error;} ?>
                    <form id="register-form" role="form" autocomplete="off" class="form" method="post">
    
                      <div class="form-group">
                        <div class="input-group">
                          <span class="input-group-addon"><i class="glyphicon glyphicon-envelope color-blue"></i></span>
                          <input required id="email" autofocus name="email" placeholder="email address" class="form-control"  type="email">
                        </div>
                      </div>
                      <div class="form-group">
                        <input name="submit" class="btn btn-lg btn-primary btn-block" value="Reset Password" type="submit">
                      </div>
                      <div class="back">
                          <a class="back_index" href="login.php">Quay lại!</a>
                      </div>
                      
                      <input type="hidden" class="hide" name="token" id="token" value=""> 
                    </form>
    
                  </div>
                </div>
              </div>
            </div>
          </div>
	</div>
</div>
</body>
</html>