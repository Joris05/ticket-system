<div class="container">
    <h4 class="display-4" style="font-size: 2rem;"><?= $title; ?></h4>
    <hr>
    <div class="row justify-content-around">
        <div class="col-md-6 col-lg-4">
            <div class="wrimagecard wrimagecard-topimage">
                <div class="wrimagecard-topimage_header">
                    <i class="bi bi-users cardIcon"></i>
                </div>
                <div class="wrimagecard-topimage_title h-140">
                    <h2 class="h4 text-center">
                        Open
                    </h2>
                    <h1><span class="badge bg-success"><?= $open; ?></span></h1>
                </div>
                <div class="card-action-bar">
                    <a class="float-lg-none link">View more</a>
                </div>
            </div>
        </div>
        <div class="col-md-6 col-lg-4">
            <div class="wrimagecard wrimagecard-topimage">
                <div class="wrimagecard-topimage_header">
                    <i class="fas fa-desktop cardIcon"></i>
                </div>
                <div class="wrimagecard-topimage_title h-140">
                    <h2 class="h4 text-center">
                        Partially Closed
                    </h2>
                    <h1><span class="badge bg-danger"><?= $close; ?></span></h1>
                </div>
                <div class="card-action-bar">
                    <a class="float-right link">View more</a>
                </div>
            </div>
        </div>
    </div>
    <h4 class="display-4" style="font-size: 2rem;">New Ticket</h4>
    <hr>
    <div class="col-md-12 col-lg-12">
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">Title</th>
                    <th scope="col">Message</th>
                    <th scope="col">Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Mark</td>
                    <td>Otto</td>
                    <td>@mdo</td>
                    <td>@mdo</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>