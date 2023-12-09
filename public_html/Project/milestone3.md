<table><tr><td> <em>Assignment: </em> IT202 Milestone 3 API Project</td></tr>
<tr><td> <em>Student: </em> Taher Afini (tma29)</td></tr>
<tr><td> <em>Generated: </em> 12/9/2023 6:08:45 PM</td></tr>
<tr><td> <em>Grading Link: </em> <a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-3-api-project/grade/tma29" target="_blank">Grading</a></td></tr></table>
<table><tr><td> <em>Instructions: </em> <ol><li>Checkout Milestone3 branch</li><li>Create a new markdown file called milestone3.md</li><li>git add/commit/push immediate</li><li>Fill in the below deliverables</li><li>At the end copy the markdown and paste it into milestone3.md</li><li>Add/commit/push the changes to Milestone3</li><li>PR Milestone3 to dev and verify</li><li>PR dev to prod and verify</li><li>Checkout dev locally and pull changes just to be up to date</li><li>Submit the direct link to this new milestone3.md file from your GitHub prod branch to Canvas</li></ol><p>Note: Ensure all images appear properly on github and everywhere else. Images are only accepted from dev or prod, not local host. All website links must be from prod (you can assume/infer this by getting your dev URL and changing dev to prod).</p></td></tr></table>
<table><tr><td> <em>Deliverable 1: </em> API Data Association </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Consider how your API data will be associated with a user</td></tr>
<tr><td> <em>Response:</em> <p>Users will be able to favorite teams and championships which will then be<br>used to display matches from a favorited championship or involving a favorited team<br>on the users home page to show them the latest matches that they<br>are interested in based on their favorited teams and championships. The database has<br>two tables, FavoriteTeams and FavoriteChampionships, which store the favorites for users using a<br>many to many relationship between the Users table and the Teams and Championships<br>tables.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Handling Data Changes</td></tr>
<tr><td> <em>Response:</em> <p>When either a team name, team manager or championship name is updated, the<br>user will see the updated data and their favorites associations will not change.<br>Teams and championships can only be updated via an API request so when<br>a duplicate record is found, it is updated and the user sees the<br>new values. In the case of matches which are &quot;favorited&quot; using teams and<br>championships, the data is updated either by the API or by a user<br>with the role of &quot;creator&quot;. If a match is updated, the user will<br>see the updated data on their home page which shows recommended matches.<br></p><br></td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 2: </em> Handle the association of data to a user </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Which option did you need to do to handle the association of data?</td></tr>
<tr><td> <em>Response:</em> <p>I updated my match details page to add buttons that allow the user<br>to favorite either team that played the match or the championship that the<br>match belongs to.&nbsp;<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add screenshots of the updated/created pages related to associating data with the user (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.08.15Add%20to%20favorites.png.webp?alt=media&token=50170e5d-8ae9-4db7-bacc-df1a4d7b32d1"/></td></tr>
<tr><td> <em>Caption:</em> <p>Updated match details page with buttons to favorite teams and championship<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.08.17addfavoritechamp.png.webp?alt=media&token=e7e726a7-4858-408c-b327-c03a8b98e3b2"/></td></tr>
<tr><td> <em>Caption:</em> <p>Success message after favoriting championship<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.08.20addfavoriteteam.png.webp?alt=media&token=60211bac-099b-433e-ac8e-acccb98a6668"/></td></tr>
<tr><td> <em>Caption:</em> <p>Success message after favoriting team<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.08.24addfavoritechamp1.png.webp?alt=media&token=1519bfa1-985c-47c4-8427-fb24d6841632"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code for add favorite championship page pt1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.08.26addfavoritechamp2.png.webp?alt=media&token=701e7dbc-ac5d-42f3-a302-5671011699ba"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code for add favorite championship page pt2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.08.30addFavoriteTeam1.png.webp?alt=media&token=3b04e250-3724-44ed-8d12-b04860e349b8"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code for add favorite team page pt1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.08.55addfavoriteteam2.png.webp?alt=media&token=8432cd5d-657b-45a8-a6b9-970006bdcd53"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code for add favorite team page pt2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.08.57matchdetails.png.webp?alt=media&token=ccd6b739-8674-4db9-8d5e-8ade2f12d9ad"/></td></tr>
<tr><td> <em>Caption:</em> <p>Code for updated match details page with the 3 forms with buttons highlighted<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Include any Heroku prod links to pages that would trigger entity to user association</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/matchDetails.php?matchID=205">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/matchDetails.php?matchID=205</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/addFavoriteChampionship.php?champID=176&champName=Bolivia%20Clausura&matchID=205">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/addFavoriteChampionship.php?champID=176&champName=Bolivia%20Clausura&matchID=205</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/addFavoriteTeam.php?teamID=401&teamName=Blooming&matchID=205">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/addFavoriteTeam.php?teamID=401&teamName=Blooming&matchID=205</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/81">https://github.com/TaherMAfini/tma29-it202-007/pull/81</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/82">https://github.com/TaherMAfini/tma29-it202-007/pull/82</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/83">https://github.com/TaherMAfini/tma29-it202-007/pull/83</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 3: </em> Logged in user’s associated entities page </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> What is the data that's associated with the user?</td></tr>
<tr><td> <em>Response:</em> <p>The entity in the wider context of the project is a match because<br>it can be created by API or certain users and modified and deleted<br>by users as well. The entities that are actually associated to the user<br>are teams and championships which function as proxies and allow the user to<br>&quot;favorite&quot; any matches from the championship or involving a favorited team even ones<br>that will be added in the future. Teams and championships are used to<br>dynamically favorite matches but the user is directly associated only to teams and<br>championships.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show screenshots of the logged in user's entities associated with them  (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.32.15fav-champs.png.webp?alt=media&token=ad393bf7-8c0e-4a87-8260-619287019dc1"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championships page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.32.18fav-champs-filter.png.webp?alt=media&token=47d59189-7eab-4aae-bb84-7a1cd4b27252"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championships filter<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.32.21fav-champs-no-results.png.webp?alt=media&token=02d6686e-b4fc-4acb-b045-4ba20a34519e"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championships no results<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.33.16fav-teams.png.webp?alt=media&token=f6eef37d-84c8-497f-a8a6-978b94cc798c"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite teams page<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.33.18fav-teams-filter.png.webp?alt=media&token=2a21a613-205f-44f0-a3fc-377ab2b0d31f"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite teams filter<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.33.23fav-teams-no-results.png.webp?alt=media&token=0a742c3c-bee4-4256-9822-b872466e9857"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite teams no results<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.34.04champ-details.png.webp?alt=media&token=12bfa1de-3e81-42a3-9a17-af11d0a30114"/></td></tr>
<tr><td> <em>Caption:</em> <p>Championship details<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.34.06team-details.png.webp?alt=media&token=3baa9375-79b4-49d8-9e53-8255a8dadd3e"/></td></tr>
<tr><td> <em>Caption:</em> <p>Team details<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.34.39fav-champ-p1.png.webp?alt=media&token=32d078d9-16ed-4dff-99d8-b547631a2a21"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championships code pt1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.34.42fav-champ-p2.png.webp?alt=media&token=20a46e64-c13a-4331-8d7e-c32be2bdfd56"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championships code pt2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.34.47fav-champ-p3.png.webp?alt=media&token=26987a1a-74b9-497a-81fd-c9b01b47b2a9"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championships code pt3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.34.52fav-champ-p4.png.webp?alt=media&token=95d2879d-ae0f-4d87-a1a3-a39b93f7ef67"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championships code pt4<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.35.41fav-team-p1.png.webp?alt=media&token=844adfac-be28-47d1-a7df-df28c44cc433"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite teams code pt1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.35.45fav-team-p2.png.webp?alt=media&token=4abe1e58-68ca-4358-bde1-824497c32267"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite teams code pt2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.35.48fav-team-p3.png.webp?alt=media&token=56a74f16-3880-4d0a-bd45-c8c967b654ae"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite teams code pt3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.35.53fav-team-p4.png.webp?alt=media&token=a93b4fa6-29a2-4f85-b508-4fcb080a139a"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite teams code pt4<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.36.32remove-fav-champ.png.webp?alt=media&token=89d006fc-5624-4737-8d6e-708bfc557f56"/></td></tr>
<tr><td> <em>Caption:</em> <p>Remove favorite championship code<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.36.37remove-fav-team.png.webp?alt=media&token=a6db3d79-b515-4854-a3f1-0ea9a09c238d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Remove favorite team code<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.36.49champ-details-code.png.webp?alt=media&token=9dd61f62-f5be-4b39-939e-1cf904c7f589"/></td></tr>
<tr><td> <em>Caption:</em> <p>championship details code<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.36.52team-details-code.png.webp?alt=media&token=c1bebcb8-aca0-4d1c-a575-2fe4c6eb783a"/></td></tr>
<tr><td> <em>Caption:</em> <p>team details code<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.57.49get-fav-champs.png.webp?alt=media&token=95bb833b-319e-46ae-a699-4fbf6c034810"/></td></tr>
<tr><td> <em>Caption:</em> <p>SQL requests for total favorite championships and favorite championships list<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T20.57.52get-fav-teams.png.webp?alt=media&token=32c7602e-faf4-4b83-9b88-7966bab82407"/></td></tr>
<tr><td> <em>Caption:</em> <p>SQL requests for total favorite teams and favorite teams list<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add Heroku Prod links to the page(s) where the logged in user has their entities listed</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/favoriteTeams.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/favoriteTeams.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/favoriteChampionships.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/favoriteChampionships.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/84">https://github.com/TaherMAfini/tma29-it202-007/pull/84</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/88">https://github.com/TaherMAfini/tma29-it202-007/pull/88</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 4: </em> All Users association page (Note: This will likely be an admin page and is not the same as the previous item) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Describe/Explain the purpose of this page from your project perspective</td></tr>
<tr><td> <em>Response:</em> <p>These pages show admins the favorite teams and championships and allows the admin<br>to remove the team/championship from the user&#39;s favorites. This page also allows the<br>admin to view the public profile of a user by clicking the user<br>name. These pages also provide a button to remove all favorite teams/championships for<br>users partially matching the filter. This page allows the admin to manage the<br>associations of users and also to remove all the associations to certain users<br>which can be used to remove all favorites for users to perform a<br>soft delete of the account since account deletes are not implement yet.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Show screenshots of the entity data associated with many users (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.09.49all-fav-teams.png.webp?alt=media&token=cb6f7e11-5057-4b7e-bbb5-8d9775aed562"/></td></tr>
<tr><td> <em>Caption:</em> <p>All favorite team associations<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.09.55all-fav-teams-partial.png.webp?alt=media&token=fe6fdbbb-4a81-44dc-8272-ed81347c80c7"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite team associations filter<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.09.57all-fav-teams-none.png.webp?alt=media&token=9f3ffa88-ea1d-4176-9258-592c4ddbcc4d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite team associations no results<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.09.59all-fav-champs.png.webp?alt=media&token=3dc7a945-64d4-4d48-b940-3a78cb570fd1"/></td></tr>
<tr><td> <em>Caption:</em> <p>All favorite championship associations<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.10.04all-fav-champs-filter.png.webp?alt=media&token=77fd74a9-dbeb-4574-aaa1-712458842c6d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championship associations filter<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.10.06all-fav-champs-none.png.webp?alt=media&token=a3b5fecb-5450-4e6c-a063-acfea25fa3df"/></td></tr>
<tr><td> <em>Caption:</em> <p>Favorite championship associations no results<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.11.11all-fav-teams-p1.png.webp?alt=media&token=6bab7517-50a0-4279-b26a-5fc28a71ef14"/></td></tr>
<tr><td> <em>Caption:</em> <p>All favorite teams code p1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.11.13all-fav-teams-p2.png.webp?alt=media&token=b1d98f5c-f664-4b5c-9844-21789bb778c1"/></td></tr>
<tr><td> <em>Caption:</em> <p>All favorite teams code p2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.11.14all-fav-teams-p3.png.webp?alt=media&token=e414ba9d-5666-4fc5-9d0b-f8d5da7edc4b"/></td></tr>
<tr><td> <em>Caption:</em> <p>All favorite teams code p3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.11.34all-fav-champs-p1.png.webp?alt=media&token=a68db788-ef66-4888-bbf8-f4ef1404a5ff"/></td></tr>
<tr><td> <em>Caption:</em> <p>All favorite championships code p1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.11.36all-fav-champs-p2.png.webp?alt=media&token=2050871b-1ca4-4c16-b97d-81680c2d2855"/></td></tr>
<tr><td> <em>Caption:</em> <p>All favorite championships code p2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.11.37all-fav-champs-p3.png.webp?alt=media&token=70925a4a-acf6-4e50-a4ed-9061d0ac3154"/></td></tr>
<tr><td> <em>Caption:</em> <p>All favorite championships code p3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.12.25fav-teams-get.png.webp?alt=media&token=40863041-299c-4869-bfa7-b8f69412617c"/></td></tr>
<tr><td> <em>Caption:</em> <p>Get total favorited teams and get favorited team associations<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.12.28remove-all-fav-teams.png.webp?alt=media&token=e04e4308-b3ba-42a0-aa2e-4a2ab69c8049"/></td></tr>
<tr><td> <em>Caption:</em> <p>Remove all favorite teams for partially matched users<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.12.31fav-champs-get.png.webp?alt=media&token=dde20d87-c24d-4dfd-ba0b-6a01cf2b95d3"/></td></tr>
<tr><td> <em>Caption:</em> <p>Get total favorited championships and get favorited team associations<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.12.37remove-all-fav-champs.png.webp?alt=media&token=d801dee7-425e-4bb3-9465-d6275c69fae7"/></td></tr>
<tr><td> <em>Caption:</em> <p>Remove all favorite championships for partially matched users<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.13.37user-profile.png.webp?alt=media&token=442db661-0c9f-437c-9948-0d5775f96778"/></td></tr>
<tr><td> <em>Caption:</em> <p>User public profile<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.13.39user-profile-p1.png.webp?alt=media&token=76cb2d60-6c45-4e3d-8fd7-add6380599f2"/></td></tr>
<tr><td> <em>Caption:</em> <p>User public profile code p1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.13.41user-profile-p2.png.webp?alt=media&token=9db58164-2d41-4851-a174-edc1470d5383"/></td></tr>
<tr><td> <em>Caption:</em> <p>User public profile code p2<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add Heroku Prod links to the page(s) where entities associated to many users can be seen</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/all_favorite_teams.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/all_favorite_teams.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/all_favorite_championships.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/all_favorite_championships.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/89">https://github.com/TaherMAfini/tma29-it202-007/pull/89</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 5: </em> Create a page that shows data not associated with any user (Note: This will likely be an admin page and is not the same as the previous item) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Show screenshots of the page showing entities not associated with anyone (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.40.07unassociated-teams.png.webp?alt=media&token=dba5910f-9665-4111-93cc-8fec6bee7cd4"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated teams<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.40.10unassociated-teams-filter.png.webp?alt=media&token=2f42a45e-8054-40a3-975e-77d6a4bd2747"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated teams - filtered<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.40.12unassociated-teams-none.png.webp?alt=media&token=071f73e9-52de-4f00-a553-11a7554bfa7b"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated teams - no results<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.40.17unassociated-champs.png.webp?alt=media&token=32e07160-7a1c-4cf7-a20e-442ceefa3319"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated championships<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.40.22unassociated-champs-filter.png.webp?alt=media&token=f0f7cae3-1f97-40bc-9087-93a17b3d50ad"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated championships- filtered<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.40.25unassociated-champs-none.png.webp?alt=media&token=a48e2eb7-13bb-4777-8c31-b9b7ddae6dbf"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated championships - no results<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.41.14unassociated-teams-code-p1.png.webp?alt=media&token=46b70f68-0c81-49f9-a552-270ccc48eb20"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated teams code p1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.41.16unassociated-teams-code-p2.png.webp?alt=media&token=1fac59fb-6013-4b8e-848c-a1089b42ba88"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated teams code p2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.41.18unassociated-teams-code-p3.png.webp?alt=media&token=9b87335a-984d-47b2-9089-78ffa32f1e8d"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated teams code p3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.41.22unassociated-champss-code-p1.png.webp?alt=media&token=eace1a0d-8663-48b9-9842-702d5751f917"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated championships code p1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.41.24unassociated-champss-code-p2.png.webp?alt=media&token=28950584-ad15-4d72-b26b-a54af3043a31"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated championships code p2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.41.29unassociated-champss-code-p3.png.webp?alt=media&token=d96842bb-4adc-452c-8a66-43938a0a8e7e"/></td></tr>
<tr><td> <em>Caption:</em> <p>Unassociated championships code p3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.42.04unassociated-teams-get.png.webp?alt=media&token=79e8c1a9-c4cd-46bf-9720-8454d4b50f87"/></td></tr>
<tr><td> <em>Caption:</em> <p>Database get for total unassociated teams and records of unassociated teams<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T21.42.06unassociated-champs-get.png.webp?alt=media&token=38b9246b-2cc0-4501-a187-b962779cb4d6"/></td></tr>
<tr><td> <em>Caption:</em> <p>Database get for total unassociated championshipsand records of unassociated championships<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Add Heroku Prod links to the page(s) where unassociated entities can be seen</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/unassociated_teams.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/unassociated_teams.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/unassociated_championships.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/unassociated_championships.php</a> </td></tr>
<tr><td> <em>Sub-Task 3: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/86">https://github.com/TaherMAfini/tma29-it202-007/pull/86</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/88">https://github.com/TaherMAfini/tma29-it202-007/pull/88</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 6: </em> Admin can associate any entity with any users (Note: This may be a form on an existing association page if you rather not have a separate page for this) </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Add screenshots showing evidence of the checklist items (include code screenshots)</td></tr>
<tr><td><table><tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.01.50assign-fav-teams.png.webp?alt=media&token=93594dbb-344c-4bc3-8559-7cd60f12c7c3"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite teams lookup form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.01.51assign-teams-pre-submit.png.webp?alt=media&token=9edf48d1-c4c8-415a-809e-287879c5b8e0"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite teams before toggle submit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.01.54assign-teams-submit.png.webp?alt=media&token=8b97030e-a3df-43f2-a1af-f2a5ae7dcadb"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite teams after toggle submit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.01.58assign-fav-champs.png.webp?alt=media&token=81809d1d-9ac8-4a43-a8d1-10cdfbabad51"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite championships lookup form<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.02.00assign-champ-pre-submit.png.webp?alt=media&token=d5c9e2a9-1b60-412b-bbf5-823ed6686ae0"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite championships before toggle submit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.02.02assign-champ-submit.png.webp?alt=media&token=664f22d1-3ece-4ab7-990f-9d500bb7374c"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite championships after toggle submit<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.02.52assign-fav-teams-code-p1.png.webp?alt=media&token=5c9b6f47-6327-4440-bd5f-06400a93cc69"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite teams code p1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.02.54assign-fav-teams-code-p2.png.webp?alt=media&token=09bcc4d4-2886-4ab2-b032-91bf8c3570fd"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite teams code p2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.02.56assign-fav-teams-code-p3.png.webp?alt=media&token=e96a489d-d7cb-4735-a82d-c62730c78963"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite teams code p3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.03.11assign-fav-champs-code-p1.png.webp?alt=media&token=773611ea-b61d-48a3-ac47-03b5b324b447"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite championships code p1<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.03.33assign-fav-champs-code-p2.png.webp?alt=media&token=40e98c84-f8fc-44f8-be77-549ea096c401"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite championships code p2<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.03.14assign-fav-champs-code-p3.png.webp?alt=media&token=1c1800fd-495a-43c8-b738-32e896d9081e"/></td></tr>
<tr><td> <em>Caption:</em> <p>Assign favorite championships code p3<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.03.58get-matching-users.png.webp?alt=media&token=9918ca95-77b0-4bf6-9c37-d59dce46e1e4"/></td></tr>
<tr><td> <em>Caption:</em> <p>Get list of partially matching users (max 25)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.04.00get-matching-teams.png.webp?alt=media&token=275ab85e-fc0d-4218-b357-b4404986d39c"/></td></tr>
<tr><td> <em>Caption:</em> <p>Get list of partially matching teams (max 25)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.04.04get-matching-champs.png.webp?alt=media&token=f017610d-4726-4bbe-bde1-41bfce66e25b"/></td></tr>
<tr><td> <em>Caption:</em> <p>Get list of partially matching championships (max 25)<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.04.29toggle-fav-teans.png.webp?alt=media&token=d1242816-65fa-4f3d-a42a-e00434d07491"/></td></tr>
<tr><td> <em>Caption:</em> <p>Handle toggle favorite teams db request<br></p>
</td></tr>
<tr><td><img width="768px" src="https://firebasestorage.googleapis.com/v0/b/learn-e1de9.appspot.com/o/assignments%2Ftma29%2F2023-12-09T22.04.32toggle-fav-champ.png.webp?alt=media&token=46bab76b-792c-4cff-a161-3fc5fb2cacdf"/></td></tr>
<tr><td> <em>Caption:</em> <p>Handle toggle favorite championships db request<br></p>
</td></tr>
</table></td></tr>
<tr><td> <em>Sub-Task 2: </em> Explain the code logic for this page</td></tr>
<tr><td> <em>Response:</em> <p>This page allows the admin to toggle the favorite teams/championships of selected users.<br>When the page is loaded, there is a form which asks for a<br>username and team/championship. If both fields are filled, then the form can be<br>submitted and will return a list of partially matching users and a list<br>of partially matching teams/championships ordered alphabetically and with a maximum of 25 results.<br>Selecting checkboxes and clicking the toggle favorites button will add the selected teams/championships<br>to the selected user&#39;s favorite teams/championships if they are not there already. If<br>the association is there, they will be removed from favorites by setting is_active<br>= 0.&nbsp;<div><br></div><div>The form submits the usernames as a list and the teams/championships as<br>a list. The two lists are then passed to the appropriate handler function<br>which creates a set of records: 1 record for each user-team/championships pair (total<br>number of records = #users * #teams/championships). Placeholders are generated for the records<br>(user_id_ij, team_id_ij/champ_id_ij where i is between 0 and #users and j is between<br>0 and #teams/championships) and then the values are bound to the placeholders with<br>the correct data type of int. The batch request is then sent to<br>the database which only counts as 1 query since it is batched.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Add Heroku Prod links to the page(s) related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/assign_favorite_teams.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/assign_favorite_teams.php</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/assign_favorite_championships.php">https://it202-tma29-prod-ca1cfc624240.herokuapp.com/Project/admin/assign_favorite_championships.php</a> </td></tr>
<tr><td> <em>Sub-Task 4: </em> Include any PRs related to this task</td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/90">https://github.com/TaherMAfini/tma29-it202-007/pull/90</a> </td></tr>
<tr><td> <a rel="noreferrer noopener" target="_blank" href="https://github.com/TaherMAfini/tma29-it202-007/pull/96">https://github.com/TaherMAfini/tma29-it202-007/pull/96</a> </td></tr>
</table></td></tr>
<table><tr><td> <em>Deliverable 7: </em> Reflection </td></tr><tr><td><em>Status: </em> <img width="100" height="20" src="https://user-images.githubusercontent.com/54863474/211707773-e6aef7cb-d5b2-4053-bbb1-b09fc609041e.png"></td></tr>
<tr><td><table><tr><td> <em>Sub-Task 1: </em> Document any issues/struggles</td></tr>
<tr><td> <em>Response:</em> <p>One struggle for me was to get the count of users associated to<br>a team/championship for the list all favorites pages because I had to count<br>the number of records which matched a condition and keep it in the<br>row all in the same query. I managed to solve this by looking<br>around on google and finding a way to capture the result of a<br>subquery which carried over the parameter from the main query and then returning<br>it as part of the result data. This allowed me to count the<br>correct number of records based on the team/championship and return it all in<br>a single db query.<div><br></div><div>Another problem I had was when I tried to implement<br>multiple return addresses for the remove_favorite pages so that I could return with<br>the flash message to the page that triggered the delete. I ended up<br>solving this by adding another field to the trigger form which stored the<br>current page address and then I used a conditional statement to determine which<br>page I should redirect to when the remove from favorites query terminated.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 2: </em> Highlight any favorite topics</td></tr>
<tr><td> <em>Response:</em> <p>One of my favorite topics was how all the checkbox data was passed<br>as an array very simply by just chaning the input field name to<br>be an array which I did not know before. Before this class I<br>would probably have used javascript to manually build the array when the submit<br>button was clicked which would be a lot more tedious compared to this<br>simple implementation.<div><br></div><div>Another topic that I liked was how to make batch insert queries<br>which I knew were possible from my database class but I hadn&#39;t figured<br>out how to use them with variable data such as forms or checkboxes<br>which can save a lot of queries if done correctly.</div><div><br></div><div>Partials is another topic<br>I liked because one of my biggest misconceptions about php was that you<br>end up with long files but using partials solves this problem and I<br>was surprised by how seamlessly partials can be used and might be easier<br>to use than react components.</div><br></p><br></td></tr>
<tr><td> <em>Sub-Task 3: </em> Overall how do you feel you did with the project and meeting requirements</td></tr>
<tr><td> <em>Response:</em> <p>I believe that I did well on the project and met all the<br>requirements and added some additional stuff as well. Instead of just 1 association,<br>I have users associated to teams and championships and I also modified the<br>home page to show the latest matches from favorited championships or involving a<br>favorited team which provides users with the latest matches that they are interested<br>in based on their favorites. I also believe I met all other requirements<br>even though I did have some difficulties implementing the all users association pages<br>and the query building for the assign favorites pages.<br></p><br></td></tr>
<tr><td> <em>Sub-Task 4: </em> Summarize your experience per the checklist items</td></tr>
<tr><td> <em>Response:</em> <p>I had some development experience before I came into the class but it<br>was mostly client side rendering using React and a Node backend which was<br>built like an api and I had a little bit of php experience<br>from CS288. I feel much more confident dealing with server side rendering using<br>php than I did before and I also learned more about how to<br>use php including building an API which I didn&#39;t know was possible with<br>php, I always thought php was only able to send html pages with<br>prefilled info.&nbsp;<div><br></div><div>I was also able to practice my sql skills because I had<br>some queries where I had to join 3 tables and had another 3<br>subqueries which was complex and took some time to get right but it<br>was a lot easier than just fetching the data and then doing the<br>filtering one by one.</div><div><br></div><div>One thing I would do differently is maybe choose a<br>different API and topic because I feel that my choice was a little<br>basic once I fully looked at the requirement but by that point I<br>had already done research and implemented some of the features. With a different<br>API I could have made a more complex database structure and increased the<br>features available which would have been harder to do but could have taught<br>me more.</div><br></p><br></td></tr>
</table></td></tr>
<table><tr><td><em>Grading Link: </em><a rel="noreferrer noopener" href="https://learn.ethereallab.app/homework/IT202-007-F23/it202-milestone-3-api-project/grade/tma29" target="_blank">Grading</a></td></tr></table>