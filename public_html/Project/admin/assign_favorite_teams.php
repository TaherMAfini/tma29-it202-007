<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

$db = getDB();

$validUsername = true;
$validTeam = true;

$users = [];
$teams = [];
$username = "";
$teamSearch = "";

if(isset($_POST["username"]) && empty($_POST["username"])){
    flash("Username cannot be empty", "warning");
    $validUsername = false;
}

if(isset($_POST["team"]) && empty($_POST["team"])){
    flash("Team cannot be empty", "warning");
    $validTeam = false;
}

if(isset($_POST["users"]) && isset($_POST["teams"])) {
    $user_ids = $_POST["users"]; //se() doesn't like arrays so we'll just do this
    $team_ids = $_POST["teams"]; //se() doesn't like arrays so we'll just do this
    if(empty($user_ids)) {
        flash("No users selected", "warning");
    }
    if(empty($team_ids)) {
        flash("No teams selected", "warning");
    }
    if(!empty($user_ids) && !empty($team_ids)) {
        $toggleSuccess = toggle_favorite_teams($db, $user_ids, $team_ids);

        if($toggleSuccess) {
            flash("Successfully toggled favorite teams", "success");
        }
        else {
            flash("Error toggling favorite teams", "danger");
        }
        
    }
}

if($validUsername && $validTeam) {
    $username = se($_POST, "username", "", false);
    $teamSearch = se($_POST, "team", "", false);

    $users = get_matching_users($db, ["username"=>$username]);
    $teams = get_matching_teams($db, ["team"=>$teamSearch]);
}


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
            <input class="form-control w-50" type="text" name="team" id="team" value=<?php se($teamSearch) ?>>
        </div>
        <?php render_button(["type"=>"submit", "text"=>"Search"]); ?>
    </form>

    <?php if ($username !== "" && $teamSearch !== "") : ?>
    <form method="POST">
        <?php if (isset($username) && !empty($username)) : ?>
            <input type="hidden" name="username" value="<?php se($username, false); ?>" />
            <input type="hidden" name="team" value="<?php se($teamSearch, false); ?>" />
        <?php endif; ?>
        <table class="table table-secondary">
            <thead>
                <th>Users (<?php se(count($users))?>)</th>
                <th>Teams to Favorite (<?php se(count($teams))?>)</th>
            </thead>
            <tbody>
                <tr>
                    <td class="col-6">
                        <table class="table table-secondary">
                            <tbody>
                                <?php foreach ($users as $user) : ?>
                                    <tr>
                                        <td class="form-check px-4">
                                            <label class="form-check-label" for="user_<?php se($user, "id"); ?>"><?php se($user, "username"); ?></label>
                                            <input class="form-check-input" id="user_<?php se($user, 'id'); ?>" type="checkbox" name="users[]" value="<?php se($user, 'id'); ?>" />
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </td>
                    <td class="col-6">
                        <table class="table table-secondary">
                            <tbody>
                                <?php foreach ($teams as $team) : ?>
                                    <tr>
                                        <td class="form-check px-4">
                                            <label class="form-check-label" for="team_<?php se($team, "id"); ?>"><?php se($team, "name"); ?></label>
                                            <input class="form-check-input" id="team_<?php se($team, 'id'); ?>" type="checkbox" name="teams[]" value="<?php se($team, 'id'); ?>" />
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
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