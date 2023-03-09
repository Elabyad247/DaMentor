<?php
include_once('header.php')
?>

<h2 style="color: white; text-align: center">Assiut Sheet</h2>
<div class="courses">

    <?php
    $lectureid = -1;
        $lecture_query = mysqli_query($GLOBALS["conn"],"select * from lectures where levelCode = 'SAST'") or die(mysqli_error($GLOBALS["conn"]));
    $_SESSION['levelCode'] = 'SAST';
    $tempid = 1;
    while ($row = mysqli_fetch_array($lecture_query)) {
        $lectureid = $tempid;
    ?>

        <div class="card" id="<?php echo $row['lectureCode']; ?>" onclick="parent.open('<?php echo $row['lectureDescription']; ?>')">
            <img src="../../../assets/<?php echo $row['subCode'] ?>.jpg" alt="Avatar" style="width: 100%" />
            <div class="container">
                <h4><b>Sheet <?php echo $lectureid; ?>: <?php echo $row['lectureTitle']; ?></b></h4>
            </div>
        </div>

    <?php $tempid++;} ?>
</div>
<?php
include_once('footer.php')
?>