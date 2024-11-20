<?php
    include('../../config/config.php');
    if(isset($_GET['cart_status'])&& isset($_GET['code'])){
        $status = $_GET['cart_status'];
        $code = $_GET['code'];
        $sql = mysqli_query($mysqli,"UPDATE tbl_cart SET cart_status ='".$status."'WHERE code_cart ='".$code."' ");
        header('Location:../../index.php?action=quanlydonhang&query=lietke');
    }

?>