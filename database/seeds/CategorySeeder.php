<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                "parent_id" => 0,
                "code" => "mebfc",
                "name" => "MIX EN BOKS FYLDTE CHOKOLADER",
                "position" => 1,
                "image" => "http://placehold.it/250"
            ],
            [
                "parent_id" => 0,
                "code" => "mebfc2",
                "name" => "MIX EN BOKS FYLDTE CHOKOLADER",
                "position" => 2,
                "image" => "http://placehold.it/250"
            ],
            [
                "parent_id" => 0,
                "code" => "vc",
                "name" => "VARM CHOKOLADE",
                "position" => 3,
                "image" => "http://placehold.it/250"
            ],
            [
                "parent_id" => 0,
                "code" => "ob",
                "name" => "ORIGINAL BEANS",
                "position" => 3,
                "image" => "http://placehold.it/250"
            ],
            [
                "parent_id" => 4,
                "code" => "",
                "name" => "7 0 g. b a re r 5 9 k r. s t k . - 3 s t k . 1 5 5 k r.",
                "position" => 3,
                "image" => "http://placehold.it/250"
            ],
            [
                "parent_id" => 4,
                "code" => "",
                "name" => "1 2 g. b a re r 1 5 k r. s t k . - 3 s t k . 4 0 k r .",
                "position" => 3,
                "image" => "http://placehold.it/250"
            ],
            [
                "parent_id" => 4,
                "code" => "",
                "name" => "Poser med 200g. 1 1 0 k r. s t k .",
                "position" => 3,
                "image" => "http://placehold.it/250"
            ],
            [
                "parent_id" => 4,
                "code" => "",
                "name" => "2000g. p o s e r 5 0 0 - 6 2 6 k r",
                "position" => 3,
                "image" => "http://placehold.it/250"
            ],
        ];

        foreach($categories as $c) {
            $category = new Category;
            $category->parent_id = $c["parent_id"];
            $category->name = $c["name"];
            $category->code = $c["code"];
            $category->position = $c["position"];
            $category->image = $c["image"];
            $category->save();
        }
    }
}
