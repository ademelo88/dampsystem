<div class="max-w-3xl mx-auto p-6">
    <h1 class="text-2xl font-bold mb-4">Get a Quote</h1>
    <div class="mb-4">Step {{ $step }} of 7</div>

    @if(session('ok'))
        <div class="p-3 bg-green-100 border">{{ session('ok') }}</div>
    @endif

    @if($step === 1)
      <div class="space-y-2">
        <input class="w-full border p-2" placeholder="First name" wire:model.defer="contact.first_name"/>
        <input class="w-full border p-2" placeholder="Last name" wire:model.defer="contact.last_name"/>
        <input class="w-full border p-2" placeholder="Email" wire:model.defer="contact.email"/>
        <input class="w-full border p-2" placeholder="Phone" wire:model.defer="contact.phone"/>
      </div>
      <button class="mt-4 px-4 py-2 bg-blue-600 text-white" wire:click="next">Next</button>
    @elseif($step === 2)
      <div class="space-y-2">
        <input class="w-full border p-2" placeholder="Address" wire:model.defer="property.address"/>
        <input class="w-full border p-2" placeholder="Postcode" wire:model.defer="property.postcode"/>
        <input class="w-full border p-2" placeholder="Property type" wire:model.defer="property.type"/>
      </div>
      <div class="mt-4 space-x-2">
        <button class="px-4 py-2 border" wire:click="back">Back</button>
        <button class="px-4 py-2 bg-blue-600 text-white" wire:click="next">Next</button>
      </div>
    @elseif($step === 3)
      <div class="space-y-2">
        <label class="block">Problems (tick what applies):</label>
        @foreach(['condensation','black_mould','penetrating_damp','rising_damp','musty_smell','peeling_paint','damp_patch','salts','ventilation'] as $p)
          <label class="block"><input type="checkbox" wire:model="problems.{{ $p }}"> {{ str_replace('_',' ', $p) }}</label>
        @endforeach
        <input class="w-full border p-2" placeholder="Severity (1-5)" wire:model.defer="severity"/>
        <input class="w-full border p-2" placeholder="Duration" wire:model.defer="duration"/>
      </div>
      <div class="mt-4 space-x-2">
        <button class="px-4 py-2 border" wire:click="back">Back</button>
        <button class="px-4 py-2 bg-blue-600 text-white" wire:click="next">Next</button>
      </div>
    @elseif($step === 7)
      <div class="space-y-2">
        <button class="px-4 py-2 bg-emerald-600 text-white" wire:click="submit">Submit</button>
      </div>
      <div class="mt-4">
        <button class="px-4 py-2 border" wire:click="back">Back</button>
      </div>
    @else
      <div class="p-4 border rounded">Additional steps UI omitted in stub. Continue to submit.</div>
      <div class="mt-4 space-x-2">
        <button class="px-4 py-2 border" wire:click="back">Back</button>
        <button class="px-4 py-2 bg-blue-600 text-white" wire:click="next">Next</button>
      </div>
    @endif
</div>
