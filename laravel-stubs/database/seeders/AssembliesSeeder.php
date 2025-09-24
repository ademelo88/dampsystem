<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Assembly;

class AssembliesSeeder extends Seeder
{
    public function run(): void
    {
        Assembly::updateOrCreate(['code'=>'VENT-100-FAN'],[
            'name'=>'Supply & fit 100mm humidistat fan',
            'description'=>'Core drill, fit fan with isolator, test & seal.',
            'bom'=>[
                ['sku'=>'FAN-100MM','name'=>'100mm Humidistat Fan','uom'=>'each','qty'=>1,'cost'=>65],
                ['sku'=>'Duct-100','name'=>'100mm Ducting','uom'=>'m','qty'=>2,'cost'=>5],
                ['sku'=>'Sealant','name'=>'Silicone','uom'=>'each','qty'=>1,'cost'=>5]
            ],
            'labour_hours'=>2.0,
            'tags'=>['ventilation']
        ]);

        Assembly::updateOrCreate(['code'=>'DRN-FRENCH-6M'],[
            'name'=>'Install 6m French Drain',
            'description'=>'Excavate, geotextile, gravel, perforated pipe, discharge to soakaway.',
            'bom'=>[
                ['sku'=>'Gravel','name'=>'20mm Gravel','uom'=>'ton','qty'=>0.5,'cost'=>40],
                ['sku'=>'Pipe-Perforated','name'=>'110mm Perforated Pipe','uom'=>'m','qty'=>6,'cost'=>6],
                ['sku'=>'Geo','name'=>'Geotextile','uom'=>'m2','qty'=>8,'cost'=>2.5]
            ],
            'labour_hours'=>6.0,
            'tags'=>['drainage']
        ]);

        Assembly::updateOrCreate(['code'=>'INT-TANK-5M2'],[
            'name'=>'Internal tanking 5m²',
            'description'=>'Remove defective plaster, apply tanking, re-skim.',
            'bom'=>[
                ['sku'=>'TANK-KIT','name'=>'Tanking Kit','uom'=>'kit','qty'=>1,'cost'=>65],
                ['sku'=>'CEM-OPC-25KG','name'=>'OPC Cement 25kg','uom'=>'bag','qty'=>2,'cost'=>6]
            ],
            'labour_hours'=>8.0,
            'tags'=>['internal-damp']
        ]);
    }
}
