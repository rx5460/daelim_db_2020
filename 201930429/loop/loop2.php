<?php

    // 문자열 => 열개의 문자 => 배열
    $msg = "abcde";
    // echo $msg;
    for($i=0;$i<strlen($msg);$i++) {
        // echo $msg[$i]; // 숫자로 선택하는 배열 => 순차배열
        $str = $msg[$i];
        echo ++$str;
        print "<br>";
    }

?>