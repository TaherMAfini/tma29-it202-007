<?php
//note we need to go up 1 more directory
require(__DIR__ . "/../../../partials/nav.php");

if (!has_role("Admin")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: " . get_url("home.php")));
}

if (isset($_POST["name"]) && isset($_POST["description"])) {
    $name = se($_POST, "name", "", false);
    $desc = se($_POST, "description", "", false);
    if (empty($name)) {
        flash("Name is required", "warning");
    } else {
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Roles (name, description, is_active) VALUES(:name, :desc, 1)");
        try {
            $stmt->execute([":name" => $name, ":desc" => $desc]);
            flash("Successfully created role $name!", "success");
        } catch (PDOException $e) {
            if ($e->errorInfo[1] === 1062) {
                flash("A role with this name already exists, please try another", "warning");
            } else {
                flash(var_export($e->errorInfo, true), "danger");
            }
        }
    }
}
?>
<h1>Create Role</h1>
<form method="POST">
    <div class="mb-3 w-25">
        <label for="name" class="form-label">Name</label>
        <input id="name" class="form-control" name="name" required />
    </div>
    <div class="mb-3 w-50">
        <label for="d" class="form-label">Description</label>
        <textarea name="description" class="form-control" id="d"></textarea>
    </div>
    <?php render_button(["text"=>"Create Role", "type"=>"submit"]); ?>
</form>
<?php
//note we need to go up 1 more directory
require_once(__DIR__ . "/../../../partials/flash.php");
?>