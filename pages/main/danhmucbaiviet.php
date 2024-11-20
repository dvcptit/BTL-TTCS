<?php
    $sql_bv ="SELECT * FROM tbl_baiviet WHERE tbl_baiviet.id_danhmuc='$_GET[id]' ORDER BY id DESC";
    $query_bv = mysqli_query($mysqli,$sql_bv);
    // get ten danh muc
    $sql_cate="SELECT * FROM tbl_danhmucbaiviet WHERE tbl_danhmucbaiviet.id_baiviet='$_GET[id]' LIMIT 1";
    $query_cate = mysqli_query($mysqli,$sql_cate);
    $row_title = mysqli_fetch_array($query_cate);
?>

<h2>Danh mục bài viết: <?php echo $row_title['tendanhmuc_baiviet'] ?? 'Hiện tại trống.' ?></h2>
    <ul class="product-list">
        <?php
        while($row_bv = mysqli_fetch_array($query_bv)){
            ?>
        <li>
            <a href="index.php?quanly=baiviet&id=<?php echo $row_bv['id'] ?>">
                <img src="../admincp/modules/quanlybaiviet/uploads/<?php echo $row_bv['hinhanh']?>">
                <p class="title-product">Tên bài viết: <?php echo $row_bv['tenbaiviet'] ?></p>
            </a>
            <p class="title-product" style="margin:10px"><?php echo $row_bv['tomtat'] ?></p>
        </li>
        <?php
        }
        ?>
    </ul>
                    