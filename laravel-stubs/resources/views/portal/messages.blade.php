<div class="max-w-3xl mx-auto p-6">
<h1 class="text-2xl font-bold mb-3">Messages</h1>
<form method="post" action="{{ route('portal.messages.store') }}">
@csrf
<textarea name="body" class="w-full border p-2" rows="3" placeholder="Write a message..."></textarea>
<button class="mt-2 px-4 py-2 bg-blue-600 text-white">Send</button>
</form>
<hr class="my-4"/>
@foreach($messages as $m)
  <div class="mb-2 p-2 border rounded">{{ $m->body }}</div>
@endforeach
</div>
