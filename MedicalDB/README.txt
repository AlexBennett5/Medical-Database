README

To set up this website, the following is required:

1.) Move the MedicalDB directory into whatever directory you use for your local Apache webserver (i.e. htdocs)

2.) Run one of the two SQL files in the folder marked Database Script. If you want the final database dump with all insertions we made from the client-side, use the file databasebackup.sql. If you want a 'clean' version of the database with an empty Action table, use the file meddb.sql. Both files have the same schema and triggers, they differ only in the data present (and meddb.sql is easier to read).

3.) To connect the database to the site, go to the file called "includes", in which you will find two connection files "dbh.php" and "query_func.php". You will need to change the username and password in dbh.php and in the sql_connect() function in query_func.php.

Then the site should be accessible via localhost.

The file structure for the directory is straightforward - the file prefix tells you which user the page is for (so anything prefixed "patient_" is a patient page, and so on). Pages ending in "a_process" or "a_result" connect to whatever page "a" they reference. Header files with the PHP functions we wrote can be found in the "/includes" folder.

-Team 10