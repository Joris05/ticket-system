<button type="button" class="btn btn-primary btn-sm" onclick="window.location='<?= base_url() ?>admin/user/create'">
    <span class="fas fa-plus"></span> Add User
</button>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Name</th>
                <th scope="col">Username</th>
                <th scope="col">Department</th>
                <th scope="col">User Type</th>
                <th scope="col" width="150px">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($users as $user) {
                $department = $this->department->get_department($user['department_id']);
            ?>
                <tr>
                    <td><?= $user['name']; ?></td>
                    <td><?= $user['username']; ?></td>
                    <td><?= $department->department_name; ?></td>
                    <td><?= $user['user_type']; ?></td>
                    <td>
                        <button type="button" class="btn btn-outline-primary btn-sm" onclick="window.location='<?= base_url(); ?>admin/edit/user/<?= $user['user_id']; ?>'">
                            <span class="fas fa-edit"></span> Edit
                        </button>
                        <button type="button" class="btn btn-outline-danger btn-sm" onclick="window.location='<?= base_url(); ?>admin/delete/user/<?= $user['user_id']; ?>'">
                            <span class=" fas fa-trash"></span> Delete
                        </button>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>