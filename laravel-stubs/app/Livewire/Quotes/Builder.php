<?php

namespace App\Livewire\Quotes;

use Livewire\Component;
use App\Models\{Lead, Quote, QuoteOption, Assembly};
use App\Services\PricingEngine;

class Builder extends Component
{
    public Lead $lead;
    public string $tier = 'good';
    public float $margin = 30.0;
    public array $lines = []; // [{assembly_id, name, qty, cost, price}]
    public ?int $quoteId = null;

    public function mount(Lead $lead){ $this->lead = $lead; }

    public function addAssembly($assemblyId, $qty = 1)
    {
        $assembly = Assembly::findOrFail($assemblyId);
        $pricing = app(PricingEngine::class)->priceAssembly($assembly, $this->margin);
        $this->lines[] = [
            'assembly_id'=>$assembly->id,
            'name'=>$assembly->name,
            'qty'=>$qty,
            'cost'=>$pricing['cost'],
            'price'=>$pricing['price'] * $qty,
        ];
    }

    public function saveQuote()
    {
        $quote = Quote::create([ 'lead_id'=>$this->lead->id, 'status'=>'sent' ]);
        $totals = app(PricingEngine::class)->summarise($this->lines);
        QuoteOption::create([
            'quote_id' => $quote->id,
            'tier'     => $this->tier,
            'summary'  => 'Auto-generated option',
            'warranty_months' => 12,
            'lines'    => $this->lines,
            'totals'   => $totals,
        ]);
        $this->quoteId = $quote->id;
        session()->flash('ok', 'Quote saved (#'.$quote->id.')');
    }

    public function render()
    {
        $assemblies = Assembly::orderBy('name')->get();
        $totals = app(PricingEngine::class)->summarise($this->lines);
        return view('livewire.quotes.builder', compact('assemblies','totals'));
    }
}
