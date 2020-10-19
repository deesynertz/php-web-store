<!-- header.php -->

<?php

	$bland = '&#10026;nl&#8520;ne w&#8519;b<span class="brand-end">Store</span>';
	// $bland = '<h1 class="brand">&#10026;&#10072;w&#8519;b<span class="brand-end">Store</span></h1>';
    $brand_slogan = 'we approach service every where';

    // &#10162;
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="ows_css/style.css" />
<title>OWS | <?php echo $page_name;?></title>
</head>

<body>
    <div class="container">
		<div class="header">
        	<h1 class="brand"><?php echo $bland;?></h1>
            <h2 class="brand-slogan"><?php echo $brand_slogan;?></h2>
        </div>

        <div class="main-menu">
            <ul>
                <li class="<?php if($page_name == 'Home'){ echo 'active';}?>"><a href="index.php">Home</a></li>
                <li class="<?php if($page_name == 'about_us'){ echo 'active';}?>"><a href="about_us.php">About Us</a></li>
                <li class="<?php if($page_name == 'contact_us'){ echo 'active';}?>"><a href="contact_us.php">Contact Us</a></li>
            </ul>
        </div>

        <div class="leftmenu">
            <div class="leftmenu_main">
                
                <?php if(empty($_SESSION['loged_in'])) { ?>
                    <h3 class="menu_head text-muted">All</h3>
                <?php }else { ?>
                    <h3 class="menu_head text-muted"><span class="online text-green">&#9864;</span><?php echo $_SESSION['loged_in_surname'];?></h3>
                <?php } ?>
                
                <ul>
                    <?php if (empty($_SESSION['loged_in'])) { ?>

	                    <li class="<?php if($page_name == 'sign_up'){ echo 'left-active';}?>"><a href="sign_up.php">Sign Up</a></li>
	                    <li class="<?php if($page_name == 'login'){ echo 'left-active';}?>"><a href="login.php">login</a></li>
                    
                    <?php }else { 
                        
                           if ($_SESSION['loged_in_role'] == 1) { ?>
                                <li class="<?php if($page_name == 'ows_admin'){ echo 'left-active';}?>"><a href="ows_admin.php">Admin Dashboard</a></li>
                                <li class="<?php if($page_name == 'adds'){ echo 'left-active';}?>"><a href="adds.php">Add</a></li>
                            <?php } else{ ?>
                                <li class="<?php if($page_name == 'dashboard'){ echo 'left-active';}?>"><a href="dashboard.php">Dashboard</a></li>
                                <li class="<?php if($page_name == 'add_item'){ echo 'left-active';}?>"><a href="add_item.php">Add Item</a></li>
                            <?php } ?>

                            <li class="<?php if($page_name == 'profile'){ echo 'left-active';}?>"><a href="profile.php">Edit Profile</a></li>
                            <li><a href="logout.php">logout</a></li>
                    <?php }?>
                </ul>
            </div>
        </div>