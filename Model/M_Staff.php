<?php

include("E_Staff.php");

class M_Staff{

    public function __construct(){
    }

    public function getAllStaff(){
        $link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());
        mysqli_select_db($link,"dulieu");
        $sql = "select * from nhanvien";
        $result = mysqli_query($link,$sql);
        $i = 0;
        $staffs = [];
        while($row = mysqli_fetch_array($result)){
            $staff = new E_Staff($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);
            $staffList[] = $staff;

        }
        return $staffList;
    }



    public function getAllStaffbyIDPB($IDPB){

        $link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());
        mysqli_select_db($link,"dulieu");
        $sql = "select * from nhanvien where IDPB ='$IDPB'";

        $result = mysqli_query($link,$sql);
        $i = 0;
        $staffs = [];
        while($row = mysqli_fetch_array($result)){
            $staff = new E_Staff($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);
            $staffList[] = $staff;
            $i++;
        }
        if($i!=0){
            return $staffList;
        }
        return null;
        

    }

    public function getAllStaffByAttri($Attri, $KeyWord){
        $link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());
        mysqli_select_db($link,"dulieu");
        $sql = "select * from nhanvien where $Attri like '%$KeyWord%'";

        $result = mysqli_query($link,$sql);
        $i = 0;

        while($row = mysqli_fetch_array($result)){
            $staff = new E_Staff($row['IDNV'], $row['Hoten'], $row['IDPB'], $row['Diachi']);
            $staffList[] = $staff;
            $i++;
        }
        if($i!=0){
            return $staffList;
        }
        return null;
    }

    public function AddNewStaff($IDNV, $IDPB,$Hoten,$Diachi){

        $link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());
        mysqli_select_db($link,"dulieu");
        $sql = "insert into nhanvien (IDNV, Hoten, IDPB, Diachi) values ('$IDNV','$Hoten','$IDPB','$Diachi')";

        mysqli_query($link,$sql);

    }

    public function DeleteStaffByID($IDNV){
        $link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
        
        mysqli_select_db($link,"dulieu");
        $sql = "Delete from nhanvien where IDNV='$IDNV'";
        
        $result = mysqli_query($link,$sql);
    }

    public function DeleteManyStaff($IDNV){
        $link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
        mysqli_select_db($link, "dulieu");
        $rs = mysqli_query($link, "SELECT IDNV FROM nhanvien");
        // while ($row = mysqli_fetch_array($rs, MYSQLI_BOTH)) {
        //   $myID = $_REQUEST[$row['IDNV']];
        $result = mysqli_query($link, "DELETE FROM nhanvien WHERE IDNV = '$IDNV'");
          
        // }
        mysqli_free_result($rs);
        mysqli_close($link);
    }
    
    public function login($UserName, $PassWord){
        $link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");
        
        mysqli_select_db($link,"dulieu");
        $sql = "select * from admin";
        $result = mysqli_query($link,$sql);
        while($row = mysqli_fetch_array($result)){
            if($UserName == $row["Username"] && $PassWord == $row["Password"]){
                return true;
            }
        }
        return false;
    }

}

?>