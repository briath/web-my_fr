<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 04.04.19
 * Time: 14:59
 */

namespace app\model;


use my_fr\core\Model;

class UserSessions extends Model
{
    public function __construct()
    {
        $table = 'user_sessions';
        parent::__construct($table);

    }
}