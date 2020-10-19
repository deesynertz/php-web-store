<!-- add_item.php -->
<?php  
	session_start();
    include 'conts_variable.php';
    require_once('ows_database/ows_connection.php');

    if ($_SESSION['loged_in'] != TRUE) { 
        header("location: login.php");
    }

    $page_name = 'add_item';
?>

    <?php include 'header.php';?>

	<div class="content">
        
            <h2 class="head-h text-white">ADD ITEM</h2>
            
            <?php if(isset($_GET['log_error'])) { $error_msg = $_GET['log_error'];?>
                <p class="text-yellow text-center"><?php echo $error_msg;?> </p>
            <?php } ?>
            <?php if(isset($_GET['log_success'])){ $success_msg = $_GET['log_success'];?> 
                <p class="text-green text-center"><?php echo $success_msg; ?></p>
            <?php  } ?>

            <div class="row">
                <form method="POST" action="ows_database/php_sql_script.php" enctype="multipart/form-data">
                    <div class="col-6">
                        <label for="item_name" class="text-white">Item Name</label><br>
                        <input type="text" id="item_name" name="item_name" placeholder="item name" required> <br>

                        <label for="item_cat" class="text-white">Item Category</label><br>
                        <select id="item_cat" name="item_cat" required>
                            <option disabled selected>Select Item Category</option>
                            <?php 
                                $select = "SELECT * FROM item_cats";
                                $data = mysqli_query($ows_conn, $select);
                                while ($result = mysqli_fetch_array($data)) {
                                    echo "<option value='".$result["icat_id"]."'>".$result["icat_name"]."</option>";
                                }
                            ?>
                        </select> 
                        <label for="price" class="text-white">Price (TSH)</label><br>
                        <input type="number" id="price" name="price" required> <br>   
                    </div>
                    <div class="col-6">
                        <label for="item_cat_stat" class="text-white">Item Status</label><br>
                        <select id="item_cat_stat" name="item_cat_stat" required>
                            <option disabled selected>Select Item Status</option>
                            <?php 
                                $select_stat = "SELECT * FROM  item_cat_status";
                                $data_stat = mysqli_query($ows_conn, $select_stat);
                                while ($result_stat = mysqli_fetch_array($data_stat)) {
                                    echo "<option value='".$result_stat["icst_id"]."'>".$result_stat["icst_name"]."</option>";
                                }
                            ?>
                        </select> <br>

                        <label for="item_img" class="text-white">Image</label><br>
                        <input type="file" id="item_img" name="item_img" required> <br>
                    </div>
                    <div>
                        <input class="btn text-center" type="submit" name="add_item" value="Add Item">
                    </div>
                </form>
            </div>
        
    </div>

    <?php include 'footer.php';?>

<?php mysqli_close($ows_conn);?>