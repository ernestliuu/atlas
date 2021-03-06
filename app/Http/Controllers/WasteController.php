<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Waste;

class WasteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $wastes = Waste::sortable()->paginate();
        
        return view('waste.index',compact('wastes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('waste.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'merk' => 'required',
            'kategori' => 'required',
            'jenis_sampah' => 'required',
            'produsen_sampah' => 'required',
            'berat_sampah' => 'required'
        ]);
        $show = Waste::create($validatedData);
   
        return redirect('/wastes')->with('success', 'Data is successfully saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $waste = Waste::findOrFail($id);

        return view('waste.edit', compact('waste'));
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
        $validatedData = $request->validate([
            'merk' => 'required',
            'kategori' => 'required',
            'jenis_sampah' => 'required',
            'produsen_sampah' => 'required',
            'berat_sampah' => 'required'
        ]);
        Waste::whereId($id)->update($validatedData);

        return redirect('/wastes')->with('success', 'Data is successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $waste = Waste::findOrFail($id);
        $waste->delete();

        return redirect('/wastes')->with('success', 'Data is successfully deleted');
    }
}
