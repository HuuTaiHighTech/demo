
<?php
    class Db{
        protected static $connection;
        
        public function connect(){
            $connection = mysqli_connect("localhost", "root", "", "demo_lap3");
            mysqli_set_charset($connection, 'utf8');
            // Kiểm tra kết nối
            if (mysqli_connect_errno()) {
                echo "Kết nối cơ sở dữ liệu thất bại: " . mysqli_connect_error();
                exit();
            }
            return $connection;   
         }
         
        public function query_execute($queryString)
        {   
            // Khởi tạo kết nối
            $connection = $this->connect();
            $result = $connection->query($queryString);
            $connection->close();
            return $result;
        }

        public function select_to_array($queryString)
        {
            $rows = array();
            $result = $this->query_execute($queryString);
            if ($result === false) return false;
            // Vòng lặp while được sử dụng để đưa dữ liệu vào mỗi phần tử của mảng
            while ($item = $result->fetch_assoc()) {
                $rows[] = $item;
            }
            return $rows;
        }
    }
?>
