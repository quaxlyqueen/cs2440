<?php
class Robot
{
    private $model;
    private $color;
    private $os;
    private $image;
    private $size;
    private $laws;

    public function __construct($model, $color, $os, $image, $size, $laws = '')
    {
        $this->set_model($model);
        $this->set_color($color);
        $this->set_os($os);
        $this->set_image($image);
        $this->set_size($size);
        $this->set_laws($laws);
    }

    public function __toString()
    {
        $string = '
            <div class="row">
                <div class="column">
                    <img src="' . $this->get_image() . '">
                </div>
                <div class="column">
                    <p>Your ' . $this->get_size() . ' sized ' . $this->get_color() . ' <em>' . $this->get_model() . '</em> running <em>' . $this->get_os() . '</em> will be built shortly. Thank you.</p>
                </div>
            </div>
        ';

        $laws = $this->get_laws();
        if (!empty($laws)) {
            $string .= '
                <p>Your robot will obey the following laws:</p>
                <ul>
            ';

            for ($i = 0; $i < count($laws); $i++) {
                $l = '';
                switch ($i) {
                    case 0:
                        $l = 'First';
                        break;
                    case 1:
                        $l = 'Second';
                        break;
                    case 2:
                        $l = 'Third';
                        break;
                }
                $string .= '<li><strong>' . $l . ' Law:</strong>' . $laws[$i] . '</li>';
            }

            $string .= '
                </ul>
            ';
        } else {
            $string .= '<p>Your robot has no rules.</p>';
        }

        $string .= '
            <br>
            <br>
        ';

        return $string;
    }

    public function get_model()
    {
        return $this->model;
    }

    public function set_model($model)
    {
        $this->model = $model;
    }

    public function get_color()
    {
        return $this->color;
    }

    public function set_color($color)
    {
        $this->color = $color;
    }

    public function get_os()
    {
        return $this->os;
    }

    public function set_os($os)
    {
        $this->os = $os;
    }

    public function get_image()
    {
        return $this->image;
    }

    public function set_image($image)
    {
        $this->image = $image;
    }

    public function get_size()
    {
        return $this->size;
    }

    public function set_size($size)
    {
        $this->size = $size;
    }

    public function get_laws()
    {
        return $this->laws;
    }

    public function set_laws($laws)
    {
        $this->laws = $laws;
    }
}

$models = [
    'Sonny' => 'img/sonny.jpg',
    'Rosey' => 'img/rosey.jpeg',
    'SICO' => 'img/sico.jpeg',
    'Data' => 'img/data.jpeg',
    'Gort' => 'img/gort.png',
    'Wall-E' => 'img/walle.png',
    'Optimus Prime' => 'img/optimus.png',
    'Hal 9000' => 'img/hal.png',
    'Twiki' => 'img/twiki.jpg',
    'Bender' => 'img/bender.png',
    'Johnny 5' => 'img/johnny.png',
];

?>

<!doctype html>
<html lang="en">

<head>
    <title>Robot</title>
    <style>
        @font-face {
            font-family: 'Hack Nerd Font Mono';
            src: url('/includes/HackNerdFontMono-Regular.woff');
            font-weight: normal;
            font-style: normal;
        }

        * {
            padding: 0;
            margin: 0;
            font-family: 'Hack Nerd Font Mono', Hack, sans-serif;
        }

        body {
            background-color: #FED766;
        }

        h1 {
            font-size: 5vw;
            font-weight: 800;
            text-align: center;
            margin: 35px;
        }

        h3 {
            font-size: 3vw;
            font-weight: 600;
            text-align: center;
        }

        p,
        label,
        select,
        option,
        input {
            font-size: 1.75vw;
            margin: 15px;
        }

        li {
            font-size: 1.25vw;
            margin-left: 80px;
        }

        pre {
            font-size: 1vw;
            white-space: pre-wrap;
            word-wrap: break-word;
        }

        form {
            width: 90%;
            margin: 0 auto;
        }

        select,
        option {
            width: 300px;
            border: none;
            border-radius: 8px;
        }

        select {
            background-color: #F4F4F8;
        }

        input[type="submit"] {
            width: 80%;
            background-color: #2AB7CA;
            color: black;
            border-radius: 4px;
            border: none;
            padding: 5px 0px 5px 0px;
            transition-duration: 500ms;
        }

        input[type="submit"]:hover {
            background-color: #FED766;
        }

        input[type="radio"] {
            -webkit-appearance: none;
            appearance: none;
            background-color: #F4F4F8;
            margin: 0;

            font: inherit;
            color: #F4F4F8;
            width: 1.15em;
            height: 1.15em;
            border: 0.15em solid black;
            border-radius: 50%;

            margin-top: 1.5em;
            display: grid;
            place-content: center;
        }

        input[type="radio"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            border-radius: 50%;
            transform: scale(0);
            transition: 400ms transform ease-in-out;
            box-shadow: inset 1em 1em #FE4A49;
        }

        input[type="radio"]:checked::before {
            transform: scale(1);
        }

        input[type="checkbox"] {
            -webkit-appearance: none;
            appearance: none;
            background-color: #F4F4F8;
            margin: 0;

            font: inherit;
            color: #F4F4F8;
            width: 1.15em;
            height: 1.15em;
            border: 0.15em solid black;
            border-radius: 4px;

            margin-top: 1.5em;
            display: grid;
            place-content: center;
        }

        input[type="checkbox"]::before {
            content: "";
            width: 0.65em;
            height: 0.65em;
            transform: scale(0);
            transition: 400ms transform ease-in-out;
            box-shadow: inset 1em 1em #FE4A49;
        }

        input[type="checkbox"]:checked::before {
            transform: scale(1);
        }

        .card {
            padding: 50px;
            padding-bottom: 25px;
            width: 40%;
            margin: 0 auto;
            background-color: #E6E6EA;
            border-radius: 18px;
        }

        .column {
            display: flex;
            flex-direction: column;
        }

        .row {
            display: flex;
            flex-direction: row;
            width: 100%;
        }

        .center {
            align-items: center;
            justify-content: center;
        }


        .space_between {
            justify-content: space-between;
        }

        .tooltip {
            position: relative;
        }

        /* Tooltip text */
        .tooltip .tooltip_text {
            visibility: hidden;
            opacity: 0;
            width: 550px;
            background-color: black;
            color: #fff;
            text-align: center;
            padding: 5px 0;
            border-radius: 6px;

            /* Position the tooltip text - see examples below! */
            position: absolute;
            z-index: 1;
            top: -8px;
            left: 110%;

            pointer-events: none;

            transition: visibility 0s, opacity 1s linear;
        }

        /* Show the tooltip text when you mouse over the tooltip container */
        .tooltip:hover .tooltip_text {
            visibility: visible;
            opacity: 1;
        }

        img {
            width: 100%;
            min-width: 150px;
            height: auto;
        }
    </style>
