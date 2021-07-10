<?php

namespace App\Http\Controllers;

use App\Cart;
use App\City;
use App\Courier;
use App\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Kavist\RajaOngkir\Facades\RajaOngkir;


class CartController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public $city, $provinces, $provinceId, $city_id;
    public $result = [];

    public function index()
    {
        $carts = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        $couriers = Courier::pluck('title', 'code');
        $this->provinces = Province::pluck('title','province_id');
        return view('pages.cart',[
            'carts' => $carts,
            'couriers' => $couriers,
            'provinces' => $this->provinces,
            'result'    => $this->result
        ]);
    }

    public function getCities($id)
    {
        $this->city = City::where ('province_id', $id)->pluck('title', 'city_id');
        return json_encode($this->city);
    }
    
    public function getDistrict($id)
    {
        echo json_encode(DB::table('indonesia_districts')->where('city_id', $id)->get());
    }

    public function delete(Request $request, $id)
    {
        $cart = Cart::findOrFail($id);

        $cart->delete();

        return redirect()->route('cart');
    }

    public function cek_ongkir(Request $request)
    {

        if(!$request->courier)
        {
            return;
        }

        $cost = RajaOngkir::ongkosKirim([
            'origin'        => 327, //kota Palembang
            'destination'   => $request->city_destination,
            'weight'        => 1000,
            'courier'       => $request->courier,
        ])->get();
        
        //  var_dump($cost);
        //  die();
        // dd($cost);

        $request->courier = $cost[0]['name'];
        // dd ($request->courier);
        $result = [0];
        foreach ($cost[0]['costs'] as $row)
        {
            $this->result[0] = array (
                'description'   => $row['description'],
                'biaya'         => $row['cost'][0]['value'],
                'etd'           => $row['cost'][0]['etd']
            );
        }
        $carts = Cart::with(['product.galleries', 'user'])->where('users_id', Auth::user()->id)->get();
        $couriers = Courier::pluck('title', 'code');
        $this->provinces = Province::pluck('title','province_id');
        return view('pages.cart',[
            'carts' => $carts,
            'couriers' => $couriers,
            'provinces' => $this->provinces,
            'result'    => $this->result
        ]);
      
    }
    
    public function success()
    {
        return view('pages.success');
    }
}
