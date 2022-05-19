<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CampBenefit;

class CampBenefitTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $campBenefit = [
            [
                'camp_id' => 1,
                'name' => 'Pro Techstack kits',
            ],
            [
                'camp_id' => 1,
                'name' => 'Imac Pro 2021 certications',
            ],
            [
                'camp_id' => 1,
                'name' => 'final project certications',
            ],
            [
                'camp_id' => 1,
                'name' => '1-1 Mentoring program',
            ],
            [
                'camp_id' => 1,
                'name' => 'offline course videos',
            ],
            [
                'camp_id' => 1,
                'name' => 'future job opportinity',
            ],
            [
                'camp_id' => 1,
                'name' => 'premium design kits',
            ],
            [
                'camp_id' => 1,
                'name' => 'website builder',
            ],
            [
                'camp_id' => 2,
                'name' => '1-1 Mentoring program',
            ],
            [
                'camp_id' => 2,
                'name' => 'website builder',
            ],
            [
                'camp_id' => 2,
                'name' => 'final project certications',
            ],
            [
                'camp_id' => 2,
                'name' => 'offline course videos',
            ]
        ];

        CampBenefit::insert($campBenefit);
    }
}
