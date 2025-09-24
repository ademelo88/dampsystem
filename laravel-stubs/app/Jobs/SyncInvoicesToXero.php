<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\Accounting\XeroService;
use App\Models\Invoice;

class SyncInvoicesToXero implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $invoiceId) {}

    public function handle(XeroService $xero): void
    {
        $invoice = Invoice::find($this->invoiceId);
        if (!$invoice) return;
        $xero->pushInvoice($invoice->toArray());
    }
}
