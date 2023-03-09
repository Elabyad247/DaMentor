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
        <div class="block-header">Add Stuff</div>
        <div class="block-content">
            <form class="block-form" method="post">

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Type:
                            <input type="text" name="materialType" placeholder="Stuff Type" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Title:
                            <input type="text" name="materialTitle" placeholder="Stuff Title" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Link:
                            <input type="text" name="materialLink" placeholder="Stuff Link" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Notes:
                            <textarea name="materialNotes"></textarea>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Stuff Height:
                            <input type="text" name="stuffHeight" placeholder="Stuff Height" required>
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
                $materialtype = $_POST['materialType'];
                $materialtitle = $_POST['materialTitle'];
                $materiallink = $_POST['materialLink'];
                $materialnotes = $_POST['materialNotes'];
                $stuffHeight = $_POST['stuffHeight'];

                $query = mysqli_query($GLOBALS["conn"],"select * from useful_stuff where usefulTitle = '$materialtitle' ") or die(mysqli_error($GLOBALS["conn"]));
                $count = mysqli_num_rows($query);

                if ($count > 0){ ?>
                    <script>
                        alert('Data Already Exist (Stuff Title)');
                    </script>
                <?php
                } else {
                    mysqli_query($GLOBALS["conn"],"insert into useful_stuff (usefulType,usefulTitle,link,notes,height) values('$materialtype','$materialtitle','$materiallink','$materialnotes','$stuffHeight')")or die(mysqli_error($GLOBALS["conn"]));
                ?>

                <script>
                    window.location = "useful.php";
                </script>
            <?php
                }
            }
            ?>

        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>