<table><tr><td> <em>Assignment: </em> IT202 Milestone 2 API Project</td></tr>
<tr><td> <em>Student: </em> Taher Afini (tma29)</td></tr>
<tr><td> <em>Generated: </em> 11/27/2023 6:22:29 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-2-api-project/grade/tma29" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone2 branch</li><li>Create a new markdown file called milestone2.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone2.md</li><li>Add/commit/push the changes to Milestone2</li><li>PR Milestone2 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes to get ready for Milestone 3</li><li>Submit the direct link to this new milestone2.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> Define the appropriate table or tables for your API </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of the table definition SQL files</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.21.24champ.png.webp?alt=media&token=d9d0627b-8987-4de1-9422-06f8add94eff"/></td></tr>
<tr><td> <em>Caption:</em> <p>Championships table creation stores the name, id, and api_id of championships<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.21.26champ_alter.png.webp?alt=media&token=32e7f586-dee4-48f4-ac36-3a240d72adb2"/></td></tr>
<tr><td> <em>Caption:</em> <p>Add unique name constraint to championships table to prevent duplicate names<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.21.28Match.png.webp?alt=media&token=8e22cc29-3149-4686-802f-20675bd399ae"/></td></tr>
<tr><td> <em>Caption:</em> <p>Matches table stored match id, api_id, team1_id, score1, team2_id, score2, date and stadium<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.21.32match-alter.png.webp?alt=media&token=568d426b-b9ca-4335-8bbb-7aa45bb0fae9"/></td></tr>
<tr><td> <em>Caption:</em> <p>Add unique constraint to matches table to prevent multiple games between the same<br>2 teams on the same date<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.21.35team.png.webp?alt=media&token=b069bba8-7edf-48ff-a865-ac48c60810b1"/></td></tr>
<tr><td> <em>Caption:</em> <p>Teams table stored the team id, api_id, team name and manager name<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.21.37team_alter.png.webp?alt=media&token=0b4d6f9e-2314-4cf0-920e-f60772377826"/></td></tr>
<tr><td> <em>Caption:</em> <p>Add unique constraint to teams to prevent multiple teams with same names<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Mappings</td></tr>
<tr><td> <em>Response:</em> <p>Championships:<div>- id: auto-generated id given by db (primary key)</div><div>- api_id: id of the<br>championship in the api<br></div><div>- name: name of the championship (must be unique)</div><div>- created:<br>timestamp of record creation</div><div>- modified: timestamp of record update</div><div><br></div><div>Teams:</div><div><div>- id: auto-generated id given<br>by db (primary key)</div><div>- api_id: id of the team in the api<br></div><div>- name:<br>name of the team (must be unique)</div><div>- manager: name of the team&#39;s manager<br>(returned from api)</div><div>- created: timestamp of record creation</div><div>- modified: timestamp of record update</div></div><div><br></div><div>Matches:</div><div><div>-<br>id: auto-generated id given by db (primary key)</div><div>- api_id: id of the match<br>in the api</div><div>- championship_id: Id of the championship this match belongs to (foreign<br>key to Championships.id)</div><div>- team1_id: id of team 1 (foreign key to Teams.id)</div><div>- score1:<br>goals scored by team 1</div><div>- team2_id: id of team 2 (foreign key to<br>Teams.id)</div><div>- score2: goals scored by team 2</div><div>- date: date and time of the<br>match</div><div>- stadium: stadium the match is played in</div><div>- created: timestamp of record creation<br></div><div>-<br>modified: timestamp of record update</div></div><div><br></div><div>Duplicate matches are defined as matches with the same<br>team1, team2 and date. To prevent duplicates, a constraint has been added which<br>states that (team1_id, team2_id, date) must be unique.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/54">https://github.com/TaherMAfini/tma29-it202-007/pull/54</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/62">https://github.com/TaherMAfini/tma29-it202-007/pull/62</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Data Creation Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of the Page and the Code (at least two)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.38.40add_match_form.png.webp?alt=media&token=c75ecdad-beab-4049-9fc6-e5c92c59d9e3"/></td></tr>
<tr><td> <em>Caption:</em> <p>Create match form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.38.44php_val_1.png.webp?alt=media&token=2dac7206-2c5a-415b-8785-6370e465b134"/></td></tr>
<tr><td> <em>Caption:</em> <p>PHP form validation part 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.38.46php_val_2.png.webp?alt=media&token=ab38dcad-7cb0-41f0-8999-fd63b3fef76d"/></td></tr>
<tr><td> <em>Caption:</em> <p>PHP Form validation part 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.38.49js_val_1.png.webp?alt=media&token=d29ee3a7-0777-4805-a178-4686bfc1d56d"/></td></tr>
<tr><td> <em>Caption:</em> <p>JS form validation part 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.38.51js_val_2.png.webp?alt=media&token=3ece44a5-d2e3-4cf6-b328-8f248ba90ee8"/></td></tr>
<tr><td> <em>Caption:</em> <p>JS form validation Part 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.38.57valid_data.png.webp?alt=media&token=c019975f-8f84-459f-b566-e364cf3f1813"/></td></tr>
<tr><td> <em>Caption:</em> <p>Valid form data before submission<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.39.08create_error.png.webp?alt=media&token=15422f5c-0e76-4d03-ac55-c4f7e12de81b"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form data errors<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.39.21success.png.webp?alt=media&token=46fad6eb-4526-4849-b892-de73c74bc958"/></td></tr>
<tr><td> <em>Caption:</em> <p>Creation success notification<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.54.49fetch_dropdown.png.webp?alt=media&token=919b80c1-03a3-47b0-bbe6-e8112f511458"/></td></tr>
<tr><td> <em>Caption:</em> <p>Fetch chamionships and teams for dropdown<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.55.14insert.png.webp?alt=media&token=9d3afba7-e89d-449d-84d1-c8ff75eec555"/></td></tr>
<tr><td> <em>Caption:</em> <p>Insert match sql query<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Database Results</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.40.47db.png.webp?alt=media&token=af02f0da-aee1-4710-a5ec-b7477f50659d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Manually created items (red) and API created item (yellow)<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Misc Checklist</td></tr>
<tr><td> <em>Response:</em> <p>Match entities are considered unique if the (team1_id, team2_id, date) are unique since<br>teams cannot play each other multiple times in a day. Duplicates from manually<br>added items are not inserted and a message of the error is shown.<br>Duplicates in API data are treated as updates and the old record is<br>updated with the values of the new record.<div><br></div><div>Users with the roles of &quot;Admin&quot;<br>and &quot;Creator&quot; have access to create matches.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/creator/add_match.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/creator/add_match.php</a> </td></tr>
<tr><td> <em>Sub-Task 5: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/59">https://github.com/TaherMAfini/tma29-it202-007/pull/59</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/63">https://github.com/TaherMAfini/tma29-it202-007/pull/63</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Data List Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot the list page and code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.55.56matches_1.png.webp?alt=media&token=ab513837-a336-40c7-90e0-06721b6caa3d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code Part 1 - get filter options<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.55.58matches_2.png.webp?alt=media&token=66ae63f1-da30-4fc6-a355-98730b2cf6ae"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code Part 2 - filter validation and query building<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.56.00matches_3.png.webp?alt=media&token=fb6f0188-f8e6-4231-9fd3-412411860a81"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code Part 3 - Filter form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.56.03matches_4.png.webp?alt=media&token=ce4b3666-d262-4a09-a2db-d4cd0dee9925"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code Part 4 - table data population<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.56.05matches_5.png.webp?alt=media&token=47bcf4d5-99af-4239-a24e-6a1203aa0a20"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code Part 5 - action buttons<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.56.27match_list.png.webp?alt=media&token=d43a582f-8c27-44f8-87b1-f242f7442816"/></td></tr>
<tr><td> <em>Caption:</em> <p>match list<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.58.52match_list_champ_filter.png.webp?alt=media&token=8b7ebd66-54bf-4705-b98e-a7fe7dff0766"/></td></tr>
<tr><td> <em>Caption:</em> <p>Filter by championship<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.58.56match_list_limit.png.webp?alt=media&token=da536426-c637-453c-bb82-4513ef684c1d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Filter by item limit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.58.57match_list_team_filter.png.webp?alt=media&token=b7afe8b7-1b1a-4a67-ba0f-def3e3ee082f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Filter by team<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.59.30no_results.png.webp?alt=media&token=6826ac70-4620-4e51-9248-29ca99cb1184"/></td></tr>
<tr><td> <em>Caption:</em> <p>No matching results<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T21.59.51match_card.png.webp?alt=media&token=12dd565c-a21c-4c75-9dcb-718a9ebb985c"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code for match card rendering<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>All users have access to this page but only if they are logged<br>in.<div><br></div><div>Each row contains the date of the match, a match card including the<br>teams and their respective scores and a cell for action buttons</div><div><br></div><div>The details button<br>is visible to all logged in users, the delete button is visible only<br>to admins and the edit button is visible to admins and creators</div><div><br></div><div>Data can<br>be filtered using the championship, team or number of records. Championship filter returns<br>matches belonging to the selected championship. Team filter returns matches containing the selected<br>team and the limit filter limits the number of records returned with a<br>min of 1, max of 100 and default 10.&nbsp;</div><div><br></div><div>If multiple filters are used,<br>they are applied together and create an AND condition.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/matches.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/matches.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/56">https://github.com/TaherMAfini/tma29-it202-007/pull/56</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/57">https://github.com/TaherMAfini/tma29-it202-007/pull/57</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/58">https://github.com/TaherMAfini/tma29-it202-007/pull/58</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> View Details Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of Page and related content/code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.06.37details_fetch.png.webp?alt=media&token=409911d4-e68f-4812-8ef8-4174293b5018"/></td></tr>
<tr><td> <em>Caption:</em> <p>Fetch details from db<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.06.39detailed%20card.png.webp?alt=media&token=e38e6795-8aa2-4b7c-a66e-e5bb03b2dba0"/></td></tr>
<tr><td> <em>Caption:</em> <p>Display details in card<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.06.42action%20buttons.png.webp?alt=media&token=a936a890-aaf4-4076-98f9-3dfd6b589111"/></td></tr>
<tr><td> <em>Caption:</em> <p>Action buttons<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.07.22details.png.webp?alt=media&token=e49d715c-43e7-4803-b939-1b0f4c1c22fd"/></td></tr>
<tr><td> <em>Caption:</em> <p>Detail card<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.07.29invalid%20id.png.webp?alt=media&token=24751211-a391-4e45-a8d0-36a9da96e7a6"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid id redirect<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>The extra details shown in this view include the time along with the<br>date, the stadium the match was played in (if it was provided at<br>creation time) and the managers of both teams (if they exist in db).<div><br></div><div>The<br>delete button is visible only to admins and the edit button is visible<br>to admins and creators.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/matchDetails.php?matchID=129">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/matchDetails.php?matchID=129</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/58">https://github.com/TaherMAfini/tma29-it202-007/pull/58</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Edit Data Page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshot of Page and related content/code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.34.05fill%20dropdowns.png.webp?alt=media&token=7b175370-da43-40cd-90cb-5c6b02c0effc"/></td></tr>
<tr><td> <em>Caption:</em> <p>Get dropdown data<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.34.07get-existing.png.webp?alt=media&token=2663f5af-c794-4544-980a-f6b37e0e4420"/></td></tr>
<tr><td> <em>Caption:</em> <p>Get existing data<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.34.11pre-filled%20form.png.webp?alt=media&token=abd0d6e1-b06d-4c35-a80b-16acbac4f38e"/></td></tr>
<tr><td> <em>Caption:</em> <p>Pre filled form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.34.17php-val-1.png.webp?alt=media&token=153b7e65-c4dd-4f38-a6c7-6fefe61c375d"/></td></tr>
<tr><td> <em>Caption:</em> <p>php validation 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.34.19php-val%202.png.webp?alt=media&token=ba73f1fb-b11a-4f7b-a5b1-b1b3e843d974"/></td></tr>
<tr><td> <em>Caption:</em> <p>php validation 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.34.22js-val-1.png.webp?alt=media&token=d058ff33-849d-4a97-8f08-9df1f158657d"/></td></tr>
<tr><td> <em>Caption:</em> <p>js - validation 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.34.25js-val-2.png.webp?alt=media&token=c2970f74-cc6c-426a-953d-54989960bea4"/></td></tr>
<tr><td> <em>Caption:</em> <p>js validation 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.35.11execute%20update.png.webp?alt=media&token=a3d34750-be53-42b7-8f69-1687c23d5b53"/></td></tr>
<tr><td> <em>Caption:</em> <p>execute update<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.35.14error.png.webp?alt=media&token=3014176d-2b85-44fe-8276-f4f9cd299136"/></td></tr>
<tr><td> <em>Caption:</em> <p>Form validation<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.35.17valid-data.png.webp?alt=media&token=173e33ac-d094-4569-a19b-404c705be4e9"/></td></tr>
<tr><td> <em>Caption:</em> <p>Valid update data before submit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.35.28success.png.webp?alt=media&token=277ea4af-91ea-44a4-ba21-e7342f6ef604"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful update<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.35.30invalid-id.png.webp?alt=media&token=90299850-da45-4520-a30f-220472974607"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid id<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add a direct link to this file on Heroku Prod</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/creator/edit_match.php?matchID=129">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/creator/edit_match.php?matchID=129</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/64">https://github.com/TaherMAfini/tma29-it202-007/pull/64</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/65">https://github.com/TaherMAfini/tma29-it202-007/pull/65</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Delete Handling </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of related code/evidence</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.43.03delete-match.png.webp?alt=media&token=b2125329-f7fa-42fc-b9e8-3125a4e1e380"/></td></tr>
<tr><td> <em>Caption:</em> <p>Delete match code<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.43.07db%20before%20deletion.png.webp?alt=media&token=06282a2d-3d83-4484-b6a5-4235f45a3dbf"/></td></tr>
<tr><td> <em>Caption:</em> <p>DB before deletion<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.43.12db%20after%20deletion.png.webp?alt=media&token=210b7ce0-250f-46f7-96fc-d26b6b6d309e"/></td></tr>
<tr><td> <em>Caption:</em> <p>DB after deletion (no record with id 102)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.44.16filter-before-deleting.png.webp?alt=media&token=f6522cc8-eef9-47f3-85db-f58e266edc66"/></td></tr>
<tr><td> <em>Caption:</em> <p>Filter before deleting first record<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.44.18successful%20delete.png.webp?alt=media&token=b238f1a6-0d55-4555-910f-3633410858e2"/></td></tr>
<tr><td> <em>Caption:</em> <p>Filter after deleting record<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T22.44.23invalid-id.png.webp?alt=media&token=157b44ac-63e0-4650-8456-2c97c2bde928"/></td></tr>
<tr><td> <em>Caption:</em> <p>Invalid record id<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>Only admins have the permission to delete matches and they can delete any<br>match including user created and api created matches<div><br></div><div>The delete is a hard delete<br>and the record is permanently deleted from the database table</div><div><br></div><div>When the delete button<br>is clicked, the filter parameters are also sent along with the match id<br>in the get request, the delete page then stores these variables in session<br>data and the list page retrieves it from session data when the delete<br>page redirects and filters the matches before displaying</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/58">https://github.com/TaherMAfini/tma29-it202-007/pull/58</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> API Handling </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Screenshots of Code</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.06.26insert_matches_1.png.webp?alt=media&token=8154bc86-cc26-4761-b1d8-8846b49b5035"/></td></tr>
<tr><td> <em>Caption:</em> <p>Insert matches info using foreign key mappings of teams and championships<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.06.28insert_matches_2.png.webp?alt=media&token=2c97d9ed-0bdd-4cb9-94fc-e4a8f6047fbe"/></td></tr>
<tr><td> <em>Caption:</em> <p>insert matches part 2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.06.30insert_teams_1.png.webp?alt=media&token=ab72fe6c-531f-462e-9d28-25fe90e34838"/></td></tr>
<tr><td> <em>Caption:</em> <p>Insert teams part 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.06.34insert_teams_2.png.webp?alt=media&token=d9b2d983-4dde-48f1-acf2-d41889cbdee8"/></td></tr>
<tr><td> <em>Caption:</em> <p>Insert teams part 2 and generate foreign key mappings<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.06.36insert_champs_1.png.webp?alt=media&token=05fc3c41-7f35-481a-a968-926bad38e836"/></td></tr>
<tr><td> <em>Caption:</em> <p>Insert championships part 1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.06.37insert_champs_2.png.webp?alt=media&token=dfa97f1c-94d3-4e9d-8768-8a7766ad3846"/></td></tr>
<tr><td> <em>Caption:</em> <p>Insert championships part 2 and generate foreign key mappings<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.07.56trigger%20update.png.webp?alt=media&token=a9bc7d47-acf5-4425-ae42-d573346f2682"/></td></tr>
<tr><td> <em>Caption:</em> <p>Trigger update on button click<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.08.03update%20data.png.webp?alt=media&token=4a02f001-a53f-40f5-a93b-ed8279102ef5"/></td></tr>
<tr><td> <em>Caption:</em> <p>Update Data form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.08.05successful%20update.png.webp?alt=media&token=0dfed86e-5aa8-4406-b7a4-16d353cb4035"/></td></tr>
<tr><td> <em>Caption:</em> <p>Successful update<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explanation</td></tr>
<tr><td> <em>Response:</em> <p>Championships:<div>- api_id: id of the championship in the api<br></div><div>- name: name of the<br>championship</div><div><br></div><div>mappings: Get id, api_id pairs and convert to an associative array with api_id<br>as the key to replace the championship api_id in matches with proper id</div><div><br></div><div><br></div><div>Teams:</div><div><div>-<br>api_id: id of the team in the api<br></div><div>- name: name of the team</div><div>-<br>manager: name of the team&#39;s manager&nbsp;</div><div><br></div></div><div><div>mappings: Get id, api_id pairs and convert to<br>an associative array with api_id as the key to replace the team api_id<br>in matches with proper id</div><div><br></div></div><div><br></div><div>Matches:</div><div><div>- api_id: id of the match in the api<br></div><div>-<br>championship_id: Id of the championship this match belongs to (Computed using championship mapping)</div><div>-<br>team1_id: id of team 1 (computed using team mapping)</div><div>- score1: goals scored by<br>team 1</div><div>- team2_id: id of team 2 (computed using team mapping)</div><div>- score2: goals<br>scored by team 2</div><div>- date: date and time of the match</div><div>- stadium: stadium<br>the match is played in</div><div><br></div></div><div>API calls are invoked by a click of a<br>button by an admin. becuase it is not triggered automatically, it should not<br>trigger too often. Adding a time delay does not work because api matches<br>can be edited which changes the modified timestamp.</div><div><br></div><div>I am using the API data<br>to allow users to filter for matches involving certain teams or championships and<br>also to allow the users to favorite certain teams and championships to allow<br>easy access to scores on their homepage (Milestone 3).</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add any related PRs for this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/49">https://github.com/TaherMAfini/tma29-it202-007/pull/49</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/55">https://github.com/TaherMAfini/tma29-it202-007/pull/55</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/68">https://github.com/TaherMAfini/tma29-it202-007/pull/68</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 8: </em> Misc </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What issues did you face and overcome during this milestone?</td></tr>
<tr><td> <em>Response:</em> <p>One issue I faced was in preserving the filters in the list page<br>on delete because it was easy to get the filter values to the<br>delete page but sending them back was harder since I couldn&#39;t persist any<br>changes in the $_POST variables after the redirect. To solve this, I used<br>session data and set it up in a way that the list page<br>would check session data before post data when certain field of session data<br>existed.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> What did you find the easiest?</td></tr>
<tr><td> <em>Response:</em> <p>The easiest tasks in this milestone were the view details page because it<br>is a fairly simple page with a straightforward get request and a simple<br>SQL query.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> What did you find the hardest?</td></tr>
<tr><td> <em>Response:</em> <p>The hardest tasks were the API mapping partly becuase I needed to retrieve<br>the id, api_id pairs and make sure they work correctly. I would also<br>say that the list data page was also somewhat difficult due to the<br>query wording being dependent of the filters that were set.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Did you have to utilize any unanticipated APIs?</td></tr>
<tr><td> <em>Response:</em> <p>I did not have to utilize any unanticipated APIs.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 5: </em> Add a screenshot of your project board</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-11-27T23.21.40project%20board.png.webp?alt=media&token=53743d4e-306f-4446-96c0-c33a002779a7"/></td></tr>
<tr><td> <em>Caption:</em> <p>Project Board<br></p>
</td></tr>
</table></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-2-api-project/grade/tma29" target="_blank">Grading</a></td></tr></table>