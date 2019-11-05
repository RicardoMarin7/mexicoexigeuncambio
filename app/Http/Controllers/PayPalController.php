<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\PayPal;
use App\User;
use DB;
use PayPal\Api\Item;
use Paypalpayment;


class PayPalController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function saveOrder(Request $request)
    {
        $paypal = new PayPal(0);
        if($order = $paypal->execute($request->paymentId, $request->PayerID)) {
            $result = json_decode($order,true); 
            DB::table('donations')->insert(array(
                'nombre_libro'=>$result["transactions"][0]["item_list"]["items"][0]["name"],
                'id_donador'=>auth()->user()->id,
                'cantidad_donada'=>$result["transactions"][0]["item_list"]["items"][0]["price"],
                'causa' =>'prueba',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now()
            ));
            return view('home')->with('start_date', Carbon::now()->toDateString());
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function payOrderWithPayPal(Request $request)
    {
        $items = [];
        $item = new Item();
        $item->setName(request()->title)
            ->setQuantity(1)
            ->setCurrency("MXN")
            ->setPrice(request()->price);
        $items[] = $item;
        $paypal = new Paypal(request()->price);
        $payment = $paypal->generate($items);
        
        return redirect($payment->getApprovalLink());
    }
}
