<?php

namespace App\Services\Payments;

class GoCardlessService {
    public function createPaymentIntent(array $params): array {
        // TODO: integrate gocardless/gocardless-pro
        return ['id' => 'gc_test_123'];
    }
}
