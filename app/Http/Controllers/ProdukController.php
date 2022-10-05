<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
Use App\Produk;
use Illuminate\Support\Facades\Storage;
use Validator;
use Storange;

class ProdukController extends Controller
{
    public function index(Request $request)
    {
        $produk = Produk::paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $produk = Produk::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('produk.index', compact('produk'));
    }//end method

    public function create()
    {
        return view('produk.create');
    }//end method

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'nama'=>'required|max:255',
            'stok'=>'required|max:255',
            'harga'=>'required',

        ]);
        
        if($validasi->fails())
        {
            return redirect()->route('produk.create')->withInput()->withErrors($validasi);
        }
        
        Produk::create($data);
        return redirect()->route('produk.index');
    }//end method

    
    public function destroy($id)
    {
        $data = Produk::findOrFail($id);
        $data->delete();
        return redirect()->route('produk.index');  
    }//end method

    
    public function show($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.show',compact('produk'));
    }
    
    
    public function edit($id)
    {
        $produk = Produk::findOrFail($id);
        return view('produk.edit',compact('produk'));
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
    $produk = Produk::findOrFail($id);
    $data = $request->all();
    $validasi = Validator::make($data,[
        'nama'=>'required|max:255',
        'stok'=>'required|max:255',
        'harga'=>'required',

        ]);
        if($validasi->fails())
        {
            return redirect()->route('produk.create',[$id])->withErrors($validasi);
        }
      
       $produk->update($data);
       //Alert::toast('Berhasil di edit','success');
       return redirect()->route('produk.index');
    }
}
