<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Product;
use App\Category;
use App\ProductImage;
use App\Components\Recusive;
use App\Components\Validate;
use App\Http\Requests\ValidateProduct;
use Illuminate\Http\Request;
use App\Straits\StraitUploadFile;
use Illuminate\Support\Facades\DB;
use App\ProductTag;
use Illuminate\Support\Facades\Storage;
use PhpParser\Node\Stmt\TryCatch;

class AdminProductController extends Controller
{
    private $product;
    public function __construct(Product $product) 
    {
        $this->product = $product;
    }

    use StraitUploadFile;
    function index() {
        $products = $this->product->paginate();
        return view('admin.product.index', compact('products'));
    }

    function catOption($parentId) {
        $cat = Category::all();
        
        $recusive = new Recusive($cat);
        $htmlOption = $recusive->categoryRecusive(0, $parentId);
        return $htmlOption;

    }

    function create() {
        $htmlOption = $this->catOption($parentId = '');
        
        return view('admin.product.create', compact('htmlOption'));

    }

    function store(ValidateProduct $request) {
    

        // try{
        // DB::beginTransaction();
        // // Khối code
        $imageInput = $this->UploadFile($request, 'feature_image', 'PRODUCT');
        

        $product= $this->product->create([
            'name' => $request['name'],
            'price' => $request['price'],
            'feature_image' => $imageInput['feature_image'],
            'feature_image_name' => $imageInput['feature_image_name'],
            'content' => $request['content'],
            'user_id' => auth()->id(),
           !empty($request['parent_id']) ? $category_id = $request['parent_id'] : $category_id = null,
            'category_id' => $category_id

        ]);

        if($request->hasFile('image_path')) {
            foreach($request['image_path'] as $fileitem) {
            
            $ImageInput_Extra = $this->UploadFile_Multiple($fileitem, 'PRODUCT');
            $product->images()->create([
                    'image_path' => $ImageInput_Extra['extra_image'],
                    'image_path_name' => $ImageInput_Extra['extra_image_name'],
                ]);
            }
        }

        if(!empty($request['tags'])) {
            foreach($request['tags'] as $tag) {
               $tagInput = Tag::firstOrCreate([
                    'name' => $tag
               ]);

                ProductTag::create([
                    'product_id' => $product->id,
                    'tag_id' => $tagInput->id,
                ]);
            }

        }
        
        // DB::commit();
        return redirect(route('product.index'));

    //   }catch(\Exception $exception) {
    //     DB::rollBack();
    //     abort(404);
    //   }

    }


    function edit($id) {
        $product = $this->product->find($id);

        $htmlOption = $this->catOption($product['category_id']);
        
        return view('admin.product.edit', compact('product','htmlOption'));

    }


    function update(ValidateProduct $request, $id) {
        
        // Khối code
        $imageInput = $this->UploadFile($request, 'feature_image', 'PRODUCT');
        

        $this->product->find($id)->update([
            'name' => $request['name'],
            'price' => $request['price'],
            'feature_image' => $imageInput['feature_image'],
            'feature_image_name' => $imageInput['feature_image_name'],
            'content' => $request['content'],
            'user_id' => auth()->id(),
           !empty($request['parent_id']) ? $category_id = $request['parent_id'] : $category_id = null,
            'category_id' => $category_id

        ]);

        $product = Product::find($id); //lấy product đã update vì ->update trả về true-false chứ ko trả về chính product đang sửa
        
        // upload ảnh phụ
        if($request->hasFile('image_path')) {
            $product->images()->delete();
            
            foreach($request['image_path'] as $fileitem) {
            
            $ImageInput_Extra = $this->UploadFile_Multiple($fileitem, 'PRODUCT');
            
            $product->images()->create([
                    'image_path' => $ImageInput_Extra['extra_image'],
                    'image_path_name' => $ImageInput_Extra['extra_image_name'],
                ]);
            }
        }
        // update tag
        if(!empty($request['tags'])) {
            foreach($request['tags'] as $tag) {
               $tagInput = Tag::firstOrCreate([
                    'name' => $tag
                ]);

               $tagId[]= $tagInput->id;
            }

            $product->tags()->sync($tagId);
        }
        
        return redirect(route('product.index'));

    }

    function delete($id) {

        $product = $this->product->find($id)->delete();
        return response()->json([
            'Huy' => 'Beautifull',
            'message' => 'success',
            
        ], 200);
        

    }
    
}