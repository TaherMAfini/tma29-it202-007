//Taher Afini, tma29
// This page allows the admin to toggle the favorite teams of users

<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

$db = getDB();

$validUsername = true;
$validChampionship = true;

$users = [];
$championships = [];
$username = "";
$championshipSearch = "";

if(isset($_POST["username"]) && empty($_POST["username"])){
    flash("Username cannot be empty", "warning");
    $validUsername = false;
}

if(isset($_POST["team"]) && empty($_POST["team"])){
    flash("Team cannot be empty", "warning");
    $validChampionship = false;
}

//Taher Afini, tma29
// Handle toggle form submission
if(isset($_POST["users"]) && isset($_POST["champs"])) {
    $user_ids = $_POST["users"]; //se() doesn't like arrays so we'll just do this
    $champ_ids = $_POST["champs"]; //se() doesn't like arrays so we'll just do this
    if(empty($user_ids)) {
        flash("No users selected", "warning");
    }
    if(empty($champ_ids)) {
        flash("No championships selected", "warning");
    }
    if(!empty($user_ids) && !empty($champ_ids)) {
        $toggleSuccess = toggle_favorite_championships($db, $user_ids, $champ_ids);

        if($toggleSuccess) {
            flash("Successfully toggled favorite championships", "success");
        }
        else {
            flash("Error toggling favorite championships", "danger");
        }
        
    }
}

if($validUsername && $validChampionship) {
    $username = se($_POST, "username", "", false);
    $championshipSearch = se($_POST, "championship", "", false);

    $users = get_matching_users($db, ["username"=>$username]);
    $championships = get_matching_championships($db, ["champ"=>$championshipSearch]);
}


?>
<div class="container-fluid">

    <h1>Assign Favorite Teams</h1>

    //Taher Afini, tma29
    //Username and Championship partial match search
    <form method="POST" class="list-filter mt-5">
        <div class="team-filter">
            <label class="form-label" for="username"><h4>Username</h4></label>
            <input class="form-control w-50" type="text" name="username" value="<?php se($username) ?>" />
        </div>
        <div class="team-filter">
            <label class="form-label" for="championship"><h4>Championship</h4></label>
            <input class="form-control w-50" type="text" name="championship" id="championship" value=<?php se($championshipSearch) ?>>
        </div>
        <?php render_button(["type"=>"submit", "text"=>"Search"]); ?>
    </form>

    //Taher Afini, tma29
    //Table with users and championships (max 25 of each) with checkboxes to toggle favorite championships
    <?php if ($username !== "" && $championshipSearch !== "") : ?>
    <form method="POST">
        <?php if (isset($username) && !empty($username)) : ?>
            <input type="hidden" name="username" value="<?php se($username, false); ?>" />
            <input type="hidden" name="championship" value="<?php se($championshipSearch, false); ?>" />
        <?php endif; ?>
        <table class="table table-secondary">
            <thead>
                <th>Users (<?php se(count($users))?>)</th>
                <th>Championships to Favorite (<?php se(count($championships))?>)</th>
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
                                <?php foreach ($championships as $champ) : ?>
                                    <tr>
                                        <td class="form-check px-4">
                                            <label class="form-check-label" for="champ_<?php se($champ, "id"); ?>"><?php se($champ, "name"); ?></label>
                                            <input class="form-check-input" id="champ_<?php se($champ, 'id'); ?>" type="checkbox" name="champs[]" value="<?php se($champ, 'id'); ?>" />
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