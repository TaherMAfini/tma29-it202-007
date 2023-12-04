<?php

function get_championships($db) {
    $queryC = "Select id, name from Championships ORDER BY name ASC";

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

    return $championships;
}

function get_teams($db) {
    $queryT = "Select id, name from Teams ORDER BY name ASC";
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

    return $teams;
}

function get_total($db, $params) {
    $championship = se($params, ":champ", "", false);
    $team = se($params, ":team", "", false);

    $queryT = "SELECT count(m.id) FROM Matches m JOIN Teams t1 ON t1.id = m.team1_id JOIN Teams t2 ON t2.id = m.team2_id";
    
    if(!empty($championship) && !empty($team)) {
        $queryT = $queryT . " WHERE m.championship_id = :champ AND (m.team1_id = :team OR m.team2_id = :team)";
        $params[":champ"] = (int)$championship;
        $params[":team"] = (int)$team;
    } else if (!empty($championship)) {
        $queryT = $queryT . " WHERE m.championship_id = :champ";
        $params[":champ"] = (int)$championship;
    } else if (!empty($team)) {
        $queryT = $queryT . " WHERE m.team1_id = :team OR m.team2_id = :team";
        $params[":team"] = (int)$team;
    }
    $queryT = $queryT . " ORDER BY m.modified DESC";


    $stmtT = $db->prepare($queryT);

    
    if (!empty($championship)) {
        $stmtT->bindValue(":champ", $params[":champ"], PDO::PARAM_INT);
    } 

    if (!empty($team)) {    
        $stmtT->bindValue(":team", $params[":team"], PDO::PARAM_INT);
    }

    try {
        $stmtT->execute();
        $results = $stmtT->fetch(PDO::FETCH_NUM);
        $total_results = (int)$results[0];
        return $total_results;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    
    return 0;

}

function get_results($db, $params) {
    $query = "SELECT m.id, m.championship_id, t1.name as team1, m.score1, t2.name as team2, m.score2, m.date FROM Matches m JOIN Teams t1 ON t1.id = m.team1_id JOIN Teams t2 ON t2.id = m.team2_id";


    $championship = se($params, ":champ", "", false);
    $team = se($params, ":team", "", false);
    $limit = se($params, "limit", 10, false);
    $page = se($params, "page", 1, false);
    $params = [];


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

    $offset = ($page-1) * $limit;

    $query = $query . " ORDER BY m.modified DESC LIMIT :limit OFFSET :offset";
    $params[":limit"] = $limit;
    $params[":offset"] = $offset;

    $stmt = $db->prepare($query);

    $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

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
            return $matches;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];

}

function get_total_favorite_teams($db, $params) {
    $query = "SELECT count(*) as total FROM FavoriteTeams WHERE user_id = :userID AND is_active = 1 AND team_id IN (SELECT id FROM Teams WHERE LOWER(name) LIKE LOWER(:teamName))";

    $userID = get_user_id();
    $teamName = se($params, "team", "", false);

    $stmt = $db->prepare($query);
    
    $stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
    $stmt->bindValue(":teamName", "%$teamName%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $result["total"];
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return $total;
}

function get_favorite_teams($db, $params) {
    $query = "SELECT ft.id as assoc_id, t.id as team_id, t.name as name FROM FavoriteTeams ft JOIN Teams t on ft.team_id = t.id WHERE user_id = :userID AND ft.is_active = 1 AND LOWER(name) LIKE LOWER(:teamName) ORDER BY t.name ASC";

    $userID = get_user_id();
    $teamName = se($params, "team", "", false);

    $limit = (int)se($params, "limit", 0, false);
    $offset = (int)se($params, "offset", 0, false);

    if($limit > 0) {
        $query = $query . " LIMIT :limit OFFSET :offset";
    }

    $stmt = $db->prepare($query);

    $stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
    $stmt->bindValue(":teamName", "%$teamName%", PDO::PARAM_STR);
    if($limit > 0) {
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

    }

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $teams = $results;
            return $teams;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];

}

