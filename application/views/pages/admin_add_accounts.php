<div class="row">
    <form action="<?= base_url() . $url; ?>" method="post">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Name</label>
                <input value="<?= @$user->name; ?>" type="text" name="name" class="form-control" required autocomplete="off" autofocus="true" />
                <input type="hidden" name="user_id" value="<?= @$user->user_id; ?>">
            </div>
            <div class="mb-3">
                <label class="form-label">Username</label>
                <input value="<?= @$user->username; ?>" type="text" name="username" class="form-control" required autocomplete="off" />
            </div>
            <?php
            if (!@$id) {
            ?>
                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input value="ticket-2022" type="text" readonly name="password" class="form-control" required autocomplete="off" />
                </div>
            <?php } ?>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <select class="form-select" name="department" required />
                <option value="">Select</option>
                <?php foreach ($departments as $department) { ?>
                    <option <?= (@$user->department_id === $department['department_id']) ? 'selected' : ''; ?> value="<?= $department['department_id']; ?>"><?= $department['department_name']; ?></option>
                <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">User Type</label>
                <select class="form-select" name="utype" required />
                <option value="">Select</option>
                <option value="employee" <?= (@$user->user_type === 'employee') ? 'selected' : ''; ?>>employee</option>
                <option value="admin" <?= (@$user->user_type === 'admin') ? 'selected' : ''; ?>>admin</option>
                </select>
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?= (@$error) ? '<div class="alert alert-danger mt-3">' . $error . '</div>' : ''; ?>
        </div>
    </form>
</div>