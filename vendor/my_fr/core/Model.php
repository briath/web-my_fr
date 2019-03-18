<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 06.03.19
 * Time: 15:30
 */
namespace my_fr\core;

use my_fr\core\DB;

class Model
{
    protected $_db, $_table, $_modelName, $_softDelete = false, $_columnNames = [];
    public $id;

    public function __construct($table)
    {
        $this->_db = DB::getInstance();
        $this->_table = $table;
        $this->_setTableColumns();
        $this->_modelName = str_replace( ' ', '', ucwords(str_replace('_', ' ', $this->_table)));
    }

    protected function _setTableColumns(){
        $columns = $this->get_columns();
        foreach ($columns as $column){
            $this->_columnNames[] = $column->Field;
            $this->{$columnName} = null;
        }
    }

    public function get_columns(){
        return $this->_db->get_columns($this->_table);
    }
}