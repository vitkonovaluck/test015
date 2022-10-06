<!DOCTYPE html>
<html lang="en">
<head>
    <title>Тестовое задание</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <!--===============================================================================================-->

    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

    <script type="text/javascript">
        function AjaxFormRequest(result_id,formMain,url) {
            jQuery.ajax({
                url: url,
                type: "POST",
                dataType: "html",
                data: jQuery("#"+formMain).serialize(),
                success: function(response) {
                    var jsn = JSON.parse(response);
                    var status = jsn.status;
                    switch(status) {
                    case 1://Новая учетная запись
                        document.getElementById("formMain").style.display = "none";
                        document.getElementById(result_id).innerHTML = jsn.message+" ID:"+jsn.id;
                        break;
                    case 2://присутствует учетная запись
                        document.getElementById(result_id).innerHTML = jsn.message+" ID:"+jsn.id;
                        break;
                    case 3://Присутствуют ошибки
                        document.getElementById(result_id).innerHTML = jsn.message;
                        break;
                    default:
                        text = "I have never heard of that fruit...";
                    }
                },
                error: function(response) {
                    document.getElementById(result_id).innerHTML = "<p>Возникла ошибка при отправке формы. Попробуйте еще раз</p>";
                }
            });

            $(':input','#formMain')
                .not(':button, :submit, :reset, :hidden')
                .val('')
                .removeAttr('checked')
                .removeAttr('selected');
        }

    </script>
</head>
<body>
<div class="container">
    <div class="row justify-content-end">
        <div class="col">

        </div>
        <div class="col">
            <h2>Регистрация:</h2>
            <div id="messegeResult"></div>
            <div class="form">
                <form method="post" action="" id="formMain">
                    Имя: <input id="fname" type="text" name="fname" placeholder="Введите ваше имя" maxlength="30" autocomplete="off" value="Vit"/><br>
                    Фамилия: <input id="sname" type="text" name="sname" placeholder="Введите вашу фамилию" maxlength="30" autocomplete="off"  value="Kon"/><br>
                    e-mail: <input id="email" type="text" name="email" placeholder="Введите ваш email" maxlength="30" autocomplete="off" value="Vit@gmail.com"/><br>
                    Пароль: <input id="password" type="password" name="password" placeholder="Введите пароль" maxlength="30" autocomplete="off"  value="VitKon"/><br>
                    Повтор пароля: <input id="rpassword" type="password" name="rpassword" placeholder="Повторите пароль" maxlength="30" autocomplete="off"  value="VitKon"/><br>

                    <input id="button" type="button"  value="Регистрация"  class="btn btn-primary mb-3"  onclick="AjaxFormRequest('messegeResult', 'formMain', 'register.php')"/>
                </form>
            </div>
        </div>
        <div class="col align-self-end">
        </div>
    </div>
</div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>