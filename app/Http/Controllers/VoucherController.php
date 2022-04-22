<?php

namespace App\Http\Controllers;

use App\Models\Voucher;
use Illuminate\Http\Request;

class VoucherController extends Controller
{
    public function list()
    {
        return view('voucher.llistaVouchers')->with('vouchers', Voucher::all());
    }

    public function create()
    {
        return view('voucher.createVoucher');
    }

    public function save(Request $request)
    {
        $req = request()->all();
        $validated = $this->validaVoucher($request);


        $voucher = new Voucher();
        $voucher->nom = $req['nom'];
        $voucher->save();
        return redirect('/list-voucher/');

    }

    public function edit($idVoucher)
    {
        return view('voucher.editVoucher')->with('voucher', Voucher::find($idVoucher));
    }

    public function update(Request $req)
    {
        $validated = $this->validaVoucher($req);
        $data = $req->all();
        $voucher = Voucher::find($data['id']);
        $voucher->nom = $data['nom'];
        $voucher->save();
        return redirect('/list-voucher');

    }

    public function delete($idVoucher)
    {
        $voucher = Voucher::find($idVoucher);
        $voucher->delete();
        return redirect('/list-voucher');
    }

    public function validaVoucher($request)
    {
        return $request->validate([
            'nom' => 'required'
        ]);
    }
}
