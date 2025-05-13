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
9. Next, I will make a Home-page with the news feed wich is the first thing that pops on screen when I open the site