<?php
    session_start();
    
    include_once "config.php";
    include_once "includes/facebook.php";

    $user = null;
    $liked = null;
    
    $facebook = new Facebook(array(
        'appId'  => APPID,
        'secret' => APPSECRET,
        'cookie' => true
    ));

    $user = $facebook->getUser();
    
    $loginUrl = $facebook->getLoginUrl(
        array(
            'scope'         => 'publish_stream,user_likes',
            'redirect_uri'  => BASEURL
        )
    );
    
    if ($user) {
        try {
            $likes = $facebook->api('/me/likes/' . PAGEID);
            if(!empty($likes['data']))
                $liked = true;
            else
                $liked = false;
        } catch (FacebookApiException $e) {
            print_r($e);
        }

        if (isset($_GET['code'])) {
            header("Location: " . BASEURL);
            exit;
        }
        
        if (isset($_GET['checkin'])) {
            try {
                $status = $facebook->api("/$user/feed", 'post',
                    array(
                        'message'=> MESSAGE,
                        'place' => PAGEID
                    )
                );
            } catch (FacebookApiException $e) {
                print_r($e);
            }
            if(!isset($_SESSION['shared']))
                $_SESSION['shared'] = true;
            header("Location: " . BASEURL);
            exit;
        }
    }
    
?>
