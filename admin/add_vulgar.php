<?php
	if (!defined("template")) {
		die("error");
    }
    
    // thêm category
    if (isset($_POST['sbm'])) {
        date_default_timezone_set("Asia/Bangkok");
        $date = date("Y-m-d H:i:s");
        $vulgar_name = $_POST['vulgar_name'];
        $sql = "SELECT * FROM vulgarwords WHERE vulgar_words='$vulgar_name'";
        $query = mysqli_query($conn, $sql);
        if (mysqli_num_rows($query) > 0) {
            $error = '<div class="alert alert-danger">Danh mục đã tồn tại !</div>';
        }else {
            $sql = "INSERT INTO vulgarwords(vulgar_words, vulgar_date) VALUES ('$vulgar_name', '$date')";
            mysqli_query($conn, $sql);
            $success = '<div class="alert alert-success">Thêm mới thành công !</div>';
            // header("location: index.php?page_layout=category");
        }
    }
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li><a href="index.php?page_layout=vulgar">Quản lý từ ngữ</a></li>
            <li class="active">Thêm từ ngữ</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Thêm từ ngữ</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="col-md-8">
                        <!-- <div class="alert alert-danger">Danh mục đã tồn tại !</div> -->
                        <?php if(isset($error)){echo $error;} ?>
                        <?php if(isset($success)){echo $success;} ?>
                        <form role="form" method="post">
                            <div class="form-group">
                                <label>Từ ngữ cần loại bỏ:</label>
                                <input required type="text" name="vulgar_name" class="form-control" placeholder="Từ ngữ...">
                            </div>
                            <button type="submit" name="sbm" class="btn btn-success">Thêm mới</button>
                            <button type="reset" class="btn btn-default">Làm mới</button>
                    </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- /.col-->
    </div>
</div>
<!--/.main-->