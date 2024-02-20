<?php
    require("./include/essentials.php");
    session_start();
    session_unset();
    session_destroy();
    redirect('index.php');
?>