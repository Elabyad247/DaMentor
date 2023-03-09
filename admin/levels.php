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
        <div class="block-header">Levels</div>
        <div class="block-content">
            <form class="block-form" action="deletelevel.php" method="post">
                <div class="btn-group">
                    <a href="addlevel.php" class="btn btn-info">Add Level</a>
                    <a onclick="modalVisable('level_delete')" class="btn btn-danger">Delete Level</a>
                </div>
                <div id="level_delete" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>Delete Level?</h3>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the level you check?.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" onclick="modalVisable('level_delete')">Close</a>
                        <button name="delete_level" type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th></th>
                        <th><button id="subcode" type="button">Subject Code</button></th>
                        <th><button id="levelcode" type="button">Level Code</button></th>
                        <th><button id="leveltitle" type="button">Level Title</button></th>
                        <th><button id="leveldesc" type="button">Level Description</button></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-content">

                    <?php
                    $levelid = -1;
                    $subject_query = mysqli_query($GLOBALS["conn"],"select * from levels") or die(mysqli_error($GLOBALS["conn"]));
                    while ($row = mysqli_fetch_array($subject_query)) {
                        $levelid = $row['levelID'];
                        ?>

                        <tr>
                            <td class="first-last-td">
                                <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $levelid; ?>">
                            </td>
                            <td><?php echo $row['subCode']; ?></td>
                            <td><?php echo $row['levelCode']; ?></td>
                            <td><?php echo $row['levelTitle']; ?></td>
                            <td><?php echo $row['levelDescription']; ?></td>
                            <td class="first-last-td">
                                <a href="editlevel.php<?php echo '?id='.$levelid; ?>" class="btn btn-success">Edit</a>
                            </td>
                        </tr>

                        <?php
                    }
                    ?>

                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>
<script src="../scripts/script.js"></script>