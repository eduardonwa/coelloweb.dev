<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/eduardocoello/ghost.css">
    <title>Ghost Designer</title>
</head>
<body>
    <x-navbar>
    </x-navbar>

    <main class="content-grid">
        {{ $slot }}

        <x-footer>
        </x-footer>
    </main>

</body>
</html>
