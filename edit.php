<?php require 'header.php' ?>
<?php 
	$pro_id = mysqli_real_escape_string($con,$_GET['pro_id']);
	$bill_id = mysqli_real_escape_string($con,$_GET['bill_id']);
	$sql = "SELECT * FROM bill_datail 
            INNER JOIN product 
            ON bill_datail.pro_id = product.pro_id WHERE bill_id = $bill_id AND bill_datail.pro_id = $pro_id";
	$rs = mysqli_query($con,$sql);
    $row = mysqli_fetch_array($rs);

?>	
		<!-- SECTION -->
		<div class="section">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- Product main img -->
					<div class="col-md-6">
						<div id="product-main-img">
							<div class="product-preview">
								<img src="./img/<?php echo $row['pro_img'] ?>" alt="">
							</div>
						</div>
					</div>
					<!-- /Product main img -->

					
					<!-- Product details -->
					<div class="col-md-6">
						<div class="product-details">
							<h2 class="product-name" id="name"><?php echo $row['pro_name'] ?></h2>
							<div>
								<div class="product-rating">
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star"></i>
									<i class="fa fa-star-o"></i>
								</div>
								<a class="review-link" href="#">10 Review(s) | Add your review</a>
							</div>
							<div>
								<h3 class="product-price" ><span id="price"><?php echo$row['pro_price'] ?></span> Kip</h3>
								<span class="product-available">In Stock</span>
							</div>
							<div class="product-options">
								<h4>QTY =</h4>
								<input type="number" value="<?php echo $row['qty'] ?>" name="qty" id="qty" min="0" max="50">
								
							</div>

							<div class="add-to-cart">	
								<a href="#" id="add">
									<button class="add-to-cart-btn"><i class="fa fa-shopping-cart"></i> SAVE </button>
								</a>
							</div>

							<ul class="product-btns">
								<li><a href="#"><i class="fa fa-heart-o"></i> add to wishlist</a></li>
								<li><a href="#"><i class="fa fa-exchange"></i> add to compare</a></li>
							</ul>

							<ul class="product-links">
								<li>Category:</li>
								<li><a href="#">Headphones</a></li>
								<li><a href="#">Accessories</a></li>
							</ul>

							<ul class="product-links">
								<li>Share:</li>
								<li><a href="#"><i class="fa fa-facebook"></i></a></li>
								<li><a href="#"><i class="fa fa-twitter"></i></a></li>
								<li><a href="#"><i class="fa fa-google-plus"></i></a></li>
								<li><a href="#"><i class="fa fa-envelope"></i></a></li>
							</ul>

						</div>
					</div>
					<!-- /Product details -->

					
					<!-- /product tab -->
				</div>
				<!-- /row -->
			</div>
			<!-- /container -->
		</div>
		<!-- /SECTION -->

					

		
        <?php require 'footer.php' ?>

		<script>
			
			$(document).ready(function(){
				$("#add").click(function(){
					var name = $("#name").text();
					var price = $("#price").text();
					var qty = $("#qty").val();
					var pro_id = <?php echo $pro_id ?>;
					var bill_id = <?php echo $bill_id ?>;
					var data =  "bill_id=" +bill_id+ "&pro_id=" +pro_id+ "&price=" +price+ "&qty=" +qty;
                    //alert(bill_id);
					$.ajax({
						type : "POST",
						url : "edit_pc.php",
						data : data,
							success : function(rs){
								Swal.fire({
                                    title: "ແກ້ໄຂສຳເລັດ",
                                    text: "You clicked the button!",
                                    icon: "success",
                                    
                                }).then(function() {
                                     window.location.href = "cart.php"; // redirect to cart.php after the Swal dialog is closed
                    });
                                // alert(rs);
								
							}
					})



					
 					 


					//alert(data);
					// alert(name);
					// alert(price);
					// alert(qty);
					// alert(pro_id);
					
					
				})
			})
		</script>
