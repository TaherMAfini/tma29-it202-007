<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

$users = [];
$teams = [];

if(isset($_POST["username"]) && empty($_POST["username"])){
    flash("Username cannot be empty", "warning");
}

if(isset($_POST["team"]) && empty($_POST["team"])){
    flash("Team cannot be empty", "warning");
}

$username = se($_POST, "username", "", false);
$team = se($_POST, "team", "", false);

?>
<div class="container-fluid">

    <h1>Assign Favorite Teams</h1>

    <form method="POST" class="list-filter mt-5">
        <div class="team-filter">
            <label class="form-label" for="username"><h4>Username</h4></label>
            <input class="form-control w-50" type="text" name="username" value="<?php se($username) ?>" />
        </div>
        <div class="team-filter">
            <label class="form-label" for="team"><h4>Team</h4></label>
            <input class="form-control w-50" type="text" name="team" id="team" value=<?php se($team) ?>>
        </div>
        <?php render_button(["type"=>"submit", "text"=>"Search"]); ?>
    </form>

    <?php if ($username !== "" && $team !== "") : ?>
    <form method="POST">
        <?php if (isset($username) && !empty($username)) : ?>
            <input type="hidden" name="username" value="<?php se($username, false); ?>" />
            <input type="hidden" name="team" value="<?php se($team, false); ?>" />
        <?php endif; ?>
        <table class="table table-secondary">
            <thead>
                <th>Users</th>
                <th>Teams to Favorite</th>
            </thead>
            <tbody>
                <tr>
                    <td class="col-6">
                    </td>
                    <td class="col-6">
                    </td>
                </tr>
            </tbody>
        </table>
        <?php render_button(["type"=>"submit", "text"=>"Toggle Favorite Teams"]); ?>
    </form>
    <?php endif; ?>

</div>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>