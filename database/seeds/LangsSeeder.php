<?php

use Illuminate\Database\Seeder;
use App\Lang;

class LangsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Lang::truncate();
        $langs = [
            [
                'name' => 'En',
                'code' => 'en',
                'default' => 1
            ],
            [
                'name' => 'Dk',
                'code' => 'dk',
                'default' => 0
            ]
        ];

        foreach($langs as $l) {
            $lang = new Lang;
            $lang->name = $l['name'];
            $lang->code = $l['code'];
            $lang->default = $l['default'];
            $lang->save();
        }
    }
}
