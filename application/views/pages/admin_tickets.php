<div class="row">
    <div class="col col-12 col-md-12">
        <nav>
            <div class="nav nav-tabs" id="nav-tab" role="tablist">
                <a
                  onclick="window.location = '<?= base_url(); ?>admin/tickets/open'"
                  class="nav-link <?= ($stat==='open')?'active':'';?>"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-home"
                  type="button"
                  role="tab"
                  aria-controls="nav-home"
                  aria-selected="true">Open</a>
                <a
                 onclick="window.location = '<?= base_url(); ?>admin/tickets/closed'"
                  class="nav-link <?= ($stat==='closed')?'active':'';?>"
                  data-bs-toggle="tab"
                  data-bs-target="#nav-profile"
                  type="button"
                  role="tab"
                  aria-controls="nav-profile"
                  aria-selected="false">Partially
                  Closed</a>
            </div>
        </nav>
        <div class="tab-content">
            <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                <table class="table table-striped table-sm mt-2">
                    <thead>
                        <tr>
                            <th scope="col">Title</th>
                            <th scope="col">Message</th>
                            <th scope="col">Priority</th>
                            <th scope="col">Department</th>
                            <th scope="col">Date Submitted</th>
                            <th scope="col">Date Close</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach ($alltickets as $tickets){
                                $color = ($tickets['status'] === 'Open') ? 'text-success' : 'text-danger';
                                $user = $this->user->get_user($tickets['user_id']);
                                $department = $this->department->get_department($user->department_id);
                            ?>
                                <tr onclick="window.location='<?= base_url(); ?>admin/ticket/view/<?= $tickets['id']; ?>'">
                                    <td><?= $tickets['title']; ?></td>
                                    <td><?= $tickets['msg']; ?></td>
                                    <td><?= $tickets['priority']; ?></td>
                                    <td><?= @$department->department_name; ?></td>
                                    <td><?= date('F d, Y h:ia', strtotime($tickets['date_created'])); ?></td>
                                    <td><?= date('F d, Y h:ia', strtotime($tickets['date_modified'])); ?></td>
                                    <td class="<?= $color; ?>"><?= $tickets['status']; ?></td>
                                </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    
</div>