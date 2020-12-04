<?php
include 'databaseConnect.php';
include_once 'controller.php';
session_start();
ModeloUserDB::init();

if (!isset($_SESSION['user'])) {
    CtlLogin();
} else {
 header("location:index_menu.php");
}
