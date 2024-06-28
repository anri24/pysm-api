<?php

namespace App\Services;

use App\Models\UserOrder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PayPalCheckoutSdk\Orders\OrdersCreateRequest;
use PayPalHttp\HttpException;
use PayPalCheckoutSdk\Orders\OrdersCaptureRequest;
use PayPalCheckoutSdk\Core\PayPalHttpClient;
use PayPalCheckoutSdk\Core\SandboxEnvironment;
use PayPalCheckoutSdk\Core\ProductionEnvironment;

class PaymentService
{
    private $client;

    public function __construct()
    {
        $environment = config('paypal.mode') === 'live' ?
            new ProductionEnvironment(config('paypal.client_id'), config('paypal.secret')) :
            new SandboxEnvironment(config('paypal.client_id'), config('paypal.secret'));

        $this->client = new PayPalHttpClient($environment);
    }

    public function createPayment(Request $request)
    {

        $amount = $request->get('amount');
        $request = new OrdersCreateRequest();
        $request->prefer('return=representation');
        $request->body = [
            "intent" => "CAPTURE",
            "purchase_units" => [[
                "amount" => [
                    "currency_code" => "USD",
                    "value" => $amount,
                ]
            ]]
        ];


        try {
            $response = $this->client->execute($request);

            return response()->json($response->result);
        } catch (\Exception $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }

    public function executePayment(Request $request)
    {

        $orderId = $request->orderID;

        $orderCaptureRequest = new OrdersCaptureRequest($orderId);

        UserOrder::create([
            'user_id' => $request->user()->id,
            'service_detail_id' => $request->dataId,
            'status' => 1,
        ]);
        try {
            $response = $this->client->execute($orderCaptureRequest);

            return response()->json($response->result);
        } catch (HttpException $ex) {
            return response()->json(['error' => $ex->getMessage()], 500);
        }
    }
}
