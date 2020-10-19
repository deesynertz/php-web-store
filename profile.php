<!-- profile.php -->
<?php  
    session_start();
    include 'conts_variable.php';
    require_once('ows_database/ows_connection.php');

    if ($_SESSION['loged_in'] != TRUE) { 
        header("location: login.php");
    }

    $page_name = 'profile';
?>

    <?php include 'header.php';?>

	<div class="content">
        <h2 class="head-h text-white">PROFILE</h2>

        <?php if(isset($_GET['log_error'])) { $error_msg = $_GET['log_error'];?>
            <p class="text-yellow text-center"><?php echo $error_msg;?> </p>
        <?php } ?>
        <?php if(isset($_GET['log_success'])){ $success_msg = $_GET['log_success'];?> 
            <p class="text-green text-center"><?php echo $success_msg; ?></p>
        <?php  } ?>

            <!-- user_id ;;;;;; a_type_id   } -->
        <div class="row">
            <form method="POST" action="ows_database/php_sql_script.php" enctype="multipart/form-data">
        
            <?php 
                $user_id = $_SESSION['loged_in_role'];
                $pre_profile = "SELECT * FROM users JOIN users_login ON user=user_id JOIN access_types ON a_type_id=access_type WHERE users.user_id='".$_SESSION['loged_in_user_id']."'";
                $query_profile = mysqli_query($ows_conn, $pre_profile);


                while ($profile = mysqli_fetch_array($query_profile)) { ?>

                    <div class="col-6">
                        <label class="text-white">First Name</label><br>
                        <input type="text" value="<?php echo $profile['first_name'];?>" name="first_name" placeholder="First Name" required> <br>

                        <label class="text-white">Middle Name</label><br>
                        <input type="text" value="<?php echo $profile['middle_name'];?>" name="middle_name" placeholder="Middle Name"> <br>

                        <label class="text-white">Last Name</label><br>
                        <input type="text" value="<?php echo $profile['last_name'];?>" name="last_name" placeholder="item name" required> <br>

                        <label class="text-white">Address</label><br>
                        <input type="text" value="<?php echo $profile['user_address'];?>" name="address" placeholder="Address" required>
                    </div>

                    <div class="col-6">
                        <label class="text-white">Phone Number</label><br>
                        <input type="number" value="<?php echo '0'.$profile['phone_on'];?>" name="phone_on" placeholder="Last Name" required> <br>

                        <label class="text-white">Email</label><br>
                        <input type="email" value="<?php echo $profile['email'];?>" name="email" placeholder="Email" disabled> <br>
                    </div>

                    <div class="col-6">
                        <fieldset>
                            <legend>Fill below field If you want to UPDATE password</legend>
                            <input type="password" name="old_pass" placeholder="Enter Old password"> <br>
                            <input type="password" name="new_pass" placeholder="Enter New password"> <br>
                            <label class="text-white">Access Type</label><br>
                            <input type="text" value="<?php echo $profile['a_type_name'];?>" disabled>
                        </fieldset>
                    </div>

                    <div class="col-6">
                        <input class="btn right" type="submit" name="update_prof" value="Update &#10162;">
                    </div>
            <?php } ?>
            </form>
        </div>
    </div>
        
    <?php include 'footer.php';?>

    <?php mysqli_close($ows_conn);?>