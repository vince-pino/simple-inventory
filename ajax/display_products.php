<?php

require('../db_config.php');

if (isset($_POST['get_products'])) {

  $sql = "SELECT * FROM products";
  $result = $conn->query($sql);

  $data = "";
  $i = 1;

    while ($row = mysqli_fetch_assoc($result)) {
      $date = new DateTime($row['expiry_date']);
      $date = date_format($date, 'F j, Y');
      $cost = $row['price'] * $row['available_inventory'];
      $cost = number_format($cost, 2, '.', ',');

      $price = number_format($row['price'], 2, '.', ',');

      $data .= "
          <tr>
            <th class='text-center align-middle' scope='row'>$i</th>
            <td class='text-center align-middle'>$row[name]</td>
            <td class='text-center align-middle'>$row[unit]</td>
            <td class='text-center align-middle'>₱ $price</td>
            <td class='text-center align-middle'>$date</td>
            <td class='text-center align-middle'>$row[available_inventory]</td>
            <td class='text-center align-middle'>₱ $cost</td>
            <td class='text-center align-middle'><img src='images/$row[image]' width='100' height='100'></td>
            <td class='text-center align-middle'><button class='btn btn-danger' onclick='deleteProduct($row[id])'>Delete</button></td>
          </tr>
      ";
      $i++;
    }
  echo $data;

}

?>