<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

if(!isset($_GET["champID"])) {
    flash("No championship was selected", "warning");
    die(header("Location: favoriteChampionships.php"));
}

$id = (int)se($_GET, "champID", -1, false);

$query = "SELECT name FROM Championships WHERE id = :id";

$db = getDB();

$stmt = $db->prepare($query);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) {
        $champ = $result[0];
    } else {
        flash("No championship found with the specified id", "danger");
        die(header("Location: favoriteChampionships.php"));
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<div class="container-fluid match-details-card bg-info">
    <?php
        $name = htmlspecialchars_decode(se($champ, "name", "", false));
    ?>

    <h1><?php se($name) ?></h1>

</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>