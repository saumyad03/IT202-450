<?php
require(__DIR__ . "/../../partials/nav.php");
?>
<h1 class="left-margin">More Details</h1>
<?php
//if no query parameter redirect to home page
if (!isset($_GET["name"])) {
    flash("You must be viewing a product to see this page");
    die(header("Location: $BASE_PATH" . "/home.php"));
} //Otherwise get more details
else {
    //adds rating to database
    if (isset($_POST["rating"]) && isset($_POST["rating"]) && isset($_POST["comment"])) {
        $product_id = $_POST["product_id"];
        $rating = $_POST["rating"];
        $comment = $_POST["comment"];
        //validates rating to ensure it is in the acceptble range
        if ($rating <= 5 && $rating >= 1) {
            $db = getDB();
            $stmt3 = $db->prepare("INSERT INTO Ratings (product_id, user_id, rating, comment) VALUES (:product_id, :user_id, :rating, :comment)");
            try {
                $stmt3->execute([":product_id" => $product_id, ":user_id" => get_user_id(), ":rating" => $rating, ":comment" => $comment]);
                flash("Rating successfully added", "success");
            } catch (PDOException $e) {
                flash("An unknown error occurred, please try again later", "warning");
                error_log(var_export($e->errorInfo, true));
            }
        } else {
            flash("Rating must be between 1 and 5", "warning");
        }
    }
    $name = $_GET["name"];
    $db = getDB();
    $stmt = $db->prepare("SELECT id, description, unit_price, stock, category FROM Products WHERE name=:name");
    try {
        $stmt->execute([":name" => $name]);
        $results = $stmt->fetch(PDO::FETCH_ASSOC);
        $product_id = $results["id"];
    } catch (PDOException $e) {
        flash("An unknown error occurred, please try again later", "warning");
        error_log(var_export($e->errorInfo, true));
    }
    //checks if user is logged in, checks if they've purchased product at least once to see if they can leave a review
    $canRate = false;
    if (is_logged_in()) {
        $stmt2 = $db->prepare("SELECT o.id FROM Orders as o INNER JOIN OrderItems as oi ON o.id = oi.order_id WHERE o.user_id = :user_id AND oi.product_id = :product_id");
        try {
            $stmt2->execute([":user_id" => get_user_id(), ":product_id" => $product_id]);
            $order = $stmt2->fetch(PDO::FETCH_ASSOC);
            if ($order) {
                $canRate = true;
            }
        } catch (PDOException $e) {
            flash("An unknown error occurred trying to find out whether you can leave a rating", "warning");
            error_log(var_export($e->errorInfo, true));
        }
    }
    //gets ratings from database
    $ratings = [];
    $stmt4 = $db->prepare("SELECT rating, comment FROM Ratings WHERE product_id = :product_id LIMIT 10");
    try {
        $stmt4->execute([":product_id"=>$product_id]);
        $ratings = $stmt4->fetchAll(PDO::FETCH_ASSOC);
        $rating_count = 0;
        $rating_total = 0;
        foreach($ratings as $rating) {
            $rating_count += 1;
            $rating_total += $rating["rating"];
        }
        $average_rating = round($rating_total/$rating_count, 1);
    } catch(PDOException $e) {
        flash("Something went wrong trying to load this product's reviews", "warning");
        error_log(var_export($e->errorInfo, true));
    }
}
?>
<script>
    function validate(form) {
        let rating = form.rating.value
        if (rating <= 5 && rating >= 1) {
            return true
        } else {
            flash("Rating must be between 1 and 5 inclusive", "warning");
            return false;
        }
    }
</script>
<ul>
    <div class="display-3"><?php se($name) ?></div>
    <div class="display-6">$<?php echo se($results, "unit_price", "", false) / 100; ?></div>
    <p><?php se($results, "description") ?><br><span class="bold-text">Stock:</span> <?php se($results, "stock") ?><br><span class="bold-text">Category:</span> <?php se($results, "category") ?><br><span class="bold-text">Average Rating:</span> <?php se($average_rating) ?></p>
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
        <?php if ($canRate) : ?>
            <div class="container-fluid">
                <div class="display-6">Leave a Rating!</div>
                <form onsubmit="return validate(this);" method="post">
                    <input type="hidden" name="product_id" value=<?php se($product_id) ?>>
                    <div class="mb-3">
                        <label class="form-label" for="rating">Rating</label>
                        <select class="form-select" id="rating" name="rating">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label" for="comment">Comment</label>
                        <textarea id="comment" name="comment" class="form-control"></textarea>
                    </div>
                    <input type="submit" class="btn btn-primary" value="Submit Review" />
                </form>
            </div>
        <?php endif; ?>
    <?php endif; ?>
    <table class="table table-striped">
    <thead>
        <th>Rating</th>
        <th>Comment</th>
    </thead>
    <tbody>
        <?php if (empty($ratings)) : ?>
            <tr>
                <td colspan="100%">This product has no ratings</td>
            </tr>
        <?php else : ?>
            <?php foreach ($ratings as $rating) : ?>
                <tr>
                    <td><?php se($rating, "rating") ?></td>
                    <td><?php se($rating, "comment") ?></td>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
</ul>
<?php
require_once(__DIR__ . "/../../partials/flash.php");
?>