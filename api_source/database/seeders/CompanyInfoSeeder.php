<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyInfoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('company_infos')->insert([
            [
                'name' => '社名1',
                'address' => '東京都中央区',
                'telnum' => '000-0000-0000',
                'mail' => 'test1@gmail.com',
                'industry' => '広告業界'
            ],
            [
                'name' => '社名2',
                'address' => '東京都豊島区',
                'telnum' => '000-0000-0000',
                'mail' => 'test2@gmail.com',
                'industry' => '人材業界'
            ]
        ]);
    }
}
