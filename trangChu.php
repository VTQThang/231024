<style>
    #productList{
        font-family: Arial, Helvetica, sans-serif;
        border-collapse: collapse;
        width: 100%;
    }
        #profuctList td, #productList th{
            border: 1px solid #ddd;
            padding: 8px;
        }
        #productList tr:ntn-child(even){background-color:#f2f2f2;}
        #productList tr:hover {background-color: #ddd;}
        #productList th{
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #04AA6D;
            color: white;
        }
        button{
            background-color: #2F54EB;
            padding: 8px 16px;
        } button a{
            color: white;
        }
        a{
            text-decoration: none;
        }

</style>
<?php
    require("ketnoidtb.php");
    $sql = "SELECT * FROM 'sanpham'";
    $query = mysqli_query($conn,$sql);
?>
<h1>Quản lý danh sách sản phẩm</h1>
<button>
    <a href="themsanpham.php">Thêm sản phẩm</a>
</button>
<table id="productList">
    <tr>
        <th>Mã sản phẩm</th>
        <th>Tên sản phẩm</th>
        <th>Giá sản phẩm</th>
        <th>Hình ảnh</th>
        <th>Hành động</th>
    </tr>
    <?php
        while($row = mysqli_fecth_array($query)){
    ?>
    <tr>
        <td><?= $row["masp"] ?></td>
        <td><?= $row["tensp"] ?></td>
        <td><?= $row["gia"] ?>&nbsp; VND</td>
        <td><img style="width: 200px;height:200px"src="./images/" <?= $row["imgURL"] ?> alt=""></td>
        <td><a onclick="return xoasanpham()" href="suasanpham.php?id=<?= $row['masp']?>">Sửa</a>
            <a href="xoasanpham.php?id=<?=$row['masp']?>">Xoá</a>
    </td>
    </tr>
        <?php }?>
</table>