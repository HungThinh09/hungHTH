<?php

namespace App\Components;

use App\Models\Category;

class Recusive
{
    private $data;
    private $htmlSelect = '';
    public function __construct($data)
    {
        $this->data = $data;
    }
    public function cateMod($parentId, $id = 0, $text = "")
    {

        foreach ($this->data as $cate) {
            if ($cate['parent_id'] == $id) {
                if (!empty($parentId) && $parentId == $cate['id']) {
                    $this->htmlSelect .= "<option selected value='" . $cate['id'] . "'>" . $text . $cate['name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='" . $cate['id'] . "'>" . $text . $cate['name'] . "</option>";
                }
                $this->cateMod($parentId, $cate['id'], $text . '&ensp;  ');
            }
        }

        return $this->htmlSelect;
    }
    public function cateEdit($data, $id = 0, $text = "")
    {
      
        foreach ($this->data as $cate) {
            if ($cate['parent_id'] == $id) {
                if (!empty($data) && in_array($cate['id'],$data)==true ) {
                    $this->htmlSelect .= "<option selected value='" . $cate['id'] . "'>" . $text . $cate['name'] . "</option>";
                } else {
                    $this->htmlSelect .= "<option value='" . $cate['id'] . "'>" . $text . $cate['name'] . "</option>";
                }
                $this->cateEdit($data, $cate['id'], $text . ' &ensp; ');
            }
        }

        return $this->htmlSelect;
    }
}
