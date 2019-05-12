<?php
namespace common\models;

use Yii;
use yii\base\Model;
/**
 * Login form
 */
class AdminLoginForm extends Model
{
    public $username;
    public $password;
    public $rememberMe = true;

    private $_user;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
             ['rememberMe', 'boolean'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'validatePassword'],
        ];
    }
    public function login()
    {
        if ($this->validate()) {
            // return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600 * 24 * 30 : 0);
            // var_dump($this->getUser());
        // }
    //     $query1 = (new \yii\db\Query())
    //                 ->select(['username', 'password'])
    //                 ->from('admin')
    //                 ->where(['username' => $this->username])
    //                 ->all();
    //     // // var_dump($customer);
    //     // // var_dump(Admin::findByUsername($this->username));
    //     // return false;
    //     if ($this->validate()) {
    // 		return $query1;
		  // } else {
		  //   return false;
		  // }
        // if (!$this->validate()) {
        //     return null;
        // }
        // $user = new Admin();
        // $user->username = $this->username;
        // $user->password = $this->password;
        // $user->validatePassword($this->password);
        // // $user->generateAuthKey();
        // return $user->save() ? $user : null;
//         if ($this->validate()) {
// // return Yii::$app->user->login($this->getUser(), $this->rememberMe ? 3600*24*30 : 0);
        return Yii::$app->user->login($this->getUser());
    }
return false;
    }
    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $user = $this->getUser();
            if (!$user || !$user->validatePassword($this->password)) {
                $this->addError($attribute, 'username atau password salah');
            }
        }
    }
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = Admin::findByUsername($this->username);
        }

        return $this->_user;
    }
}
