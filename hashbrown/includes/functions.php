<?php
// Use environment variables for the database password and IP address.
$db_pass = $_ENV['DATABASE_PASSWORD'];
$ip_addr = $_ENV['IP_ADDRESS'];

if ($_SERVER['HTTP_HOST'] == 'localhost:2440') {
    define('HOST', 'localhost');
    define('USER', 'root');
    define('PASS', $db_pass);
    define('DB', 'secureusers');
} else {
    define('HOST', $ip_addr);
    define('USER', 'root');
    define('PASS', $db_pass);
    define('DB', 'secureusers');
}

function table_from_file($file)
{
    $file = 'includes/' . $file;
    $fs = fopen($file, 'r');
    $string = fread($fs, filesize($file));
    $values = explode('||>><<||', $string);

    $table = '
        <div class="card center">
            <table class="center">
            <tr>
                <th>Agent</th>
                <th>Codename</th>
            </tr>
    ';

    foreach ($values as $v) {
        list($a, $b) = explode(',', $v);

        $table .= '
                <tr>
                    <td>' . ucfirst($a) . '</td>
                    <td>' . ucwords($b) . '</td>
                </tr>
            ';
    }
    $table .= '</div></table>';

    return $table;
}

function salt_and_hash($pw)
{
    $salt = 'fdiojhlkjasdfjh';
    $o_salt = 'qwelnbfnvaslkfj';

    $pw = $salt . $pw . $o_salt;
    return hash('sha512', $pw);
}

function increment_login_count($id)
{
    p_query('UPDATE users SET login_count = login_count + 1 WHERE id = ?', 'i', $id);
}

function auth_user($username, $password)
{
    $results = p_query('SELECT id, password FROM users WHERE username = ?', 's', $_POST['username'])->fetch_assoc();

    if (!$results) {
        return '
            <div class="card error">
                <p>Username or Password is incorrect!</p>
            </div>
        ';
    } else {
        if ($results['password'] == salt_and_hash($password)) {
            $_SESSION['hashbrown_access'] = true;
            $_SESSION['username'] = $username;
            increment_login_count($results['id']);
            return true;
        } else {
            if (isset($_SESSION['login_attempts']))
                $_SESSION['login_attempts']++;
            else
                $_SESSION['login_attempts'] = 1;

            if ($_SESSION['login_attempts'] >= 3) {
                return '
                    <div class="card error">
                        <p>Reached 3+ failed login attempts!</p>
                    </div>
                ';
            } else {
                return '
                    <div class="card error">
                        <p>Username or Password is incorrect!</p>
                    </div>
                ';
            }
        }
    }
}

function create_user($username, $password, $v_password)
{
    if ($password != $v_password) {
        return '
            <div class="card error">
                <p>Passwords do not match!</p>
            </div>
        ';
    }

    $exists = p_query('SELECT username FROM users WHERE username = ?', 's', $username)->fetch_assoc();
    if ($exists) {
        return '
            <div class="card error">
                <p>Username is taken!</p>
            </div>
        ';
    }

    $user = p_query('INSERT INTO users (username, password) VALUES (?, ?)', 'ss', $username, salt_and_hash($password));
    if (!$user) {
        return '
            <div class="card error">
                <p>Unable to create user!</p>
            </div>
        ';
    }

    return true;
}

function logout()
{
    foreach (array_keys($_SESSION) as $key)
        unset($_SESSION[$key]);

    header('Location: .');
}

function get_user_image()
{
    $result = p_query('SELECT image_path FROM users WHERE username = ?', 's', $_SESSION['username'])->fetch_assoc();
    return 'img/' . $result['image_path'];
}

function update_user_pw($password, $v_password)
{
    if ($password != $v_password) {
        return '
            <div class="card error">
                <p>Passwords do not match!</p>
            </div>
        ';
    }

    $result = p_query('UPDATE users SET password = ? WHERE username = ?', 'ss', salt_and_hash($password), $_SESSION['username']);
    if ($result) {
        return true;
    } else {
        return false;
    }
}

function query($stmt)
{
    $conn = new mysqli(HOST, USER, PASS, DB);
    $result = $conn->query($stmt);
    if ($result)
        return $result;
    else
        return mysqli_insert_id($conn);
}

function p_query($stmt, $types, ...$args)
{
    $conn = new mysqli(HOST, USER, PASS, DB);

    $stmt = $conn->prepare($stmt);
    $stmt->bind_param($types, ...$args);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result)
        return $result;
    else
        return mysqli_insert_id($conn);
}

function pretty_dump($arg)
{
    echo '<pre>';
    print_r($arg);
    echo '</pre>';
}
