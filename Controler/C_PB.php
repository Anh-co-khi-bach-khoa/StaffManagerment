<?php

    include("../Model/M_PB.php");
    class Ctrl_PB{
        public function __construct(){}
        public function invoke(){
            if(isset($_GET["ThemPB"])){
                include("../View/InsertPB.html");
            }else if(isset($_POST["btnAddPB"])){
            
                $IDPB = $_REQUEST["txtIDPB"];
                $Tenpb = $_REQUEST["txtTenpb"];
                $Mota = $_REQUEST["txtMota"];
                $modelPB = new M_PB();
                $check = true;
                //$modelPB->AddPB($IDPB, $Tenpb, $Mota);
                $PBList = $modelPB->GetAllPB();
                for($i =0; $i<sizeof($PBList); $i++){
                    if($IDPB == $PBList[$i]->IDPB){
                        $check=false;
                    }
                }

                if($check == true){
                    $modelPB->AddPB($IDPB, $Tenpb, $Mota);
                    echo "<script>alert('Them thanh cong');</script>";
                    include("../View/PBList.html");
                }else{
                    echo "<script>alert('Trung ma phong ban');</script>";
                    include("../View/InsertPB.html");
                }   
            }else if(isset($_GET["CapNhatPB"])){
                $modelPB = new M_PB();
                $PBList = $modelPB->GetAllPB();
                include("../View/UpdatePB.html");
            }else if(isset($_GET["IDPB"])&& isset($_GET["formUpdatePB"])){
                $IDPB = $_REQUEST["IDPB"];
                $modelPB = new M_PB();
                $PB = $modelPB->GetPBByID($IDPB);
                include("../View/FormUpdatePB.html");
            }else if(isset($_POST["btnUpdatePB"])){
                $IDPB = $_REQUEST["txtIDPB"];
                $Tenpb = $_REQUEST["txtTenpb"];
                $Mota = $_REQUEST["txtMota"];
                $modelPB = new M_PB ();
                $modelPB->UpdatePB($IDPB, $Tenpb, $Mota);
                $PBList = $modelPB->GetAllPB();
                include("../View/UpdatePB.html");
            }

            else{
                $modelPB = new M_PB();
                $PBList = $modelPB->GetAllPB();
                include("../View/PBList.html");
            }
            
        }
    }

    $C_PB = new Ctrl_PB();
    $C_PB->invoke();

?>