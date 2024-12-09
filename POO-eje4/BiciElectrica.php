<?php

class Bicicleta {
    private $id; // Identificador de la bicicleta (entero)
    private $coordx; // Coordenada X (entero)
    private $coordy; // Coordenada Y (entero)
    private $bateria; // Carga de la batería en tanto por ciento (entero)
    private $operativa; // Estado de la bicicleta (true operativa - false no disponible)

    public function __construct($id, $coordx, $coordy, $bateria, $operativa) {
        $this->id = $id;
        $this->coordx = $coordx;
        $this->coordy = $coordy;
        $this->bateria = $bateria;
        $this->operativa = $operativa;
    }

    public function __get($propiedad) {
        if (property_exists($this, $propiedad)) {
            return $this->$propiedad;
        }
        return null;
    }

    public function __set($propiedad, $valor) {
        if (property_exists($this, $propiedad)) {
            $this->$propiedad = $valor;
        }
    }

    public function __toString() {
        return "ID: " . $this->id . ", Batería: " . $this->bateria . "%";
    }

    public function distancia($x, $y) {
        $dx = $x - $this->coordx;
        $dy = $y - $this->coordy;
        return sqrt($dx * $dx + $dy * $dy);
    }
}

?>