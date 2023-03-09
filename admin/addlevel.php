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
        <div class="block-header">Add Level</div>
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
                            Level Title:
                            <input type="text" name="levelTitle" placeholder="Level Title" required>
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
                $leveltitle = $_POST['levelTitle'];
                $description = $_POST['description'];

                $query = mysqli_query($GLOBALS["conn"],"select * from levels where levelCode = '$level_code' ") or die(mysqli_error($GLOBALS["conn"]));
                $count = mysqli_num_rows($query);

                if ($count > 0){ ?>
                    <script>
                        alert('Data Already Exist (Level code)');
                    </script>
                <?php
                } else {
                    mysqli_query($GLOBALS["conn"],"insert into levels (subCode,levelCode,levelTitle,levelDescription) values('$subcode','$level_code','$leveltitle','$description')")or die(mysqli_error($GLOBALS["conn"]));
                ?>

                <script>
                    window.location = "levels.php";
                </script>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>