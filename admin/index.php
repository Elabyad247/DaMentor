<!DOCTYPE html>
<html lang="en">
<?php include_once('adminheader.php'); ?>

<?php
if (!isset($_SESSION["adminid"])) {
    include_once "adminlogin.php";
} else {
    include_once "admindashboard.php";
}
?>
</body>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="../scripts/script.js"></script>
<script src="../scripts/jquery.easy-pie-chart.js"></script>
</html>