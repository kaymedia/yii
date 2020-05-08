<?php
namespace backend\models;

use yii\base\Model;
use common\models\User;

/**
 * Signup form
 */
class GantiPassword extends Model
{
    
    public $password;
    public $password_repeat;
    

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['password'], 'required'],
            

            ['password', 'required'],
            ['password', 'string', 'min' => 6],
            ['password_repeat', 'compare', 'compareAttribute'=>'password', 'skipOnEmpty' => false, 'message'=>"Passwords Tidak Sama"],

        ];
    }

    /**
     * Signs user up.
     *
     * @return User|null the saved model or null if saving fails
     */
    public function gantiPassword($id)
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = User::findOne(['id'=>$id]);        
        $user->setPassword($this->password);
        $user->generateAuthKey();
        $user->save(false);
        
        return true;
    }
}
