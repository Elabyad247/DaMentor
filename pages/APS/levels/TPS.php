<?php
include_once('header.php')
?>

<h2 style="color: white; text-align: center">Topics</h2>
<div class="courses">

    <?php
    $lectureid = -1;
        $lecture_query = mysqli_query($GLOBALS["conn"],"select * from lectures where levelCode = 'TPS'") or die(mysqli_error($GLOBALS["conn"]));
    $_SESSION['levelCode'] = 'TPS';
    while ($row = mysqli_fetch_array($lecture_query)) {
    ?>

        <div class="card" id="<?php echo $row['lectureCode']; ?>" onclick="changepadge('../../levels/lectures/?lectureCode=<?php echo $row['lectureCode']; ?>')">
            <img src="../../../assets/<?php echo $row['subCode'] ?>.jpg" alt="Avatar" style="width: 100%" />
            <div class="container">
                <h4><b><?php echo $row['lectureTitle']; ?></b></h4>
                <p><?php echo $row['lectureDescription']; ?></p>
            </div>
        </div>

    <?php } ?>
</div>
<?php
include_once('footer.php')
?>