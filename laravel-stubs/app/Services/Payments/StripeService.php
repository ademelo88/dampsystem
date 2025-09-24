<?php

namespace App\Services\Payments;

class StripeService {
    public function createCheckoutSession(array $params): array {
        // TODO: integrate stripe/stripe-php
        return ['id' => 'cs_test_123', 'url' => '#'];
    }
}
