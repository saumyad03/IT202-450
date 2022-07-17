<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1 class="left-margin">Shop</h1>
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
    $query = "SELECT name, unit_price FROM Products WHERE visibility=1";
    $params = [];
    if (isset($_POST["search"])) {
        $search = $_POST["search"];
        if ($search != '') {
            $query .= " AND name LIKE :search";
            $params[":search"] = "%$search%";
        }
    }
    if (isset($_POST["category"])) {
        $category = $_POST["category"];
        if ($category != "all") {
            $query .= " AND category=:category";
            $params[":category"] = $category;
        }
    }
    if (isset($_POST["min-price"])) {
        $min = $_POST["min-price"];
        if ($min != "") {
            $query .= " AND unit_price >= :min";
            $params[":min"] = $min;
        }
    }
    if (isset($_POST["max-price"])) {
        $max = $_POST["max-price"];
        if ($max != "") {
            $query .= " AND unit_price <= :max";
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
<form class="row offset-lg-2" method="post" onsubmit="return validate(this)">
    <div class="col-auto">
        <label class="form-label" for="search">Search</label>
        <input class="form-control" name="search" id="search" placeholder="Search" value="<?php se($search); ?>">
    </div>
    <div class="col-auto">
        <label class="form-label" for="category">Category</label>
        <select class="form-select" aria-label="Category" name="category" id="category">
            <option value="all" <?php if (se($category, null, "", false) == "all") : ?>selected<?php endif; ?>>All</option>
            <option value="sports" <?php if (se($category, null, "", false) == "sports") : ?>selected<?php endif; ?>>Sports</option>
            <option value="electronics" <?php if (se($category, null, "", false) == "electronics") : ?>selected<?php endif; ?>>Electronics</option>
            <option value="other" <?php if (se($category, null, "", false) == "other") : ?>selected<?php endif; ?>>Other</option>
        </select>
    </div>
    <div class="col-auto">
        <label class="form-label" for="min-price">Minimum Price</label>
        <input class="form-control" type="number" step="0.01" name="min-price" id="min-price" value="<?php se($min); ?>">
    </div>
    <div class="col-auto">
        <label class="form-label" for="max-price">Maximum Price</label>
        <input class="form-control" type="number" step="0.01" name="max-price" id="max-price" value="<?php se($max); ?>">
    </div>
    <div class="col-auto">
        <div class="form-label invisible">Blank Text</div>
        <input class="form-control btn btn-primary" type="submit" value="Search">
    </div>
</form>
<div class="container-fluid">
    <div class="row row-cols-sm-2 row-cols-xs-1 row-cols-md-3 row-cols-lg-6 g-4">
        <?php foreach ($results as $result) : ?>
            <div class="col">
                <div class="card bg-light">
                    <div class="card-body">
                        <a class="text-dark text-decoration-none" href="more_details.php?name=<?php se($result, "name"); ?>">
                            <h5 class="card-title"><?php se($result, "name"); ?></h5>
                        </a>
                        <p class="card-text">$<?php se($result, "unit_price"); ?></p>
                        <?php if (has_role("Admin") || has_role("Shop Owner")) : ?>
                            <a href="edit_product.php?name=<?php se($result, "name"); ?>">
                                <div class="btn btn-secondary">Edit</div>
                            </a>
                        <?php endif; ?>
                    </div>
                    <?php if (is_logged_in()) : ?>
                        <div class="card-footer">
                            <form method="post" action="cart.php">
                                <input type="hidden" name="name" value="<?php se($result, "name"); ?>" />
                                <input type="submit" class="btn btn-primary" value="Add to Cart" />
                            </form>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>