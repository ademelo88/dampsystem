#!/usr/bin/env bash
set -euo pipefail
cd backend
composer require xeroapi/xero-php-oauth2:^5 quickbooks/v3-php-sdk:^6
