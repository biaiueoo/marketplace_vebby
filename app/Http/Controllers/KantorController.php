<?php

namespace App\Http\Controllers;

use App\Models\Kantor;
use Illuminate\Http\Request;

class KantorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kantors = Kantor::all();
        return view('kantor.index', compact('kantors'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kantors = Kantor::all();
        return view('kantor.create', compact('kantors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kantor' => 'required',
            'alamat_kantor' => 'required',
            'telp_kantor' => 'required',
        ]);

        Kantor::create([
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor,
            'telp_kantor' => $request->telp_kantor,
        ]);
        return redirect()->route('kantor.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kantor = Kantor::find($id);
        return view('kantor.edit', compact('kantor'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_kantor' => 'required',
            'alamat_kantor' => 'required',
            'telp_kantor' => 'required',
        ]);

        $kantor = Kantor::find($id);
        $kantor->update([
            'nama_kantor' => $request->nama_kantor,
            'alamat_kantor' => $request->alamat_kantor,
            'telp_kantor' => $request->telp_kantor,
        ]);

        return redirect()->route('kantor.index');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
