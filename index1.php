<!DOCTYPE html>
<html lang="en">
<head>
    <title>Тестовое задание</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/stylesheet/login/images/icons/favicon.ico"/>
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
                    document.getElementById(result_id).innerHTML = response;
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
        <div class="col align-self-start">

        </div>
        <div class="col align-self-center">
            <div class="form">
                <h2>Регистрация:</h2>
                <div id="messegeResult"></div>
                <form method="post" action="" id="formMain">
                    <input id="f_name" type="text" name="f_name" placeholder="Введите ваше имя" maxlength="30" autocomplete="off" />
                    <input id="s_name" type="text" name="s_name" placeholder="Введите вашу фамилию" maxlength="30" autocomplete="off" />
                    <input id="email" type="email" name="email" placeholder="Введите ваш email" maxlength="30" autocomplete="off"/>
                    <input id="pswrd" type="password" name="password" placeholder="Введите пароль" maxlength="30" autocomplete="off" />
                    <input id="r_pswrd" type="password" name="re_password" placeholder="Повторите пароль" maxlength="30" autocomplete="off" />

                        <input class="btn" id="button" type="button"  value="Регистрация"  class="btn btn-primary mb-3"  onclick="AjaxFormRequest('messegeResult', 'formMain', 'register.php')"/>
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