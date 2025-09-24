<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-2xl font-bold">Quote Builder — Lead #{{ $lead->id }}</h1>

  @if(session('ok')) <div class="p-3 bg-green-100 border my-3">{{ session('ok') }}</div> @endif

  <div class="grid md:grid-cols-3 gap-4 my-4">
    <div class="md:col-span-2 p-4 border rounded">
      <div class="flex items-center gap-2 mb-3">
        <label class="font-semibold">Margin %</label>
        <input class="border p-2 w-24" type="number" step="0.5" wire:model.live="margin" />
        <label class="font-semibold ml-4">Tier</label>
        <select class="border p-2" wire:model.live="tier">
          <option value="good">Good</option>
          <option value="better">Better</option>
          <option value="best">Best</option>
        </select>
      </div>

      <label class="block font-semibold mb-1">Add assembly</label>
      <div class="flex gap-2">
        <select class="border p-2 flex-1" wire:model="selectedAssembly">
          <option value="">-- choose --</option>
          @foreach($assemblies as $a)
            <option value="{{ $a->id }}">{{ $a->code }} — {{ $a->name }}</option>
          @endforeach
        </select>
        <button class="px-3 py-2 bg-blue-600 text-white" wire:click="addAssembly($event.target.previousElementSibling.value, 1)">Add</button>
      </div>

      <table class="w-full mt-4 text-sm">
        <thead><tr class="text-left border-b"><th>Assembly</th><th class="text-right">Price</th></tr></thead>
        <tbody>
          @foreach($lines as $l)
          <tr class="border-b"><td>{{ $l['name'] }}</td><td class="text-right">£{{ number_format($l['price'],2) }}</td></tr>
          @endforeach
        </tbody>
      </table>
    </div>
    <div class="p-4 border rounded">
      <div class="text-lg font-semibold">Totals</div>
      <div class="mt-2">Price: <strong>£{{ number_format($totals['total'] ?? 0, 2) }}</strong></div>
      <button class="mt-3 w-full px-4 py-2 bg-emerald-600 text-white" wire:click="saveQuote">Save Quote</button>
      @if($quoteId)
        <a class="block mt-2 text-blue-600 underline" href="{{ route('portal.quote', $quoteId) }}">View in Portal</a>
      @endif
    </div>
  </div>
</div>
