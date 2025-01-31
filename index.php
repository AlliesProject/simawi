<?php
/**
 * CodeIgniter
 *
 * An open source application development framework for PHP
 *
 * @package    CodeIgniter
 * @author     EllisLab Dev Team
 * @license    https://opensource.org/licenses/MIT MIT License
 * @link       https://codeigniter.com
 * @since      Version 1.0.0
 */

// Set environment dari variabel server atau default ke 'production'
define('ENVIRONMENT', isset($_SERVER['CI_ENV']) ? $_SERVER['CI_ENV'] : 'production');

// Konfigurasi error reporting berdasarkan environment
switch (ENVIRONMENT) {
    case 'development':
        error_reporting(-1);
        ini_set('display_errors', 1);
        break;

    case 'testing':
    case 'production':
        ini_set('display_errors', 0);
        error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED & ~E_STRICT & ~E_USER_NOTICE & ~E_USER_DEPRECATED);
        break;

    default:
        header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
        echo 'The application environment is not set correctly.';
        exit(1);
}

// Pastikan path sistem dan aplikasi menggunakan __DIR__
$system_path = __DIR__ . '/system';
$application_folder = __DIR__ . '/application';
$view_folder = __DIR__ . '/application/views';

// Periksa apakah path `system` benar
if (!is_dir($system_path)) {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your system folder path does not appear to be set correctly.';
    exit(3);
}

// Definisi konstanta
define('SELF', pathinfo(__FILE__, PATHINFO_BASENAME));
define('BASEPATH', realpath($system_path) . DIRECTORY_SEPARATOR);
define('FCPATH', __DIR__ . DIRECTORY_SEPARATOR);
define('SYSDIR', basename(BASEPATH));

// Konfigurasi aplikasi
if (is_dir($application_folder)) {
    define('APPPATH', realpath($application_folder) . DIRECTORY_SEPARATOR);
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your application folder path does not appear to be set correctly.';
    exit(3);
}

// Konfigurasi views
if (is_dir($view_folder)) {
    define('VIEWPATH', realpath($view_folder) . DIRECTORY_SEPARATOR);
} else {
    header('HTTP/1.1 503 Service Unavailable.', TRUE, 503);
    echo 'Your view folder path does not appear to be set correctly.';
    exit(3);
}

// Load bootstrap CodeIgniter
require_once BASEPATH . 'core/CodeIgniter.php';
