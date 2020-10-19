<!-- contact_us.php -->
<?php 

    $page_name = 'contact_us';
?>

    <?php include 'header.php';?>

    <div class="content paragraph">
        <h2 class="head-h text-white">CONTACT US</h2>
        <div class="row">
            <h3 class="sub-head-h">For any concern of our system ): </h3>
            <p>Call: &nbsp;&nbsp;&nbsp;<strong>0748 376136</strong><br> 
             Email: <strong>andundee@mustudents.ac.tz </strong></p>
            
            <h3 class="sub-head-h text-center">We are in touch </h3>
                
            <div class="myform">
                <form method="POST" action="ows_database/php_sql_script.php" autocomplete="off">
                    <div class="form-group">
                        <label for="your_email">Your Email</label>
                        <input type="text" id="your_email" name="your_email" placeholder="Enter Username" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Content</label>
                        <textarea name="content" rows="4" placeholder="write your concern" required></textarea>
                    </div>
                    <div>
                        <input class="btn text-center" type="submit" name="email_us" value="Send">
                    </div>
                </form>
            </div>  
        </div>
    </div> 

    <?php include 'footer.php';?>
