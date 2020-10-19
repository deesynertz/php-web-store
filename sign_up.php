<!-- sign_up.php -->
<?php
    $page_name = 'sign_up';
?>

    <?php include 'header.php';?>

	<div class="content">
            <h2 class="head-h text-white text-center">SIGN UP</h2>

            <?php if(isset($_GET['log_error'])) { $error_msg = $_GET['log_error'];?>
                <p class="text-yellow text-center"><?php echo $error_msg;?> </p>
            <?php } ?>
            <?php if(isset($_GET['log_success'])){ $success_msg = $_GET['log_success'];?> 
                <p class="text-green text-center"><?php echo $success_msg; ?></p>
            <?php  } ?>
            
            
            <div class="myform">
                <form method="POST" action="ows_database/php_sql_script.php" autocomplete="off">
                    <div class="form-group">
                        <!-- <label for="f_name">Reg No</label> -->
                        <input type="text" id="reg_no" name="reg_no" placeholder="Enter Reg Number" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="f_name">First name</label> -->
                        <input type="text" id="f_name" name="f_name" placeholder="Enter first name" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="m_name">Middle name</label> -->
                        <input type="text" id="m_name" name="m_name" placeholder="Enter middle name">
                    </div>
                    <div class="form-group">
                        <!-- <label for="l_name">Last name</label> -->
                        <input type="text" id="l_name" name="l_name" placeholder="Enter last name" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="phone_no">Phone number</label> -->
                        <input type="number" id="phone_no" name="phone_no" placeholder="Enter Phone number" required>
                    </div>
                    <div class="form-group">
                        <!-- <label for="user_name">Email</label> -->
                        <input type="email" id="user_email" name="user_email" placeholder="Enter Email" required>
                    </div>
                    <!-- <div class="form-group">
                        <label for="user_img">User Image</label>
                        <input type="file" id="user_img" name="user_img">
                    </div> -->
                    <div class="form-group">
                        <!-- <label for="user_addres">Adress</label> -->
                        <input type="text" id="user_addres" name="user_addres" placeholder="Enter Adress" required>
                    </div>

                    <fieldset>
                        <legend>Strong Password</legend>

                        <div class="form-group">
                            <!-- <label for="user_addres">Adress</label> -->
                            <input type="password" id="user_addres" name="password" placeholder="Enter Password" required>
                        </div>
                    </fieldset>
                    <div class="form-group">
                        <input class="btn text-center" type="submit" name="sign_up" value="Sign Up">
                    </div>
                </form>
            </div>
        
    </div>

    <?php include 'footer.php';?>

    