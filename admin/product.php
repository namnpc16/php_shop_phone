
<?php
	if (!defined("template")) {
		die("error");
	}
?>
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="#"><svg class="glyph stroked home"><use xlink:href="#stroked-home"></use></svg></a></li>
            <li class="active">Danh sách sản phẩm</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Danh sách sản phẩm</h1>
        </div>
    </div>
    <!--/.row-->
    <div id="toolbar" class="btn-group">
        <a href="index.php?page_layout=add_product" class="btn btn-success">
            <i class="glyphicon glyphicon-plus"></i> Thêm sản phẩm
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
                                <th data-field="name" data-sortable="true">Tên sản phẩm</th>
                                <th data-field="price" data-sortable="true">Giá</th>
                                <th>Ảnh sản phẩm</th>
                                <th>Trạng thái</th>
                                <th>Danh mục</th>
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
                                $total_rows = mysqli_num_rows(mysqli_query($conn, "SELECT * FROM product"));
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
                                $list_page .= '<li class="page-item '.$disabled_prev.'"><a class="page-link" aria-disabled="'.$boolean_prev.'" href="index.php?page_layout=product&page='.$page_prev.'">&laquo;</a></li>';
                                for ($i=1; $i <= $total_page ; $i++) { 
                                    if ($i == $page) {
                                        $active = "active";
                                    } else {
                                        $active = "";
                                    }
                                    
                                    $list_page .= '<li class="page-item '.$active.'"><a class="page-link" href="index.php?page_layout=product&page='.$i.'">'.$i.'</a></li>';
                                }
                                $list_page .= '<li class="page-item '.$disabled_next.'"><a class="page-link" aria-disabled="'.$boolean_next.'" href="index.php?page_layout=product&page='.$page_next.'">&raquo;</a></li>';
                                $list_page .= '</ul>';
                                echo $list_page;
                                // hiển thị data
                                $sql = "SELECT * FROM `product` INNER JOIN category ON category.cat_id = product.cat_id ORDER BY prd_id DESC LIMIT $per_page, $rows_per_page";
                                $query = mysqli_query($conn, $sql);
                                while ($row = mysqli_fetch_array($query)) {
                            ?>
                            <tr>
                            <!-- label-danger -->
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
                                        <form action="del_product.php" method="POST">
                                            <div class="modal-body">
                                                <input type="hidden" name="delete_id" id="delete_id">
                                                <p>Bạn có muốn xóa sản phẩm ?</p>
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
                                <td style="text-align: center"><?php echo $row['prd_id']; ?></td>
                                <td style="text-align: center"><?php echo $row['prd_name']; ?></td>
                                <td style="text-align: center"><?php echo $row['prd_price']; ?></td>
                                <td style="text-align: center"><img width="130" height="180" src="img/<?php echo $row['prd_image']; ?>" /></td>
                                <td><span class="label <?php if( $row['prd_status'] == 1 ){ echo "label-success";} else{ echo "label-danger";} ?>">
                                <?php if( $row['prd_status'] == 1 ){ echo "còn hàng";} else{ echo "hết hàng";} ?>
                                </span></td>
                                <td><?php echo $row['cat_name']; ?></td>
                                <td class="form-group">
                                    <a href="index.php?page_layout=edit_product&prd_id=<?php echo $row['prd_id'];?>" class="btn btn-primary"><i class="glyphicon glyphicon-pencil"></i></a>
                                    <a  class="btn btn-danger deleteProduct" id="deleteProduct"><i class="glyphicon glyphicon-remove"></i></a>
                                    <!-- href="del_product.php?prd_id=<?php //echo $row['prd_id']; ?>" -->
                                    <!-- return thongbao() -->
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
        $(".deleteProduct").on("click", function () {
            $("#myModal").modal('show');
            $tr = $(this).closest('tr');
            let data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();
            console.log(data);
            $("#delete_id").val(data[0]);
        });
    });
</script>