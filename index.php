<!-- index.php -->
<?php  
    require_once('ows_database/ows_connection.php');

    $page_name = 'Home';
?>

    <?php include 'header.php';?>

	<div class="content"> 
        <h2 class="head-h text-white">CONTENT</h2>
        <?php 
            $select_items = "SELECT * FROM  items JOIN item_cats ON items.item_cat=item_cats.icat_id JOIN item_cat_status ON items.item_cat_stat=item_cat_status.icst_id JOIN users ON items.user=users.user_id JOIN item_image ON items.item_id=item_image.item WHERE items.is_sold=0";
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

                        <fieldset>
                            <legend>Contact:</legend>
                            <p>CALL:&nbsp;&nbsp;&nbsp;<strong>0<?php echo $item["phone_on"];?></strong></p>
                            <p>EMAIL: <strong><?php echo $item["email"];?></strong></p>
                            <p>MAP: &nbsp;&nbsp;&nbsp;&nbsp;<strong><?php echo $item["user_address"];?></strong></p>  
                        </fieldset>
                    </div>
                </div>
        <?php } ?>
    </div>
        
    <?php include 'footer.php';?>

<?php mysqli_close($ows_conn);?>
