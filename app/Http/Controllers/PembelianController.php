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
        'total_harga' => 'required', // Pastikan total harga disertakan dalam validasi
        'tanggal_pengiriman' => 'required|date',
    ]);

    // Proses penyimpanan pembelian
    $pembelian = new Pembelian;
    $pembelian->kantor_id = $request->kantor_id;
    $pembelian->menu_id = $request->menu_id;
    $pembelian->jumlah_porsi = $request->jumlah_porsi;
    $pembelian->total_harga = $request->total_harga; // Simpan total harga yang dihitung sebelumnya
    $pembelian->tanggal_pengiriman = $request->tanggal_pengiriman;
    $pembelian->save();

    // Generate Invoice
    $invoice = new Invoice;
    $invoice->pembelian_id = $pembelian->id;
    $invoice->total_harga = $request->total_harga; // Simpan total harga yang dihitung sebelumnya
    $invoice->save();

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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
