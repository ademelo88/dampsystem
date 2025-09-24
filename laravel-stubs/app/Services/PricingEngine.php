<?php

namespace App\Services;

use App\Models\{Assembly, LabourRate};

class PricingEngine
{
    public function priceAssembly(Assembly $assembly, float $marginPct = 30.0): array
    {
        $materialCost = 0;
        foreach(($assembly->bom ?? []) as $item){
            $materialCost += ($item['cost'] ?? 0) * ($item['qty'] ?? 1);
        }
        $labourRate = LabourRate::where('role','Technician')->value('hourly_rate') ?? 30.0;
        $labourCost = $labourRate * ($assembly->labour_hours ?? 0);
        $cost = $materialCost + $labourCost;
        $price = $cost * (1 + $marginPct/100);
        return ['cost'=>$cost, 'price'=>round($price,2)];
    }

    public function summarise(array $lines): array
    {
        $total = 0; $cost = 0;
        foreach($lines as $l){ $cost += $l['cost'] ?? 0; $total += $l['price'] ?? 0; }
        return ['cost'=>round($cost,2), 'total'=>round($total,2)];
    }
}
