<?php

namespace App\Controllers;

use App\Core\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        if (!isset($_SESSION['user'])) {
            header('Location: '.BASE_URL.'signin');
            exit;
        }

        $title = "Dashboard - Health North";
        $desc = "Dashboard - Health North";

        View::render('dashboard/dashboard', compact('title', 'desc'));

    }
}