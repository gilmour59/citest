<?= $this->extend("\Modules\Student\Views\app") ?>

<?= $this->section("title") ?>
List Student Page
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
<?= $this->endSection() ?>

<?= $this->section("body") ?>
<div class="panel panel-primary">
    <div class="panel-heading">
    Student List
    <a href="<?= base_url('student/create') ?>" style="margin-top: -7px;" class="btn btn-info pull-right">Add Student</a>
    </div>
    <div class="panel-body">
        <table class="table" id="tbl-student-list">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>#Name</th>
                    <th>#Email</th>
                    <th>#Phone</th>
                    <th>#Profile Image</th>
                    <th>#Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($students) > 0) {
                    foreach ($students as $student) {
                ?>
                        <tr>
                            <td><?= $student['id'] ?></td>
                            <td><?= $student['name'] ?></td>
                            <td><?= $student['email'] ?></td>
                            <td><?= $student['mobile'] ?></td>
                            <td>
                            <?php
                                if(isset($student['profile_image']) && !empty($student['profile_image'])){
                                    ?>
                                         <img src="<?= $student['profile_image'] ?>" class="img-student"/>
                                    <?php
                                }else{
                                    echo "No Profile Image";
                                }
                            ?>
                           
                            </td>
                            <td>
                                <a href="<?= base_url('student/edit/'.$student['id']) ?>" class="btn btn-info">Edit</a>
                                <a href="#" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-student-<?= $student['id'] ?>').submit() }" class="btn btn-danger">Delete</a>

                                <form id="frm-delete-student-<?= $student['id'] ?>" action="<?= base_url('student/delete/') ?>" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                                </form>
                            </td>
                        </tr>
                <?php
                    }
                }
                ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>

<?= $this->section("scripts") ?>
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>

<script>
    $(function() {

        $("#tbl-student-list").DataTable()
    });
</script>

<?= $this->endSection() ?>