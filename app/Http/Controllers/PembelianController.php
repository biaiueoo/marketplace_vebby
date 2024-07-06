<?php

namespace App\Http\Controllers;

use App\Models\Pembelian;
use App\Models\Invoice;
use App\Models\Menu;
use App\Models\Kantor;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pembelians = Pembelian::all();
        return view('pembelian.index', compact('pembelians'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kantors = Kantor::all(); // Ambil data kantor
        $menus = Menu::all(); // Ambil data menu
        return view('pembelian.create', compact('kantors', 'menus'));
    }



    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'kantor_id' => 'required',
            'menu_id' => 'required',
            'jumlah_porsi' => 'required|numeric',
            'total_harga' => 'required',
            'tanggal_pengiriman' => 'required|date',
        ]);

        $pembelian = Pembelian::create([
            'kantor_id' => $request->kantor_id,
            'menu_id' => $request->menu_id,
            'jumlah_porsi' => $request->jumlah_porsi,
            'total_harga' => $request->total_harga,
            'tanggal_pengiriman' => $request->tanggal_pengiriman
        ]);

        $invoice = Invoice::create([
            'pembelian_id' => $request->id,
            'total_harga' => $request->total_harga,
        ]);


        return response()->json(['pembelian' => $pembelian, 'invoice' => $invoice]);
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
        $pembelian = Pembelian::find($id);
        $kantors = Kantor::all();
        $menus = Menu::all();
        return view('pembelian.edit', compact('pembelian', 'kantors', 'menus'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pembelian = Pembelian::find($id);
        $request->validate([
            'kantor_id' => 'required',
            'enu_id' => 'required',
            'jumlah_porsi' => 'required|numeric',
            'total_harga' => 'required',
            'tanggal_pengiriman' => 'required|date',
        ]);

        $pembelian->update([
            'kantor_id' => $request->kantor_id,
            'enu_id' => $request->menu_id,
            'jumlah_porsi' => $request->jumlah_porsi,
            'total_harga' => $request->total_harga,
            'tanggal_pengiriman' => $request->tanggal_pengiriman,
        ]);

        $invoice = $pembelian->invoice;
        $invoice->update([
            'total_harga' => $request->total_harga,
        ]);

        return response()->json(['pembelian' => $pembelian, 'invoice' => $invoice]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
