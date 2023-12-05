<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$db = getDB();

$userID = get_user_id();

if(isset($_POST["removeAll"])) {
    $queryD = "UPDATE FavoriteTeams SET is_active = 0 WHERE user_id = :userID";
    $stmtD = $db->prepare($queryD);

    $stmtD->bindValue(":userID", $userID, PDO::PARAM_INT);

    try {
        $stmtD->execute();
        flash("Removed all favorited teams.", "success");
    } catch (PDOException $e) {
        flash(var_export($e->errorInfo, true), "danger");
    }
}


$teamFilter = se($_GET, "team", "", false);
$limit = se($_GET, "limit", 10, false);

if($limit > 100 || $limit < 1) {
    $limit = 10;
}

$page = se($_GET, "page", 1, false);

$offset = ($page-1)*$limit;

$total = get_total_favorite_teams($db, []);

$teams = get_favorite_teams($db, ["team"=>$teamFilter, "limit"=>$limit, "offset"=>$offset]);

$cur_total = get_total_favorite_teams($db, ["team"=>$teamFilter]);

$total_pages = ceil($cur_total/$limit);

function disable_prev($page) {
    echo $page < 1 ? "disabled" : ""; 
}

function set_active($page, $i) {
    echo ($page-1) == $i ? "active" : "";
}

function disable_next($page) {
    global $total_pages;
    echo $page >= $total_pages ? "disabled" : "";
}

function get_page_url($page) {
    global $teamFilter;
    global $limit;
    $filter_params = [];
    $filter_params["team"] = se($teamFilter, null, "", false);
    $filter_params["limit"] = se($limit, null, 10, false);
    echo http_build_query($filter_params) . "&page=" . $page;
}

?>

<h1>Favorite Teams (<?php echo $total ?>)</h1>

<form method="POST">
    <input type="hidden" name="removeAll" value="removeAll" />
    <button class="btn btn-danger" type="submit" >Remove All Favorites</button>
</form>


<form method="GET" class="list-filter mt-5">
    <div class="team-filter">
        <label class="form-label" for="team"><h4>Team</h4></label>
        <input class="form-control w-50" type="text" name="team" value="<?php se($teamFilter) ?>" />
    </div>
    <div class="limit">
        <label class="form-label" for="limit"><h4>Items/Page (1-100)</h4></label>
        <input class="form-control w-25" type="number" name="limit" id="limit" value=<?php se($limit) ?>>
    </div>
    <?php render_button(["type"=>"submit", "text"=>"Filter"]); ?>
</form>

<form method="GET" class="clear-filter">
    <div class="clear-filter">
        <?php render_button(["type"=>"submit", "text"=>"Clear Filter", "color"=>"secondary"]); ?>
    </div>
</form>

<h3>Items on Page: <?php se($cur_total)?></h3>


<div>
    <ul class="pagination justify-content-center">
        <li class="page-item <?php disable_prev(($page-1))?>">
            <a class="page-link" href="?<?php get_page_url($page-1); ?>" tabindex="-1">Previous</a>
        </li>
        <?php for ($i = 0; $i < $total_pages; $i++) : ?>
            <li class="page-item <?php set_active($page, $i); ?>"><a class="page-link" href="?<?php get_page_url($i+1) ?>"><?php echo ($i + 1); ?></a></li>
        <?php endfor; ?>
        <li class="page-item <?php disable_next(($page)); ?>">
            <a class="page-link" href="?<?php get_page_url($page+1); ?>">Next</a>
        </li>
    </ul>
</div>

<div class="row justify-content-center">
    <table class="table table-secondary fav-teams">
        <thead>
            <th>Team</th>
            <th>Actions</th>
        </thead>
        <tbody>
            <?php if (empty($teams)) : ?>
                <tr>
                    <td colspan="100%">No results available</td>
                </tr>
            <?php else : ?>
                <?php foreach ($teams as $team) : ?>
                    <tr>
                        <td class="col-8"><span class="team-name"><?php se($team["name"], null, ""); ?></span></td>
                        <td class="col-4">
                            <form method="GET" action="<?php se(get_url("teamDetails.php"))?>">
                                <input type="hidden" name="teamID" value="<?php se($team["team_id"], null, ""); ?>"/>
                                <button class="btn btn-primary" type="submit" >Details</button>
                            </form>
                            <form method="GET" action="<?php se(get_url("removeFavoriteTeam.php"))?>">
                                <input type="hidden" name="teamID" value="<?php se($team["team_id"], null, ""); ?>"/>
                                <input type="hidden" name="teamName" value="<?php se($team["name"], null, ""); ?>"/>
                                <input type="hidden" name="filterName" value="<?php se($teamFilter) ?>"/>
                                <input type="hidden" name="limit" value="<?php se($limit, null, 10); ?>"/>
                                <input type="hidden" name="page" value="<?php se($page, null, 1); ?>"/>
                                <button class="btn btn-outline-danger" type="submit" >Remove from Favorites</button>
                            </form>
                        </td>
                    </tr>
                    
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>