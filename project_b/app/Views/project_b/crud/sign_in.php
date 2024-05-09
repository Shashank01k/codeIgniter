<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gender Selection</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="<?php echo base_url()?>/project_b/assets/css/sign_in.css">
    <title>User Login</title>
</head>
<body>
    <br>
    <div class="wrapper">
        <?php if(isset($validation)):?>
            <div class="alert alert-danger" role="alert" style="font-size: 12px;">
                <?= $validation ?>
            </div>
            <br>
        <?php endif;?>

        <?php if(isset($flashMessage)):?>
            <div class="alert alert-danger" role="alert" style="font-size: 12px;">Entered Password not match!</div>
            <br>
        <?php endif;?>
        <h5><center>Admin Login</center></h5>
        <div class="logo">
            <img src="<?php echo base_url()?>project_b/assets/images/innsight_logo.png" alt="">
        </div>
        <div class="text-center mt-4 name">
            InNSight
        </div>
        <form action="<?php echo base_url(); ?>sign_in" method="post" class="p-3 mt-3">
            <div class="form-field d-flex align-items-center">
                <span class="far fa-user"></span>
                <input type="email" name="email" id="email" value="<?= set_value('email') ?>" placeholder="Email">
            </div>
            <div class="form-field d-flex align-items-center">
                <span class="fas fa-key"></span>
                <input type="password" name="password" id="pwd" value="<?= set_value('password') ?>" placeholder="Password">
            </div>
            <button type="submit" class="btn mt-3">Log in</button>
        </form>
        <div class="text-center fs-6">
            <!-- <a href="#">Forget password?</a> or  -->
            <!-- <a href="<?php echo base_url()?>/register">Sign up</a> -->
            <a href="<?php echo base_url()?>sign_up">Sign up</a>
        </div>
    </div>
</body>
</html>
