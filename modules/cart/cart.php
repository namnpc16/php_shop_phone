<!--	Cart	-->
<script>
    function buyNow() {
        document.getElementById("buy-now").submit();
    }
</script>
<?php
    include "PHPMailer-master/src/PHPMailer.php";
    include "PHPMailer-master/src/Exception.php";
    include "PHPMailer-master/src/OAuth.php";
    include "PHPMailer-master/src/POP3.php";
    include "PHPMailer-master/src/SMTP.php";

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\Exception;	
?>
<?php
function num_for($e){
    $a = number_format($e, 0, "," , ",");
    return $a;
}


if (isset($_SESSION["cart"]) && (count($_SESSION["cart"]) > 0)) {
    $arr_id = array();
    foreach ($_SESSION["cart"] as $prd_id => $quantity) {
        $arr_id[] = $prd_id;
    }
    $str_id = implode(", ", $arr_id);
    $sql = "SELECT * FROM product WHERE prd_id IN($str_id)";
    $query = mysqli_query($conn, $sql);
    // echo "<pre>";
    // print_r($arr_id);
    // echo "<pre>";
    // print_r($_SESSION["cart"]);

    // cập nhật giỏ hàng
    if (isset($_POST["sbm"])) {
        foreach ($_POST["quantity"] as $prd_id => $quantity) {
            $_SESSION["cart"][$prd_id] = $quantity;
        }   
    }
?>
<div id="my-cart">
    <div class="row">
        <div class="cart-nav-item col-lg-7 col-md-7 col-sm-12">Thông tin sản phẩm</div>
        <div class="cart-nav-item col-lg-2 col-md-2 col-sm-12">Tùy chọn</div>
        <div class="cart-nav-item col-lg-3 col-md-3 col-sm-12">Giá</div>
    </div>

    <form method="post">
        <?php
        $total_price = 0;
        $total_price_all = 0;
        while ($row = mysqli_fetch_array($query)) {
            $total_price = $_SESSION["cart"][$row["prd_id"]] * $row["prd_price"];
            $total_price_all += $total_price;
        ?>

        

        <div class="cart-item row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <img src="admin/img/<?php echo $row["prd_image"]; ?>">
                <h4><?php echo $row["prd_name"]; ?></h4>
            </div>
            <div class="cart-quantity col-lg-2 col-md-2 col-sm-12">
                <input type="number" id="quantity" class="form-control form-blue quantity" name="quantity[<?php echo $row["prd_id"]; ?>]" value="<?php echo $_SESSION["cart"][$row["prd_id"]]; ?>" min="1">
            </div>

            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo num_for($total_price); ?></b><a style="cursor: pointer;" class="del_data" onclick="del_cart(<?php echo $row['prd_id']; ?>)" id="<?php echo $row["prd_id"]; ?>">Xóa</a>
            <!-- onclick="return confirm('Bạn có chắc chắn muốn xóa !')" href="modules/cart/del_cart.php?prd_id=<?php //echo $row["prd_id"]; ?>" -->
            </div>

        <!-- //////////////   Modal - delete   //////////////// -->
        <div class="modal" tabindex="-1" role="dialog" id="delData<?php echo $row['prd_id']; ?>">
            <div class="modal-dialog">
                <div class="modal-content">
                <form action="del_cart.php" method="POST" id="delForm">
                    <div class="modal-header">
                        <h5 class="modal-title">Thông báo !</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body" id="info_del">
                        <!-- <input type="hidden" name="delete_id" value="<?php //echo $row["prd_id"]; ?>" id="delete_id">
                        <p>Bạn có muốn xóa sản phẩm ?</p> -->   
                        <p><?php echo $row['prd_id']; ?></p>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" id="close">Close</button>
                        <button type="submit" name="delete_product" class="btn btn-primary" id="del"><a href="modules/cart/del_cart.php?prd_id=<?php echo $row["prd_id"]; ?>" >Delete</a></button>
                    </div>
                </form>
                </div>
            </div>
        </div>
        
        <!-- /////////////////////////////////// -->
        </div>
        <?php
        }  
        ?>
        <div class="row">
            <div class="cart-thumb col-lg-7 col-md-7 col-sm-12">
                <button id="update-cart" class="btn btn-success" type="submit" name="sbm">Cập nhật giỏ
                    hàng</button>
            </div>
            <div class="cart-total col-lg-2 col-md-2 col-sm-12"><b>Tổng cộng:</b></div>
            <div class="cart-price col-lg-3 col-md-3 col-sm-12"><b><?php echo num_for($total_price_all); ?></b></div>
        </div>
    </form>
</div>
<?php
} else {
    echo '<div class="alert alert-danger">Hiện không có sản phẩm nào</div>';
}
?>
<!--	End Cart	-->

