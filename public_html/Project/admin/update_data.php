<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}

$action = se($_POST, "update", "", false);

function process_matches($data, $team_mapping, $champ_mapping, $db) {
    $matches = [];

    foreach($data as $match) {
        $match_id = $match["id"];
        $champ_id = $champ_mapping[$match["championship"]["id"]];
        $team1_id = $team_mapping[$match["teamA"]["id"]];
        $team2_id = $team_mapping[$match["teamB"]["id"]];
        $team1_score = $match["teamA"]["score"]["f"] == null ? 0 : $match["teamA"]["score"]["f"];
        $team2_score = $match["teamB"]["score"]["f"] == null ? 0 : $match["teamB"]["score"]["f"];;
        $date = $match["date"];
        $stadium = $match['stadium'] == null ? null : $match["stadium"]["name"];

        $matches[] = [
            "api_id"=>$match_id,
            "championship_id"=>(int)$champ_id,
            "team1_id"=>(int)$team1_id,
            "team2_id"=>(int)$team2_id,
            "score1"=>(int)$team1_score,
            "score2"=>(int)$team2_score,
            "date"=>$date,
            "stadium"=>$stadium
        ];
    }

    $query = "INSERT INTO `Matches` (`api_id`, `championship_id`, `team1_id`, `score1`, `team2_id`, `score2`, `date`, `stadium`) VALUES";

    $values = [];

    foreach ($matches as $i => $match) {
        $values[] = "(:api_id$i, :championship_id$i, :team1_id$i, :score1$i, :team2_id$i, :score2$i, :date$i, :stadium$i)";
    }

    $query .= implode(",", $values);

    $updates = array_reduce(['api_id', 'championship_id', 'team1_id', 'score1', 'team2_id', 'score2', 'date', 'stadium'], function($carry, $col) {
        $carry[] = "`$col` = VALUES(`$col`)";
        return $carry;
    }, []);

    $query .= " ON DUPLICATE KEY UPDATE " . implode(",", $updates);

    $stmt = $db->prepare($query);

    foreach ($matches as $i => $match) {
        $stmt->bindValue(":api_id$i", $match["api_id"], PDO::PARAM_STR);
        $stmt->bindValue(":championship_id$i", $match["championship_id"], PDO::PARAM_INT);
        $stmt->bindValue(":team1_id$i", $match["team1_id"], PDO::PARAM_INT);
        $stmt->bindValue(":score1$i", $match["score1"], PDO::PARAM_INT);
        $stmt->bindValue(":team2_id$i", $match["team2_id"], PDO::PARAM_INT);
        $stmt->bindValue(":score2$i", $match["score2"], PDO::PARAM_INT);
        $stmt->bindValue(":date$i", $match["date"], PDO::PARAM_STR);
        $stmt->bindValue(":stadium$i", $match["stadium"], PDO::PARAM_STR);
    }

    try {
        $stmt->execute();
        flash("API Data Updated", "success");
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash(var_export($e->errorInfo, true), "danger");
    }
}

function process_teams($data, $db) {
    $teams = [];
    foreach($data as $match) {
        $team1 = $match["teamA"];
        $team2 = $match["teamB"];
        $team1_id = $team1["id"];
        $team2_id = $team2["id"];
        $team1_name = $team1["name"];
        $team2_name = $team2["name"];
        $team1_manager = $team1["manager"] == null ? null : $team1["manager"]["name"];
        $team2_manager = $team2["manager"] == null ? null : $team2["manager"]["name"];

        $teams[] = [
            "api_id"=>$team1_id,
            "name"=>$team1_name,
            "manager"=>$team1_manager
        ];
        $teams[] = [
            "api_id"=>$team2_id,
            "name"=>$team2_name,
            "manager"=>$team2_manager
        ];
    }

    $query = "INSERT INTO `Teams` (`api_id`, `name`, `manager`) VALUES";

    $values = [];

    foreach ($teams as $i => $team) {
        $values[] = "(:api_id$i, :name$i, :manager$i)";
    }

    $query .= implode(",", $values);

    $updates = array_reduce(['api_id', 'name', 'manager'], function($carry, $col) {
        $carry[] = "`$col` = VALUES(`$col`)";
        return $carry;
    }, []);

    $query .= " ON DUPLICATE KEY UPDATE " . implode(",", $updates);

    $stmt = $db->prepare($query);

    foreach ($teams as $i => $team) {
        $stmt->bindValue(":api_id$i", $team["api_id"], PDO::PARAM_STR);
        $stmt->bindValue(":name$i", $team["name"], PDO::PARAM_STR);
        $stmt->bindValue(":manager$i", $team["manager"], PDO::PARAM_STR);
    }

    try {
        $stmt->execute();
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash(var_export($e->errorInfo, true), "danger");
    }

    $query2 = "SELECT id, api_id FROM `Teams` WHERE api_id IN (";

    foreach ($teams as $i => $team) {
        $query2 .= ":api_id$i,";
    }

    $query2 = substr($query2, 0, -1) . ")";

    $stmt2 = $db->prepare($query2);

    foreach ($teams as $i => $team) {
        $stmt2->bindValue(":api_id$i", $team["api_id"], PDO::PARAM_STR);
    }

    try {
        $stmt2->execute();
        $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash(var_export($e->errorInfo, true), "danger");
    }

    $team_mapping = [];

    foreach ($results as $result) {
        $team_mapping[$result["api_id"]] = $result["id"];
    }

    return $team_mapping;
}

