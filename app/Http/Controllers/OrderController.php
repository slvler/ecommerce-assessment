<?php

namespace App\Http\Controllers;

use App\Actions\Order\StoreAction;
use App\Http\Requests\OrderStoreRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\OrderShowResource;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    public function __construct()
    {}

    public function index(): \Illuminate\Http\JsonResponse
    {
        $orders = Order::all();

        return response()->json([
            'message' => 'Orders listed successfully',
            'success' => true,
            'data' => OrderResource::make($orders)
        ], 200);
    }
    public function show(int $id) : OrderShowResource
    {
        $order = Order::findOrFail($id);

        return new OrderShowResource($order);
    }
    public function store(OrderStoreRequest $request): \Illuminate\Http\JsonResponse
    {
        $data = $request->validated();

        $stock = $this->stock_control($data['items']);

        if ($stock){
            return response()->json([
                'success' => false,
                'message' => "product stock error",
            ],422);
        }

        $order = (new StoreAction())->handle($data);

        return response()->json([
            'message' => 'Orders created successfully',
            'success' => true,
            'data' => OrderShowResource::make($order)
        ], 200);

    }
    public function update($id, Request $request){}
    public function delete($id): \Illuminate\Http\JsonResponse
    {
        try {
            Order::whereId($id)->delete();
            return response()->json([
                'success' => true,
                'message' => "order successfully deleted",
            ], 200);
        }catch (\Exception $exception){
            return response()->json([
                'success' => false,
                'message' => "order deletion process error",
            ],500);
        }
    }

    protected function stock_control($data): bool
    {
        foreach ($data as $item){
            $product = Product::where('id', $item['productId'])->first();
            if ($item['quantity'] > $product->stock){
                return true;
            }
        }
        return false;
    }
}
