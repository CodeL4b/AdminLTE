<?php

namespace App\Http\Controllers;

use App\SellerBank;
use Illuminate\Http\Request;

class SellerBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sellerBanks = SellerBank::latest()->paginate(10);
        return view('pages.profile.banks.sellerBank.index', compact('sellerBanks'))
             ->with('i',(request()->input('page',1) -1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.profile.banks.sellerBank.create');
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
            'acc_name' => 'required',
            'acc_num' => 'required',
            'currency' => 'required'
        ]);

        

        SellerBank::create($request->all());

        return redirect()->route('sellerBank.index')
            ->with('success', 'New Seller Bank Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\SellerBank  $sellerBank
     * @return \Illuminate\Http\Response
     */
    public function show(SellerBank $sellerBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SellerBank  $sellerBank
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $sellerBank = SellerBank::find($id);
        return view('pages.profile.banks.sellerBank.edit', compact('sellerBank'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SellerBank  $sellerBank
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'acc_name' => 'required',
            'acc_num' => 'required',
            'currency' => 'required'
        ]);

        $sellerBank = SellerBank::find($id);
        $sellerBank->acc_name = $request->get('acc_name');
        $sellerBank->acc_num = $request->get('acc_num');
        $sellerBank->currency = $request->get('currency');
        $sellerBank->save();
        return redirect()->route('sellerBank.index')
            ->with('success', 'Seller Bank Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SellerBank  $sellerBank
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $sellerBank = SellerBank::find($id);
        $sellerBank->delete();
        return redirect()->route('sellerBank.index')
            ->with('success', 'Seller Bank Deleted Successfully');
    }
}
