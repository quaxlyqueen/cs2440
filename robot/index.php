<?php
class Robot
{
    private $model;
    private $color;
    private $os;

    public function __construct($model, $color, $os)
    {
        $this->set_model($model);
        $this->set_color($color);
        $this->set_os($os);
    }

    public function __toString()
    {
        return '<p>Your ' . $this->get_color() . ' <em>' . $this->get_model() . '</em> running <em>' . $this->get_os() . '</em> will be built shortly. Thank you.</p>';
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
}

?>

<!doctype html>
<html lang="en">

<head>
    <title>Robot</title>
    <link href="css/styles.css" type="text/css" rel="stylesheet">
    <script src="js/index.js"></script>
</head>

<body>
    <h1>I, Object</h1>

    <?php
    if (!isset($_POST['model']))
        echo form();
    else
        echo message();
    ?>
</body>

</html>

<?php
function form()
{
    $models = [
        'Sonny',
        'Rosey',
        'SICO',
        'Data',
        'Gort',
        'Wall-E',
        'Optimus Prime',
        'Hal 9000',
        'Twiki',
        'Bender',
        'Johnny 5',
    ];

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

    $form = '
    <div class="card">
        <form method="post">
                <label for="model">Model:</label>
                <select id="model" name="model" required>
    ';

    foreach ($models as $m)
        $form .= '<option value="' . $m . '">' . ucwords($m) . '</option>';

    $form .= '
                </select>

                <label for="color">Color:</label>
                <select id="color" name="color" required>
    ';

    foreach ($colors as $c)
        $form .= '<option value="' . $c . '">' . ucwords($c) . '</option>';

    $form .= '
                </select>

                <label for="os">OS:</label>
                <select id="os" name="os" required>
    ';
    foreach ($oss as $o)
        $form .= '<option value="' . $o . '">' . ucwords($o) . '</option>';

    $form .= '
                </select>

            <input type="submit" value="Build Robot">
        </form>
    </div>
    ';

    return $form;
}

function message()
{
    if (isset($_POST['model']) && isset($_POST['color']) && isset($_POST['os']))
        $robot = new Robot($_POST['model'], $_POST['color'], $_POST['os']);

    if (!$robot)
        return form();

    ob_start();
    print_r($robot);
    $dump = ob_get_clean();

    $msg = '
        <div class="card">
            <h3>Processing...</h3>
            ' . $robot->__toString() . '
            <pre>
    ';

    $msg .= $dump;

    $msg .= '
            </pre>
        </div>
    ';

    return $msg;
}
?>
