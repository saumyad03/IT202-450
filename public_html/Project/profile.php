<?php
require_once(__DIR__ . "/../../partials/nav.php");
is_logged_in(true);
?>
<?php
if (isset($_POST["save"])) {
    $email = se($_POST, "email", null, false);
    $username = se($_POST, "username", null, false);
    $public = se($_POST, "public", "", false) == "Public" ? 1 : 0;

    $params = [":email" => $email, ":username" => $username, ":id" => get_user_id(), ":public" => $public];
    $db = getDB();
    $stmt = $db->prepare("UPDATE Users set email = :email, username = :username, public=:public where id = :id");
    try {
        $stmt->execute($params);
        flash("Profile saved", "success");
    } catch (Exception $e) {
        if ($e->errorInfo[1] === 1062) {
            //https://www.php.net/manual/en/function.preg-match.php
            preg_match("/Users.(\w+)/", $e->errorInfo[2], $matches);
            if (isset($matches[1])) {
                flash("The chosen " . $matches[1] . " is not available.", "warning");
            } else {
                //TODO come up with a nice error message
                flash("An unknown error occurred", "danger");
                error_log(var_export($e->errorInfo, true));
            }
        } else {
            //TODO come up with a nice error message
            flash("An unknown error occurred", "danger");
            error_log(var_export($e->errorInfo, true));
        }
    }


    //check/update password
    $current_password = se($_POST, "currentPassword", null, false);
    $new_password = se($_POST, "newPassword", null, false);
    $confirm_password = se($_POST, "confirmPassword", null, false);
    if (!empty($current_password) && !empty($new_password) && !empty($confirm_password)) {
        if ($new_password === $confirm_password) {
            //TODO validate current
            $stmt = $db->prepare("SELECT password from Users where id = :id");
            try {
                $stmt->execute([":id" => get_user_id()]);
                $result = $stmt->fetch(PDO::FETCH_ASSOC);
                if (isset($result["password"])) {
                    if (password_verify($current_password, $result["password"])) {
                        $query = "UPDATE Users set password = :password where id = :id";
                        $stmt = $db->prepare($query);
                        $stmt->execute([
                            ":id" => get_user_id(),
                            ":password" => password_hash($new_password, PASSWORD_BCRYPT)
                        ]);

                        flash("Password reset", "success");
                    } else {
                        flash("Current password is invalid", "warning");
                    }
                }
            } catch (Exception $e) {
                flash("An unknown error occurred", "danger");
                error_log(var_export($e->errorInfo, true));
            }
        } else {
            flash("New passwords don't match", "warning");
        }
    }
}
//select fresh data from table
$db = getDB();
$stmt = $db->prepare("SELECT id, email, username, public from Users where id = :id LIMIT 1");
try {
    $stmt->execute([":id" => get_user_id()]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    $privacy = $user["public"];
    if ($user) {
        //$_SESSION["user"] = $user;
        $_SESSION["user"]["email"] = $user["email"];
        $_SESSION["user"]["username"] = $user["username"];
        $_SESSION["user"]["public"] = $user["public"];
    } else {
        flash("User doesn't exist", "danger");
    }
} catch (Exception $e) {
    flash("An unexpected error occurred, please try again", "danger");
    error_log(var_export($e->errorInfo, true));
    //echo "<pre>" . var_export($e->errorInfo, true) . "</pre>";
}
//gets ratings
$stmt2 = $db->prepare("SELECT Products.name, Ratings.rating, Ratings.comment FROM Products INNER JOIN Ratings ON Products.id = Ratings.product_id WHERE Ratings.user_id=:user_id");
try {
    $stmt2->execute([":user_id" => get_user_id()]);
    $ratings = $stmt2->fetchAll(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    flash("Something went wrong trying to load this user's ratings", "warning");
    error_log(var_export($e->errorInfo, true));
}
?>

<?php
$email = get_user_email();
$username = get_username();
?>
<div class="container-fluid">
    <h1>Profile</h1>
    <form method="POST" onsubmit="return validate(this);">
        <div class="mb-3">
            <label class="form-label" for="email">Email</label>
            <input class="form-control" type="email" name="email" id="email" value="<?php se($email); ?>" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="username">Username</label>
            <input class="form-control" type="text" name="username" id="username" value="<?php se($username); ?>" />
        </div>
        <!-- DO NOT PRELOAD PASSWORD -->
        <div class="mb-3">Password Reset</div>
        <div class="mb-3">
            <label class="form-label" for="cp">Current Password</label>
            <input class="form-control" type="password" name="currentPassword" id="cp" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="np">New Password</label>
            <input class="form-control" type="password" name="newPassword" id="np" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="conp">Confirm Password</label>
            <input class="form-control" type="password" name="confirmPassword" id="conp" />
        </div>
        <div class="mb-3">
            <label class="form-label" for="public">Privacy</label>
            <select class="form-control" id="public" name="public">
                <option <?php if (se($user, "public", "", false) == 1) : ?>selected<?php endif; ?>>Public</option>
                <option <?php if (se($user, "public", "", false) == 0) : ?>selected<?php endif; ?>>Private</option>
            </select>
        </div>
        <input type="submit" class="mt-3 btn btn-primary" value="Update Profile" name="save" />
    </form>
</div>

<script>
    function validate(form) {
        let pw = form.newPassword.value;
        let con = form.confirmPassword.value;
        let isValid = true;
        //TODO add other client side validation....
        let email = form.email.value;
        let username = form.username.value;
        let currpw = form.cp.value;
        if (email.length === 0) {
            flash("Email must not be empty", "warning");
            isValid = false;
        } else {
            const emailRegEx = /^([a-zA-Z0-9._%-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6})*$/;
            if (!emailRegEx.test(email)) {
                flash("Invalid email address", "warning");
                isValid = false;
            }
        }
        if (username.length === 0) {
            flash("Username must not be empty", "warning");
            isValid = false;
        } else {
            const usernameRegEx = /^[a-z0-9_-]{3,16}$/;
            if (!usernameRegEx.test(username)) {
                flash("Invalid username", "warning");
                isValid = false;
            }
        }
        //If current password field is not empty
        if (currpw.length !== 0) {
            //Checks if current password is invalid
            if (currpw.length < 8) {
                flash("Current password must be at least 8 characters long", "warning");
                isValid = false;
                //If current password is valid, ensures new password follows password rules
            } else {
                if (pw.length < 8) {
                    flash("New password must be at least 8 characters long", "warning");
                    isValid = false;
                }
            }
        }
        //example of using flash via javascript
        //find the flash container, create a new element, appendChild
        if (pw !== con) {
            flash("Password and Confirm password must match", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<table class="table table-striped">
    <thead>
        <th>Product</th>
        <th>Rating</th>
        <th>Comment</th>
    </thead>
    <tbody>
        <?php if (empty($ratings)) : ?>
            <tr>
                <td colspan="100%">This user has no ratings</td>
            </tr>
        <?php else : ?>
            <?php foreach ($ratings as $rating) : ?>
                <tr>
                    <td><a class="text-decoration-none text-dark" href="more_details.php?name=<?php se($rating, "name"); ?>"><?php se($rating, "name") ?></a></td>
                    <td><?php se($rating, "rating") ?></td>
                    <td><?php se($rating, "comment") ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>