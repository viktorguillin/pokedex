<?php

class DatabaseQuerys{
    private $host;
    private $port;
    private $database;
    private $usuario;
    private $pass;

    private $conexion;

    public function __construct($host, $port, $database, $usuario, $pass){
        $this->host = $host;
        $this->port = $port;
        $this->database = $database;
        $this->usuario = $usuario;
        $this->pass = $pass;

        $this->conexion = $this->connect();
    }

    public function connect(){
        return mysqli_connect($this->host,
            $this->usuario,
            $this->pass,
            "pokedex-facundo-rivero",
            $this->port
        );
    }

    function getPokemones($key = '' , $value = ''){
        $sql = "SELECT * FROM pokemones";

        if($value !== ''){
            if($key=='id'){
                $sql.=" where ".$key.'='.$value;
            } else{
                $sql.=" where ".$key." like '%".$value."%'";
            }
        }

        $query_result = mysqli_query( $this->conexion, $sql);

        $result = array();

        while( $fila = mysqli_fetch_assoc($query_result) ){
            $result[] = $fila;
        }

        return  $result;
    }

    function deletePokemon($id){
        $sql = "SELECT * FROM pokemones";
        $sql.=" where id =".$id;
        $query_result = mysqli_query( $this->conexion, $sql);

        if($query_result->num_rows == 0) return false;
        
        $sql = "delete FROM pokemones where id=".$id;
        return mysqli_query($this->conexion, $sql);
    }

    function addPokemon($pokemon){
        $sql = "INSERT INTO pokemones (`imagen`, `nombre`, `tipo`, `descripcion`) VALUES (";
        $sql.= "'".$pokemon['imagen']."', ";
        $sql.= "'".$pokemon['nombre']."', ";
        $sql.= "'".$pokemon['tipo']."', ";
        $sql.= "'".$pokemon['descripcion']."')";

        return mysqli_query($this->conexion, $sql);
    }

    function editPokemon($pokemon){
        $sql = "update pokemones set ";
        if($pokemon['imagen'] != ''){
            $sql.= "imagen = '".$pokemon['imagen']."', ";
        }
        $sql.= "nombre = '".$pokemon['nombre']."', ";
        $sql.= "tipo = '".$pokemon['tipo']."', ";
        $sql.= "descripcion = '".$pokemon['descripcion']."' ";
        $sql.= "where id = ".$pokemon['id'];

        return mysqli_query($this->conexion, $sql);
    }
}