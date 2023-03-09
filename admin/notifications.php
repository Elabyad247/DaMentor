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
        <div class="block-header">Notifications</div>
        <div class="block-content">
            <form class="block-form" action="deletenoti.php" method="post">
                <div class="btn-group">
                    <a href="addnoti.php" class="btn btn-info">Add Notification</a>
                    <a onclick="modalVisable('noti_delete')" class="btn btn-danger">Delete Notification</a>
                </div>
                <div id="noti_delete" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>Delete Notification?</h3>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the Notification you check?.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" onclick="modalVisable('noti_delete')">Close</a>
                        <button name="delete_noti" type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th></th>
                        <th><button id="noti">Notification</button></th>
                        <th><button id="notDate">Notification Date</button></th>
                        <th><button id="notType">Notification Type</button></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-content">

                    <?php
                    $notiid = -1;
                    $noti_query = mysqli_query($GLOBALS["conn"],"select * from notifications") or die(mysqli_error($GLOBALS["conn"]));
                    while ($row = mysqli_fetch_array($noti_query)) {
                        $notid = $row['notification_id'];
                        ?>

                        <tr>
                            <td class="first-last-td">
                                <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $notid; ?>">
                            </td>
                            <td><?php echo $row['notification']; ?></td>
                            <td><?php echo $row['notification_date']; ?></td>
                            <td><?php echo $row['notification_type']; ?></td>
                            <td class="first-last-td">
                                <a href="editnoti.php<?php echo '?id='.$notid; ?>" class="btn btn-success">Edit</a>
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