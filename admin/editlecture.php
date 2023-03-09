<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<?php $lectureid = $_GET['id']; ?>

<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Edit Lecture</div>
        <div class="block-content">

            <?php
            $query = mysqli_query($GLOBALS['conn'],"select * from lectures where lectureID = '$lectureid'")or die(mysqli_error($GLOBALS['conn']));
            $row = mysqli_fetch_array($query);
            ?>

            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Subject Code:
                            <input type="text" name="subCode" placeholder="Subject Code" value="<?php echo $row['subCode']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Level Code:
                            <input type="text" name="levelCode" placeholder="Level Code" value="<?php echo $row['levelCode']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Lecture Code:
                            <input type="text" name="lectureCode" placeholder="Lecture Code" value="<?php echo $row['lectureCode']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Lecture Title:
                            <input type="text" name="lectureTitle" placeholder="Lecture Title" value="<?php echo $row['lectureTitle']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Description:
                            <textarea name="lectureDescription"><?php echo $row['lectureDescription']; ?></textarea>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <button name="update" type="submit" class="btn btn-info">Save</button>
                    </div>
                </div>
            </form>

            <?php
            if (isset($_POST['update'])){
                $subCode = $_POST['subCode'];
                $lvlCode = $_POST['levelCode'];
                $lectureCode = $_POST['lectureCode'];
                $lectureTitle = $_POST['lectureTitle'];
                $description = $_POST['lectureDescription'];

                mysqli_query($GLOBALS['conn'],"update lectures set subCode = '$subCode' ,
                                                                        levelCode = '$lvlCode' ,
                                                                        lectureCode = '$lectureCode' ,
																		lectureTitle = '$lectureTitle',
																		lectureDescription = '$description'
																		where lectureID = '$lectureid' ")or die(mysqli_error($GLOBALS['conn']));

                ?>
                <script>
                    window.location = "lectures.php";
                </script>
                <?php
            }

            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>