Read [php_tutorial/README_ex3_ex4.md](../README_ex3_ex4.md) first!

Following exercise 3 (page 186) and 4 (page 265)
------------------------------------------------

Steps:
- Create posts, comments and members tables from [db.sql](db.sql) file
- Edit the file at [admin/.htaccess](admin/.htaccess) according to your server configuration: look for the line starting by AuthUserFile and change the absolute path to .htpasswd file
- Use XAMPP's htpasswd utility (in /Applications/XAMPP/bin on Mac OS) to edit the file at [admin/.htpasswd](admin/.htpasswd) by issuing the following command: htpasswd -b admin/.htpasswd login password
- Go on http://localhost/php_tutorial/ex4/controllers/blog/ (admin section login is "login" and password is "password")
