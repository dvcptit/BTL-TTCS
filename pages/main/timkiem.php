<?php
    if(isset($_POST['timkiem'])){
        $tukhoa = $_POST['tukhoa'];
    }
    $sql_pro ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc AND tbl_sanpham.tensanpham LIKE '%".$tukhoa."%'" ;
    $query_pro = mysqli_query($mysqli,$sql_pro);
    
    
?>

<h1>Từ khóa tìm kiếm: <?php echo $tukhoa ?></h1>
    <ul class="product-list">
        <?php
    while($row = mysqli_fetch_array($query_pro)){
        ?>
        <li>
            <a href="index.php?quanly=sanpham&id=<?php echo $row['id_sanpham'] ?>">
                <img src="../admincp/modules/quanlysanpham/uploads/<?php echo $row['hinhanh']?>">
                <p class="title-product">Tên sản phẩm: <?php echo $row['tensanpham'] ?></p>
                <p class="price-product">Giá: <?php echo number_format($row['giasp'],0,',','.').'vnd' ?></p>
                <p class="cate-product"><?php echo $row['tendanhmuc'] ?></p>
            </a>
        </li>
        <?php
        }
        ?>
    </ul>