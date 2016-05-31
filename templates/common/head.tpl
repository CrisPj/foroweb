<!doctype html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>ForoWeb</title>
    {*<link rel="stylesheet" href="css/bootstrap.min.css">*}
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="assets/css/bootstrap_custom.css">
    <link rel="stylesheet" href="assets/css/custom.min.css">
</head>
<body>
{if isset($error)}
{/if}
{if isset($bien)}
    <script>
        alert('{$bien}');
        </script>
{/if}
