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
        <div class="block-header">Add Subject</div>
        <div class="block-content">
            <form class="block-form" method="post">
                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Subject Code:
                            <input type="text" name="subject_code" placeholder="Subject Code" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Subject Title:
                            <input type="text" name="title" placeholder="Subject Title" required>
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
                $subject_code = $_POST['subject_code'];
                $title = $_POST['title'];
                $description = $_POST['description'];

                $query = mysqli_query($GLOBALS["conn"],"select * from subjects where subCode = '$subject_code' ") or die(mysqli_error($GLOBALS["conn"]));
                $count = mysqli_num_rows($query);

                if ($count > 0){ ?>
                    <script>
                        alert('Data Already Exist (Subject code)');
                    </script>
                <?php
                } else {
                    mysqli_query($GLOBALS["conn"],"insert into subjects (subCode,subTitle,subDescription) values('$subject_code','$title','$description')")or die(mysqli_error($GLOBALS["conn"]));
                ?>

                <script>
                    window.location = "subjects.php";
                </script>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>