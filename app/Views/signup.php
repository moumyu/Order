<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('css/main.css'); ?>">
    <title>Sign Up</title>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center" style="min-height: 100vh;min-width: 100vw;">
        <div class="row card justify-content-md-center" style="width: 350px">
            <div class="card-body">
                <h2 class="text-center">Register User</h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                   <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form action="<?php echo base_url(); ?>/SignupController/store" method="post">
                    <div class="form-group mb-3">
                        <input type="text" name="name" placeholder="Name" value="<?= set_value('name') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="email" name="email" placeholder="Email" value="<?= set_value('email') ?>" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="password" placeholder="Password" class="form-control" >
                    </div>
                    <div class="form-group mb-3">
                        <input type="password" name="confirmpassword" placeholder="Confirm Password" class="form-control" >
                    </div>
                    <div class="d-grid">
                        <button type="submit" class="btn btn-dark">Signup</button>
                    </div>
                    <div class="d-flex mt-2">
                        Already have an account? <a href="<?php echo base_url(); ?>signin">Login</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>