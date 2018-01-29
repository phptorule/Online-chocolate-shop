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
                "short_description" => "Med 12 fyldte chokolader & flødekarameller Vælg 12 lækre stykker for 155 kr. Hold musen over stykket for mere info!",
                "position" => 1,
                "image" => "",
                "color" => "#73492a"
            ],
            [
                "parent_id" => 0,
                "code" => "mebfc2",
                "short_description" => "Med 6 fyldte chokolader & flødekarameller Vælg 6 lækre stykker for 65 kr. Hold musen over stykket for mere info!",
                "name" => "MIX EN BOKS FYLDTE CHOKOLADER",
                "position" => 2,
                "image" => "",
                "color" => "#fef7ed"
            ],
            [
                "parent_id" => 0,
                "code" => "vc",
                "short_description" => "6 stk. varmechokolade stænger",
                "name" => "VARM CHOKOLADE",
                "position" => 3,
                "image" => "public/image/pic.png",
                "color" => "#422918"
            ],
            [
                "parent_id" => 0,
                "code" => "ob",
                "short_description" => "59 kr. stk.- 3 stk. 155 kr.",
                "name" => "ORIGINAL BEANS",
                "position" => 3,
                "image" => "",
                "color" => "#fd1f8c"
            ],
            [
                "parent_id" => 4,
                "code" => "70g",
                "short_description" => "59 kr. stk.- 3 stk. 155 kr.",
                "name" => "70 g. barer",
                "position" => 3,
                "image" => "",
                "color" => "#fd1f8c"
            ],
            [
                "parent_id" => 4,
                "code" => "12g",
                "name" => "12 g. barer",
                "short_description" => "15 kr. stk. - 3 stk. 40 kr.",
                "position" => 3,
                "image" => ""
            ],
            [
                "parent_id" => 4,
                "code" => "200g",
                "name" => "Poser med 200g.",
                "short_description" => "110 kr. stk.",
                "position" => 3,
                "image" => "public/image/border.png"
            ],
            [
                "parent_id" => 4,
                "code" => "2000g",
                "name" => "2000g. poser",
                "short_description" => "500 - 626 kr",
                "position" => 3,
                "image" => ""
            ]
        ];
        
        Category::truncate();

        foreach($categories as $c) {
            $category = new Category;
            $category->parent_id = $c["parent_id"];
            $category->name = $c["name"];
            $category->code = $c["code"];
            $category->position = $c["position"];
            $category->image = $c["image"];
            $category->color = ! empty($c["color"]) ? $c["color"] : "#ffffff";
            $category->short_description =  ! empty($c["short_description"]) ? $c["short_description"] : "#ffffff";
            $category->save();
        }
    }
}
