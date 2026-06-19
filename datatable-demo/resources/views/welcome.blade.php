<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @livewireStyles
</head>
<body class="bg-gray-50">

    <livewire:data-table
    table="users"
    :columns="$columns"
/>
    

    @livewireScripts
</body>
</html>