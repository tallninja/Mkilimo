Three methods to use:
* Single file (instructions below)
* Two files (putting credentials in /etc/ folder)
* CSS (optional in either of the above, sample included)

Sample Single File Installation Instructions

1) Place the phpmysqlezedit.php file in your web root or inside a web site
   * yes, you may rename it at will

2) Modify the file to include the credentials for the database. 
   * Optionally include the "table lock" variable to limit access to a single table.

3) access via http://SERVER/PATH/phpmysqlezedit.php?access=XXXX 
   * change the XXXX to a code in the file, and use it in the URL!

4) More Options and notes are inside the file itself, but you can stop here ... it's UP!

5) If you like it, donate $1 (just a dollar!) and I'll keep on uploading it. 
(Actually, I'll probably do that anyway, but it was a shot for a blatant cash request!)

Optional:

6) If you want to make it more secure, you can place the "credentials.php" file in /etc/SCRIPTNAME and name it the exact same as the phpmysqlezedit.php file 
   * including the .php at the end and 
   * including any "path" in front
   * It will look for a file with the same name and path as itself in the /etc/ folder
   * Example: If you access the file via "http://example.com/phpmysqlezedit/goodguys.php", 
     then credentials file will be "/etc/phpmysqlezedit/goodguys.php"

Note: File must be accessible to process running php (test with chmod 777 /etc/PATH -R)

Sample Two-File Installation Instructions 

* if webroot is /srv/www/htdocs
* and the goal is a file named "goodguys.php"
* with credentials securely stored in /etc/
* Whatever you name the file, the CSS and credentials files must be renamed to match 
  (or edit the includes to explicitly call them)

cd /srv/www/htdocs
svn checkout svn://svn.code.sf.net/p/phpmysqlezedit/code/ phpmysqlezedit
cp phpmysqlezedit/phpmysqlezedit.php phpmysqlezedit/goodguys.php
mkdir /etc/phpmysqlezedit/
mv phpmysqlezedit/credentials.php /etc/phpmysqlezedit/goodguys.php
nano /etc/phpmysqlezedit/goodguys.php

-Now edit goodguys.php:
* Change "XXXX" to an access code
* Edit the DB credentials
* Optionally uncomment the "table lock" variable
* SAVE!