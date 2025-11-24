<div>
    <h1>Job Post Details</h1>
    <p>Opening for {{ $gig->title }}</p>

    @if(auth()->user()->isProvider())
        <a href="{{ route('gigs.edit', $gig) }}">Edit</a>
        
        @if($gig->status == "open")
            <form action="{{ route('gigs.close', $gig) }}" method="POST" style="display:inline;">
                @csrf
                @method('PATCH')
                <button type="submit">Close Applications</button>
            </form>
        @else
            <span class="text-gray-500">Applications are closed</span>
        @endif

        <a href="{{ route('gigs.applicants', ['gig' => $gig->id]) }}">See Applicants</a>
    @endif

    @if(auth()->user()->isStudent())
        @if($hasApplied)
            <form action="{{ route('applications.store') }}" method="POST">
                @csrf
                <input type="hidden" name="job_id" value={{ $gig->id }} />
                <button type="submit">APPLY</button>
            </form>
        @endif

        @if(!$hasApplied)
            <p style="font-weight:bold;">APPLIED</p>
        @endif

        @if(auth()->user()->savedGigs->contains($gig->id))
            <form action="{{ route('gigs.unsave', $gig->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="text-red-600">Remove from Saved</button>
            </form>
        @else
            <form action="{{ route('gigs.save', $gig->id) }}" method="POST">
                @csrf
                <button class="text-blue-600">Save Gig</button>
            </form>
        @endif
    @endif

    <p>Job Title: {{ $gig->title }}</p>
    <p>Provider Name: {{ $gig->provider->organization_name }}</p>

    @if($gig->payment_type == "fixed")
        <p>Pay rate: {{ $gig->payment_amount }} (fixed)</p>
    @endif

    @if($gig->payment_type == "hourly")
        <p>Pay rate: {{ $gig->payment_amount }}/hr</p>
    @endif

    <p>Duration: {{ $gig->duration }}</p>
    <p>Location: {{ $gig->location }}</p>
    <p>Category: {{ $gig->category->name ?? '-' }}</p>

    <p style="text-decoration: underline;">Job Description</p>
    <p>{{ $gig->description }}</p>

    <p style="text-decoration: underline;">Contact details</p>
    <p>{{ $gig->provider->user->email }}</p>
    <p>{{ $gig->provider->contact_number }}</p>
</div>
