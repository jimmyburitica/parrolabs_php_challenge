<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use App\Models\Address;
use App\Models\Customer;
use App\Models\Detail;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(1)->create();
        Customer::factory(5)->create();
        Address::factory(5)->create();
        Product::factory(50)->create();
        Order::factory(10)->create();
        Detail::factory(50)->create();
    }
}
