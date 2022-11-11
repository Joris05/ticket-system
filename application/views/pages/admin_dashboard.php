<div class="row">
    <div class="col-md-3">
        <div class="card border-0">
            <div class="card-counter primary">
                <i class="fa fa-ticket-alt"></i>
                <span class="count-numbers"><?= $today;?></span>
                <span class="count-name">Today's Tickets</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0">
            <div class="card-counter success">
                <i class="fa fa-ticket-alt"></i>
                <span class="count-numbers"><?= $open; ?></span>
                <span class="count-name">Open Tickets</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0">
            <div class="card-counter danger">
                <i class="fa fa-database"></i>
                <span class="count-numbers"><?= $close; ?></span>
                <span class="count-name">Closed Tickets</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card border-0">
            <div class="card-counter info">
                <i class="fa fa-ticket-alt"></i>
                <span class="count-numbers"><?= $all; ?></span>
                <span class="count-name">Total Tickets</span>
            </div>
        </div>
    </div>
</div>

<h4 class="mt-2">Today's Tickets</h4>
<div class="table-responsive">
    <table class="table table-striped table-sm">
        <thead>
            <tr>
                <th scope="col">Title</th>
                <th scope="col">Message</th>
                <th scope="col">Department</th>
                <th scope="col">Date Submitted</th>
                <th scope="col">Date Close</th>
                <th scope="col">Status</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>1,001</td>
                <td>random</td>
                <td>data</td>
                <td>placeholder</td>
                <td>text</td>
                <td>text</td>
            </tr>
        </tbody>
    </table>
</div>