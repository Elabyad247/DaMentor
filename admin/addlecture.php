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
        <div class="block-header">Add Lecture</div>
        <div class="block-content">
            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Subject Code:
                            <input type="text" name="subCode" placeholder="Subject Code" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Level Code:
                            <input type="text" name="levelCode" placeholder="Level Code" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Lecture Code:
                            <input type="text" name="lectureCode" placeholder="Lecture Code" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Lecture Title:
                            <input type="text" name="lectureTitle" placeholder="Lecture Title" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Description:
                            <textarea name="description"></textarea>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button name="save" type="submit" class="btn btn-info">Add</button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['save'])) {
                $subcode = $_POST['subCode'];
                $level_code = $_POST['levelCode'];
                $lecture_code = $_POST['lectureCode'];
                $lecturetitle = $_POST['lectureTitle'];
                $description = $_POST['description'];

                $query = mysqli_query($GLOBALS["conn"],"select * from lectures where lectureCode = '$lecture_code' ") or die(mysqli_error($GLOBALS["conn"]));
                $count = mysqli_num_rows($query);

                if ($count > 0){ ?>
                    <script>
                        alert('Data Already Exist (Lecture code)');
                    </script>
                <?php
                } else {
                    mysqli_query($GLOBALS["conn"],"insert into lectures (subCode,levelCode,lectureCode,lectureTitle,lectureDescription) values('$subcode','$level_code','$lecture_code','$lecturetitle','$description')")or die(mysqli_error($GLOBALS["conn"]));
                ?>

                <script>
                    window.location = "lectures.php";
                </script>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>