</head>

<body>
    <h1>I, Object</h1>
    <?php
    if (!isset($_POST['model']))
        echo form($models);
    else
        echo message($models);
    ?>
</body>

</html>

<?php
function form($models)
{
    $colors = [
        'Shiny',
        'Chrome',
        'Silver',
        'Brass',
        'Gold',
    ];

    $oss = [
        'Linux',
        'Unix',
        'SPARC',
        'Binary',
        'DOS',
        'Tiny Hamsters',
    ];

    $laws = [
        'first' => 'A robot may not injure a human being or, through inaction, allow a human being to come to harm.',
        'second' => 'A robot must obey the orders given it by human beings except where such orders would conflict with the First Law.',
        'third' => 'A robot must protect its own existence as long as such protection does not conflict with the First or Second Law.',
    ];

    $form = '
    <div class="card">
        <form method="post" class="column center">
            <div class="row space_between">
                <label for="model">Model:</label>
                <select id="model" name="model" required>
    ';

    foreach (array_keys($models) as $m)
        $form .= '<option value="' . $m . '">' . ucwords($m) . '</option>';

    $form .= '
                </select>
            </div>

            <div class="row space_between">
                <label for="color">Color:</label>
                <select id="color" name="color" required>
    ';

    foreach ($colors as $c)
        $form .= '<option value="' . $c . '">' . ucwords($c) . '</option>';

    $form .= '
                </select>
            </div>

            <div class="row space_between">
                <label for="os">OS:</label>
                <select id="os" name="os" required>
    ';
    foreach ($oss as $o)
        $form .= '<option value="' . $o . '">' . ucwords($o) . '</option>';

    $form .= '
                </select>
            </div>

            <div class="row space_between">
                <div class="column">
                    <label>Size:</label>
                    <div class="row">
                        <input id="size_nano" type="radio" name="size" value="nano" required>
                        <label for="size_nano">Nano</label>
                    </div>
                    <div class="row">
                        <input id="size_normal" type="radio" name="size" value="normal" required>
                        <label for="size_normal">Normal</label>
                    </div>
                    <div class="row">
                        <input id="size_giant" type="radio" name="size" value="giant" required>
                        <label for="size_giant">Giant</label>
                    </div>
                </div>
                <div class="column">
                    <label>Asimov\'s Laws:</label>
    ';

    foreach ($laws as $key => $law) {
        $form .= '
                    <div class="row space_between tooltip">
                        <label for="' . $key . '_law">' . ucwords($key) . ' Law</label>
                        <input id="' . $key . '_law" type="checkbox" name="laws[]" value="' . $law . '">

                        <div class="tooltip_text">
                            <p>' . $law . '</p>
                        </div>
                    </div>
        ';
    }

    $form .= '
                </div>
            </div>

            <input type="submit" value="Build Robot">
        </form>
    </div>
    ';

    return $form;
}

function message($models)
{
    if (isset($_POST['model']) && isset($_POST['color']) && isset($_POST['os']) & isset($_POST['size']))
        $robot = new Robot($_POST['model'], $_POST['color'], $_POST['os'], $models[$_POST['model']], $_POST['size'], isset($_POST['laws']) ? $_POST['laws'] : '');

    if (!$robot)
        return form();

    ob_start();
    print_r($robot);
    $dump = ob_get_clean();

    $msg = '
        <div class="card">
            <h3>Processing...</h3>
            ' . $robot->__toString() . '
            <div class="column">
                <pre>
    ';

    $msg .= $dump;

    $msg .= '
                </pre>
            </div>
        </div>
    ';

    return $msg;
}
?>
