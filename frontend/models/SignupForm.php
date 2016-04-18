<?php
namespace frontend\models;

use common\models\User;
use yii\base\Model;
use Yii;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $fio;
    public $birthday;
    public $id_code;
    public $passport;
    public $place_of_work;
    public $flat_id;

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'fio', 'birthday', 'id_code', 'passport', 'place_of_work'], 'filter', 'filter' => 'trim'],
            ['username', 'required', 'message' => 'Введите логин'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'filter', 'filter' => 'trim'],
            ['email', 'required', 'message' => 'Введите email'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'This email address has already been taken.'],

            ['password', 'required', 'message' => 'Введите пароль'],
            ['password', 'string', 'min' => 6],

            [['username', 'fio', 'birthday', 'id_code', 'passport', 'place_of_work'], 'required', 'message' => 'Это поле обязательное для заполнения'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->username = $this->username;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->fio = $this->fio;
        $user->passport = $this->passport;
        $user->id_code = $this->id_code;
        $user->place_of_work = $this->place_of_work;
        $user->birthday = $this->birthday;

        
        return $user->save() ? $user : null;
    }
}
