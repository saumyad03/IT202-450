<?php
require(__DIR__ . "/../../partials/nav.php");

if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
if (isset($_GET["username"])) {
    $username = $_GET["username"];
}
?>
<h1 class="left-margin">@<?php se($username) ?></h1>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>