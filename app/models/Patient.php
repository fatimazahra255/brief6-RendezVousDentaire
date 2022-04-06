<?php
class Patient extends Model
{
    protected $tableName = "patients";


    public function fetchByReference($ref)
    {
        return  $this->fetchOne("where reference = :reference", ["reference" => $ref]);
        // echo '<pre>', var_dump($this->fetchOne("WHERE reference = :reference", ["reference" => $ref])), '</pre>';
        // echo '<pre>', var_dump($ref), '</pre>';
    }

    public function updateByRef($data, $ref)
    {
        return $this->update($data, MAIN_PATIENT_KEY, $ref);
    }
}
