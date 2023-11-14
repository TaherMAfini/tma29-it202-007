<table><tr><td> <em>Assignment: </em> IT202 Milestone1 Deliverable</td></tr>
<tr><td> <em>Student: </em> Taher Afini (tma29)</td></tr>
<tr><td> <em>Generated: </em> 11/13/2023 7:48:10 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone1-deliverable/grade/tma29" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone1 branch</li><li>Create a milestone1.md file in your Project folder</li><li>Git add/commit/push this empty file to Milestone1 (you'll need the link later)</li><li>Fill in the deliverable items<ol><li>For each feature, add a direct link (or links) to the expected file the implements the feature from Heroku Prod (I.e,&nbsp;<a href="https://mt85-prod.herokuapp.com/Project/register.php">https://mt85-prod.herokuapp.com/Project/register.php</a>)</li></ol></li><li>Ensure your images display correctly in the sample markdown at the bottom</li><ol><li>NOTE: You may want to try to capture as much checklist evidence in your screenshots as possible, you do not need individual screenshots and are recommended to combine things when possible. Also, some screenshots may be reused if applicable.</li></ol><li>Save the submission items</li><li>Copy/paste the markdown from the "Copy markdown to clipboard link" or via the download button</li><li>Paste the code into the milestone1.md file or overwrite the file</li><li>Git add/commit/push the md file to Milestone1</li><li>Double check the images load when viewing the markdown file (points will be lost for invalid/non-loading images)</li><li>Make a pull request from Milestone1 to dev and merge it (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku dev</li></ol></li><li>Make a pull request from dev to prod (resolve any conflicts)<ol><li>Make sure everything looks ok on heroku prod</li></ol></li><li>Submit the direct link from github prod branch to the milestone1.md file (no other links will be accepted and will result in 0)</li></ol></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Feature: User will be able to register a new account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.32.19invalid-email%2Cinvalid-username%2Cinvalid-password%2Cinvalid-match.png.webp?alt=media&token=37eaabae-d529-4dac-9949-197f49e9a28c"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid email, username, password, confirm password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.33.01username-not-available.png.webp?alt=media&token=f0fb6e15-8f28-4d76-8057-266c5a5de5d9"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username not available<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.33.24user-not-available.png.webp?alt=media&token=2dccb048-755a-466d-9d2d-cb26ee42552c"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email not available<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.33.57valid-data.png.webp?alt=media&token=b825ab37-2e48-41b7-a38c-57bf5532382a"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form with valid data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of the Users table with data in it</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.34.26registered-user.png.webp?alt=media&token=3972d7fd-dbdb-4233-be4b-5fc79cd5bf0d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Users table with registered user data<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/12">https://github.com/TaherMAfini/tma29-it202-007/pull/12</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/21">https://github.com/TaherMAfini/tma29-it202-007/pull/21</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/26">https://github.com/TaherMAfini/tma29-it202-007/pull/26</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The form asks the user for an email, username, password and confirm password.<br>The frontend and backend validation both check if the email is valid and<br>the username is between 3 and 16 characters of letters, numbers, _ and<br>-. The validation also checks if the password is at least 8 characters<br>and that the password and the confirm password match. The backend validation also<br>checks if the username or email are already in use by checking if<br>an error is returned by the database when the new user is inserted.<br>The backend also hashes the user&#39;s password before storing to securely store it.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Feature: User will be able to login to their account </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add one or more screenshots of the application showing the form and validation errors per the feature requirements</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.35.04invalid-password.png.webp?alt=media&token=1f886e17-dd72-4483-a74a-9a75e3a17ece"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid password<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.35.23invalid-user.png.webp?alt=media&token=f79dabfc-6d31-43d7-93e7-65f8f077868f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email not found<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot of successful login</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.35.44valid-login.png.webp?alt=media&token=a34e3113-a36c-42b1-a403-91beb2060f76"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful login<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/13/files#diff-abad82afcc06748a384f5b6b49f64c2b1be15e9754323de9412972f8ea56bdca">https://github.com/TaherMAfini/tma29-it202-007/pull/13/files#diff-abad82afcc06748a384f5b6b49f64c2b1be15e9754323de9412972f8ea56bdca</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/14/files#diff-abad82afcc06748a384f5b6b49f64c2b1be15e9754323de9412972f8ea56bdca">https://github.com/TaherMAfini/tma29-it202-007/pull/14/files#diff-abad82afcc06748a384f5b6b49f64c2b1be15e9754323de9412972f8ea56bdca</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/21">https://github.com/TaherMAfini/tma29-it202-007/pull/21</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/23">https://github.com/TaherMAfini/tma29-it202-007/pull/23</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The form asks the user for their email or username and their password.<br>The frontend validation checks if the username/email is filled and that the user<br>entered either a valid email or a valid username. The password length is<br>also checked on the frontend.<div><br></div><div>The backend validation again checks everything that the front-end<br>does and then gets the user&#39;s information from the database by making checking<br>if a user with the email/username exists. The password entered by the user<br>is then compared with the stored password using &quot;password_verify()&quot;. If the validation succeeds,<br>then the user is logged in and their data is stored in session<br>variables, otherwise the user gets a message saying that the password is invalid<br>or the user doesn&#39;t exist if the username/email is not in the db.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Feat: Users will be able to logout </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the successful logout message</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.36.09logout.png.webp?alt=media&token=9aad1bc8-7423-48da-b20a-5ff4e2c9f962"/></td></tr>
<tr><td> <em>Caption:</em> <p>Logged out successfully<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing the logged out user can't access a login-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.36.24not-logged-in.png.webp?alt=media&token=f9b8ce3d-d8c3-4aec-aa4c-20cdcabc9588"/></td></tr>
<tr><td> <em>Caption:</em> <p>Login-protected page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/13">https://github.com/TaherMAfini/tma29-it202-007/pull/13</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works</td></tr>
<tr><td> <em>Response:</em> <p>The logout link deletes the session data of the current user which means<br>that any login protected pages can no longer be accessed and displays a<br>message to the user saying that they are logged out.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> Feature: Basic Security Rules Implemented / Basic Roles Implemented </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add a screenshot showing the logged out user can't access a login-protected page (may be the same as similar request)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.37.05not-logged-in.png.webp?alt=media&token=4b2b6562-72c4-4635-9c29-33470df3b526"/></td></tr>
<tr><td> <em>Caption:</em> <p>Not logged in<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a screenshot showing a user without an appropriate role can't access the role-protected page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.37.22no-permission.png.webp?alt=media&token=68f2202b-086d-4526-9efb-d8c1fac205ba"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid role<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a screenshot of the Roles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.37.37roles.png.webp?alt=media&token=db38623e-c855-4355-9db4-597b3b3637ee"/></td></tr>
<tr><td> <em>Caption:</em> <p>Roles<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a screenshot of the UserRoles table with valid data</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.37.47userroles.png.webp?alt=media&token=92fe5473-c5c1-43aa-8d54-ab45572d1233"/></td></tr>
<tr><td> <em>Caption:</em> <p>User with id 4 (<a href="mailto:&#x61;&#x64;&#109;&#105;&#110;&#x40;&#103;&#x6d;&#97;&#x69;&#108;&#x2e;&#99;&#x6f;&#109;">&#x61;&#x64;&#109;&#105;&#110;&#x40;&#103;&#x6d;&#97;&#x69;&#108;&#x2e;&#99;&#x6f;&#109;</a>) is admin<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add the related pull request(s) for these features</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/13">https://github.com/TaherMAfini/tma29-it202-007/pull/13</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/14">https://github.com/TaherMAfini/tma29-it202-007/pull/14</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/22">https://github.com/TaherMAfini/tma29-it202-007/pull/22</a> </td></tr>
<tr><td> <em>Sub-Task 6: </em> Explain briefly how the process/code works for login-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>Every login-protected page calls the &quot;is_logged_in()&quot; function which checks if the session variable<br>of &quot;user&quot; is set which means that there is a logged in user.<br>If it is not set, no user is logged in and they are<br>redirected to the login page with a message saying that &quot;You must be<br>logged in to view this page&quot;.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 7: </em> Explain briefly how the process/code works for role-protected pages</td></tr>
<tr><td> <em>Response:</em> <p>For role-protected pages, the page checks if the user has a specified role<br>in the session data using the &quot;has_role()&quot; function which returns true if the<br>user has the role and false if they do not. This information is<br>then used to redirect the user to the home page if they do<br>not have the role with a message stating that &quot;You don&#39;t have permission<br>to view this page&quot;.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Feature: Site should have basic styles/theme applied; everything should be styled </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots to show examples of your site's styles/theme</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.39.07styled-nav-form.png.webp?alt=media&token=832c1633-b4a3-4cc7-8253-a4cf599d8c8a"/></td></tr>
<tr><td> <em>Caption:</em> <p>Styled navigation with styled form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.39.33styled-table.png.webp?alt=media&token=9d69df47-e6e1-4b71-bf57-6ebea665cc00"/></td></tr>
<tr><td> <em>Caption:</em> <p>Styled table<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.39.53invalid-email%2Cinvalid-username%2Cinvalid-password%2Cinvalid-match.png.webp?alt=media&token=190ba584-178c-48c4-bc22-ee3250b5cb1e"/></td></tr>
<tr><td> <em>Caption:</em> <p>Styled error messages<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/24">https://github.com/TaherMAfini/tma29-it202-007/pull/24</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain your CSS at a high level</td></tr>
<tr><td> <em>Response:</em> <div>Universal: I changed the background of the entire site to "wheat" with "darkblue",<br>"sans serif" font.</div><div><br></div><div>Flash messages: I reduced the width of flash messages to only<br>fit the content instead of going from end to end and added some<br>padding to make the box bigger and a border to increase the visibility.<br>I also changed the background for alerts with dark text to "wheat" to<br>improve readablility. Some margin was also added to flash messages to give some<br>spacing in the event of multiple messages.</div><div><br></div>Navigation: I gave the navigation a "lightblue"<br>background color and a thick "darkblue" border around the div. I also added<br>some spacing between the links in the nav using the margin property and<br>gave the links a "darkblue" color which changes to "orangered" when the user<br>hovers over the link.<div><br></div><div>Forms: I added a border to input elements and changed<br>the shape to a rectangle with curved edges and changed the color of<br>all text in input elements to "darkblue" to match the theme of the<br>site. I added a color change from "white" to "lightblue" on submit buttons<br>on hover and gave the submit buttons a border and some spacing using<br>margin and made them bigger by adding padding. I also increases the minimum<br>height of textareas to make them bigger.</div><div><br></div><div>Table: I added padding to cells to<br>increase some whitespace inside the cells and to reduce clutter.</div><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Feature: Any output messages/errors should be "user friendly" </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of some examples of errors/messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.45.24invalid-email%2Cinvalid-username%2Cinvalid-password%2Cinvalid-match.png.webp?alt=media&token=397fd0e6-16fb-4c8a-905c-620eaa8dbbc8"/></td></tr>
<tr><td> <em>Caption:</em> <p>Failed validation message<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.45.46not-logged-in.png.webp?alt=media&token=6bba4d92-91dd-4f26-ab0c-db966dafb39a"/></td></tr>
<tr><td> <em>Caption:</em> <p>Not logged in<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.46.00no-permission.png.webp?alt=media&token=2290e922-5d0d-4b45-82fc-a0189197ab58"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid permission<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a related pull request</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/15">https://github.com/TaherMAfini/tma29-it202-007/pull/15</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/19">https://github.com/TaherMAfini/tma29-it202-007/pull/19</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Briefly explain how you made messages user friendly</td></tr>
<tr><td> <em>Response:</em> <p>To display user friendly messages, we look at the error codes in case<br>of db request errors and then display a user friendly message created by<br>us with the technical elements extracted from the db error using regex such<br>as which table caused an error. In addition, we display messages to users<br>using flash messages which are styled and easily visible and are also erased<br>after being display which reduces clutter. We also do not user var_dump or<br>var_export when displaying messages because it is untidy and instead extract the information<br>and display it in a more readable way.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Feature: Users will be able to see their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T20.56.48profile.png.webp?alt=media&token=a13e5afb-d1f7-41fa-8193-6d4954857789"/></td></tr>
<tr><td> <em>Caption:</em> <p>Pre-filled profile page<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/18">https://github.com/TaherMAfini/tma29-it202-007/pull/18</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/21">https://github.com/TaherMAfini/tma29-it202-007/pull/21</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/29">https://github.com/TaherMAfini/tma29-it202-007/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Explain briefly how the process/code works (view only)</td></tr>
<tr><td> <em>Response:</em> <p>The profile page for a user creates a form with the user email,<br>username, fields for resetting the password which includes current password, new password and<br>confirm new password. The user email and username fields are pre-populated by using<br>the user information stored in the session data when the user is logged<br>in which includes their email, username, and roles.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Feature: User will be able to edit their profile </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots of the User Profile page validation messages and success messages</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T21.06.24invalid-email%2Cinvalid-username.png.webp?alt=media&token=09c5fc84-2a43-4ca3-a777-43b4389f797b"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid email and username<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T21.06.28invalid-password%2C%20password-missmatch.png.webp?alt=media&token=71b66ff3-0ccd-462a-be9d-414d26ffde19"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid password and password mismatch<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T21.06.30unavailable-email.png.webp?alt=media&token=65a884fe-0253-4c80-b20d-c2c09c824d4d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Email unavailable<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T21.06.41unvavailable-username.png.webp?alt=media&token=f1a662bf-607c-4bf6-8b66-1a02703570c4"/></td></tr>
<tr><td> <em>Caption:</em> <p>Username unavailable<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add before and after screenshots of the Users table when a user edits their profile</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T21.12.36pre-change.png.webp?alt=media&token=03c8605a-e607-45e9-ae59-a717fef2f5c5"/></td></tr>
<tr><td> <em>Caption:</em> <p>Before change (id with record 11 changes)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-13T21.12.38change.png.webp?alt=media&token=4eca09e6-6561-4434-9765-458854e58c34"/></td></tr>
<tr><td> <em>Caption:</em> <p>After change (email and username of id #11 are changed)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add the related pull request(s) for this feature</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/18">https://github.com/TaherMAfini/tma29-it202-007/pull/18</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/21">https://github.com/TaherMAfini/tma29-it202-007/pull/21</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/29">https://github.com/TaherMAfini/tma29-it202-007/pull/29</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Explain briefly how the process/code works (edit only)</td></tr>
<tr><td> <em>Response:</em> <p>The user can edit their profile by modifying the pre-populated email and username<br>fields and by filling out the reset password fields which are all validated<br>before submitting. When submitting, the email and username fields are checked to see<br>if they are valid inputs and all three password fields are checked for<br>a minimum length. The new password and current password fields are also checked<br>to make sure they match. This is done client-side and server-side. In addition<br>to this, server-side validation includes checking if the current password matches the password<br>in the db using &quot;password_verify()&quot; if the user is changing their password. If<br>the username or email are updated, a request is also made to the<br>db to update the session data to reflect the latest changes.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 9: </em> Issues and Project Board </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing which issues are done/closed (project board) Incomplete Issues should not be closed</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-14T00.47.58project-board.png.webp?alt=media&token=bdcb1608-d5ae-4445-94f0-fdfa79b951f8"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Include a direct link to your Project Board</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/users/TaherMAfini/projects/1">https://github.com/users/TaherMAfini/projects/1</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Prod Application Link to Login Page</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/login.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/login.php</a> </td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone1-deliverable/grade/tma29" target="_blank">Grading</a></td></tr></table>