<?php

namespace App\Http\Controllers;

use App\MetrcTest;
use Illuminate\Http\Request;

class MetrcTestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($main_id)
    {
  //       dd($main_id);
        $detail = MetrcTest::where('main_id', '=', $main_id)->get();
//dd($detail);
        return view('metrc_detail.index')->with('details', $detail);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($main_id)
    {
        return view('metrc_detail.create', with($main_id));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        MetrcTest::create($request->all());
        return redirect('metrctests.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\MetrcTest $metrcTest
     * @return \Illuminate\Http\Response
     */
    public function show(MetrcTest $metrcTest)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\MetrcTest $metrcTest
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $detail = MetrcTest::find($id);
        return view('metrc_detail.edit', compact('detail', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\MetrcTest $metrcTest
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
     //  dd($id);
        $detail = MetrcTest::find($id);
        $updates = [
                'name' => $request->get('name'),
                'is_template' => $request->get('is_template'),
                'json_block' => $request->get('json_block'),
                'comments' => $request->get('comments'),
                'result' => $request->get('result'),
                'action' => $request->get('action'),
                'test_date' => $request->get('test_date'),
                'verification' => $request->get('verification'),
            ];
        $detail->save($updates);

        return redirect('metrc_detail')->with('success', 'Record has been  updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\MetrcTest $metrcTest
     * @return \Illuminate\Http\Response
     */
    public function destroy(MetrcTest $metrcTest)
    {
        //
    }
}
