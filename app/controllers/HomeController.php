<?php

class HomeController
{
    private $RdvModel;

    public function __construct()
    {
        Middleware::assign($this, ["index", "history"], "auth");
        $this->RdvModel = new Rdv();
    }
    public function index()
    {

        //  creation de rendez vous
        $error = null;
        if (isPostRequest()) {
            $isVerified = verify(["date", "sujet", "creneau"], $_POST);
            if (!$isVerified) {
                $error = "please fill the required input";
            }
            if (!$error) {
                $data = [
                    "reference" => currentPatientRef(),
                    ...$_POST // spread operator
                ];
                $rdvID = $this->RdvModel->create($data);
                if (!$rdvID) {
                    // echo ("Votre demande a été enregisrée. Nous vous contacterons dans les plus brefs délais");
                    $error = "error creation de rendez vous";
                }
            }
        }
        $list = $this->RdvModel->fetchAll("where date = :date", ["date" => date("Y-m-d", strtotime("+1 day"))]);
        $usedSlots = [];
        foreach ($list as $rdv) {
            $usedSlots[$rdv["creneau"]] = true;
        }
        return bladeView("rdv.create", ["usedSlots" => $usedSlots, "error" => $error]);
    }

    public function history()
    {
        $list = $this->RdvModel->fetchAll("where reference = :ref", ["ref" => currentPatientRef()]);
        return bladeView("history", ["list" => $list]);
    }
}
