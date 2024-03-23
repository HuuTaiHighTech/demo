
<?php
    class Db{
        
        protected static $connection;
        // ! Connect to MySQL database and set the charset to utf8.
        public function connect(){
            $connection = mysqli_connect("localhost", "root", "", "demo_lap3");
            mysqli_set_charset($connection, 'utf8');
           // Check the connection and export error messages if any.
            if (mysqli_connect_errno()) {
                echo "Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error();
                exit();
            }
            return $connection;   
         }
         // * Execute a string query and return the result. Close the connection after execution.
        public function query_execute($queryString)
        {   
            // connection
            $connection = $this->connect();
            $result = $connection->query($queryString);
            $connection->close();
            return $result;
        }
        // Query data from the database and return it as an array.
        public function select_to_array($queryString)
        {
            $rows = array();
            $result = $this->query_execute($queryString);
            if ($result === false) return false;
            //The while circle is used to put data into each element of the array.
            while ($item = $result->fetch_assoc()) {
                $rows[] = $item;
            }
            return $rows;
        }
    }
?>
