<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 Shop Project</td></tr>
<tr><td> <em>Student: </em> Saumya Dwivedi(sd96)</td></tr>
<tr><td> <em>Generated: </em> 7/17/2022 8:32:14 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-2-shop-project/grade/sd96" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone2 branch</li><li>Create a new markdown file called milestone2.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone2.md</li><li>Add/commit/push the changes to Milestone2</li><li>PR Milestone2 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 3</li><li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Users with admin or shop owner will be able to add products </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of admin create item page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179424423-b89778a1-97b4-4383-bb66-239075d807c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of admin create item page with valid data filled in<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179424457-0336da0a-9bda-491a-a0a7-49cf902eb1cb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of success message showing up after creating product<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of populated Products table clearly showing the columns</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429286-3ed726dd-4e98-4b13-ba44-e84fe6e11ebd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Products table populated, showing all columns (and newly added item Pencil)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly describe the code flow for creating a Product</td></tr>
<tr><td> <em>Response:</em> <p>On the add_product.php page, there is a form that takes in values for<br>the name, description, category, stock, unit price, and visibility. On the browser side,<br>simple validation occurs through the attributes that are given to these form elements.<br>For example, name is required,&nbsp; stock must be a number between 0 and<br>1000 (you can add items even if they are out of stock), unit<br>price must be a number between 0.01 and 5000.00 and can only be<br>incremented by step 0.01. Description and category aren&#39;t validated on the browser side<br>because default values are applied to them and visibility is just checked or<br>unchecked. When the form submit button is clicked, JavaScript further validates the data<br>through the validate function because the onsubmit attribute is added to the form.<br>JavaScript uses simple conditionals to ensure that the required fields are not empty<br>and adhere to the range restrictions. Finally, the page refreshes once the form<br>data is sent through the post method. When the page loads, the page<br>first checks if the user is either an Admin or Shop Owner, redirecting<br>them if they are not. Then, if the $_POST&#39;s keys are set (&quot;name&quot;,<br>&quot;description&quot;, &quot;category&quot;, etc.), then PHP caches the values to variables to make them<br>easier to write. Since visibility is a checkbox, the data is only sent<br>if it is checked. Therefore, in the code, if visibility is not set,<br>the value is set to 0 or false and if it is set,<br>then the value is set to 1. Additionally, description is given &quot;No description&quot;<br>if it&#39;s empty and category is given &quot;Other&quot; if it&#39;s empty. After this,<br>some simple server side validation occurs, ensuring that the fields are not empty<br>and adhere to the range restrictions. If the data is valid, then an<br>SQL insert statement is used to fill the data in the columns name,<br>description, category, unit_price, and visibility. After this, the parameters are bound to the<br>statement and it is executed against the database. If this occurs properly, a<br>success message is flashed while an error results in an error message.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/65">https://github.com/saumyad03/IT202-450/pull/65</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/add_product.php">https://sd96-prod.herokuapp.com/Project/add_product.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Any user can see visible products on the Shop Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the Shop page showing 10 items without filters/sorting applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179426319-ea578c82-4e27-4b42-b1cf-806106aee58d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page showing 10 items without filters/sorting applied for Admin<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179427817-a27da79b-a0af-4095-9854-7bbae280b433.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page showing 10 items without filters/sorting applied for a logged in User<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179427839-9dc329c0-12f2-4a66-b013-c45ad40057c2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page showing 10 items without filters/sorting applied for a non-logged in user<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Shop page showing both filters and a different sorting applied (should be more than 1 sample product)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179426344-a3417f04-6f87-4291-b5a7-2cfcb205255b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page showing Sports category filter applied and low-high price sort applied<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the filter/sort logic from the code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179426379-051d3b0f-9286-4968-919c-28bc9cc4e2a6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of the filter/sort logic from code (adds to query based on whether<br>filters/sorts are applied)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the results are shown and how the filters are applied</td></tr>
<tr><td> <em>Response:</em> <p>Whether and what specific filter/sort is applied is done through a form on<br>the home page. The user can fill out a search input field, select<br>from a category dropdown, and select from price sorts. After the search button<br>is clicked, the page is refreshed and form data is sent via the<br>post method. When the PHP page is loaded, it first sets default values<br>for filter/sort value so that if no post data is sent to the<br>form, the default value is still selected in the form (how this is<br>done is explained later).&nbsp; Then, it creates a query string that is cached<br>to a variable that is an SQL select statement that selects the name<br>and unit_price from the products table. Based on what was posted and what<br>wasn&#39;t posted, the WHERE clause is created by appending to the end of<br>the query string. After this, if a sort is applied, the ORDER BY<br>clause is created by appending to the end of the query string. Finally,<br>the end of the query string is added,&nbsp; limiting it to 10 search<br>results and finally sorting by most recently modified. When appending to the query<br>string, SQL syntax is maintained by checking if there is already a WHERE<br>or ORDER BY clause and appending the appropriate string based on that. After<br>this, the query parameters are bound to the SQL statement and it is<br>executed against the database, caching the results to a variable. The results are<br>then displayed on the UI using a PHP foreach loop on the results<br>of the query (Bootstrap card format is used). To persist the filter/sorting requests<br>from the user, PHP tags are used that check the value of the<br>cached variables (or get the default values as mentioned earlier). In addition, PHP<br>tags are used to generate conditional HTML that determines whether the add to<br>cart or edit buttons are visible.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/66">https://github.com/saumyad03/IT202-450/pull/66</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/home.php">https://sd96-prod.herokuapp.com/Project/home.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Show Admin/Shop Owner Product List (this is not the Shop page and should show visibility status) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of the Admin List page/results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179427009-676f404c-86ec-445d-a5a3-5af60bbb245e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Admin List page showing all products (both visible and non-visible and labeled)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how the results are shown</td></tr>
<tr><td> <em>Response:</em> <div>Since this is a protected page, PHP authenticates whether the user is an<br>Admin or Shopowner, redirecting them to the home page if they are not<br>and flashing a message. Just like the normal shop list page, this page<br>has a form where filters can be applied. If the form's fields are<br>filled out, these values are sent via the post method. Once the page<br>is reloaded, default values are assigned to variables corresponding to each filter/sort. If<br>the key for a particular filter/sort is set, then this value is overridden<br>(this is used later to have the admin/shop owner's filters/sorts persists). The beginning<br>of an SQL select statement is assigned to a variable. This SQL statement<br>gets the name, unit_price, and visibility from the products table. Then, the appropriate<br>filters and sorts are applied by appending a WHERE clause with conditions and<br>and ORDER BY clause with conditions. While the shop list page includes visibility<br>being true as a requirement, this is excluded from this page. Then, the<br>query string is appended to to limit it to 10 results and sort<br>by latest modified. After that, the query parameters are bound and the statement<br>is executed against the database, caching the results to a variable. Then, the<br>results are displayed using a PHP foreach loop and Bootstrap's card format. On<br>this page as opposed to the shop list page, conditional HTML is not<br>used to determine whether add to cart and edit button are shown. Since<br>only a user that is an admin or shopowner can access this page,<br>these buttons show up.&nbsp;To persist the filters/sorts, PHP tags are used to check<br>the values of the variables or get the default values mentioned earlier.</div><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/67">https://github.com/saumyad03/IT202-450/pull/67</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/see_products.php">https://sd96-prod.herokuapp.com/Project/see_products.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Admin/Shop Owner Edit button </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the edit button visible to the Admin on the Shop page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179427783-e5338442-4ca9-417e-82f2-56f7f8398800.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing edit button visible to Admin on the Shop page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the edit button visible to the Admin on the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179427971-bc5f7e18-7b4f-4b86-808a-777109c6bdef.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing edit button visible to Admin on the Product Details Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot showing the edit button visible to the Admin on the Admin Product List Page (The admin page)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179427891-a4e5cfd5-dafa-4565-9f7f-5453c1b13741.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing edit button visible to Admin on the Admin Product List page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a before and after screenshot of Editing a Product via the Admin Edit Product Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179428006-80a86186-9ede-457c-bfce-c1edae421cf1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before, these were sunglasses for $199.99, there was only 1 in stock, and<br>there was no description.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179428060-b5991143-65dc-47d1-9c7d-dcf664cc7483.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After, these were rainbow sunglasses for $5.99, there are 10 in stock, and<br>there is a brief description.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>On each page where the product is listed, PHP uses conditional HTML to<br>determine whether or not to show the edit button. If the admin or<br>shop owner is accessing the page, it is visible. Otherwise, it isn&#39;t. The<br>edit button redirects the admin/shop owner to the edit product page, passing the<br>name of the product in as a query parameter. Query parameters and get<br>method was used so that an admin can go back to the edit<br>product page for a specific product. On the edit product page, if the<br>user is not an admin or shop owner, they are redirected the shop<br>list page and a messages saying that they don&#39;t have access is flashed.<br>If there value assigned to name in the $_GET magic variable (there is<br>no query parameter), the user is redirected, being flashed a message that says<br>you must have a product to edit. On the page, similar to the<br>profile page, there is a form that allows the user to update name,<br>description, category,&nbsp; stock, unit price, and visibility. Similar to the add product page,<br>the browser does some basic validation, ensuring certain fields are numbers, certain fields<br>are filled out, and certain fields adhere to range and step requirements. In<br>addition, by using the onsubmit attribute on the form, basic validation is done<br>using JavaScript to ensure that required fields are empty and range requirements are<br>met. Finally, when the page is refreshed, these values are sent via the<br>post method to the page. If these values are set, PHP caches them<br>to variables so that it can update the database with them. Note that<br>the name is used to identify what is being edited so the old<br>name is cached from the query string parameters and while the new name<br>is cached using the form data. Then, after some basic server side validation<br>(conditionals to ensure fields aren&#39;t empty and adhere to range requirements), an SQL<br>update query is created to change all the values. The parameters are bound,<br>the statement is executed against the database, and a success message is flashed<br>(error if is fails). Then, the user is redirected to the same website<br>but query parameter is assigned to posted name (the new name). The page<br>reloads and an SQL select statement is used to get the name, description,<br>price, stock, category, and visibility from the Products table with the name (which<br>is a query string parameter) in the WHERE clause. Once this parameter is<br>bound to the query, it is executed against the database, and the result<br>is cached to a variable. Using PHP tags, the form is prefilled with<br>the values from this result. Note that on the PHP page, the update<br>is placed before the select statement so that displayed information is the most<br>recent.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/76">https://github.com/saumyad03/IT202-450/pull/76</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/77">https://github.com/saumyad03/IT202-450/pull/77</a> </td></tr>
<tr><td> <em>Sub-Task 7: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/edit_product.php">https://sd96-prod.herokuapp.com/Project/edit_product.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Product Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the button (clickable item) that directs the user to the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179428693-4673bde0-6261-4799-afe2-39ab7ae54c57.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows the clickable item (the name of the product) which redirects to the<br>Product Details Page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the result of the Product Details Page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179428720-eaaa06fa-3bc0-4eb0-8e27-6610c01e3e96.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Result of Product Details Page for clicking on Pencil<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain the code process/flow</td></tr>
<tr><td> <em>Response:</em> <p>On each page the product is shown, the name of the product is<br>actually a link to the more details page with the name of the<br>product as a query string parameter (this URL is generated using PHP tags).<br>When the link is clicked, the user is redirected to the page.&nbsp; If<br>there is no query string parameter, a message is flashed saying that a<br>product must be selected to view this page and the user is redirected.<br>However, if it is set, the value is retrieved and cached from the<br>$_GET magic variable. Using this name in the where clause of the query,<br>the parameter is bound,&nbsp; the statement is executed against the database, and the<br>result is cached into a variable. The page uses PHP tags to populate<br>HTML elements with information about the product. In addition, conditional HTML is used<br>to determine whether the add to cart button is shown (for logged in<br>users only) or the edit button is shown (for admin/shop owner only).<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/70">https://github.com/saumyad03/IT202-450/pull/70</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a direct link to heroku prod for this file (can be any specific item)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/more_details.php">https://sd96-prod.herokuapp.com/Project/more_details.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Add to Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot of the success message of adding to cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429027-88fac1d4-e4a0-4fec-82cc-6598cdcb6ceb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Success message of adding Rainbow Sunglasses to the cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the error message of adding to cart (i.e., when not logged in)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429048-4a334afe-5397-4bad-87a5-2feafcf04532.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>In compliance with the proposal requirement &quot;User must be logged in for any<br>Cart related activity&quot;, I simply did not allow the add to cart button<br>show up if the user wasn&#39;t logged in rather than flashing a message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Cart table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429270-a4dc189c-3fce-4221-9df6-b4a6ae399c44.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Cart table with data in it<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Tell how your cart works (1 cart per user; multiple carts per user)</td></tr>
<tr><td> <em>Response:</em> <p>My cart works by having 1 cart per user. The product_id and user_id<br>together form a composite unique key that identifies each record along with the<br>id (this is auto incremented and is the primary key). product_id is a<br>foreign key that references the primary key id from the Products table while<br>user_id is a foreign key that references the primary key id from the<br>Users table. The desired_quantity and unit_price for each item the user wants is<br>also stored. Finally, there is a modified (set when record is first created<br>and changed when it is modified) and created column (set when record is<br>first created).<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Explain the process of add to cart</td></tr>
<tr><td> <em>Response:</em> <p>When the user clicks, add to cart on the shop list page, admin<br>see all products page, or the more details page, a form is submitted<br>to the cart.php page with the name of the item being sent via<br>the post method (this is stored in a hidden field). On the cart.php<br>page,&nbsp; if the post magic variable has a value set for this name<br>key,&nbsp; we use an SQL select statement that uses the name in the<br>WHERE clause to fetch the product&#39;s id and price. The name parameter is<br>bound to the statement, the query is executed against the database, and the<br>result is cached in a variable. After this, an SQL insert query is<br>prepared, getting product_id and unit_price from the select statement we just ran (we<br>cached the result) and the user_id from the helper function we made earlier.<br>Then, the parameters are bound, the query is executed against the database, and<br>a success message is flashed. If the product is already in the cart<br>or an unknown error occurred, this is shown using a flash message. After<br>this, a fresh select statement is used to generate the latest data for<br>the cart.php page (we will talk more about this in the next deliverable).<br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/71">https://github.com/saumyad03/IT202-450/pull/71</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/80">https://github.com/saumyad03/IT202-450/pull/80</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User will be able to see their Cart </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Cart View</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429917-25349a0e-e38a-4078-9374-bfbf858f2db4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Cart View showing subtotal, cart total, product details page (this can<br>be accessed by clicking the name of the product), and few different items<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain how the cart is being shown from a code perspective along with the subtotal and total calculations</td></tr>
<tr><td> <em>Response:</em> <p>On the cart.php page, we get the user&#39;s id using a helper function<br>we developed earlier. Then we use an SQL select statement to retrieve all<br>the cart details for this user by putting the user&#39;s id in the<br>WHERE clause. We select the Product table&#39;s id column, Product table&#39;s name column,<br>Product table&#39;s unit_price column, and the Cart table&#39;s desired_quantity column from the Cart<br>table left joined with the Products table (they are united because the product_id<br>in the Cart table is the id in the Products table). After binding<br>the user id to the query, it is executed against the database, and<br>the results are cached. The cart item&#39;s are displayed in a table, using<br>a PHP foreach loop. The subtotal column is calculated by multiplying the desired<br>quantity by the unit price on the server side and populating the HTML<br>elements with this value. A total variable is also initialized with the value<br>0 prior to the foreach loop running and on each iteration, the subtotal<br>is added so that it can be displayed after the loop finished running.<br>Of course, each name of a product is really a link that leads<br>to the more details page.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/72">https://github.com/saumyad03/IT202-450/pull/72</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to heroku prod for this file</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/cart.php">https://sd96-prod.herokuapp.com/Project/cart.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> User can update cart quantity </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show a before and after screenshot of Cart Quantity update</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430223-829b8820-4dfe-4a24-ad98-9d7c007b1f0a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before, we only have 1 Rainbow Sunglasses in our cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430247-ef15dab4-b79a-4d52-abb7-41db81515549.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After, we have 5 Rainbow Sunglasses in our cart and a success message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show a before and after screenshot of setting Cart Quantity to 0</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430272-dac87cd7-08b6-4fa0-b913-9bc2b318b079.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before, we have 5 Rainbow sunglasses in our cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430283-4e537802-b5c6-47de-9707-263da819b3fe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Now, we changed the quantity to 0 BUT we did not update<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430301-aa620b9f-28dd-470c-991e-006bd1368052.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After, we updated, thereby removing the item from our cart and showing a<br>success flash message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Show how a negative quantity is handled</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430323-8cedd00c-969f-4595-aa12-9a48cf2bff13.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Browser doesn&#39;t allow less than 0 as a valid quantity (there is also<br>client-side JavaScript and server-side PHP validation that doesn&#39;t get triggered)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain the update process including how a value of 0 and negatives are handled</td></tr>
<tr><td> <em>Response:</em> <p>The quantity input field, the update button, and a hidden input element containing<br>the id of the product constitute a form that is submitted via the<br>post method. The forms values are automatically validated on the browser side by<br>setting a min attribute for the quantity. Additionally, using the onsubmit attribute, the<br>form is validated on the client side using a simple conditional to ensure<br>the quantity is not below 0, flashing a message and not allowing submission<br>if it is. When the page is reloaded, if the quantity and id<br>keys are set, these values are cached in variables to make them easier<br>to write. Additionally, the user id is retrieved using the helper function we<br>created earlier.&nbsp;&nbsp;A final level of server side validation ensures that the quantity is<br>not less than 0. If is, an error message is flashed. Otherwise, if<br>the quantity is greater than 0, a query is prepared to update the<br>Cart table&#39;s desired_quantity (SQL update statement) using the user&#39;s id and the product&#39;s<br>id in the where clause. However, if the quantity is equal to 0,<br>a query is prepared to delete (SQL delete statement) the entry using the<br>user id and product id in the where clause. After the parameters are<br>bound, it is executed against the database. Since the select statement on the<br>cart page is after the quantity update part, the cart gets fresh data<br>for the page.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/73">https://github.com/saumyad03/IT202-450/pull/73</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Cart Item Removal </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a before and after screenshot of deleting a single item from the Cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430751-7a3bcfd7-4759-4059-9573-1b9df44db2cc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before deleting computer from cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430773-be1ba205-eb53-4d2a-b29f-b56cd76e1702.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After deleting computer from cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a before and after screenshot of clearing the cart</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430793-9a53d771-8dd3-4001-aaa8-20f28adb0b8a.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before clearing cart<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179430807-d9ebfc67-d100-4ec9-a2e7-e3ca132a80a6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After clearing cart<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how each delete process works</td></tr>
<tr><td> <em>Response:</em> <div>For single item deletion, when the cart is displayed,&nbsp; there is a form<br>added with a hidden element containing the id of the product with the<br>name "remove-id" and a visible submit button with the text "Delete". When the<br>form is submitted, the values are sent to the page via the post<br>method. If the remove-id key is set in the post magic variable, then<br>an SQL delete query is prepared to delete the item from the cart.<br>Since the user id and product id are a unique composite key, these<br>are used in the where clause to identify what should be deleted. We<br>have the product's id from the hidden field and user id can be<br>retrieved with the helper function we made earlier. After binding these values to<br>the query parameters, we execute the query against the database, flashing a success<br>message if it works and an error message if it fails (exception). For<br>deletion of all cart items, there is a form at the bottom of<br>the cart with a hidden input element with the name "remove-all." When the<br>form is submitted, the page refreshes. If the "remove-all" key is set in<br>the post magic variable, a delete statement is prepared passing in the user<br>id in the where clause (we retrieved it using the helper function). After<br>binding the parameter value, the query is executed against the database. Both of<br>these operations occur BEFORE the select statement is executed so that the freshest<br>and most up-to-date cart is displayed.</div><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request link(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/75">https://github.com/saumyad03/IT202-450/pull/75</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 10: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone2 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429319-aa921184-a35a-4647-9eb4-78ff1393e673.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing closed issues<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429342-97865ed6-914e-4457-8882-18dedaa5bc47.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing closed issues<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429353-9a942b90-a86d-47f9-a35c-45c07a2b6f20.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing closed issues<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429368-1fb1174b-0989-437c-9649-136a625a5260.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing closed issues<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/179429382-9aa80d33-1f35-4da4-86c4-85c5763ffc73.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Showing closed issues<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your herok prod project's login page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/login.php">https://sd96-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-2-shop-project/grade/sd96" target="_blank">Grading</a></td></tr></table>