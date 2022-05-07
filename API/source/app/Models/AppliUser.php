<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use App\Notifications\PasswordResetNotification;

//パスワードリセットのクラス
use App\Notifications\ResetPassword; 

use Illuminate\Database\Eloquent\Model;

class AppliUser extends Authenticatable
{
    use Notifiable;

    protected $table = 'appli_users';

    protected $fillable = [
        'type',          // ユーザー種別
        'name',          // ユーザー名
        'mail_address',  // ユーザーメールアドレス
        'notice_status', // ログイン情報通知状況
        'del_flg',       // 削除フラグ

        'password',
        'companyid'
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getEmailForPasswordReset() {
        return $this->mail_address;
    }
    public function routeNotificationForMail() {
        return $this->mail_address;
    }
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPassword($token)); //****変更****
    }
}
