<?php
include_once('header.php')
?>

<h2 style="color: white; text-align: center">Lectures</h2>
<div class="courses">

    <?php
    $lectureid = -1;
        $lecture_query = mysqli_query($GLOBALS["conn"],"select * from lectures where levelCode = 'MLECS'") or die(mysqli_error($GLOBALS["conn"]));
    $_SESSION['levelCode'] = 'MLECS';
    $tempid = 1;
    while ($row = mysqli_fetch_array($lecture_query)) {
            $lectureid = $tempid;
    ?>

        <div class="card" id="<?php echo $row['lectureCode']; ?>" onclick="changepadge('../../levels/lectures/?lectureCode=<?php echo $row['lectureCode']; ?>')">
            <img src="../../../assets/<?php echo $row['subCode'] ?>.jpg" alt="Avatar" style="width: 100%" />
            <div class="container">
                <h4><b>Lecture <?php echo $lectureid; ?>: <?php echo $row['lectureTitle']; ?></b></h4>
                <p><?php echo $row['lectureDescription']; ?></p>
            </div>
        </div>

    <?php $tempid++; } ?>
</div>
<?php
include_once('footer.php')
?>