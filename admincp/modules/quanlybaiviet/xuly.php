<?php
include('../../config/config.php');
$tenbaiviet = $_POST['tenbaiviet'];
$tomtat = $_POST['tomtat'];
$noidung = $_POST['noidung'];
$tinhtrang = $_POST['tinhtrang'];
$danhmuc = $_POST['danhmuc'];
//Xu ly hinh anh
$hinhanh = $_FILES['hinhanh']['name'];
$hinhanh_tmp = $_FILES['hinhanh']['tmp_name'];
$hinhanh_time =time().'_'.$hinhanh;

if(isset($_POST['thembaiviet'])){
    $sql_them="INSERT INTO tbl_baiviet(tenbaiviet,hinhanh,tomtat,noidung,tinhtrang,id_danhmuc) VALUE('".$tenbaiviet."'
    ,'".$hinhanh_time."','".$tomtat."','".$noidung."','".$tinhtrang."','".$danhmuc."'
    )";
    mysqli_query($mysqli,$sql_them);
    move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh_time);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}
elseif(isset($_POST['suabaiviet'])){
    if($hinhanh!=''){
        move_uploaded_file($hinhanh_tmp,'uploads/'.$hinhanh);
    $sql_update="UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',hinhanh='".$hinhanh."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id='$_GET[idbaiviet]'";
    }
    else{
        $sql_update="UPDATE tbl_baiviet SET tenbaiviet='".$tenbaiviet."',tomtat='".$tomtat."',noidung='".$noidung."',tinhtrang='".$tinhtrang."',id_danhmuc='".$danhmuc."' WHERE id='$_GET[idbaiviet]'";
    }
    mysqli_query($mysqli,$sql_update);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}
else{
    $id=$_GET['idbaiviet'];
    $sql ="SELECT * FROM tbl_baiviet WHERE id='$id' LIMIT 1";
    $query = mysqli_query($mysqli,$sql);
    while($row=mysqli_fetch_array($query)){
        unlink('uploads/'.$row['hinhanh']);
    }
    $sql_xoa = "DELETE FROM tbl_baiviet WHERE id='".$id."'";
    mysqli_query($mysqli,$sql_xoa);
    header('Location:../../index.php?action=quanlybaiviet&query=them');
}
?>