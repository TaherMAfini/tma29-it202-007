<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

if(!isset($_GET["matchID"])) {
    flash("No match was selected for deletion", "warning");
    die(header("Location: $BASE_PATH" . "/matches.php"));
}

$id = (int)se($_GET, "matchID", -1, false);

$query = "DELETE FROM Matches WHERE id = :id";

$db = getDB();

$stmt = $db->prepare($query);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

try {
    $stmt->execute();
    $rows = $stmt->rowCount();
    if($rows > 0) {
        flash("Match deleted", "success");
        $_SESSION["championship"] = "1";
        $_SESSION["team"] = "1";
        $_SESSION["limit"] = 5;
        die(header("Location: $BASE_PATH" . "/matches.php"));
    } else {
        flash("No match found with the specified id", "danger");
        die(header("Location: $BASE_PATH" . "/matches.php"));
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

var_export($id);
?>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>