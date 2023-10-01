<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign In</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Login In</h2>

                <?php if(session()->getFlashdata('msg')):?>
                  <div class="alert alert-warning">
                    <?=session()->getFlashdata('msg') ?>
                  </div>
                <?php endif;?>
                <form method="post" action="<?php echo base_url(); ?>SigninController/LoginAuth">
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="<?= set_value('email') ?>" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Sign In</button>
                </form>
                <p class="mt-3">Don't have an account? <a href="/RegisterController/register">Register here</a></p>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>
</html>
