<!-- login.php -->
<?php
    // require_once("ows_database/ows_connection.php");
    include 'conts_variable.php';

    $page_name = 'login';
?>

<?php include 'header.php';?>

	<div class="content">
        <!-- <div class="content_main"> -->
            <h2 class="head-h text-white text-center">LOGIN</h2>

            <p>13301284</p>
            <?php echo sha1('admin');?>

            <?php if(isset($_GET['log_error'])) { $error_msg = $_GET['log_error'];?>
                <p class="text-yellow text-center"><?php echo $error_msg;?> </p>
            <?php } ?>
            <?php if(isset($_GET['log_success'])){ $success_msg = $_GET['log_success'];?> 
                <p class="text-green text-center"><?php echo $success_msg; ?></p>
            <?php  } ?>

            <div class="myform">
                <form method="POST" action="ows_database/php_sql_script.php" autocomplete="off">
                    <div class="form-group">
                        <label>User name</label>
                        <input type="text" value="<?php if(isset($_GET['username'])){ echo $_GET['username'];}?>" name="user_name" placeholder="Enter Username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="us_password" placeholder="Enter password" required>
                    </div>

                    <div class="form-group">
                        <p class="text-white"> <a href="">forget password..?</a></p>
                    </div>
                    <div>
                        <input class="btn text-center" type="submit" name="login" value="login">
                    </div>


                </form>
            </div>
        <!-- </div> -->
    </div>

    <?php include 'footer.php';?>