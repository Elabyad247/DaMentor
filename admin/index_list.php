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
        <div class="block-header">Index List</div>
        <div class="block-content">
            <form class="block-form" action="deleteindex.php" method="post">
                <div class="btn-group">
                    <a href="addindex.php" class="btn btn-info">Add Index</a>
                    <a onclick="modalVisable('index_delete')" class="btn btn-danger">Delete Index</a>
                </div>
                <div id="index_delete" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>Delete Index?</h3>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the index you check?.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" onclick="modalVisable('index_delete')">Close</a>
                        <button name="delete_index" type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th></th>
                        <th><button id="indexsub" type="button">Index Subject</button></th>
                        <th><button id="indexlevel" type="button">Index Level</button></th>
                        <th><button id="indexlecture" type="button">Index Lecture</button></th>
                        <th><button id="indexdetails" type="button">Index Details</button></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-content">

                    <?php
                    $indexid = -1;
                    $indexquery = mysqli_query($GLOBALS["conn"],"select * from index_list order by subject ASC") or die(mysqli_error($GLOBALS["conn"]));

                    while ($row = mysqli_fetch_array($indexquery)) {
                        $indexid = $row['id'];
                        ?>

                        <tr>
                            <td class="first-last-td">
                                <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $indexid; ?>">
                            </td>
                            <td><?php echo $row['subject']; ?></td>
                            <td><?php echo $row['level']; ?></td>
                            <td><?php echo $row['lecture']; ?></td>
                            <td><?php echo $row['details']; ?></td>
                            <td class="first-last-td">
                                <a href="editindex.php<?php echo '?id='.$indexid; ?>" class="btn btn-success">Edit</a>
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