<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\LabourRate;

class LabourRateSeeder extends Seeder
{
    public function run(): void
    {
        LabourRate::updateOrCreate(['role'=>'Technician'],['hourly_rate'=>30,'overhead_pct'=>15,'note'=>'Standard tech rate']);
        LabourRate::updateOrCreate(['role'=>'Lead Tech'],['hourly_rate'=>38,'overhead_pct'=>18,'note'=>'Lead installer']);
        LabourRate::updateOrCreate(['role'=>'Surveyor'],['hourly_rate'=>45,'overhead_pct'=>20,'note'=>'Survey & diagnostics']);
    }
}
