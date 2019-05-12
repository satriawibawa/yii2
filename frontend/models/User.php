<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $username
 * @property string $password
 * @property string $email
 * @property string $verification_token
 * @property string $password_hash
 * @property string $auth_key
 * @property string $status
 * @property string $created_at
 * @property string $updated_at
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'password', 'email', 'verification_token', 'password_hash', 'auth_key', 'status', 'created_at', 'updated_at'], 'required'],
            [['username'], 'string', 'max' => 30],
            [['password', 'status'], 'string', 'max' => 10],
            [['email', 'created_at', 'updated_at'], 'string', 'max' => 50],
            [['verification_token', 'password_hash', 'auth_key'], 'string', 'max' => 250],
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
            'email' => 'Email',
            'verification_token' => 'Verification Token',
            'password_hash' => 'Password Hash',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
