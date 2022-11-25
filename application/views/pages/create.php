<div class="container mt-2">
    <h4 class="display-4" style="font-size: 2rem;"><?= $title; ?></h4>
    <hr>
    <div class="row">
        <form action="<?= base_url(); ?>ticket/store" method="post">
            <div class="col-md-6">
                <div class="mb-3">
                    <label class="form-label">Title</label>
                    <input type="text" name="title" class="form-control text-capitalize" placeholder="Title" required autocomplete="off" autofocus="true" />
                </div>
                <div class="mb-3">
                    <label class="form-label">Department</label>
                    <select class="form-select" name="department" required />
                    <option value="">Select</option>
                    <?php foreach ($departments as $department) { ?>
                        <option value="<?= $department['department_id']; ?>"><?= $department['department_name']; ?></option>
                    <?php } ?>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Priority Level</label>
                    <select class="form-select" name="priority" required />
                    <option value="">Select</option>
                    <option value="Red Flag">Red Flag</option>
                    <option value="Urgent">Urgent</option>
                    <option value="High">High</option>
                    <option value="Medium">Medium</option>
                    <option value="Low">Low</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <textarea class="form-control" name="msg" rows="10" placeholder="Enter you message here..." required /></textarea>
                </div>
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
                <?= (@$error) ? '<div class="alert alert-danger mt-3">' . $error . '</div>' : ''; ?>
            </div>
        </form>
    </div>
</div>