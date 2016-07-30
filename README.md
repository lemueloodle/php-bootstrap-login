# Bootstrap Login using PHP&amp;Ajax Authentication

-----------------------

## What does it do?

* Create Account Username and (Hashed) Password
* Validate Access Token and Account to Access Dashboard

-----------------------
### SETTING UP MYSQL DATABASE
	Import mysql database file from php-bootstrap-login/database

### SETUP MYSQL CONNECTION
	Edit file in connection.php
	
### CREATE NEW ACCOUNT
Once the database setup is complete. Open this link into your browser:

	http://localhost/php-bootstrap-login/register/lemueloodle2016/{username}/{password}

**Replace username and password as you wanted.
**Then copy the username and password in mysql database

## Default Account
	Username: admin
	Password: password

### SYSTEM FLOW
	Login Page -> Verify Login & Check Token Validity -> Dashboard Page

###Developed by Lemuel John Paule (https://lemuelpaule.xyz)
