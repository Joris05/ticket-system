<div class="container mt-2">
    <h4 class="display-4" style="font-size: 2rem;">
        <?php
        $color = ($ticket->status === 'Open') ? 'text-success' : 'text-danger';
        ?>
        <?= $ticket->title . " <span class='fw-bold " . $color . "'>(" . $ticket->status . ")</span>"; ?>
    </h4>
    <hr>

    <div class="col mb-2">
        <div class="card h-100">
            <div class="card-body">
                <figure>
                    <blockquote class="blockquote">
                        <p><?= $ticket->msg; ?></p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        <?php
                        $user = $this->user->get_user($ticket->user_id);
                        $department = $this->department->get_department($user->department_id);
                        ?>
                        <?= $user->name; ?> in <cite title="Source Title"><?= $department->department_name; ?> Department</cite>
                    </figcaption>
                </figure>
                <div class="list-group">
                    <?php
                    foreach ($comments as $comment) {
                        $user = $this->user->get_user($comment['user_id']);
                    ?>
                    <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                        <div class="d-flex w-100 justify-content-between">
                        <h6 class="mb-1 text-danger"><?= $comment['msg'];?></h6>
                        <small><?= date('F d, Y h:ia', strtotime($comment['created'])); ?></small>
                        </div>
                        <small> - <?= $user->name;?></small>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="card-footer">
                Date Requested : <small class="text-muted"><?= date('F d, Y h:ia', strtotime($ticket->date_created)); ?></small><br>
                Date Closed : <?= ($ticket->status === 'Open') ? '' : '<small class="text-muted">' . date('F d, Y h:ia', strtotime($ticket->date_modified)) . '</small>'; ?>
            </div>
        </div>
    </div>
    <!-- <button type="button" <?= ($ticket->status === 'Open') ? 'disabled' : 'onclick=window.location="' . base_url() . 'ticket/status/' . $ticket->id . '/open"' ?> class="btn btn-success">Open</button> -->
    <?php
      if($ticket->status === 'Open'){ 
    ?>
    <button type="button" onclick="window.location='<?= base_url() . 'ticket/status/' . $ticket->id ?>/close'" class="btn btn-danger float-end mb-3">Partially Close</button>
   
    <form action="<?= base_url(); ?>ticket/comment/store" method="post">
        <div class="mb-3">
            <input type="hidden" name="id" value="<?= @$id;?>">
            <textarea class="form-control" name="msg" rows="10" placeholder="Enter you comments here..." required /></textarea>
        </div>
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Submit Comment</button>
        </div>
    </form>
    <?php } ?>
</div>