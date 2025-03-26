<?php
ob_start(); // Start output buffering
session_start();
use App\Shiping;
use Database\DatabaseManager;
use Database\MigrationManager;
use App\User;
use App\Product;
use App\Order;
use App\Category;
use App\Payment;
use App\Blogs;
use App\Comment;
use App\Slider;
require_once "../inc/header.php";
require_once "../routes/web.php";

MigrationManager::runMigrations();
DatabaseManager::initialize();











require_once "../inc/footer.php";

