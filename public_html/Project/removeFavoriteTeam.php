<!-- Taher Afini, tma29
Remove the selected team from favorites -->
<?php 
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$return_params = [];
$return_params["team"] = se($_GET, "filterName", "", false);
$return_params["username"] = se($_GET, "username", "", false);
$return_params["return"] = se($_GET, "return", "", false);
$return_params["limit"] = (int)se($_GET, "limit", 10, false);
$return_params["page"] = (int)se($_GET, "page", 1, false);

$return_path = $BASE_PATH . "/favoriteTeams.php?";

if($return_params["return"] === "all_favorite_teams") {
    $return_path = $BASE_PATH . "/admin/all_favorite_teams.php?";
    unset($return_params["team"]);
    unset($return_params["return"]);
}

$return_url = http_build_query($return_params);

if(!isset($_GET["teamID"])) {
    flash("No favorite was selected for deletion", "warning");
    die(header("Location: " . $return_path . $return_url));
}

$teamID = (int)se($_GET, "teamID", -1, false);
$teamName = se($_GET, "teamName", "", false);
$userID = (int)se($_GET, "userID", "", false);

if(!isset($_GET["userID"])) {
    $userID = get_user_id();
}

$db = getDB();

$query = "UPDATE FavoriteTeams SET is_active = 0 WHERE team_id = :teamID AND user_id = :userID";

$stmt = $db->prepare($query);

$stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
$stmt->bindValue(":teamID", $teamID, PDO::PARAM_INT);


try {
    $stmt->execute();
    $rows = $stmt->rowCount();
    if($rows > 0) {
        flash("Removed $teamName from favorite teams", "success");
    } else {
        flash("$teamName is already not in favorite teams", "info");
    }
    die(header("Location: " . $return_path . $return_url));

} catch (PDOException $e) {
    if($e->errorInfo[1] == "1216") {
        flash("Invalid team id.", "warning");
        die(header("Location: " . $return_path . $return_url));
    }
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>