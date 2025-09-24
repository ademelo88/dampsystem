<?php
namespace App\Services\Accounting; class QuickBooksService { public function pushInvoice(array $i): array { return ['status'=>'queued']; }}