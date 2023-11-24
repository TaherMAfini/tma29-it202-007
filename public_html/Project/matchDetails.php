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

$query = "SELECT m.id, m.date, m.stadium, c.name as championship, t1.name as team1, m.score1, t1.manager as manager1, t2.name as team2, m.score2, t2.manager as manager2 FROM Matches m JOIN Teams t1 ON t1.id = m.team1_id JOIN Teams t2 ON t2.id = m.team2_id JOIN Championships c ON m.championship_id = c.id WHERE m.id = :id";

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
        $championship = htmlspecialchars_decode(se($match, "championship", "", false));
        $stadium = htmlspecialchars_decode(se($match, "stadium", "", false));
        $team1 = htmlspecialchars_decode(se($match, "team1", "", false));
        $score1 = se($match, "score1", 0, false);
        $manager1 = htmlspecialchars_decode(se($match, "manager1", "", false));
        $team2 = htmlspecialchars_decode(se($match, "team2", "", false));
        $score2 = se($match, "score2", 0, false);
        $manager2 = htmlspecialchars_decode(se($match, "manager2", "", false));
    ?>

    <div class="container-fluid mb-5">
        <div class="container-fluid matchDetails mb-3">
            <h5><?php se($date)?></h5>
            <h2><?php se($championship)?></h2>
            <?php if ($stadium !== "") : ?>
                <h4>Stadium: <?php se($stadium)?></h4>
            <?php endif ?>
        </div>
        <div class="container-fluid team">
            <h2><?php se($team1) ?></h2>
            <?php if($manager1 !== "") : ?>
                <h5>Manager: <?php se($manager1) ?></h5>
                <br>
            <?php endif ?>
            <h2><?php se($score1)?></h2>
        </div>
        <div class="container-fluid team">
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
            <form class="form" method="GET" action="<?php echo get_url("admin/delete_match.php")?>">
                <input class="form-control" type="hidden" name="matchID" value="<?php se($id)?>">
                <button class="btn btn-secondary">Delete</button>
            </form>
        <?php endif ?>
    </div>

</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>