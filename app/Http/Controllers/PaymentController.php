<?php

namespace App\Http\Controllers;

use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private $service;

    public function __construct(PaymentService $service)
    {
        $this->service = $service;
    }

    public function createPayment(Request $request)
    {
        $this->service->createPayment($request);
    }

    public function executePayment(Request $request)
    {
        $this->service->executePayment($request);
    }
}
