<!DOCTYPE html>
<html>
<head>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    @livewireStyles

    <style>
        body {
            margin: 0;
            font-family: Arial, sans-serif;
            background: #f3f3f3;
        }

        .container {
            max-width: 1000px;
            margin: 40px auto;
            padding: 20px;
        }

        .card {
            background: white;
            padding: 20px;
            border: 1px solid #ddd;
        }
    </style>
</head>

<body>

    <div class="container">

        <div class="card">

            <livewire:data-table
                table="users"
                :columns="$columns"
            />

        </div>

    </div>

    @livewireScripts

</body>
</html>