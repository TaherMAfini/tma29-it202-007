<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}

$db = getDB();

$username = se($_GET, "username", "", false);
$limit = (int)se($_GET, "limit", 10, false);

if($limit > 100 || $limit < 1) {
    $limit = 10;
}

$page = (int)se($_GET, "page", 1, false);

$offset = ($page-1)*$limit;

$total = get_total_favorited_teams_assoc($db, []);

$favorites = get_favorited_teams_assoc($db, ["username"=>$username, "limit"=>$limit, "page"=>$page]);
$cur_total = get_total_favorited_teams_assoc($db, ["username"=>$username]);

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
    global $limit;
    $filter_params = [];
    $filter_params["limit"] = se($limit, null, 10, false);
    echo http_build_query($filter_params) . "&page=" . $page;
}

?>

<div class="container-fluid">
    <h1>All Favorite Teams (<?php se($total)?>)</h1>

    <form method="GET" class="list-filter mt-5">
        <div class="team-filter">
            <label class="form-label" for="team"><h4>Username</h4></label>
            <input class="form-control w-50" type="text" name="username" value="<?php se($username) ?>" />
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

    <h3>Items on Page: <?php se(count($favorites))?></h3>

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
        <table class="table table-secondary fav-assocs">
            <thead>
                <th>User</th>
                <th>Team</th>
                <th>Total Associated Users</th>
                <th>Actions</th>
            </thead>
            <tbody>
                <?php if (empty($favorites)) : ?>
                    <tr>
                        <td colspan="100%">No results available</td>
                    </tr>
                <?php else : ?>
                    <?php foreach ($favorites as $fav) : ?>
                        <tr>
                            <td class="col-4"><span class="team-name"><?php se($fav["username"], null, ""); ?></span></td>
                            <td class="col-4"><span class="team-name"><?php se($fav["team"], null, ""); ?></span></td>
                            <td class="col-2"></span></td>
                            <td class="col-2">
                                <form method="GET" action="<?php se(get_url("teamDetails.php"))?>">
                                    <input type="hidden" name="teamID" value="<?php se($fav["team_id"], null, ""); ?>"/>
                                    <button class="btn btn-primary" type="submit" >Details</button>
                                </form>
                                <form method="GET" action="<?php se(get_url("removeFavoriteTeam.php"))?>">
                                    <input type="hidden" name="teamID" value="<?php se($fav["team_id"], null, ""); ?>"/>
                                    <input type="hidden" name="teamName" value="<?php se($fav["team"], null, ""); ?>"/>
                                    <input type="hidden" name="username" value="<?php se($username) ?>"/>
                                    <input type="hidden" name="limit" value="<?php se($limit, null, 10); ?>"/>
                                    <input type="hidden" name="page" value="<?php se($page, null, 1); ?>"/>
                                    <button class="btn btn-outline-danger btn-sm" type="submit" >Remove from Favorites</button>
                                </form>
                            </td>
                        </tr>
                        
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

</div>

<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>