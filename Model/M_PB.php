<?php

include("E_PB.php");

class M_PB{
    public function __construct(){}

    public function GetAllPB() {

        $link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());
        mysqli_select_db($link,"dulieu");
        $sql = "select * from phongban";
        $result = mysqli_query($link,$sql);
        $i = 0;

        while($row = mysqli_fetch_array($result)){
            $PB = new E_PB($row['IDPB'], $row['Tenpb'], $row['Mota']);
            $PBList[] = $PB;

        }
        return $PBList;

    }

    public function AddPB($IDPB,$Tenpb,$Mota){



        $link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());
        mysqli_select_db($link,"dulieu");
        $sql = "insert into phongban (IDPB, Tenpb, Mota) values ('$IDPB','$Tenpb','$Mota')";
        mysqli_query($link,$sql);

    }

    public function GetPBByID($IDPB) {
        $link = mysqli_connect("localhost", "root","") or die(mysqli_connect_error());
        mysqli_select_db($link,"dulieu");
        $sql = "select * from phongban Where IDPB = '$IDPB'";
        
        $Rs = mysqli_query($link,$sql);
        $row = mysqli_fetch_array($Rs);
        $PB = new E_PB($row["IDPB"], $row["Tenpb"] , $row["Mota"]);
        return $PB;

    }

    public function UpdatePB($IDPB,$Tenpb,$Mota){

        $link = mysqli_connect("localhost","root","") or die ("Khong the ket noi den CSDL MySQL");

        mysqli_select_db($link,"dulieu");
        $sql = "update phongban set Tenpb='$Tenpb',Mota='$Mota' where IDPB='$IDPB'";
        $result = mysqli_query($link, $sql);

    }
}



?>