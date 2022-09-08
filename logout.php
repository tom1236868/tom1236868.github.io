<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Processing...</title>

</head>

<body class="text-center">
    <?php
    session_start();
    session_destroy();
    header('Location: index.php');
    ?>
</body>

</html>