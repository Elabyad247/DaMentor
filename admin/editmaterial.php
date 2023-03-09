<?php
include_once('adminheader.php');
if (!isset($_SESSION["adminid"])) {
    session_unset();
    session_destroy();
    header("location: ../admin/");
    exit();
}
?>
<?php $materialid = $_GET['id']; ?>

<div class="main-dashboard">
    <?php include_once('adminsidebar.php'); ?>
    <div class="block">
        <div class="block-header">Edit Lecture</div>
        <div class="block-content">

            <?php
            $query = mysqli_query($GLOBALS['conn'],"select * from lectures_materials where materialID = '$materialid'")or die(mysqli_error($GLOBALS['conn']));
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
                            Material Type:
                            <input type="text" name="materialType" placeholder="Material Type" value="<?php echo $row['materialType']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Material Title:
                            <input type="text" name="materialTitle" placeholder="Material Title" value="<?php echo $row['materialTitle']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Material Link:
                            <input type="text" name="materialLink" placeholder="Material Link" value="<?php echo $row['link']; ?>" required>
                        </label>
                    </div>
                </div>

                <div class="control-group">
                    <div class="controls">
                        <label class="control-label">
                            Material Notes:
                            <textarea name="materialNotes"><?php echo $row['notes']; ?></textarea>
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
                $materialtype = $_POST['materialType'];
                $materialtitle = $_POST['materialTitle'];
                $materiallink = $_POST['materialLink'];
                $materialnotes = $_POST['materialNotes'];

                mysqli_query($GLOBALS['conn'],"update lectures_materials set subCode = '$subCode' ,
                                                                        levelCode = '$lvlCode' ,
                                                                        lectureCode = '$lectureCode' ,
                                                                        materialType = '$materialtype',
																		materialTitle = '$materialtitle',
                                                                        link = '$materiallink',
                                                                        notes = '$materialnotes'
																		where materialID = '$materialid' ")or die(mysqli_error($GLOBALS['conn']));

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