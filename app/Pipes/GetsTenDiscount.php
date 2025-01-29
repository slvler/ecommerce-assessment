<?php

namespace App\Pipes;

class GetsTenDiscount
{
    public function handle($content, $next)
    {

        if ($content['order']->total > 1000)
        {
            $discount = $content['order']->total * 0.10;
            $total = $content['order']->total - $discount;

            $data['discountReason'] = "10_PERCENT_OVER_1000";
            $data['discountAmount'] = $discount;
            $data['subtotal'] =  $content['discountedTotal'] - $discount;

            $content['discounts'][] = $data;
            $content['totalDiscount'] = $content['totalDiscount'] + $discount;
            $content['discountedTotal'] = $content['discountedTotal'] - $discount;

        }

        return $next($content);
    }
}
