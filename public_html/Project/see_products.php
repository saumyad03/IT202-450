<?php
require(__DIR__ . "/../../partials/nav.php");
if (!has_role("Admin") && !has_role("Shop Owner")) {
    flash("You don't have permission to view this page", "warning");
    die(header("Location: $BASE_PATH" . "/home.php"));
}
?>
<h1 class="left-margin">All Products</h1>
<?php

if (is_logged_in(false)) {
    //comment this out if you don't want to see the session variables
    error_log("Session data: " . var_export($_SESSION, true));
}
//default variables needed for conditional html below
$category = 'all';
$search = '';
$sort = 'none';
$results = [];
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
    if (isset($_POST["sort"])) {
        $sort = $_POST["sort"];
        if (!($sort == "none")) {
            if ($sort == "low-high") {
                $query .= " ORDER BY unit_price ASC";
            } else {
                $query .= " ORDER BY unit_price DESC";
            }
        }
    }
    if (!strpos($query, "ORDER BY")) {
        $query .= " ORDER BY modified DESC";
    } else {
        $query .= " , modified DESC";
    }
    $query .= " LIMIT 10";
    $stmt = $db->prepare($query);
    try {
        $stmt->execute($params);
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch (PDOException $e) {
        flash("An unknown error occurred with loading the products", "warning");
        error_log(var_export($e->errorInfo, true));
    }
?>
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
        <label class="form-label" for="sort">Price Sort</label>
        <select class="form-select" aria-label="Sort" name="sort" id="sort">
            <option value="none" <?php if (se($sort, null, "", false) == "none") : ?>selected<?php endif; ?>>None</option>
            <option value="low-high" <?php if (se($sort, null, "", false) == "low-high") : ?>selected<?php endif; ?>>Low-High</option>
            <option value="high-low" <?php if (se($sort, null, "", false) == "high-low") : ?>selected<?php endif; ?>>High-Low</option>
        </select>
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
                        <a href="edit_product.php?name=<?php se($result, "name"); ?>">
                            <div class="btn btn-secondary">Edit</div>
                        </a>
                    </div>
                    <div class="card-footer">
                        <form method="post" action="cart.php">
                            <input type="hidden" name="name" value="<?php se($result, "name"); ?>" />
                            <input type="submit" class="btn btn-primary" value="Add to Cart" />
                        </form>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>