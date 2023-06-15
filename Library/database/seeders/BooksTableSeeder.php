<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class BooksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $faker = Faker::create();
        for ($i = 0; $i < 10; $i++) {
            DB::table('books')->insert([
                'title' => $faker->sentence(3),
                'author' => $faker->name(),
                'published_date' => $faker->date(),
                'isbn' => $faker->isbn10(),
                'description' => $faker->text(),
                'price' => $faker->numberBetween(1, 100),
                'id' => $faker->numberBetween(1, 100000),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
