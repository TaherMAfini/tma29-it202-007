<?php
require(__DIR__ . "/../../partials/nav.php");

if (is_logged_in(true)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}

$db = getDB();

$championship = se($_GET, "championship", "", false);
$team = se($_GET, "team", "", false);
$limit = (int)se($_GET, "limit", 10, false);
$page = (int)se($_GET, "page", 1, false);

$total = get_total_favorite_matches($db, []);

$cur_total = get_total_favorite_matches($db, [":champ"=>$championship, ":team"=>$team, "limit"=>$limit, "page"=>$page]);

$total_pages = ceil($cur_total / $limit);

$matches = get_favorite_matches($db, [":champ"=>$championship, ":team"=>$team, "limit"=>$limit, "page"=>$page]);

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
    global $championship;
    global $team;
    global $limit;
    $filter_params = [];
    if($championship !== "") {
        $filter_params["championship"] = $championship;
    }
    if($team !== "") {
        $filter_params["team"] = $team;
    }
    $filter_params["limit"] = se($limit, "limit", 10, false);
    echo http_build_query($filter_params) . "&page=" . $page;
}
?>

<h1 class="mb-5">Home (<?php se($total)?>)</h1>

<form method="GET" class="list-filter">
    <div class="team-filter">
        <label class="form-label" for="championship"><h4>Championship</h4></label>
        <input class="form-control w-50" type="text" name="championship" value="<?php se($championship) ?>" />
    </div>    
    <div class="team-filter">
        <label class="form-label" for="team"><h4>Team</h4></label>
        <input class="form-control w-50" type="text" name="team" value="<?php se($team) ?>" />
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

<h3>Items on page: <?php se(count($matches))?></h3>


<div class="container-fluid">
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
                    </td>
                </tr>
                
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>

<?php
require(__DIR__ . "/../../partials/flash.php");
?>