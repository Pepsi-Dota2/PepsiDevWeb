<?php
        require 'db.php';
        $user_id = mysqli_real_escape_string($conn,$_GET['user_id']);

      
      $sql_user = "SELECT * FROM user WHERE user_id = $user_id";
      $rs_user = mysqli_query($conn,$sql_user);
      $row_user = mysqli_fetch_array($rs_user);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <title>bill_detail</title>
</head>
<body>

<div class="container">
<h1>Customer-detail</h1>


<h3>email:<?php echo $row_user['email']?></h3>
<h3>Name:<?php echo $row_user['user_name']?></h3>
<h3>tel:<?php echo $row_user['user_phone']?></h3>

    <table class="table">
      <thead>
        <tr>
          <th scope="col">Product_name</th>
          <th scope="col">Qty</th>
          <th scope="col">Price</th>
        </tr>
      </thead>
      <tbody>

    <?php
        require 'db.php';
        $bill_id = mysqli_real_escape_string($conn,$_GET['bill_id']);
      
      $sql = "SELECT * FROM bill_datail 
      INNER JOIN product ON bill_datail.pro_id = product.pro_id
      WHERE bill_id = $bill_id";
      $rs = mysqli_query($conn,$sql);
      
      while($row = mysqli_fetch_array($rs)){

     
    ?>
        <tr>
          <td><?php echo $row['pro_name']?></td>
          <td><?php echo $row['qty']?></td>
          <td><?php echo $row['price'] ?></td>
        </tr>

        <?php  } ?>
      </tbody>
    </table>

</div>
</body>
</html>
