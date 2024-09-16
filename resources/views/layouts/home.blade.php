<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Document</title>
    @csrf
    @vite(['resources/css/status.css', 'resources/js/status.js'])
</head>
<body class="hold-transition sidebar-mini layout-fixed" data-panel-auto-height-mode="height">

@yield('content')

</body>
</html>
