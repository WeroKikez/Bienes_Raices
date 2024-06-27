<?php

namespace Model;

class Vendedor extends ActiveRecord {
    protected static $tabla = 'vendedores';
    protected static $columnasDB = ['id', 'nombre', 'apellido', 'telefono'];

    public $id;
    public $nombre;
    public $apellido;
    public $telefono;

    public function __construct($args = []) {
        $this->id = $args['id'] ?? null;
        $this->nombre = $args['nombre'];
        $this->apellido = $args['apellido'];
        $this->telefono = $args['telefono'];
    }

    public function Validar() {
        if (!$this->nombre) {
            self::$errores[] = "Debes colocar el nombre del vendedor";
        }

        if (!$this->apellido) {
            self::$errores[] = "Debes colocar el apellido del vendedor";
        }

        if (!$this->telefono) {
            self::$errores[] = "Debes colocar el telefono del vendedor";
        }

        if ( !preg_match('/[0-9]{10}/', $this->telefono) ) {
            self::$errores[] = "Formato No Valido";
        }

        return self::$errores;
    }
}