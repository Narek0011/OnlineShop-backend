<?php

namespace App\Http\Controllers;

use App\Http\Resources\CartResource;
use App\Http\Resources\ColorResource;
use App\Http\Resources\ProductResource;
use App\Models\Colors;
use App\Models\Product;
use App\Models\ProductCart;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProductController extends Controller
{
    /**
     * @param Request $request
     * @return array|JsonResponse
     */
    public function index(Request $request)
    {
        try {
            $product = Product::orderBy('id', "desc");
            $page = $request->input('page') ?: 1;
            $take = $request->input('count') ?: 4;
            $count = $product->count();
            if ($page) {
                $skip = $take * ($page - 1);
                $product = $product->take($take)->skip($skip);
            } else {
                $product = $product->take($take)->skip(0);
            }

            return [
                'data' => ProductResource::collection($product->get()),
                'pagination' => [
                    'product_pages' => ceil($count / $take),
                    'count' => $count,
                ],
                'status' => true
            ];

        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage(),
                'status' => false
            ], 500);
        }
    }


    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        try {
            $product = Product::findOrFail($id);
            return response()->json([
                'data' => ProductResource::collection($product->get()->where('id', $id)),
                'status' => true
            ], 201);
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage(),
                'status' => false
            ], 500);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function getProductsToCart($id)
    {
        try {
            $carts = ProductCart::orderBy('id', "desc")->where('user_id', $id);
            $allCarts = $carts->select('id', 'product_id', 'color_id', 'count', 'total_amount')->get();
            return response()->json([
                'data' => CartResource::collection($allCarts),
                'status' => true
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage(),
                'status' => false
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function addProductToCart(Request $request)
    {
        try {
            $requestData = $request->all();
            $data = $requestData['data'];
            $product_id = $data['product_id'];
            $color_id = $data['color_id'];
            $count = $data['count'];
            $user_id = $data['user_id'];
            $product = new ProductResource(Product::find($product_id));
            $color = new ColorResource(Colors::find($color_id));
            $totalPrice = $product['price'] * $count;

            $existingProduct = ProductCart::where('product_id', $product_id)
                ->where('user_id', $user_id)
                ->first();

            if ($existingProduct) {
                $existingProduct->count += $count;
                $existingProduct->total_amount += $totalPrice;
                $existingProduct->save();
            } else {
                ProductCart::create([
                    'product_id' => $product_id,
                    'color_id' => $color_id,
                    'count' => $count,
                    'user_id' => $user_id,
                    'total_amount' => $totalPrice,
                ]);
            }

            return response()->json([
                'count' => $count,
                'user_id' => $user_id,
                'product' => $product,
                'color' => $color,
                'total_price' => $totalPrice,
                'status' => true
            ], 200);

        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage(),
                'status' => false
            ], 500);
        }
    }

//    public function addProductToCart(Request $request)
//    {
//        try {
//            $requestData = $request->all();
//            $data = $requestData['data'];
//            $product_id = $data['product_id'];
//            $color_id = $data['color_id'];
//            $count = $data['count'];
//            $user_id = $data['user_id'];
//            $product = new ProductResource(Product::find($product_id));
//            $color = new ColorResource(Colors::find($color_id));
//            $totalPrice = $product['price'] * $count;
//
//            ProductCart::updateOrCreate(
//                [
//                    'product_id' => $product_id,
//                    'user_id' => $user_id,
//                ],
//                [
//                    'product_id' => $product_id,
//                    'color_id' => $color_id,
//                    'count' => $count,
//                    'user_id' => $user_id,
//                    'total_amount' => $totalPrice,
//                ]
//            );
//
//            return response()->json([
//                'count' => $count,
//                'user_id' => $user_id,
//                'product' => $product,
//                'color' => $color,
//                'total_price' => $totalPrice,
//                'status' => true
//            ], 200);
//
//        } catch (\Exception $e) {
//            return response()->json([
//                'messages' => $e->getMessage(),
//                'status' => false
//            ], 500);
//        }
//    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function deleteProductsToCart($id)
    {
        try {
            $product = ProductCart::findOrFail($id);
            $product->delete();
            return response()->json([
                'message' => "Product Deleted successfully!",
                'status' => true,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage(),
                'status' => false
            ], 500);
        }
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function updateProductToCart(Request $request)
    {
        try {
            $data = $request->all();
            $newCount = $data['count'];
            $id = $data['id'];
            $updatedProduct = ProductCart::findOrFail($id);
            $productId = $updatedProduct['product_id'];
            $product = Product::findOrFail($productId);
            $newTotalPrice = $product['price'] * $newCount;
            $updatedProduct->update(['count' => $newCount, 'total_amount' => $newTotalPrice]);
            $product = new ProductResource(Product::find($productId));
            $color = new ColorResource(Colors::find($updatedProduct['color_id']));

            return response()->json([
                'product' => $product,
                'id' => $id,
                'color' => $color,
                'count' => +$updatedProduct['count'],
                'total_price' => $updatedProduct['total_amount'],
                'message' => 'Your product updated',
                'status' => true,
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'messages' => $e->getMessage(),
                'status' => false
            ], 500);
        }
    }

    /**
     * @return JsonResponse|void
     * @throws \Stripe\Exception\ApiErrorException
     */
    public function checkout()
    {
        $user_id = Auth::user()->id;
        $total_amount = $this->getTotalPrice($user_id);
        $quantity = $this->getProductsQuantity($user_id);
        $stripe = new \Stripe\StripeClient(env('STRIPE_SECRET'));
        $checkout_session = $stripe->checkout->sessions->create([
            'line_items' => [[
                'price_data' => [
                    'currency' => 'usd',
                    'product_data' => [
                        'name' => 'T-shirt',
                    ],
                    'unit_amount' => $total_amount,
                ],
                'quantity' => $quantity,
            ]],
            'mode' => 'payment',
            'success_url' => 'http://localhost:3000/success',
            'cancel_url' => 'http://localhost:3000/cancel',
        ]);

        ProductCart::where('user_id', $user_id)->delete();

        return response()->json([
            'status' => true,
            'redirect_url' => $checkout_session->url
        ],200);
    }

    /**
     * @param $user_id
     * @return int
     */
    public function getTotalPrice($user_id)
    {
        $products = ProductCart::where('user_id', $user_id)->get();
        $total_amount = 0;
        foreach ($products as $product) {
            $total_amount += $product->total_amount;
        }
        return $total_amount;
    }

    /**
     * @param $user_id
     * @return int
     */
    public function getProductsQuantity($user_id)
    {
        $products = ProductCart::where('user_id', $user_id)->get();
        $quantity = 0;
        foreach ($products as $product) {
            $quantity += $product->count;
        }
        return $quantity;
    }
}
