<?php
require_once(__DIR__ . "/../lib/functions.php");
//Note: this is to resolve cookie issues with port numbers
$domain = $_SERVER["HTTP_HOST"];
if (strpos($domain, ":")) {
    $domain = explode(":", $domain)[0];
}
$localWorks = true; //some people have issues with localhost for the cookie params
//if you're one of those people make this false

//this is an extra condition added to "resolve" the localhost issue for the session cookie
if (($localWorks && $domain == "localhost") || $domain != "localhost") {
    session_set_cookie_params([
        "lifetime" => 60 * 60,
        "path" => "$BASE_PATH",
        //"domain" => $_SERVER["HTTP_HOST"] || "localhost",
        "domain" => $domain,
        "secure" => true,
        "httponly" => true,
        "samesite" => "lax"
    ]);
}
session_start();


?>
<!-- include bootstrap css and js references -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

<!-- include css and js files -->
<link rel="stylesheet" href="<?php echo get_url('styles.css'); ?>">
<script src="<?php echo get_url('helpers.js'); ?>"></script>
<nav class="navbar navbar-expand-sm">
    <ul class="navbar-nav align-items-center mt-1">
        <li class="navbar-brand">Soccer Scores</li>
        <?php if (is_logged_in()) : ?>
            <li class="nav-item"><a href="<?php echo get_url('home.php'); ?>">Home</a></li>
            <li class="nav-item"><a href="<?php echo get_url('profile.php'); ?>">Profile</a></li>
            <li class="nav-item"><a href="<?php echo get_url('matches.php'); ?>">Matches</a></li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Favorites</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo get_url('favoriteTeams.php'); ?>">Teams</a>
                    <a class="dropdown-item" href="<?php echo get_url('favoriteChampionships.php'); ?>">Championships</a>
                </div>
            </li>
        <?php endif; ?>
        <?php if (!is_logged_in()) : ?>
            <li class="nav-item"><a href="<?php echo get_url('login.php'); ?>">Login</a></li>
            <li class="nav-item"><a href="<?php echo get_url('register.php'); ?>">Register</a></li>
        <?php endif; ?>
        <?php if (has_role("Admin")) : ?>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="adminDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Admin</a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="<?php echo get_url('admin/create_role.php'); ?>">Create Role</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/list_roles.php'); ?>">List Roles</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/assign_roles.php'); ?>">Assign Roles</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/update_data.php'); ?>">Update API Data</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/unassociated_teams.php'); ?>">Unassociated Teams</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/unassociated_championships.php'); ?>">Unassociated Championships</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/all_favorite_teams.php'); ?>">All Favorite Teams</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/all_favorite_championships.php'); ?>">All Favorite Championships</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/assign_favorite_teams.php'); ?>">Assign Favorite Teams</a>
                    <a class="dropdown-item" href="<?php echo get_url('admin/assign_favorite_championships.php'); ?>">Assign Favorite Championships</a>
                </div>
            </li>
            
        <?php endif; ?>
        <?php if (has_role("Admin") || has_role("Creator")) : ?>
            <li class="nav-item"><a href="<?php echo get_url('creator/add_match.php'); ?>">Create Match</a></li>
        <?php endif; ?>
        <?php if (is_logged_in()) : ?>
            <li class="nav-item"><a href="<?php echo get_url('logout.php'); ?>">Logout</a></li>
        <?php endif; ?>
    </ul>
</nav>