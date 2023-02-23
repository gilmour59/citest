<?= $this->extend("\Modules\Device\Views\app") ?>

<?= $this->section("title") ?>
List Device Page
<?= $this->endSection() ?>

<?= $this->section("styles") ?>
<link rel="stylesheet" href="https://cdn.datatables.net/1.10.23/css/jquery.dataTables.min.css" />
<?= $this->endSection() ?>

<?= $this->section("body") ?>
<div class="panel panel-primary">
    <div class="panel-heading">
    Device List
    <a href="<?= base_url('device/create') ?>" style="margin-top: -7px;" class="btn btn-info pull-right">Add device</a>
    </div>
    <div class="panel-body">
        <table class="table" id="tbl-device-list">
            <thead>
                <tr>
                    <th>#ID</th>
                    <th>#Name</th>
                    <th>#Type</th>                    
                </tr>
            </thead>
            <tbody>
                <?php
                if (count($devices) > 0) {
                    foreach ($devices as $device) {
                ?>
                        <tr>
                            <td><?= $device['id'] ?></td>
                            <td><?= $device['name'] ?></td>
                            <td><?= $device['type'] ?></td>                            
                            <td>
                                <a href="<?= base_url('device/edit/'.$device['id']) ?>" class="btn btn-info">Edit</a>
                                <a href="#" onclick="if(confirm('Are you sure want to delete?')){ $('#frm-delete-device-<?= $device['id'] ?>').submit() }" class="btn btn-danger">Delete</a>

                                <form id="frm-delete-device-<?= $device['id'] ?>" action="<?= base_url('device/delete/') ?>" method="post">
                                    <input type="hidden" name="_method" value="delete">
                                    <input type="hidden" name="id" value="<?= $device['id'] ?>">
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

        $("#tbl-device-list").DataTable()
    });
</script>

<?= $this->endSection() ?>