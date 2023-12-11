<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

if(!isset($_GET["matchID"])) {
    flash("No match was selected", "warning");
    die(header("Location: matches.php"));
}

$id = (int)se($_GET, "matchID", -1, false);

$query = "SELECT m.id, m.date, m.stadium, c.id as champ_id, c.name as championship, t1.id as team1_id, t1.name as team1, m.score1, t1.manager as manager1, t2.id as team2_id, t2.name as team2, m.score2, t2.manager as manager2 FROM Matches m JOIN Teams t1 ON t1.id = m.team1_id JOIN Teams t2 ON t2.id = m.team2_id JOIN Championships c ON m.championship_id = c.id WHERE m.id = :id";

$db = getDB();

$stmt = $db->prepare($query);
$stmt->bindValue(":id", $id, PDO::PARAM_INT);

try {
    $stmt->execute();
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if($result) {
        $match = $result[0];
    } else {
        flash("No match found with the specified id", "danger");
        die(header("Location: matches.php"));
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>

<div class="container-fluid match-details-card bg-info">
    <?php
        $date = se(date("m/d/Y H:i:s A", strtotime(se($match, "date", "", false))), null, "", false);
        $champ_id = se($match, "champ_id", -1, false);
        $championship = htmlspecialchars_decode(se($match, "championship", "", false));
        $stadium = htmlspecialchars_decode(se($match, "stadium", "", false));
        $team1_id = se($match, "team1_id", -1, false);
        $team1 = htmlspecialchars_decode(se($match, "team1", "", false));
        $score1 = se($match, "score1", 0, false);
        $manager1 = htmlspecialchars_decode(se($match, "manager1", "", false));
        $team2_id = se($match, "team2_id", -1, false);
        $team2 = htmlspecialchars_decode(se($match, "team2", "", false));
        $score2 = se($match, "score2", 0, false);
        $manager2 = htmlspecialchars_decode(se($match, "manager2", "", false));
    ?>

    <div class="container-fluid mb-5">
        <div class="container-fluid matchDetails mb-3">
            <h5><?php se($date)?></h5>
            <h2><?php se($championship)?></h2>

            <!-- Taher Afini, tma29
            Form and button to add championship to favorites -->
            <form class="form mx-3 details-button" method="GET" action="addFavoriteChampionship.php">
                <input class="form-control" type="hidden" name="champID" value="<?php se($champ_id)?>">
                <input class="form-control" type="hidden" name="champName" value="<?php se($championship)?>">
                <input class="form-control" type="hidden" name="matchID" value="<?php se($id)?>">
                <button class="btn btn-outline-dark btn-sm">Add to Favorites</button>
            </form>
            <?php if ($stadium !== "") : ?>
                <h4>Stadium: <?php se($stadium)?></h4>
            <?php endif ?>
        </div>
        <div class="container-fluid team">
            <!-- Taher Afini, tma29
            Form and button to add team 1 to favorites -->
            <form class="form mx-3 details-button" method="GET" action="addFavoriteTeam.php">
                <input class="form-control" type="hidden" name="teamID" value="<?php se($team1_id)?>">
                <input class="form-control" type="hidden" name="teamName" value="<?php se($team1)?>">
                <input class="form-control" type="hidden" name="matchID" value="<?php se($id)?>">
                <button class="btn btn-outline-dark btn-sm">Add to Favorites</button>
            </form>
            <h2><?php se($team1) ?></h2>
            <?php if($manager1 !== "") : ?>
                <h5>Manager: <?php se($manager1) ?></h5>
                <br>
            <?php endif ?>
            <h2><?php se($score1)?></h2>
        </div>
        <div class="container-fluid team">
            <!-- Taher Afini, tma29
            Form and button to add team 1 to favorites -->
            <form class="form mx-3 details-button" method="GET" action="addFavoriteTeam.php">
                <input class="form-control" type="hidden" name="teamID" value="<?php se($team2_id)?>">
                <input class="form-control" type="hidden" name="teamName" value="<?php se($team2)?>">
                <input class="form-control" type="hidden" name="matchID" value="<?php se($id)?>">
                <button class="btn btn-outline-dark btn-sm">Add to Favorites</button>
            </form>
            <h2><?php se($team2) ?></h2>
            <?php if($manager2 !== "") : ?>
                <h5>Manager: <?php se($manager2) ?></h5>
                <br>
            <?php endif ?>
            <h2><?php se($score2)?></h2>
        </div>
    </div>
    <div class="container-fluid">
        <?php if(has_role("Admin")) : ?>
            <form class="form mx-3 details-button" method="GET" action="<?php echo get_url("admin/delete_match.php")?>">
                <input class="form-control" type="hidden" name="matchID" value="<?php se($id)?>">
                <button class="btn btn-secondary">Delete</button>
            </form>
        <?php endif ?>
        <?php if(has_role("Admin") || has_role("Creator")) : ?>
            <form class="form mx-3 details-button" method="GET" action="<?php echo get_url("creator/edit_match.php")?>">
                <input class="form-control" type="hidden" name="matchID" value="<?php se($id)?>">
                <button class="btn btn-dark">Edit</button>
            </form>
        <?php endif ?>
    </div>

</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>