<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Saumya Dwivedi(sd96)</td></tr>
<tr><td> <em>Generated: </em> 7/6/2022 12:19:10 AM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone1-deliverable/grade/sd96" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177454799-934dad79-decc-43df-a71f-bb099f7ff5ff.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows invalid email address<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177455232-815b06e5-4495-401a-847d-e839da750110.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows invalid password validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177455362-8d39ed40-d67b-4f75-aea8-bb9aea8a8f1c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows passwords not matching validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177455511-281d646a-cc91-4ab7-a680-e19dc8955ae9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows email not available validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177455700-7e3f461f-a79c-4335-9e2a-895453192621.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows username not available validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177455811-9117e27a-165f-4377-8727-2fe287ec44c9.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows form with valid data before submission<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177456048-b4fa7d70-a8a6-4a60-a85b-19070ca9fcb3.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table with valid user from Task 1<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/25">https://github.com/saumyad03/IT202-450/pull/25</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/38">https://github.com/saumyad03/IT202-450/pull/38</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The form submission is simple HTML. This HTML includes browser validation in the<br>attributes of the elements to ensure that certain input elements are either filled<br>out, a specific length (password), or a specific format (email). A second layer<br>of validation is done on the JavaScript side that ensures that the values<br>contained within the form&#39;s children are valid (if invalid, the form doesn&#39;t submit).<br>Once the page is reloaded on submission, PHP accesses the values from $_POST<br>magic variable to do one final round or layer of validation using simple<br>conditionals. It does the least costly validations first (non-DB). Finally, it uses SQL<br>to insert the new user&#39;s data into the database (the password is hashed<br>before it is inserted). However, since the table doesn&#39;t accept duplicate values, this<br>statement could throw an exception, which is handled in the try-catch statement where<br>it flashes a message saying the email or username is already in use.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177457919-fd132b9d-28d5-4fd3-8750-9a4857b138de.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Incorrect password validation error<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177458037-819b67cf-1886-4e09-a6f3-4adba1ee7e4e.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Non-existing user validation<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177458564-33360cbc-3dda-4f07-a41c-a79747eef9d4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/26">https://github.com/saumyad03/IT202-450/pull/26</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The browser side validates the username and password through HTML, ensuring that they&#39;re<br>filled out and of appropriate length. Then, JavaScript validation is done to determine<br>whether the form should actually be submitted checking things like emptiness, formatting, length,<br>etc. Finally, the server side gets the details of the submission via the<br>$_POST magic variable. The values are validated from the PHP side using non-DB<br>(non-costly) methods (simple conditionals). Finally, SQL is used to retrieve the hashed password<br>from the database. Using PHP functions, we ensure the newly entered password and<br>the actual password are the same. Upon authenticating this, we retrieve the roles<br>this user has to give them access to certain privileges. If either the<br>email or password are incorrect, a message is flashed saying this.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177459776-4bdf78e6-a84a-4dc7-994c-d34ab908af32.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful logout message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177459854-44c1bd2e-52ec-4604-bd5c-9523ef195def.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Going back after logging out doesn&#39;t re-login the user or give them access<br>to the home page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/28">https://github.com/saumyad03/IT202-450/pull/28</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/32">https://github.com/saumyad03/IT202-450/pull/32</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>Once logout is clicked, the user is redirected to a logout page they<br>will never see. Here, the user&#39;s session is reset (unset, destroyed, and new<br>one is started) and then, they are redirected the login page. Therefore, backspacing<br>doesn&#39;t allow a user to re-access a page. In addition, pages are protected<br>using a PHP function that checks if a user is logged in by<br>seeing if a user is set in the $_SESSION variable.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177459854-44c1bd2e-52ec-4604-bd5c-9523ef195def.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Going back after logging out doesn&#39;t re-login the user or give them access<br>to the home page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177460986-7dfda9c4-77f3-4ec7-9877-65fd80eb6cd7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows what a user trying to access a role-protected page can see<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177461069-6baccad8-05d7-441b-958f-9366998915ea.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of Roles table with valid data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177461116-61008453-3b67-4369-acd8-e48b1505d1c7.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Screenshot of UserRoles table with valid data (user_id is 6 which is <a href="mailto:&#109;&#97;&#x74;&#x74;&#118;&#x69;&#100;&#101;&#x6f;&#64;&#116;&#101;&#115;&#116;&#x2e;&#x63;&#x6f;&#x6d;">&#109;&#97;&#x74;&#x74;&#118;&#x69;&#100;&#101;&#x6f;&#64;&#116;&#101;&#115;&#116;&#x2e;&#x63;&#x6f;&#x6d;</a><br>and role_id is 1 which is admin)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/33">https://github.com/saumyad03/IT202-450/pull/33</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Before the page is loaded, the is_logged_in function checks whether the user is<br>logged in by checking whether a user is set in the session ($S_SESSION<br>variable). If a user it set, the user has access. Otherwise,&nbsp; the user<br>is redirected and a message is flashed telling the user that they don&#39;t<br>have access to the login-protected page.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Similar to login-protected pages, role-protected pages call the has_role function to determine whether<br>a page should be shown. This function essentially checks if the user is<br>logged in and uses the $_SESSION magic variable to loop through the array<br>of roles that the user has. If the role that is passed through<br>the function is in the array, it returns true. However, if&nbsp; a user<br>doesn&#39;t have access to a page, they are redirected and an appropriate message<br>is flashed.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177462268-b00723a5-632f-495b-9185-c950fc88b54d.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Proof of styling for navigation, forms, and clean UI (not hideous example)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/35">https://github.com/saumyad03/IT202-450/pull/35</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <p>The navigation bar was&nbsp; made into a long blue bar that spans the<br>entire page. When the user hovers over one of the links in the<br>nav bar, it is highlighted (li element changes colors). Padding and margins were<br>added or removed to form elements, nav bar, nav bar elements, etc. so<br>that there was decent spacing between everything rather than having a cluttered look.<br>The background, submit button, nav bar, text, and more are all appealing colors.<br>The sub-heading for password reset area is bolded.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177462751-4f8b6738-b931-4304-b8bb-98af2b71b770.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Some user-friendly error messages from the profile page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177462868-90bcaccd-f44e-484c-afb9-7a1b2a0854c6.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User-friendly error message from the login page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177462961-10e38442-6e8b-490b-9b43-e0f8957070fe.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Some user-friendly error messages from the registration page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/36">https://github.com/saumyad03/IT202-450/pull/36</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/37">https://github.com/saumyad03/IT202-450/pull/37</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>On the server side, rather than echoing the output or exception onto the<br>webpage, I flashed a message and error logged the problem. On the client<br>side, when there was an issue, I flashed a message with the appropriate<br>description of the issue and prevented the form from submitting. The browser side<br>already provides useful messages for length, formatting, etc. All messages were done using<br>relatively simple conditionals and the flash function from either flash_messages.php or helpers.php (JS<br>flash function).<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177463400-89a4c8c7-1c76-4515-8e3b-ba1c441ab985.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>User Profile page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/29">https://github.com/saumyad03/IT202-450/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>When the user is logged in, the session magic variable stores information about<br>the user such as roles, username, and email. Therefore, when the user accesses<br>the profile page, we can use PHP to prepopulate the form with information<br>about the user by accessing this magic variable&#39;s data.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177463628-b09cd0bd-6368-4351-9989-75ed16d722f1.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177463692-85673cc5-8bd9-4a23-8c44-1d74b149f12f.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177464103-068e9389-ba52-4408-a613-111c71054593.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177463894-fda80200-d906-4507-8674-11bade6dbc1c.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Password mismatch message<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177464197-94f0447c-032a-474c-be93-d6ddc1dba3b4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before user edits their profile (username will change)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177464312-9673afd7-c8f8-4e9a-bd73-f099b204c6ee.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>After a user edits their profile (username changes)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/29">https://github.com/saumyad03/IT202-450/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>After validating the user&#39;s data, the data from the form is grabbed by<br>accessing them from the post magic variable. Using SQL, the database is updated<br>to use the newly provided information using the user&#39;s id as the where<br>clause.&nbsp; Then, SQL is used to select or grab the fresh data to<br>populate the forms. Username, email, and passwords are all edited in the same<br>way AFTER validation.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177466435-4a39cdaa-39c5-448d-9265-e6fca2c15639.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Milestone features 1-3 issues<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177466484-1c170baf-e49a-468f-aa48-ea2256bcccfa.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Milestone features 4-6 issues<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177466512-59d3128a-ad55-4209-b9d7-fc4bebbea68b.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Milestone features 7-9 issues<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/projects/1">https://github.com/saumyad03/IT202-450/projects/1</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/Project/login.php">https://sd96-prod.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-milestone1-deliverable/grade/sd96" target="_blank">Grading</a></td></tr></table>