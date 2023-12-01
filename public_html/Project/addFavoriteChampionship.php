<?php 
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

if(!isset($_GET["champID"])) {
    flash("No championship was selected", "warning");
    if(isset($_GET["matchID"])) {
        die(header("Location: $BASE_PATH" . "/matchDetails.php?" . http_build_query(["matchID"=>$_GET["matchID"]])));
    } else {
        die(header("Location: $BASE_PATH" . "/matches.php"));
    }
}

$champID = (int)se($_GET, "champID", -1, false);
$champName = se($_GET, "champName", "", false);

$userID = get_user_id();

$db = getDB();

$query = "INSERT INTO FavoriteChampionships (user_id, champ_id, is_active) VALUES (:userID, :champID, 1) ON DUPLICATE KEY UPDATE is_active = is_active";

$stmt = $db->prepare($query);

$stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
$stmt->bindValue(":champID", $champID, PDO::PARAM_INT);

try {
    $stmt->execute();
    $rows = $stmt->rowCount();
    if($rows > 0) {
        flash("Added $champName to your favorite championships", "success");
    } else {
        flash("$champName is already in your favorite championships", "info");
    }
    if(isset($_GET["matchID"])) {
        die(header("Location: $BASE_PATH" . "/matchDetails.php?" . http_build_query(["matchID"=>$_GET["matchID"]])));
    } else {
        die(header("Location: $BASE_PATH" . "/matches.php"));
    }
} catch (PDOException $e) {
    if($e->errorInfo[1] == "1216") {
        flash("Invalid championship id.", "warning");
        if(isset($_GET["matchID"])) {
            die(header("Location: $BASE_PATH" . "/matchDetails.php?" . http_build_query(["matchID"=>$_GET["matchID"]])));
        } else {
            die(header("Location: $BASE_PATH" . "/matches.php"));
        }
    }
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>