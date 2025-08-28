<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="scroll-smooth">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $setting->site_name ?? 'Karang Taruna' }}</title>

    @vite('resources/css/app.css')

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"
        integrity="sha512-iBBXm8fW90+zY1fslJjR+j8gA/f6+y8pD7+KzJ+E6wW8wJ+J+A6l9l+zT8wP3D3D58C2vQ=="
        crossorigin="anonymous" />

    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.14.0/dist/cdn.min.js"></script>

    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js" defer></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            AOS.init();
        });
    </script>
    <style>
        [x-cloak] {
            display: none !important;
        }

        html,
        body {
            max-width: 100vw;
            overflow-x: hidden;
        }

        * {
            box-sizing: border-box;
        }
    </style>
</head>

<body class="bg-white text-gray-900 font-sans overflow-x-hidden">
    @include('landing-page.components._header', ['setting' => $setting])

    <main>
        @include('landing-page.components._hero', ['heroSection' => $heroSection])
        @include('landing-page.components._about', ['aboutSection' => $aboutSection])
        @include('landing-page.components._members', ['members' => $members])
        @include('landing-page.components._programs', ['programs' => $programs])
        @include('landing-page.components._galleries', ['galleries' => $galleries])
        @include('landing-page.components._news', ['news' => $news])
        @include('landing-page.components._contact', ['setting' => $setting])
    </main>

    @include('landing-page.components._footer', ['setting' => $setting])
</body>

</html>
