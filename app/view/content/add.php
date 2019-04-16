<?php $this->start('head'); ?>
<?php $this->end(); ?>


<?php $this->start('body'); ?>
<div class="col-md-6 offset-md-3 card card-body bg-light">
    <form class="form needs-validation" action="" method="post">
        <div class="bg-danger"><?=$this->displayErrors ?></div>
        <h3 class="text-center">Add content</h3>
        <div class="form-group">
            <label for="name_content">Name</label>
            <input type="text" name="name_content" id="name_content" class="form-control" placeholder="name" required>
            <div class="invalid-tooltip">Please provide a valid name.</div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="">Type content</label>
            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
        </div>
        <div class="form-group">
            <label for="url">Add <?= $this->_attr[0] ?></label>
            <input type="text" name="url" id="url" class="form-control" placeholder="url">
        </div>
        <div class="form-group">
            <input type="submit" value="Add" class="btn btn-large btn-primary">
        </div>
    </form>
</div>
<?php $this->end(); ?>
