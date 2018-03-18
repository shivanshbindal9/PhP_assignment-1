<?php
class DBController {
    private $host = "192.168.121.187";
      private $user = "first_year";
        private $password = "first_year";
          private $database = "first_year_db";
            function __construct() {
                  $conn = $this->connectDB();
                      if(!empty($conn)) {
                              $this->selectDB($conn);
                                  }
                        }
              function connectDB() {
                    $conn = mysql_connect($this->host,$this->user,$this->password);
                        return $conn;
                          }
                function selectDB($conn) {
                      mysql_select_db($this->database,$conn);
                        }
                  function runQuery($query) {
                        $result = mysql_query($query);
                            while($row=mysql_fetch_assoc($result)) {
                                    $resultset[] = $row;
                                        }   
                                if(!empty($resultset))
                                        return $resultset;
                                  }
                    function numRows($query) {
                          $result  = mysql_query($query);
                              $rowcount = mysql_num_rows($result);
                                  return $rowcount; 
                                    }
}
?>
