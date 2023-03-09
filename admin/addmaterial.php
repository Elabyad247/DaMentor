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
        <div class="block-header">Add Material</div>
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
                            Material Type:
                            <input type="text" name="materialType" placeholder="Material Type" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Material Title:
                            <input type="text" name="materialTitle" placeholder="Material Title" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Material Link:
                            <input type="text" name="materialLink" placeholder="Material Link" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Material Notes:
                            <textarea name="materialNotes"></textarea>
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
                $materialtype = $_POST['materialType'];
                $materialtitle = $_POST['materialTitle'];
                $materiallink = $_POST['materialLink'];
                $materialnotes = $_POST['materialNotes'];

                mysqli_query($GLOBALS["conn"],"insert into lectures_materials (subCode,levelCode,lectureCode,materialType,materialTitle,link,notes) values('$subcode','$level_code','$lecture_code','$materialtype','$materialtitle','$materiallink','$materialnotes')")or die(mysqli_error($GLOBALS["conn"]));
                ?>

                <script>
                    window.location = "materials.php";
                </script>
            <?php
            }
            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>