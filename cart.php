<?php
 require 'header.php';
 $u_id = $_SESSION['user_id'];
 $sql = "SELECT * FROM bill WHERE user_id = $u_id AND bill_total = 0";
 $rs = mysqli_query($conn,$sql);
 $num = MYSQLI_NUM_ROWS($rs);
    if($num > 0) {

 $row = mysqli_fetch_array($rs);
 $bill_id = $row['bill_id'];


?>

    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <div class="card">
            <div class="card-header">
                <h2>Shopping Cart <?php echo $bill_id ?></h2>
            </div>


            <div class="card-body">
                <div class="table-responsive">

                <table class="table table-bordered m-0">
                    <thead>
                    <tr>
                        <!-- Set columns width -->
                        <th class="text-center padd" style="min-width: 400px;">product-name &amp; detail</th>
                        <th class="text-right " style="width: 100px;">Price</th>
                        <th class="text-center " style="width: 120px;">Quantity</th>
                        <th class="text-right " style="width: 100px;">Total</th>
                        <th class="text-right " style="width: 100px;">Delete</th>
                        <th class="text-right " style="width: 100px;">Edit</th>
                        
                    </tr>
                    </thead>
                    <tbody>
                    <?php
                            
                            $sql = "SELECT * FROM bill_datail INNER JOIN product  on bill_datail.pro_id = product.pro_id  where bill_id = $bill_id";
                            $rs_bill = mysqli_query($conn,$sql);
                            $alltotal = 0;
                            while($row_bill = mysqli_fetch_array($rs_bill)){
                                $alltotal += $row_bill['total'];
                               

                    ?>

                    <tr>
                        <td class="p-4">
                        <div class="media align-items-center">
                            <div class="media-body">
                            <a href="#" class="d-block text-dark">productName: <b><?php echo $row_bill['pro_name'] ?></b> </a>
                            </div>
                        </div>
                        </td>
                        <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row_bill['price'] ?></td>
                        <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row_bill['qty'] ?></td>
                        <td class="align-middle p-4"><?php echo $row_bill['total'] ?></td>
                        </td>
                        <td class="text-right font-weight-semibold align-middle p-4">
                        <a href="deletecart_pc.php?pro_id=<?php echo $row_bill['pro_id'] ?>&&bill_id=<?php echo $row_bill['bill_id'] ?>"><button type="button" class="btn btn-danger">DELETE</button></a>
                       
                       <td>                        
                        <a href="editcart_pc.php?pro_id=<?php echo $row_bill['pro_id'] ?>&&bill_id=<?php echo $row_bill['bill_id'] ?>"><button type="button" class="btn btn-warning">EDIT</button></a>
            
                        
                        </td>
                    </tr>
            
                    <?php }?>

                    </tbody>
                </table>
                </div>
                <!-- / Shopping cart table -->
            
                <div class="d-flex flex-wrap justify-content-between align-items-center pb-4">
                <div class="d-flex">
                    <div class="text-right mt-4 mr-5">
                    <label class="text-muted font-weight-normal m-0">Discount</label>
                    <div class="text-large"><strong>$20</strong></div>
                    </div>
                    <div class="text-right mt-4">
                    <label class="text-muted font-weight-normal m-0"> <h3> Total price:</h3></label>
                    <div class="text-large"> <h3><strong><?php echo $alltotal ?> </strong> KIP</h3></div>
                    </div>
                </div>
                </div>
        <div class="float-right">
          <button type="button" class="btn btn-lg btn-default md-btn-flat mt-2 mr-3">Back to shopping</button>
          <a href="confirm.php?total=<?php echo $alltotal ?>&&bill_id=<?php echo $bill_id ?>">
          <button type="button" class="btn btn-lg btn-primary mt-2">CONFIRM</button>
          </a>
        </div>
            
            </div>
        </div>
        </div>

    <?php } ?>

<?php require 'footer.php' ?>