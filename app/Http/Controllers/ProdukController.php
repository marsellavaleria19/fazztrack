<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ProdukRequest;
use App\Model\Produk;
Use Alert;
use Illuminate\Support\Facades\DB;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Produk::all();
        return view('produk.index')->with(['products'=>$products]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('produk.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProdukRequest $request)
    {
        Produk::create([
            'nama_produk'=>$request->name,
            'harga' => $request->price,
            'jumlah' => $request ->qty,
            'keterangan' => $request->note
        ]);
    
     Alert::success('BERHASIL', 'Data Berhasil Ditambahkan!');
     return redirect()->route('products.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Produk::findOrFail($id);
        return view('produk.show')->with(['product'=>$product]);
    }

    public function search(Request $request)
	{
		$cari = $request->cari;
		$products = Produk::where(DB::raw('concat(nama_produk," ",harga," ",jumlah)') , 'LIKE' , '%'.$cari.'%')->get();
		return view('produk.index',['products' => $products]);
	}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Produk::findOrFail($id);
        return view('produk.edit')->with(['product'=>$product]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ProdukRequest $request, $id)
    {
        Produk::where('id',$id)
        ->update([
            'nama_produk'=>$request->name,
            'harga' => $request->price,
            'jumlah' => $request ->qty,
            'keterangan' => $request->note
        ]);

        Alert::success('BERHASIL', 'Data Berhasil Diubah!');
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {   
        Produk::destroy($request->id);
        Alert::success('BERHASIL', 'Data Barang Berhasil Dihapus!');
        return response()->json(['success' => true]);
    }
}
