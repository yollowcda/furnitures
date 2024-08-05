<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ApiProductController extends Controller
{
    public function getAllProducts()
    {
        $products = [
            [
                'id' => 1,
                'title' => 'Handmade Fresh Chair',
                'price' => 49.99,
                'description' => 'A comfortable chair made with fresh materials.',
                'category' => [
                    'id' => 1,
                    'name' => 'Furniture',
                    'image' => 'https://placeimg.com/640/480/furniture'
                ],
                'images' => [
                    'https://placeimg.com/640/480/any?r=0.9178516507833767',
                    'https://placeimg.com/640/480/any?r=0.9300320592588625',
                    'https://placeimg.com/640/480/any?r=0.8807778235430017'
                ]
            ],
            [
                'id' => 2,
                'title' => 'Handmade Fresh Table',
                'price' => 89.99,
                'description' => 'A stylish table for any modern living space.',
                'category' => [
                    'id' => 2,
                    'name' => 'Furniture',
                    'image' => 'https://placeimg.com/640/480/furniture'
                ],
                'images' => [
                    'https://placeimg.com/640/480/any?r=0.9178516507833767',
                    'https://placeimg.com/640/480/any?r=0.9300320592588625',
                    'https://placeimg.com/640/480/any?r=0.8807778235430017'
                ]
            ],
            [
                'id' => 3,
                'title' => 'Handmade Fresh Lamp',
                'price' => 19.99,
                'description' => 'A unique lamp to brighten up your space.',
                'category' => [
                    'id' => 3,
                    'name' => 'Lighting',
                    'image' => 'https://placeimg.com/640/480/lighting'
                ],
                'images' => [
                    'https://placeimg.com/640/480/any?r=0.9178516507833767',
                    'https://placeimg.com/640/480/any?r=0.9300320592588625',
                    'https://placeimg.com/640/480/any?r=0.8807778235430017'
                ]
            ],
            [
                'id' => 4,
                'title' => 'Handmade Fresh Sofa',
                'price' => 399.99,
                'description' => 'A luxurious sofa for ultimate comfort.',
                'category' => [
                    'id' => 4,
                    'name' => 'Furniture',
                    'image' => 'https://placeimg.com/640/480/furniture'
                ],
                'images' => [
                    'https://placeimg.com/640/480/any?r=0.9178516507833767',
                    'https://placeimg.com/640/480/any?r=0.9300320592588625',
                    'https://placeimg.com/640/480/any?r=0.8807778235430017'
                ]
            ]
        ];
        return response()->json($products);
    }
}
