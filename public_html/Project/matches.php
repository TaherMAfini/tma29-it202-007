<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$db = getDB();

$queryC = "Select id, name from Championships ORDER BY name ASC";
$queryT = "Select id, name from Teams ORDER BY name ASC";

$stmtC= $db->prepare($queryC);

try {
    $stmtC->execute();
    $results = $stmtC->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $championships = $results;
    } else {
        $championships = [];
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$stmtT= $db->prepare($queryT);

try {
    $stmtT->execute();
    $results = $stmtT->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $teams = $results;
    } else {
        $teams = [];
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

$query = "SELECT m.id, m.championship_id, t1.name as team1, m.score1, t2.name as team2, m.score2, m.date FROM Matches m JOIN Teams t1 ON t1.id = m.team1_id JOIN Teams t2 ON t2.id = m.team2_id";

$championship = "";
$team = "";
$limit = 10;
$params = [];


if(isset($_GET["championship"])) {
    $champ = se($_GET, "championship", "", false);
    if(!empty($champ)) {
        $championship = $champ;
    }
}

if(isset($_GET["team"])) {
    $t = se($_GET, "team", "", false);
    if(!empty($t)) {
        $team = $t;
    }
}

if(isset($_GET["limit"])) {
    $l = se($_GET, "limit", 0, false);
    $l = (int)$l;
    if($l <= 100 && $l >= 1) {
        $limit = $l;
    }
}

if(!empty($championship) && !empty($team)) {
    $query = $query . " WHERE m.championship_id = :champ AND (m.team1_id = :team OR m.team2_id = :team)";
    $params[":champ"] = (int)$championship;
    $params[":team"] = (int)$team;
} else if (!empty($championship)) {
    $query = $query . " WHERE m.championship_id = :champ";
    $params[":champ"] = (int)$championship;
} else if (!empty($team)) {
    $query = $query . " WHERE m.team1_id = :team OR m.team2_id = :team";
    $params[":team"] = (int)$team;
}

$query = $query . " ORDER BY m.modified DESC LIMIT :limit";
$params[":limit"] = $limit;
$stmt = $db->prepare($query);

$stmt->bindValue(":limit", $limit, PDO::PARAM_INT);

if (!empty($championship)) {
    $stmt->bindValue(":champ", $params[":champ"], PDO::PARAM_INT);
} 

if (!empty($team)) {    
    $stmt->bindValue(":team", $params[":team"], PDO::PARAM_INT);
}

try {
    $stmt->execute();
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    if ($results) {
        $matches = $results;
    }
} catch (PDOException $e) {
    flash(var_export($e->errorInfo, true), "danger");
}

?>



<h1>Matches</h1>

<form method="GET" class="list-filter">
    <div class="champ-filter">
        <label class="form-label" for="championship"><h4>Championship</h4></label>
        <select class="form-control w-50" name="championship" id="championship">
            <?php if($championship !== "") : ?>
                <option disabled value> -- select an option -- </option>
            <?php else : ?>
                <option disabled selected value> -- select an option -- </option>
            <?php endif ?>
            <?php foreach($championships as $c) : ?>
                <?php if($championship == $c["id"]) : ?>
                    <option value="<?php se($c, "id")?>" selected><?php se($c, "name", ""); ?></option>
                <?php else : ?>
                    <option value="<?php se($c, "id")?>"><?php se($c, "name", ""); ?></option>
                <?php endif ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="team-filter">
        <label class="form-label" for="team"><h4>Team</h4></label>
        <select class="form-control w-50" name="team" id="team">
            <?php if($team !== "") : ?>
                <option disabled value> -- select an option -- </option>
            <?php else : ?>
                <option disabled selected value> -- select an option -- </option>
            <?php endif ?>
            <?php foreach($teams as $t) : ?>
                <?php if($team == $t["id"]) : ?>
                    <option value="<?php se($t, "id")?>" selected><?php se($t, "name", ""); ?></option>
                <?php else : ?>
                    <option value="<?php se($t, "id")?>"><?php se($t, "name", ""); ?></option>
                <?php endif ?>
            <?php endforeach; ?>
        </select>
    </div>
    <div class="limit">
        <label class="form-label" for="limit"><h4>Limit (1-100, default 10)</h4></label>
        <input class="form-control w-25" type="number" name="limit" id="limit" value=<?php se($limit) ?>>
    </div>
    <?php render_button(["type"=>"submit", "text"=>"Filter"]); ?>
</form>

<form method="GET" class="clear-filter">
    <div class="clear-filter">
        <?php render_button(["type"=>"submit", "text"=>"Clear Filter", "color"=>"secondary"]); ?>
    </div>
</form>


<table class="table table-secondary">
    <thead>
        <th>Date</th>
        <th>Match</th>
        <th>Actions</th>
    </thead>
    <tbody>
        <?php if (empty($matches)) : ?>
            <tr>
                <td colspan="100%">No results available</td>
            </tr>
        <?php else : ?>
            <?php foreach ($matches as $match) : ?>
                <tr>
                    <td class="col-2"><h5><?php se(date("m/d/Y", strtotime(se($match, "date", "", false))));?></h5></td>
                    <td class="col-7"><?php render_match_card($match); ?></td>
                    <td class="col-3">
                        <form class="form" method="GET" action="<?php echo get_url("matchDetails.php")?>">
                            <input class="form-control" type="hidden" name="matchID" value="<?php se($match, "id")?>">
                            <button class="btn btn-primary">Details</button>
                        </form>
                        <?php if(has_role("Admin")) : ?>
                            <form class="form" method="GET" action="<?php echo get_url("admin/delete_match.php")?>">
                                <input class="form-control" type="hidden" name="matchID" value="<?php se($match, "id")?>">
                                <input type="hidden" name="filterC" value="<?php se($championship)?>">
                                <input type="hidden" name="filterT" value="<?php se($team)?>">
                                <input type="hidden" name="filterL" value="<?php se($limit)?>">
                                <button class="btn btn-secondary">Delete</button>
                            </form>
                        <?php endif ?>
                        <?php if(has_role("Admin") || has_role("Creator")) : ?>
                            <form class="form" method="GET" action="<?php echo get_url("creator/edit_match.php")?>">
                                <input class="form-control" type="hidden" name="matchID" value="<?php se($match, "id")?>">
                                <button class="btn btn-dark">Edit</button>
                            </form>
                        <?php endif ?>
                    </td>
                </tr>
                
            <?php endforeach; ?>
            <?php endif; ?>
    </tbody>
</table>




<?php
require(__DIR__ . "/../../partials/flash.php");
?>