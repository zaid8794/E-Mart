<?php
$title = "My Orders";
require_once "components/header.php";
if (!isset($_SESSION['user'])) {
    echo "<script>window.location='register.php';</script>";
}
?>
<?php
require_once "components/footer.php";
?>