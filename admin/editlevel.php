<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<?php $levelid = $_GET['id']; ?>

<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Edit Level</div>
        <div class="block-content">

            <?php
            $query = mysqli_query($GLOBALS['conn'],"select * from levels where levelID = '$levelid'")or die(mysqli_error($GLOBALS['conn']));
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
                            Level Title:
                            <input type="text" name="levelTitle" placeholder="Level Title" value="<?php echo $row['levelTitle']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Description:
                            <textarea name="levelDescription"><?php echo $row['levelDescription']; ?></textarea>
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
                $lvlTitle = $_POST['levelTitle'];
                $description = $_POST['levelDescription'];

                mysqli_query($GLOBALS['conn'],"update levels set subCode = '$subCode' ,
                                                                        levelCode = '$lvlCode' ,
																		levelTitle = '$lvlTitle',
																		levelDescription = '$description'
																		where levelID = '$levelid' ")or die(mysqli_error($GLOBALS['conn']));

                ?>
                <script>
                    window.location = "levels.php";
                </script>
                <?php
            }

            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>