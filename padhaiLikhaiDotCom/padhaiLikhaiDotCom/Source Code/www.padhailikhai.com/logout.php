<?php
session_start();
session_destroy();
if (isset($_COOKIE["user"]))
{setcookie("user", "", time()-3600*24);
}
header("Location:logout_url.php");
?>