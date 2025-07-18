
<?php

function base_url($path = "") {
    $protocol = isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== "off" ? 'https://' : 'http://';
    $host = $_SERVER['HTTP_HOST'];
    $baseUrl = $protocol . $host . "/" . PROJECT_DIR;
    return $baseUrl . "/" . ltrim($path, "/");

}


function base_path($path = "") {
    $rootpath = dirname(__DIR__) . DIRECTORY_SEPARATOR . PROJECT_DIR;
    return $rootpath . DIRECTORY_SEPARATOR . ltrim($path, DIRECTORY_SEPARATOR);
}


function uploads_path($filename = "") {
    return base_path('uploads' . DIRECTORY_SEPARATOR . $filename);
    
}

function uploads_url($filename = "") {
    return base_url('uploads/') . ltrim($filename, "/");
    
}

function asset_url($path = "") {
    return base_url('assets/') . ltrim($path, "/");
}

function redirect($url) {
    header('Location: ' . base_url($url));
}


function isPostRequest() {
    return $_SERVER["REQUEST_METHOD"] === 'POST';   
    
}

function getPostData($field, $default = null) {
    return isset($_POST[$field]) ? trim($_POST[$field]) : $default;
}


function formatDate($date) {

    return date('F j, Y', strtotime($date));
}

function isUserLoggedIn() {
    if(isset($_SESSION['user_id'])) {
        return true;
    } else {
        return false;
    }
}




//changes://

function checkUserLoggedIn() {
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    if(!isset($_SESSION['user_id'])) {
        redirect("login.php");
    }
}
