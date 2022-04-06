<?php
class  RendezvousController 
{
    private $RendezvousModel;


    public function __construct()
    {
        $this->RendezvousModel = new Rendezvous() ;
    }
    public function index()
    {
        view("Rendezvous");
    }
}





