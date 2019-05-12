<?php

namespace common\models;

use Yii;
use yii\base\NotSupportedException;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;
/**
 * This is the model class for table "admin".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 */
class Admin extends ActiveRecord implements IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_INACTIVE = 9;
    const STATUS_ACTIVE = 10;
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'admin';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password'], 'required'],
            [['username'], 'string', 'max' => 50],
            [['password'], 'string', 'max' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'password' => 'Password',
        ];
    }
    public static function findByUsername($username)
    {
        // $admin = self::find()->where(["username" => $username])->one();
        // if (!count($admin)) {
        // return null;
        // }
        // return new static($admin);
        return static::findOne(['username' => $username, 'status' => self::STATUS_ACTIVE]);
    }
    public function validatePassword($password)
    {
        return $this->password === $password;
    }
    public static function findIdentity($id)
    {
          return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }
    public function getId() {
    return $this->id;
    }
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('"findIdentityByAccessToken" is not implemented.');
    }
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

}
