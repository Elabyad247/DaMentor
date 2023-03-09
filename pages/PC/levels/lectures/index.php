<?php
include_once('header.php')
?>

<?php

if (!isset($_GET["lectureCode"])) {
    session_unset();
    session_destroy();
    header("location: ../../");
    exit();
}

$lectureCode = $_GET["lectureCode"];
$lectruequery = mysqli_query($GLOBALS['conn'],"select * from lectures where lectureCode = '$lectureCode'")or die(mysqli_error($GLOBALS['conn']));
$lecturerow = mysqli_fetch_array($lectruequery);
$materialquery = mysqli_query($GLOBALS['conn'],"select * from lectures_materials where lectureCode = '$lectureCode'")or die(mysqli_error($GLOBALS['conn']));

?>

<h2 style="text-align: center; color: #fff"><?php echo $lecturerow['lectureTitle']; ?></h2>


<div class="matetrial-container">

    <?php while ($materialrow = mysqli_fetch_array($materialquery)) {
        ?>

    <h4 style="text-align: center; color: #fff"><?php echo $materialrow['materialTitle']; ?></h4>
    <p><?php echo $materialrow['notes']; ?></p>
        <?php
            if ($materialrow['materialType']=='Youtube') {
        ?>

            <iframe class="video-player"
                src="<?php echo $materialrow['link']; ?>" title="<?php echo $materialrow['materialTitle']; ?>" frameborder="0" allow="accelerometer; encrypted-media; picture-in-picture" allowfullscreen>
            </iframe>

        <?php
            } elseif ($materialrow['materialType'] == 'Drive') {
        ?>

                <iframe src="<?php echo $materialrow['link']; ?>" allow="autoplay"></iframe>

        <?php } ?>

    <?php } ?>
</div>

<?php
include_once('footer.php')
?>