<?php
//echo "hello";
//파일을 읽어온다.

include "theme.conf.php";
include "../dbinfo.php";
$db0 = new mysqli(
    $dbinfo['master']['dbhost'],
    $dbinfo['master']['dbuser'],
    $dbinfo['master']['dbpass'],
    $dbinfo['master']['dbschema'],
    $dbinfo['master']['dbport']
);

if($db0) {
    // DB 접속 성공 부분
    // 쿼리 스키마.테이블
    $tablename = "instagram";
    $title = $_POST['title'];
    if($title){
        //print_r($_POST);
        //$query = "INSERT INTO phpdaelim5.".$tablename." (`title`) VALUES ('".$title."');";
        //sql문 생성
        $query = "INSERT phpdaelim5.".$tablename." SET ";
        foreach ($_POST as $key => $value) {
            $query .= "`".$key."`='".$value."', ";
        }
        //$query .= "`title`='".$title."', ";
        //$query .= "`description`='".$_POST['description']."', ";
        $query .= "`regdate`='".date("Y-m-d", time())."'";
        echo $query;
        //exit; // 프로그램 중단
        $result = mysqli_query($db0, $query); // db서버로 전송

        // 페이지를 이동합니다.
        $url = "/";
        header("location:" . $url);
    }
} else{
    echo "접속 실패";
}

$layout = file_get_contents($theme['layout']);
$contents = file_get_contents($theme['new']);

//2차원 배열
$param = [
    'title' => [
        'title' => "제목",
        'name' => "title",
        'description' => "제목을 입력해 주세요"
    ],
    'description' => [
        'title' => "내용",
        'name' => "description",
        'description' => "내용을 입력해 주세요"
    ],
    'picture' => [
        'title' => "사진",
        'name' => "picture",
        'description' => "사진을 등록해 주세요"
    ]
];
$inputs = "";
foreach($param as $p){
    $inputs .=  form_input($p);
}

$contents = str_replace("{{formlist}}", $inputs,$contents); //항목 삽입

$layout = str_replace("{{contents}}",$contents,$layout);

echo $layout;

function form_input($arg){
    global $path;
    // $arg 1차원 배열
    extract($arg); // 배열의 키값으로 지역변수를 자동으로 생성
    // $title = $arg['title'];
    // $name = $arg['name'];
    // $description = $arg['description'];

    //# 폼의 항목 1개 생성
    $form_input = file_get_contents($path."form_input.html");

    $form_input = str_replace("{{title}}", $title, $form_input);
    $form_input = str_replace("{{name}}", $name, $form_input);
    $form_input = str_replace("{{description}}", $description, $form_input);
    return $form_input;
}

/*
str_replace(
    1번째 인수 : 변경대상 문자
    2번째 인수 : 변경하려는 문자
    3번째 인수 : 변수, replace가 바꾸고자 하는 문자열(변수수)
)
*/