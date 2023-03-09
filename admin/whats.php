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
        <div class="block-header">Whats</div>
        <div class="block-content">
            <form class="block-form" action="deletewhat.php" method="post">
                <div class="btn-group">
                    <a href="addwhat.php" class="btn btn-info">Add What</a>
                    <a onclick="modalVisable('what_delete')" class="btn btn-danger">Delete What</a>
                </div>
                <div id="what_delete" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>Delete What?</h3>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the what you check?.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" onclick="modalVisable('what_delete')">Close</a>
                        <button name="delete_what" type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th></th>
                        <th><button id="whattype" type="button">What Type</button></th>
                        <th><button id="whattitle" type="button">What Title</button></th>
                        <th><button id="whatnotes" type="button">What Notes</button></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-content">

                    <?php
                    $whatid = -1;
                    $what_query = mysqli_query($GLOBALS["conn"],"select * from whats") or die(mysqli_error($GLOBALS["conn"]));

                    while ($row = mysqli_fetch_array($what_query)) {
                        $whatid = $row['whatID'];
                        ?>

                        <tr>
                            <td class="first-last-td">
                                <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $whatid; ?>">
                            </td>
                            <td><?php echo $row['whatType']; ?></td>
                            <td><?php echo $row['whatTitle']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td class="first-last-td">
                                <a href="editwhat.php<?php echo '?id='.$whatid; ?>" class="btn btn-success">Edit</a>
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