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
    public $contents, $countPages = 1, $activePage, $codePages;

    public function __construct($class_content = '', $page = 1, $id = '')
    {
        $table = 'contents';
        parent::__construct($table);
        $this->class_content = $class_content;
        $this->activePage = $page;
        if($class_content != ''){
            if($id == '') {
                $c = $this->_db->find($table, ['conditions' => 'class_content = ?', 'bind' => [$this->class_content]]);
                if ($c) {
                    $this->contents = $c;
                    $this->countPages = ($this->_db->count() % 9) ? intval($this->_db->count() / 9 + 1) :
                        (intval($this->_db->count() / 9) ? intval($this->_db->count() / 9) : 1);
                }
            } else {
                $c = $this->_db->findFirst($table, ['conditions' => 'id = ?', 'bind' => [$id]]);
                if($c){
                    foreach ($c as $key => $value){
                        $this->$key = $value;
                    }
                }
            }
        }
    }

    public function add_content($params){
        $this->assign($params);
        $this->save();
    }

    public function remove($params){
        $this->_db->delete('contents', $params);
    }

    public function view_content(){
        $first = ($this->activePage - 1) * 9;
        $html = '';
        for($i = 0; $i < 3; $i++){
            $results = array($this->contents[$first + $i*3], $this->contents[$first + $i*3 + 1], $this->contents[$first + $i*3 + 2]);
            if($results[0] != null)
                $html .= $this->codeContent($results);
        }
        return $html;
    }

    private function codeContent($contents){
        $html = '<div class="container row mb-5">';
        if($this->class_content === 'guides') {
            foreach ($contents as $content) {
                if($content == null)
                    break;
                $html .= '<div class="col">';
                $html .= '<div class="card" style="width: 18rem;">';
                $html .= '<div class="card-body">';
                $html .= '<h5 class="card-title">' . $content->name_content . '</h5>';
                $html .= '<p class="card-text">' . $content->description . '</p>';
                $html .= '<a href="/contents/show/guides/id=' . $content->id . '" class="btn btn-primary">Show guide</a>';
                $html .= '</div></div></div>';
            }
        } elseif ($this->class_content === 'videos'){
            foreach ($contents as $content) {
                if($content == null)
                    break;
                $html .= '<div class="col">';
                $html .= '<div class="card" style="width: 18rem;">';
                $html .= '<div class="card-body">';
                $html .= '<h5 class="card-title">' . $content->name_content . '</h5>';
                $html .= '<div class="embed-responsive embed-responsive-16by9 mb-3">';
                $url = explode('watch?v=',$content->url);
                $url = implode('embed/', $url);
                $html .= '<iframe class="embed-responsive-item" src="' . $url . '" allowfullscreen></iframe>';
                $html .= '</div>';
                $html .= '<a href="/contents/show/videos/id=' . $content->id . '" class="btn btn-primary">Show video</a>';
                $html .= '</div></div></div>';
            }
        }
        $html .= '</div>';

        return $html;
    }

    public function pagination()
    {
        $html = '<nav aria-label="Page navigation example">';
        $html .= '<ul class="pagination">';
        $html .= '<li class="page-item">';
        $html .= '<a class="page-link" href="/contents/' . $this->class_content . '/' . (($this->activePage - 1) ? $this->activePage - 1 : 1) . '" aria-label="Previous"><span aria-hidden="true">&laquo;</span></a></li>';
        for($i = 3; $i > 0; $i--){
            if($this->activePage - $i < 1)
                continue;
            $page = $this->activePage - $i;
            $html .= '<li class="page-item"><a class="page-link" href="/contents/' . $this->class_content . '/' . $page . '">' . $page . '</a></li>';
        }
        $html .= '<li class="page-item active"><a class="page-link" href="/contents/' . $this->class_content . '/' . $this->activePage . '">' . $this->activePage . '</a></li>';
        for($i = 1; $i < 4; $i++){
            if($this->activePage + $i > $this->countPages)
                break;
            $page = $this->activePage + $i;
            $html .= '<li class="page-item"><a class="page-link" href="/contents/' . $this->class_content . '/' . $page . '">' . $page . '</a></li>';
        }
        $html .= '<li class="page-item">';
        $html .= '<a class="page-link" href="/contents/' . $this->class_content . '/'. ((($this->activePage + 1) >= $this->countPages) ? $this->countPages : $this->activePage + 1) .'" aria-label="Next"><span aria-hidden="true">&raquo;</span></a></li>';
        $html .= '</ul></nav>';

        return $html;
    }

    public function showContent(){
        $html = '<h2 class="md-5 font-weight-bold text-left">' . $this->name_content . '</h2>';
        if($this->class_content === 'guides' or $this->class_content === 'videos'){
            $url = explode('watch?v=',$this->url);
            $url = implode('embed/', $url);
            $html .= '<div class="embed-responsive embed-responsive-16by9 mb-5">';
            $html .= '<iframe class="embed-responsive-item" src="' . $url . '" allowfullscreen></iframe>';
            $html .= '</div>';
        }
        $html .= '<p class="text-left">' . $this->description . '</p>';
        $html .= '<a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-lg mx-md-1" href="/contents/add/' . $this->class_content . '/">Add content</a>';
        $html .= '<a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-lg mx-md-1" href="/contents/edit/' . $this->class_content . '/id=' . $this->id . '">Edit</a>';
        $html .= '<a class="btn btn-outline-success my-2 my-sm-0 rounded-pill btn-lg mx-md-1" href="/contents/remove/' . $this->class_content . '/id=' . $this->id . '" onclick="return confirm('.'\''.'Remove the content'.'\''.')">Remove</a>';
        return $html;
    }

    public function edit($params)
    {
        $this->assign($params);
        $this->save();
    }


}

