<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use function PHPUnit\Framework\isNull;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $cartItems = $this->getCartItems();

        return view('cart.index', [
            'cartItems' => $cartItems
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    private function getCartFromCookie() {
        $cart = Cookie::get('cart');

        return (!is_null($cart)) ? json_decode($cart, true) : [];
    }

    private function getCartItems() {
        $cart = $this->getCartFromCookie();
        $productIds = array_keys($cart);
        $cartItems = array_map(function($productId) use($cart) {
            $quantity = $cart[$productId];
            $product = $this->getProduct($productId);

            if($product) {
                return [
                    'quantity' => $quantity,
                    'product' => $product
                ];
            }
            else {
                return null;
            }
        }, $productIds);

        return $cartItems;
    }

    private function getProduct($id)
    {
        $products = $this->getProducts();

        foreach($products as $product) {
            if($product['id'] == $id) {
                return $product;
            }
        }

        return null;
    }

    private function getProducts()
    {
        return [
            [
                'id' => 1,
                'name' => 'Orange',
                'price' => 30,
                'imageUrl' => asset('images/orange.jpeg')
            ],
            [
                'id' => 2,
                'name' => 'Apple',
                'price' => 20,
                'imageUrl' => asset('images/apple.jpeg')
            ]
        ];
    }

    public function updateCookie(Request $request)
    {
        $cart = $this->getCartFromCookie();

        foreach($cart as $productId => $currentQuantity) {
            $key = "product_$productId";

            if($request->has($key)) {
                $cart[$productId] = $request->input($key);
            }
        }

        $cart = json_encode($cart, true);
        // httpOnly
        Cookie::queue(
            Cookie::make('cart', $cart, 60 * 24 * 7, null, null, false, false)
        );

        return redirect()->route('cart.index');
    }
}
