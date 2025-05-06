<?php
session_start();
header("Content-Security-Policy: default-src 'self'; font-src 'self' https://www.nerdfonts.com/assets/fonts/Symbols-2048-em%20Nerd%20Font%20Complete.woff2; style-src 'self' 'unsafe-inline' https://nerdfonts.com/assets/css/webfont.css https://www.nerdfonts.com/assets/css/webfont.css; script-src 'self' 'unsafe-inline'; img-src 'self';");

// Initialize Composer.
require_once 'vendor/autoload.php';
require_once 'functions/base.php';

// Load environment variables.
$dotenv = Dotenv\Dotenv::createImmutable('/home/prod/cs2440/catalog');
$dotenv->safeLoad();

require_once 'functions/db.php';

if (isset($_SESSION['id']))
    if (!isset($_SESSION['cart']))
        $_SESSION['cart'] = [];
