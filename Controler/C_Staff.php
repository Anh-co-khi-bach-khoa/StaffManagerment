<?php

    include("../Model/M_Staff.php");

    class Ctrl_Staff{
        public function invoke(){

            if(isset($_GET["IDPB"])){
                $modelStaff = new M_Staff();
                $IDPB = $_REQUEST["IDPB"];
                $staffList = $modelStaff->getAllStaffbyIDPB($IDPB);
                include("../View/StaffList.html");
            } else if(isset($_GET["Timkiem"])){
                include("../View/Search.html");
            }
            else if(isset($_POST["btnFind"])){
                $modelStaff = new M_Staff();
                $Attri = $_REQUEST["rdbtn"];
                $KeyWord = $_REQUEST["txtSearch"];
                $staffList = $modelStaff->getAllStaffByAttri($Attri, $KeyWord);
                include("../View/StaffList.html");
            } else if(isset($_GET["ThemNV"])){
                include("../View/InsertStaff.html");
            }else if(isset($_POST["btnAddStaff"])){
                $modelStaff = new M_Staff();
                $IDNV = $_REQUEST["txtIDNV"];
                $IDPB = $_REQUEST["txtIDPB"];
                $Hoten = $_REQUEST["txtHoten"];
                $Diachi = $_REQUEST["txtDiachi"];



                $check = true;

                $staffList = $modelStaff->getAllStaff();

                for($i=0; $i<sizeof($staffList); $i++){
                    if($staffList[$i]->IDNV == $IDNV){
                        $check=false;
                    }
                }

                if($check == true){
                    $modelStaff->AddNewStaff($IDNV, $IDPB, $Hoten, $Diachi);
                    echo "<script>alert('Them thanh cong')</script>";
                    $staffList= $modelStaff->getAllStaff();
                    include("../View/StaffList.html");
                }else{
                    echo "<script>alert('Trung ma nhan vien')</script>";
                    include("../View/InsertStaff.html");
                }

                
            }else if(isset($_GET["XoaNhanvien"])){
                $modelStaff = new M_Staff();
                $staffList = $modelStaff->getAllStaff();
                include("../View/DeleteStaff.html");
            }else if(isset($_GET["IDNV"])){

                $IDNV = $_REQUEST["IDNV"];
                $modelStaff = new M_Staff();
                $modelStaff->DeleteStaffByID($IDNV);

                $staffList = $modelStaff->getAllStaff();
                include("../View/DeleteStaff.html");

            }else if(isset($_GET["XoaNhieuNhanvien"])){
                $modelStaff = new M_Staff();
                $staffList = $modelStaff->getAllStaff();
                include("../View/DeleteManyStaff.html");
            }else if(isset($_POST["btnDeleteMany"])){

                $modelStaff = new M_Staff();
                $staffList = $modelStaff->getAllStaff();

                for($i=0; $i<sizeof($staffList); $i++){
                    $temp = $staffList[$i]->IDNV;
                    
                    if(isset($_REQUEST[$temp])){
                        $IDNV = $_REQUEST[$temp];
                        $modelStaff->DeleteStaffByID($IDNV);
                    }
                    
                }

                $staffList = $modelStaff->getAllStaff();
                include("../View/DeleteManyStaff.html");

            }else if(isset($_POST["btnLogin"])){
                // if(isset($_REQUEST["txtUserName"]) && isset($_REQUEST["txtPassWord"])){
                    $UserName = $_REQUEST["txtUserName"];
                    $PassWord = $_REQUEST["txtPassWord"];
                    $modelStaff = new M_Staff();
                    $check = $modelStaff->login($UserName, $PassWord);
                    if($check == true){
                        include("../View/index.php");
                    }else{
                        header("location:../index.html?alert=1");

                    }


            }
            else{
                $modelStaff = new M_Staff();
                $staffList = $modelStaff->getAllStaff();
                include("../View/StaffList.html");
            }
            
        }

        

    }
    $C_Staff = new Ctrl_Staff();
    $C_Staff->invoke();

?>