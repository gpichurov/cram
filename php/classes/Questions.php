<?php

class Questions implements IDBStorable
{
    private $id;

    private $question;

    private $answer;

    private $flash_cards_id;

    /**
     * Questions constructor.
     * @param $question
     * @param $answer
     * @param $flash_cards_id
     */
    public function __construct($question, $answer, $flash_cards_id)
    {
        $this->question = $question;
        $this->answer = $answer;
        $this->flash_cards_id = $flash_cards_id;
    }

    public function getFields()
    {
        return [
            'id' => $this->id,
            'question' => $this->question,
            'answer' => $this->answer,
            'flash_cards_id' => $this->flash_cards_id
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
        return 'questions';
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