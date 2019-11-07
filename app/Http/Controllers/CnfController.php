<?php

namespace App\Http\Controllers;

use App\Cnf;
use Illuminate\Http\Request;

class CnfController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cnfs = Cnf::latest()->paginate(10);
        return view('pages.profile.cnf.index', compact('cnfs'))
             ->with('i',(request()->input('page',1) -1)*10);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.profile.cnf.create');
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
            'address' => 'required'
        ]);

        

        Cnf::create($request->all());

        return redirect()->route('cnf.index')
            ->with('success', 'New cnf Created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cnf  $cnf
     * @return \Illuminate\Http\Response
     */
    public function show(Cnf $cnf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cnf  $cnf
     * @return \Illuminate\Http\Response
     */
    public function edit( $id)
    {
        $cnf = Cnf::find($id);
        return view('pages.profile.cnf.edit', compact('cnf'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cnf  $cnf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate([
            'name' => 'required',
            'address' => 'required'
        ]);

        $cnf = Cnf::find($id);
        $cnf->name = $request->get('name');
        $cnf->address = $request->get('address');
        $cnf->save();
        return redirect()->route('cnf.index')
            ->with('success', 'cnf Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cnf  $cnf
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $cnf = Cnf::find($id);
        $cnf->delete();
        return redirect()->route('cnf.index')
            ->with('success', 'cnf Deleted Successfully');
    }
}
