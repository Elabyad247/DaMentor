<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Data Analysis</div>
        <div class="block-content">
            <div class="block-chart">
                <?php
                    $subid = -1;
                    $subjects_query = mysqli_query($GLOBALS["conn"],"select * from subjects") or die(mysqli_error($GLOBALS["conn"]));
                    while ($row = mysqli_fetch_array($subjects_query)) {
                    $subid = $row['subID']; }
                ?>
                <div class="chart" data-percent="<?php echo $subid ?>" data-maxpercent="10"><?php echo $subid ?></div>
                <div class="chart-bottom-heading"><strong>Subjects</strong></div>
            </div>

            <div class="block-chart">
                <?php
                $levelid = -1;
                $levels_query = mysqli_query($GLOBALS["conn"],"select * from levels") or die(mysqli_error($GLOBALS["conn"]));
                while ($row = mysqli_fetch_array($levels_query)) {
                    $levelid = $row['levelID']; }
                ?>
                <div class="chart" data-percent="<?php echo $levelid ?>" data-maxpercent="50"><?php echo $levelid ?></div>
                <div class="chart-bottom-heading"><strong>Levels</strong></div>
            </div>

            <div class="block-chart">
                <?php
                $lectureid = -1;
                $lectures_query = mysqli_query($GLOBALS["conn"],"select * from lectures") or die(mysqli_error($GLOBALS["conn"]));
                while ($row = mysqli_fetch_array($lectures_query)) {
                    $lectureid = $row['lectureID']; }
                ?>
                <div class="chart" data-percent="<?php echo $lectureid ?>" data-maxpercent="150"><?php echo $lectureid ?></div>
                <div class="chart-bottom-heading"><strong>Lectures</strong></div>
            </div>

            <div class="block-chart">
                <?php
                $lecturematerialid = -1;
                $lecturematerials_query = mysqli_query($GLOBALS["conn"],"select * from lectures_materials") or die(mysqli_error($GLOBALS["conn"]));
                while ($row = mysqli_fetch_array($lecturematerials_query)) {
                    $lecturematerialid = $row['materialID']; }
                ?>
                <div class="chart" data-percent="<?php echo $lecturematerialid ?>" data-maxpercent="200"><?php echo $lecturematerialid ?></div>
                <div class="chart-bottom-heading"><strong>Lectures Materials</strong></div>
            </div>

            <div class="block-chart">
                <div class="chart" data-percent="0" data-maxpercent="100">0</div>
                <div class="chart-bottom-heading"><strong>Downloadable Materials</strong></div>
            </div>

            <div class="block-chart">
                <div class="chart" data-percent="0" data-maxpercent="400">0</div>
                <div class="chart-bottom-heading"><strong>Questions</strong></div>
            </div>

            <!--
            <div class="block-chart">
                <div class="chart" data-percent="0" data-maxpercent="100">0</div>
                <div class="chart-bottom-heading"><strong>Uploaded Assignments</strong></div>
            </div>

            <div class="block-chart">
                <div class="chart" data-percent="1" data-maxpercent="400">1</div>
                <div class="chart-bottom-heading"><strong>Users</strong></div>
            </div>

            <div class="block-chart">
                <div class="chart" data-percent="0" data-maxpercent="20">0</div>
                <div class="chart-bottom-heading"><strong>Events</strong></div>
            </div>
            -->
        </div>
    </div>
</div>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script src="../scripts/jquery.easy-pie-chart.js"></script>
<script src="../scripts/script.js"></script>
<script>
    $(function() {
        $('.chart').easyPieChart({
            barColor: function (percent, maxpercent) {
                percent /= maxpercent;
                return "rgb(" + Math.round(255 * percent) + ", " + Math.round(255 * (1 - percent)) + ", 0)";
            },
            trackColor: '#666',
            scaleColor: false,
            lineCap: 'butt',
            lineWidth: 10,
            animate: 1000
        });
    });
</script>