<?php

namespace App\Components;

use App\Models\Menu;

class MenuRecusive
{
    private $html;
    public function __construct()
    {
        $this->html = "";
    }
    public function menuAdd($parentId = 0, $sub = "")
    {
        $data = menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            $this->html .= '<option value="' . $dataItem->id . '">' . $sub . $dataItem->name . '</option>';
            $this->menuAdd($dataItem->id, $sub . "-");
        }
        return $this->html;
    }
    public function menuEdit($menuId,$parentId = 0, $sub = "")
    {
        $data = menu::where('parent_id', $parentId)->get();
        foreach ($data as $dataItem) {
            if($menuId == $dataItem->id){
                $this->html .= '<option selected value="' . $dataItem->id . '">' . $sub . $dataItem->name . '</option>';
            }else{
                $this->html .= '<option value="' . $dataItem->id . '">' . $sub . $dataItem->name . '</option>';
            }
           
            $this->menuEdit($menuId,$dataItem->id, $sub . "-");
        }
        return $this->html;
    }
}
