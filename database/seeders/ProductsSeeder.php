<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->products as $product) {
            Product::create(...$product);
        }
    }

    public function products()
    {
        return [
            [
                "name" => "Product A",
                "price" => 19.99,
                "description" => "A versatile product for various purposes. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
            ],
            [
                "name" => "Product B",
                "price" => 29.99,
                "description" => "High-quality product with advanced features. Sed ac augue nec odio congue feugiat."
            ],
            [
                "name" => "Product C",
                "price" => 39.99,
                "description" => "Stylish and durable design. Pellentesque sit amet fermentum neque."
            ],
            [
                "name" => "Product D",
                "price" => 49.99,
                "description" => "Perfect for everyday use. Fusce vel dapibus libero. Mauris luctus, mauris eu iaculis aliquet."
            ],
            [
                "name" => "Product E",
                "price" => 59.99,
                "description" => "State-of-the-art technology for an affordable price. Nulla convallis tincidunt diam, at dignissim quam tincidunt in."
            ],
            [
                "name" => "Product F",
                "price" => 69.99,
                "description" => "Compact and lightweight, ideal for travel. Duis aliquet, augue at faucibus dictum, lacus ex aliquet odio."
            ],
            [
                "name" => "Product G",
                "price" => 79.99,
                "description" => "Enhance your productivity with this innovative product. Turpis purus consequat ligula, non rhoncus neque justo id elit."
            ],
            [
                "name" => "Product H",
                "price" => 89.99,
                "description" => "Eco-friendly and sustainable materials. Vivamus convallis, tortor eu consectetur convallis, nisl dolor fermentum metus."
            ],
            [
                "name" => "Product I",
                "price" => 99.99,
                "description" => "Premium quality with a sleek design. Mauris eu iaculis aliquet, nisl dolor fermentum metus, non efficitur mauris urna nec elit."
            ],
            [
                "name" => "Product J",
                "price" => 109.99,
                "description" => "Cutting-edge technology for the modern user. Lorem ipsum dolor sit amet, consectetur adipiscing elit."
            ],
            [
                "name" => "Product K",
                "price" => 119.99,
                "description" => "A must-have for tech enthusiasts. Sed ac augue nec odio congue feugiat. Duis aliquet, augue at faucibus dictum."
            ],
            [
                "name" => "Product L",
                "price" => 129.99,
                "description" => "Elegant and functional design. Pellentesque sit amet fermentum neque. Vivamus convallis, tortor eu consectetur convallis."
            ],
            [
                "name" => "Product M",
                "price" => 139.99,
                "description" => "Stay connected with this powerful device. Nulla convallis tincidunt diam, at dignissim quam tincidunt in."
            ],
            [
                "name" => "Product N",
                "price" => 149.99,
                "description" => "Perfect gift for any occasion. Fusce vel dapibus libero. Mauris luctus, mauris eu iaculis aliquet."
            ],
            [
                "name" => "Product O",
                "price" => 159.99,
                "description" => "Experience the future with this innovative product. Turpis purus consequat ligula, non rhoncus neque justo id elit."
            ]
        ];
    }
}
