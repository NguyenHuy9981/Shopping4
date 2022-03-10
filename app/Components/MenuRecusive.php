<?php

namespace App\Components;

use App\Menu;

class MenuRecusive {

    private $htmlOption;
    public function __construct()
    {
       
    }

    function menuRecusiveAdd($editParentId = '',  $parentId = 0) {
        $menus = Menu::where('parent_id', $parentId)->get();

        foreach($menus as $menu) {
            if($editParentId == $menu['id']) {

                $this->htmlOption .= '<option selected value="' . $menu['id'] . '">' . $menu['name'] . '</option>';
            } else {
                $this->htmlOption .= '<option value="' . $menu['id'] . '">' . $menu['name'] . '</option>';

            }

            $this->menuRecusiveAdd($editParentId, $menu['id']);
        }

        return $this->htmlOption;
    }


}