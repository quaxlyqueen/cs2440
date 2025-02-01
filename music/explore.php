<?php
require_once 'vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
$html = '';

$client_id = $_ENV['SPOTIFY_CLIENT_ID'];
$client_secret = $_ENV['SPOTIFY_CLIENT_SECRET'];
$access_token = get_access_token($client_id, $client_secret);

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

$content = '';
foreach ($albums as $album_id) {
    $data = get_album($access_token, $album_id);
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

function get_access_token($client_id, $client_secret)
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

function get_album($access_token, $album_id)
{
    $url = 'https://api.spotify.com/v1/albums/' . $album_id;

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
    } else {
        $data = json_decode($response, true);
        return $data;
    }

    curl_close($ch);
}

echo $html;
?>
