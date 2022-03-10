<?php

namespace App\Components;

class Recusive {

    private $htmlSelect;
    public function __construct($data)
    {
        $this->data = $data;
        
    }


    function categoryRecusive($id = 0, $parentId = '') {

        foreach($this->data as $value) {
            if($value['parent_id'] == $id) {
                if(!empty($parentId) && $parentId == $value['id']) {

                    $this->htmlSelect .="<option selected value='" . $value['id'] . "'>" . $value['name'] . "</option>";
                } else{
                    $this->htmlSelect .="<option value='" . $value['id'] . "'>" . $value['name'] . "</option>";
                }

            // $this->categoryRecusive($value['id'], $parentId);
            foreach($this->data as $value2) {
                if($value2['parent_id'] == $value['id']) {
                    if(!empty($parentId) && $parentId == $value2['id']) {
    
                        $this->htmlSelect .="<option selected value='" . $value2['id'] . "'>" . "--" . $value2['name'] . "</option>";
                    } else{
                        $this->htmlSelect .="<option value='" . $value2['id'] . "'>" . "--" .  $value2['name'] . "</option>";
                    }
    
                // $this->categoryRecusive($value['id'], $parentId);
                }
                
            }
            }
            
        }

        return $this->htmlSelect;
    }
}
