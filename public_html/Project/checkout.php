<?php
require(__DIR__ . "/../../partials/nav.php");
//If user isn't logged in, they cannot access checkout page features
if (!is_logged_in(false)) {
    flash("Please log in to or register account to checkout cart items", "warning");
    die(header("Location: $BASE_PATH" . "/login.php"));
}
?>
<?php
$db = getDB();
$user_id = get_user_id();
$results = [];
//Products.unit_price is true product cost
//Cart.unit_price is the old product cost
//Gets stock and desired quantity to ensure enough product is avaiable for order
$stmt = $db->prepare("SELECT Products.id as product_id, Products.unit_price as product_price, Products.name, Products.stock, Cart.desired_quantity, Cart.unit_price as cart_price FROM Cart LEFT JOIN Products ON Cart.product_id = Products.id WHERE Cart.user_id = :user_id");
try {
    $stmt->execute([":user_id" => $user_id]);
    $results = $stmt->fetchALL(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    flash("An unknown error occurred with displaying your cart, please try again later", "warning");
    error_log(var_export($e->errorInfo, true));
}
//initializes a variable called total that keeps a running count of the total price of the cart items
$total = 0;
?>
<a class="btn btn-primary back-button" href="cart.php">Back to Cart</a>
<table class="table table-striped">
    <thead>
    </thead>
    <tbody>
        <?php if (empty($results)) : ?>
            <tr>
                <td colspan="100%">Cart is empty</td>
            </tr>
        <?php else : ?>
            <?php foreach ($results as $result) : ?>
                <?php //calculates the subtotal using price and quantity, assigns it to a variable, adds it to the current total for each iteration of foreach loop ?>
                <?php $subtotal = se($result, "product_price", "", false) * se($result, "desired_quantity", "", false); ?>
                <?php $total += $subtotal ?>
                <tr>
                    <th><a class="text-decoration-none text-dark" href="more_details.php?name=<?php se($result, "name"); ?>"><?php se($result, "name"); ?></a></th>
                    <?php if (has_role("Admin") || has_role("Shop Owner")) : ?>
                        <td><a href="edit_product.php?name=<?php se($result, "name"); ?>">
                                <div class="btn btn-secondary">Edit</div>
                            </a></td>
                    <?php endif; ?>
                    <?php 
                    /*
                    Displays product_price from Products table which is the true price
                    If the product_price is different from cart_price (from Cart table),
                    the percent difference is calculated and the change in the price is shown in 
                    parentheses next to the price 
                    Done using conditional HTML and php tags
                    */
                    ?>
                    <th>$<?php se($result, "product_price"); ?>
                        <?php if (se($result, "product_price", "", false) != se($result, "cart_price", "", false)) : ?>
                            <?php $diff = (se($result, "product_price", "", false) - se($result, "cart_price", "", false)) / se($result, "cart_price", "", false) * 100; ?>
                            <?php if ($diff > 0) : ?>
                                (<?php echo $diff ?>% increase in price)
                            <?php else : ?>
                                (<?php echo abs($diff) ?>% decrease in price)
                            <?php endif; ?>
                        <?php endif; ?>
                    </th>
                    <th>
                        <?php 
                        /*on each iteration, if not enough in stock for desired quantity, redirect user to cart, 
                        flashing information on what to update and how much quantity is available
                        */
                        ?>
                        <?php 
                        if (se($result, "desired_quantity", "", false) > se($result, "stock", "", false)) {
                            flash("Only " . se($result, "stock", "", false) . " " . se($result, "name", "", false) . "(s) in stock, but you wanted " . se($result, "desired_quantity", "", false) . ". Please update your cart.", "warning");
                            redirect($BASE_PATH . "/cart.php");
                        }
                        ?>
                        <div>Quantity: <?php se($result, "desired_quantity"); ?></div>
                    </th>
                    <?php //displays calculated subtotal using php tags for each iteration of foreach loop ?>
                    <th>Subtotal: $<?php echo (se($subtotal)); ?></th>
                </tr>
            <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php //displays calculated total using php tags after all iterations of foreach loop runs ?>
<div id="total-label">Total: $<?php se($total); ?></div>
<script>
    function validate(form) {
        return true;
    }
</script>
<div class="container-fluid">
    <form class="offset-lg-3" method="POST" onsubmit="return validate(this)">
        <h3>Payment Information</h3>
        <div class="form-group row">
            <div class="mb-3 col-lg-3">
                <label class="form-label" for="payment-method">Payment Method</label>
                <input class="form-control" id="payment-method" name="payment-method" />
            </div>
            <div class="mb-3 col-lg-3">
                <label class="form-label" for="money-received">Money Received</label>
                <input class="form-control" id="money-received" name="money-received" />
            </div>
        </div>
        <h3>Shipping Information</h3>
        <div class="form-group row">
            <div class="mb-3 col-lg-2">
                <label class="form-label" for="first-name">First Name</label>
                <input class="form-control" id="first-name" name="first-name" />
            </div>
            <div class="mb-3 col-lg-2">
                <label class="form-label" for="last-name">Last Name</label>
                <input class="form-control" id="last-name" name="last-name" />
            </div>
        </div>
        <div class="mb-3 col-lg-4">
            <label class="form-label" for="address">Address</label>
            <input class="form-control" id="address" name="address" />
        </div>
        <div class="mb-3 col-lg-4">
            <label class="form-label" for="more-address-info">Apartment, suite, etc.</label>
            <input class="form-control" id="more-address-info" name="more-address-info" />
        </div>
        <div class="mb-3 col-lg-4">
            <label class="form-label" for="city">City</label>
            <input class="form-control" id="city" name="city" />
        </div>
        <div class="mb-3 col-lg-4">
            <label class="form-label" for="state">State/province</label>
            <input class="form-control" id="state" name="state" />
        </div>
        <div class="mb-3 col-lg-4">
            <label class="form-label" for="country">Country</label>
            <input class="form-control" id="country" name="country" />
        </div>
        <div class="mb-3 col-lg-4">
            <label class="form-label" for="zip-code">ZIP/postal code</label>
            <input class="form-control" id="zip-code" name="zip-code" />
        </div>
        <input type="submit" class="btn btn-success" value="Checkout Cart" />
    </form>
</div>
<?php
    //if form submitted
    if (isset($_POST["payment-method"]) && isset($_POST["money-received"]) && isset($_POST["first-name"]) && isset($_POST["last-name"]) && isset($_POST["address"]) && isset($_POST["more-address-info"]) && isset($_POST["city"]) && isset($_POST["state"]) && isset($_POST["country"]) && isset($_POST["zip-code"])) {
        //caching info to variables
        $user_id = get_user_id();
        $method = $_POST["payment-method"];
        $money = $_POST["money-received"];
        $first_name = $_POST["first-name"];
        $last_name = $_POST["last-name"];
        $address = $_POST["address"];
        $more_info = $_POST["more-address-info"];
        $city = $_POST["city"];
        $state = $_POST["state"];
        $country = $_POST["country"];
        $zip_code = $_POST["zip-code"];
        //form validation
        $isValid = true;
        if (empty($method)) {
            flash("Payment method must not be empty", "warning");
            $isValid = false;
        }
        if (empty($money)) {
            flash("Money received must not be empty", "warning");
            $isValid = false;
        } else if (!is_numeric($money)) {
            flash("Money received must be a number", "warning");
            $isValid = false;
        } else if ($money < $total) {
            flash("Not enough money received to complete order", "warning");
            $isValid = false;
        }
        if (empty($first_name)) {
            flash("First name must not be empty", "warning");
            $isValid = false;
        }
        if (empty($last_name)) {
            flash("Last name must not be empty", "warning");
            $isValid = false;
        }
        if (empty($address)) {
            flash("Address must not be empty", "warning");
            $isValid = false;
        }
        if (empty($city)) {
            flash("City must not be empty", "warning");
            $isValid = false;
        }
        if (empty($state)) {
            flash("State/province must not be empty", "warning");
            $isValid = false;
        }
        if (empty($country)) {
            flash("Country must not be empty", "warning");
            $isValid = false;
        }
        if (empty($zip_code)) {
            flash("Zip/postal code must not be empty", "warning");
            $isValid = false;
        }
        if ($isValid) {
            if (empty($more_info)) {
                $address .=  ", " . $city . ", " . $state . ", " . $zip_code . " " . $country;
            } else {
                $address .=  ", " . $more_info . ", " . $city . ", " . $state . ", " . $zip_code . " " . $country;
            }
            $db = getDB();
            $stmt1 = $db->prepare("INSERT INTO Orders(user_id, total_price, address, payment_method, money_received, first_name, last_name) VALUES (:user_id, :total_price, :address, :payment_method, :money_received, :first_name, :last_name)");
            $params = ["user_id"=>$user_id, ":total_price"=>$total, ":address"=>$address, ":payment_method"=>$method, ":money_received"=>$money, ":first_name"=>$first_name, ":last_name"=>$last_name];
            try {
                //Entry into orders table
                $stmt1->execute($params);
                $order_id = $db->lastInsertId();
                foreach ($results as $result) {
                    $product_id = se($result, "product_id", "", false);
                    $quantity = se($result, "desired_quantity", "", false);
                    $price = se($result, "product_price", "", false);
                    //Entry into order items table for each item
                    $stmt2 = $db->prepare("INSERT INTO OrderItems(order_id, product_id, quantity, unit_price) VALUES (:order_id, :product_id, :quantity, :unit_price)");
                    $stmt2->execute([":order_id" => $order_id, "product_id" => $product_id, ":quantity" => $quantity, ":unit_price" => $price]);
                    //Deduction of stock from products table
                    $stmt3 = $db->prepare("UPDATE Products SET stock=(stock - :quantity) WHERE id = :product_id");
                    $stmt3->execute([":quantity" => $quantity, ":product_id" => $product_id]);
                    //Clear out user's cart
                    $stmt4 = $db->prepare("DELETE FROM Cart WHERE user_id=:user_id");
                    $stmt4->execute([":user_id"=>$user_id]);
                }
                flash("Successfully placed order", "success");
                redirect($BASE_PATH . "/confirmation.php");
            } catch (PDOException $e) {
                flash("An unknown error occurred with placing your order, please try again later", "warning");
                error_log(var_export($e->errorInfo, true));
            }
        }
    }
/*
Clear out the user’s cart after successful order
Redirect user to Order Confirmation Page
*/
?>
<?php
require(__DIR__ . "/../../partials/flash.php");
?>