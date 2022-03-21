<?php

namespace app\modules\api\models;

use app\modules\api\resources\UserResource;
use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 *
 * @property-read UserResource|null $user
 *
 */
class SignupForm extends Model
{
    public $username;
    public $password;
    public $password_repeat;

    public $_user = false;


    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            ['username', 'unique',
                'targetClass' => '\app\modules\api\resources\UserResource',
                'message' => 'This username has already been taken.',
            ],
            [['username', 'password', 'password_repeat'], 'required'],
            ['password', 'compare', 'compareAttribute' => 'password_repeat'],
        ];
    }

    public function register()
    {
        $this->_user = new UserResource();
        if ($this->validate()) {
            $this->_user->username = $this->username;
            $security = \Yii::$app->security;
            $this->_user->password_hash = $security->generatePasswordHash( $this->password);
            $this->_user->access_token = $security->generateRandomString(255);
            if ($this->_user->save()){
                return true;
            }
            return false;
        }
        return false;
    }
}
