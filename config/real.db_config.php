<?php
// config/db_config.php 
class Database {
  private $host = '127.0.0.1'; 
  private $db_name = 'dlaweapd_ebikes';
  private $username = 'dlaweapd_apidev';
  private $password = 'apiP@55A10ShunOGr8One!';
  /* 
  This visible password above is NOT excluded from the git repo 
  via .gitignore (the Best Practice).  
  Left here as a learning to fellow learners that may use my repo.  
  When I was a newbie Web Dev, I read a TON of repos, BUT struggled mightily to get the code working, as the credentials and API access in the .env file were .gitignore excluded. Now I often use in my portfolio repos a '.env4Display' file with a false password, so fellow learners can understand the process.
  The pass above is a 100% unique password that I won't reuse, AND on my live web, 
  it is stored in an appication secured folder. The live MySQL database needs to be accessed via SSH Tunnel, or from within hosting Control Panel phpMyAdmin. The actual database is NOT publicly accessible; only the web app and API is. 
  The DB User privileges are also limited soley to this specific database.
  Signed ~ Ryan | Git Handle : SystemsVanguard | https://github.com/systemsvanguard 
  */
  public $conn;

  public function getConnection() {
    $this->conn = null;
    try {
      $this->conn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db_name,
                            $this->username, $this->password);
      $this->conn->exec('set names utf8');
    } catch (PDOException $exception) {
      echo 'Connection error: ' . $exception->getMessage();
    }
    return $this->conn;
  }
}
