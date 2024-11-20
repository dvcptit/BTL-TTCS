<?php
    if(isset($_POST['doimatkhau'])){
        $taikhoan = $_POST['email'];
        $matkhaucu = md5($_POST['password_cu']);
        $matkhaumoi = md5($_POST['password_moi']);
        $sql="SELECT * FROM tbl_dangky WHERE email='".$taikhoan."' AND matkhau='".$matkhaucu."' LIMIT 1";
        $row=mysqli_query($mysqli,$sql);
        $count = mysqli_num_rows($row);
        if($count>0){
            $sql_update= mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau='".$matkhaumoi."' WHERE email='" . $taikhoan . "' ");
            echo '<p style="color: green">Mật khẩu đã được thay đổi</p>';
        }
        else{
            echo '<p style="color: red">Tài khoản hoặc mật khẩu cũ không chính xác</p>';
        }
    }
?>
<form action="" autocomplete="off" method="POST">
            <table border="1" class="table-login" style="text-align:center;border-collapse:collapse">
            <tr>
                <td colspan="2"><h3>Đổi mật khẩu Khách Hàng</h3></td>
            </tr>
            <tr>
                <td>Tài khoản</td>
                <td><input type="text" name="email"></td>
            </tr>
            <tr>
                <td>Mật khẩu cũ</td>
                <td><input type="text" name="password_cu"></td>
            </tr>
            <tr>
                <td>Mật khẩu mới</td>
                <td><input type="text" name="password_moi"></td>
            </tr>
            <tr>
                <td colspan="2"><input type="submit" name="doimatkhau" value="Đổi mật khẩu"></td>
            </tr>
            </table>
        </form>