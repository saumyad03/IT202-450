<?php
require(__DIR__ . "/../../partials/nav.php");
if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
?>
<h1>Home</h1>
<?php

if (is_logged_in(false)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
//default variables needed for conditional html below
$category = 'all';
$search = '';
$min = '';
$max = '';
$results = [];
//Server Side Validation of Min and Max Price
$isValid = true;
if (isset($_POST["min-price"]) && isset($_POST["max-price"])) {
    if ($_POST["min-price"] != "" && $_POST["max-price"] != "" && $_POST["min-price"] > $_POST["max-price"]) {
        flash("Minimum price cannot be higher than maximum price", "warning");
        $isValid = false;
    }
}
if ($isValid) {
    $db = getDB();
    $query = "SELECT name, unit_price FROM Products";
    $params = [];
    if (isset($_POST["search"])) {
        $search = $_POST["search"];
        if ($search != '') {
            $query .= " WHERE name LIKE :search";
            $params[":search"] = "%$search%";
        }
    }
    if (isset($_POST["category"])) {
        $category = $_POST["category"];
        if ($category != "all") {
            if (!strpos($query, "WHERE")) {
                $query .= " WHERE category=:category";
            } else {
                $query .= " AND category=:category";
            }
            $params[":category"] = $category;
        }
    }
    if (isset($_POST["min-price"])) {
        $min = $_POST["min-price"];
        if ($min != "") {
            if (!strpos($query, "WHERE")) {
                $query .= " WHERE unit_price >= :min";
            } else {
                $query .= " AND unit_price >= :min";
            }
            $params[":min"] = $min;
        }
    }
    if (isset($_POST["max-price"])) {
        $max = $_POST["max-price"];
        if ($max != "") {
            if (!strpos($query, "WHERE")) {
                $query .= " WHERE unit_price <= :max";
            } else {
                $query .= " AND unit_price <= :max";
            }
            $params[":max"] = $max;
        }
    }
    $query .= " ORDER BY modified DESC LIMIT 10";
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        flash("An unknown error occurred with loading the products", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
//TODO CACHE DATABASE RESULTS
?>
<script>
    //Client Side Validation
    function validate(form) {
        let isValid = true;
        if (form["min-price"].value != "" && form["max-price"].value != "" && form["min-price"].value > form["max-price"].value) {
            flash("Minimum price cannot be higher than maximum price", "warning");
            isValid = false;
        }
        return isValid;
    }
</script>
<form method="post" onsubmit="return validate(this)">
    <label for="search">Search</label>
    <input name="search" id="search" placeholder="Search" value="<?php se($search); ?>">
    <label for="category">Category</label>
    <select name="category" id="category">
        <option value="all" <?php if (se($category, null, "", false) == "all") : ?>selected<?php endif; ?>>All</option>
        <option value="sports" <?php if (se($category, null, "", false) == "sports") : ?>selected<?php endif; ?>>Sports</option>
        <option value="electronics" <?php if (se($category, null, "", false) == "electronics") : ?>selected<?php endif; ?>>Electronics</option>
        <option value="other" <?php if (se($category, null, "", false) == "other") : ?>selected<?php endif; ?>>Other</option>
    </select>
    <label for="min-price">Minimum Price</label>
    <input type="number" step="0.01" name="min-price" id="min-price" value="<?php se($min); ?>">
    <label for="max-price">Maximum Price</label>
    <input type="number" step="0.01" name="max-price" id="max-price" value="<?php se($max); ?>">
    <input type="submit" value="Search">
</form>
<table class="table">
    <thead>
        <th>Name</th>
        <th>Edit</th>
        <th>Price</th>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">No products</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $result) : ?>
                <tr>
                    <td><a href="more_details.php?name=<?php se($result, "name"); ?>"><?php se($result, "name"); ?></a></td>
                    <td><a href="edit_product.php?name=<?php se($result, "name"); ?>">Edit</a></td>
                    <td>$<?php se($result, "unit_price"); ?></td>
                    <td><a href="cart.php?name=<?php se($result, "name"); ?>">Add To Cart</a></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</table>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>