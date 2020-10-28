<?php

    if (!defined("template")) {
        die("error");
    }


     // phần xử lý biến đổi từ ngữ thô tục trong comment
     $sql_vulgar = "SELECT vulgar_words FROM `vulgarwords`";
     $query_vulgar = mysqli_query($conn, $sql_vulgar);
     $str_vulgar = "";
     while ($row_vulgar = mysqli_fetch_array($query_vulgar)) {
         $str_vulgar .= $row_vulgar["vulgar_words"] . " ";
     }
     $str_vulgar_arr = explode(" ", $str_vulgar);
     array_pop($str_vulgar_arr);
     //////////////////////////////////////////

    if (isset($_POST["sbm"])) {
        $prd_id = $_POST["prd_id"];
        $comm_name = $_POST['comm_name'];
        $comm_mail = $_POST['comm_mail'];
        $comm_details = $_POST['comm_details'];

        // phần xử lý biến đổi từ ngữ thô tục trong comment
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
        //////////////////////////////////////////


        $comm_status = $_POST["comm_status"];
        date_default_timezone_get('Asia/Bangkok');
        $comm_date = date('Y-m-d H:i:s');
        $sql = "INSERT INTO `comment`(`prd_id`, `comm_name`, `comm_mail`, `comm_date`, `comm_details`, comm_vulgar, comm_status) VALUES ($prd_id, '$comm_name', '$comm_mail', '$comm_date','$comm_details', '$convert', $comm_status)";
        mysqli_query($conn, $sql);       
        $success = '<div class="alert alert-success">Thêm mới thành công !</div>';
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="index.php?page_layout=comment">Quản lý bình luận</a></li>
            <li class="active">Thêm bình luận</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm bình luận</h1>
            <?php if(isset($success)){ echo $success;} ?>
        </div>
        
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                         <!-- enctype="multipart/form-data" -->
                    <form role="form" method="POST">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Comment name</label>
                                <input required name="comm_name" class="form-control" placeholder="">
                            </div>

                            <div class="form-group">
                                <label>Comment mail</label>
                                <input required name="comm_mail" class="form-control" placeholder="">
                            </div>
                            <div class="form-group">
                                <label>Comment of product</label>
                                <select name="prd_id" class="form-control">
                                        <?php
                                        $sql_prd = "SELECT * FROM `product` ORDER BY prd_id DESC";
                                        $query_prd = mysqli_query($conn, $sql_prd);
                                        while($row_prd = mysqli_fetch_array($query_prd)){
                                        ?>
                                        <option value=<?php echo $row_prd['prd_id']; ?>><?php echo $row_prd['prd_name']; ?></option>
                                        <?php
                                        }
                                        ?>
                                </select>
                            </div>

                            <div class="form-group">
                                <label>Comment Status</label>
                                <select name="comm_status" class="form-control">
                                    <option value=1 selected>Hiện</option>
                                    <option value=0>Ẩn</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Comment details</label>
                                <textarea id="comm_details" required name="comm_details" class="form-control" rows="3"></textarea>
                                <!-- <script>
                                    CKEDITOR.replace('comm_details');
                                </script> -->
                            </div>
                            <button name="sbm" type="submit" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
    <!-- /.row -->

</div>
<!--/.main-->