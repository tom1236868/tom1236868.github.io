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
    if (! isset($_SESSION['Username'])) {
        header('Location: reg.php');
    }
    else{
        header('Location: signup.php');
    }
    ?>
</body>

</html>