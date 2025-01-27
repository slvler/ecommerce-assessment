<?php

namespace Database\Seeders;

use App\Models\Order;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class OrderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Order::create([
            'user' => 1,
            'items' => [
                [
                    "productId" => 102,
                    "quantity" => 10,
                    "unitPrice" => "11.28",
                    "total" =>  "112.80"
                ]
            ],
            "total" => "112.80"
        ]);

        Order::create([
            'user' => 2,
            'items' => [
                [
                    "productId" => 101,
                    "quantity" => 2,
                    "unitPrice" => "49.50",
                    "total" =>  "99.00"
                ],
                [
                    "productId" => 100,
                    "quantity" => 1,
                    "unitPrice" => "120.75",
                    "total" =>  "120.75"
                ]
            ],
            "total" => "219.75"
        ]);

        Order::create([
            'user' => 3,
            'items' => [
                [
                    "productId" => 102,
                    "quantity" => 6,
                    "unitPrice" => "11.28",
                    "total" =>  "67.68"
                ],
                [
                    "productId" => 100,
                    "quantity" => 10,
                    "unitPrice" => "120.75",
                    "total" =>  "1207.50"
                ]
            ],
            "total" => "1275.18"
        ]);

    }
}
