<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$userID = get_user_id();
$team = se($_GET, "team", "", false);

$db = getDB();

$total = get_total_favorite_teams($db, []);

$teams = get_favorite_teams($db, ["team"=>$team]);

$total_pages = ceil($total);

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
    global $params;
    $filter_params = [];
    if(isset($params[":champ"])) {
        $filter_params["championship"] = $params[":champ"];
    }
    if(isset($params[":team"])) {
        $filter_params["team"] = $params[":team"];
    }
    $filter_params["limit"] = se($params, "limit", 10, false);
    echo http_build_query($filter_params) . "&page=" . $page;
}

?>

<h1>Favorite Teams (<?php echo $total ?>)</h1>


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
                            <form method="GET">
                                <button class="btn btn-primary" type="submit" >Details</button>
                            </form>
                            <form method="GET">
                                <button class="btn btn-outline-dark" type="submit" >Remove from Favorites</button>
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