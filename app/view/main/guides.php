<?php $this->setSiteTitle('ProPUBG - Guides') ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>


<?php $this->start('body'); ?>
<main class="mt-5" id="main">
    <div class="container mb-5">
        <h2 class="md-5 font-weight-bold text-center">Guides</h2>
        <?= $this->codeContent ?>

        <a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-lg mx-md-1" href="/contents/add/guid">add content</a>
    </div>
</main>
<?php $this->end(); ?>
