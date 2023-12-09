//Taher Afini, tma29
// Display all user-championship favorite pairs with links to championship details, link to user profile and link to remove from favorites


<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}

$db = getDB();

//Handle removal of all favorite championships for users that partially match the filter
if(isset($_POST["action"]) && $_POST["action"] == "delete_all") {

    $removeAll = remove_all_favorite_champ_assoc($db, ["username"=>$_POST["username"]]);
    if($removeAll) {
        flash("Removed all favorite championships for users with \"" . $_POST["username"] . "\" in their username", "success");
    } else {
        flash("Error removing all favorite championships for users with \"" . $_POST["username"] . "\" in their username", "danger");
    }
    $_GET["username"] = $_POST["username"];
    $_GET["limit"] = $_POST["limit"];
    $_GET["page"] = $_POST["page"];
}

$username = se($_GET, "username", "", false);
$limit = (int)se($_GET, "limit", 10, false);

if($limit > 100 || $limit < 1) {
    $limit = 10;
}

$page = (int)se($_GET, "page", 1, false);

$offset = ($page-1)*$limit;

$total = get_total_favorited_champs_assoc($db, []);

$favorites = get_favorited_champs_assoc($db, ["username"=>$username, "limit"=>$limit, "page"=>$page]);
$cur_total = get_total_favorited_champs_assoc($db, ["username"=>$username]);

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
    global $username;
    $filter_params = [];
    $filter_params["username"] = se($username, null, "", false);
    $filter_params["limit"] = se($limit, null, 10, false);
    echo http_build_query($filter_params) . "&page=" . $page;
}

//Get the url for a user's public profile
function get_profile_url($user_id) {
    $params = [];
    $params["id"] = $user_id;
    return get_url("user_profile.php") . "?" . http_build_query($params);
}

?>

<div class="container-fluid">
    <h1>All Favorite Championships (<?php se($total)?>)</h1>

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

    <?php if ($username !== "" && !empty($favorites) ): ?>
        <form method="POST">
            <input type="hidden" name="username" value="<?php se($username) ?>"/>
            <input type="hidden" name="limit" value="<?php se($limit, null, 10); ?>"/>
            <input type="hidden" name="page" value="<?php se($page, null, 1); ?>"/>
            <input type="hidden" name="action" value="delete_all"/>
            <button class="btn btn-danger" type="submit" >Remove All Favorite Championships for users with "<?php se($username)?>" in their username</button>
        </form>
    <?php endif; ?>

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

//Taher Afini, tma29
// Display all user-championship favorited pairs with a link to championship details, link to user profile and link to remove from favorites as well as a count of how many users have favorited the championship
    <div class="row justify-content-center">
        <table class="table table-secondary fav-assocs">
            <thead>
                <th>User</th>
                <th>Championship</th>
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
                            <td class="col-4"><span class="team-name"><a href="<?php echo get_profile_url($fav["user_id"])?>"><?php se($fav["username"], null, ""); ?></a></span></td>
                            <td class="col-4"><span class="team-name"><?php se($fav["champ"], null, ""); ?></span></td>
                            <td class="col-2"><span class="team-name"><?php se($fav["count"])?></span></td>
                            <td class="col-2">
                                <form method="GET" action="<?php se(get_url("championshipDetails.php"))?>">
                                    <input type="hidden" name="champID" value="<?php se($fav["champ_id"], null, ""); ?>"/>
                                    <button class="btn btn-primary" type="submit" >Details</button>
                                </form>
                                <form method="GET" action="<?php se(get_url("removeFavoriteChampionship.php"))?>">
                                    <input type="hidden" name="champID" value="<?php se($fav["champ_id"], null, ""); ?>"/>
                                    <input type="hidden" name="champName" value="<?php se($fav["champ"], null, ""); ?>"/>
                                    <input type="hidden" name="username" value="<?php se($username) ?>"/>
                                    <input type="hidden" name="limit" value="<?php se($limit, null, 10); ?>"/>
                                    <input type="hidden" name="page" value="<?php se($page, null, 1); ?>"/>
                                    <input type="hidden" name="return" value="all_favorite_championships"/>
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