<?php
session_start();
if (isset($_SESSION['userData'])) {
    extract($_SESSION['userData']);
    print_r($_SESSION);

    if ($avatar !== null) {
        $avatar_url = "https://cdn.discordapp.com/avatars/$discord_id/$avatar.jpg";
    } else {
        $avatar_url = "https://cdn.discordapp.com/embed/avatars/0.png";
    }
}

session_destroy();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>discord authentication</title>
</head>

<body>
    <?php
    if (isset($_SESSION['userData'])) {
    ?>
        <img src='<?= $avatar_url ?>' />

    <?php
    } else {
    ?>
        <a href="https://discord.com/api/oauth2/authorize?client_id=1080072613830852678&redirect_uri=http%3A%2F%2Fformapedia.test%3A8888%2Fprocess-oauth.php&response_type=code&scope=email%20identify">Login to discord</a>
    <?php
    }
    ?>
</body>

</html>

<?php
