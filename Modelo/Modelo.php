<?php 
include 'Conexion.php';
class Modelo  
{
    public function getArray($campos="*", $tabla, $cuando="", $extra=""){
        $sql = conect();
        $res = array();
        $query = "SELECT $campos FROM $tabla";
        if($cuando!=""){
            $query.=" WHERE ".$cuando;
        }
        if($extra!=""){
            $query.=" ".$extra;
        }
        $ejec = mysqli_query($sql,$query);
        $num = mysqli_num_rows($ejec);
        if($num >= 1){
            while($resultado = mysqli_fetch_assoc($ejec)){
                if(!empty($resultado)){
                    $res[]=$resultado;
                }
            }
        }
        return $res;
    }
		
    public function insert($tabla, $columnas, $valores){
        $sql = conect();
        $query = "INSERT INTO $tabla ( $columnas ) VALUES ( $valores )";
        mysqli_query($sql,$query) or die(mysqli_error($db));
        $lastid = mysqli_insert_id($sql);
		
        return $lastid;
    }
    public function update($tabla, $set, $cuando){
        $sql= conect();
        $query= "UPDATE $tabla SET $set WHERE $cuando";
        $ejecuta= mysqli_query($sql,$query);
        return $ejecuta;
    }
		 public function update2($tabla, $set){
        $sql= conect();
        $query= "UPDATE $tabla SET $set ";
        $ejecuta= mysqli_query($sql,$query);
        return $ejecuta;
    }
    public function delete($tabla, $cuando){
        $sql= conect();
        if(isset($cuando) && $cuando!=""){
            $query="DELETE FROM $tabla WHERE $cuando";
            $ejecuta = mysqli_query($sql,$query);
        }
        return $query;
    }
     public function get($campos="*", $tabla, $cuando="", $extra=""){
        $sql = conect();
        $res = array();
        $query = "SELECT $campos FROM $tabla";
        if($cuando!=""){
            $query.=" WHERE ".$cuando;
        }
        if($extra!=""){
            $query.=" ".$extra;
        }
        $ejec = mysqli_query($sql,$query);
        $num = mysqli_num_rows($ejec);
        if($num == 1){
            $res = mysqli_fetch_assoc($ejec);
        }elseif($num > 1){
            while($resultado = mysqli_fetch_assoc($ejec)){
                if(!empty($resultado)){
                    $res[]=$resultado;
                }
            }
        }
        return $res;
    }
}
function conect()
		{
		    $sql=conexSQL();
		    return $sql;
		}
?>