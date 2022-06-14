<table><tr><td> <em>Assignment: </em> IT202 JavaScript and CSS Challenge</td></tr>
<tr><td> <em>Student: </em> Saumya Dwivedi(sd96)</td></tr>
<tr><td> <em>Generated: </em> 6/13/2022 10:08:09 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-javascript-and-css-challenge/grade/sd96" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ul><li>Reminder: Make sure you start in dev and it's up to date<ol><li><code>git checkout dev</code></li><li><code>git pull origin dev</code></li><li><code>git checkout -b M3-Challenge-HW</code></li></ol></li></ul><ol><li>Create a copy of the template given here:&nbsp;<a href="https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c">https://gist.github.com/MattToegel/77e4b66e3c73c074ea215562ebce717c</a></li><li>Implement the changes defined in the body of the code</li><li><strong>Do not</strong>&nbsp;edit anything where the comments tell you not to edit, you will lose points for not following directions</li><li>Make changes where the comments tell you (via TODO's or just above the lines that tell you not to edit below)<ol><li><strong>Hint</strong>: Just change things in the designated&nbsp;<code>&lt;style&gt;</code>&nbsp;and&nbsp;<code>&lt;script&gt;</code>&nbsp;tags</li><li><strong>Important</strong>: The function that drives one of the challenges is&nbsp;<code>updateCurrentPage(str)</code>&nbsp;which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.</li></ol></li><li>Create a branch called M3-Challenge-HW if you haven't yet</li><li>Add this template to that branch (git add/git commit)</li><li>Make a pull request for this branch once you push it</li><li>You may manually deploy the HW branch to dev to get the evidence for the below prompts</li><li>Create a new file&nbsp;<strong>m3_submission.md</strong>&nbsp;file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)</li><li>Add, commit, and push the submission file</li><li>Close the pull request by merging it to dev (double-check all looks good on dev)</li><li>Manually create a new pull request from dev to prod (i.e., base: prod &lt;- compare: dev)</li><li>Complete the merge to deploy to production</li><li>Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission</li></ol><style>` and `<script>` tags
    2. **Important**: The function that drives one of the challenges is `updateCurrentPage(str)` which takes 1 parameter, a string of the word to display as the current page. This function is not included in the code of the page, along with a few other things, are linked via an external js file. Make sure you do not delete this line.  
