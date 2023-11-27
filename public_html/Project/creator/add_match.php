<?php
require(__DIR__ . "/../../../partials/nav.php");


if (!has_role("Admin") && !has_role("Creator")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
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


if(isset($_POST["date"]) && isset($_POST["championship"]) && isset($_POST["team1"]) && isset($_POST["team2"]) && isset($_POST["score1"]) && isset($_POST["score2"])) {
    $date = date("Y-m-d H:i:s", strtotime($_POST["date"]));
    $champ = (int)se($_POST, "championship", -1, false);
    $team1 = (int)se($_POST, "team1", -1, false);
    $team2 = (int)se($_POST, "team2", -1, false);
    $score1 = (int)se($_POST, "score1", 0, false);
    $score2 = (int)se($_POST, "score2", 0, false);
    $stadium = se($_POST, "stadium", "", false);

    $hasError = false;
    $validChampionship = false;
    $validTeam1 = false;
    $validTeam2 = false;

    foreach($championships as $c) {
        if((int)$c["id"] == $champ) {
            $validChampionship = true;
            break;
        }
    }

    foreach($teams as $t) {
        if((int)$t["id"] == $team1) {
            $validTeam1 = true;
        }
        if((int)$t["id"] == $team2) {
            $validTeam2 = true;
        }
    }

    $dateMatch = "/^[0-9]{4}-[0-9]{2}-[0-9]{2} [0-9]{2}:[0-9]{2}:[0-9]{2}$/";

    if(preg_match($dateMatch, $date) !== 1) {
        flash("Invalid date format",  "danger");
        $hasError = true;
    }

    if(!$validChampionship) {
        flash("Invalid championship selected", "danger");
        $hasError = true;
    }

    if(!$validTeam1) {
        flash("Invalid team 1 selected", "danger");
        $hasError = true;
    }

    if(!$validTeam2) {
        flash("Invalid team 2 selected", "danger");
        $hasError = true;
    }

    if($score1 < 0) {
        flash("Score 1 must not be negative", "danger");
        $hasError = true;
    }
    if($score2 < 0) {
        flash("Score 2 must not be negative", "danger");
        $hasError = true;
    }

    if($team1 === $team2) {
        flash("Team 1 and Team 2 must be different", "danger");
        $hasError = true;
    }

    if(strlen($stadium) > 255) {
        flash("Stadium name must be 255 characters or less", "danger");
        $hasError = true;
    }

    if(!$hasError) {
        $query = "INSERT INTO Matches (date, championship_id, team1_id, team2_id, score1, score2, stadium) VALUES (:date, :champ, :team1, :team2, :score1, :score2, :stadium)";
        $stmt = $db->prepare($query);
        $stmt->bindValue(":date", $date, PDO::PARAM_STR);
        $stmt->bindValue(":champ", $champ, PDO::PARAM_INT);
        $stmt->bindValue(":team1", $team1, PDO::PARAM_INT);
        $stmt->bindValue(":team2", $team2, PDO::PARAM_INT);
        $stmt->bindValue(":score1", $score1, PDO::PARAM_INT);
        $stmt->bindValue(":score2", $score2, PDO::PARAM_INT);
        if($stadium === "") {
            $stmt->bindValue(":stadium", null, PDO::PARAM_NULL);
        } else {
            $stmt->bindValue(":stadium", $stadium, PDO::PARAM_STR);
        }
        
        try {
            $stmt->execute();
            $rows = $stmt->rowCount();
            if($rows > 0) {
                flash("Match created successfully", "success");
            } else {
                flash("Match creation failed", "danger");
            }
        } catch (PDOException $e) {
            if($e->errorInfo[1] == 1062) {
                flash("This match already exists.", "danger");
            } else {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
    }
}   

?>

<div class="container-fluid">
    <h1 class="mb-3">Create Match</h1>
    <form onsubmit="return validate(this)" method="POST">
        <?php render_input(["label"=>"Date - Time", "name"=>"date", "type"=>"datetime-local", "width"=>"w-25", "rules"=>["required"=>"true"]]); ?>
        <div class="championship mb-3">
            <label class="form-label" for="championship">Championship</label>
            <select class="form-control w-25" name="championship" id="championship" required>
                <?php foreach($championships as $c) : ?>
                    <option value="<?php se($c, "id")?>"><?php se($c, "name", ""); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="team1 mb-3">
            <label class="form-label" for="team1">Team 1</label>
            <select class="form-control w-25" name="team1" id="team1" required>
                <?php foreach($teams as $t) : ?>
                    <option value="<?php se($t, "id")?>"><?php se($t, "name", ""); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php render_input(["label"=>"Team 1 Score", "name"=>"score1", "type"=>"number", "width"=>"w-25", "rules"=>["required"=>"true"]]); ?>
        <div class="team2 mb-3">
            <label class="form-label" for="team2">Team 2</label>
            <select class="form-control w-25" name="team2" id="team2" required>
                <?php foreach($teams as $t) : ?>
                    <option value="<?php se($t, "id")?>"><?php se($t, "name", ""); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php render_input(["label"=>"Team 2 Score", "name"=>"score2", "type"=>"number", "width"=>"w-25", "rules"=>["required"=>"true"]]); ?>

        <?php render_input(["label"=>"Stadium", "name"=>"stadium", "width"=>"w-25"]); ?>

        <?php render_button(["type"=>"submit", "text"=>"Submit"]) ?>
    </form>
</div>

<script>
    function validate(form) {
        let date = form.date.value;
        let champ = form.championship.value;
        let team1 = form.team1.value;
        let team2 = form.team2.value;
        let score1 = form.score1.value;
        let score2 = form.score2.value;
        let stadium = form.stadium.value;

        let isValid = true;

        const dateMatch = /^[0-9]{4}-[0-9]{2}-[0-9]{2}T[0-9]{2}:[0-9]{2}$/;

        if(!dateMatch.test(date)) {
            flash("Invalid date format", "danger");
            isValid = false;
        }

        if(champ.length == 0) {
            flash("Championship must be selected", "danger");
            isValid = false;
        }

        if(team1.length == 0) {
            flash("Team 1 must be selected", "danger");
            isValid = false;
        }

        if(team2.length == 0) {
            flash("Team 2 must be selected", "danger");
            isValid = false;
        }

        if(score1.length == 0) {
            flash("Score 1 must be entered", "danger");
            isValid = false;
        }

        if(score2.length == 0) {
            flash("Score 2 must be entered", "danger");
            isValid = false;
        }

        if(score1 < 0) {
            flash("Score 1 must not be negative", "danger");
            isValid = false;
        }

        if(score2 < 0) {
            flash("Score 2 must not be negative", "danger");            
            isValid = false;
        }

        if(stadium.length > 255) {
            flash("Stadium name must be 255 characters or less", "danger");
            isValid = false;
        }

        if(team1 === team2) {
            flash("Team 1 and Team 2 must be different", "danger");
            isValid = false;
        }
        return isValid;
    }

</script>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>