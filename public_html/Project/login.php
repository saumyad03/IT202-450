<?php
require_once(__DIR__ . "/../../partials/nav.php");
?>
<div class="container-fluid">
    <h1>Login</h1>
    <form onsubmit="return validate(this)" method="POST">
        <div class="mb-3">
            <label class="form-label" for="email">Username/Email</label>
            <input class="form-control" type="text" id="email" name="email" required />
        </div>
        <div class="mb-3">
            <label class="form-label" for="pw">Password</label>
            <input class="form-control" type="password" id="pw" name="password" required minlength="8" />
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Login" />
    </form>
</div>
<script>
    function validate(form) {
        //TODO 1: implement JavaScript validation
        //ensure it returns false for an error and true for success
        let isValid = true;
        let email = form.email.value;
        let password = form.password.value;
        if (email.length === 0) {
            flash("Email/username must not be empty", "warning");
            isValid = false;
        }
        if (email.includes("@")) {
            const emailRegEx = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
            if (!emailRegEx.test(email)) {
                flash("Invalid email address", "warning");
                isValid = false;
            }
        } else {
            const usernameRegEx = /^[a-z0-9_-]{3,16}$/;
            if (!usernameRegEx.test(email)) {
                flash("Invalid username", "warning");
                isValid = false;
            }
        }
        if (password.length === 0) {
            flash("Password must not be empty", "warning");
            isValid = false;
        }
        if (password.length < 8) {
            flash("Password must be at least 8 characters long", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<?php
    //TODO 2: add PHP Code
    if(isset($_POST["email"]) && isset($_POST["password"])) {
        $email = se($_POST, "email", "", false); //$_POST["email"];
        $password = se($_POST, "password", "", false); //$_POST["password"];
        //TODO 3: validate/use
        $hasError = false;
        if (empty($email)) {
            flash("Email/username must not be empty");
            $hasError = true;
        }
        if (str_contains($email, "@")) {
            //sanitize
            $email = sanitize_email($email);
            //validate
            if (!is_valid_email($email)) {
                flash("Invalid email address");
                $hasError = true;
            }
        } else {
            if (!is_valid_username($email)) {
                flash("Invalid username");
                $hasError = true;
            }
        }
        if (empty($password)) {
            flash("Password must not be empty");
            $hasError = true;
        }
        if (strlen($password) < 8) {
            flash("Password must be at least 8 characters long");
            $hasError = true;
        }
        if (!$hasError) {
            //TODO 4
            $db = getDB();
            $stmt = $db->prepare("SELECT id, email, username, password from Users where email = :email or username=:email");
            try {
                $r = $stmt->execute([":email" => $email]);
                if ($r) {
                    $user = $stmt->fetch(PDO::FETCH_ASSOC);
                    if ($user) {
                        $hash = $user["password"];
                        unset($user["password"]);
                        if (password_verify($password, $hash)) {
                            $_SESSION["user"] = $user;
                            try {
                                //lookup potential roles
                                $stmt = $db->prepare("SELECT Roles.name FROM Roles 
                            JOIN UserRoles on Roles.id = UserRoles.role_id 
                            where UserRoles.user_id = :user_id and Roles.is_active = 1 and UserRoles.is_active = 1");
                                $stmt->execute([":user_id" => $user["id"]]);
                                $roles = $stmt->fetchAll(PDO::FETCH_ASSOC); //fetch all since we'll want multiple
                            } catch (Exception $e) {
                                flash("An unknown error occurred", "danger");
                                error_log(var_export($e, true));
                            }
                            //save roles or empty array
                            if (isset($roles)) {
                                $_SESSION["user"]["roles"] = $roles; //at least 1 role
                            } else {
                                $_SESSION["user"]["roles"] = []; //no roles
                            }
                            flash("Welcome, " . get_username());
                            redirect($BASE_PATH  . "Location: home.php");
                        } else {
                            flash("Invalid password");
                        }
                    } else {
                        flash("Email/username not found");
                    }
                }
            } catch (Exception $e) {
                flash("An unknown error occurred", "danger");
                error_log(var_export($e, true));
            }
        }
    }
?>
<?php require_once(__DIR__."/../../partials/flash.php");