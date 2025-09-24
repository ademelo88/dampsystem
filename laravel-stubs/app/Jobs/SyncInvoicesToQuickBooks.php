<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Services\Accounting\QuickBooksService;
use App\Models\Invoice;

class SyncInvoicesToQuickBooks implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public function __construct(public int $invoiceId) {}

    public function handle(QuickBooksService $qb): void
    {
        $invoice = Invoice::find($this->invoiceId);
        if (!$invoice) return;
        $qb->pushInvoice($invoice->toArray());
    }
}
