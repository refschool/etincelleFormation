<?php
$discord_url = "https://discord.com/api/oauth2/authorize?client_id=1080072613830852678&redirect_uri=http%3A%2F%2Fformapedia.test%3A8888%2Fprocess-oauth.php&response_type=code&scope=identify%20email";

header("Location: $discord_url");
exit();
