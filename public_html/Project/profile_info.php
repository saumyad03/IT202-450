<?php
require(__DIR__ . "/../../partials/nav.php");

if (isset($_GET["username"])) {
    $username = $_GET["username"];
    if (get_username() == $username) {
        redirect($BASE_PATH . "/profile.php");
    }
    $db = getDB();
    //gets email and privacy settings
    $stmt = $db->prepare("SELECT id, email, username, public FROM Users WHERE username=:username");
    try {
        $stmt->execute([":username"=>$username]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $user_id = $result["id"];
        //if profile is private, redirects and flashes appropriate message
        if ($result["public"] == 0) {
            flash("This user's profile is not public", "warning");
            redirect($BASE_PATH . "/home.php");
        }
    } catch(PDOException $e) {
        flash("Something went wrong trying to load this user's profile", "warning");
        error_log(var_export($e->errorInfo, true));
    }
    //gets ratings
    $stmt2 = $db->prepare("SELECT Products.name, Ratings.rating, Ratings.comment FROM Products INNER JOIN Ratings ON Products.id = Ratings.product_id WHERE Ratings.user_id=:user_id");
    try {
        $stmt2->execute([":user_id"=>$user_id]);
        $ratings = $stmt2->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        flash("Something went wrong trying to load this user's ratings", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
?>
<h1 class="left-margin">@<?php se($username) ?></h1>
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