<?php
session_start();
echo "Logging You Out Please Wait......";
session_destroy();
header("location: index.php?logout=true");
?>