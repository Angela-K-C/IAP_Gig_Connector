<h1>Edit Gig</h1>

@if ($errors->any())
    <div>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form action="{{ route('gigs.update', $gig->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div>
        <label for="title">Title:</label>
        <input type="text" name="title" id="title" value="{{ old('title', $gig->title) }}">
    </div>

    <div>
        <label for="description">Description:</label>
        <textarea name="description" id="description">{{ old('description', $gig->description) }}</textarea>
    </div>

    <div>
        <label for="category_id">Category:</label>
        <select name="category_id" id="category_id">
            <option value="">Select a category</option>
            @foreach($categories as $category)
                <option value="{{ $category->id }}" {{ old('category_id', $gig->category_id) == $category->id ? 'selected' : '' }}>
                    {{ $category->name }}
                </option>
            @endforeach
        </select>
    </div>

    <div>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" value="{{ old('location', $gig->location) }}">
    </div>

    <div>
        <label for="payment_type">Payment Type:</label>
        <select name="payment_type" id="payment_type">
            <option value="fixed" {{ old('payment_type', $gig->payment_type) == 'fixed' ? 'selected' : '' }}>Fixed</option>
            <option value="hourly" {{ old('payment_type', $gig->payment_type) == 'hourly' ? 'selected' : '' }}>Hourly</option>
        </select>
    </div>

    <div>
        <label for="payment_amount">Payment Amount:</label>
        <input type="number" step="0.01" name="payment_amount" id="payment_amount" value="{{ old('payment_amount', $gig->payment_amount) }}">
    </div>

    <div>
        <label for="duration">Duration:</label>
        <input type="text" name="duration" id="duration" value="{{ old('duration', $gig->duration) }}">
    </div>

    <div>
        <label for="application_deadline">Application Deadline:</label>
        <input type="date" name="application_deadline" id="application_deadline" value="{{ old('application_deadline', $gig->application_deadline->format('Y-m-d')) }}">
    </div>

    <div>
        <button type="submit">Update Gig</button>
    </div>
</form>
