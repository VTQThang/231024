<?php 
    require('.ketnotdtb.php');
    $id = (int) $_GET['id'];
    $image = "SELECT imgURL FROM 'sanpham' WHERE 'sanpham'.'masp'= $id";
    $query = mysqli_query($conn,$image);
    $after = mysqli_fecth_assoc($query);

    //delete file img
    if(file_exists("./images/".$after['imgURL'])){
        unlink("./images/".$after['imgURL']);
    }
    $sql = "DELETE FROM 'sanpham' WHERE 'sanpham'.'masp' = $id";
    mysqli_query($conn,$sql);
    header("location:trangChu.php");
    ?>