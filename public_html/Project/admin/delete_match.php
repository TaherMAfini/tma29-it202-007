<?php
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/matches.php"));
}

if(!isset($_GET["matchID"])) {
    flash("No match was selected for deletion", "warning");
    die(header("Location: $BASE_PATH" . "/matches.php"));
}

if(isset($_GET["filterC"]) && $_GET["filterC"] !== "") {
    $_SESSION["championship"] = $_GET["filterC"];
}

if(isset($_GET["filterT"]) && $_GET["filterT"] !== "") {
    $_SESSION["team"] = $_GET["filterT"];
}

if(isset($_GET["filterL"]) && $_GET["filterL"] !== "") {
    $_SESSION["limit"] = $_GET["filterL"];
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
        die(header("Location: $BASE_PATH" . "/matches.php"));
    } else {
        flash("No match found with the specified id", "danger");
        die(header("Location: $BASE_PATH" . "/matches.php"));
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>