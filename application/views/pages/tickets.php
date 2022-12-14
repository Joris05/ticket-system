<div class="container mt-2">
    <h4 class="display-4" style="font-size: 2rem;">Your Ticket</h4>
    <hr>
    <div class="col-md-12 col-lg-12">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Message</th>
                    <th scope="col">Priority</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tickets as $ticket) {
                    $color = ($ticket['status'] === 'Open') ? 'text-success' : 'text-danger';
                ?>
                    <tr onclick="window.location='<?= base_url(); ?>ticket/view/<?= $ticket['id']; ?>'">
                        <td><?= $ticket['title']; ?></td>
                        <td><?= $ticket['msg']; ?></td>
                        <td><?= $ticket['priority']; ?></td>
                        <td><?= date('F d, Y h:ia', strtotime($ticket['date_created'])); ?></td>
                        <td class="<?= $color; ?>"><?= $ticket['status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
    <h4 class="display-4 mt-5" style="font-size: 2rem;"><?= @$title; ?></h4>
    <hr>
    <div class="col-md-12 col-lg-12">
        <div class="row g-3 align-items-center">
            <div class="col-auto">
                <label class="col-form-label">Status</label>
            </div>
            <div class="col-auto">
                <select class="form-select" onchange="window.location='<?= base_url(); ?>tickets/' + this.value">
                    <option value="all" <?= ($params === 'All') ? 'selected' : ''; ?>>All</option>
                    <option value="open" <?= ($params === 'open') ? 'selected' : ''; ?>>Open</option>
                    <option value="close" <?= ($params === 'close') ? 'selected' : ''; ?>>Partially Close</option>
                </select>
            </div>
            <div class="col-auto">
                <label class="col-form-label">Department</label>
            </div>
            <div class="col-auto">
                <select class="form-select" onchange="window.location='<?= base_url(); ?>tickets/filter/' + this.value + '/<?= $params; ?>'">
                    <option>All</option>
                    <?php foreach ($departments as $department) { ?>
                        <option value="<?= $department['department_id']; ?>"><?= $department['department_name']; ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="col-auto">
                <input type="text" class="form-control float-end" placeholder="Search...">
            </div>
        </div>
    </div>
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Message</th>
                <th scope="col">Priority</th>
                <th scope="col">Department</th>
                <th scope="col">Date</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <?php
            foreach ($ticketsDepartment as $tickets) {
                $color = ($tickets['status'] === 'Open') ? 'text-success' : 'text-danger';
                $user = $this->user->get_user($tickets['user_id']);
                $department = $this->department->get_department($user->department_id);
            ?>
                <tr onclick="window.location='<?= base_url(); ?>ticket/view/<?= $tickets['id']; ?>'">
                    <td><?= $tickets['title']; ?></td>
                    <td><?= $tickets['msg']; ?></td>
                    <td><?= $tickets['priority']; ?></td>
                    <td><?= @$department->department_name; ?></td>
                    <td><?= date('F d, Y h:ia', strtotime($tickets['date_created'])); ?></td>
                    <td class="<?= $color; ?>"><?= $tickets['status']; ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>
</div>