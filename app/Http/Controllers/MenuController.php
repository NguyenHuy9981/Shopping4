<?php

namespace App\Http\Controllers;

use App\Menu;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Components\MenuRecusive;
use App\Http\Requests\ValidateCategory;

class MenuController extends Controller
{
    private $menu;
    public function __construct(MenuRecusive $menuRecusive, Menu $menu)
    {
        $this->menu = $menu;
       $this->menuRecusive = $menuRecusive;
    }
    
    
    function index() {
        $menus = $this->menu->paginate();

        return view('admin.menu.index', compact('menus'));
    }

    

    function create() {
        $htmlOption = $this->menuRecusive->menuRecusiveAdd();
        
        return view('admin.menu.create', compact('htmlOption'));
    }

    function store(ValidateCategory $request) {

        $cat = $this->menu->create([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug' => Str::slug($request['name'])
        ]);

        return redirect( route('menus.index') );
    }

    function edit($id) {
        $menu = $this->menu->find($id);

        $htmlOption = $this->menuRecusive->menuRecusiveAdd($menu['parent_id']);

        return view('admin.menu.edit', compact('menu', 'htmlOption'));
    }

    function update($id, ValidateCategory $request) {
        $request->validate([
            'parent_id' => Rule::notIn([$id])
        ]);

        $cat = $this->menu->find($id)->update([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug'=> Str::slug($request['name'])
        ]);

        return redirect( route('menus.index') );
    }


    function delete($id) {

        $this->menu->find($id)->delete();
        return response()->json([
            'Huy' => 'Beautifull',
            'message' => 'success',
            
        ], 200);
        

    }
}
