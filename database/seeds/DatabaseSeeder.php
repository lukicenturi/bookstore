<?php

use Illuminate\Database\Seeder;

use App\Book;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            ['id' => 1, 'email' => 'lukicenturi@gmail.com', 'name' => 'Luki Centuri', 'password' => bcrypt('00000000'), 'latitude' => -6.21462, 'longitude' => 106.84513, 'phone' => '081237123213'],
            ['id' => 2, 'email' => 'stevenbudinata@gmail.com', 'name' => 'Steven Budinata', 'password' => bcrypt('00000000'), 'latitude' => -6.21472, 'longitude' => 106.84523, 'phone' => '087721371322'],
        ]);

        Book::insert([
            ['created_at' => '2020-01-01 12:00:00', 'lender_id' => 1, 'title' => 'Five People You Meet In Heaven', 'author' => 'Mitch Albom', 'genre' => 'Fantasy', 'description' => 'Buku ini', 'cover' => '1.png'],
            ['created_at' => '2020-01-01 12:00:00', 'lender_id' => 1, 'title' => 'Tuesdays With Morrie', 'author' => 'Mitch Albom', 'genre' => 'Fantasy', 'description' => 'Buku ini', 'cover' => '2.jpg'],
            ['created_at' => '2020-01-01 12:00:00', 'lender_id' => 1, 'title' => 'The Passage', 'author' => 'Justin Cronin', 'genre' => 'Fantasy', 'description' => 'Buku ini', 'cover' => '3.jpeg'],
            ['created_at' => '2020-01-01 12:00:00', 'lender_id' => 1, 'title' => 'The Lost Book', 'author' => 'Charlie Lovett', 'genre' => 'Fantasy', 'description' => 'Buku ini', 'cover' => '4.jpeg'],
        ]);
        // $this->call(UsersTableSeeder::class);
    }
}
