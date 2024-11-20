<?php
    if(isset($_GET['trang'])){
        $page = $_GET['trang'];
    }
    else{
        $page=1;
    }
    if($page=='' || $page==1){
        $begin=0;
    }
    else{
        $begin = ($page*4)-4;
    }
    $sql_pro ="SELECT * FROM tbl_sanpham,tbl_danhmuc WHERE tbl_sanpham.id_danhmuc=tbl_danhmuc.id_danhmuc 
    ORDER BY tbl_sanpham.id_sanpham DESC LIMIT $begin,4";
    $query_pro = mysqli_query($mysqli,$sql_pro);
    
    
?>

<h1>Sản phẩm mới nhất</h1>
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
    <style type="text/css">
        ul.list_trang{
            padding:0;
            margin:0;
            list-style: none;
            display:flex;
        }
        ul.list_trang li{
            margin-left: 5px;
            background:burlywood;
            padding: 5px 13px;
        }
        ul.list_trang li a{
            color:black;
        }
    </style>
    <?php
        $sql_trang = mysqli_query($mysqli,"SELECT * FROM tbl_sanpham");
        $row_count = mysqli_num_rows($sql_trang);
        $trang = ceil($row_count/4);
    ?>
    <p>Trang hiện tại: <?php echo $page ?>/<?php echo $trang ?></p>
    <ul class=list_trang>
        <?php
            for($i=1;$i<=$trang;$i++){
        ?>
                <li <?php if($i==$page){echo 'style="background:blue;"';} else{ echo '';} ?>><a href="index.php?trang=<?php echo $i ?>"><?php echo $i ?></a></li>
        <?php
            }
        ?>
       
    </ul>
                  