<head>
    <style>
        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>
</head>

<body>
    <div>
        <p>My Applications</p>

        <!-- Student -->
        @if(auth()->user()->isStudent())
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
        @endif

        <!-- Provider -->
        @if(auth()->user()->isProvider())
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
        @endif

    </div>
</body>
