<?php
//직접 값을 변경
$a = "Hi";
echo $a; //첫번째 출력
echo "<br>"; //브라우저 ->다음줄

//간접 값을 변경
$b = &$a;
$b = "안녕";
echo $a; //두번째 출력