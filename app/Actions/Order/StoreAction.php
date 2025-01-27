<?php

namespace App\Actions\Order;

use App\Models\Order;

class StoreAction
{
    public function __construct()
    {}
    public function handle(array $data): Order
    {
        return Order::create([
            'user' => $data['customerId'],
            'items' => $data['items'],
            "total" => $data['total']
        ]);
    }
}
