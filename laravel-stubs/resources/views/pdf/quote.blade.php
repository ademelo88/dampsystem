<!doctype html>
<html><head><meta charset="utf-8"><style>
body{font-family: DejaVu Sans, sans-serif; font-size: 12px;}
h1{font-size: 18px;}
.table{width:100%; border-collapse: collapse;}
.table th,.table td{border:1px solid #ddd; padding:6px;}
</style></head><body>
<h1>Quote Pack</h1>
<p>Quote #: {{ $quote->id }} | Lead #: {{ $quote->lead_id }}</p>
@foreach($quote->options as $opt)
  <h2>{{ ucfirst($opt->tier) }} Option</h2>
  <p>Warranty: {{ $opt->warranty_months }} months</p>
  <table class="table">
    <tr><th>Description</th><th>Qty</th><th>Price</th></tr>
    @foreach(($opt->lines ?? []) as $line)
      <tr><td>{{ $line['desc'] ?? '' }}</td><td>{{ $line['qty'] ?? '' }}</td><td>{{ $line['price'] ?? '' }}</td></tr>
    @endforeach
  </table>
@endforeach
</body></html>