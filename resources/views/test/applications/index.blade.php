<head>
    <style>
        table, th, td {
            border: 1px solid;
            border-collapse: collapse;
        }
    </style>

    @livewireStyles

</head>

<body>
    <div>
        <p>My Applications</p>

        <!-- Student -->
        @if(auth()->user()->isStudent())
            <livewire:applications-list />
        @endif

        <!-- Provider -->
        @if(auth()->user()->isProvider())
            <livewire:gigs-list />
        @endif

    </div>

    @livewireScripts

</body>
