<?php
    function redirect($url){
        if(headers_sent()){
            echo '<script type="text/javascript">';
            echo 'window.location.href="'.$url.'";';
            echo '</script>';
            echo '<noscript>';
            echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
            echo '</noscript>';
            die();
        }else{
            header('location:'.$url);
        }
    }
?>