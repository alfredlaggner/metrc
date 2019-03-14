<?php

namespace App\Http\Controllers;

use function GuzzleHttp\Promise\all;
use Illuminate\Http\Request;
use \App\MetrcMain;
use \App\MetrcTest;

class MetrcMainController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            return view('metrc.index')->with('mains', MetrcMain::all());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    //    dd('xxxx');
        return view('metrc.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $main = new MetrcMain;
//dd($request->all());
        MetrcMain::create($request->all());
        return redirect('metrcmains');
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
    public function edit($id)
    {
        $main = \App\MetrcMain::find($id);
        return view('metrc.edit',compact('main','id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $main = \App\MetrcMain::find($id);
        $main->name = $request->get('name');
        $main->save();
        return redirect('metrcmains')->with('success','Record has been  updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $main = \App\MetrcMain::find($id);
        $main->delete();
        return redirect('metrcmains')->with('success','Record has been  deleted');
    }
}
