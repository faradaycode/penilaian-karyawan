<?php

switch ($_SESSION['logedin']) {
    case "0":
        header("location: ./views/login.php");
        break;
    case "1":
        header("location: ./views/admin/index.php");
        break;
    default:
        // header("location: ./views/login.php");
        header("location: ./views/admin/index.php");
}

?>