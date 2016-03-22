<?php

class Users implements IDBStorable
{
    private $id;

    private $username;

    private $password;

    private $email;

    private $newsletter;

    private $notification;

    /**
     * Users constructor.
     * @param $username
     * @param $password
     * @param $email
     */
    public function __construct($username, $password, $email = null)
    {
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->newsletter = true;
        $this->notification = true;
    }


    public function getFields()
    {
        return [
            'id' => $this->id,
            'username' => $this->username,
            'password' => $this->password,
            'email' => $this->email,
            'newsletter' => $this->newsletter,
            'notification' => $this->notification
        ];
    }

    public function getUsernameName()
    {
        return 'username';
    }

    public function getUsernameValue()
    {
        return $this->username;
    }

    public function getPasswordName()
    {
        return 'password';
    }

    public function getPasswordValue()
    {
        return $this->password;
    }

    public function getEmailName()
    {
        return 'email';
    }

    public function getEmailValue()
    {
        return $this->email;
    }

    public function getPrimaryKeyName()
    {
        return 'id';
    }

    public function getPrimaryKeyValue()
    {
        return $this->id;
    }

    public function getTableName()
    {
        return 'user';
    }

    public function setFieldsFromDb($fieldValues)
    {
        $fields = $this->getFields();
        foreach ($fieldValues as $name => $value) {
            if (isset($fields[$name])) {
                $this->$name = $value;
            }
        }
    }

    public function setPrimaryKeyValue($value)
    {
        $this->id = $value;
    }

    public function checkLogin()
    {
        $sqlUsername = sprintf('SELECT * FROM %s WHERE %s = ?', $this->getTableName(), $this->getUsernameName());
        $dataUsername = DbStorage::query($sqlUsername, [$this->getUsernameValue()]);
        if ((!empty($dataUsername)) && ($dataUsername[0]['password'] == $this->getPasswordValue())) {
            return $dataUsername;
        }
        return false;
    }
}