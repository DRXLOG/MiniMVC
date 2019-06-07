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
        $test = "";

        $to = "rowsinthemrc@gmail.com";
        print_r($test);


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
                            img {
                                width: 100px;
                                height: 100px;
                            }
                         </style>
            </head>
            <body>
                <h1>NL MODELS</h1>
                <h2>Заказ с вашего сайта</h2>
                <p><b>Имя заказчика:</b> $namer $surname </p>
                <p><b>Телефон заказчика:</b> $phone</p>
                <p><b>Email заказчика:</b> $email</p>
                <p> $test </p>
                <tr>
                    <td>№ п./п</td>
                    <td>Наименование детали</td>
                    <td>Фото оригинала детали</td>
                    <td>Описание и ориентировочный размер единицы изделия (ДхШхВ) см.</td>
                    <td>Цена за единицу (руб.)</td>
                    <td>Кол-во (шт.)</td>
                    <td>Сумма (руб.)</td>
                </tr>
HTML;
        foreach ($_POST['order'] as $v => $k)
            {
                foreach ($_FILES["pictures"]["error"] as $key => $error) {
                    if ($error == UPLOAD_ERR_OK) {
                        $tmp_name = $_FILES["pictures"]["tmp_name"][$key];
                        // basename() может спасти от атак на файловую систему;
                        // может понадобиться дополнительная проверка/очистка имени файла
                        $name = "Деталь_".$v."_".basename($_FILES["pictures"]["name"][$key]);
                        move_uploaded_file($tmp_name, SITE_PATH."/temp/temp_img/".$name);
                    }
                }
                //foreach ($k as $val) {
                    $message .= "<tr>";
                    $message .= "<td>$v</td>";
                    $message .= "<td>{$k['Наименование']}</td>";
                    $message .= "<td><img src='' alt='' width='100px' height='100px'></td>";
                    $message .= "<td>{$k['Описание']}</td>";
                    $message .= "<td>?</td>";
                    $message .= "<td>{$k['Количество']}</td>";
                    $message .= "<td>?</td>";
                    $message .= " </tr> ";
                //}
            }
        $message.= "
            </body>
            </html>
            ";
        $file_name = "temp/temp_img/".$name;
        $subject = "Заказ от ".$namer;
        $bound="---";
        $header="From: '$namer' <$email>\n";
        $header.="To: $to\n";
        $header.="Subject: $subject\n";
        $header.="MIME-Version: 1.0\r\n";
        $header.="Content-Type: multipart/mixed; boundary=\"$bound\"";
        $body="--$bound\n";
        $body.="Content-type: text/html; charset='utf-8'\n";
        $body.="Content-Transfer-Encoding: quoted-printable";
        $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode(basename($file_name))."?=\n\n";
        $body.="$message"."\n";
        $body.="--$bound\n";
        $file=fopen($file_name,"r");
        $contentFile = fread($file, filesize($file_name));
        fclose($file);
        $body .= "Content-Type: application/octet-stream; name==?utf-8?B?".base64_encode(basename($file_name))."?=\n";
        $body .= "Content-Transfer-Encoding: base64\n"; // кодировка файла
        $body .= "Content-Disposition: attachment; filename==?utf-8?B?".base64_encode(basename($file_name))."?=\n\n";
        $body .= chunk_split(base64_encode($contentFile))."\n"; // кодируем и прикрепляем файл
        $body .= "--".$bound."--\n";

        mail($to, $subject, $body, $header);

    }


}
