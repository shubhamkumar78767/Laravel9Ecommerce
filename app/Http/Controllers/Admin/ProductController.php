<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductFormRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Color;
use App\Models\ProductImage;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','DESC')->get();
        return view('admin.products.index',compact('products'));
    }

    public function create()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $colors = Color::where('status','1')->get();
        return view('admin.products.create',compact('categories','brands','colors'));
    }

    public function store(ProductFormRequest $req)
    {
        $validatedData = $req->validated();
        $category = Category::findOrFail($validatedData['category_id']);
        $product = $category->products()->create([
            'category_id' => $validatedData['category_id'],
            'name' => $validatedData['name'],
            'slug' => Str::slug($validatedData['slug']),
            'brand' => $validatedData['brand'],
            'small_description' => $validatedData['small_description'],
            'description' => $validatedData['description'],
            'original_price' => $validatedData['original_price'],
            'selling_price' => $validatedData['selling_price'],
            'quantity' => $validatedData['quantity'],
            'trending' => $req->trending == true ? '1' : '0',
            'featured' => $req->featured == true ? '1' : '0',
            'status' => $req->status == true ? '1' : '0',
            'meta_title' => $validatedData['meta_title'],
            'meta_keyword' => $validatedData['meta_keyword'],
            'meta_description' => $validatedData['meta_description'],
        ]);
        
        if($req->hasFile('image')){
            $uploadPath = 'uploads/products/';
            $i = 1;
            foreach($req->file('image') as $imageFile){
                $extention          = $imageFile->getClientOriginalExtension();
                $filename           = time().$i++.'.'.$extention;
                $imageFile->move($uploadPath,$filename);
                $finalImagePathName = $uploadPath.$filename;

                $product->productImages()->create([
                    'product_id' => $product->id,
                    'image'      => $finalImagePathName,
                ]);
            }
        }

        if($req->colors){
            foreach($req->colors as $key => $color){
                $product->productColors()->create([
                    'product_id' => $product->id,
                    'color_id' => $color,
                    'quantity' => $req->colorquantity[$key] ?? 0,
                ]);
            }
        }

        return redirect('admin/products')->with('message','Product Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(int $product_id)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product =  Product::findOrFail($product_id);
        $product_colors = $product->productColors->pluck('color_id')->toArray();
        $colors = Color::whereNotIn('id',$product_colors)->get();
        return view('admin.products.edit',compact('categories','brands','product','colors'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProductFormRequest $req, int $product_id)
    {
        $validatedData = $req->validated();
        $product = Category::findOrFail($validatedData['category_id'])
                   ->products()->where('id',$product_id)->first();
        
        if($product){

            $product->update([
                'category_id' => $validatedData['category_id'],
                'name' => $validatedData['name'],
                'slug' => Str::slug($validatedData['slug']),
                'brand' => $validatedData['brand'],
                'small_description' => $validatedData['small_description'],
                'description' => $validatedData['description'],
                'original_price' => $validatedData['original_price'],
                'selling_price' => $validatedData['selling_price'],
                'quantity' => $validatedData['quantity'],
                'trending' => $req->trending == true ? '1' : '0',
                'featured' => $req->featured == true ? '1' : '0',
                'status' => $req->status == true ? '1' : '0',
                'meta_title' => $validatedData['meta_title'],
                'meta_keyword' => $validatedData['meta_keyword'],
                'meta_description' => $validatedData['meta_description'],
            ]);

            if($req->hasFile('image')){
                $uploadPath = 'uploads/products/';
                $i = 1;
                foreach($req->file('image') as $imageFile){
                    $extention          = $imageFile->getClientOriginalExtension();
                    $filename           = time().$i++.'.'.$extention;
                    $imageFile->move($uploadPath,$filename);
                    $finalImagePathName = $uploadPath.$filename;
    
                    $product->productImages()->create([
                        'product_id' => $product->id,
                        'image'      => $finalImagePathName,
                    ]);
                }
            }

            if($req->colors){
                foreach($req->colors as $key => $color){
                    $product->productColors()->create([
                        'product_id' => $product->id,
                        'color_id' => $color,
                        'quantity' => $req->colorquantity[$key] ?? 0,
                    ]);
                }
            }
    
            return redirect('admin/products')->with('message','Product Updated Successfully');

        }else{
            return redirect()->with('message','No such data found');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $product_id)
    {
        $product =  Product::findOrFail($product_id);
        if($product->productImages){
            foreach($product->productImages as $image){
                if(File::exists($image->image)){
                    File::delete($image->image);
                }
            }
        }
        $product->delete();
        return redirect()->back()->with('message','Product Deleted with All its Images');
    }

    public function destroyImage(int $product_image_id)
    {
        $productImage = ProductImage::findOrFail($product_image_id);
        if(File::exists($productImage->image)){
            File::delete($productImage->image);
        }
        $productImage->delete();
        return redirect()->back()->with('message','Product Image Delete Successfully');
    }

    public function updateProductColorQuantity(Request $req, $prod_color_id)
    {
        $productColorData = Product::findOrFail($req->product_id)
                            ->productColors()->where('id',$prod_color_id)->first();

        $productColorData->update([
            'quantity' => $req->quantity
        ]);
        return response()->json(['message' => 'Product Color Qunantity Updated' ]);
    }

    public function deleteProductColor($prod_color_id)
    {
        $prodColor = ProductColor::findOrFail($prod_color_id);
        $prodColor->delete();
        return response()->json(['message' => 'Product Color Deleted Successfully']);
    }
}
