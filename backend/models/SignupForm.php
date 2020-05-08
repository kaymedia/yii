<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\User;
// use common\models\UserSubOpd;

/**
 * Signup form
 */
class SignupForm extends Model
{
    public $username;
    public $email;
    public $password;
    public $password_repeat;
    public $item_name;
    public $kd_opd;
    public $kd_sub_opd;
    public $kd_prov;
    public $kd_kab;
    public $kd_kec;
    public $kd_kel;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            ['username', 'trim'],
            [['username','item_name'], 'required'],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => ' username ini sudah dipakai.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            // ['kd_opd', 'required'],
            ['kd_opd', 'integer'],

            // ['kd_sub_opd', 'required'],
            ['kd_sub_opd', 'integer'],

            ['email', 'trim'],
            ['email', 'required'],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['item_name', 'string'],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'email ini  sudah dipakai.'],

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
    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }

       // $tahun = Yii::$app->pengaturan->tahun;
        
        $user = new User();
        // $UserSubOpd = new UserSubOpd();

        $user->username = $this->username;
        $text = md5($user->username);
        $user->email = $this->email;
        $user->password_reset_token = $text;
        $user->setPassword($this->password);
        $user->generateAuthKey();

        // $UserSubOpd->tahun = $tahun;
        // $UserSubOpd->kd_opd = $this->kd_opd;
        // $UserSubOpd->kd_sub_opd = $this->kd_sub_opd;

        // if($user->save(false)){
        //     $UserSubOpd->id_user = $user->id;
        //     $UserSubOpd->save(false);

        //     return $user;
        // }else{
        //     return null;
        // }

        return $user->save(false);
    }

//     public function afterSave($insert, $changedAttributes)
//     {
//             $modelUser->save(false);
//     }
}
