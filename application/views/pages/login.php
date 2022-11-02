<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <title>Signin User · Ticket System</title>



    <!-- Bootstrap core CSS -->
    <link href="<?= base_url() ?>assets/css/bootstrap.min.css" rel="stylesheet">
    <!-- Favicon -->
    <link rel="shortcut icon" href="<?= base_url() ?>assets/images/ticket-icon.png" />

    <meta name="theme-color" content="#7952b3">


    <style>
        .bd-placeholder-img {
            font-size: 1.125rem;
            text-anchor: middle;
            -webkit-user-select: none;
            -moz-user-select: none;
            user-select: none;
        }

        @media (min-width: 768px) {
            .bd-placeholder-img-lg {
                font-size: 3.5rem;
            }
        }
    </style>


    <!-- Custom styles for this template -->
    <link href="<?= base_url() ?>assets/css/signin.css" rel="stylesheet">
</head>

<body class="text-center">

    <main class="form-signin">
        <form method="POST" action="<?= base_url(); ?>checkUser">
            <img class="mb-4" src="<?= base_url() ?>assets/images/ticket-icon.png" alt="" width="72" height="57">
            <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

            <div class="form-floating">
                <input type="text" class="form-control" id="floatingInput" placeholder="username" name="username" required autocomplete="off" autofocus="true" />
                <label for="floatingInput">Username</label>
            </div>
            <div class="form-floating">
                <input type="password" class="form-control" id="floatingPassword" placeholder="password" name="password" required />
                <label for="floatingPassword">Password</label>
            </div>
            <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
            <p class="mt-3 mb-2 text-muted">&copy; Ramiro Community Hospital - <?= date("Y"); ?></p>
        </form>
        <?= (@$error) ? '<div class="alert alert-danger">' . $error . '</div>' : ''; ?>
    </main>



</body>

</html>