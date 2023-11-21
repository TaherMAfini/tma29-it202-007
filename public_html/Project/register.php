<?php
require(__DIR__ . "/../../partials/nav.php");
reset_session();
?>
<form onsubmit="return validate(this)" method="POST">
    <?php render_input(["type"=>"email", "id"=>"email", "name"=>"email", "label"=>"Email", "width"=>"w-25", "rules"=>["required"=>true]]);?>
    <?php render_input(["type"=>"text", "id"=>"username", "name"=>"username", "label"=>"Username", "width"=>"w-25", "rules"=>["required"=>true, "maxlength"=>"30"]]);?>
    <?php render_input(["type"=>"password", "id"=>"pw", "name"=>"password", "label"=>"Password", "width"=>"w-25", "rules"=>["required"=>true, "minlength"=>"8"]]);?>
    <?php render_input(["type"=>"password", "id"=>"confirm", "name"=>"confirm", "label"=>"Confirm", "width"=>"w-25", "rules"=>["required"=>true, "minlength"=>"8"]]);?>
    <?php render_button(["type"=>"submit", "text"=>"Register"]); ?>
</form>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        const emailMatch = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
        const usernameMatch = /^[a-z0-9_-]{3,16}$/;
        let email = form.email.value.trim();
        let username = form.username.value.trim();
        let password = form.password.value;
        let confirm = form.confirm.value;
        let valid = true;

        if(email.length === 0){
            flash("Email must not be empty", "danger");
            valid = false;
        }
        if(username.length === 0){
            flash("Username must not be empty", "danger");
            valid = false;
        }
        if(password.length === 0){
            flash("Password must not be empty", "danger");
            valid = false;
        }
        if(confirm.length === 0){
            flash("Confirm password must not be empty", "danger");
            valid = false;
        }

        if(!emailMatch.test(email)){
            flash("Invalid email address", "danger");
            valid = false;
        }
        if(!usernameMatch.test(username)){
            flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
            valid = false;
        }

        if(password.length < 8){
            flash("Password too short", "danger");
            valid = false;
        }

        if(password.length > 0 && password !== confirm){
            flash("Passwords must match", "danger");
            valid = false;
        }
        return valid;
    }
</script>
<?php
//TODO 2: add PHP Code
if (isset($_POST["email"]) && isset($_POST["password"]) && isset($_POST["confirm"]) && isset($_POST["username"])) {
    $email = se($_POST, "email", "", false);
    $password = se($_POST, "password", "", false);
    $confirm = se($_POST, "confirm", "", false);
    $username = se($_POST, "username", "", false);
    //TODO 3
    $hasError = false;
    if (empty($email)) {
        flash("Email must not be empty", "danger");
        $hasError = true;
    }
    //sanitize
    $email = sanitize_email($email);
    //validate
    if (!is_valid_email($email)) {
        flash("Invalid email address", "danger");
        $hasError = true;
    }
    if (!is_valid_username($username)) {
        flash("Username must only contain 3-16 characters a-z, 0-9, _, or -", "danger");
        $hasError = true;
    }
    if (empty($password)) {
        flash("password must not be empty", "danger");
        $hasError = true;
    }
    if (empty($confirm)) {
        flash("Confirm password must not be empty", "danger");
        $hasError = true;
    }
    if (!is_valid_password($password)) {
        flash("Password too short", "danger");
        $hasError = true;
    }
    if (
        strlen($password) > 0 && $password !== $confirm
    ) {
        flash("Passwords must match", "danger");
        $hasError = true;
    }
    if (!$hasError) {
        //TODO 4
        $hash = password_hash($password, PASSWORD_BCRYPT);
        $db = getDB();
        $stmt = $db->prepare("INSERT INTO Users (email, password, username) VALUES(:email, :password, :username)");
        try {
            $stmt->execute([":email" => $email, ":password" => $hash, ":username" => $username]);
            flash("Successfully registered!", "success");
        } catch (Exception $e) {
            users_check_duplicate($e->errorInfo);
        }
    }
}
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>