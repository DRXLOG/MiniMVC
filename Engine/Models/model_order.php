<?php

class model_order extends Model {

    public function __construct()
    {

    }

    function get_data() {
        print_r($_POST);
        print_r($_FILES);
        $this->sending_mail();
    }

    /**
     *
     */
    function sending_mail() {
        $namer = $_POST['namer'];
        $surname = $_POST['surname'];
        $phone = $_POST['phone'];
        $email = $_POST['email'];
        $detail_name[] = $_POST['detail_name'];
        $detail_col[] = $_POST['detail_col'];
        $textarea[] = $_POST['textarea'];

        $to = "rowsinthemrc@gmail.com";

        foreach ($_FILES["pictures"]["error"] as $key => $error) {
            if ($error == UPLOAD_ERR_OK) {
                $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
                // basename() может спасти от атак на файловую систему;
                // может понадобиться дополнительная проверка/очистка имени файла
                $name = basename($_FILES["pictures"]["name"][$key]);
                move_uploaded_file($tmp_name, SITE_PATH."/temp/temp_img/".$name);
            }
        }
        $detail = [ [
            ["Наименование"] => [$_POST['detail_name']],
            ["Описание"] => [$_POST['textarea']],
            ["Количество"] => [$_POST['detail_col']],
        ],
        ];
        $subject = "Заказ от ".$namer;
        $message = <<<HTML
            <!doctype html>
            <html lang="en">
            <head>
            <meta charset="UTF-8">
                         <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
                                     <meta http-equiv="X-UA-Compatible" content="ie=edge">
                         <title>Document</title>
                         <style>
                            h1 {
                                text-align: center;
                            }
                            h2 {
                                text-align: center;
                            }
                            td {
                                text-align: center;
                            }
                         </style>
            </head>
            <body>
                <h1>NL MODELS</h1>
                <h2>Заказ с вашего сайта</h2>
                <p><b>Имя заказчика:</b> $namer $surname </p>
                <p><b>Телефон заказчика:</b> $phone</p>
                <p><b>Email заказчика:</b> $email</p>
                <tr>
                    <td>№ п./п</td>
                    <td>Наименование детали</td>
                    <td>Фото оригинала детали</td>
                    <td>Описание и ориентировочный размер единицы изделия (ДхШхВ) см.</td>
                    <td>Цена за единицу (руб.)</td>
                    <td>Кол-во (шт.)</td>
                    <td>Сумма (руб.)</td>
                </tr>
                
                
            </body>
            </html>
HTML;

        $headers[] = "Content-type: text/html; charset=UTF-8";
        mail($to, $subject, $message, implode("\r\n", $headers));

    }


}
