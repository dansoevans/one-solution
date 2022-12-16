<?php
include('database.php');
if (isset($_POST["create"])) {
    $item = mysqli_real_escape_string($conn, $_POST["item"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $sold_by = mysqli_real_escape_string($conn, $_POST["sold_by"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $cost = mysqli_real_escape_string($conn, $_POST["cost"]);
    $sku = mysqli_real_escape_string($conn, $_POST["SKU"]);
    $barcode = mysqli_real_escape_string($conn, $_POST["barcode"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);
    $filename = $_FILES['uploaded_image']['name'];
    $tmpname = $_FILES['uploaded_image']['tmp_name'];
    $Image_folder = 'item-photos/';
    move_uploaded_file($tmpname, $Image_folder.$filename);
    $sqlInsert = "INSERT INTO items_data(item , category,sold_by , price , cost,SKU, barcode,stock, uploaded_image) VALUES ('$item','$category', '$sold_by', '$price', '$cost','$sku','$barcode','$stock','$filename')";
    if(mysqli_query($conn,$sqlInsert)){
        session_start();
        $_SESSION["create"] = "Item Added Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }

 
}
if (isset($_POST["edit"])) {
    $item = mysqli_real_escape_string($conn, $_POST["item"]);
    $price = mysqli_real_escape_string($conn, $_POST["price"]);
    $category = mysqli_real_escape_string($conn, $_POST["category"]);
    $category = mysqli_real_escape_string($conn, $_POST["sold_by"]);
    $cost = mysqli_real_escape_string($conn, $_POST["cost"]);
    $sku = mysqli_real_escape_string($conn, $_POST["SKU"]);
    $barcode = mysqli_real_escape_string($conn, $_POST["barcode"]);
    $stock = mysqli_real_escape_string($conn, $_POST["stock"]);
    $filename = $_FILES['uploaded_image']['name'];
    $tmpname = $_FILES['uploaded_image']['tmp_name'];
    $Image_folder = 'item-photos/';
    move_uploaded_file($tmpname, $Image_folder.$filename);
    $id = mysqli_real_escape_string($conn, $_POST["id"]);

    $sqlUpdate = "UPDATE items_data SET item = '$item', price = '$price', category = '$category', sold_by ='$sold_by', cost = '$cost' ,SKU = '$sku', barcode ='$barcode',stock ='$stock',uploaded_image = '$filename' WHERE id='$id'";
    if(mysqli_query($conn,$sqlUpdate)){
        session_start();
        $_SESSION["update"] = "Item Updated Successfully!";
        header("Location:index.php");
    }else{
        die("Something went wrong");
    }
  
}
?>