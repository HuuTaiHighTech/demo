<?php
function idcontinue() {
    static $userid = 1;  // Giá trị tĩnh, sẽ không bị reset mỗi lần hàm được gọi
    return $userid++;    // Trả về giá trị hiện tại và tăng sau mỗi lần gọi
}
?>
