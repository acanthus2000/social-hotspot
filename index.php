<?php
    include_once "function.php";
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xmlns:fb="http://www.facebook.com/2008/fbml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
        <title>Facebook Application</title>
    </head>
<body>
<style type="text/css">
    .box{
        margin: 5px;
        border: 1px solid #60729b;
        padding: 5px;
        width: 500px;
        height: 200px;
        overflow:auto;
        background-color: #e6ebf8;
    }
</style>
    <?php
        if (!$user) {
            echo 'Please login with Facebook to use Free Wi-Fi!<br>';
            echo '<a href="' . $loginUrl . '">Login</a><br>';
        } else {
            if (!$liked && !$_SESSION['shared']) {
                echo '<h1>Please like it!</h1><br>';
                echo '<iframe src="//www.facebook.com/plugins/likebox.php?href=https%3A%2F%2Fwww.facebook.com%2Ffanpage&amp;width=292&amp;height=258&amp;colorscheme=light&amp;show_faces=true&amp;header=false&amp;stream=false&amp;show_border=false&amp;appId=537744029596193" scrolling="no" frameborder="0" style="border:none; overflow:hidden; width:292px; height:258px;" allowTransparency="true"></iframe>';
                echo '<h1>Share with your friends!</h1>';
                echo '<a href="index.php?checkin=1">Share!</a><br>';
            } elseif ($liked && !$_SESSION['shared']) {
                echo '<h1>Share with your friends!</h1>';
                echo '<a href="index.php?checkin=1">Share!</a><br>';
            } elseif ($liked && $_SESSION['shared']) {
                    echo '<form name="login" method="post" action="' . PORTAL .'">';
                    echo '<input type="hidden" name="accept_terms" value="yes" />';
                    echo '<input type="hidden" name="redirect" value="' . PORTAL .'" />';
                    echo '<input type="hidden" name="mode_login" />';
                    echo '<input type="submit" value="Use Free Wi-Fi!" />';
                    echo '</form>';
            }
        }
    ?>
    </body>
</html>
