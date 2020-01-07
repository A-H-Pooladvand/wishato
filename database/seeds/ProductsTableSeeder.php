<?php

use App\Product;
use App\ProductProperty;
use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        factory(Product::class, 50)->create()->map(static function (Product $product) {
            $roll = random_int(1, 3);
            factory(ProductProperty::class, $roll)->create(['product_id' => $product->id]);
        });
    }
}
