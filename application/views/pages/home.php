<div class="container">
    <h4 class="display-4" style="font-size: 2rem;"><?= $title; ?></h4>
    <hr>
    <div class="row justify-content-around">
        <div class="col-md-6 col-lg-4">
            <div class="wrimagecard wrimagecard-topimage">
                <div class="wrimagecard-topimage_header">
                    <i class="fas fa-lock-open cardIcon"></i>
                </div>
                <div class="wrimagecard-topimage_title h-140">
                    <h2 class="h4 text-center">
                        Open
                    </h2>
                    <h1><span class="badge bg-success"><?= $open; ?></span></h1>
                </div>
                <div class="card-action-bar">
                    <a class="float-lg-none link" onclick="window.location='<?= base_url(); ?>tickets/open'">View more</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="wrimagecard wrimagecard-topimage">
                <div class="wrimagecard-topimage_header">
                    <i class="fas fa-lock cardIcon"></i>
                </div>
                <div class="wrimagecard-topimage_title h-140">
                    <h2 class="h4 text-center">
                        Partially Closed
                    </h2>
                    <h1><span class="badge bg-danger"><?= $close; ?></span></h1>
                </div>
                <div class="card-action-bar">
                    <a class="float-right link" onclick="window.location='<?= base_url(); ?>tickets/close'">View more</a>
                </div>
            </div>
        </div>
    </div>
    <h4 class="display-4" style="font-size: 2rem;">Today's Tickets</h4>
    <hr>
    <div class="col-md-12 col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Message</th>
                    <th scope="col">Department</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($tickets as $ticket) {
                    $color = ($ticket['status'] === 'Open') ? 'text-success' : 'text-danger';
                    $user = $this->user->get_user($ticket['user_id']);
                    $department = $this->department->get_deparment($user->department_id);
                ?>
                    <tr onclick="window.location='<?= base_url(); ?>ticket/view/<?= $ticket['id']; ?>'">
                        <td><?= $ticket['title']; ?></td>
                        <td><?= $ticket['msg']; ?></td>
                        <td><?= $department->department_name; ?></td>
                        <td><?= date('F d, Y h:ia', strtotime($ticket['date_created'])); ?></td>
                        <td class="<?= $color; ?>"><?= $ticket['status']; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>