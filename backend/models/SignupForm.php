<?php
namespace backend\models;

use common\models\Adminuser;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $nickname;
    public $email;
    public $password;
    public $password_repeat;
    public $profile;

    public function attributeLabels()
    {
        return [
            'username' => '用户名',
            'nickname' => '昵称',
            'email' => 'Email',
            'password' => '密码',
            'password_repeat' => '密码',
            'profile' => '简介',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            ['username', 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '用户名被占用'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\Adminuser', 'message' => '邮箱被占用'],

            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['nickname', 'required'],
            ['nickname', 'string', 'min' => 6, 'max' => 128],

            ['profile', 'string'],

            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '再次输入密码'],
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
        
        $user = new Adminuser();
        $user->username = $this->username;
        $user->nickname = $this->nickname;
        $user->email = $this->email;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        $user->password = '*';
        
        return $user->save() ? $user : null;
    }
}
