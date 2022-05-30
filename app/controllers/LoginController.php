<?php

class  LoginController
{

    private $patientsModel;

    public function __construct()
    {
        $this->patientsModel = new Patient();
    }


    public function index()
    {


        if (isPostRequest() && verify(["reference"], $_POST)) {
            $ref = $_POST["reference"];
            $patient = $this->patientsModel->fetchByReference($ref);

            if (!$patient) {
                return view("login");
            }

            createPatientSession($patient);
            return redirect("/");
        }

        return view("login");
    }
}
