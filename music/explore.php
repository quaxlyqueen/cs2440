<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
$html = '';

$client_id = $_ENV['SPOTIFY_CLIENT_ID'];
$client_secret = $_ENV['SPOTIFY_CLIENT_SECRET'];
$auth_code = $_GET['code'];

$client_credentials = get_client_credentials($client_id, $client_secret);

// TODO: Dynamically retrieve top 10 albums from Spotify API
// TODO: Implement server-side caching for faster load times.
$albums = [
    '2FQieUp8BxPN7OR8fE76TE',
    '5mUo2e4QpUA7NJl2t51uFu',
    '7ycBtnsMtyVbbwTfJwRjSP',
    '2ZytN2cY4Zjrr9ukb2rqTP',
    '4ZDBQSIDIZRUBOG2OHcN3T',
    '1FHREwXgTQvqiG8q5KlRzc',
    '1MmVkhiwTH0BkNOU3nw5d3',
    '79dL7FLiJFOO0EoehUHQBv',
    '35qVMfUfBN6q2xzm9rZn5a',
    '2eQMC9nJE3f3hCNKlYYHL1'
];

shuffle($albums);

$content = '';
foreach ($albums as $album_id) {
    $data = get_album($client_credentials, $album_id);
    $content = $content . '<tr>
    <td><img src="' . $data['images'][0]['url'] . '" /></td>
    <td>' . $data['name'] . '</td>
    <td>' . $data['artists'][0]['name'] . '</td>
    <td><a href="' . $data['external_urls']['spotify'] . '" target="_blank">Spotify</a></td>
    </tr>';
}

$html = '
<table>
<tr>
<th>Art</th>
<th>Name</th>
<th>Artist</th>
<th>Spotify</th>
</tr>' . $content . '</table>';

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
        'redirect_uri' => 'http://localhost/music'
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
    $access_token = get_access_token($auth_code, $client_id, $client_secret);
    $url = 'https://api.spotify.com/v1/me/top/tracks';

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

get_albums($auth_code, $client_id, $client_secret);
// echo $html;
?>
