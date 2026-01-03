<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Tailwind CSS -->
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <title>{{ $heading ?? 'Bank' }}</title>
</head>

<body class="min-h-full bg-gradient-to-b from-gray-600 to-black text-white antialiased">

    <x-navigation></x-navigation>
    
    {{ $slot }}
 
</body>

</html>