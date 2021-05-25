# CHAT APPLICATION
This is a simple Chat application written in php, javascript and ajax

### WORKING
This works based on polling, every 5 seconds it checks for new message in database new messages are returned to the user

### FUTURE SCOPE
- To add security options
- To include group chat options
- To include upload of multimedia

### INSTALLATION
##### Follow the below steps for apache server
- Create the directory for your_domain and move to the directory
  ```
  sudo mkdir /var/www/your_domain
  cd /var/www/your_domain
  ```
- Clone the repo or download the files inside the current directory,To Clone the repo
    ```
    git clone "https://github.com/yogeeswar2001/cpu_scheduling_algo_simulator.git"
    ```
- Assign ownership of the directory with the $USER environment variable
  ```
  sudo chown -R $USER:$USER /var/www/your_domain
  ```
- open a new configuration file in Apache sites-available directory using preferred command-line editor
  ```
  sudo vim /etc/apache2/sites-available/your_domain.conf
  ```
- Paste in the following configuration
  ```
  <VirtualHost *:80>
    ServerName your_domain
    ServerAlias www.your_domain
    ServerAdmin webmaster@localhost
    DocumentRoot /var/www/your_domain
    ErrorLog ${APACHE_LOG_DIR}/error.log
    CustomLog ${APACHE_LOG_DIR}/access.log combined
  </VirtualHost>
  ```
- Run the following commands to enable the web app
  ```
  sudo a2ensite your_domain
  sudo a2dissite 000-default
  ```
  The below command should give "syntax OK" which ensures configuration file doesn’t contain syntax error, if so reload apache
  ```
  sudo apache2ctl configtest
  ```
  ```
  sudo systemctl reload apache2
  ```
- Open the browser and type localhost in the url

#### Follow the steps to create database with MySQL
- Create a database, the use the [chat_App.sql](https://github.com/yogeeswar2001/chat-application/blob/main/db/chat_app.sql) to import the database
  ```
  create database database_name
  use database_name
  source path_to_sql_sorce_file
  ```
- Change the $username, $pwd, $db in [db_conn.php](https://github.com/yogeeswar2001/chat-application/blob/main/db_conn.php)
