<?php $this->start('head');?>
<?php $this->end();?>
<?php $this->start('body');?>
<div class="col-md-6 offset-md-3 card card-body bg-light">
    <h3 class="text-center">Register</h3><hr>
    <form class="form" action="" method="post">
        <div class="bg-danger"><?= $this->displayErrors ?></div>
        <div class="form-group">
            <label for="user_login">Nickname</label>
            <input type="text" id="user_login" name="user_login" class="form-control" value="<?= $this->post['user_login'] ?>">
        </div>
        <div class="form-group">
            <label for="email">email</label>
            <input type="email" id="email" name="email" class="form-control" value="<?= $this->post['email'] ?>">
        </div>
        <div class="form-group">
            <label for="user_password">password</label>
            <input type="password" id="user_password" name="user_password" class="form-control" value="<?= $this->post['password'] ?>">
        </div>
        <div class="form-group">
            <label for="confirm">confirm</label>
            <input type="password" id="confirm" name="confirm" class="form-control" value="<?= $this->post['confirm'] ?>">
        </div>
        <div class="pull-right">
            <input type="submit" class="btn btn-primary btn-large" value="Register">
        </div>
    </form>
</div>
<?php $this->end();?>
