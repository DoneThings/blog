<?php
namespace backend\models;

use common\models\Adminuser;
use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class ResetPwdForm extends Model
{
    public $password;
    public $password_repeat;

    public function attributeLabels()
    {
        return [
            'password' => '密码',
            'password_repeat' => '密码',
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            ['password', 'required'],
            ['password', 'string', 'min' => 6],

            ['password_repeat', 'compare', 'compareAttribute' => 'password', 'message' => '再次输入密码'],
        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function resetPwd($id)
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = Adminuser::findOne($id);
        $user->setPassword($this->password);

        return $user->save() ? $user : null;
    }
}
