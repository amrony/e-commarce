<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Order;
use App\OrderDetail;
use App\Payment;
use App\Shipping;
use Cart;
use Illuminate\Http\Request;
use Session;
use Mail;

class CheckoutController extends Controller
{
    public function index(){
        return view('front-end.checkout.checkout-content');
    }

    public function customerSignUp(Request $request){
        $customer = new Customer();

        $customer->first_name = $request->first_name;
        $customer->last_name = $request->last_name;
        $customer->email_address = $request->email_address;
        $customer->password = bcrypt($request->password);
        $customer->phone_number = $request->phone_number;
        $customer->address = $request->address;
        $customer->save();


        $customerId = $customer->id;
        Session::put('customerId', $customerId);
        Session::put('customerName', $customer->first_name.' '.$customer->last_name);

//        Session::put('customer',  $customer);

        $data = $customer->toArray();

//        Session::get('customer.first_name');
        Mail::send('front-end.mails.confirmation-mail', $data, function ($message) use ($data) {
            $message->to($data['email_address']);
            $message->subject('Confirmation mail');
        });

        //return "Success";

        return redirect('/checkout/shipping');
    }

    public function shippingForm(){
        $customer = Customer::find(Session::get('customerId'));

        return view('front-end.checkout.shipping', compact('customer'));
    }

    public function saveShippingInfo(Request $request){
        $shipping = new Shipping();
        $shipping->full_name = $request->full_name;
        $shipping->email_address = $request->email_address;
        $shipping->phone_number = $request->phone_number;
        $shipping->address = $request->address;
        $shipping->save();

        Session::put('shippingID', $shipping->id);
        return redirect('/checkout/payment');
    }

    public function paymentForm(){
        return view('front-end.checkout.payment');
    }

    public function newOrder(Request $request){
       $paymentType = $request->payment_type;
       if ($paymentType == 'Cash')
       {
            $order = new Order();
           $order->customer_id = Session::get('customerId');
           $order->shipping_id = Session::get('shippingID');
           $order->order_total = Session::get('orderTotal');
           $order->save();

           $payment = new Payment();
           $payment->order_id = $order->id;
           $payment->payment_type = $paymentType;
           $payment->save();

           $cartProducts = Cart::content();
           foreach ($cartProducts as $cartProduct){
               $orderDetails = new OrderDetail();
               $orderDetails->order_id = $order->id;
               $orderDetails->product_id = $cartProduct->id;
               $orderDetails->product_name = $cartProduct->name;
               $orderDetails->product_price = $cartProduct->price;
               $orderDetails->product_quantity = $cartProduct->qty;

               $orderDetails->save();

            }

           Cart::destroy();
           return redirect('/complete/order');









       }else if ($paymentType == 'Paypal')
       {

       }else if($paymentType == 'Bkash')
       {

       }
    }

    public function completeOrder(){
        return "Success";
    }
}
