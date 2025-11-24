<div>
    <form action="#">
        <input 
            wire:model.live.debounce:200ms="search"
            type="text" 
            name="search"
            placeholder="Search..." 
        /> 
    </form>

    <table>
        <tr>
            <th>Posted Job</th>
            <th>Status</th>
            <th>Applicant Count</th>
            <th>Actions</th>
        </tr>

        @foreach ($gigs as $gig)
            <tr>
                <td>{{ $gig->title }}</td>
                <td>{{ $gig->status ?? 'Open' }}</td>
                <td>{{ $gig->applications_count }}</td>
                <td>
                    <a href="{{ route('gigs.show', $gig) }}">See Post</a>

                    <a href="{{ route('gigs.applicants', ['gig' => $gig->id]) }}">See Applicants</a>

                    @if($gig->status == "open")
                        <form action="{{ route('gigs.close', $gig) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            <button type="submit">Close Applications</button>
                        </form>
                    @else
                        <span>Closed</span>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
</div>
