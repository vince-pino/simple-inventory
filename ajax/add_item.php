<?php 

require("../db_config.php");

if (isset($_POST['add_item_form'])) {
  
  $name = $_POST['name'];
  $unit = $_POST['unit'];
  $price = $_POST['price'];
  $expiry_date = $_POST['expiry_date'];
  $available_inventory = $_POST['available_inventory'];
  $image = $_FILES['image']['name'];
  $tmp_name = $_FILES['image']['tmp_name'];

  move_uploaded_file($tmp_name, "../images/$image");


  $sql = "INSERT INTO products (name, unit, price, expiry_date, available_inventory, image) VALUES ('$name', '$unit', '$price', '$expiry_date', '$available_inventory', '$image')";


  if ($conn->query($sql) === TRUE) {
    echo 1;
  }

}

?>