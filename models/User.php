<?php

namespace app\models;

use Yii;
use yii\web\IdentityInterface;

class User implements IdentityInterface
{
    public function getId()
    {
        return $this->id;
    }
    
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }
    
    public function getAuthKey()
    {
        return $this->auth_key;
    }
    
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }
    
    public static function findIdentityByAccessToken($token, $type = null)
    {
        throw new NotSupportedException('You can only login by username/password pair for now.');
    }
}