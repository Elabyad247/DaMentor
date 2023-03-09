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
        <div class="block-header">Good Stuff</div>
        <div class="block-content">
            <form class="block-form" action="deletestuff.php" method="post">
                <div class="btn-group">
                    <a href="addstuff.php" class="btn btn-info">Add Stuff</a>
                    <a onclick="modalVisable('stuff_delete')" class="btn btn-danger">Delete Stuff</a>
                </div>
                <div id="stuff_delete" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>Delete Stuff?</h3>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the Stuff you check?.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" onclick="modalVisable('stuff_delete')">Close</a>
                        <button name="delete_stuff" type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th></th>
                        <th><button id="Stufftype" type="button">Stuff Type</button></th>
                        <th><button id="Stufftitle" type="button">Stuff Title</button></th>
                        <th><button id="Stufflink" type="button">Stuff Link</button></th>
                        <th><button id="Stuffnotes" type="button">Stuff Notes</button></th>
                        <th><button id="Stuffnotes" type="button">Stuff Height</button></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-content">

                    <?php
                    $Stuffid = -1;
                    $Stuff_query = mysqli_query($GLOBALS["conn"],"select * from useful_stuff") or die(mysqli_error($GLOBALS["conn"]));

                    while ($row = mysqli_fetch_array($Stuff_query)) {
                        $Stuffid = $row['usefulID'];
                        ?>

                        <tr>
                            <td class="first-last-td">
                                <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $Stuffid; ?>">
                            </td>
                            <td><?php echo $row['usefulType']; ?></td>
                            <td><?php echo $row['usefulTitle']; ?></td>
                            <td><?php echo $row['link']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td><?php echo $row['height']; ?></td>
                            <td class="first-last-td">
                                <a href="editstuff.php<?php echo '?id='.$Stuffid; ?>" class="btn btn-success">Edit</a>
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