<?php
session_start();
 if(!isSet($_SESSION['zalogowany'])) {
}

 else{
 unset($_SESSION['zalogowany']);
}

session_destroy();
header('Location: index.php');


?>		




