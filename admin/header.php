<?php require_once __DIR__ . '/../backend/utils/auth.php'; check_auth('admin'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; }
        .sidebar {
            position: fixed; top: 0; left: 0; bottom: 0; width: 250px; padding: 20px;
            background-color: #343a40; color: #fff;
        }
        .main-content { margin-left: 250px; padding: 20px; }
        .sidebar a { color: #adb5bd; text-decoration: none; display: block; padding: 10px; border-radius: 5px; }
        .sidebar a:hover, .sidebar a.active { background-color: #495057; color: #fff; }
    </style>
</head>
<body>
<div class="sidebar">
    <h3 class="mb-4">Admin</h3>
    <nav class="nav flex-column">
        <a class="nav-link" href="/public/index.php" target="_blank">View Site</a>
        <a class="nav-link mt-auto" href="/public/logout.php">Logout</a>
    </nav>
</div>
<div class="main-content">
