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
        <div class="block-header">Subjects</div>
        <div class="block-content">
            <form class="block-form" action="deletesubject.php" method="post">
                <div class="btn-group">
                    <a href="addsubject.php" class="btn btn-info">Add Subject</a>
                    <a onclick="modalVisable('subject_delete')" class="btn btn-danger">Delete Subject</a>
                </div>
                <div id="subject_delete" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>Delete Subject?</h3>
                    </div>
                    <div class="modal-body">
                            <p>Are you sure you want to delete the subject you check?.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" onclick="modalVisable('subject_delete')">Close</a>
                        <button name="delete_subject" type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                        <tr>
                            <th></th>
                            <th><button id="subcode">Subject Code</button></th>
                            <th><button id="subtitle">Subject Title</button></th>
                            <th><button id="subdesc">Subject Description</button></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody id="table-content">

                        <?php
                            $subid = -1;
                            $subjects_query = mysqli_query($GLOBALS["conn"],"select * from subjects") or die(mysqli_error($GLOBALS["conn"]));
                            while ($row = mysqli_fetch_array($subjects_query)) {
                                $subid = $row['subID'];
                        ?>

                                <tr>
                                    <td class="first-last-td">
                                        <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $subid; ?>">
                                    </td>
                                    <td><?php echo $row['subCode']; ?></td>
                                    <td><?php echo $row['subTitle']; ?></td>
                                    <td><?php echo $row['subDescription']; ?></td>
                                    <td class="first-last-td">
                                        <a href="editsubject.php<?php echo '?id='.$subid; ?>" class="btn btn-success">Edit</a>
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