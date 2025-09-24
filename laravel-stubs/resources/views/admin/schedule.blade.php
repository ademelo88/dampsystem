<div class="max-w-5xl mx-auto p-6">
  <h1 class="text-2xl font-bold mb-3">Schedule</h1>
  <table class="w-full border">
    <thead><tr><th>Job</th><th>Start</th><th>End</th><th>Status</th></tr></thead>
    <tbody>
      @foreach(\App\Models\Job::orderBy('schedule_start','desc')->limit(50)->get() as $j)
        <tr class="border-b"><td>#{{ $j->id }}</td><td>{{ $j->schedule_start }}</td><td>{{ $j->schedule_end }}</td><td>{{ $j->status }}</td></tr>
      @endforeach
    </tbody>
  </table>
</div>
