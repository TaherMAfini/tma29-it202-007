<!-- Taher Afini, tma29
Display details of the selected team including team name and manager name -->

<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

if(!isset($_GET["teamID"])) {
    flash("No team was selected", "warning");
    die(header("Location: favoriteTeams.php"));
}

$id = (int)se($_GET, "teamID", -1, false);

$query = "SELECT name, manager FROM Teams WHERE id = :id";

$db = getDB();

$stmt = $db->prepare($query);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) {
        $team = $result[0];
    } else {
        flash("No team found with the specified id", "danger");
        die(header("Location: favoriteTeams.php"));
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<div class="container-fluid match-details-card bg-info">
    <?php
        $name = htmlspecialchars_decode(se($team, "name", "", false));
        $manager = htmlspecialchars_decode(se($team, "manager", "Unknown", false));
    ?>

    <h1><?php se($name) ?></h1>
    <h5>Manager: <?php se($manager) ?></h5>


</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>