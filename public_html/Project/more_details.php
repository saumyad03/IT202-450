<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1>More Details</h1>
<?php
//if no query parameter redirect to home page
if (!isset($_GET["name"])) {
    die(header("Location: $BASE_PATH" . "/home.php"));
} //Otherwise get more details
else {
    $name = $_GET["name"];
    $db = getDB();
    $stmt = $db->prepare("SELECT description, unit_price, stock, category FROM Products WHERE name=:name");
    try {
        $stmt->execute([":name" => $name]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        flash("An unknown error occurred, please try again later", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
?>
<ul>
    <div class="display-3"><?php se($name) ?></div>
    <div class="display-6">$<?php se($results, "unit_price") ?></div>
    <p><?php se($results, "description") ?><br><span class="bold-text">Stock:</span> <?php se($results, "stock") ?><br><span class="bold-text">Category:</span> <?php se($results, "category") ?></p>
    <?php if (has_role("Admin") || has_role("Shop Owner")) : ?>
        <a href="edit_product.php?name=<?php se($name); ?>">
            <div class="btn btn-secondary">Edit</div>
        </a>
    <?php endif; ?>
    <br><br>
    <?php if (is_logged_in()) : ?>
        <form method="post" action="cart.php">
            <input type="hidden" name="name" value="<?php se($name); ?>" />
            <input type="submit" class="btn btn-primary" value="Add to Cart" />
        </form>
    <?php endif; ?>
</ul>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>