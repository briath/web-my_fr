<?php

return $ways = [
    ''                  => ['MainController', 'indexAction'],
    '/'                 => ['MainController', 'indexAction'],
    '/error'            => ['MainController', 'errorAction'],
    '/guides'           => ['MainController', 'guideAction'],
    '/videos'           => ['MainController', 'videoAction'],
    '/graphs'           => ['MainController', 'graphAction'],

    '/registration'     => ['UserController', 'registrationAction'],
    '/login'            => ['UserController', 'loginAction'],

    '/articles'         => ['ArticleController', 'show_articleAction'],
];