<!-- dashboard.php -->
<?php  
    session_start();
    require_once('ows_database/ows_connection.php');

    if ($_SESSION['loged_in'] != TRUE) { 
        header("location: login.php");
    }

    if (isset($_POST['sold_item'])) {
        $sold_item = "UPDATE items SET is_sold=1 WHERE item_id='".$_POST['item_id_sold']."'";
        mysqli_query($ows_conn, $sold_item);
    }

    $page_name = 'dashboard';
?>

    <?php include 'header.php';?>

	<div class="content">
        <h2 class="head-h text-white">ITEMS</h2>

        <?php if(isset($_GET['log_error'])) { $error_msg = $_GET['log_error'];?>
            <p class="text-yellow text-center"><?php echo $error_msg;?> </p>
        <?php } ?>
        <?php if(isset($_GET['log_success'])){ $success_msg = $_GET['log_success'];?> 
            <p class="text-green text-center"><?php echo $success_msg; ?></p>
        <?php  } ?>

          
        <?php 
            $user_id = $_SESSION['loged_in_user_id'];
            $select_items = "SELECT * FROM  items JOIN item_cats ON items.item_cat=item_cats.icat_id JOIN item_cat_status ON items.item_cat_stat=item_cat_status.icst_id JOIN item_image ON items.item_id=item_image.item WHERE items.user='$user_id'";
            $data_items = mysqli_query($ows_conn, $select_items);
            while ($item = mysqli_fetch_array($data_items)) { 

                $imageURL = 'ows_item_img/'.$item["item_img_name"];

                if ($item["icst_name"] == 'new') {
                    $icst_badge = 'bg-green';
                }else if ($item["icst_name"] == 'used') {
                    $icst_badge = 'bg-red';
                }else{
                    $icst_badge = 'bg-yellow';
                } ?>

                <div class="box"> 
                    <a href="<?php echo $imageURL; ?>">
                      <img class="img_item" src="<?php echo $imageURL; ?>" alt="<?php echo $item["item_name"]; ?>">
                    </a>

                    <div class="pro-left">
                        <p>Category: <br>&nbsp;&nbsp;<?php echo $item["icat_name"]; ?></p>
                        <p>Status:  <br>&nbsp;&nbsp; <span class="<?php echo $icst_badge;?>"><?php echo $item["icst_name"]; ?></span></p>

                        <p>Is item sold ?:
                        &nbsp;&nbsp; <form method="POST" action="dashboard.php">
                            <input type="hidden" value="<?php echo $item["item_id"]; ?>" name="item_id_sold">
                            
                            <input type="submit" name="sold_item" class="<?php  if($item["is_sold"] == 0){ echo 'text-green'; }else{ echo 'text-red text-muted disable'; }?>" value="&#10004;"> 
                        </form>
                    </div>
                    <div class="pro-right">
                       <table>
                            <tr>
                                <th>Name</th><td col='3'><?php echo $item["item_name"]; ?></td>
                            </tr>
                            <tr>
                                <th>Price</th><td col='3'><?php echo $item["price"]; ?>/=TSH</td>
                            </tr>
                        </table>

                    </div>
                </div>
            <?php } ?>   
    </div>

    <?php include 'footer.php';?>

<?php mysqli_close($ows_conn);
