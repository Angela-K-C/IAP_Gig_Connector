@if($status == "approved")
    <p>Congrats! Your application has been {{ $status }}. Watch out for future emails from us.</p>
@endif

@if($status == "rejected")
    <p>Sorry but your application has been {{ $status }}</p>
@endif

@if($status == "shortlisted")
    <p>Congrats! Your application has been {{ $status }}. Watch out for future emails from us.</p>
@endif