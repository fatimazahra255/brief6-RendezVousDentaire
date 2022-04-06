<?php

class  LoginController {

    private $patientsModel;

    public function __construct()
    {
        $this->patientsModel = new Patient();
    }


    public function index()
    {


        if (isPostRequest() && verify(["reference"], $_POST))  {     
            $ref = $_POST["reference"];
            $patient = $this->patientsModel->fetchByReference($ref);

            if (!$patient) {
                return view("login");
            } else {
                view("Rendezvous");
                return;
            }
        }

        return view("login");
    }

}

