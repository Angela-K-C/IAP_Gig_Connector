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
                    <a href="#">See Post</a>

                    @if($gig->applications_count > 0)
                        <a href="{{ route('gigs.applicants', ['gig' => $gig->id]) }}">See Applicants</a>
                    @endif

                    <a>Close Applications</a>
                </td>
            </tr>
        @endforeach
    </table>
</div>