function process_champs($data, $db) {
    $leagues = [];
    foreach($data as $match) {
        $champ = $match["championship"];
        $champ_id = $champ["id"];
        $champ_name = $champ["name"];

        $leagues[] = [
            "api_id"=>$champ_id,
            "name"=>$champ_name
        ];
    }

    $query = "INSERT INTO `Championships` (`api_id`, `name`) VALUES";

    $values = [];

    foreach ($leagues as $i => $league) {
        $values[] = "(:api_id$i, :name$i)";
    }

    $query .= implode(",", $values);

    $updates = array_reduce(['api_id', 'name'], function($carry, $col) {
        $carry[] = "`$col` = VALUES(`$col`)";
        return $carry;
    }, []);

    $query .= " ON DUPLICATE KEY UPDATE " . implode(",", $updates);

    $stmt = $db->prepare($query);

    foreach ($leagues as $i => $league) {
        $stmt->bindValue(":api_id$i", $league["api_id"], PDO::PARAM_STR);
        $stmt->bindValue(":name$i", $league["name"], PDO::PARAM_STR);
    }
    try {
        $stmt->execute();
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash(var_export($e->errorInfo, true), "danger");
    }

    $query2 = "SELECT id, api_id FROM `Championships` WHERE api_id IN (";

    foreach ($leagues as $i => $league) {
        $query2 .= ":api_id$i,";
    }

    $query2 = substr($query2, 0, -1) . ")";

    $stmt2 = $db->prepare($query2);

    foreach ($leagues as $i => $league) {
        $stmt2->bindValue(":api_id$i", $league["api_id"], PDO::PARAM_STR);
    }

    try {
        $stmt2->execute();
        $results = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash(var_export($e->errorInfo, true), "danger");
    }

    $champ_mapping = [];

    foreach ($results as $result) {
        $champ_mapping[$result["api_id"]] = $result["id"];
    }

    return $champ_mapping;
}

if($action !== "") {
    $db = getDB();

    //Check for 12 hours between updates
    $query = "Select max(modified) as last_update from `Matches`";

    $stmt = $db->prepare($query);
    
    try{
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $last_update = $result["last_update"];
    } catch (PDOException $e) {
        error_log(var_export($e, true));
        flash(var_export($e->errorInfo, true), "danger");
    }

    $update = true;
    if($last_update != null) {
        $last_update = strtotime($last_update);
        $now = time();
        $diff = $now - $last_update;
        if($diff < 43200) {
            $update = false;
            flash("You can only update the API data every 12 hours.", "warning");
            die(header("Location: $BASE_PATH" . "/admin/update_data.php"));
        }
    }

    if($update) {
        date_default_timezone_set("America/New_York");
        $date = date("Ymd");
        $data = get("https://soccer-football-info.p.rapidapi.com/matches/day/basic/", "SOCCER_API_KEY", ["d"=>$date],true,"soccer-football-info.p.rapidapi.com");
        $response = json_decode($data["response"], true);
        if($data["status"] != 200 || !isset($response["result"])) {
            flash("Error fetching data from API", "danger");
        } else {
            $champ_mapping = process_champs($response["result"], $db);
            $team_mapping = process_teams($response["result"], $db);
            process_matches($response["result"], $team_mapping, $champ_mapping, $db);
        }
    }
}

?>

<div class="container-fluid">
    <h1>Update API Data</h1>

    <form method="POST">
        <?php render_input(["type"=>"hidden", "name"=>"update", "value"=>"update","include_margin"=>false]); ?>
        <?php render_button(["type"=>"submit", "text"=>"Update API Data"]); ?>
    </form>
</div>

<?php
require(__DIR__ . "/../../../partials/flash.php");
?>