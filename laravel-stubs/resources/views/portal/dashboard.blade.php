<div class="max-w-4xl mx-auto p-6">
<h1 class="text-2xl font-bold mb-4">Your Quotes</h1>
<ul>
@foreach($quotes as $q)
<li class="mb-2"><a class="text-blue-600 underline" href="{{ route('portal.quote', $q->id) }}">Quote #{{ $q->id }}</a></li>
@endforeach
</ul>
</div>