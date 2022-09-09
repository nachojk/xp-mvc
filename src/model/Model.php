<?php 
namespace JKModel;
include 'connection.php';
class Model 
{
    public static function getArray($campos="*", $tabla, $cuando="", $extra=""){
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
		mysqli_close($sql);
        return $res;
    }
	
	public static function ejeSql($squery){
        $sql = conect();
        $res = array();
        $query = $squery;
        $ejec = mysqli_query($sql,$query);
        $num = mysqli_num_rows($ejec);
        if($num >= 1){
            while($resultado = mysqli_fetch_assoc($ejec)){
                if(!empty($resultado)){
                    $res[]=$resultado;
                }
            }
        }
		mysqli_close($sql);
        return $res;
    }
		
    public static function insert($tabla, $columnas, $valores){
        $sql = conect();
        $query = "INSERT INTO $tabla ( $columnas ) VALUES ( $valores )";
        mysqli_query($sql,$query) or die (mysqli_error());
        $lastid = mysqli_insert_id($sql);
		mysqli_close($sql);
        return $lastid;
    }
    public static function update($tabla, $set, $cuando){
        $sql= conect();
        $query= "UPDATE $tabla SET $set WHERE $cuando";
        $ejecuta= mysqli_query($sql,$query);
		mysqli_close($sql);
        return $ejecuta;
    }
	
	public static function update2($tabla, $set){
        $sql= conect();
        $query= "UPDATE $tabla SET $set ";
        $ejecuta= mysqli_query($sql,$query);
		mysqli_close($sql);
        return $ejecuta;
    }
	
    public static function delete($tabla, $cuando){
        $sql= conect();
        if(isset($cuando) && $cuando!=""){
            $query="DELETE FROM $tabla WHERE $cuando";
            $ejecuta = mysqli_query($sql,$query);
        }
		mysqli_close($sql);
        return $query;
    }
	
    public static function get($campos="*", $tabla, $cuando="", $extra=""){
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
		mysqli_close($sql);
        return $res;
    }
}
function conect()
		{
		    $sql=conexSQL();
		    return $sql;
		}
