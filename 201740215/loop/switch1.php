<?php

$age=10;
//지하철요금표
//일반1250
//청소년720
//어린이 450
//노인 무료

if($age>=65){
    //노인
    $fee=0;
}else{
    //노인이 아닌경우
    if($age<19){
        //청소년
        $fee=720;
    }else{
        //청소년 아님
        if($age<=9){
            //어린이
            $fee=450;
        }else{
            //어린이가 아님:성인
            $fee=1250;
        }
    }
}
echo $age."살의 지하철 요금은 .".$fee."입니다.";