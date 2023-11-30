<?php 
require(__DIR__ . "/../../partials/nav.php");

if(!isset($_GET["teamID"])) {
    flash("No team was selected", "warning");
    die(header("Location: $BASE_PATH" . "/matchDetails.php?" . http_build_query(["matchID"=>$_GET["matchID"]])));
}

$teamID = (int)se($_GET, "teamID", -1, false);
$matchID = (int)se($_GET, "matchID", -1, false);
$teamName = se($_GET, "teamName", "", false);

$userID = get_user_id();

$db = getDB();

$query = "INSERT INTO FavoriteTeams (user_id, team_id, is_active) VALUES (:userID, :teamID, 1) ON DUPLICATE KEY UPDATE is_active = !is_active";

$stmt = $db->prepare($query);

$stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
$stmt->bindValue(":teamID", $teamID, PDO::PARAM_INT);

try {
    $stmt->execute();
    flash("Added $teamName to your favorite teams", "success");
    die(header("Location: $BASE_PATH" . "/matchDetails.php?" . http_build_query(["matchID"=>$matchID])));
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>