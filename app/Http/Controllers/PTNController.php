<?php

namespace App\Http\Controllers;

use App\Models\PTN;
use Illuminate\Http\Request;

class PTNController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (isset($request->search)) {
            $s = $request->search;
            $ptns = PTN::where('nama', 'LIKE', "%$s%")->orWhere('deskripsi', 'LIKE', "%$s%")->paginate(5);
            $ptns->appends(['search' => $s]);
        } else {
            $ptns = PTN::paginate(5);
        }
        return view('ptn.index', compact('ptns', 'request'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('ptn.create');
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
            'nama' => 'required|unique:ptn',
            'deskripsi' => 'required'
        ]);
        $ptn = new PTN;

        if ($request->hasFile('gambar')) {
            $ext = $request->file('gambar')->extension();
            $ptn->gambar = $ext;
        }

        $ptn->nama = $request->nama;
        $ptn->deskripsi = $request->deskripsi;
        $ptn->save();
        $id = $ptn->id;

        if ($request->hasFile('gambar')) {

            $request->file('gambar')->storePubliclyAs("public/images", "$id.$ext");
        }

        return redirect('/admin');
        // return $request;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PTN  $pTN
     * @return \Illuminate\Http\Response
     */
    public function show(PTN $ptn)
    {
        return view('ptn.show', compact('ptn'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PTN  $pTN
     * @return \Illuminate\Http\Response
     */
    public function edit(PTN $ptn)
    {
        return view('ptn.edit', compact('ptn'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ptn  $ptn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ptn $ptn)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required'
        ]);

        if ($request->hasFile('gambar')) {
            $ext = $request->file('gambar')->extension();
            $id = $ptn->id;
            $ptn->gambar = $ext;
            return $request->file('gambar')->storePubliclyAs("public/images", "$id.$ext");
        }

        $ptn->nama = $request->nama;
        $ptn->deskripsi = $request->deskripsi;
        $ptn->update();

        return redirect('/admin');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\ptn  $ptn
     * @return \Illuminate\Http\Response
     */
    public function destroy(ptn $ptn)
    {
        $ptn->delete();
        return redirect('/admin');
    }
}