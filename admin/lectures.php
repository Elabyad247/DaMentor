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
        <div class="block-header">Lectures</div>
        <div class="block-content">
            <form class="block-form" action="deletelecture.php" method="post">
                <div class="btn-group">
                    <a href="addlecture.php" class="btn btn-info">Add Lecture</a>
                    <a onclick="modalVisable('lecture_delete')" class="btn btn-danger">Delete Lecture</a>
                </div>
                <div id="lecture_delete" class="modal hide" tabindex="-1" aria-hidden="true">
                    <div class="modal-header">
                        <h3>Delete Lecture?</h3>
                    </div>
                    <div class="modal-body">
                        <p>Are you sure you want to delete the Lecture you check?.</p>
                    </div>
                    <div class="modal-footer">
                        <a class="btn" onclick="modalVisable('lecture_delete')">Close</a>
                        <button name="delete_lecture" type="submit" class="btn btn-danger">Yes</button>
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
                        <th><button id="lecturedesc" type="button">Lecture Description</button></th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody id="table-content">

                    <?php
                        $lectureid = -1;
                        $lecture_query = mysqli_query($GLOBALS["conn"],"select * from lectures") or die(mysqli_error($GLOBALS["conn"]));
                        while ($row = mysqli_fetch_array($lecture_query)) {
                            $lectureid = $row['lectureID'];
                    ?>

                        <tr>
                            <td class="first-last-td">
                                <input id="optionCheckBox" class="check-on" name="selector[]" type="checkbox" value="<?php echo $lectureid; ?>">
                            </td>
                            <td><?php echo $row['subCode']; ?></td>
                            <td><?php echo $row['levelCode']; ?></td>
                            <td><?php echo $row['lectureCode']; ?></td>
                            <td><?php echo $row['lectureTitle']; ?></td>
                            <td><?php echo $row['lectureDescription']; ?></td>
                            <td class="first-last-td">
                                <a href="editlecture.php<?php echo '?id='.$lectureid; ?>" class="btn btn-success">Edit</a>
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