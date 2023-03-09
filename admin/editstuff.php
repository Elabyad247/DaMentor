<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<?php $Stuffid = $_GET['id']; ?>

<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Edit Stuff</div>
        <div class="block-content">

            <?php
            $query = mysqli_query($GLOBALS['conn'],"select * from useful_stuff where usefulID = '$Stuffid'")or die(mysqli_error($GLOBALS['conn']));
            $row = mysqli_fetch_array($query);
            ?>

            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Type:
                            <input type="text" name="StuffType" placeholder="Stuff Type" value="<?php echo $row['usefulType']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Title:
                            <input type="text" name="StuffTitle" placeholder="Stuff Title" value="<?php echo $row['usefulTitle']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Link:
                            <input type="text" name="StuffLink" placeholder="Stuff Link" value="<?php echo $row['link']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Notes:
                            <textarea name="StuffNotes"><?php echo $row['notes']; ?></textarea>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Height:
                            <input type="text" name="StuffHeight" placeholder="Stuff Height" value="<?php echo $row['height']; ?>" required>
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
                $materialtype = $_POST['StuffType'];
                $materialtitle = $_POST['StuffTitle'];
                $materiallink = $_POST['StuffLink'];
                $materialnotes = $_POST['StuffNotes'];
                $Stuffheight = $_POST['StuffHeight'];

                mysqli_query($GLOBALS['conn'],"update useful_stuff set 
                                                                        usefulType = '$materialtype',
																		usefulTitle = '$materialtitle',
                                                                        link = '$materiallink',
                                                                        notes = '$materialnotes',
                                                                        height = '$Stuffheight'
																		where usefulID = '$Stuffid' ")or die(mysqli_error($GLOBALS['conn']));

                ?>
                <script>
                    window.location = "useful.php";
                </script>
                <?php
            }

            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>