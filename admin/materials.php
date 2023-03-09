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
        <div class="block-header">Lectures Materials</div>
        <div class="block-content">
            <form class="block-form" action="deletematerial.php" method="post">
                <div class="btn-group">
                    <a href="addmaterial.php" class="btn btn-info">Add Material</a>
                    <a onclick="modalVisable('material_delete')" class="btn btn-danger">Delete Material</a>
                </div>
                <div id="material_delete" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>Delete Material?</h3>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the Material you check?.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" onclick="modalVisable('material_delete')">Close</a>
                        <button name="delete_material" type="submit" class="btn btn-danger">Yes</button>
                    </div>
                </div>
                <table class="data-table">
                    <thead>
                    <tr>
                        <th></th>
                        <th><button id="subcode" type="button">Subject Code</button></th>
                        <th><button id="levelcode" type="button">Level Code</button></th>
                        <th><button id="lecturecode" type="button">Lecture Code</button></th>
                        <th><button id="lecturetitle" type="button">Lecture Title</button></th>
                        <th><button id="materialtype" type="button">Material Type</button></th>
                        <th><button id="materialtitle" type="button">Material Title</button></th>
                        <th><button id="materiallink" type="button">Material Link</button></th>
                        <th><button id="materialnotes" type="button">Material Notes</button></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-content">

                    <?php
                    $materialid = -1;
                    $material_query = mysqli_query($GLOBALS["conn"],"select * from lectures_materials") or die(mysqli_error($GLOBALS["conn"]));

                    while ($row = mysqli_fetch_array($material_query)) {
                        $materialid = $row['materialID'];
                        ?>

                        <tr>
                            <td class="first-last-td">
                                <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $materialid; ?>">
                            </td>
                            <td><?php echo $row['subCode']; ?></td>
                            <td><?php echo $row['levelCode']; ?></td>
                            <td><?php echo $row['lectureCode']; ?></td>

                            <?php
                            $lectcode = $row['lectureCode'];
                            $lectquery = mysqli_query($GLOBALS['conn'], "select * from lectures where lectureCode = '$lectcode'") or die(mysqli_error($GLOBALS['conn']));
                            $lectrow = mysqli_fetch_array($lectquery);
                            ?>

                            <td><?php echo $lectrow['lectureTitle']; ?></td>
                            <td><?php echo $row['materialType']; ?></td>
                            <td><?php echo $row['materialTitle']; ?></td>
                            <td><?php echo $row['link']; ?></td>
                            <td><?php echo $row['notes']; ?></td>
                            <td class="first-last-td">
                                <a href="editmaterial.php<?php echo '?id='.$materialid; ?>" class="btn btn-success">Edit</a>
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