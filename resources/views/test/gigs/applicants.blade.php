<h2>Applicants for: {{ $gig->title }}</h2>
<p><strong>Total Applicants:</strong> {{ $applications->count() }}</p>

<table>
    <tr>
        <th>Student Name</th>
        <th>University</th>
        <th>Year</th>
        <th>Applied On</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

    @forelse($applications as $application)
        <tr>
            <td>{{ $application->student->user->name }}</td>
            <td>{{ $application->student->university ?? '—' }}</td>
            <td>{{ $application->student->year_of_study ?? '—' }}</td>
            <td>{{ \Carbon\Carbon::parse($application->applied_at)->format('M j, Y') }}</td>
            <td>{{ ucfirst($application->status) }}</td>
            <td>
                <a href="#">View Profile</a>

                @if($application->status != "approved" && $application->status != "rejected")
                    @if($application->status != 'shortlisted')
                        <!-- Shortlist -->
                        <form action="{{ route('applications.update', $application->id) }}" method="POST">
                            @csrf
                            @method('PATCH')
                            <input type="hidden" name="status" value="shortlisted" />
                            <button type="submit">Shortlist</button>
                        </form>
                    @endif

                    <!-- Reject -->
                    <form action="{{ route('applications.update', $application->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="rejected" />
                        <button type="submit">Reject</button>
                    </form>

                    <!-- Approve -->
                    <form action="{{ route('applications.update', $application->id) }}" method="POST">
                        @csrf
                        @method('PATCH')
                        <input type="hidden" name="status" value="approved" />
                        <button type="submit">Approve</button>
                    </form>
                @endif

                
            </td>
        </tr>
    @empty
        <tr>
            <td colspan="6">No applicants yet.</td>
        </tr>
    @endforelse
</table>
