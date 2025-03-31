<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

session_start();

if (!isset($_GET['code'])) {
    // header('Location: http://localhost:9753');
    header('Location: https://login.joshashton.dev');
    exit;
}

$client_id = $_ENV['SPOTIFY_CLIENT_ID'];
$client_secret = $_ENV['SPOTIFY_CLIENT_SECRET'];
$_SESSION['code'] = $_GET['code'];
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Favorite Albums</title>
    <link rel="stylesheet" href="music/css/styles.css" type="text/css">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="music/js/switch.js"></script>
</head>

<body>
    <?php get_songs($_SESSION['code'], $client_id, $client_secret); ?>
</body>

</html>

<?php
function get_access_token($auth_code, $client_id, $client_secret)
{
    $url = 'https://accounts.spotify.com/api/token';

    $data = array(
        'grant_type' => 'authorization_code',
        'code' => $auth_code,
        // 'redirect_uri' => 'http://localhost/music/explore'
        'redirect_uri' => 'https://cs2440.joshashton.dev/music/explore'
    );

    $client_info = base64_encode("$client_id:$client_secret");
    $post_data = http_build_query($data);

    $ch = curl_init($url);

    curl_setopt_array($ch, array(
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Basic $client_info",
            'Content-Type: application/x-www-form-urlencoded'
        ),
        CURLOPT_POSTFIELDS => $post_data
    ));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        $data = json_decode($response, true);
        curl_close($ch);
        return $data['access_token'];
    }

    curl_close($ch);
}

function get_songs($auth_code, $client_id, $client_secret)
{
    if ($_SESSION['data'] == null) {
        $access_token = get_access_token($auth_code, $client_id, $client_secret);
        $url = 'https://api.spotify.com/v1/me/top/tracks?time_range=long_term';

        $ch = curl_init($url);

        curl_setopt_array($ch, array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array(
                "Authorization: Bearer $access_token"
            )
        ));

        $response = curl_exec($ch);

        if (curl_errno($ch)) {
            echo curl_error($ch);
            return;
        } else {
            $data = json_decode($response, true);
            $top_songs = $data['items'];
        }
        curl_close($ch);

        $song_data = [];
        foreach ($top_songs as $song) {
            $song_data[] = array(
                'image' => $song['album']['images'][0]['url'],
                'song_name' => $song['name'],
                'song_id' => $song['id'],
                'album_name' => $song['album']['name'],
                'album_id' => $song['album']['id'],
                'artist' => $song['artists'][0]['name'],
                'artist_id' => $song['artists'][0]['id'],
            );
        }

        $_SESSION['data'] = $song_data;
    } else {
        $song_data = $_SESSION['data'];
    }

    echo '<div class="center">';
    echo '<h1>Your Favorite Songs</h1>';
    echo '<div id="songs">';
    foreach ($song_data as $s) {
        echo '
            <div class="song_card center">
                <img src="' . $s['image'] . '">
                <h3><a target="_blank" href="https://open.spotify.com/track/' . $s['song_id'] . '">' . $s['song_name'] . '</a></h3>
                <h4><a target="_blank" href="https://open.spotify.com/artist/' . $s['artist_id'] . '">' . $s['artist'] . '</a></h4>
                <h5><a target="_blank" href="https://open.spotify.com/album/' . $s['album_id'] . '">' . $s['album_name'] . '</a></h5>
            </div>
        ';
    }
    echo '</div>';
    echo '</div>';
}
?>
