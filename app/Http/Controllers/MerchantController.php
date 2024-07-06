<?php

namespace App\Http\Controllers;

use App\Models\Merchant;
use Illuminate\Http\Request;

class MerchantController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $merchants = Merchant::all();
        return view('merchant.index', compact('merchants'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('merchant.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_merchant' => 'required',
            'alamat_merchant' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required'
        ]);

        Merchant::create([
            'nama_merchant' => $request->nama_merchant,
            'alamat_merchant' => $request->alamat_merchant,
            'kontak' => $request->kontak,
            'deskripsi' => $request->deskripsi
        ]);

        return redirect()->route('merchant.index');
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
        $merchant = Merchant::find($id);
        return view('merchant.edit', compact('merchant'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_merchant' => 'required',
            'alamat_merchant' => 'required',
            'kontak' => 'required',
            'deskripsi' => 'required'
        ]);

        $merchant = Merchant::find($id);
        $merchant->nama_merchant = $request->nama_merchant;
        $merchant->alamat_merchant = $request->alamat_merchant;
        $merchant->kontak = $request->kontak;
        $merchant->deskripsi = $request->deskripsi;
        $merchant->save();

        return redirect()->route('merchant.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
