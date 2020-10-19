<!-- sold_item.php -->
<?php  
    session_start();
    include 'conts_variable.php';
    require_once('ows_database/ows_connection.php');

    if ($_SESSION['loged_in'] != TRUE) { 
            header("location: login.php");
    }

    $page_name = 'sold_item';
?>

    <?php include 'header.php';?>

	<div class="content">
        <div class="content_main">
            <h2 class="text-white">SOLD ITEM</h2>
            <p>&nbsp;</p>
            <p>&nbsp;</p>
            <h3>Template Notes</h3>
                <p>
                    The main image can be changed by either replacing the current image with another one of the same
                    size (900x402), or using a new one of what ever dimensions you'd like.  If you choose the
                    latter, you must open up style.css and change the dimensions of #mainpic, as well as the file
                    name if that is different. If you would like to move the heading around in the above image,
                    find &quot;#mainpic h1&quot; in style.css and modify it's &quot;left&quot; and &quot;top&quot; properties, this is also true
                    for the h2 tag.</p>
                <p>&nbsp;</p>
            <h3>More information</h3>
            <p>
                I decided to leave the content portion open for the templates users to do as they wish with a blank
                canvas. I don't like to restrict my users too much, and for this reason I leave the defining of
                any content related styles to you.</p>
            <p>&nbsp;</p>
            <h3>Template Notes</h3>
            <p>The main image can be changed by either replacing the current image with another one of the same size
                (900x402), or using a new one of what ever dimensions you'd like.  If you choose the latter, you
                must open up style.css and change the dimensions of #mainpic, as well as the file name if that is
                different. If you would like to move the heading around in the above image, find &quot;#mainpic h1&quot; in
                style.css and modify it's &quot;left&quot; and &quot;top&quot; properties, this is also true for the h2 tag.</p>
            <p>&nbsp;</p>
        </div>
    </div>

    <?php include 'footer.php';?>

