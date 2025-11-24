<div>
    @if (session('error'))
        <p class="text-red-600">{{ session('error') }}</p>
    @endif

    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    <h1>GIGS</h1>

    <a href="{{ route('gigs.create') }}">Create New Gig</a>

    @foreach ($gigs as $gig) 
        <p>{{ $gig->id }}. {{ $gig->title }}</p>
        <p>{{ $gig->description }}</p>
        
        <a href="{{ route('gigs.show', $gig) }}">View Gig</a>
        <br>
    @endforeach
</div>
