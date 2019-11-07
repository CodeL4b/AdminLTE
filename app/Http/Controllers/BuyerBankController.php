<?php

namespace App\Http\Controllers;

use App\BuyerBank;
use Illuminate\Http\Request;

class BuyerBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $buyerBanks = BuyerBank::latest()->paginate(10);
        return view('pages.profile.banks.buyerBank.index', compact('buyerBanks'))
             ->with('i',(request()->input('page',1) -1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.profile.banks.buyerBank.create');
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
            'name' => 'required',
            'branch_add' => 'required',
            'swift_code' => 'required'
        ]);

        

        BuyerBank::create($request->all());

        return redirect()->route('buyerBank.index')
            ->with('success', 'New buyerBank Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BuyerBank  $buyerBank
     * @return \Illuminate\Http\Response
     */
    public function show(BuyerBank $buyerBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BuyerBank  $buyerBank
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $buyerBank = BuyerBank::find($id);
        return view('pages.profile.banks.buyerBank.edit', compact('buyerBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BuyerBank  $buyerBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'branch_add' => 'required',
            'swift_code' => 'required'
        ]);

        $buyerBank = BuyerBank::find($id);
        $buyerBank->name = $request->get('name');
        $buyerBank->branch_add = $request->get('branch_add');
        $buyerBank->swift_code = $request->get('swift_code');
        $buyerBank->save();
        return redirect()->route('buyerBank.index')
            ->with('success', 'buyerBank Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BuyerBank  $buyerBank
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $buyerBank = BuyerBank::find($id);
        $buyerBank->delete();
        return redirect()->route('buyerBank.index')
            ->with('success', 'buyerBank Deleted Successfully');
    }
}
