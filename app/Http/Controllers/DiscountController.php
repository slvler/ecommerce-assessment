<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Pipes\GetsTenDiscount;
use App\Pipes\MoreProductPurchased;
use App\Pipes\PurchasingSixItem;
use Illuminate\Http\Request;
use Illuminate\Pipeline\Pipeline;
use Illuminate\Support\Facades\Auth;

class DiscountController extends Controller
{
    public function __construct()
    {}

    public function index()
    {
        try {
            $order['discounts'] = [];
            $ord = Order::where('user',Auth::id())->first();
            $order['order'] = $ord;

            $order['totalDiscount'] = 0;
            $order['discountedTotal'] = $ord->total;

            $processedOrder = app(Pipeline::class)
                ->send($order)
                ->through([
                    GetsTenDiscount::class,
                    PurchasingSixItem::class,
                    MoreProductPurchased::class
                ])
                ->then(function ($result) {
                    unset($result['order']);
                    return $result;
                });

            return response()->json([
                'success' => true,
                'message' => "order successfully deleted",
                'discount' => $processedOrder
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => "order deletion process error",
            ],500);
        }
    }
}
