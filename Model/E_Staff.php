<?php

class E_Staff{
    public $IDNV;
    public $Hoten;
    public $IDPB;
    public $Diachi;

    public function __construct($IDNV,$Hoten,$IDPB,$Diachi){
        $this->IDNV = $IDNV;
        $this->Hoten = $Hoten;
        $this->Diachi = $Diachi;
        $this->IDPB = $IDPB;

    }

}

?>