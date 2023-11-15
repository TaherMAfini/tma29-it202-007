<table><tr><td> <em>Assignment: </em> HW HTML5 Canvas Game</td></tr>
<tr><td> <em>Student: </em> Taher Afini (tma29)</td></tr>
<tr><td> <em>Generated: </em> 11/15/2023 6:57:12 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/hw-html5-canvas-game/grade/tma29" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Create a branch for this assignment called&nbsp;<em>M6-HTML5-Canvas</em></li><li>Pick a base HTML5 game from&nbsp;<a href="https://bencentra.com/2017-07-11-basic-html5-canvas-games.html">https://bencentra.com/2017-07-11-basic-html5-canvas-games.html</a></li><li>Create a folder inside public_html called&nbsp;<em>M6</em></li><li>Create an html5.html file in your M6 folder (do not put it in Project even if you're doing arcade)</li><li>Copy one of the base games (from the above link)</li><li>Add/Commit the baseline of the game you'll mod for this assignment&nbsp;<em>(Do this before you start any mods/changes)</em></li><li>Make two significant changes<ol><li>Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once.</li><li>Direct copies of my class example changes will not be accepted (i.e., just having an AI player for pong, rotating canvas, or multi-ball unless you make a significant tweak to it)</li><li>Significant changes are things that change with game logic or modify how the game works. Static changes like hard-coded colors/values will not count at all (i.e., changing shapes/colors/values that are globally defined and set only once). You may however change such values through game logic during runtime. (i.e., when points are scored, boundaries are hit, some action occurs, etc)</li></ol></li><li>Evidence/Screenshots<ol><li>As best as you can, gather evidence for your first significant change and fill in the deliverable items below.</li><li>As best as you can, gather evidence for your significant change and fill in the deliverable items below.</li><li>Remember to include your ucid/date as comments in any screenshots that have code</li><li>Ensure your screenshots load and are visible from the md file in step 9</li></ol></li><li>In the M6 folder create a new file called m6_submission.md</li><li>Save your below responses, generate the markdown, and paste the output to this file</li><li>Add/commit/push all related files as necessary</li><li>Merge your pull request once you're satisfied with the .md file and the canvas game mods</li><li>Create a new pull request from dev to prod and merge it</li><li>Locally checkout dev and pull the merged changes from step 12</li></ol><p>Each missed or failed to follow instruction is eligible for -0.25 from the final grade</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Game Info </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What game did you pick to edit/modify?</td></tr>
<tr><td> <em>Response:</em> <p>I modified pong.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the direct link to the html5.html file from Heroku Prod (i.e., https://mt85-prod.herokuapp.com/M6/html5.html)</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/M6/html5.html">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/M6/html5.html</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the pull request link for this assignment from M6-HTML5-Canvas to dev</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/40">https://github.com/TaherMAfini/tma29-it202-007/pull/40</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Significant Change #1 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>The first change I made is dynamic paddle sizes. Every time a player<br>scores, their paddle gets 10 pixels smaller and the opponent&#39;s paddle get 10<br>pixels larger. There are hard limits of 250 pixels and 30 pixels which<br>are the max and min sizes a paddle can reach, respectively. If one<br>player has reached an extreme, their size doesn&#39;t change but their opponent&#39;s size<br>can continue to change.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-15T23.48.26pong-paddle.png.webp?alt=media&token=36ceffb5-1dcc-4401-b531-cccebb568175"/></td></tr>
<tr><td> <em>Caption:</em> <p>Blue has a smaller paddle because they have scored more often than red<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-15T23.50.03image.png.webp?alt=media&token=4cce9e9d-3efe-4854-abf4-35c5f24f750c"/></td></tr>
<tr><td> <em>Caption:</em> <p>This function changes the size of the paddle by whatever amount is passed<br>in. This is used to change the paddle sizes everytime someone scores.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-15T23.51.30image.png.webp?alt=media&token=0ded7959-798d-4b64-be07-f03a4a860d59"/></td></tr>
<tr><td> <em>Caption:</em> <p>Depending on the player who scores, the sizes of both paddles are adjusted<br>by 10 pixels (increase/decrease)<br><br>The game is ended if either player reaches at least<br>20 points (multiplier means someone can go from 19 to 21)<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Significant Change #2 </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe your change/modification</td></tr>
<tr><td> <em>Response:</em> <p>The second change I made was score multipliers which come into effect when<br>the paddle size become significantly different. If a player&#39;s paddle is 4x smaller<br>than their opponent, every point they score now counts for double. Similarly if<br>the paddle is 6x smaller, they get triple point and if it is<br>8x smaller, they get 4 points.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Screenshot of the change while playing (try your best as some changes may be nearly impossible to capture)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-15T23.49.00pong-multiplier.png.webp?alt=media&token=d806fce9-061a-48ef-a835-76b42919990a"/></td></tr>
<tr><td> <em>Caption:</em> <p>Blue player has a 2x point multiplier because the red paddle is at<br>least 4x bigger<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Screenshot of the relevant lines of code that implement your change (make sure your ucid and the date are shown in comments) In the caption briefly describe/explain how the code snippet works.</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-15T23.53.17image.png.webp?alt=media&token=ce0a7d72-922e-4487-8319-6dcc97837cc7"/></td></tr>
<tr><td> <em>Caption:</em> <p>Every time someone scores, the scores are updated with the appropriate multiplier and<br>the multiplier is drawn if it is not 1.<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-15T23.54.18image.png.webp?alt=media&token=c1431c7f-3443-46d9-81a9-dd90cdf16d23"/></td></tr>
<tr><td> <em>Caption:</em> <p>The right and left multipliers are determined by the magnitude of the difference<br>in paddle sizes. Multipliers are rounded to 1 if they are below 2.<br>If they are above 2, they are rounded to integer using floor.<br><br>Multipliers are<br>drawn underneath the scoreboard if either player has a multiplier of at least<br>2<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Discuss </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Talk about what you learned during this assignment and the related HTML5 Canvas readings (at least a few sentences for full credit)</td></tr>
<tr><td> <em>Response:</em> <p>I learned more about how to make dynamic content in html and how<br>to refresh it seamlessly to simulate a video using a series of images<br>or frames. I also learned more about how to use javascript delays and<br>functions as well as how js objects can be used.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/hw-html5-canvas-game/grade/tma29" target="_blank">Grading</a></td></tr></table>