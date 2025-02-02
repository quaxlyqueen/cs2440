<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

session_start();
$client_id = $_ENV['SPOTIFY_CLIENT_ID'];
$client_secret = $_ENV['SPOTIFY_CLIENT_SECRET'];
$_SESSION['auth_code'] = $_GET['code'];

$client_credentials = get_client_credentials($client_id, $client_secret);

function get_client_credentials($client_id, $client_secret)
{
    $url = 'https://accounts.spotify.com/api/token';

    $data = array(
        'grant_type' => 'client_credentials',
        'client_id' => $client_id,
        'client_secret' => $client_secret
    );

    $post_data = http_build_query($data);

    $ch = curl_init($url);

    curl_setopt_array($ch, array(
        CURLOPT_POST => true,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
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

function get_album($client_credentials, $album_id)
{
    $url = 'https://api.spotify.com/v1/albums/' . $album_id;

    $ch = curl_init($url);

    curl_setopt_array($ch, array(
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $client_credentials"
        )
    ));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        $data = json_decode($response, true);
        return $data;
    }

    curl_close($ch);
}

function get_access_token($auth_code, $client_id, $client_secret)
{
    $url = 'https://accounts.spotify.com/api/token';

    $data = array(
        'grant_type' => 'authorization_code',
        'code' => $auth_code,
        'redirect_uri' => 'https://cs2440.joshashton.dev/music'
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

function get_albums($auth_code, $client_id, $client_secret)
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
            );
        }

        $_SESSION['data'] = $song_data;
    } else {
        $song_data = $_SESSION['data'];
    }

    foreach ($song_data as $s) {
        echo '
            <img src="' . $s['image'] . '">
            <h3>Name: ' . $s['song_name'] . ' - ' . $s['artist'] . '</h3>
            <h4>Album: ' . $s['album_name'] . '</h4>
            <h6>Song ID: ' . $s['song_id'] . '</h6>
            <h6>Album ID: ' . $s['album_id'] . '</h6>
        ';
    }
}

get_albums($_SESSION['auth_code'], $client_id, $client_secret);
?>
