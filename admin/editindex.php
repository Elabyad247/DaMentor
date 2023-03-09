<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<?php $indexid = $_GET['id']; ?>

<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Edit Index</div>
        <div class="block-content">

            <?php
            $query = mysqli_query($GLOBALS['conn'],"select * from index_list where id = '$indexid'")or die(mysqli_error($GLOBALS['conn']));
            $row = mysqli_fetch_array($query);
            ?>

            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Index Subject:
                            <input type="text" name="subject" placeholder="Index Subjecte" value="<?php echo $row['subject']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Index Level:
                            <input type="text" name="level" placeholder="Index Level" value="<?php echo $row['level']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Index Lecture:
                            <input type="text" name="lecture" placeholder="Index Lecture" value="<?php echo $row['lecture']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Index Details:
                            <input type="text" name="details" placeholder="Index Details" value="<?php echo $row['details']; ?>">
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
                $subject = $_POST['subject'];
                $level = $_POST['level'];
                $lecture = $_POST['lecture'];
                $details = $_POST['details'];

                mysqli_query($GLOBALS['conn'],"update index_list set 
                                                                        subject = '$subject',
																		level = '$level',
                                                                        lecture = '$lecture',
                                                                        details = '$details'
																		where id = '$indexid' ")or die(mysqli_error($GLOBALS['conn']));

                ?>
                <script>
                    window.location = "index_list.php";
                </script>
                <?php
            }

            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>