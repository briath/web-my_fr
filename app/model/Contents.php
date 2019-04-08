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
    public function __construct($class_content)
    {
        $table = 'contents';
        parent::__construct($table);
        $this->class_content = $class_content;
    }

    public function add_content($params){
        $this->assign($params);
        $this->save();
    }

    public function view_content($number_page){
        $table = 'contents';
        $first = ($number_page - 1) * 10;
        $second = $number_page * 10 - 1;
        $results = $this->_db->find($table/*, ['conditions' => ['ROWNUM >= ?', 'ROWNUM  <= ?'], 'bind' => [$first, $second]]*/);
        if(!empty($results)) {
            foreach ($results as $result) {
                if ($result->class_content == 'guides') {
                    return 'qwerty';
                }
            }
        }
    }

}