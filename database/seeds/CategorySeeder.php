<?php

use Illuminate\Database\Seeder;
use App\Category;
use App\Translate;
use App\Lang;

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
                "position" => 1,
                "image" => "",
                "color" => "#73492a",
                "translate" => [
                    "no" => [
                        "name" => "MIX EN BOKS FYLDTE CHOKOLADER",
                        "short_description" => "Med 12 fyldte chokolader & flødekarameller Vælg 12 lækre stykker for 155 kr. Hold musen over stykket for mere info!"
                    ],
                    "en" => [
                        "name" => "MIX A BOX FILLED CHOCOLADER",
                        "short_description" => "With 12 stuffed chocolates & cream karamels Choose 12 delicious pieces for 155 kr. Hold your mouse over the piece for more info!"
                    ]
                ]
            ],
            [
                "parent_id" => 0,
                "code" => "mebfc2",
                "position" => 2,
                "image" => "",
                "color" => "#fef7ed",
                "translate" => [
                    "no" => [
                        "name" => "MIX EN BOKS FYLDTE CHOKOLADER",
                        "short_description" => "Med 6 fyldte chokolader & flødekarameller Vælg 6 lækre stykker for 65 kr. Hold musen over stykket for mere info!"
                    ],
                    "en" => [
                        "name" => "MIX A BOX FILLED CHOCOLADER",
                        "short_description" => "With 6 stuffed chocolates & cream karamels Choose 6 delicious pieces for 65 kr. Hold your mouse over the piece for more info!"
                    ]
                ]
            ],
            [
                "parent_id" => 0,
                "code" => "vc",
                "position" => 3,
                "image" => "public/image/pic.png",
                "color" => "#422918",
                "translate" => [
                    "no" => [
                        "name" => "VARM CHOKOLADE",
                        "short_description" => "6 stk. varmechokolade stænger"
                    ],
                    "en" => [
                        "name" => "HOT CHOCOLATE",
                        "short_description" => "6 pieces. hot chocolate bars"
                    ]
                ]
            ],
            [
                "parent_id" => 0,
                "code" => "ob",
                "position" => 3,
                "image" => "",
                "color" => "#fd1f8c",
                "translate" => [
                    "no" => [
                        "name" => "ORIGINAL BEANS",
                        "short_description" => "59 kr. stk.- 3 stk. 155 kr."
                    ],
                    "en" => [
                        "name" => "ORIGINAL BEANS",
                        "short_description" => "59 kr. pcs. 155 kr."
                    ]
                ]
            ],
            [
                "parent_id" => 4,
                "code" => "70g",
                "position" => 3,
                "image" => "",
                "color" => "#fd1f8c",
                "translate" => [
                    "no" => [
                        "name" => "70 g. barer ",
                        "short_description" => "59 kr. stk.- 3 stk. 155 kr."
                    ],
                    "en" => [
                        "name" => "70 g. Bars",
                        "short_description" => "59 kr. stk.- 3 stk. 155 kr."
                    ]
                ]
            ],
            [
                "parent_id" => 4,
                "code" => "12g",
                "position" => 3,
                "image" => "",
                "translate" => [
                    "no" => [
                        "name" => "12 g. barer",
                        "short_description" => "15 kr. stk. - 3 stk. 40 kr."
                    ],
                    "en" => [
                        "name" => "12 g. Bars",
                        "short_description" => "15 kr. pcs. - 3 pcs. 40 kr."
                    ]
                ]
            ],
            [
                "parent_id" => 4,
                "code" => "200g",
                "position" => 3,
                "image" => "public/image/border.png",
                "translate" => [
                    "no" => [
                        "name" => "2000g. poser",
                        "short_description" => "110 kr. stk."
                    ],
                    "en" => [
                        "name" => "2000g. to pose",
                        "short_description" => "110 kr. pcs."
                    ]
                ]
            ],
            [
                "parent_id" => 4,
                "code" => "2000g",
                "position" => 3,
                "image" => "",
                "translate" => [
                    "no" => [
                        "name" => "2000g. poser",
                        "short_description" => "500 - 626 kr"
                    ],
                    "en" => [
                        "name" => "2000g. pose",
                        "short_description" => "500 - 626 kr "
                    ]
                ]
            ]
        ];
        
        Category::truncate();
        
        $langs = Lang::get()->keyBy('code');

        foreach($categories as $c) {
            $category = new Category;
            $category->parent_id = $c["parent_id"];
            $category->name = "";
            $category->code = $c["code"];
            $category->position = $c["position"];
            $category->image = $c["image"];
            $category->color = ! empty($c["color"]) ? $c["color"] : "#ffffff";
            $category->short_description = "";
            $category->save();

            foreach($c["translate"] as $code => $lng) {
                Translate::create([
                    'table' => 'categories',
                    'table_id' => $category->id,
                    'langs_id' => $langs[$code]->id,
                    'transalte' => json_encode($lng)
                ]);
            }
        }
    }
}
