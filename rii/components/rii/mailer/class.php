<?php

namespace Rii\Components\Rii;

use Rii\Core\Component\Base;

class Mailer extends Base
{
    private function hashCheck($requiredHash)
    {
        if ($this->hash == $requiredHash) {
            return true;
        } else return false;
    }

    private function validation()
    {
        $customerName = $_POST['customerName'];
        $customerNumber = $_POST['customerNumber'];

        if (isset($customerName, $customerNumber)) {
            $message = array();

            if (empty($customerNumber)) {
                $message['numberError'] = 'Вы не ввели номер!';
            } else {
                if (!preg_match('/^(\s*)?(\+)?([- _():=+]?\d[- _():=+]?){9,12}(\s*)?$/', $customerNumber)) {
                    $message['numberError'] = "Неправильно введен номер! ";
                }
            }

            if (empty($customerName)) {
                $message['nameError'] = 'Вы не ввели имя!';
            } else {
                if (!preg_match("/^[a-zA-Zа-яёА-ЯЁ\s\-]+$/u", $customerName)) {
                    $message['nameError'] = "Допустимы только кириллица и латиница!";
                }
            }
        }
        return $message;
    }

    private function ourMail()
    {
        $to = 'elcar24@gmail.com';
        $subject = 'Заявка на консультацию по телефону';
        $text = 'Нам поступила заявка на консультацию по телефону от пользователя с именем ' . $_POST = ['customerName'] . '!<br>Его номер телефона: ' . $_POST = ['customerNumber'];
        $headers = 'Content-type: text/html; charset=utf-8\r\n';
        mail($to, $subject, $text, $headers);
        $message['mailSend'] = $_POST = ['customerName'] . ", cпасибо за обращение! Ожидайте нашего ответа!";
        $this->result['message'] = $message['mailSend'];
        // return html-содержание pop-up об успехе
    }

    public function executeComponent()
    {
        if ($this->hashCheck($_POST['hash']) === true) {
            if ($this->validation() == null) { // проверка на наличие ошибок
                $this->ourMail(); // отправка письма
            } else $this->result['message'] = $this->validation();
        }
        $this->template->render();
    }
}