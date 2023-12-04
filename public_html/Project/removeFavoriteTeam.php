<?php 
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$return_params = [];
$return_params["team"] = se($_GET, "filterName", "", false);
$return_params["limit"] = (int)se($_GET, "limit", 10, false);
$return_params["page"] = (int)se($_GET, "page", 1, false);

$return_url = http_build_query($return_params);

if(!isset($_GET["teamID"])) {
    flash("No favorite was selected for deletion", "warning");
    die(header("Location: $BASE_PATH" . "/favoriteTeams.php?" . $return_params));
}

$teamID = (int)se($_GET, "teamID", -1, false);
$teamName = se($_GET, "teamName", "", false);


$userID = get_user_id();

$db = getDB();

$query = "UPDATE FavoriteTeams SET is_active = 0 WHERE team_id = :teamID AND user_id = :userID";

$stmt = $db->prepare($query);

$stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
$stmt->bindValue(":teamID", $teamID, PDO::PARAM_INT);


try {
    $stmt->execute();
    $rows = $stmt->rowCount();
    if($rows > 0) {
        flash("Removed $teamName from your favorite teams", "success");
    } else {
        flash("$teamName is already not in your favorite teams", "info");
    }
    die(header("Location: $BASE_PATH" . "/favoriteTeams.php?" . $return_url));

} catch (PDOException $e) {
    if($e->errorInfo[1] == "1216") {
        flash("Invalid team id.", "warning");
        die(header("Location: $BASE_PATH" . "/favoriteTeams.php?" . $return_url));
    }
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>