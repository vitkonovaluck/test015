<?php
$filename = 'test.log';

$data=array();


if(isset($_POST)){

    $err_cnt=0; //счетчик ошибок
    $err_msg='';
    if(isset($_POST['email'])){ //Проверка email на ошибки
        if(!str_contains($_POST['email'],"@")){
            $err_cnt+=1;
            $err_msg.='Email адресс указан не правильно!';
        }
    }
    // Проверка паролей на совпадение
    if (strcmp($_POST['password'], $_POST['rpassword']) !== 0) {
        $err_cnt+=1;
        $err_msg.=' Пароли не совпадают!';
    }

}

if($err_cnt==0){// если ошибки отсутствуют

    //Открываем или создаем лог файл
    if (!$fp = fopen($filename, 'a')) {
        echo "Не могу открыть файл ($filename)";
        exit;
    }
    // Масив учетных записей
    $array[] = array('id'=>1,'name'=>'Nike', 'email'=>'nike@email.net');
    $array[] = array('id'=>2,'name'=>'Mike', 'email'=>'mike@email.net');
    $array[] = array('id'=>3,'name'=>'Tom',  'email'=>'tom@email.net');
    $array[] = array('id'=>4,'name'=>'Jack', 'email'=>'jack@email.net');
    $array[] = array('id'=>5,'name'=>'Lily', 'email'=>'lili@email.net');
    $array[] = array('id'=>6,'name'=>'Moly', 'email'=>'moly@email.net');
    $array[] = array('id'=>7,'name'=>'Andy', 'email'=>'andy@email.net');
    $array[] = array('id'=>8,'name'=>'Sara', 'email'=>'sara@email.net');

    $id=0;
    $max_id=0;

    // Проверяем учетной записи по емайл на наличие в масиве
    for($i=0;$i<count($array);$i++){
        if($array[$i]['id']>$max_id){
            $max_id = $array[$i]['id'];
        }

        if(strcmp($array[$i]['email'],$_POST['email'])==0){
          $id=$i+1;
          fwrite($fp, date("Y-m-d H:m:i")." Сравнение email ".$array[$i]['email']." и ".$_POST['email']." успешное\r\n");
        }else{
          fwrite($fp, date("Y-m-d H:m:i")." Сравнение email ".$array[$i]['email']." и ".$_POST['email']." не успешное\r\n");
        }
    }

    if($id == 0){// Если в масиве учетная запись не найдена тогда добавляем
        $array[] = array('id'=>$max_id+1,'name'=>$_POST['f_name']." ".$_POST['s_name'], 'email'=>$_POST['email']);
        $data['status']=1;//Новая учетная запись
        $data['id']=$max_id+1;
        $data['message']="Вы зарегистрированы!";

    }else{//Если присутствует учетная запись
        $data['status']=2;
        $data['id']=$id;
        $data['message']="Пользователь существует!";
    }
    fclose($fp);

}else{//если присутствуют ошибки
    $data['status']=3;
    $data['id']=0;
    $data['message']="Ошибка!<br> ".$err_msg;
}
$json = json_encode($data);

header('Content-type: application/json');
echo $json;
exit;
?>
