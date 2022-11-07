<button type="button" class="btn btn-primary btn-sm" onclick="window.location='<?= base_url() ?>admin/department/create'">
    <span class="fas fa-plus"></span> Add Department
</button>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Department</th>
                <th scope="col" width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($departments as $department) {

            ?>
                <tr>
                    <td><?= $department['department_name']; ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="window.location='<?= base_url(); ?>admin/edit/department/<?= $department['department_id']; ?>'">
                            <span class="fas fa-edit"></span> Edit
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="window.location='<?= base_url(); ?>admin/delete/department/<?= $department['department_id']; ?>'">
                            <span class=" fas fa-trash"></span> Delete
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>