<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Invoice;
use App\Jobs\{SyncInvoicesToXero, SyncInvoicesToQuickBooks};

class SyncAccounting extends Command
{
    protected $signature = 'dams:sync-accounting {--target=xero} {--invoice=*}';
    protected $description = 'Queue invoice sync jobs to accounting platforms';

    public function handle(): int
    {
        $target = $this->option('target');
        $ids = $this->option('invoice');
        $invoices = $ids ? Invoice::whereIn('id', $ids)->get() : Invoice::where('status','sent')->get();

        foreach($invoices as $inv){
            if ($target === 'qb') SyncInvoicesToQuickBooks::dispatch($inv->id);
            else SyncInvoicesToXero::dispatch($inv->id);
        }
        $this->info('Queued sync for '.$invoices->count().' invoice(s).');
        return 0;
    }
}
