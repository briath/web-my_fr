<?php $this->setSiteTitle('ProPUBG - Guides') ?>

<?php $this->start('head'); ?>
<?php $this->end(); ?>


<?php $this->start('body'); ?>
<main class="mt-5" id="main">
    <div class="container">
        <h2 class="md-5 font-weight-bold">HOME</h2>
        <?php $this->_render ?>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Previous">
                        <span aria-hidden="true">&laquo;</span>
                    </a>
                </li>
                <li class="page-item"><a class="page-link" href="/contents/guides/1">1</a></li>
                <li class="page-item"><a class="page-link" href="/contents/guides/2">2</a></li>
                <li class="page-item"><a class="page-link" href="/contents/guides/3">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#" aria-label="Next">
                        <span aria-hidden="true">&raquo;</span>
                    </a>
                </li>
            </ul>
        </nav>

        <a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-lg mx-md-1" href="/contents/add/guid">add content</a>
    </div>
</main>
<?php $this->end(); ?>
