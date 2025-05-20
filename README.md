This file contains information to start the project awell as my step-by-step process to realise this project.

Info:
I work via XAMPP for my Apache and MySQL-database. These can be accessed through the XAMPP-control panel.

Process:
1. Made sure my .env-file was correct to run via XAMPP.
2. Made all basic models & migrations via artisan. 
    I use a feature where users can add newsitems as favorites for an n-n relation. The rest are a mix of 1-1, 1-n & n-1.
3. Made a seeder for the requested template admin.
4. Added Breeze via Artisan. Breeze adds controllers for authentication in Controllers/Auth
5. Configure route settings in routes/web.php for authenticaton controllers
6. Configure Profile-Controller, -Page & -Model.
    Had to change some standard routing settings from Breeze. It automaticaly redirects to 'dashboard' when managing profile settings, but I don't use dashboard in my profile routings. So i changed those in the Auth/Controllers files.
7. Chose to work with ProfileController & PublicProfileController.
    The Profile is used to view and edit your profile when logged in. The PublicProfile is used to show other users and non-users other peoples profiles.
8. Profile-pages working in prototype-fase.
9. Next, I will make a Home-page with the news feed wich is the first thing that pops on screen when I open the site.
10. Our navigation bar isn't really in proportion now, just good enough so it works without errors. Let's fix that.
11. For some reason my style doesn't apply in the profile.edit-page. Let's find out why.
12. My form in profile.edit doesn't send data to publicprofile.show.
     I get a 302 response in DevTools
     I made the edit page show your info aswell to make everything work in one page. This should be easier.
     Started using a normal request instead of ProfileUpdateRequest and just wrote the code of this request in my update-method in the controller.
     Deleted the Profile-model and just using User-model to store all info in. This should also be easier to work with.
14. Now I will make a seperate view for the "new post" function in the Newsfeed for admins