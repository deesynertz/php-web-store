<!-- adds.php -->
<?php  
    session_start();
    include 'conts_variable.php';
    require_once('ows_database/ows_connection.php');

    if ($_SESSION['loged_in'] != TRUE) { 
            header("location: login.php");
    }

    $page_name = 'adds';
?>

    <?php include 'header.php';?>

	<div class="content">
        <h2 class="head-h text-white"><?php echo $_SESSION['loged_in_surname'];?> as Admin Functions</h2>

        <?php if(isset($_GET['log_error'])) { $error_msg = $_GET['log_error'];?>
            <p class="text-yellow text-center"><?php echo $error_msg;?> </p>
        <?php } ?>
        <?php if(isset($_GET['log_success'])){ $success_msg = $_GET['log_success'];?> 
            <p class="text-green text-center"><?php echo $success_msg; ?></p>
        <?php  } ?>
                 
        <div class="box">
        	<fieldset>
        		<legend>User Access Type</legend>
        		<form method="POST" action="ows_database/php_sql_script.php">
	                <input type="text" id="a_type_name" name="a_type_name" placeholder="Enter access type name" required> <br>
                    <div>
                        <input class="btn" type="submit" name="a_type_send" value="Add Access Type">
                    </div>
                </form>
        	</fieldset>
        </div>

		<div class="box">
			<fieldset>
				<legend>Item Category</legend>
				<form method="POST" action="ows_database/php_sql_script.php">
		            <input type="text" id="icat_name" name="icat_name" placeholder="Enter Item Category" required> <br>
		            <div>
		                <input class="btn btn-yellow" type="submit" name="category_send" value="Add Category">
		            </div>
		        </form>
			</fieldset>
		</div>

		<div class="box">
			<fieldset>
				<legend>Item Status</legend>
				<form method="POST" action="ows_database/php_sql_script.php">
		            <input type="text" id="icst_name" name="icst_name" placeholder="Enter Item status" required> <br>
		            <div>
		                <input class="btn btn-blue" type="submit" name="item_status_send" value="Add Item Status">
		            </div>
		        </form>
			</fieldset>
		</div>
    </div>

    <?php include 'footer.php';?>

<?php mysqli_close($ows_conn);
