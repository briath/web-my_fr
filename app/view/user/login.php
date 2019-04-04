<?php $this->start('head'); ?>
<?php $this->end(); ?>
<?php $this->start('body'); ?>
<div class="col-md-6 offset-md-3 card card-body bg-light">
    <form class="form" action="" method="post">
        <div class="bg-danger"><?=$this->displayErrors ?></div>
        <h3 class="text-center">Log In</h3>
        <div class="form-group">
            <label for="user_login">Username</label>
            <input type="text" name="user_login" id="user_login" class="form-control">
        </div>
        <div class="form-group">
            <label for=user_password">Password</label>
            <input type="password" name="user_password" id="user_password" class="form-control">
        </div>
        <div class="form-group">
            <label for="remember_me">Remember Me <input type="checkbox" id="remember_me" name="remember_me" value="on"></label>
        </div>
        <div class="form-group">
            <input type="submit" value="Login" class="btn btn-large btn-primary">
        </div>
        <div class="text-right">
            <a href="register" class="text-primary">Register</a>
        </div>
    </form>
</div>
<?php $this->end(); ?>