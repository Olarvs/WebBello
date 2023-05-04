<?php
session_start();
session_destroy();
header('Location: /InnerSPARC-Sales-System/pages/index.php');
exit();
?>