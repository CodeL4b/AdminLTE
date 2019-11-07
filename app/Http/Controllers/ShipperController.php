<?php

namespace App\Http\Controllers;


use App\Shipper;
use Illuminate\Http\Request;

class ShipperController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippers = Shipper::latest()->paginate(10);
        return view('pages.profile.shipper.index', compact('shippers'))
             ->with('i',(request()->input('page',1) -1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.profile.shipper.create');
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

        

        Shipper::create($request->all());

        return redirect()->route('shipper.index')
            ->with('success', 'New Shipper Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function show(Shipper $shipper)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shipper = Shipper::find($id);
        return view('pages.profile.shipper.edit', compact('shipper'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'business_name' => 'required',
            'office_add' => 'required'
        ]);

        $shipper = Shipper::find($id);
        $shipper->business_name = $request->get('business_name');
        $shipper->office_add = $request->get('office_add');
        $shipper->save();
        return redirect()->route('shipper.index')
            ->with('success', 'Shipper Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Shipper  $shipper
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shipper = Shipper::find($id);
        $shipper->delete();
        return redirect()->route('shipper.index')
            ->with('success', 'Shipper Deleted Successfully');
    }
}
