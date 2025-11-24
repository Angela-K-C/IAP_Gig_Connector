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
            <th>Job Title</th>
            <th>Provider</th>
            <th>Status</th>
            <th>Date Applied</th>
        </tr>

        @foreach ($applications as $application)
            <tr>
                <td>{{ $application->gig->title }}</td>
                <td>{{ $application->gig->provider?->organization_name ?? 'Unknown' }}</td>
                <td>{{ $application->status }}</td>
                <td>{{ \Carbon\Carbon::parse($application->applied_at)->format('M jS Y') }}</td>
            </tr>
        @endforeach
    </table>
</div>
