<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CodeIgniter Auth User Registration Example</title>
    <!-- Include Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h2>Register</h2>
                <?php if(isset($validation)):?>
                <div class="alert alert-warning">
                  <?= $validation->listErrors() ?>
                </div>
                <?php endif;?>
                <form method="post" action="<?= base_url('/RegisterController/store'); ?>">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input type="text" value="<?= set_value('username') ?>" class="form-control" id="username" name="username" required>
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <input type="email" value="<?= set_value('email') ?>" class="form-control" id="email" name="email" required>
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" class="form-control" id="password" name="password" required>
                    </div>
                    <div class="mb-3">
                        <label for="confirm_password" class="form-label">Confirm Password</label>
                        <input type="password" class="form-control" id="confirm_password" name="confirm_password" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Signup</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/5.0.0/js/bootstrap.min.js"></script>
</body>
</html>
