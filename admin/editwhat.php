<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<?php $whatid = $_GET['id']; ?>

<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Edit What</div>
        <div class="block-content">

            <?php
            $query = mysqli_query($GLOBALS['conn'],"select * from whats where whatID = '$whatid'")or die(mysqli_error($GLOBALS['conn']));
            $row = mysqli_fetch_array($query);
            ?>

            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            What Type:
                            <input type="text" name="whatType" placeholder="What Type" value="<?php echo $row['whatType']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            What Title:
                            <input type="text" name="whatTitle" placeholder="What Title" value="<?php echo $row['whatTitle']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            What Notes:
                            <textarea name="wahtNotes"><?php echo $row['notes']; ?></textarea>
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
                $materialtype = $_POST['whatType'];
                $materialtitle = $_POST['whatTitle'];
                $materialnotes = $_POST['whatNotes'];

                mysqli_query($GLOBALS['conn'],"update whats set 
                                                                        whatType = '$materialtype',
																		whatTitle = '$materialtitle',
                                                                        notes = '$materialnotes'
																		where whatID = '$whatid' ")or die(mysqli_error($GLOBALS['conn']));

                ?>
                <script>
                    window.location = "whats.php";
                </script>
                <?php
            }

            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>