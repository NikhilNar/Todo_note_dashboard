<!doctype html>
<html lang="en">
<head>
    <title>jrDash</title>
    <link rel="stylesheet" href="<?=base_url()?>public/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="<?=base_url()?>public/css/style.css"/>
    <script src="<?=base_url()?>public/js/jquery.js"></script>
    <script src="<?=base_url()?>public/js/bootstrap.js"></script>
</head>
<body>
<nav class="navbar navbar-light bg-faded">
    <a class="navbar-brand" href="#">jrDash</a>
    <ul class="nav navbar-nav">
        <li class="nav-item active">
            <a class="nav-link" href="#">Dashboard <span class="sr-only">(current)</span></a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">User</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="<?=site_url("dashboard/logout")?>">Logout</a>
        </li>

</nav>
