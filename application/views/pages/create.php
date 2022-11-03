<div class="container">
    <h4 class="display-4" style="font-size: 2rem;"><?= $title; ?></h4>
    <hr>
    <div class="row">
        <div class="col-md-6">
            <div class="mb-3">
                <label class="form-label">Title</label>
                <input type="text" class="form-control" placeholder="Title">
            </div>
            <div class="mb-3">
                <label class="form-label">Department</label>
                <select class="form-select">
                    <option>Select</option>
                    <?php foreach ($departments as $department) { ?>
                        <option value="<?= $department['department_id']; ?>"><?= $department['department_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="mb-3">
                <label class="form-label">Message</label>
                <textarea class="form-control" rows="10" placeholder="Enter you message here..."></textarea>
            </div>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Create</button>
        </div>
    </div>
</div>