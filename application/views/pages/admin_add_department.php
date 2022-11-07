<div class="row">
    <form action="<?= base_url() . $url; ?>" method="post">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Department Name</label>
                <input value="<?= @$department->department_name; ?>" type="text" name="department" class="form-control" placeholder="Department" required autocomplete="off" autofocus="true" />
                <input type="hidden" name="department_id" value="<?= @$department->department_id; ?>">
            </div>
            <div class="col-12">
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?= (@$error) ? '<div class="alert alert-danger mt-3">' . $error . '</div>' : ''; ?>
        </div>
    </form>
</div>