<table><tr><td> <em>Assignment: </em> IT202 Milestone 4 Shop Project</td></tr>
<tr><td> <em>Student: </em> Saumya Dwivedi(sd96)</td></tr>
<tr><td> <em>Generated: </em> 8/8/2022 7:57:47 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-4-shop-project/grade/sd96" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone4 branch</li><li>Create a new markdown file called milestone4.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone4.md</li><li>Add/commit/push the changes to Milestone4</li><li>PR Milestone4 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes</li><li>Submit the direct link to this new milestone4.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on GitHub and everywhere else. Images are only accepted from dev or prod, not localhost. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> User can set their profile to public or private </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of new column on the Users table</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183523689-a4f29e2c-81aa-40aa-9500-ff0d7b9042eb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table with public column of datatype tinyint (1 represents a public profile<br>while 0 represents a private profile)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of updated profile edit view</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183526603-7e7994c6-a7ec-467c-aaac-7c33e09927db.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of updates profile view, showing ratings for current user and ability to<br>change profile to public or private<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of profile view view (ensure email isn't shown publicly)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183526173-8889249d-ed4b-4872-a937-30b6fa4e1adc.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows profile view view without a publicly available email address, displaying the reviews<br>the user gave (the name of the product is the link to the<br>Product Details page)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s) links</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/107">https://github.com/saumyad03/IT202-450/pull/107</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add direct link to a public profile from heroku</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/profile_info.php?username=mattvideo2">https://sd96-prod.herokuapp.com/Project/profile_info.php?username=mattvideo2</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic behind how public/private profile works</td></tr>
<tr><td> <em>Response:</em> <p>When the user registers an account, there isn&#39;t an option to change profile<br>visibility. However, after account creation, they may go to the profile page to<br>edit their profile. On the profile page, there is a dropdown labeled privacy.<br>When the user clicks update on the profile page, the same way the<br>username, password, and so on are updated, the privacy settings of the user<br>are updated. Here are the basic steps of how that works. When the<br>user clicks the &quot;Update Profile&quot; button, all the changes made are sent to<br>the webpage through the POST method. Using an SQL Update statement, we prepare<br>a query to update the public column in the Users table, setting it<br>to whatever the user chose (along with everything else like username, password, etc.).<br>Before insertion, the public variable is reassigned to a 0 or a 1<br>based on the value of what was submitted via the form so that<br>the appropriate value can be selected to represent the user&#39;s privacy settings in<br>the database. Then, the parameters are bound and the statement is executed against<br>the database. Another thing to note is that these up-to-date privacy settings are<br>shown by using conditional HTML and PHP tags to determine where to put<br>the selected attribute. Whenever someone tries to access the page to view other&#39;s<br>profiles, when the page loads, using the user&#39;s username in the where clause<br>of an SQL select statement, we retrieve the privacy settings (along with other<br>information that&#39;s useful is we allow the page to load). If the user&#39;s<br>profile is private, a message explaining this is flashed and the user is<br>redirected to the home page.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> User will be able to rate a product they purchased </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the Ratings table with some data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183527477-be23d8da-94a9-46f2-a163-08b0fce14a18.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Ratings table with some data in it<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Product Details page with comments/ratings and the form to add another and the average rating</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183527588-7d322f01-fb3f-4203-91ca-e43add397f08.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Product Details page with comments/ratings and the form to add another<br>rating and the average rating<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add screenshot of the error message for a user trying to rate/comment that hasn't purchased the product</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183527757-c2b0b4ac-22aa-4c00-904a-0447d7d115d4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>For a user that hasn&#39;t purchased the product, the form to add another<br>rating doesn&#39;t even show up, preventing them from rating a product they haven&#39;t<br>purchased<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/108">https://github.com/saumyad03/IT202-450/pull/108</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/109">https://github.com/saumyad03/IT202-450/pull/109</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add link to a product details page with ratings/comments</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/more_details.php?name=Baseball">https://sd96-prod.herokuapp.com/Project/more_details.php?name=Baseball</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain the logic being adding comment/rating and validations</td></tr>
<tr><td> <em>Response:</em> <p>On the more details page for a product, if the user is logged<br>in,&nbsp; an SQL select statement is used on Orders inner joined with OrderItems<br>(this has to be done since only Orders has the purchasing user&#39;s id<br>while the OrderItems table contains a reference to the order_id) to retrieve an<br>order id. The query is prepared, the parameters are bound, and it is<br>executed against the database. If the query was successful in finding a record<br>or multiple, a variable called $canRate is set to true. Then, when the<br>page is loading, conditional HTML and PHP tags are used so that the<br>form for submitting reviews is only available if the variable mentioned earlier is<br>true. To add a review, the form submits the form data via the<br>POST method to the webpage.&nbsp; Note that there is a hidden input field<br>that stores the product&#39;s id. When the page is reloaded,&nbsp; the posted form<br>data is cached and an SQL insert statement is prepared to insert into<br>the Ratings table. The user id is retrieved using the helper function we<br>created earlier. Therefore, we insert the rating, the comment, user id, and product<br>id. The parameters are bound and the statement is executed against the database.<br>Finally, a fresh SQL select statement is prepared to get the most up<br>to date ratings (including this one). The SQL statement retrieves the rating and<br>comments for the product using the product id in the where clause. The<br>query is prepared, parameters are bound, and the statement is executed against a<br>database. Then, the data is displayed in tabular format with two columns (rating<br>and comment) using a PHP tags to using the foreach loop and safer<br>echo function to display all the data.<br><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> User's Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183529846-8c4716ed-cb94-4442-9fff-faa97d192443.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of page 1 with no filters applied<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183529896-cdcbd1a8-6335-4b5c-88da-0686e800b510.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of page 2 with no filters applied<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183529971-6c03f99a-159c-496f-8b0c-44521a79874d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of date range filter applied to 24 hours and date sort set<br>to oldest to newest<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183530138-8bbdfb63-46c4-4786-ad40-c10657becf96.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of date range filter applied to 24 hours, category filter applied to<br>sports, total sort applied to high-low, and date sort applied to oldest to<br>newest<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183530244-8ebc1c9e-9c29-4a2a-9920-79bc662e7bf2.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of page 1 with total sort set to high to low and<br>date sort set to oldest to newest<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183530560-4dfa8f0c-fcef-492a-b807-5f127ce75a42.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of page 2 with total sort set to high to low and<br>date sort set to oldest to newest<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/113">https://github.com/saumyad03/IT202-450/pull/113</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/purchase_history.php">https://sd96-prod.herokuapp.com/Project/purchase_history.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Store Owner Purchase History Changes </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots demonstrating examples of the filters/pagination applied (ensure the calculated total price is clearly visible)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183533491-02d0fb26-f1e5-41c7-8ccd-6f5630154d01.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Store Owner Purchase History page 1 with no filters applied (page total can<br>be seen in the bottom left corner)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183533633-301aceac-d667-48ce-80f6-40825a09fb15.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Store Owner Purchase History page 1 with last 24 hours date range, sports<br>category, total sort high-low, and date sort oldest to newest<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183533824-aa547c3b-a8c3-4e6f-92e6-20509d8a2e60.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Store Owner Purchase History page 2 with last 24 hours date range, sports<br>category, total sort high-low, and date sort oldest to newest<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183533853-6d70539e-14d6-48a4-88f6-807823d1f01b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Store Owner Purchase History page 3 with last 24 hours date range, sports<br>category, total sort high-low, and date sort oldest to newest<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/114">https://github.com/saumyad03/IT202-450/pull/114</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to the store owner's purchase history page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/see_purchase_history.php">https://sd96-prod.herokuapp.com/Project/see_purchase_history.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how the total price is calculated based on the filtered/paginated results</td></tr>
<tr><td> <em>Response:</em> <p>The total price was very simple to calculate. Before I iterated through the<br>results, I created a variable total which I set equal to 0. These<br>results were retrieved using an SQL Select statement that retrieved information like total<br>price, payment method, as so on (I talked more about this in the<br>previous milestone). Then, on each iteration where a row was created, I added<br>each result&#39;s order&#39;s total price to that total value. At the end of<br>the table, I displayed it using PHP tags and the safer echo function.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Add pagination to Shop </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot(s) of the newly paginated pages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183531254-b7699000-6574-4f9b-932b-269c50e0f9e5.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page no filter applied page 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183531274-92f36303-a702-4a36-bf31-9a930c7d57f0.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page no filter applied page 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183531347-08b4b6e1-1e04-48d1-9b0a-e241906d97d4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page low-high price sort and high-low rating sort page 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183531397-57270384-9fae-4427-98ff-4bb90b3b6d80.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page low-high price sort and high-low rating sort page 2<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/110">https://github.com/saumyad03/IT202-450/pull/110</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related pages</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/home.php">https://sd96-prod.herokuapp.com/Project/home.php</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Store Owner will be able to see all products out of stock </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshot of the out of stock results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183531601-2fa4cd42-7418-481d-8ade-093dfccdfc35.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>See products page filtered by what is out of stock (pagination can be<br>seen at the bottom but there is only one page of results)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183531670-826aa0a5-9776-40aa-bb79-05b857f7ea90.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>See products page with no filter applied page 1 (to demonstrate pagination)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183531690-1a1e043a-5c3c-4453-885f-db2fe395304b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>See products page with no filter applied page 2 (to demonstrate pagination)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/111">https://github.com/saumyad03/IT202-450/pull/111</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/see_products.php">https://sd96-prod.herokuapp.com/Project/see_products.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain your approach to this view</td></tr>
<tr><td> <em>Response:</em> <p>This was relatively simple to implement. In the form that allows the shopowner<br>to filter and sort results, I also included a filter called stock, which<br>allows the user to see out of stock items, in stock items, or<br>all items (the default). When the user submits the filter/sort form, the data<br>is sent to the webpage via the get method so that the string<br>query parameters are persisted.&nbsp; These values are cached to variables. On the PHP<br>side, a query is dynamically generated as things are appended to the WHERE<br>clause or ORDER BY clause. In this case, &quot;AND stock &lt; 1&quot;, &quot;AND<br>stock &gt;= 1&quot;, or nothing is appended based on whether the user chose<br>&quot;out of stock&quot;, &quot;in stock&quot;, or &quot;all.&quot; Then, when the SQL select query<br>runs to get the product information, the conditions are followed so that only<br>the items we want to see are shown. Since a variable was cached,<br>containing what we chose for this filter, we can prefill/persist the form and<br>link when we paginate or reload the page in general.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> User can sort products by average rating on the shop page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing the sort in effect</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183532541-2d37d9b5-d94a-43a5-8b7d-d9fc57b908fd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page no filter applied<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183532573-7211ed9a-cda9-4f4c-953b-e1316553530c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page rating sort low-high applied<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183532622-add3978f-bfeb-496b-b065-26aa441b1acd.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shop page rating sort high-low applied<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshot of the Products table (or your implementation/approach to average rating)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183532700-6818803c-8eb8-4623-b1b0-496294d661b1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Products table with average_rating column<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183532839-7408ccc4-f681-42c8-9ac8-c14719ff6642.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of code snippet with average rating calculation functionality (loads all reviews and<br>iterates through them to get total and then divide by the number of<br>reviews to get average, then this value is inserted into the Products table)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add related pull request(s)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/112">https://github.com/saumyad03/IT202-450/pull/112</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add links to related page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/home.php">https://sd96-prod.herokuapp.com/Project/home.php</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you implemented the average rating recording logic and how it applies to this sort on shop</td></tr>
<tr><td> <em>Response:</em> <p>When a user adds a rating on the more_details page for products, all<br>the product&#39;s ratings are retrieved using an SQL select statement that retrieves ratings<br>is prepared, has its parameters bound, and executed against the database. Then, the<br>results of this query execution are iterated through to find the total ratings<br>and divided by the amount of ratings to calculate the average. Then, an<br>SQL update statement is prepared to update the product&#39;s rating in the Products<br>table to the new rating (the default is 5/5). The query is prepared,<br>its parameters are bound, and it is executed against the database. The newly<br>calculated value is what is displayed in the more_details page under Average Rating<br>by using php tags and echoing the value and the average_rating is updated<br>in the Products table nicely (hybrid approach to take advantage of the benefits<br>of both).<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed (Milestone4 issues)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183528244-6faa6602-57c6-4476-aac3-067325df4e47.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing Milestone 4 Issues/Deliverables 1-3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183528280-0068c160-c5f3-4508-a77d-242a2c0b1ee4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing Milestone 4 Issues/Deliverables 4-6<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/183528314-3d739a9f-2cdc-4233-b7fc-5f9179be9aa1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot showing Milestone 4 Issues/Deliverables 7<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone-4-shop-project/grade/sd96" target="_blank">Grading</a></td></tr></table>