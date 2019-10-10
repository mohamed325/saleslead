# Sales Lead Project
 
Saleslead Project is a simple REST API project creates and views salesleads. The application front end users to create sales leads and the server side exposes api end points to display a list of leads sorted by the likelihood that they will buy. 


## Tools and Technology used

This the backend side of saleslead project and the application uses PHP as th serverside program. 
The application uses PHP and MySQL to create a rest api that exposes endpoints get, post,delete to client side
-I used XAMPP for my backend environment - it includes Apache server, MySQL database and PhpMyadmin which you can import and manage the database

### Getting started
Clone repo and go into the project directory.

Import the saleslead.sql file, change the username and password in the config/Database.php file to your own

 PHP Version 7.1.23
 XAMPP Version  7.1.32 for OS X

## Running the app
.
```
place the saleslead folder under htdocs in XAMPP
RUN MySQL and Apache
```
## Deploy

I deployed the backend on heroku if you want to quickly fetch and add json data. you can access the server exposed endpoints at 
forexample : https://myphpserver.herokuapp.com/api/get_leads.php  or https://myphpserver.herokuapp.com/api/add_lead.php

## Author

* **Abdikarim Mohamed**


