<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 Shop Project</td></tr>
<tr><td> <em>Student: </em> Saumya Dwivedi(sd96)</td></tr>
<tr><td> <em>Generated: </em> 8/1/2022 11:03:43 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-3-shop-project/grade/sd96" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone3 branch</li><li>Create a new markdown file called milestone3.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone3.md</li><li>Add/commit/push the changes to Milestone3</li><li>PR Milestone3 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 4</li><li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Orders will be able to be recorded </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Orders table with valid data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182267969-9e6f0c68-3e6e-4a35-bbd8-ef11171b8de3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>VS Code DB Extension showing Orders table with valid data in it and<br>columns id, user_id, created, total_price, address, payment method, money_received, first_name, and last_name<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of OrderItems table with validate data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182268165-20df7fd3-6ff1-4f67-bb53-8c2068676690.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>VS Code DB Extension showing OrderItems table with valid data in it and<br>columns id, order_id, product_id, quantity,  unit_price, created, and modified<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the purchase form UI from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182269322-d6387897-8064-4514-9745-104aa9389e7b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Cart Items on Checkout Page (above form)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182269341-6d96f0e7-6ea0-4846-8056-a2fde8b68694.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Checkout Page with valid form data filled in (purchase form)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot showing the items pending purchase from Heroku</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182269322-d6387897-8064-4514-9745-104aa9389e7b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is a screenshot of Cart Items on Checkout Page showing item name,<br>unit cost , desired quantity, and subtotal. Next to the cost, the percent<br>change in price can be seen in parentheses. Under all cart items, the<br>total purchase price can be seen. Finally, in the top left corner, a<br>link back to Cart is visible and working.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot showing the Order Process validations from the UI (Heroku)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182272048-36cc6528-10db-4651-aab8-cc0e79718c3a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This is the preparation, binding of parameters for, and execution of the SQL<br>Select Statement, getting the old price, new price, and stock to use for<br>validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182272363-bd6270c2-59e0-4b5e-ab0e-2e746e91bbb9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>When displaying the price, if the old price and new price are different<br>calculations are done to find the percent difference, the percentage is rounded, and<br>it is included in parentheses after the actual cost with text showing whether<br>the price increased or decreased<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182272681-70a11cec-b8fd-481c-994e-316d424b6401.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>When displaying the desired quantity, if it exceeds the amount in stock, the<br>user is redirected to the cart page with a message detailing the item<br>name, stock, and how much they wanted so that they can update their<br>cart appropriately<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182272952-572dbe21-1819-48a7-a3ea-f87a221acce7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>First part of client side validation ensuring purchase form fields aren&#39;t empty, money<br>received is numeric, and money received is greater than the total cost of<br>the cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182273059-3e3bf73b-f42e-4a30-982b-a502e12426fb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Second part of client side validation ensuring purchase form fields aren&#39;t empty, money<br>received is numeric, and money received is greater than the total cost of<br>the cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182273325-71585354-11b1-4c27-8ac3-fe428eeb9fc4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>First part of browser side validation ensures that payment information is valid by<br>requiring those fields and using a PHP tag to make the minimum attribute<br>for the money received input field be the cart&#39;s total price<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182273373-b32c108f-a70c-41a1-b2d3-beb27f6b95d9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Second part of browser side validation ensures that all necessary shipping information fields<br>are filled out<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182273719-359391a3-7666-44e8-83a0-6c42ca157f1f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>First part of server side validation ensures that payment information isn&#39;t empty, money<br>received is a number, and it is greater than the cart&#39;s total price<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182273820-959f68ef-69c5-489a-9382-e26ec1710aec.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Second part of server side validation ensures that all necessary shipping information fields<br>are filled out<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a screenshot showing the Order Process validations from the UI (Heroku)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182269322-d6387897-8064-4514-9745-104aa9389e7b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>If the product&#39;s actual price differs from the price of what&#39;s in stock,<br>the actual price is displayed, a percent difference is calculated, and shown in<br>parentheses next to the actual price<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182270260-7b0f81fe-beeb-4126-93e1-c6eeafb4f0bf.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>If the user tries to checkout with more of an item than is<br>in stock , they are redirected to the Cart Page, told what item<br>there is a quantity issue with, how much of it is in stock,<br>and how much they wanted<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182270929-342621be-681d-42f4-98b6-00a0c0dfe3f3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>When trying to submit form, the minimum amount allowed in the money received<br>field to allow form submission is the total of all the products in<br>the cart (browser side validation); there is also client and server side validation<br>as our second and last line of defense<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly describe the code flow/process of the purchase process</td></tr>
<tr><td> <em>Response:</em> <ol><br><li>When the user clicks the &quot;Place Order&quot; button on the cart page,<br>they are redirected to the checkout page.<div>2. If the user isn&#39;t logged in<br>when they visit the checkout page, they are redirected to the login page<br>and a message explaining that they must be logged in to checkout their<br>cart is displayed.</div><div>3. An SQL Select Statement is prepared, retrieving from Cart left<br>join Products where the cart&#39;s user id is the actual user&#39;s id (this<br>is retrieved using the get user id helper function). This statement selects the<br>product id,&nbsp; product&#39;s unit price, product name, stock,&nbsp; desired quantity, and cart&#39;s unit<br>price.</div><div>4. User id parameter is bound to the SQL statement.</div><div>5. Query is executed<br>against the database and results are cached.</div><div>6. PHP tags are used to iterate<br>through the results array to create a table containing the product name, the<br>product&#39;s price , quantity, and subtotal (calculated by multiplying product&#39;s price by quantity).&nbsp;<br>On each iteration of the price part, if the product price and cart<br>price are different, the percent difference is calculated, rounded, and displayed in the<br>parentheses next to the unit cost. On each iteration of the quantity part,<br>if the quantity is higher than what&#39;s in stock, the user is redirected<br>to the cart page with a message highlighting the item, the desired quantity,<br>and the actual stock so the user can appropriately update their cart.</div><div>7. After<br>the cart is done displaying, the script tag of the client side validation<br>and the payment and shipping information form is created. The HTML contains browser<br>side validation and using the onsubmit attribute, we validate the form user client<br>side validation.</div><div>8. Finally, with PHP page checks if the form data was posted.<br>If it was, the data is cached and client side validation occurs. If<br>the data is valid, an SQL Insert Statement is prepared, inserting&nbsp;user id, total<br>price, address, payment method, money received, first name, and last name into the<br>Orders. The parameters are bound and the query is executed against the database.<br>The last insert id is retrieved for inserting into the OrderItems table.</div><div>9. For<br>each product, an SQL Insert Statement is prepared,&nbsp; the parameters are bound, and<br>the query is executed against the database. In this statement order id, product<br>id, and unit price are inserted into the OrderItems table. For each product,<br>and SQL Update Statement is prepared, the parameters are bound, and the query<br>is executed against the database. In this statement, stock is updated in the<br>Products table to reflect the deductions from the newly placed order.</div><div>10. Finally, the<br>user&#39;s cart is deleted using an SQL Delete Statement on the Cart table.<br>Once again, the statement is prepared, the parameters are bound, and the query<br>is executed against the database. The user id is in the where clause<br>so all of the user&#39;s cart products are deleted.&nbsp;</div><div>11. The user is flashed<br>a success message, redirected to the order confirmation page, and the order id<br>is stored in the session</div><br></li><br></ol><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/83">https://github.com/saumyad03/IT202-450/pull/83</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/90">https://github.com/saumyad03/IT202-450/pull/90</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/91">https://github.com/saumyad03/IT202-450/pull/91</a> </td></tr>
<tr><td> <em>Sub-Task 9: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/checkout.php">https://sd96-prod.herokuapp.com/Project/checkout.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Order Confirmation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot showing the order details from the purchase form and the related items that were purchased with a thank you message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182276799-eba18338-919c-4905-bc3e-1c54f3a40c59.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before submission, screenshot of checkout page showing cart items<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182276828-37e921da-1db5-4810-9644-43a01aa4ebcb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before submission, screenshot of payment and shipping information form filled out<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182276872-f4d9a7cd-62bc-4141-b287-4170e2868ddd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After submission, screenshot showing order confirmation page; this includes cost of each line<br>item (subtotal), total value, how they purchase and how much they paid (under<br>payment),  shipping information (under location), and a personalized thank you message (this<br>includes the full name)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182277160-4e50aebe-4a60-4f21-995a-82d5b51e1549.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After submission, screenshot of entire order details in Orders table<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182277576-955556c6-6560-464d-b332-70ae3d3f99d3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After submission, screenshot of entire order details in OrderItems table<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how this information is retrieved and displayed from a code logic perspective</td></tr>
<tr><td> <em>Response:</em> <ol><br><li>On the confirmation page, if the user isn&#39;t logged in they cannot<br>access the page and are redirected to the login page and flashed an<br>appropriate message<div>2. If the order id is set to the session (stored in<br>the session on the checkout page), it is accessed and cached to a<br>variable. Then, it is unset from the session.&nbsp;</div><div>3. An SQL Select statement is<br>prepared to retrieve the quantity, price, and product name from OrderItems left join<br>Products, using the order id from the previous step in the where clause.</div><div>4.<br>An SQL Select statement is prepared to retrieve the payment method, money received,<br>total price, address, first name, and last name from the Orders table, using<br>order id in the where clause.</div><div>5. For both statements, the parameters are bound,<br>the queries are executed, and the results are cached to variables.</div><div>6. Using a<br>PHP foreach loop, HTML, and PHP tags, the order items are iterated through<br>to create a table containing the product name, price, quantity,&nbsp; and subtotal for<br>each of the products from the order that was placed.</div><div>7. Under that, the<br>total price, a thank you message,&nbsp; payment information, and shipping information are displayed<br>using the order details from the orders table. Similar to the previous step,<br>HTML in combination with PHP tags are used to achieve this.</div><br></li><br></ol><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/92">https://github.com/saumyad03/IT202-450/pull/92</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/confirmation.php">https://sd96-prod.herokuapp.com/Project/confirmation.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User will be able to see their Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history for a user</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182279007-48833a4d-9e8c-4f1f-a190-ca544619fa98.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing purchase history for a user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182279824-921b0e71-1389-4e6c-888f-2ae4ca8335e7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing full details of a purchase (Order Details Page) without a thank<br>you message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details</td></tr>
<tr><td> <em>Response:</em> <p>Note: The logic is for the confirmation page is basically the same as<br>the order details page<div>1. On the Purchase History page,&nbsp; if the user isn&#39;t<br>logged in, they are redirected the login page and the appropriate message is<br>flashed.</div><div>2. An SQL Select statement is prepared, retrieving id, money received, payment method,<br>total price, first name, and last name from the Orders table using the<br>user id (retrieved using the get user id helper function) in the where<br>clause.&nbsp; Results are sorted by most recent first and are limited to 10<br>for now.</div><div>3. The parameters are bound, the query is executed against the database,<br>and the results are cached to a variable.</div><div>4. Using a PHP foreach loop,<br>the results are iterated through, so that for each order,&nbsp; the name, payment<br>information (money received and method), and total price are displayed.</div><div>5. Each row contains<br>a &quot;See Details&quot; button. This button is actually inside a form. The button<br>is of type submit and there is a hidden element containing the order<br>id of the order in question. When the button is clicked, this id<br>is posted to the order details page.</div><div>6. On the Order Details page, if<br>the user isn&#39;t logged in, they are redirected the login page and the<br>appropriate message is flashed.<br></div><div>7. If the $_POST&#39;s &quot;order-id&quot; key was set, the value<br>is cached to a variable.</div><div><div><div>10. An SQL Select statement is prepared to retrieve<br>the quantity, price, and product name from OrderItems left join Products, using the<br>order id from the previous step in the where clause.</div><div>11. An SQL Select<br>statement is prepared to retrieve the payment method, money received, total price, address,<br>first name, and last name from the Orders table, using order id in<br>the where clause.</div><div>12. For both statements, the parameters are bound, the queries are<br>executed, and the results are cached to variables.</div><div>13. Using a PHP foreach loop,<br>HTML, and PHP tags, the order items are iterated through to create a<br>table containing the product name, price, quantity,&nbsp; and subtotal for each of the<br>products from the order that was placed.</div><div>14. Under that, the total price, name,<br>payment information, and shipping information are displayed using the order details from the<br>orders table. Similar to the previous step, HTML in combination with PHP tags<br>are used to achieve this.</div></div></div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/93">https://github.com/saumyad03/IT202-450/pull/93</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/order_details.php">https://sd96-prod.herokuapp.com/Project/order_details.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing purchase history from multiple users</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182281330-ab3fccd3-7043-4689-929f-1f3ed52a62cd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing purchase history from multiple users on Store Owner Purchase History Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing full details of a purchase (Order Details Page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182281450-e4ef35ab-864c-421e-b7f0-b32af83269c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing full details of a purchase on Order Details Page (not the<br>store owner)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the logic for showing the purchase list and click/displaying the Order Details (mostly how it differs from the user's purchase history feature)</td></tr>
<tr><td> <em>Response:</em> <div>1. On the Store Owner Purchase History page,&nbsp; if the user doesn't have<br>admin or store owner privileges, they are redirected to the home page and<br>an appropriate message is flashed.</div><div>2. An SQL statement is prepared,, retrieving id, money<br>received, payment method, total price, first name, and last name from the Orders<br>table . However, while the user purchase history has a where clause with<br>the user id, the where clause here is empty because we want to<br>see all orders not just those by our user.&nbsp; Results are sorted by<br>most recent first and are limited to 10 for now.</div><div>3. The parameters are<br>bound, the query is executed against the database, and the results are cached<br>to a variable.</div><div>4. Using a PHP foreach loop, the results are iterated through,<br>so that for each order,&nbsp; the name, payment information (money received and method),<br>and total price are displayed.</div><div>5. Each row contains a "See Details" button. This<br>button is actually inside a form. The button is of type submit and<br>there is a hidden element containing the order id of the order in<br>question. When the button is clicked, this id is posted to the order<br>details page.</div><div>6. On the Order Details page, if the user isn't logged in,<br>they are redirected the login page and the appropriate message is flashed.<br></div><div>7. If<br>the $_POST's "order-id" key was set, the value is cached to a variable.</div><div><div>10.<br>An SQL Select statement is prepared to retrieve the quantity, price, and product<br>name from OrderItems left join Products, using the order id from the previous<br>step in the where clause.</div><div>11. An SQL Select statement is prepared to retrieve<br>the payment method, money received, total price, address, first name, and last name<br>from the Orders table, using order id in the where clause.</div><div>12. For both<br>statements, the parameters are bound, the queries are executed, and the results are<br>cached to variables.</div><div>13. Using a PHP foreach loop, HTML, and PHP tags, the<br>order items are iterated through to create a table containing the product name,<br>price, quantity,&nbsp; and subtotal for each of the products from the order that<br>was placed.</div><div>14. Under that, the total price,&nbsp; name, payment information, and shipping information<br>are displayed using the order details from the orders table. Similar to the<br>previous step, HTML in combination with PHP tags are used to achieve this.</div></div><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/94">https://github.com/saumyad03/IT202-450/pull/94</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/see_purchase_history.php">https://sd96-prod.herokuapp.com/Project/see_purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart page showing the button to place an order</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182281851-57829b3c-8b0f-4fa6-a643-e09bf4adac02.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of cart page showing button to place an order<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone3 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182281592-c8ea6136-1120-4a94-b091-53bf81167290.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of issues 1-3 from Milestone 3 (all closed)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/182281689-b747bdf6-19b3-48b5-a4b8-ed94607fe102.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of issues 4-6 from Milestone 3 (all closed)<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-3-shop-project/grade/sd96" target="_blank">Grading</a></td></tr></table>