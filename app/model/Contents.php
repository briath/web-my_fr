<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 04.04.19
 * Time: 15:57
 */

namespace app\model;


use my_fr\core\Model;

class Contents extends Model
{
    public function __construct()
    {
        $table = 'contents';
        parent::__construct($table);
    }
}