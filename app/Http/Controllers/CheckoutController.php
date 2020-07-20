<?php

namespace App\Http\Controllers;

use App\Cart;
use Cartalyst\Stripe\Laravel\Facades\Stripe;
use http\Client\Curl\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use mysql_xdevapi\Exception;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('checkout');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $cart = Session::has('cart') ? \session()->get('cart'):[];

//       Stripe::setApiKey("sk_test_51H6iInGHMPQJ7YXOz99thhRa17Z8KZvxZl0x2Qv4PPEoJK2U69ZX3thzvJno2Svyg8Qs5kVoKdTagANy9Enf5lEE00IrCeUmsy");
            $charge = Stripe::Charges()->create ([
                "amount" =>$cart->getTotalPrice(),
                'currency' => 'USD',
                "source" => $request->stripeToken,
                "receipt_email" => $request->user()->email,
                "metadata" => ["order_id" => "2"]
            ]);
            $message =' Thank you '. $request->user()->name.', your payment has been successfully accepted!';
            return back()->with('success_message',$message);
        }catch (Exception $error){
            $error->getMessage();
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
