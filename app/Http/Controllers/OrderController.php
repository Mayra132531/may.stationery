<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Arr;
Use App\Order;
Use App\Produk;
use Validator;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    public function _contruct()
    {
        $this->middleware('order');
    }

    public function index(Request $request)
    {

        $order = Order::with('produk')->paginate(3);
        $filterKeyword = $request->get('keyword');
        if ($filterKeyword)
        {
            $order = Order::where('name','LIKE',"%$filterKeyword%")->paginate(1);
        }
        return view('order.index', compact('order'));
    }//end method

    public function create()
    {
        $produk = Produk::all();
        return view('order.create', compact('produk'));
    }//end method

    public function store(Request $request)
    {
        $data = $request->all();
        $validasi = Validator::make($data,[
            'id'=>'required',
            'qty'=>'required|max:255',
            'harga'=>'required|max:255',

        ]);
        if($validasi->fails())
        {
            return redirect()->route('order.create')->withInput()->withErrors($validasi);
            alert()->error('Error','Errors to add');
        }

        Order::create($data);
        toast('berhasil di tambah', 'success');
        return redirect()->route('order.index');
    }//end method

    public function destroy($id_order)
    {
        $data = Order::findOrFail($id_order);
        $data->delete();
        return redirect()->route('order.index');
    }//end method


    public function show($id_order)
    {
        $order = Order::findOrFail($id_order);
        return view('order.show',compact('order'));
    }//end method


    public function edit($id_order)
    {
        $produk = Produk::all();
        $order = Order::findOrFail($id_order);
        return view('order.edit',compact('order','produk'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_order
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_order)
    {
    $order = Order::findOrFail($id_order);
    $data = $request->all();
    $validasi = Validator::make($data,[
        'id'=>'required',
        'qty'=>'required|max:255',
        'harga'=>'required|max:255',
        ]);
        if($validasi->fails())
        {
            return redirect()->route('order.create',[$id_order])->withErrors($validasi);
            alert()->error('Error','Errors to edit');
        }

          $order->update($data);
          alert()->success('success to edit','success');
          return redirect()->route('order.index');
       }
}

?>
