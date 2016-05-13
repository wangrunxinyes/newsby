<?php
namespace common\models;

use Yii;
use yii\base\Model;

/**
 * Login form
 */
class RegisterModel extends Model
{
    public $username;
    public $password;
    public $email;
    public $rememberMe = true;

    private $_user;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            // username and password are both required
            [['username', 'password', 'email'], 'required'],
            // rememberMe must be a boolean value
            ['rememberMe', 'boolean'],
            // password is validated by validatePassword()
            ['username', 'validateUsername'],
        	['email', 'validateEmail'],
        ];
    }

    /**
     * Validates the password.
     * This method serves as the inline validation for password.
     *
     * @param string $attribute the attribute currently being validated
     * @param array $params the additional name-value pairs given in the rule
     */
    public function validateUsername($attribute, $params)
    {
        if (!$this->hasErrors()) {
        	$user = $this->getUser();
            if ($user) {
                $this->addError($attribute, 'Username exists.');
            }
        }
    }
    
    public function validateEmail($attribute, $params){
    	if (!$this->hasErrors()) {
    	}
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function register()
    {
        if ($this->validate()) {
            //register;
            $this->_user = new User();
            $this->_user->username = $this->username;
            $this->_user->setPassword($this->password);
            $this->_user->created_at = time();
            $this->_user->save();
            return true;
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUser()
    {
        if ($this->_user === null) {
            $this->_user = User::findByUsername($this->username);
        }

        return $this->_user;
    }
}
