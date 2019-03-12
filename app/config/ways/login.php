<?php

return $ways = [
    ''                  => ['MainController', 'indexAction'],
    '/'                 => ['MainController', 'indexAction'],
    '/error'            => ['MainController', 'errorAction'],
    '/guides'           => ['MainController', 'guideAction'],
    '/videos'           => ['MainController', 'videoAction'],
    '/graphs'           => ['MainController', 'graphAction'],

    '/logout'           => ['UserController', 'logoutAction'],
    '/user'             => ['UserController', 'indexAction'],

    '/articles'         => ['ArticleController', 'show_articleAction'],
];