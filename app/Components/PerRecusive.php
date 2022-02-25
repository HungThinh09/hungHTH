<?php

namespace App\Components;

use App\Models\Permisstion;

class PerRecusive
{
    private $html;
    public function __construct()
    {
        $this->html = "";
    }
    public function perAdd($perNames=[],$parentId = 0, $sub = "")
    {
        $data = Permisstion::where('parent_id', $parentId)->get();
            foreach($perNames as $perName){
            if(!($data->contains('name',$perName))){
                $this->html .= '<option  value="' .$perName . '">' .$perName . '</option>'; 
               
            }
        }
        return $this->html;
    }
}
// if($permisstion->contains('key',$key) || $role->name==='admin'){
//     return True;
// }
