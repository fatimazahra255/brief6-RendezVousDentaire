<?php




class  RdvController
{
    private $model;



    public function __construct()
    {
        Middleware::assign($this, ["index", "all", "update", "delete"], "auth");
        $this->model = new Rdv();
    }








    public function update($id)
    {
        // rdv/update/1
        $rdv = $this->model->fetchById($id);
        if (!$rdv) return bladeView("404", ["id" => $id]);
        if ($rdv[MAIN_PATIENT_KEY] !== currentPatientRef()) return redirect("/");

        if (isPostRequest()) {
            // modifier redner vous dans DB
            $newData = [...$rdv, ...$_POST];
            $isUpdated = $this->model->updateById($id, $newData);
            if (!$isUpdated) {
                return bladeView("rdv.update", ["error" => "not updated"]);
            }
            return redirect("/history");
        } else {
            // bayan view dial render vous update
            $list = $this->allCreneauByDate($rdv["date"]);
            return bladeView("rdv.update", [...$rdv, "usedSlots" => $list]);
        }
    }
    public function delete($id)
    {
        // rdv/delete/1
        $rdv = $this->model->fetchById($id);
        if (!$rdv) return bladeView("404", ["id" => $id]);
        if ($rdv[MAIN_PATIENT_KEY] !== currentPatientRef()) return redirect("/");
        $isDeleted = $this->model->deleteById($id);
        if (!$isDeleted) return bladeView("/history", ["error" => "$id not deleted"]);
        return redirect("/history");
    }


    public function all()
    {
        $date = $_GET["date"] ?? date("Y-m-d");
        return json(array_keys($this->allCreneauByDate($date)));
    }
    private function allCreneauByDate($date)
    {
        $list = $this->model->fetchAll("where date = :date", ["date" => $date]);
        $usedSlots = [];
        foreach ($list as $rdv) {
            $usedSlots[$rdv["creneau"]] = true;
        }
        return $usedSlots;
    }
}
