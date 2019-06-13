<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;
use App\ProductType;
use App\ProductTypeAttribute;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=ProductType::all();
        $products=Product::all();
        return view('product.index')->withProducts($products)->withTypes($types);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'name' => 'required',
            'description' => 'required',
            'type' =>'required',
            'price' =>'required'
        ]);
        Product::create([
            'name' => $request->name,
            'description' =>$request->description,
            'product_type_id' => $request->type,
            'price' =>$request->price
        ]);
        return redirect()->back()->with('success','Successfully Created');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $values=$product->productTypeAttributeValues;
        return view('product.show')->withProduct($product)->withValues($values);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $attributes=$product->productType->productTypeAttributes;

        return view('product.edit')->withAttributes($attributes)->withProduct($product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Product $product,Request $request)
    {
        $this->validate($request,[
            
            'attribute' =>'required',
            
        ]);
    // $filter=$product->productTypeAttributeValues()->with('productTypeAttribute')->get()->pluck('productTypeAttribute.id');
    // return (array)$filter;
    // return in_array($request->attribute,$filter) ?"True" :"False";
    // die();

        try { 
            
            $product->productTypeAttributeValues()->attach($request->attribute);
          } catch(\Illuminate\Database\QueryException $ex){ 
            return redirect()->back()->with('error','Your product has this Attribute');
          }
        
        
        return redirect()->back()->with('success','Successfully Created');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getValue(ProductTypeAttribute $attribute){
        $values=$attribute->productTypeAttributeValues;
        return response()->json($values);
    }
    public function getProduct(Product $product){
        
        // return response()->json($product);
        $values=$product->productTypeAttributeValues;
        return response()->json(['product'=>$product,'values' => $values]);
    }
    
    
    
}
