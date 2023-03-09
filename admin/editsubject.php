<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<?php $subid = $_GET['id']; ?>

<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Edit Subject</div>
        <div class="block-content">

            <?php
            $query = mysqli_query($GLOBALS['conn'],"select * from subjects where subID = '$subid'")or die(mysqli_error($GLOBALS['conn']));
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
                            Subject Title:
                            <input type="text" name="subTitle" placeholder="Subject Title" value="<?php echo $row['subTitle']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Description:
                            <textarea name="subDescription"><?php echo $row['subDescription']; ?></textarea>
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
                $subjCode = $_POST['subCode'];
                $subTitle = $_POST['subTitle'];
                $description = $_POST['subDescription'];



                mysqli_query($GLOBALS['conn'],"update subjects set subCode = '$subjCode' ,
																		subTitle = '$subTitle',
																		subDescription = '$description'
																		where subID = '$subid' ")or die(mysqli_error($GLOBALS['conn']));

                ?>
                <script>
                    window.location = "subjects.php";
                </script>
                <?php
            }

            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>