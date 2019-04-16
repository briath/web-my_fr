<?php $this->setSiteTitle('ProPUBG - Educational videos') ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>

<?php $this->start('body'); ?>
<main class="mt-5" id="main">
    <div class="container mb-5">
        <h2 class="md-5 font-weight-bold text-center">Videos</h2>
        <?= include "dropdown.php"; ?>

        <?= $this->codeContent ?>

        <a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-lg mx-md-1" href="/contents/add/videos">Add content</a>
    </div>
</main>
<?php $this->end(); ?>
