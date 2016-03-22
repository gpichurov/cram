<?php

class FlashCards implements IDBStorable
{
    private $id;

    private $name;

    private $description;

    private $userID;

    /**
     * FlashCards constructor.
     * @param $name
     * @param $description
     * @param $userID
     */
    public function __construct($name, $description = null, $userID)
    {
        $this->name = $name;
        $this->description = $description;
        $this->userID = $userID;
    }

    public function getFields()
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'discription' => $this->description,
            'user_id' => $this->userID
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
        return 'flash_cards';
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