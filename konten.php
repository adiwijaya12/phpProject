<?php
    $halaman = isset($_GET['page']) ? $_GET['page'] : '';

    switch ($halaman) {
        case '':
            include 'view/home.php';
            break;
        case 'home':
            include 'view/home.php';
            break;
        case 'about':
            include 'view/about.php';
            break;
        case 'bussines':
            include 'view/bussines.php';
            break;
        case 'investor':
            include 'view/investor.php';
            break;
        case 'carier':
            include 'view/carier.php';
            break;
        case 'contact':
            include 'view/contact.php';
            break;
        case 'register':
            include 'view/register.php';
            break;
        case 'login':
            include 'view/login.php';
            break;
        case 'act-register':
            include 'modul/act-register.php';
            break;
        case 'act-login':
        include 'modul/act-login.php';
        break;
        case 'act-logout':
            include 'modul/act-logout.php';
            break;



        default:
            include 'view/404.php';
            break;
    }
?>