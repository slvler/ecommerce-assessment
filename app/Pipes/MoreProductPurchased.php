<?php

namespace App\Pipes;

use App\Models\Product;

class MoreProductPurchased
{
    public function handle($content, $next)
    {

        $discount_items = [];
        foreach ($content['order']->items as $product)
        {
            $item = Product::select('id','price')->where('id','=',$product['productId'])->where('category','=','1')->first();
            if ($item){
                $discount_items[] = $item;
            }
        }

        if (count($discount_items))
        {
            $control['id'] = "";
            $control['price'] = "0";

            foreach ($discount_items as $key => $value)
            {
                if ($key == 0){
                    $control['id'] = $value->id;
                    $control['price'] = $value->price;
                }else{
                    if ($value->price < $control['price']){
                        $control['id'] = $value->id;
                        $control['price'] = $value->price;
                    }
                }
            }

            $discount = $control['price'] * 0.20;

            $data['discountReason'] = "MORE_PRODUCT_PURCHASED";
            $data['discountAmount'] = $discount;
            $data['subtotal'] =  $content['discountedTotal'] - $discount;

            $content['discounts'][] = $data;
            $content['totalDiscount'] = $content['totalDiscount'] + $discount;
            $content['discountedTotal'] = $content['discountedTotal'] - $discount;
        }

        return $next($content);
    }
}
