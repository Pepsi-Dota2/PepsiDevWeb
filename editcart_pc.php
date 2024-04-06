<?php
 require 'header.php';
 require 'DB.php';

$pro_id = mysqli_real_escape_string($conn,$_GET['pro_id']);
$bill_id = mysqli_real_escape_string($conn,$_GET['bill_id']);

$sql = "SELECT * FROM product JOIN bill_datail on product.pro_id = bill_datail.pro_id WHERE bill_id = $bill_id AND bill_datail.pro_id = $pro_id";
$rs = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($rs);


                        

?>

    <div class="container px-3 my-5 clearfix">
        <!-- Shopping cart table -->
        <d  iv class="card">
            <div class="card-header">
                <h2>Edit Cart</h2>
            </div>

            
            <div class="card-body">
                <div class="table-responsive">
                
                <table class="table table-bordered m-0">
                
                    <thead>
                    <tr>
                        <!-- Set columns width -->
                        <th class="text-center padd" style="min-width: 400px;">product-name</th>
                        <th class="text-right " style="width: 100px;">Price</th>
                        <th class="text-center " style="width: 120px;">Quantity</th>
                        <th class="text-right " style="width: 100px;">Edit</th>
                        
                    </tr>
                    </thead>
                    <tbody> 
                    <tr>
                <td>
                <form action="edit_pc.php" method="post">
                        <input type="hidden" name="pro_id" value="<?php echo $pro_id ?>">
                        <input type="hidden" name="bill_id" value="<?php echo $bill_id?>">
                        <input type="hidden" name="price" value="<?php echo $row['price'] ?>">

                        <div class="media align-items-center">
                            <div class="media-body">
                            <a href="#" class="d-block text-dark">productName: <b><?php echo $row['pro_name'] ?></b> </a>
                            </div>
                        </div>
                        </td>
                        <td class="text-right font-weight-semibold align-middle p-4"><?php echo $row['price'] ?></td>
                        <td class="align-middle p-4"><input type="number" name="qty" class="form-control text-center" value="<?php echo $row['pro_qty'] ?>" min="0"></td>
                        <td class="text-right font-weight-semibold align-middle p-4">
                        <button type="submit" class="btn btn-warning">SAVE</button>
                </form>
                </td>

                </tr>
                        </tbody>
                    </tr>
                </table>
                
                </div>
                <!-- / Shopping cart table -->
            
            </div>
           
        </div>
    </div>
    

   
   

<?php require 'footer.php' ?>