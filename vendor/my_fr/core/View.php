<?php


class View
{
    /**
     * object View
     */
    private static $_view;

    public function getView($layout = null)
    {
        if (null === self::$_view) {
            self::$_view = new self();
        }

        return self::$_view;
    }


    public function render($folder, $view, $attr = null){
        if(file_exists($folder)){

        }
    }
}