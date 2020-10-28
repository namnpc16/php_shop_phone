<?php
	if (!defined("template")) {
		die("error");
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Danh sách bình luận</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách bình luận</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_comm" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm bình luận
        </a>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <table data-toolbar="#toolbar" data-toggle="table">

                        <thead>
                            <tr>
                                <th data-field="id" data-sortable="true">ID</th>
                                <th>Comment of product</th>
                                <th>Comment name</th>
                                <!-- <th>Comm_mail</th> -->
                                <th>comm_details</th>
                                <th>Status</th>
                                <th>Comm_vulgar</th>
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
                                $rows_per_page = 10;
                                $per_page = $page * $rows_per_page - $rows_per_page;
                                $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM comment"));
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
                                $list_page .= '<li class="page-item '.$disabled_prev.'"><a class="page-link" aria-disabled="'.$boolean_prev.'" href="index.php?page_layout=comment&page='.$page_prev.'">&laquo;</a></li>';
                                for ($i=1; $i <= $total_page ; $i++) { 
                                    if ($i == $page) {
                                        $active = "active";
                                    } else {
                                        $active = "";
                                    }
                                    
                                    $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=comment&page='.$i.'">'.$i.'</a></li>';
                                }
                                $list_page .= '<li class="page-item '.$disabled_next.'"><a class="page-link" aria-disabled="'.$boolean_next.'" href="index.php?page_layout=comment&page='.$page_next.'">&raquo;</a></li>';
                                $list_page .= '</ul>';
                                echo $list_page;
                                // hiển thị data
                                $sql = "SELECT * FROM `comment` INNER JOIN product ON comment.prd_id = product.prd_id ORDER BY comm_id DESC LIMIT $per_page, $rows_per_page";
                                $query = mysqli_query($conn, $sql);
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
                                        <form action="del_comm.php" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="delete_id" id="delete_id">
                                                <p>Bạn có muốn xóa Comment ?</p>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                <button type="submit" name="" class="btn btn-primary">Delete</button>
                                            </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                               
                                <!-- /////////////////////////////////// -->
                            <tr>
                            <!-- label-danger -->
                                <td style="text-align: center"><?php echo $row['comm_id']; ?></td>
                                <td style="text-align: center"><?php echo $row['prd_name']; ?></td>
                                <td style="text-align: center"><?php echo $row['comm_name']; ?></td>
                                <!-- <td style="text-align: center"></td>  -->
                                <td style="text-align: center"><?php echo $row["comm_details"] ?></td>
                                
                                <td><a style="text-decoration: none"  href="config_status_comm.php?comm_status=<?php echo $row["comm_status"];?>&comm_id=<?php echo $row["comm_id"]; ?>"><span id="comm_status[<?php echo $row["comm_id"]; ?>]" class="label <?php if( $row['comm_status'] == 1 ){ echo "label-success";} else{ echo "label-danger";} ?>">
                                <?php if( $row['comm_status'] == 1 ){ echo "Hiện";} else{ echo "Ẩn";} ?>
                                </span></a></td>
                                <td><?php echo $row['comm_vulgar']; ?></td>
                                <td class="form-group">
                                    <a href="index.php?page_layout=edit_comm&comm_id=<?php echo $row['comm_id'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a class="btn btn-danger deleteComment"><i class="glyphicon glyphicon-remove"></i></a>
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
            let conf = confirm("Bạn có chắc chắn muốn xóa ?");
            return  conf;
    }
</script>
<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>
<script>
    $(document).ready(function () {
        $(".deleteComment").on("click", function () {
            $("#myModal").modal('show');
            $tr = $(this).closest('tr');
            let data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            $("#delete_id").val(data[0]);
        });
    });
</script>