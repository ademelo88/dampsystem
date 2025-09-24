@php($opt = $quote->options)
<div class="max-w-4xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-2">Quote #{{ $quote->id }}</h1>
  <div class="grid md:grid-cols-3 gap-4">
    @foreach($quote->options as $option)
      <div class="border rounded p-4">
        <h2 class="font-semibold text-lg capitalize">{{ $option->tier }}</h2>
        <p class="text-sm text-gray-600">Warranty: {{ $option->warranty_months }} months</p>
        <p class="mt-2">{{ $option->summary }}</p>
        <form method="post" action="{{ route('portal.quote.select', [$quote->id, $option->id]) }}">
          @csrf
          <button class="mt-3 px-4 py-2 bg-blue-600 text-white">Select</button>
        </form>
      </div>
    @endforeach
  </div>
</div>
