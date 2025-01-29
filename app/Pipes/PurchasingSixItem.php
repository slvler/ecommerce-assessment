<?php

namespace App\Pipes;

use App\Models\Order;
use App\Models\Product;

class PurchasingSixItem
{
    public function handle($content, $next)
    {

        $product = Product::whereId($content['order']['items'][0]['productId'])->first();

        if ($product->category == 2 && $content['order']['items'][0]["quantity"] > 5){

            $data['discountReason'] = "BUY_5_GET_1";
            $data['discountAmount'] = (float)$product->price;
            $data['subtotal'] = $content['discountedTotal'] - $product->price;

            $content['discounts'][] = $data;
            $content['totalDiscount'] = $content['totalDiscount'] + $product->price;
            $content['discountedTotal'] = $content['discountedTotal'] - $product->price;
        }

        return $next($content);
    }
}
