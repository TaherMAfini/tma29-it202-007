<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}


$teamFilter = se($_GET, "team", "", false);
$limit = se($_GET, "limit", 10, false);

if($limit > 100 || $limit < 1) {
    $limit = 10;
}

$page = se($_GET, "page", 1, false);

$offset = ($page-1)*$limit;

$total = 1;

$teams = [];

$cur_total = 1;

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

<div class="container-fluid">
    <h1>Unassociated Teams (<?php se($total)?>)</h1>

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
                            <td class="col-4"></td>
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