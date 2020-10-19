<!-- ows_admin.php -->
<?php  
    session_start();
    include 'conts_variable.php';
    require_once('ows_database/ows_connection.php');

    if ($_SESSION['loged_in'] != TRUE) { 
            header("location: login.php");
    }

    $page_name = 'ows_admin';
?>

    <?php include 'header.php';?>

	<div class="content">
        <h2 class="head-h text-white">Dashboad Panel</h2>

        <?php if(isset($_GET['log_success'])){ $success_msg = $_GET['log_success'];?> 
                <p class="text-green text-center"><?php echo $success_msg; ?></p>
        <?php  } ?>
                 
        <div class="box">
            <legend>User Access Type</legend><br>  
            <table class="table">
                <?php 
                    $types_select = "SELECT * FROM access_types";
                    $types_data = mysqli_query($ows_conn, $types_select);
                ?>
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
                </tr>
                <?php while ($types_status = mysqli_fetch_array($types_data)) { ?>
                    <tr>
                        <td col='3'><?php echo $types_status["a_type_id"]; ?></td>
                        <td col='3'><?php echo $types_status["a_type_name"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <legend>Item Category</legend><br>
            <table class="table">
                <?php 
                    $select = "SELECT * FROM item_cats";
                    $data = mysqli_query($ows_conn, $select);
                ?>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                </tr>
                <?php while ($result = mysqli_fetch_array($data)) { ?>
                    <tr>
                        <td col='3'><?php echo $result["icat_id"]; ?></td>
                        <td col='3'><?php echo $result["icat_name"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>

        <div class="box">
            <legend>Item Status</legend><br>
            <table class="table">
                <?php 
                    $cat_status_select = "SELECT * FROM item_cat_status";
                    $cat_status_data = mysqli_query($ows_conn, $cat_status_select);
                ?>
                <tr>
                    <th>ID</th>
                    <th>Name</th>    
                </tr>
                <?php while ($cat_status = mysqli_fetch_array($cat_status_data)) { ?>
                    <tr>
                        <td col='3'><?php echo $cat_status["icst_id"]; ?></td>
                        <td col='3'><?php echo $cat_status["icst_name"]; ?></td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>

    <?php include 'footer.php';?>

<?php mysqli_close($ows_conn);
