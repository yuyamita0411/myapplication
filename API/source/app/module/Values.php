<?php

namespace App\module;

class Values{
    public $pagenationNum = 5;//タスクページ
    public $GroupPageNum = 5;//グループページ

    static $MailEmpty = "メールアドレスを入力してください。";
    static $PasswordEmpty = "パスワードを入力してください。";
    static $MailOrPassWrong = "メールアドレスまたはパスワードが違います。";
    static $ErrorProcessing = "処理中にエラーが発生しました。";
}
?>