5. Create a branch called M3-Challenge-HW if you haven't yet
6. Add this template to that branch (git add/git commit)
7. Make a pull request for this branch once you push it
8. You may manually deploy the HW branch to dev to get the evidence for the below prompts
9. Create a new file **m3_submission.md** file in the hw branch and fill it with the output generated from this page (be careful not to paste more than once)
10. Add, commit, and push the submission file
11. Close the pull request by merging it to dev (double-check all looks good on dev)
12. Manually create a new pull request from dev to prod (i.e., base: prod <- compare: dev)
13. Complete the merge to deploy to production
14. Submit the direct link of the m3_submission.md from the prod branch to Canvas for this submission
</style></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Completed Challenge Screenshots </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> 5 Screenshots based on the checklist items for this task</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/173476441-d833da75-4518-49a8-8959-a430883ada16.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Primary page with the checklist items completed<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/173476458-5a091d80-3cdd-4e30-a4d3-365488287fda.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Page after the login link is clicked with URL shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/173476475-8e5396d6-e213-4a02-b2c4-a8e3b3c4e563.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Page after the register link is clicked with URL shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/173476487-7026bfec-4e18-4be7-ad74-739aa7689f05.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Page after the profile link is clicked with URL shown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/173476497-d0c29134-148b-488b-858f-82b632f10197.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Page after the logout link is clicked with URL shown<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Explain Solutions (Grader use this section to determine completion of each challenge) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Briefly explain how you made the navigation horizontal</td></tr>
<tr><td> <em>Response:</em> <p>To make the navigation horizontal, I selected the list elements from the navigation<br>only by using the CSS selector as such: nav &gt; ul &gt; li.<br>Then, I changed the display property to inline.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Briefly explain how you remove the navigation list item markers</td></tr>
<tr><td> <em>Response:</em> <p>When I used the selector from the previous sub-task (nav &gt; ul &gt;<br>li) and changed the display property to inline, the list&#39;s default display property<br>value was overwritten from list-item to inline, thereby removing the list item markers.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you gave the navigation a background</td></tr>
<tr><td> <em>Response:</em> <p>To give the navigation a background, I selected the nav tag and changed<br>the background-color property to a gray color.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Briefly explain how you made the links (or their surrounding area) change color on mouseover/hover</td></tr>
<tr><td> <em>Response:</em> <p>In order to make the links and their surrounding area change on mouseover/hover,<br>I used a:hover to select the links when I hover over them, setting<br>the background-color property to a lighter gray than the background and the color<br>property to red.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Briefly explain how you changed the challenge list bullet points to checkmarks (✓)</td></tr>
<tr><td> <em>Response:</em> <p>To change the list bullet points to checkmarks, I set the list-style property<br>to to &quot;<span style="letter-spacing: 0.09996px;">✓&quot;.</span><br></p><br></td></tr>
<tr><td> <em>Sub-Task 6: </em> Briefly explain how you made the first character of the h1 tags and anchor tags uppercased</td></tr>
<tr><td> <em>Response:</em> <p>To capitalize the h1 and anchor tags, I selected them by doing h1,<br>a and set the text-transform property to capitalize;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Briefly explain/describe your custom styling of your choice</td></tr>
<tr><td> <em>Response:</em> <p>First, I removed the underlines from the links, changed their default text color<br>to white, and increased their hitboxes. I did this by selecting the links<br>with a, then setting the text-decoration property to none, and setting the color<br>property to white. To increase their hitboxes and spacing, I added 5px of<br>padding to each side of the box by changing the padding property. Then,<br>I matched this change in the nav background by selecting the nav and<br>changing the padding property so that 5px was added to the top and<br>bottom. Finally, I removed the margins from the ul elements in the nav<br>by selecting them using nav &gt; ul and changing the margin property value<br>to 0. This was done because it was interfering with the nav&#39;s padding<br>change.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 8: </em> Briefly explain how the styling for the challenge list doesn't impact the navigation list</td></tr>
<tr><td> <em>Response:</em> <p>Since CSS is cascading, I placed the CSS declarations for all ul elements<br>(selector: ul) prior to my CSS declarations for the li elements under the<br>nav bar (selector: nav &gt; ul &gt; li). Therefore, due to the cascading<br>effect of CSS, the alterations that occur later are the ones that take<br>effect. This means that the more specific declarations on the nav bar elements<br>take effect. In addition, by making the display property of the nav bar<br>list elements inline, I removed the markers for the list. Therefore, even if<br>I say that the list markers are checkmarks for all ul elements (and<br>don&#39;t take advantage of CSS&#39;s cascading properties), they won&#39;t show up because the<br>display property is inline and not list-item.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 9: </em> Briefly explain how you updated the content of the h1 tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>When the page loads, I added an event listener to the link elements<br>in the nav bar using the selector for a tags and a for<br>loop. This event listener listens for a &quot;click&quot; and calls getCurrentSelection. getCurrentSelection gets<br>the textContent of whatever element triggered this event (the link) and sets it<br>to a variable called word. This variable is passed as an argument for<br>the updateCurrentPage function, thereby updating both the h1 and title tags.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 10: </em> Briefly explain how you updated the content of the title tag with the link text</td></tr>
<tr><td> <em>Response:</em> <p>When the page loads, I added an event listener to the link elements<br>in the nav bar using the selector for a tags and a for<br>loop. This event listener listens for a &quot;click&quot; and calls getCurrentSelection. getCurrentSelection gets<br>the textContent of whatever element triggered this event (the link) and sets it<br>to a variable called word. This variable is passed as an argument for<br>the updateCurrentPage function, thereby updating both the h1 and title tags.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Comment briefly talking about what you learned and/or any difficulties you encountered and how you resolved them (or attempted to)</td></tr>
<tr><td> <em>Response:</em> <p>A difficulty I encountered was having children of a parent element interfering with<br>the styling of the parent. To resolve this, I changed the styling of<br>the child appropriately, so that the parent could be styled (see sub-task 7<br>for more detail). Though I used to give everything IDs and classes before<br>taking this class, I learned how to effectively use the structure of the<br>DOM to select elements for both CSS and JavaScript. I also learned how<br>to use event listeners to create dynamic web pages that respond to user<br>input.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a link to your pull request (hw branch to dev only)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/18">https://github.com/saumyad03/IT202-450/pull/18</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a link to your solution html file from prod (again you can assume the url at this point)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/challenge.html">https://sd96-prod.herokuapp.com/challenge.html</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/it202-javascript-and-css-challenge/grade/sd96" target="_blank">Grading</a></td></tr></table>