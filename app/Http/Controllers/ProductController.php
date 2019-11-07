<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::latest()->paginate(10);
        return view('pages.profile.product.index', compact('products'))
             ->with('i',(request()->input('page',1) -1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.profile.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'code_sku' => 'required',
            'name' => 'required',
            'photo'=> 'image|nullable|max:1999'
        ]);


        if ($request->hasFile('photo')) {
           // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/photo',$fileNameToStore);

        } else {
            $fileNameToStore = 'noimage.jpg';
        }
        

        $product = new Product();

        $product->code_sku= $request->code_sku;
        $product->name= $request->name;
        $product->description= $request->description;
        $product->hs_code= $request->hs_code;
        $product->hs_code_bd= $request->hs_code_bd;
        $product->photo=$fileNameToStore;

        $product->unit= $request->unit;
        $product->net_weight= $request->net_weight;
        $product->gross_weight= $request->gross_weight;
        $product->cbm= $request->cbm;
        $product->product_cost= $request->product_cost;

        $product->packing_cost= $request->packing_cost;
        $product->cash_incentive= $request->cash_incentive;

        
        $product->save();

        Product::create($request->all());
        return redirect()->route('product.index')
            ->with('success', 'New product Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $product = Product::find($id);
        return view('pages.profile.product.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'code_sku' => 'required',
            'name' => 'required',
            'photo'=> 'image|nullable|max:1999'
        ]);

        if ($request->hasFile('photo')) {
           // Get filename with the extension
            $filenameWithExt = $request->file('photo')->getClientOriginalName();
            // Get just filename
            $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);
            // Get just ext
            $extension = $request->file('photo')->getClientOriginalExtension();
            // Filename to store
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            // Upload Image
            $path = $request->file('photo')->storeAs('public/photo',$fileNameToStore);

        }

        $product = Product::find($id);
        $product->code_sku = $request->get('code_sku');
        $product->name = $request->get('name');
        if($request->hasfile('photo'))(
            $product->photo = $fileNameToStore);
        $product->save();
        return redirect()->route('product.index')
            ->with('success', 'product Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::find($id);

        if($product->photo != 'noimage'){
            Storage::delete('public/photo/'.$product->photo);
        }

        $product->delete();
        return redirect()->route('product.index')
            ->with('success', 'Product Deleted Successfully');
    }
}
