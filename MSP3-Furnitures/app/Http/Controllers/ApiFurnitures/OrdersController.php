<?php

namespace App\Http\Controllers\ApiFurnitures;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Support\Facades\Auth;

class OrdersController extends Controller
{
    public function getListOrders()
    {
        $userId = Auth::id();
        $orders = Order::where('idutilisateur', $userId)->with('items.furniture')->get();
        return response()->json($orders);
    }

    public function getDetailsOrders($id)
    {
        $userId = Auth::id();
        $order = Order::where('idutilisateur', $userId)->with('items.furniture')->findOrFail($id);
        return response()->json($order);
    }

    public function addOrder(Request $request)
    {
        $userId = Auth::id();

        $validatedData = $request->validate([
            'items' => 'required|array',
            'items.*.idfurniture' => 'required|exists:furniture,idfurniture',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = new Order();
        $order->idutilisateur = $userId;
        $order->save();

        foreach ($validatedData['items'] as $itemData) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->idorder;
            $orderItem->idfurniture = $itemData['idfurniture'];
            $orderItem->quantity = $itemData['quantity'];
            $orderItem->save();
        }

        return response()->json($order->load('items.furniture'), 201);
    }

    public function updateOrder(Request $request, $id)
    {
        $userId = Auth::id();

        $validatedData = $request->validate([
            'items' => 'required|array',
            'items.*.idfurniture' => 'required|exists:furniture,idfurniture',
            'items.*.quantity' => 'required|integer|min:1',
        ]);

        $order = Order::where('idutilisateur', $userId)->findOrFail($id);
        $order->save();

        $order->items()->delete();

        foreach ($validatedData['items'] as $itemData) {
            $orderItem = new OrderItem();
            $orderItem->order_id = $order->idorder;
            $orderItem->idfurniture = $itemData['idfurniture'];
            $orderItem->quantity = $itemData['quantity'];
            $orderItem->save();
        }

        return response()->json($order->load('items.furniture'));
    }

    public function deleteOrder($id)
    {
        $userId = Auth::id();
        $order = Order::where('idutilisateur', $userId)->findOrFail($id);
        $order->items()->delete();
        $order->delete();
        return response()->json(null, 204);
    }
}
