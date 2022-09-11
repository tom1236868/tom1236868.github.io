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
    $_SESSION['Accounts_Name'][$_POST['ID']] = $_POST['Username'];
    $_SESSION['Accounts_Email'][$_POST['ID']] = $_POST['Email'];

    $date = new DateTime($_POST['birthday']);
    $now = new DateTime();
    $age = $now->diff($date);

    $_SESSION['Accounts_Age'][$_POST['ID']] = $age->y;
    header('Location: signin.php');
    ?>
</body>

</html>