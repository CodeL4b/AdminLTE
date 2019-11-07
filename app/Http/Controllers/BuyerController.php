<?php

namespace App\Http\Controllers;

use App\Buyer;
use App\BuyerBank;
use Illuminate\Http\Request;

class BuyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyers = Buyer::latest()->paginate(10);
        return view('pages.profile.buyer.index', compact('buyers'))
             ->with('i',(request()->input('page',1) -1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.profile.buyer.create');
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

        

        Buyer::create($request->all());

        return redirect()->route('buyer.index')
            ->with('success', 'New Buyer Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function show(Buyer $buyer)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $buyer = Buyer::find($id);
        return view('pages.profile.buyer.edit', compact('buyer'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'business_name' => 'required',
            'office_add' => 'required'
        ]);

        $buyer = Buyer::find($id);
        $buyer->business_name = $request->get('business_name');
        $buyer->office_add = $request->get('office_add');
        $buyer->save();
        return redirect()->route('buyer.index')
            ->with('success', 'Buyer Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Buyer  $buyer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Buyer $buyer)
    {
        $buyer = Buyer::find($id);
        $buyer->delete();
        return redirect()->route('buyer.index')
            ->with('success', 'Buyer Deleted Successfully');
    }
}