function get_total_favorite_championships($db, $params) {
    $query = "SELECT count(*) as total FROM FavoriteChampionships WHERE user_id = :userID AND is_active = 1 AND champ_id IN (SELECT id FROM Championships WHERE LOWER(name) LIKE LOWER(:champName))";

    $userID = get_user_id();
    $champName = se($params, "champ", "", false);

    $stmt = $db->prepare($query);
    
    $stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
    $stmt->bindValue(":champName", "%$champName%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $result["total"];
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return $total;
}

function get_favorite_championships($db, $params) {
    $query = "SELECT fc.id as assoc_id, c.id as champ_id, c.name as name FROM FavoriteChampionships fc JOIN Championships c on fc.champ_id = c.id WHERE user_id = :userID AND fc.is_active = 1 AND LOWER(name) LIKE LOWER(:champName) ORDER by c.name ASC";

    $userID = get_user_id();
    $champName = se($params, "champ", "", false);

    $limit = (int)se($params, "limit", 0, false);
    $offset = (int)se($params, "offset", 0, false);

    if($limit > 0) {
        $query = $query . " LIMIT :limit OFFSET :offset";
    }

    $stmt = $db->prepare($query);

    $stmt->bindValue(":userID", $userID, PDO::PARAM_INT);
    $stmt->bindValue(":champName", "%$champName%", PDO::PARAM_STR);
    if($limit > 0) {
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

    }

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $champs = $results;
            return $champs;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];

}

function get_total_unassociated_teams($db, $params) {
    $query = "SELECT count(*) as total FROM Teams WHERE id NOT IN (SELECT DISTINCT team_id FROM FavoriteTeams WHERE is_active = 1) AND LOWER(name) LIKE LOWER(:teamName)";

    $teamName = se($params, "team", "", false);

    $stmt = $db->prepare($query);
    
    $stmt->bindValue(":teamName", "%$teamName%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $result["total"];
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return $total;
}

function get_unassociated_teams($db, $params) {
    $query = "SELECT id, name FROM Teams WHERE id NOT IN (SELECT DISTINCT team_id FROM FavoriteTeams WHERE is_active = 1) AND LOWER(name) LIKE LOWER(:teamName) ORDER BY name ASC";

    $teamName = se($params, "team", "", false);

    $limit = (int)se($params, "limit", 0, false);
    $offset = (int)se($params, "offset", 0, false);

    if($limit > 0) {
        $query = $query . " LIMIT :limit OFFSET :offset";
    }

    $stmt = $db->prepare($query);

    $stmt->bindValue(":teamName", "%$teamName%", PDO::PARAM_STR);
    if($limit > 0) {
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

    }

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $teams = $results;
            return $teams;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];

}

function get_total_unassociated_championships($db, $params) {
    $query = "SELECT count(*) as total FROM Championships WHERE id NOT IN (SELECT DISTINCT champ_id FROM FavoriteChampionships WHERE is_active = 1) AND LOWER(name) LIKE LOWER(:champName)";

    $champName = se($params, "champ", "", false);

    $stmt = $db->prepare($query);
    
    $stmt->bindValue(":champName", "%$champName%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $result["total"];
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return $total;
}

function get_unassociated_championships($db, $params) {
    $query = "SELECT id, name FROM Championships WHERE id NOT IN (SELECT DISTINCT champ_id FROM FavoriteChampionships WHERE is_active = 1) AND LOWER(name) LIKE LOWER(:champName) ORDER BY name ASC";

    $champName = se($params, "champ", "", false);

    $limit = (int)se($params, "limit", 0, false);
    $offset = (int)se($params, "offset", 0, false);

    if($limit > 0) {
        $query = $query . " LIMIT :limit OFFSET :offset";
    }

    $stmt = $db->prepare($query);

    $stmt->bindValue(":champName", "%$champName%", PDO::PARAM_STR);

    if($limit > 0) {
        $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
        $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);
    }

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $champs = $results;
            return $champs;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }
}

?>