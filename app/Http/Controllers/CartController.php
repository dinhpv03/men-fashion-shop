<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Http\Requests\StoreCartRequest;
use App\Http\Requests\UpdateCartRequest;
use App\Models\Product;
use App\Models\ProductVariant;
use Illuminate\Support\Facades\Request;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function list()
    {
        $cart = session('cart', []);

        $totalAmount = 0;
        foreach ($cart as $item) {
            $totalAmount += $item['quantity'] * ($item['price_sale'] ?: $item['price_regular']);
        }

        return view('cart', compact('totalAmount'));
    }

    public function add()
    {
        $product = Product::query()->findOrFail(\request('product_id'));
        $productVariant = ProductVariant::query()
            ->with(['color', 'size'])
            ->where([
                'product_id' => \request('product_id'),
                'product_size_id' => \request('product_size_id'),
                'product_color_id' => \request('product_color_id'),
            ])
            ->firstOrFail();

        if (!isset( session('cart')[$productVariant->id] ) ) {
            $data = $product->toArray() + $productVariant->toArray() + ['quantity' => \request('quantity')];
            session()->put('cart.' . $productVariant->id, $data);
        } else {
            $data = session('cart')[$productVariant->id];
            $data['quantity'] = \request('quantity');

            session()->put('cart.' . $productVariant->id,  $data);
        }
        return redirect()->route('cart.list');
    }
    public function remove($id)
    {
        try {
            $cart = session()->get('cart', []);

            if(isset($cart[$id])) {
                unset($cart[$id]);
                session()->put('cart', $cart);
            }
            return redirect()->back()->with('success', 'Sản phẩm đã được xóa khỏi giỏ hàng.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Có lỗi xảy ra khi xóa sản phẩm khỏi giỏ hàng.');
        }
    }

}
