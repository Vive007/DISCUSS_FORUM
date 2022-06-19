<?php
// logout from session.
session_start();
session_unset();
session_destroy();
header("location:idiscus.php");
?>