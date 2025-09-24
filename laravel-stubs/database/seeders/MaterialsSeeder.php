<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Material;

class MaterialsSeeder extends Seeder
{
    public function run(): void
    {
        Material::updateOrCreate(['sku'=>'FAN-100MM'],['name'=>'100mm Humidistat Fan','unit'=>'each','cost'=>65,'category'=>'Ventilation']);
        Material::updateOrCreate(['sku'=>'TRAY-1600x800'],['name'=>'Shower Tray 1600x800','unit'=>'each','cost'=>249,'category'=>'Bathroom']);
        Material::updateOrCreate(['sku'=>'TANK-KIT'],['name'=>'Tanking Kit','unit'=>'kit','cost'=>65,'category'=>'Waterproofing']);
        Material::updateOrCreate(['sku'=>'CEM-OPC-25KG'],['name'=>'OPC Cement 25kg','unit'=>'bag','cost'=>6,'category'=>'Mortar']);
        Material::updateOrCreate(['sku'=>'SBR-5L'],['name'=>'SBR Bonding Agent 5L','unit'=>'bottle','cost'=>12,'category'=>'Additives']);
    }
}
