<?php
$albums = [
    array('name' => 'Abyss', 'artist' => 'Pastel Ghost', 'link' => 'https://open.spotify.com/album/2FQieUp8BxPN7OR8fE76TE'),
    array('name' => 'Golden Age - The 4th Album', 'artist' => 'NCT 127', 'link' => 'https://open.spotify.com/album/5mUo2e4QpUA7NJl2t51uFu'),
    array('name' => 'To Pimp a Butterfly', 'artist' => 'Kendrick Lamar', 'link' => 'https://open.spotify.com/album/7ycBtnsMtyVbbwTfJwRjSP'),
    array('name' => 'Off the Wall', 'artist' => 'Michael Jackson', 'link' => 'https://open.spotify.com/album/2ZytN2cY4Zjrr9ukb2rqTP'),
    array('name' => 'Vol. 3: The Subliminal Verses', 'artist' => 'Slipknot', 'link' => 'https://open.spotify.com/album/4ZDBQSIDIZRUBOG2OHcN3T'),
    array('name' => 'Этажи', 'artist' => 'Molchat Doma', 'link' => 'https://open.spotify.com/album/1FHREwXgTQvqiG8q5KlRzc'),
    array('name' => 'Hot Pink', 'artist' => 'Doja Cat', 'link' => 'https://open.spotify.com/album/1MmVkhiwTH0BkNOU3nw5d3'),
    array('name' => 'Currents', 'artist' => 'Tame Impala', 'link' => 'https://open.spotify.com/album/79dL7FLiJFOO0EoehUHQBv'),
    array('name' => 'INSIDE', 'artist' => 'Bo Burnham', 'link' => 'https://open.spotify.com/album/35qVMfUfBN6q2xzm9rZn5a'),
    array('name' => 'Teenage Dream', 'artist' => 'Katy Perry', 'link' => 'https://open.spotify.com/album/2eQMC9nJE3f3hCNKlYYHL1'),
];
shuffle($albums);

$content = '';
foreach ($albums as $album) {
    $content = $content . '
        <tr>
            <td><a style="color: black" href="' . $album['link'] . '" target="_blank">' . $album['name'] . '</a></td>
            <td>' . $album['artist'] . '</td>
        </tr>';
}

$html = '
    <h1>My Favorite Albums</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Artist</th>
        </tr>
        ' . $content . '
    </table>
    ';

echo $html;
?>
