<?php

namespace app\models;

use Yii;
use yii\base\NotSupportedException;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "User".
 *
 * @property integer $id
 * @property integer $is_valid
 * @property string $name
 * @property string $email
 * @property string $password
 * @property string $balance
 * @property string $avatar
 * @property integer $adminRole
 * @property string $authKey
 */
class BackendUser extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'User';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['is_valid', 'adminRole'], 'integer'],
            [['balance'], 'number'],
            [['username', 'email', 'password', 'avatar'], 'string', 'max' => 255],
            [['authKey'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'is_valid' => 'Is Valid',
            'username' => 'Name',
            'email' => 'Email',
            'password' => 'Password',
            'balance' => 'Balance',
            'avatar' => 'Avatar',
            'adminRole' => 'Admin Role',
            'authKey' => 'Auth Key',
        ];
    }

    public function validatePassword($password)
    {
        return $password === $this->password;
    }

    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns a key that can be used to check the validity of a given identity ID.
     *
     * The key should be unique for each individual user, and should be persistent
     * so that it can be used to check the validity of the user identity.
     *
     * The space of such keys should be big enough to defeat potential identity attacks.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @return string a key that is used to check the validity of a given identity ID.
     * @see validateAuthKey()
     */
    public function getAuthKey()
    {
        return $this->authKey;
    }

    /**
     * Validates the given auth key.
     *
     * This is required if [[User::enableAutoLogin]] is enabled.
     * @param string $authKey the given auth key
     * @return boolean whether the given auth key is valid.
     * @see getAuthKey()
     */
    public function validateAuthKey($authKey)
    {
        return $authKey === $this->authKey;
    }

    public static function findIdentity($id)
    {
        return self::findOne($id);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new \yii\web\NotSupportedException();
    }

    public static function findByUserEmail($userEmail)
    {
        return self::findOne(['email' => $userEmail]);
    }

    public function addFunds($amount)
    {
        $this->balance += $amount;
        return parent::save();
    }

    public function substractFunds($amount)
    {
        $this->balance -= $amount;
        return parent::save();
    }

    public function getImageurl()
    {
        return 'images/userImages/' . $this->avatar;
    }
}
