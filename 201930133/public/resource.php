<?php

    // 조건제어문 값은 => 논리값
    // 논리값 => 참/거짓
    // 참 => 0보다 큰값
    // 거짓 => 0 또는 null 없는 값

    // 논리값, 논리 연산
    // ! => not 의미, 참 => 거짓, 거짓 => 참
    if (!function_exists("html_get_resource")) {
        // 있다 => 없다 변결...
        // 함수를 선언합니다.
        function html_get_resource($layout, $path = "layout.html") {

            $filename = "../resource/".$layout."/".$path;
            // $filename = "../resource/layout02/layout.html";
            $body = file_get_contents($filename);
            return $body;
        }
    }

    // echo "함수가 선언되었습니다.";

?>