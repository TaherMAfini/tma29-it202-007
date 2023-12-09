//Taher Afini, tma29
//Remove the selected championship from favorites

<?php 
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$return_params = [];
$return_params["champ"] = se($_GET, "filterName", "", false);
$return_params["username"] = se($_GET, "username", "", false);
$return_params["return"] = se($_GET, "return", "", false);
$return_params["limit"] = (int)se($_GET, "limit", 10, false);
$return_params["page"] = (int)se($_GET, "page", 1, false);

$return_path = $BASE_PATH . "/favoriteChampionships.php?";

if($return_params["return"] === "all_favorite_championships") {
    $return_path = $BASE_PATH . "/admin/all_favorite_championships.php?";
    unset($return_params["champ"]);
    unset($return_params["return"]);
}

$return_url = http_build_query($return_params);

if(!isset($_GET["champID"])) {
    flash("No favorite was selected for deletion", "warning");
    die(header("Location: " . $return_path . $return_url));
}

$champID = (int)se($_GET, "champID", -1, false);
$champName = se($_GET, "champName", "", false);


$userID = get_user_id();

$db = getDB();

$query = "UPDATE FavoriteChampionships SET is_active = 0 WHERE champ_id = :champID AND user_id = :userID";

$stmt = $db->prepare($query);

$stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
$stmt->bindValue(":champID", $champID, PDO::PARAM_INT);


try {
    $stmt->execute();
    $rows = $stmt->rowCount();
    if($rows > 0) {
        flash("Removed $champName from your favorite championships", "success");
    } else {
        flash("$champName is already not in your favorite championships", "info");
    }
    die(header("Location: " . $return_path . $return_url));

} catch (PDOException $e) {
    if($e->errorInfo[1] == "1216") {
        flash("Invalid championship id.", "warning");
        die(header("Location: " . $return_path . $return_url));
    }
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>