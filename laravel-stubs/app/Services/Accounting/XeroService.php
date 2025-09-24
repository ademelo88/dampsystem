<?php
namespace App\Services\Accounting; class XeroService { public function pushInvoice(array $i): array { return ['status'=>'queued']; }}