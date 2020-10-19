<!-- php_sql_script.php -->
<?php
    /* ======== SESSION & CONNECTION ==========*/
    session_start();
	include "ows_connection.php";

    /* ======== NORMAL USER ACTIONS ===========*/
    //01: Self sign up
    if (isset($_POST['sign_up'])) {

        $reg_no       = $_POST['reg_no'];
        $f_name       = $_POST['f_name'];
        $m_name       = $_POST['m_name'];
        $l_name       = $_POST['l_name'];
        $phone_no     = $_POST['phone_no'];
        $user_email   = $_POST['user_email'];
        $user_img     = $_POST['user_img'];
        $user_addres  = $_POST['user_addres'];
        $password     = sha1($_POST['password']);
        $access_type  = 2;
        
        $email_or_reg = "SELECT * FROM users WHERE user_id='$reg_no' OR email='$user_email' LIMIT 1";

        $pre_sign_up ="INSERT INTO users(user_id,first_name,middle_name,last_name,phone_on,email,user_address) VALUES('$reg_no','$f_name','$m_name','$l_name','$phone_no','$user_email','$user_addres')";

        $login_sql = "INSERT INTO users_login(user_pwd,user,access_type) VALUES('$password','$reg_no','$access_type')";

        $run_query  = mysqli_query($ows_conn, $email_or_reg);
        $count = mysqli_num_rows($run_query);
        $email_or_reg_result = mysqli_fetch_array($run_query);

        if ($count == 1) {
          header("location: ../sign_up.php?log_error=Regno or Email is exist!!");
        } else {
            $insert_query  = mysqli_query($ows_conn, $pre_sign_up);

            if ($insert_query) {

                $insert_login_query  = mysqli_query($ows_conn, $login_sql);

                if ($insert_login_query) {
                    header("location: ../login.php?log_success=successfully&username=$reg_no");
                }else{
                    header("location: ../sign_up.php?log_error=Fail to insert info in login!!");
                }
            }else{
                header("location: ../sign_up.php?log_error=Fail to insert info in user!!");
            }  
        }
    }

    //02: Add item in DB
    if (isset($_POST['add_item'])) {

        $item_name     = $_POST['item_name'];
        $item_cat      = $_POST['item_cat'];
        $item_cat_stat = $_POST['item_cat_stat'];
        $user          = $_SESSION['loged_in_user_id'];
        $price         = $_POST['price'];

        $item_img_name  = date('Y-m-d-H-i-s').'_'.uniqid().'_'.$_FILES['item_img']['name'];
        $target_dir     = "../ows_item_img/";
        $target_file    = $target_dir . basename($_FILES["item_img"]["name"]);

        // Select file type
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        // Valid file extensions
        $extensions_arr = array("jpg","jpeg","png","gif");

        $insert_items = "INSERT INTO items(item_name,item_cat,item_cat_stat,user,price) VALUES('$item_name','$item_cat','$item_cat_stat','$user','$price')";

        $run_query  = mysqli_query($ows_conn, $insert_items);

        if ($run_query) {
            $item_img_id = mysqli_insert_id($ows_conn);

            // Check extension
            if(in_array($imageFileType,$extensions_arr) ){

                //filter all file attribute
                // Insert record
                $query_item_img = "INSERT INTO item_image(item_img_name,item) values('".$item_img_name."','$item_img_id')";
                mysqli_query($ows_conn,$query_item_img);

                // Upload file
                move_uploaded_file($_FILES['item_img']['tmp_name'],$target_dir.$item_img_name);

            }else{
                header("location: ../add_item.php?log_error=Fail to insert image!!");
            }

            header("location: ../dashboard.php?log_success=New item added");
        } else {
            header("location: ../add_item.php?log_error=Fail to insert item!!");
        }
    }

    /* ======== ADMIN ACTIONS =================*/
    //01: add access type
    if (isset($_POST['a_type_send'])) {
          
        $a_type_name  = $_POST['a_type_name'];

        $at_sql_select = "SELECT a_type_name FROM access_types WHERE a_type_name='$a_type_name'";
        $at_php_query = mysqli_query($ows_conn, $at_sql_select);
        if(mysqli_num_rows($at_php_query) > 0){
            header("location: ../adds.php?log_error=[$a_type_name] is Exist!!");
        }else{
            $at_sql_insert = "INSERT INTO access_types(a_type_name) VALUES('$a_type_name')";
            $insert_query = mysqli_query($ows_conn, $at_sql_insert);

            if ($insert_query) {
                header("location: ../adds.php?log_success=[$a_type_name] is added");
            }else{
                header("location: ../adds.php?log_error=Something went wrong in Inseting [$a_type_name]");
            }
        }
    }

    //02: add Category
    if (isset($_POST['category_send'])) {
          
        $icat_name   = $_POST['icat_name'];

        $cat_sql_select = "SELECT icat_name FROM item_cats WHERE icat_name='$icat_name'";
        $cat_sql_insert = "INSERT INTO item_cats(icat_name) VALUES('$icat_name')";

        $cat_php_query = mysqli_query($ows_conn, $cat_sql_select);

        if(mysqli_num_rows($cat_php_query) > 0){
            header("location: ../adds.php?log_error=[$icat_name] is Exist!!");
        }else{
            
            $cat_query = mysqli_query($ows_conn, $cat_sql_insert);

            if ($cat_query) {
                header("location: ../adds.php?log_success=[$icat_name] added as New Category");
            }else{
                header("location: ../adds.php?log_error=Something went wrong in Inseting [$icat_name]");
            }
        }
    }

    //03: add Item status
    if (isset($_POST['item_status_send'])) {
          
        $icst_name   = $_POST['icst_name'];

        $status_sql_select = "SELECT icst_name FROM item_cat_status WHERE icst_name='$icst_name'";
        $status_sql_insert = "INSERT INTO item_cat_status(icst_name) VALUES('$icst_name')";

        $status_php_query = mysqli_query($ows_conn, $status_sql_select);

        if(mysqli_num_rows($status_php_query) > 0){
            header("location: ../adds.php?log_error=[$icst_name] is Exist!!");
        }else{
            
            $status_query = mysqli_query($ows_conn, $status_sql_insert);

            if ($status_query) {
                header("location: ../adds.php?log_success=[$icst_name] added as New Status");
            }else{
                header("location: ../adds.php?log_error=Something went wrong in Inseting [$icst_name]");
            }
        }
    }

    /* ======== BOTH USERS ACTIONS ===========*/
    //01: Login
    if (isset($_POST['login'])) {
        
        $user_name  = $_POST['user_name'];
        $password   = sha1($_POST['us_password']);

        $select_user_query = "SELECT * FROM users_login JOIN users ON user=user_id WHERE user='$user_name' AND user_pwd='$password' LIMIT 1";

        $result = mysqli_query($ows_conn, $select_user_query);
        $count = mysqli_num_rows($result);

        if ($count == 1) {
            $row = mysqli_fetch_array($result);

            $_SESSION['loged_in']          = TRUE;
            $_SESSION['loged_in_role']     = $row['access_type'];
            $_SESSION['loged_in_surname']  = $row['last_name'];
            $_SESSION['loged_in_user_id']  = $row['user'];
            
            if ($_SESSION['loged_in_role'] == 1) {
                header("location: ../ows_admin.php");
            } else {
                header("location: ../dashboard.php");
            }
        }else{
            header("location: ../login.php?log_error=Username or Password is invalid!!");
        }
    }

    //02: Update profile
    if (isset($_POST['update_prof'])) {

        $reg_no       = $_SESSION['loged_in_user_id'];
        $f_name       = $_POST['first_name'];
        $m_name       = $_POST['middle_name'];
        $l_name       = $_POST['last_name'];
        $phone_no     = $_POST['phone_on'];
        $user_email   = $_POST['email'];
        $user_img     = $_POST['user_img'];
        $user_addres  = $_POST['address'];
        $old_pass     = sha1($_POST['old_pass']);
        $new_pass = sha1($_POST['new_pass']);

        $is_pass_match = "SELECT user_pwd,user FROM users_login WHERE user='$reg_no' AND user_pwd='$old_pass' LIMIT 1";

        $pre_sign_up ="UPDATE users SET first_name='$f_name',middle_name='$m_name',last_name='$l_name',phone_on='$phone_no',user_address='$user_addres' WHERE user_id='$reg_no'";

        $up_date_pass ="UPDATE users_login SET user_pwd='$new_pass' WHERE user='$reg_no'";

        if (empty($old_pass)) {

            $update_without_pwd = mysqli_query($ows_conn, $pre_sign_up);

            if($update_without_pwd) {

                $_SESSION['loged_in_surname']  = $l_name;

                if ($_SESSION['loged_in_role'] == 1) {
                    header("location: ../ows_admin.php?log_success=Profile Updated..!");
                } else {
                    header("location: ../dashboard.php?log_success=Profile Updated!");
                }
            }else{
                header("location: ../profile.php?log_error=Fail to Update your Profile!!");
            }

        }else{

            $match = mysqli_query($ows_conn, $is_pass_match);

            if (mysqli_num_rows($match) > 0) {
                
                $update_with_pwd = mysqli_query($ows_conn, $up_date_pass);

                if ($update_with_pwd) {
                    header("location: ../logout.php");
                }else{
                    header("location: ../profile.php?log_error=Something went wrong to update Password !!");
                }
            }else{
               header("location: ../profile.php?log_error=Old password was not match!!"); 
            }
        }
    }

    /* ======== CLOSE DATABASE ===============*/
    mysqli_close($ows_conn);

?>
