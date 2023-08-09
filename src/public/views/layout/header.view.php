<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@1/css/pico.classless.min.css">
</head>
<body>
<header>

    <h1><?php if (empty($_SESSION)){ echo $_SESSION['username'];} ?></h1>

    <nav>
        <ul>
            <li>
                <a href="/">Worshop Classic Models</a>
            </li>
            <?php  if (empty($_SESSION)): ?>
            <li>
                <a href="register.php">Register</a>
            </li>
            <?php else: ?>
            <li>
                <a href="logout.php">Logout</a>
            </li>
            <?php endif; ?>

        </ul>
    </nav>
</header>
<main>

