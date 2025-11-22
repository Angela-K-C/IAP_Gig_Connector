<div>
    @if (session('error'))
        <p class="text-red-600">{{ session('error') }}</p>
    @endif

    @if (session('success'))
        <p class="text-green-600">{{ session('success') }}</p>
    @endif

    <h1>Saved Gigs</h1>

    @foreach ($savedGigs as $gig) 
        <p>{{ $gig->id }}. {{ $gig->title }}</p>
        <p>{{ $gig->description }}</p>
        
        <form action="{{ route('applications.store') }}" method="POST">
            @csrf
            <input type="hidden" name="job_id" value={{ $gig->id }} />
            <button type="submit">APPLY</button>
        </form>

        <br>
    @endforeach
</div>
