<?php

    if (!isset($_SESSION['lang'])){
        $_SESSION['lang'] = 'fr';
    } elseif (isset($_GET['lang'])  && $_SESSION['lang']!=$_GET['lang'] && !empty($_GET['lang'])) {
        if ($_GET['lang']=='en') {
            $_SESSION['lang'] = 'en';
        }elseif ($_GET['lang']=='fr'){

            $_SESSION['lang'] = 'fr';
        }
    }
    require_once "lang/".$_SESSION['lang'].".php";
?>
