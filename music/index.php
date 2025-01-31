<?php
require_once 'vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();

$client_id = $_ENV['SPOTIFY_CLIENT_ID'];
$client_secret = $_ENV['SPOTIFY_CLIENT_SECRET'];
$access_token = get_access_token($client_id, $client_secret);

// TODO: Dynamically retrieve top 10 albums from Spotify API
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
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Favorite Albums</title>
  <link rel="stylesheet" href="css/styles.css" type="text/css">
</head>

<body>
  <h1>My Favorite Albums</h1>
<table>
<tr>
  <th>Art</th>
  <th>Name</th>
  <th>Artist</th>
  <th>Spotify</th>
</tr>
<?php
foreach ($albums as $album_id) {
    $data = get_album($access_token, $album_id);
    echo '<tr>';
    echo '<td><img src="' . $data['images'][0]['url'] . '" /></td>';
    echo '<td>' . $data['name'] . '</td>';
    echo '<td>' . $data['artists'][0]['name'] . '</td>';
    echo '<td><a href="' . $data['external_urls']['spotify'] . '" target="_blank">Spotify</a></td>';
    echo '</tr>';
}
?>
</table>
</body>


</html>
<?php
function get_access_token($client_id, $client_secret)
{
    $url = 'https://accounts.spotify.com/api/token';

    $data = array(
        'grant_type' => 'client_credentials',
        'client_id' => $client_id,  // Replace with your actual client ID
        'client_secret' => $client_secret  // Replace with your actual client secret
    );

    $post_data = http_build_query($data);  // Build the URL-encoded string

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
        $data = json_decode($response, true);  // Decode into an associative array
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
        CURLOPT_RETURNTRANSFER => true,  // Return the response as a string
        CURLOPT_HTTPHEADER => array(
            "Authorization: Bearer $access_token"  // Your Bearer token here
        )
    ));

    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        echo curl_error($ch);
    } else {
        $data = json_decode($response, true);  // Decode into an associative array
        return $data;
    }

    curl_close($ch);
}
?>
