<?php
	if (!defined("template")) {
		die("error");
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Quản lý từ ngữ</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quản lý từ ngữ</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_vulgar" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm từ ngữ cần loại bỏ
        </a>
    </div>
    <?php
        if (isset($_SESSION["success"])) {
            echo $_SESSION["success"];
        }
    ?>
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th>Từ ngữ</th>
                                <th>Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                             // phân trang
                            if (isset($_GET['page'])) {
                                $page = $_GET['page'];
                            }else {
                                $page = 1;
                            }
                            $rows_per_page = 5;
                            $per_page = $page * $rows_per_page - $rows_per_page;
                            $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM vulgarwords"));
                            $total_page = ceil($total_rows/$rows_per_page);
                            $page_prev = $page - 1;
                            if ($page_prev <= 0) {
                                $page_prev = 1;
                                $disabled_prev = "disabled";
                                $boolean_prev = "true";
                            }else {
                                $disabled_prev = '';
                                $boolean_prev = 'false';
                            }
                            $page_next = $page + 1;
                            if ($page_next > $total_page) {
                                $page_next = $total_page;
                                $disabled_next = 'disabled';
                                $boolean_next = "true";
                            }else {
                                $disabled_next = '';
                                $boolean_next = "false";
                            }
                            $list_page= "";
                            $list_page .= '<ul class="pagination">';
                            $list_page .= '<li class="page-item '.$disabled_prev.'"><a class="page-link" aria-disabled="'.$boolean_prev.'" href="index.php?page_layout=category&page='.$page_prev.'">&laquo;</a></li>';
                            for ($i=1; $i <= $total_page ; $i++) { 
                                if ($page == $i) {
                                    $active = "active";
                                } else {
                                    $active = "";
                                }
                                
                                $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=category&page='.$i.'">'.$i.'</a></li>';
                            }
                            $list_page .= '<li class="page-item '.$disabled_next.'"><a class="page-link" aria-disabled="'.$boolean_next.'" href="index.php?page_layout=category&page='.$page_next.'">&raquo;</a></li>';
                            $list_page .= '</ul>';
                            echo $list_page;


                            // hiển thị data
                            $sql = "SELECT * FROM `vulgarwords` ORDER BY id DESC LIMIT $per_page, $rows_per_page";
                            $query = mysqli_query($conn, $sql);
                            
                            // echo "<pre>";
                            // print_r($row);
                            // echo "</pre>";
                            while ($row = mysqli_fetch_array($query)) {
                        ?>
                             <!-- //////////////   Modal - delete   //////////////// -->
                             <div class="modal myModal" tabindex="-1" role="dialog" id="myModal">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Thông báo !</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <form action="del_vulgar.php" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="delete_id" id="delete_id">
                                                <p>Bạn có muốn xóa từ ngữ ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="delete_product" class="btn btn-primary">Delete</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                               
                                <!-- /////////////////////////////////// -->
                            <tr>
                                <td><?php echo $row['id']; ?></td>
                                <td><?php echo $row['vulgar_words']; ?></td>
                                <td class="form-group">
                                    <a class="btn btn-danger deleteVulgar"><i class="glyphicon glyphicon-remove"></i></a>
                                </td>
                            </tr>
                        <?php
                            }
                        ?>
                        </tbody>
                    </table>
                </div>
                <div class="panel-footer">
                    <nav aria-label="Page navigation example">
                        <?php
                            echo $list_page;
                        ?>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    <!--/.row-->
</div>
<!--/.main-->
<script> 
    function thongbao(){
        let conf = confirm("Bạn có chắc chắn muốn xóa");
        return conf;
    }
</script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<script>
    $(document).ready(function () {
        $(".deleteVulgar").on("click", function () {
            $("#myModal").modal('show');
            $tr = $(this).closest('tr');
            let data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            $("#delete_id").val(data[0]);
        });
    });
</script>