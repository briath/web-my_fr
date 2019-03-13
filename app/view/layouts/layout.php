

<!DOCTYPE html>
<html lang="ru">
    <head>
        <meta charset="UTF-8">
        <title><?=$this->title?></title>

        <link href="/css/bootstrap.min.css" rel="stylesheet">
    </head>
    <body>
        <div id="main_wrapper">
            <?=include $this->view;?>
        </div>
        <div id="main_wrapper">
            <?=$this->_render();?>
        </div>
    </body>
</html>