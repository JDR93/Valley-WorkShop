<?php

require_once "./Libraries/Core/MySql.php";
require_once "Models/Propietario.php";
require_once "Models/Vehiculo.php";
require_once "Models/Servicio.php";



class Taller extends Mysql
{
    private $nit;
    private $nombre;


    private $mantenimientos = array();
    private $vehiculos = array();
    private $mecanicos = array();
    private $propietarios = array();

    private $servicios = array();
    private $productos = array();



    public function __construct()
    {

        parent::__construct();
        $this->vehiculos = $this->getVehiculos();
        $this->servicios = $this->getServicios();
        $this->productos = $this->getProductos();
        $this->propietarios = $this->getPropietarios();
        $this->mecanicos = $this->getMecanicos();
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __set($name, $value)
    {
        $this->$name = $value;
    }



    /*

    public function addPropietario(Propietario $propietario): void
    {
        foreach ($this->propietarios as $p) {
            if ($p->nuid == $propietario->nuid) {
                throw new Exception("propietario con identificacion [" . $p->nuid . "] ya se encuentra registrado");
            }
        }

        $query_insert = "INSERT INTO propietario (nuid, nombres, apellidos, genero, telefono, correo , direccion) 
        VALUES (?,?,?,?,?,?)";
        $arrData = [$servicio->codigo, $servicio->nombre, $servicio->descripcion, $servicio->costo, $servicio->imagen, $servicio->estado];
        $last_insert = $this->insert($query_insert, $arrData);

        array_push($this->propietarios, $propietario);
    }
    */



    public function addServicio(Servicio $servicio): void
    {
        /*
        foreach ($this->servicios as $s) {
            if (strcasecmp($s->codigo, $servicio->codigo) == 0) {
                throw new Exception("Servicio  con codigo " . $s->codigo . " ya se encuentra registrado");
            }
            if (strcasecmp($s->nombre, $servicio->nombre) == 0) {
                throw new Exception("Servicio con nombre " . $s->nombre . " ya se encuentra registrado");
            }
        }
        */

        $query_insert = "INSERT INTO servicio (codigo, nombre, descripcion, costo, imagen , estado) 
        VALUES (?,?,?,?,?,?)";
        $arrData = [$servicio->codigo, $servicio->nombre, $servicio->descripcion, $servicio->costo, $servicio->imagen, $servicio->estado];
        $last_insert = $this->insert($query_insert, $arrData);

        array_push($this->servicios, $servicio);
    }

    public function addProducto(Producto $producto): void
    {

        $query_insert = "INSERT INTO producto (codigo, nombre, descripcion, costo, imagen) 
        VALUES (?,?,?,?,?)";
        $arrData = [$producto->codigo, $producto->nombre, $producto->descripcion, $producto->costo, $producto->imagen];
        $last_insert = $this->insert($query_insert, $arrData);

        array_push($this->productos, $producto);
    }


    public function addMantenimiento($id_vehiculo)
    {
        $query_insert = "INSERT INTO mantenimiento (estado,id_vehiculo) 
        VALUES (?,?)";
        $arrData = ['P', $id_vehiculo];
        $requuest_insert = $this->insert($query_insert, $arrData);
        return $requuest_insert;
    }




    ////////////////////////////////////////////////////
    // VEHICULO
    ////////////////////////////////////////////////////

    public function getVehiculos()
    {
        $query_select = "SELECT * FROM vehiculo";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getVehiculo($placa)
    {
        $i = 0;
        while ($i < count($this->vehiculos)) {


            if ($this->vehiculos[$i]->placa == $placa) {
                return  $this->vehiculos[$i];
            }
            $i++;
        }
        throw new Exception("El vehiculo no se encontro.");
    }

    public function getVehiculoID($id)
    {
        $i = 0;
        while ($i < count($this->vehiculos)) {


            if ($this->vehiculos[$i]->id == $id) {
                return  $this->vehiculos[$i];
            }
            $i++;
        }
        throw new Exception("El vehiculo no se encontro.");
    }


    public function addVehiculo(Vehiculo $vehiculo)
    {

        foreach ($this->vehiculos as $v) {
            if ($v->placa == $vehiculo->placa) {
                throw new Exception("Vehiculo con placa [" . $v->placa . "] ya se encuentra registrado");
            }
        }

        foreach ($this->propietarios as $p) {
            if ($vehiculo->propietario->nuid == $p->nuid) {

                $respVerifica = true;
                break;
            } else {

                $respVerifica = false;
                break;
            }
        }

        if ($respVerifica == true) {

            $propietario = $this->getPropietarioNuid($vehiculo->propietario->nuid);
            $query_insert = "INSERT INTO vehiculo (placa,marca,modelo,anio,tipo,id_propietario) VALUES (?,?,?,?,?,?)";
            $arrData = [$vehiculo->placa, $vehiculo->marca, $vehiculo->modelo, $vehiculo->anio, $vehiculo->tipo, $propietario->id];
            $id_veh = $this->insert($query_insert, $arrData);
        } else if ($respVerifica == false) {

            $query_insert = "INSERT INTO propietario (nuid,nombres,apellidos,genero,telefono,correo,direccion) 
            VALUES (?,?,?,?,?,?,?)";
            $arrData = [$vehiculo->propietario->nuid, $vehiculo->propietario->nombres, $vehiculo->propietario->apellidos, $vehiculo->propietario->genero, $vehiculo->propietario->telefono, $vehiculo->propietario->correo, $vehiculo->propietario->direccion];
            $id_prop = $this->insert($query_insert, $arrData);

            $query_insert = "INSERT INTO vehiculo (placa,marca,modelo,anio,tipo,id_propietario) VALUES (?,?,?,?,?,?)";
            $arrData = [$vehiculo->placa, $vehiculo->marca, $vehiculo->modelo, $vehiculo->anio, $vehiculo->tipo, $id_prop];
            $id_veh = $this->insert($query_insert, $arrData);
        }

        return $id_veh;
    }

    ////////////////////////////////////////////////////
    // PROPIETARIO
    ////////////////////////////////////////////////////

    public function getPropietarios()
    {
        $query_select = "SELECT * FROM propietario";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getPropietario($id)
    {

        $i = 0;
        while ($i < count($this->propietarios)) {


            if ($this->propietarios[$i]->id == $id) {
                return  $this->propietarios[$i];
            }
            $i++;
        }
        throw new Exception("El propietario no se encontro.");
    }

    public function getPropietarioNuid($nuid)
    {

        $i = 0;
        while ($i < count($this->propietarios)) {


            if ($this->propietarios[$i]->nuid == $nuid) {
                return  $this->propietarios[$i];
            }
            $i++;
        }
        throw new Exception("El propietario no se encontro.");
    }

    public function addPropietario(Propietario $propietario)
    {

        $query_insert = "INSERT INTO propietario (nuid,nombres,apellidos,genero,telefono,correo,direccion) 
        VALUES (?,?,?,?,?,?,?)";
        $arrData = [$propietario->nuid, $propietario->nombres, $propietario->apellidos, $propietario->genero, $propietario->telefono, $propietario->correo, $propietario->direccion];
        $requuest_insert = $this->insert($query_insert, $arrData);
        return $requuest_insert;
    }

    ////////////////////////////////////////////////////
    // SERVICIO
    ////////////////////////////////////////////////////

    public function getServicios()
    {
        $query_select = "SELECT * FROM servicio ORDER BY codigo desc";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getServicio($codigo)
    {
        $i = 0;
        while ($i < count($this->servicios)) {


            if ($this->servicios[$i]->codigo == $codigo) {
                return  $this->servicios[$i];
            }
            $i++;
        }
        throw new Exception("El servicio no se encontro.");
    }

    public function removerServicio($codigo)
    {
        $query_delete = "DELETE FROM servicio WHERE codigo = $codigo";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }

    ////////////////////////////////////////////////////
    // PRODUCTO
    ////////////////////////////////////////////////////

    public function getProductos()
    {
        $query_select = "SELECT * FROM producto ORDER BY codigo desc";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getProducto($codigo)
    {
        $i = 0;
        while ($i < count($this->productos)) {


            if ($this->productos[$i]->codigo == $codigo) {
                return  $this->productos[$i];
            }
            $i++;
        }
        throw new Exception("El producto no se encontro.");
    }

    public function removerProducto($codigo)
    {
        $query_delete = "DELETE FROM producto WHERE codigo = $codigo";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }

    ////////////////////////////////////////////////////
    // MECANICO
    ////////////////////////////////////////////////////

    public function getMecanicos()
    {
        $query_select = "SELECT * FROM mecanico ORDER BY codigo";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getMecanicosDisponibles()
    {
        $query_select = "SELECT * FROM mecanico WHERE disponibilidad = 'D' ORDER BY codigo";
        $request_select = $this->selectAll($query_select);
        return $request_select;

    }
      

    public function getMecanico($id)
    {
        $i = 0;
        while ($i < count($this->mecanicos)) {


            if ($this->mecanicos[$i]->id == $id) {
                return  $this->mecanicos[$i];
            }
            $i++;
        }
        throw new Exception("El Mecanico no se encontro.");
    }

    public function getIDMecanico($nuid)
    {
        $i = 0;
        while ($i < count($this->mecanicos)) {


            if ($this->mecanicos[$i]->nuid == $nuid) {
                return  $this->mecanicos[$i];
            }
            $i++;
        }
        throw new Exception("El mecanico no se encontro.");
    }


    public function addMecanico(Mecanico $mecanico)
    {
        /*
        foreach ($this->mecanicos as $m) {
            if ($m->nuid == $mecanico->nuid) {
                throw new Exception("Mecanico con identificacion [" . $m->nuid . "] ya se encuentra registrado");
            }
        }
        */
        $query_insert = "INSERT INTO mecanico (codigo,nuid,nombres,apellidos,genero,telefono,correo,imagen) VALUES (?,?,?,?,?,?,?,?)";
        $arrData = [$mecanico->codigo, $mecanico->nuid, $mecanico->nombres, $mecanico->apellidos, $mecanico->genero, $mecanico->telefono, $mecanico->correo, $mecanico->imagen];
        $id_mec = $this->insert($query_insert, $arrData);
        return $id_mec;
    }

    public function removerMecanico($id)
    {
        $query_delete = "DELETE FROM mecanico WHERE id = $id";
        $request_delete = $this->delete($query_delete);
        return $request_delete;
    }

    ////////////////////////////////////////////////////
    // MANTENIMIENTO
    ////////////////////////////////////////////////////

    public function getMantenimientos()
    {
        $query_select = "SELECT * FROM mantenimiento";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }


    public function getMantenimientosSinMecanico()
    {
        $query_select = "SELECT * FROM mantenimiento where id_mecanico IS NULL";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function getMantenimineto($id)
    {
        foreach ($this->mantenimientos as $m) {
            if ($m->id == $id) {
                return $m;
            }
        }
    }

    //OBTENIENDO EL MANTENIMIENTO SI EL VEHICULO SE ENCUENTRA EN EL Y SI EL MANT. ES PENDIENTE
    public function getMantSiVehiculo($id_vehiculo)
    {
        foreach ($this->getMantenimientos() as $m) {
            if ($m->id_vehiculo == $id_vehiculo) {
                return $m;
            }
        }
    }

    public function getServiciosMant($id_mantenimiento)
    {
        $query_select = "SELECT id_servicio FROM mantenimiento_servicios WHERE id_mantenimiento = $id_mantenimiento";
        $arrayServicios = $this->selectAll($query_select);

        if ($arrayServicios != []) {
            foreach ($arrayServicios as $s) {

                $query_select = "SELECT * FROM servicio WHERE id = $s->id_servicio";
                $service[] = $this->selectAll($query_select);
            }
            return $service;
        } else {
            return $service = false;;
        }
    }

    public function addServicioMant($id_mantenimiento, $id_servicio)
    {
        $query_insert = "INSERT INTO mantenimiento_servicios (id_mantenimiento,id_servicio)
        VALUES (?,?)";
        $arrData = [$id_mantenimiento, $id_servicio];
        $this->insert($query_insert, $arrData);
    }


    /*
    public function getServicio($id_service)
    {
        $query_select = "SELECT * FROM servicio WHERE id = $id_service";
        $request_select = $this->select($query_select);
        return $request_select;
    }

    public function getServicioCode($codigo)
    {
        $query_select = "SELECT * FROM servicio WHERE codigo = $codigo";
        $request_select = $this->select($query_select);
        return $request_select;
    }

    public function getVehiculo($placa)
    {
        $query_select = "SELECT * FROM vehiculo WHERE placa = '$placa' ";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }
    public function getPropietario($id)
    {
        $query_select = "SELECT * FROM propietario WHERE id = $id ";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

    public function addMantPendiente(Mantenimiento $mantenimiento)
    {
        $query_insert = "INSERT INTO mantenimiento (estado,id_vehiculo) 
        VALUES (?,?)";
        $arrData = [$mantenimiento->estado, $mantenimiento->id_vehiculo];
        $requuest_insert = $this->insert($query_insert, $arrData);
        return $requuest_insert;
    }

    
    public function addVehiculo(Vehiculo $vehiculo)
    {
        $query_insert = "INSERT INTO vehiculo (placa,marca,modelo,anio,tipo,id_propietario) 
        VALUES (?,?,?,?,?,?)";
        $arrData = [$vehiculo->placa, $vehiculo->marca, $vehiculo->modelo, $vehiculo->anio, $vehiculo->tipo, $vehiculo->id_propietario];
        $requuest_insert = $this->insert($query_insert, $arrData);
        return $requuest_insert;
    }


    public function getIDVehiculosMantPendiente()
    {
        $query_select = "SELECT id_vehiculo FROM mantenimiento";
        $request_select = $this->selectAll($query_select);
        return $request_select;
    }

*/
}
