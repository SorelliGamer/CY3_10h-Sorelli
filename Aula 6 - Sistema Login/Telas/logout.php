<?php

    if(!isset($_session)){
        session_start();
    }
    session_destroy();
    header("Location: login.php?deslogado");
?>