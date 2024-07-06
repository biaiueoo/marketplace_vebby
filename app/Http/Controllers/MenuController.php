<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use App\Models\Merchant;
use Illuminate\Http\Request;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $merchants = Merchant::all();
        return view('menu.create', compact('merchants'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga_menu' => 'required',
            'foto'  => 'required',
            'merchant_id' => 'required'
        ]);

        Menu::create([
            'nama_menu' => $request->nama_menu,
            'deskripsi_menu' => $request->deskripsi_menu,
            'harga_menu' => $request->harga_menu,
            'foto' => $request->foto,
            'merchant_id' => $request->merchant_id 
        ]);

        return redirect()->route('menu.index');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $menu = Menu::find($id);
        $merchants = Merchant::all();
        return view('menu.edit', compact('menu', 'merchants'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_menu' => 'required',
            'deskripsi_menu' => 'required',
            'harga_menu' => 'required',
            'foto'  => 'required',
            'merchant_id' => 'required' 
        ]);

        $menu = Menu::find($id);
        $menu->update([
            'nama_menu' => $request->nama_menu,
            'deskripsi_menu' => $request->deskripsi_menu,
            'harga_menu' => $request->harga_menu,
            'foto' => $request->foto,
            'merchant_id' => $request->merchant_id 
        ]);
        return redirect()->route('menu.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
