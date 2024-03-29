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


//Taher Afini, tma29
// Get the total number of active favorite teams for the current user (with and without name filter)
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
        return $total;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return 0;
}
//Taher Afini, tma29
// Get the active favorite teams for the current user (with and without name filter)
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

//Taher Afini, tma29
// Get the total number of active favorite championships for the current user (with and without name filter)
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
        return $total;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return 0;
}

//Taher Afini, tma29
// Get the active favorite championships for the current user (with and without name filter)
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

//Taher Afini, tma29
// Get the total number of teams which are not favorited by any user (with and without name filter)
function get_total_unassociated_teams($db, $params) {
    $query = "SELECT count(*) as total FROM Teams WHERE id NOT IN (SELECT DISTINCT team_id FROM FavoriteTeams WHERE is_active = 1) AND LOWER(name) LIKE LOWER(:teamName)";

    $teamName = se($params, "team", "", false);

    $stmt = $db->prepare($query);
    
    $stmt->bindValue(":teamName", "%$teamName%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $result["total"];
        return $total;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return 0;
}

//Taher Afini, tma29
// Get the teams which are not favorited by any user (with and without name filter)
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

//Taher Afini, tma29
// Get the total number of championships which are not favorited by any user (with and without name filter)
function get_total_unassociated_championships($db, $params) {
    $query = "SELECT count(*) as total FROM Championships WHERE id NOT IN (SELECT DISTINCT champ_id FROM FavoriteChampionships WHERE is_active = 1) AND LOWER(name) LIKE LOWER(:champName)";

    $champName = se($params, "champ", "", false);

    $stmt = $db->prepare($query);
    
    $stmt->bindValue(":champName", "%$champName%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $total = $result["total"];
        return $total;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return 0;
}

//Taher Afini, tma29
// Get the championships which are not favorited by any user (with and without name filter)
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

    return [];
}

//Taher Afini, tma29
// Get the total number of favorite matches for the current user (with and without team and championship filter)
function get_total_favorite_matches($db, $params) {
    $queryT = "SELECT count(m.id) FROM Matches m JOIN Teams t1 ON t1.id = m.team1_id JOIN Teams t2 ON t2.id = m.team2_id JOIN Championships c ON c.id = m.championship_id WHERE (c.id IN (SELECT DISTINCT champ_id FROM FavoriteChampionships WHERE is_active = 1 AND user_id = :userID) OR t1.id IN (SELECT DISTINCT team_id FROM FavoriteTeams WHERE is_active = 1 AND user_id = :userID) OR t2.id IN (SELECT DISTINCT team_id FROM FavoriteTeams WHERE is_active = 1 AND user_id = :userID)) AND LOWER(c.name) LIKE LOWER(:champ) AND (LOWER(t1.name) LIKE LOWER(:team) OR LOWER(t2.name) LIKE LOWER(:team))";

    $userID = get_user_id();

    $champ = se($params, ":champ", "", false);
    $team = se($params, ":team", "", false);

    $stmtT = $db->prepare($queryT);

    $stmtT->bindValue(":userID", $userID, PDO::PARAM_INT);
    $stmtT->bindValue(":champ", "%$champ%", PDO::PARAM_STR);
    $stmtT->bindValue(":team", "%$team%", PDO::PARAM_STR);

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

//Taher Afini, tma29
// Get the favorite matches for the current user (with and without team and championship filter)
function get_favorite_matches($db, $params) {
    $queryT = "SELECT  m.id, m.championship_id, t1.name as team1, m.score1, t2.name as team2, m.score2, m.date FROM Matches m JOIN Teams t1 ON t1.id = m.team1_id JOIN Teams t2 ON t2.id = m.team2_id JOIN Championships c ON c.id = m.championship_id WHERE (c.id IN (SELECT DISTINCT champ_id FROM FavoriteChampionships WHERE is_active = 1 AND user_id = :userID) OR t1.id IN (SELECT DISTINCT team_id FROM FavoriteTeams WHERE is_active = 1 AND user_id = :userID) OR t2.id IN (SELECT DISTINCT team_id FROM FavoriteTeams WHERE is_active = 1 AND user_id = :userID)) AND LOWER(c.name) LIKE LOWER(:champ) AND (LOWER(t1.name) LIKE LOWER(:team) OR LOWER(t2.name) LIKE LOWER(:team)) ORDER BY m.date DESC LIMIT :limit OFFSET :offset";

    $userID = get_user_id();

    $champ = se($params, ":champ", "", false);
    $team = se($params, ":team", "", false);
    $limit = (int)se($params, "limit", 10, false);
    $page = (int)se($params, "page", 1, false);

    $offset = ($page-1) * $limit;

    $stmtT = $db->prepare($queryT);

    $stmtT->bindValue(":userID", $userID, PDO::PARAM_INT);
    $stmtT->bindValue(":champ", "%$champ%", PDO::PARAM_STR);
    $stmtT->bindValue(":team", "%$team%", PDO::PARAM_STR);
    $stmtT->bindValue(":limit", $limit, PDO::PARAM_INT);
    $stmtT->bindValue(":offset", $offset, PDO::PARAM_INT);

    try {
        $stmtT->execute();
        $results = $stmtT->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $matches = $results;
            return $matches;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];
}

//Taher Afini, tma29
// Get the total number of user-team associations that are active (with and without user filter)
function get_total_favorited_teams_assoc($db, $params) {
    $query = "SELECT count(*) FROM FavoriteTeams WHERE is_active = 1 AND user_id IN (SELECT id FROM Users WHERE LOWER(username) LIKE LOWER(:username))";

    $username = se($params, "username", "", false);

    $stmt = $db->prepare($query);

    $stmt->bindValue(":username", "%$username%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_NUM);
        $total_results = (int)$results[0];
        return $total_results;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return 0;
}

//Taher Afini, tma29
// Get the user-team associations that are active (with and without user filter)
function get_favorited_teams_assoc($db, $params) {
    $query = "SELECT ft.id as assoc_id, t.id as team_id, t.name as team, u.username as username, u.id as user_id, (SELECT count(*) from FavoriteTeams ft2 WHERE ft2.team_id = ft.team_id AND ft2.is_active = 1) as count FROM FavoriteTeams ft JOIN Teams t on ft.team_id = t.id JOIN Users u on ft.user_id = u.id WHERE is_active = 1 AND LOWER(u.username) LIKE LOWER(:username) ORDER BY t.name ASC LIMIT :limit OFFSET :offset";

    $username = se($params, "username", "", false);

    $limit = (int)se($params, "limit", 0, false);
    $page = (int)se($params, "page", 1, false);
    
    $offset = ($page-1) * $limit;

    $stmt = $db->prepare($query);

    $stmt->bindValue(":username", "%$username%", PDO::PARAM_STR);
    $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $assocs = $results;
            return $assocs;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];
}

//Taher Afini, tma29
// Remove all user-team associations where the username matches the filter
function remove_all_favorite_team_assoc($db, $params) {
    $query = "UPDATE FavoriteTeams SET is_active = 0 WHERE user_id IN (SELECT id FROM Users WHERE LOWER(username) LIKE LOWER(:username))";

    $username = se($params, "username", "", false);

    $stmt = $db->prepare($query);

    $stmt->bindValue(":username", "%$username%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return false;
}

//Taher Afini, tma29
// Get the total number of user-championship associations that are active (with and without user filter)
function get_total_favorited_champs_assoc($db, $params) {
    $query = "SELECT count(*) FROM FavoriteChampionships WHERE is_active = 1 AND user_id IN (SELECT id FROM Users WHERE LOWER(username) LIKE LOWER(:username))";

    $username = se($params, "username", "", false);

    $stmt = $db->prepare($query);

    $stmt->bindValue(":username", "%$username%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $results = $stmt->fetch(PDO::FETCH_NUM);
        $total_results = (int)$results[0];
        return $total_results;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return 0;
}

//Taher Afini, tma29
// Get the user-championship associations that are active (with and without user filter)
function get_favorited_champs_assoc($db, $params) {
    $query = "SELECT fc.id as assoc_id, c.id as champ_id, c.name as champ, u.username as username, u.id as user_id , (SELECT count(*) from FavoriteChampionships fc2 WHERE fc2.champ_id = fc.champ_id AND fc2.is_active = 1) as count FROM FavoriteChampionships fc JOIN Championships c on fc.champ_id = c.id JOIN Users u on fc.user_id = u.id WHERE is_active = 1 AND LOWER(u.username) LIKE LOWER(:username) ORDER BY c.name ASC LIMIT :limit OFFSET :offset";

    $username = se($params, "username", "", false);

    $limit = (int)se($params, "limit", 0, false);
    $page = (int)se($params, "page", 1, false);
    
    $offset = ($page-1) * $limit;

    $stmt = $db->prepare($query);

    $stmt->bindValue(":username", "%$username%", PDO::PARAM_STR);
    $stmt->bindValue(":limit", $limit, PDO::PARAM_INT);
    $stmt->bindValue(":offset", $offset, PDO::PARAM_INT);

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            $assocs = $results;
            return $assocs;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];
}

//Taher Afini, tma29
// Remove all user-championship associations where the username matches the filter
function remove_all_favorite_champ_assoc($db, $params) {
    $query = "UPDATE FavoriteChampionships SET is_active = 0 WHERE user_id IN (SELECT id FROM Users WHERE LOWER(username) LIKE LOWER(:username))";

    $username = se($params, "username", "", false);

    $stmt = $db->prepare($query);

    $stmt->bindValue(":username", "%$username%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return false;
}

//Taher Afini, tma29
// Get the usernames of users which match the filter
function get_matching_users($db, $params) {
    $query = "SELECT id, username FROM Users WHERE LOWER(username) LIKE LOWER(:username) ORDER BY username ASC LIMIT 25";

    $username = se($params, "username", "", false);

    $stmt = $db->prepare($query);

    $stmt->bindValue(":username", "%$username%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            return $results;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];
}

//Taher Afini, tma29
// Get the teams that match the filter
function get_matching_teams($db, $params) {
    $query = "SELECT id, name FROM Teams WHERE LOWER(name) LIKE LOWER(:team) ORDER BY name ASC LIMIT 25";

    $team = se($params, "team", "", false);

    $stmt = $db->prepare($query);

    $stmt->bindValue(":team", "%$team%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            return $results;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];
}

//Taher Afini, tma29
// Get the championships that match the filter
function get_matching_championships($db, $params) {
    $query = "SELECT id, name FROM Championships WHERE LOWER(name) LIKE LOWER(:champ) ORDER BY name ASC LIMIT 25";

    $champ = se($params, "champ", "", false);

    $stmt = $db->prepare($query);

    $stmt->bindValue(":champ", "%$champ%", PDO::PARAM_STR);

    try {
        $stmt->execute();
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        if ($results) {
            return $results;
        }
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return [];
}

//Taher Afini, tma29
// Toggle all user-team associations where the username and team matches the filter
function toggle_favorite_teams($db, $user_ids, $team_ids) {
    $query = "INSERT INTO FavoriteTeams (user_id, team_id, is_active) VALUES  ";

    $values = [];
    foreach($user_ids as $i => $uid) {
        foreach($team_ids as $j => $tid) {
            $values[] = "(:user_id$i$j, :team_id$i$j, 1)";
        }
    }

    $query .= implode(",", $values);

    $query .= " ON DUPLICATE KEY UPDATE is_active = !is_active";

    $stmt = $db->prepare($query);

    foreach($user_ids as $i => $uid) {
        foreach($team_ids as $j => $tid) {
            $stmt->bindValue(":user_id$i$j", $uid, PDO::PARAM_INT);
            $stmt->bindValue(":team_id$i$j", $tid, PDO::PARAM_INT);
        }
    }

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return false;
}

//Taher Afini, tma29
// Toggle all user-championship associations where the username and championship matches the filter
function toggle_favorite_championships($db, $user_ids, $champ_ids) {
    $query = "INSERT INTO FavoriteChampionships (user_id, champ_id, is_active) VALUES  ";

    $values = [];
    foreach($user_ids as $i => $uid) {
        foreach($champ_ids as $j => $cid) {
            $values[] = "(:user_id$i$j, :champ_id$i$j, 1)";
        }
    }

    $query .= implode(",", $values);

    $query .= " ON DUPLICATE KEY UPDATE is_active = !is_active";

    $stmt = $db->prepare($query);

    foreach($user_ids as $i => $uid) {
        foreach($champ_ids as $j => $cid) {
            $stmt->bindValue(":user_id$i$j", $uid, PDO::PARAM_INT);
            $stmt->bindValue(":champ_id$i$j", $cid, PDO::PARAM_INT);
        }
    }

    try {
        $stmt->execute();
        return true;
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }

    return false;
}

?>