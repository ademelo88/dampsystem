<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Assembly;
use App\Services\PricingEngine;

class PricingEngineTest extends TestCase
{
    public function test_prices_assembly()
    {
        $a = new Assembly([
            'bom' => [['cost'=>10,'qty'=>2]],
            'labour_hours' => 1.0
        ]);
        $engine = new PricingEngine();
        $res = $engine->priceAssembly($a, 30);
        $this->assertIsArray($res);
        $this->assertArrayHasKey('price',$res);
    }
}
