<table><tr><td> <em>Assignment: </em> HW HTML5 Canvas Game</td></tr>
<tr><td> <em>Student: </em> Saumya Dwivedi(sd96)</td></tr>
<tr><td> <em>Generated: </em> 7/7/2022 7:56:00 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/hw-html5-canvas-game/grade/sd96" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Create a branch for this assignment called&nbsp;<em>M6-HTML5-Canvas</em></li><li>Pick a base HTML5 game from&nbsp;<a href="https://bencentra.com/2017-07-11-basic-html5-canvas-games.html">https://bencentra.com/2017-07-11-basic-html5-canvas-games.html</a></li><li>Create a folder inside public_html called&nbsp;<em>M6</em></li><li>Create an html5.html file in your M6 folder (do not put it in Project even if you're doing arcade)</li><li>Copy one of the base games (from the above link)</li><li>Add/Commit the baseline of the game you'll mod for this assignment&nbsp;<em>(Do this before you start any mods/changes)</em></li><li>Make two significant changes<ol><li>Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once.</li><li>Direct copies of my class example changes will not be accepted (i.e., just having an AI player for pong, rotating canvas, or multi-ball unless you make a significant tweak to it)</li><li>Significant changes are things that change with game logic or modify how the game works. Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once). You may however change such values through game logic during runtime. (i.e., when points are scored, boundaries are hit, some action occurs, etc)</li></ol></li><li>Evidence/Screenshots<ol><li>As best as you can, gather evidence for your first significant change and fill in the deliverable items below.</li><li>As best as you can, gather evidence for your significant change and fill in the deliverable items below.</li><li>Remember to include your ucid/date as comments in any screenshots that have code</li><li>Ensure your screenshots load and are visible from the md file in step 9</li></ol></li><li>In the M6 folder create a new file called m6_submission.md</li><li>Save your below responses, generate the markdown, and paste the output to this file</li><li>Add/commit/push all related files as necessary</li><li>Merge your pull request once you're satisfied with the .md file and the canvas game mods</li><li>Create a new pull request from dev to prod and merge it</li><li>Locally checkout dev and pull the merged changes from step 12</li></ol><p>Each missed or failed to follow instruction is eligible for -0.25 from the final grade</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Game Info </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What game did you pick to edit/modify?</td></tr>
<tr><td> <em>Response:</em> <p>I picked Arcade Shooter to edit/modify. In short, I added functionality for creating<br>powerups that the player can shoot (yellow = +10 score, purple = bigger<br>bullets, black = increased movement speed) for temporary boosts. Powerups are generated every<br>5 seconds either after a player shoots it or it reaches the end<br>of the screen. While reaching the end of the screen is fine for<br>a powerup, collisions with powerups results in the game ending.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the direct link to the html5.html file from Heroku Prod (i.e., https://mt85-prod.herokuapp.com/M6/html5.html)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://sd96-prod.herokuapp.com/M6/html5.html">https://sd96-prod.herokuapp.com/M6/html5.html</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link for this assignment from M6-HTML5-Canvas to dev</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/saumyad03/IT202-450/pull/49">https://github.com/saumyad03/IT202-450/pull/49</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Significant Change #1 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>The first change/modification I made to the game was implementing powerups that can<br>increase the player&#39;s score by 10 points or increase their ship&#39;s speed. When<br>they are made, they move towards the player similar to enemies. Collisions with<br>powerups results in a game over. However, if the powerup goes off screen,<br>the game will not end (unlike enemies). Powerups are regenerated every 5 seconds<br>after they reach the end of the screen or are shot. Powerups that<br>are time sensitive like increasing the ship&#39;s speed last 5 seconds. The property<br>that the powerup possesses (the boost it gives) dictates its color.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177887222-92fa2e4e-7eed-43ac-8a6a-8ab660eb2979.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows the yellow square coming at the player which is a powerup that<br>increases the player&#39;s score by 10 points.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177887401-75cacf94-e079-49c2-b98e-387bb0755b11.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows the 10 points increase in score that comes from shooting the +10<br>powerup.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177887596-3083c503-1f82-46ec-b1ba-75d55671cfdb.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows the black square coming at the player which is a powerup that<br>increases player&#39;s speed for 5 seconds (speed increase is impossible to show in<br>a screenshot)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177887696-5e00a252-fd5d-45ec-9819-de21dca8be61.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This code creates a variable to store the powerup object. Under it, the<br>makePowerup function creates creates an object that maps the property entity to an<br>object containing the x, y, size, length, and draw functions for the powerup<br>and maps boost to a number that determines what shooting the powerup will<br>do for the player.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177888349-d30e9af2-8dfd-4dd4-82a1-ceae0825d316.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>This code uses the boost property of the powerup object to determine what<br>color the drawn powerup should be. Then, it moves the powerup a certain<br>amount (based on its speed) and draws it by accessing the draw function<br>from the object mapped to the powerup object&#39;s entity key. All this only<br>happens if the powerup exists.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177888498-1d6c3cb0-de92-48b3-aa41-9d86d4a82c69.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>If the powerup hits the edge of the screen, it is set to<br>null and we wait 5 seconds before making a new one. If the<br>powerup collides with the ship, the game is ended. If the powerup collides<br>with the bullet,  the boost is applied based on the value mapped<br>to the boost key in the powerup object. If it&#39;s a yellow powerup,<br>the score variable is increased by 10. If it&#39;s black, the ship.s (speed)<br>is set to 10 (after 5 seconds, the ship.s is set back to<br>5.<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Significant Change #2 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>The second change/modification I made was creating another powerup that increases the size<br>of the bullets the enemy shoots to make the game easier. Similar to<br>other powerups, it lasts 5 seconds. The previously stated features of powerups also<br>hold true. Collisions with the ship results in a game over, powerups going<br>off screen is fine, and powerups regenerate every 5 seconds after they go<br>off screen or are shot. In the following explanations, powerup features (properties and<br>functions) will not be reexplained as they were explained in previous Significant Change<br>#1.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177889026-057f7138-078f-459a-a8a1-55b8868f0721.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows the purple powerup coming at the player which doubles bullet size when<br>shot.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177888913-6d1888a8-969d-4e73-b60c-e244d970fb77.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Shows the effect of the purple powerup. The bullet size is doubled, making<br>it easier to hit targets.<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177889324-5583e973-76bc-4ee4-bbf1-51e4fc8fcdd4.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>Big bullets is declared and initially set to false.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177888498-1d6c3cb0-de92-48b3-aa41-9d86d4a82c69.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>If the powerup is purple, bigBullets is set to true. This is set<br>back to false after 5 seconds.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://user-images.githubusercontent.com/97859804/177889431-46264005-1d95-47da-83f1-db62eb617785.png"/></td></tr>
<tr><td> <em>Caption:</em> <p>If bigBullets is set to true, when a bullet is shot, bullet.l (length)<br>is doubled. <br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Discuss </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="http://via.placeholder.com/400x120/009955/fff?text=Complete"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Talk about what you learned during this assignment and the related HTML5 Canvas readings (at least a few sentences for full credit)</td></tr>
<tr><td> <em>Response:</em> <p>The biggest takeaway from this assignment for me was learning how to go<br>through already written code, reuse useful and already-implemented functions (like isColliding and makeSquare),<br>and use HTML5 Canvas. I learned that your canvas element needs tabindex attribute<br>so that it can be focused on. I learned that games using HTML5<br>Canvas essentially use loops that constantly redraw all the elements on the canvas<br>at different positions. I also learned about designing games in a way where<br>code can be reused. By designing a function called makePowerup that was flexible,<br>I was able to use this to implement many different types of powerups<br>with different properties. I also learned about how JavaScript objects work (similar to<br>Python dictionaries) and how they can be used for HTML5 Canvas games.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-450-M22/hw-html5-canvas-game/grade/sd96" target="_blank">Grading</a></td></tr></table>