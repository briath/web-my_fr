<?php
/**
 * Created by PhpStorm.
 * User: maxim
 * Date: 06.03.19
 * Time: 16:02
 */

namespace app\controller;

use app\view\ViewRegistration;
use my_fr\core\Controller;

class MainController extends Controller
{

    public function __construct($params = null)
    {
        $this->_params = $params;
        print_r($this->_params);
    }

    public function indexAction(){
        echo "<form method=\"POST\">
                Log in      <input name=\"login\" type=\"text\" required placeholder=\"Name\">*<br>
                Password    <input name=\"password\" type=\"password\" required placeholder=\"Password\">*<br>
              <input name=\"submit\" type=\"submit\" value=\"Register\">";
    }
}