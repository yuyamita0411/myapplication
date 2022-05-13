<?php

namespace App\module;

class Values{
    public $pagenationNum = 5;//タスクページ
    public $GroupPageNum = 5;//グループページ

    static $MailEmpty = "メールアドレスを入力してください。";
    static $PasswordEmpty = "パスワードを入力してください。";
    static $MailOrPassWrong = "メールアドレスまたはパスワードが違います。";
    static $ErrorProcessing = "処理中にエラーが発生しました。";

    static $ValidMailaddress = "/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/";
    static $OnlyIntPattern = "/^[0-9]+$/";
    static $NameRequired = "*名前は必須です";
    static $LessThan200Cha = "200文字以内でお願いします。";
    static $MailRequired = "*メールアドレスは必須です";
    static $MailFormInvalid = "メールアドレスの形式が正しくありません。";
    static $PasswordRequired = "*パスワードは必須です";
    static $PasswordConfirmRequired = "*パスワード確認は必須です";
    static $LessThan255Cha = "255文字以内でお願いします。";
    static $PasswordIsNotSame = "パスワードが一致しません。";
    static $OnlyInt = "数字のみでお願いします";
}
?>