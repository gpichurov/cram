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
    public function __construct($username, $password, $email)
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
}