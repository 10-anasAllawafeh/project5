<?php 
    session_start();
    require_once('./config/config.php');    
    require_once('include/helpers.php');
    $sql="SELECT * FROM order_details";  
    $handle = $db->prepare($sql);
    $handle->execute();
    $Products = $handle->fetchAll(PDO::FETCH_ASSOC);

    if(isset($_GET['action'],$_GET['item']) && $_GET['action'] == 'remove')
    {
        unset($_SESSION['cart_items'][$_GET['item']]);
        header('location:cart.php');
        exit();
    }
	
	$pageTitle = 'Demo PHP Shopping cart - Add to cart using Session';
	$metaDesc = 'Demo PHP Shopping cart - Add to cart using Session';
	
    include('./include/header.php');

    //pre($_SESSION);
    if (isset($_GET['delete'])) {
        $sql="DELETE FROM `order_details`";
        $handle = $db->prepare($sql);
        $handle->execute();
    }
?>
<div class="row">
    <div class="col-md-12">
        <?php if(empty($Products)){?>
        <table class="table">
            <tr>
                <td>
                    <p>Your cart is emty</p>
                </td>
            </tr>
        </table>
        <?php }?>
        <?php if(isset($Products) && count($Products) > 0): ?>
        <table class="table">
           <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Qty</th>
                    <th>Total</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    $totalCounter = 0;
                    $itemCounter = 0;
                    foreach($Products as $key => $item){

                    //  $imgUrl = PRODUCT_IMG_URL.str_replace(' ','-',strtolower($item['pname']))."/".$item['product_img'];   
                    
                    $total = $item['product_price'] * $item['qty'];
                    $totalCounter+= $total;
                    $itemCounter+=$item['qty'];
                    ?>
                    <tr>
                        <td>
                            <img src="" alt="pic"class="rounded img-thumbnail mr-2" style="width:60px;"><?php echo $item['product_name'];?>
                            
                            <a href="cart.php?action=remove&item=<?php echo $key?>" class="text-danger">
                            <i class="fa-solid fa-trash"></i>
                            </a>
                        </td>
                        <td>
                            $<?php echo $item['product_price'];?>
                        </td>
                        <td>
                            <input type="number" name="" class="cart-qty-single" data-item-id="<?php echo $key?>" value="<?php echo $item['qty'];?>" min="1" max="1000" >
                        </td>
                        <td>
                            <?php echo $total;?>
                        </td>
                    </tr>
                <?php }?>
                <tr class="border-top border-bottom">
                <form action="cart.php" method="get">
                <td><button type="submit" class="btn btn-danger btn-sm" id="emptyCart" name="delete">Clear Cart</button></td>
                           </form>
                    
                    <td></td>
                    <td>
                        <strong>
                            <?php 
                                echo ($itemCounter==1)?$itemCounter.' item':$itemCounter.' items'; ?>
                        </strong>
                    </td>
                    <td><strong>$<?php echo $totalCounter;?></strong></td>
                </tr> 
                </tr>
            </tbody> 
        </table>
        <div class="row">
            <div class="col-md-11">
				<a href="checkout.php">
					<button class="btn btn-primary btn-lg float-right">Checkout</button>
				</a>
            </div>
        </div>
        
        <?php endif; ?>
    </div>
</div>
<?php include('include/footer.php');?>