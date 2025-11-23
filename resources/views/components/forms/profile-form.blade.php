{{-- resources/views/components/forms/profile-form.blade.php --}}

<div class="bg-white shadow-xl rounded-lg p-6 lg:p-8 max-w-4xl mx-auto">
    <h2 class="text-2xl font-bold text-gray-800 mb-6 border-b pb-2">Personal Profile</h2>

    <button class="text-indigo-600 font-semibold hover:text-indigo-800 mb-6">✏️ Edit Profile</button>

    {{-- Section 1: Personal Information --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-3">1. Personal Information</h3>
        <div class="grid grid-cols-2 gap-4 text-sm text-gray-600">
            <p><strong>Full Name:</strong> Angela Chepngeno Kosgei</p>
            <p><strong>University:</strong> Strathmore University</p>
            <p><strong>Year of Study:</strong> 2nd year</p>
            <p><strong>Field of Study:</strong> Computer Science</p>
            <p><strong>Phone Number:</strong> +254111111123</p>
            <p><strong>Location:</strong> Nairobi, Kenya</p>
        </div>
    </div>
    
    {{-- Section 2: Skills and Interests --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 border-t pt-4">2. Skills and Interests</h3>
        <div class="text-sm text-gray-600">
            <p><strong>Skills:</strong> Tutoring, Graphic Design, Data Entry</p>
            <p><strong>Interests:</strong> Creative gigs, Tech gigs, Academic Help</p>
            <p><strong>Uploads and links:</strong> <a href="https://github.com" class="text-indigo-600 underline">github.com</a></p>
        </div>
    </div>
    
    {{-- Section 3: Experience (Simplified) --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 border-t pt-4">3. Experience</h3>
        <div class="text-sm text-gray-600">
            <p><strong>Experience:</strong> Present</p>
            <p><strong>Description:</strong> Worked as an assistant at...</p>
            <p><strong>Uploads and links:</strong> <a href="#" class="text-indigo-600 underline">uploads.docx</a></p>
        </div>
    </div>

    {{-- Section 4: Availability --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 border-t pt-4">4. Availability</h3>
        <div class="text-sm text-gray-600">
            <p><strong>Remote work:</strong> Yes</p>
            <p><strong>Physical jobs:</strong> Yes</p>
            <p><strong>Preferred work time:</strong> Weekdays, Weekends, Evenings</p>
        </div>
    </div>

    {{-- Section 5: About You --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 border-t pt-4">5. About You</h3>
        <p class="text-sm text-gray-600 italic">
            Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent faucibus, arcu sed dictum pharetra, enim lorem egestas risus, sed maximus elit libero eu justo. 
            Vestibulum porttitor, lectus lobortis aliquam gravida, leo sapien dictum ipsum a sit ha a more-or less normal.
        </p>
    </div>

    {{-- Section 6: CV Upload (optional) --}}
    <div class="mb-8">
        <h3 class="text-xl font-semibold text-gray-700 mb-3 border-t pt-4">6. CV Upload (optional)</h3>
        <p class="text-sm text-gray-600">
            Uploads and links: <a href="#" class="text-indigo-600 underline">uploads.docx</a>
        </p>
    </div>
</div>