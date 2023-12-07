<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

if(!isset($_GET["id"])) {
    flash("No user was selected", "warning");
    die(header("Location: home.php"));
}

$id = (int)se($_GET, "id", -1, false);

$query = "SELECT username FROM Users WHERE id = :id";

$queryC = "SELECT c.name FROM Championships c JOIN FavoriteChampionships fc ON c.id = fc.champ_id WHERE fc.user_id = :id";

$queryT = "SELECT t.name FROM Teams t JOIN FavoriteTeams ft ON t.id = ft.team_id WHERE ft.user_id = :id";

$db = getDB();

$stmt = $db->prepare($query);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

$stmtC = $db->prepare($queryC);
$stmtC->bindValue(":id", $id, PDO::PARAM_INT);

$stmtT = $db->prepare($queryT);
$stmtT->bindValue(":id", $id, PDO::PARAM_INT);

try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) {
        $user = $result[0]["username"];
    } else {
        flash("No user found with the specified id", "danger");
        die(header("Location: home.php"));
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$championships = "None";



try {
    $stmtC->execute();
    $resultC = $stmtC->fetchAll(PDO::FETCH_ASSOC);
    if($resultC) {
        $championships = "";
        foreach($resultC as $c) {
            $championships .= $c["name"] . ", ";
        }

        $championships = substr($championships, 0, -2);

    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$teams = "None";

try {
    $stmtT->execute();
    $resultT = $stmtT->fetchAll(PDO::FETCH_ASSOC);
    if($resultT) {
        $teams = "";
        foreach($resultT as $t) {
            $teams .= $t["name"] . ", ";
        }

        $teams = substr($teams, 0, -2);
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}


?>

<div class="container-fluid match-details-card bg-info">
    <h1><?php se($user, null, "") ?></h1>

    <div class="container-fluid mt-5 user-details">
        <p class="user-profile-items"><strong class="user-profile-categories">Favorite Championships:</strong> <?php se($championships)?></p>
        <p class="user-profile-items"><strong class="user-profile-categories">Favorite Teams:</strong> <?php se($teams)?></p>
    </div>
</div>


<?php
require(__DIR__ . "/../../partials/flash.php");
?>