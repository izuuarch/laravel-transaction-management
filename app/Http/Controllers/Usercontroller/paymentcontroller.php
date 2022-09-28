<?php

namespace App\Http\Controllers\Usercontroller;

use Stripe\Charge;
use Stripe\Stripe;
use App\Models\User;
use Stripe\Customer;
use Stripe\StripeClient;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use App\Models\transaction;

class paymentcontroller extends Controller
{
    public function index(){
        return view('user.dashboard.payment');
    }
    public function pay(Request $request){
        $getuser = User::where('userid', Session::get('user'))->first();
        $this->validate($request, [
            'payment_name' => 'required',
            'payment_amount' => 'required',
            'payment_description' => 'required',
            'card_number' => 'required',
            'card_cvc' => 'required',
            'card_expiry_month' => 'required',
            'card_expiry_year' => 'required'
        ]);
    try {
        
        $stripekey = array(
            "secret_key" => env('STRIPE_SECRET_KEY'),
            "pub_key" => env('STRIPE_PUB_KEY')
          );
           //  create token
    $stripe = new StripeClient(
        env('STRIPE_SECRET_KEY')
      );
      $token = $stripe->tokens->create([
        'card' => [
          'number' => $request->card_number,
          'exp_month' => $request->card_expiry_month,
          'exp_year' => $request->card_expiry_year,
          'cvc' => $request->card_cvc,
        ],
      ]);
      
          Stripe::setApiKey($stripekey['secret_key']);    
    // add to stripe
    $customer = Customer::create(array(
        'email' => $getuser->email,
        'source'  => $token
    ));
      
    $orderid = Str::random(10);
    $paymentdetails = Charge::create(array(
        'customer' => $customer->id,
        'amount'   => $request->payment_amount,
        'currency' => 'usd',
        'description' => $request->payment_description,
        'metadata' => array(
            'order_id' => $orderid
        )
    ));
    $statusresponse = $paymentdetails->jsonSerialize();
    if($statusresponse['amount_refunded'] == 0 && empty($statusresponse['failure_code'])){
        $transaction = new transaction;
        $transaction->payment_name = $request->payment_name;
       $createtransaction =  $getuser->transaction()->create([
            'payment_name' => $request->payment_name,
            'userid' => $getuser->userid,
            'payment_status' => $statusresponse['status'],
            'payment_amount' => $request->payment_amount,
            'transaction_id' => $statusresponse['id']
        ]);
        if($createtransaction['payment_status'] == "succeeded"){
            return redirect(route('paymentpage'))->with('success',"Transaction Made Successfully");
        }
    }
    } catch(\Stripe\Exception\ApiErrorException $e) {
        $return_array = [
            "status" => $e->getHttpStatus(),
            "type" => $e->getError()->type,
            "code" => $e->getError()->code,
            "param" => $e->getError()->param,
            "message" => $e->getError()->message,
        ];
        $return_str = json_encode($return_array);          
        http_response_code($e->getHttpStatus());
        echo $return_str;
    }
    }
    public function softdelete($id){
        // move to trash from here
        $delete = transaction::where('transaction_id', $id)->first();
        // var_dump($delete);
        $delete->delete();
        return redirect(route('paymentpage'))->with('success',"Transaction Moved to Trash Successfully");
    }
    public function viewtrash(){
        $trash =  transaction::onlyTrashed()
        ->where('userid',Session::get('user'))->paginate(2);
        return view('user.dashboard.trash',['trash'=>$trash]);
    }
    public function forcedelete($id){
        $delete = transaction::withTrashed()->where('transaction_id', $id);
        $delete->forceDelete();
        return redirect(route('paymentpage'))->with('success',"Transaction deleted Successfully");
    }
    public function restore($id){
        $restore = transaction::withTrashed()->where('transaction_id', $id);
        $restore->restore();
        return redirect(route('paymentpage'))->with('success',"Issue Restored sucessfully");
    }
}
