<!--	List Product	-->
<?php
    $cat_id = $_GET['cat_id'];
    $cat_name = $_GET['cat_name'];

    // phân trang (hơi dối)
    if (isset($_GET["page"])) {
        $page = $_GET["page"];
    } else {
        $page = 1;
    }
    $rows_per_page = 6;
    $per_page = $page * $rows_per_page - $rows_per_page;
    $query1 = mysqli_query($conn, "SELECT * FROM category WHERE cat_id=$cat_id");
    $query = mysqli_query($conn, "SELECT * FROM product WHERE cat_id=$cat_id");
    $total_row = mysqli_num_rows($query);
    $total_row_page = ceil($total_row/$rows_per_page);
    // echo $total_row_page;
    while($row =mysqli_fetch_array($query1)){
        $cat_id1 = $row["cat_id"];
        $cat_name1 = $row["cat_name"];
    }
    // echo "<pre>";
    // print_r($row);
    $sql = "SELECT * FROM product WHERE cat_id=$cat_id ORDER BY prd_id DESC LIMIT $per_page, $rows_per_page";
    $qry = mysqli_query($conn, $sql);
    $num = mysqli_num_rows($qry);
    $list_page = "";
    $list_page .= '<ul class="pagination">';
    $list_page .= '<li class="page-item"><a class="page-link" href="#">Trang trước</a></li>';
    for ($i=1; $i <= $total_row_page; $i++) { 
        $list_page .= '<li class="page-item active"><a class="page-link" href="index.php?page_layout=category&cat_id='.$cat_id1.'&cat_name='.$cat_name1.'&page='.$i.'">'.$i.'</a></li>';
    }
    $list_page .= '<li class="page-item"><a class="page-link" href="#">Trang sau</a></li>';
    $list_page .= '</ul>';
    
?>
<div class="products">
    <h3><?php echo $cat_name; ?> (hiện có <?php echo $total_row; ?> sản phẩm)</h3>
    <?php
    $i = 1;
    while ($row = mysqli_fetch_array($qry)) {
        if ($i == 1) {
    ?>
        <div class="product-list card-deck">
    <?php
        }
    ?>
        <div class="product-item card text-center">
            <a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><img src="admin/img/<?php echo $row['prd_image']; ?>"></a>
            <h4><a href="index.php?page_layout=product&prd_id=<?php echo $row['prd_id']; ?>"><?php echo $row['prd_name']; ?></a></h4>
            <p>Giá Bán: <span><?php echo number_format($row['prd_price']); ?> đ</span></p>
        </div>
    
    <?php
    
    if ($i == 3) {
        $i = 1;
    ?>
    </div>
    <?php
    }else{
        $i++;
    }
    
    }
    if ($num % 3 != 0) {
    ?>
    </div>
    <?php
    }
    ?>
  
</div>
<!--	End List Product	-->
<?php

?>
<div id="pagination">

       <?php
        echo $list_page;
       ?>
    
</div>