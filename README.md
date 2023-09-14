# Web Application Demonstration / Explanation
https://www.youtube.com/watch?v=wapQ8kJaPto&ab_channel=SaumyaDwivedi
# Heroku Setup
- 08/30/2021 removed .htaccess and updated Procfile to use public_html as docroot
- Procfile tells Heroku how to deploy
- Composer.json mentions what libraries will be used 
- public_html contains all public facing content
- partials contains  reusable templates/partial pages
- lib contains custom functions/libraries/etc (reusable functionality)
- All work is in subfolders inside public_html (for the most part)