<?php
    if (isset($_POST["name"]) && isset($_POST["phone"]) && isset($_POST["mail"]) && isset($_POST["add"])) {
        $name = $_POST["name"];
        $phone = $_POST["phone"];
        $email = $_POST["mail"];
        $add = $_POST["add"];
        $str_body = "";
        $str_body .= '<p>
                        <b>Khách hàng:</b> '.$name.'<br>
                        <b>Điện thoại:</b> '.$phone.'<br>
                        <b>Địa chỉ:</b> '.$add.'<br>
                    </p>';
        $query = mysqli_query($conn, $sql);

        $str_body .= '<table border="1" cellspacing="0" cellpadding="10" bordercolor="#305eb3" width="100%">
                        <tr bgcolor="#305eb3">
                            <td width="70%"><b><font color="#FFFFFF">Sản phẩm</font></b></td>
                            <td width="10%"><b><font color="#FFFFFF">Số lượng</font></b></td>
                            <td width="20%"><b><font color="#FFFFFF">Tổng tiền</font></b></td>
                        </tr>';
                while($row = mysqli_fetch_array($query)){
                    $str_body .= '
                        <tr>
                            <td width="70%">'.$row["prd_name"].'</td>
                            <td width="10%">'.$_SESSION["cart"][$row["prd_id"]].'</td>
                            <td width="20%">'.num_for($_SESSION["cart"][$row["prd_id"]] * $row["prd_price"]).' đ</td>
                        </tr>
                    ';
                }
        $str_body .=    '<tr>
                            <td colspan="2" width="70%"></td>
                            <td width="20%"><b><font color="#FF0000">'.num_for($total_price_all).' đ</font></b></td>
                        </tr>
                    </table>
                    ';

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
            $mail->SMTPSecure = 'ssl';                            // Enable TLS encryption, 'ssl' also accepted
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
            $mail->Subject = 'Xác nhận đơn hàng từ Vietpro Mobile Shop';
            $mail->Body    = $str_body;
            $mail->AltBody = 'Mô tả đơn hàng';
        
            $mail->send();
            header('location:index.php?page_layout=success');
        } catch (Exception $e) {
            echo 'Message could not be sent. Mailer Error: ', $mail->ErrorInfo;
        }
        /////////////////////////////////////////////////////////////////////////
    }
    
?>
<!--	Customer Info	-->
<div id="customer">
    <form id="buy-now" method="post">
        <div class="row">

            <div id="customer-name" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Họ và tên (bắt buộc)" type="text" name="name" class="form-control" required>
            </div>
            <div id="customer-phone" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Số điện thoại (bắt buộc)" type="text" name="phone" class="form-control" required>
            </div>
            <div id="customer-mail" class="col-lg-4 col-md-4 col-sm-12">
                <input placeholder="Email (bắt buộc)" type="text" name="mail" class="form-control" required>
            </div>
            <div id="customer-add" class="col-lg-12 col-md-12 col-sm-12">
                <input placeholder="Địa chỉ nhà riêng hoặc cơ quan (bắt buộc)" type="text" name="add" class="form-control" required>
            </div>

        </div>
    </form>
    <div class="row">
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a onclick="buyNow()" href="#">
                <b>Mua ngay</b>
                <span>Giao hàng tận nơi siêu tốc</span>
            </a>
        </div>
        <div class="by-now col-lg-6 col-md-6 col-sm-12">
            <a href="#">
                <b>Trả góp Online</b>
                <span>Vui lòng call (+84) 0988 550 553</span>
            </a>
        </div>
    </div>
</div>
<!--	End Customer Info	-->

<!-- <script src="js/jquery-1.11.1.min.js"></script> -->
<script src="js/jquery-3.3.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<script>
    $(document).ready(function () {
        $(".deleteCart").on("click", function () {
            $("#myModal").modal('show');
            $tr = $(this).closest('tr');
            let data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            $("#delete_id").val(data[0]);
    });
   
    //     // delete cart
    //     $(document).on("click", ".del_data", function () {
    //         let del_id=$(this).attr("id");
    //         $.ajax({
    //             url:"modules/cart/del_cart.php",
    //             type:"POST",
    //             data:{del_id:del_id},
    //             success:function(data) {
    //                 $("#info_del").html(data);
    //                 $("#delData").modal("show");
    //             }
    //         });
    //     });
    //     // end delete cart



        
    // });

    // $(document).ready(function() {
    //         $(".del_data").click(function() {
    //             $("#delData").modal("show");
    //             var userID = $(this).attr('id'); // you can add here your personal ID
    //             //alert($(this).attr('id'));
    //             $.ajax({
    //                 type: "POST",
    //                 url: 'del_cart.php',
    //                 data : {
    //                     action : 'my_action',
    //                     userID : userID 
    //                 },
    //                 success: function(data)
    //                 {
    //                     alert("success!");
    //                     console.log(data);
    //                 }
    //             });
    //         });
        });

        // document.getElementById("close").addEventListener("click", function () {
        //     document.getElementsByClassName("modal").style.display = "none";
        // });

    // function del_cart(id) {
    //     let xhttp = new XMLHttpRequest();
    //     document.getElementById("delData"+id+"").modal = "show";
    //     xhttp.onreadystatechange = function () {
    //         if (this.readyState == 4 && this.status == 200) {
    //             // document.getElementById("delData"+id+"").style.display = "block";
    //         }
    //     }
    //     // ?comm_status=" + comm_status + "&comm_id" + comm_id 
    //     xhttp.open("get", "del_cart.php", true);
    //     // xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    //     xhttp.send();
    // }

</script>