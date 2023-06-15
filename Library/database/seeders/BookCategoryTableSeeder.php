<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BookCategoryTableSeeder extends Seeder
{
    public function run()
    {
        $faker = Faker::create();
        $books = DB::table('books')->pluck('id')->toArray();
        $categories = DB::table('categories')->pluck('id')->toArray();

        foreach ($books as $book) {
            $selected_categories = $faker->randomElements($categories, $faker->numberBetween(1, 3));
            foreach ($selected_categories as $category) {
                DB::table('book_category')->insert([
                    'book_id' => $book,
                    'category_id' => $category,
                    'created_at' => now(),
                    'updated_at' => now()
                ]);
            }
        }
    }
}

