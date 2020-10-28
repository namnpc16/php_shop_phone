 <!--	List Product	-->
 <?php
    $prd_id = $_GET['prd_id'];
    $sql = "SELECT * FROM product WHERE prd_id=$prd_id";
    $qry = mysqli_query($conn,$sql);
    $row = mysqli_fetch_array($qry);
 ?>
 <div id="product">
     <div id="product-head" class="row">
         <div id="product-img" class="col-lg-6 col-md-6 col-sm-12">
             <img src="admin/img/<?php echo $row['prd_image']; ?>">
         </div>
         <div id="product-details" class="col-lg-6 col-md-6 col-sm-12">
             <h1><?php echo $row['prd_name']; ?></h1>
             <ul>
                 <li><span>Bảo hành:</span> <?php echo $row['prd_warranty']; ?></li>
                 <li><span>Đi kèm:</span> <?php echo $row['prd_accessories']; ?></li>
                 <li><span>Tình trạng:</span> <?php echo $row['prd_new']; ?></li>
                 <li><span>Khuyến Mại:</span> <?php echo $row['prd_promotion']; ?></li>
                 <li id="price">Giá Bán (chưa bao gồm VAT)</li>
                 <li id="price-number"><?php echo number_format($row['prd_price'], 0, ",", ","); ?></li>
                 <li id="status"> <?php if($row['prd_status'] == 1){ echo "Còn hàng !";}else{ echo "Hết hàng !";} ?>
                 </li>
             </ul>
             <div id="add-cart"><a href="modules/cart/add_cart.php?prd_id=<?php echo $row["prd_id"]; ?>">Mua ngay</a></div>
         </div>
     </div>
     <div id="product-body" class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <h3>Đánh giá về <?php echo $row['prd_name']; ?></h3>
             <p>
                 <?php echo $row['prd_details']; ?>
             </p>
         </div>
     </div>

     <!--	Comment	-->
     <?php

     // phần xử lý biến đổi từ ngữ thô tục trong comment
        $sql_vulgar = "SELECT vulgar_words FROM `vulgarwords`";
        $query_vulgar = mysqli_query($conn, $sql_vulgar);
        $str_vulgar = "";
        while ($row_vulgar = mysqli_fetch_array($query_vulgar)) {
            $str_vulgar .= $row_vulgar["vulgar_words"] . " ";
        }
        $str_vulgar_arr = explode(" ", $str_vulgar);
        array_pop($str_vulgar_arr);


        if(isset($_POST['sbm'])){
            $comm_name = $_POST['comm_name'];
            $comm_mail = $_POST['comm_mail'];
            $comm_details = $_POST['comm_details'];

            $comm_details_arr = explode(" ", $comm_details);
            $replace = "";
            foreach ($str_vulgar_arr as $key => $value) {
                foreach ($comm_details_arr as $key1 => $value1) {
                    if ($value1 == $value) {
                        
                        $length = strlen($value1);
                        for ($i=0; $i < $length; $i++) { 
                            $replace .= "*";
                        }
                        $comm_details_arr[$key1] = $replace;
                        $replace = "";
                        // echo $replace."<br>";
                        
                    }
                }
            }
            $convert = implode(" ", $comm_details_arr);
            // echo $convert;


            date_default_timezone_get('Asia/Bangkok');
            $comm_date = date('Y-m-d H:i:s');
            $sql = "INSERT INTO `comment`(`prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`, comm_vulgar, comm_status) VALUES ($prd_id, '$comm_name', '$comm_mail', '$comm_date','$comm_details', '$convert', 0)";
            mysqli_query($conn, $sql);
            $success = '<div class="alert alert-success">Thêm mới thành công bình luận của bạn sẽ được admin kiểm duyệt!</div>';
        }
     ?>
     <div id="comment" class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">

         <!-- plugin comment facebook -->
         <div class="fb-comments" data-href="http://localhost:8080/project02/index.php?page_layout=product&amp;prd_id=<?php echo $prd_id; ?>" 
         data-numposts="10" data-mobile="Auto-detected" data-colorscheme="light" data-width="100%"></div>
         
             <h3>Bình luận sản phẩm</h3>
             <?php if(isset($success)){ echo $success;} ?>
             <form method="post">
                 <div class="form-group">
                     <label>Tên:</label>
                     <input name="comm_name" required type="text" class="form-control">
                 </div>
                 <div class="form-group">
                     <label>Email:</label>
                     <input name="comm_mail" required type="email" class="form-control" id="pwd">
                 </div>
                 <div class="form-group">
                     <label>Nội dung:</label>
                     <textarea name="comm_details" required rows="8" class="form-control"></textarea>
                 </div>
                 <button type="submit" name="sbm" class="btn btn-primary">Gửi</button>
             </form>
         </div>
     </div>
     <!--	End Comment	-->

     <!--	Comments List	-->
     <div id="comments-list" class="row">
         <div class="col-lg-12 col-md-12 col-sm-12">
             <?php
               
                $sql_comm = "SELECT * FROM `comment` WHERE prd_id = $prd_id AND comm_status = 1 ORDER BY comm_id DESC ";
                $query_comm = mysqli_query($conn, $sql_comm);

                //// phần xử lý biến đổi từ ngữ thô tục thành dấu *** /// Đang bị sai
                // function vulgar($str){
                //     $str_arr = explode(" ", $str);
                //     include_once("./admin/connect.php");
                //     $sql_vulgar = "SELECT vulgar_words FROM `vulgarwords`";
                //     $query_vulgar = mysqli_query($conn, $sql_vulgar);
                //     $str_vulgar = "";
                //     while ($row_vulgar = mysqli_fetch_array($query_vulgar)) {
                //         $str_vulgar .= $row_vulgar["vulgar_words"] . " ";
                //     }
                //     $str_vulgar_arr = explode(" ", $str_vulgar);
                //     array_pop($str_vulgar_arr);
                //     $replace = "";
                //     foreach ($str_vulgar_arr as $key_t_t_t => $value_t_t_t) {
                //         foreach ($str_arr as $key => $value) {
                //             if ($value_t_t_t == $value) {
                //                 $length = strlen($str_arr[$key]);
                //                 for ($i=0; $i < $length; $i++) { 
                //                     $replace .= "*";
                //                 }
                //                 $str_arr[$key] = $replace;
                                
                //                 $replace = "";
                //             }
                //         }
                //     }
                //     $convert = implode(" ", $str_arr);
                //     return $convert;
                // }
                //////////////////////////////////////////////////
                
                while ($row_comm = mysqli_fetch_array($query_comm)){
             ?>
             <div class="comment-item">
                 <ul>
                     <li><b><?php echo $row_comm['comm_name']; ?></b></li>
                     <li><?php echo $row_comm['comm_date']; ?></li>
                     <!-- cần loại bỏ từ ngữ thô tục -->
                     <li>
                         <p><?php if($row_comm["comm_vulgar"] != "" ){ echo $row_comm["comm_vulgar"]; }else{ echo $row_comm["comm_details"]; } ?></p>   
                        
                     </li>
                 </ul>
             </div>
             <?php
                }
             ?>
         </div>
     </div>
     

     <!--	End Comments List	-->
 </div>
 <!--	End Product	-->
 <div id="pagination">
     <ul class="pagination">
         <li class="page-item"><a class="page-link" href="#">Trang trước</a></li>
         <li class="page-item active"><a class="page-link" href="#">1</a></li>
         <li class="page-item"><a class="page-link" href="#">2</a></li>
         <li class="page-item"><a class="page-link" href="#">3</a></li>
         <li class="page-item"><a class="page-link" href="#">Trang sau</a></li>
     </ul>
 </div>