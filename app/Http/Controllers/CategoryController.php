<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Support\Str;
use App\Components\Recusive;
use Dotenv\Regex\Success;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * 
     *
     * @return void
     */
    private $category;
    public function __construct(Category $category)
    {
       $this->category = $category;
    }

    function index() {
        $categories = $this->category->paginate();

        return view('admin.category.index', compact('categories'));
    }

    
    function create() {
        $cat = $this->category->all();
        
        $recusive = new Recusive($cat);
        $htmlOption = $recusive->categoryRecusive();
        
        return view('admin.category.create', compact('htmlOption'));
    }


    function store(Request $request) {

        if(!empty($request['name'])) {

            $cat = $this->category->create([
                'name' => $request['name'],
                'parent_id' => $request['parent_id'],
                'slug'=> Str::slug($request['name'])
            ]);

            return redirect( route('categories.index') );

        } abort(404);

        

        
    }

    function catOption($parentId) {
        $cat = $this->category->all();
        
        $recusive = new Recusive($cat);
        $htmlOption = $recusive->categoryRecusive(0, $parentId);
        return $htmlOption;

    }
    
    function edit($id) {
        $category = $this->category->find($id);

        $htmlOption = $this->catOption($category['parent_id']);

        return view('admin.category.edit', compact('category', 'htmlOption'));
    }

    function update($id, Request $request) {
        $request->validate([
            'parent_id' => Rule::notIn([$id])
        ]);

        $cat = $this->category->find($id)->update([
            'name' => $request['name'],
            'parent_id' => $request['parent_id'],
            'slug'=> Str::slug($request['name'])
        ]);

        return redirect( route('categories.index') );
    }

    function delete($id) {
        $category = $this->category->find($id)->delete();

        return response()->json([
            'code' => 200,
            'message' => 'Success'
        ]);

    }

    
}
