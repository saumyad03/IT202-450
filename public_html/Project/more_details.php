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
    <li><?php se($name) ?></li>
    <li><?php se($results, "description") ?></li>
    <li>$<?php se($results, "unit_price") ?></li>
    <li>Stock: <?php se($results, "stock") ?></li>
    <li>Category: <?php se($results, "category") ?></li>

</ul>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>