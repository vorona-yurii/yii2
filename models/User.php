<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $password
 * @property string $key
 * @property int $status
 * @property int $time
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['email', 'password', 'time'], 'required'],
            [['status', 'time'], 'integer'],
            [['email', 'password', 'key'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'password' => 'Password',
            'key' => 'Key',
            'status' => 'Status',
            'time' => 'Time',
        ];
    }

    //_______________________________________________________

     public static function findIdentity($id)
    {
        return static::findOne($id);
    }

     public static function findByEmail($email)
    {
        return static::findOne(['email' => $email]);
    }

    public static function findByKey($code)
    {
        return static::findOne(['key' => $code]);
    }

     public static function findIdentityByAccessToken($token, $type = null)
    {
        
    }

    public function getAuthKey()
    {
       
    }

    public function validateAuthKey($authKey)
    {
       
    }

    public function getId()
    {
        return $this->id;
    }

     public function validatePassword($password)
    {
        return $this->password === md5($password);
    }
}
