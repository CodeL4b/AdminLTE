<?php

namespace App\Http\Controllers;

use App\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellers = Seller::latest()->paginate(10);
        return view('pages.profile.seller.index', compact('sellers'))
             ->with('i',(request()->input('page',1) -1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.profile.seller.create');
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
            'business_name' => 'required',
            'office_add' => 'required'
        ]);

        

        seller::create($request->all());

        return redirect()->route('seller.index')
            ->with('success', 'New seller Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function show(Seller $seller)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $seller = seller::find($id);
        return view('pages.profile.seller.edit', compact('seller'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'business_name' => 'required',
            'office_add' => 'required'
        ]);

        $seller = seller::find($id);
        $seller->business_name = $request->get('business_name');
        $seller->office_add = $request->get('office_add');
        $seller->save();
        return redirect()->route('seller.index')
            ->with('success', 'seller Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Seller  $seller
     * @return \Illuminate\Http\Response
     */
    public function destroy(Seller $seller)
    {
        $seller = seller::find($id);
        $seller->delete();
        return redirect()->route('seller.index')
            ->with('success', 'seller Deleted Successfully');
    }
}
