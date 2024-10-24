<a href="trangChu.php">Quay về</a>
<h1>Cập nhật sản phẩm</h1>
<form action="" method="POST" enctype="mutipart/form-data">
    <div>
        <label for="ten">Tên sản phẩm</label>
        <input type="text" id='ten' name= 'ten' value="<?= $row["tensp"]?>">
    </div>
    <div>
        <label for="gia">Giá sản phẩm</label>
        <input type="number" id='gia' name= 'gia' value="<?= $row["gia"]?>">
    </div>
    <div>
        <img style="width:200px;height: 200px;" src='./images/<?= $row["imgURL"]?>' alt="">
    </div>
    <div>
        <label for="file">Hình ảnh</label>
        <input type="file" id='file' name= 'hinhanh' value="Choose File">
    </div>
    <div>
        <label for="mota">Mô tả</label>
       <textarea name="mota" id="mota" cols="30" rows="10"><?=$row["mota"]?></textarea>
    </div>
    <button type="submit" name="submit">Cập nhật sản phẩm</button>
</form>

<?php 
if(isset($_POST['submit'])){
    $gia = $_POST['gia'];
    $tensp = $_POST['ten'];
    $mota = $_POST['mota'];
    $hinhanh = $_FILES['hinhanh']['name'];
    $target_dir = "./images/";
    if($hinhanh){
        if(file_exists("./iamges/".$img)){
            unlink("./images/".$img);
        }
        $target_file = $target_dir.$hinhanh;
    }else{
        $target_file = $target_dir.$img;
        $hinhanh = $img;
    }
    if(isset($tensp) && isset($gia) && isset($mota) && isset($hinhanh)){
        move_uploaded_file($_FILES["hinhanh"]["tmp_name"],$target_file);
        $sql = "UPDATE 'sanpham' SET 'tensp' = '$tensp','gia' = '$gia', 'mota' = '$mota', 'imgURL' = '$hinhanh'
        WHERE 'sanpham'.'masp' = '$masp';";
        mysqli_query($conn,$sql);
        header("Location:trangChu.php");
    }
}