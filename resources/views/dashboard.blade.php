
<x-layouts::app :title="__('Dashboard')">
    <div class="flex h-full w-full flex-1 flex-col gap-4 rounded-xl">
        <h1>Welcome {{auth()->user()->name}}
        <h2>Your prompt history:</h2>
        <ul>
@foreach($prompts as $prompt)
    <li>{{ $prompt->title}} ({{ $prompt->type}}) - {{ $prompt->tone }} ({{ $prompt->temp }}) - {{ $prompt->response }}</li>
@endforeach
</ul>
    </div>
</x-layouts::app>

