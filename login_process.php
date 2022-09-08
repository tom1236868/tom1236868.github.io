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
    if (!isset($_SESSION['Accounts_Email']) OR !isset($_SESSION['Accounts_Name'])) {
        header('Location: index.php');
    }
    if (!isset($_SESSION['Accounts_Email'][$_POST['inputID']]) OR !isset($_SESSION['Accounts_Name'][$_POST['inputID']])){
        header('Location: signin.php');
    }
    if ($_SESSION['Accounts_Email'][$_POST['inputID']] != $_POST['inputEmail']){
        header('Location: signin.php');
    }
    $_SESSION['ID'] = $_POST['inputID'];
    $_SESSION['Username'] = $_SESSION['Accounts_Name'][$_POST['inputID']];
    $_SESSION['Email'] = $_SESSION['Accounts_Email'][$_POST['inputID']];
    $_SESSION['Age'] = $_SESSION['Accounts_Age'][$_POST['inputID']];
    header('Location: index.php');
    ?>
</body>

</html>