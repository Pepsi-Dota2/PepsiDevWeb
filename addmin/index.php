<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <title>admin</title>
</head>
<body>

<div class="container">

<nav class="navbar navbar-expand-lg navbar-light navbar navbar-light" style="background-color: #e3f2fd;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Admin</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="#">Order</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#">Products</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            Users
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><a class="dropdown-item" href="#">admin</a></li>
            <li><a class="dropdown-item" href="#">User</a></li>
          </ul>
        </li>
        <li class="nav-item">
          <a class="nav-link active" href="#" tabindex="-1" aria-disabled="true">History</a>
        </li>
      </ul>
      <form class="d-flex">
        <input class="form-control me-2 " type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-success" type="submit">Search</button>
      </form>
    </div>
  </div>
</nav>
</div>



<!-- table -->
<div class="container p-2 ">
<table class="table border border-primary">
  <thead>
    <tr>
      
      <th scope="col">Bill_id</th>
      <th scope="col">Date</th>
      <th scope="col">Total</th>
      <th scope="col">Costomer</th>
      <th scope="col">Send</th>
      <th scope="col">Delete</th>
    </tr>
  </thead>

  <tbody>
<?php 
require 'db.php';
$sql = "SELECT * FROM bill INNER JOIN user 
ON bill.user_id = user.user_id 
WHERE status = 1";
$rs = mysqli_query($conn,$sql);

while($row = mysqli_fetch_array($rs)){

?>
    <tr>
      <td>
      <a class="text-decoration-none" href="prodetail.php?bill_id=<?php echo $row['bill_id']?>&&user_id=<?php echo $row['user_id']?>"><?php echo $row['bill_id']?></a>
      </td>
      <td><?php echo $row['bill_dete'] ?></td>
      <td><?php echo $row['bill_total'] ?> Kip</td>
      <td><?php echo $row['user_name'] ?></td>
      <td><a href="send.php?bill_id=<?php echo $row['bill_id']?>"><button type="button" class="btn btn-primary">send</button></a></td>
      <td><a href="delete.php?bill_id=<?php echo $row['bill_id']?>"><button type="button" class="btn btn-danger">Delete</button></a></td>
  </tbody>
<?php } ?>

</table>
</div>

<!-- end table -->
</body>
</html>