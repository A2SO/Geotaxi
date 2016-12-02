<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehiculos_model extends CI_Model
{

    public $table = 'vehiculos';
    public $id = 'idvehiculo';
    public $order = 'DESC';

    function __construct()
    {
        parent::__construct();
    }

    function lista()
        {
    return  $this->db->query("SELECT * FROM `estatus`")->result();
        }

        function get_clave(){

    // armamos la consulta
    $query = $this->db-> query('SELECT clave,descripcion FROM estatus');

    // si hay resultados
    if ($query->num_rows() > 0) {
        // almacenamos en una matriz bidimensional
        foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->clave, ENT_QUOTES)] = 
htmlspecialchars($row->descripcion, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
     }
    }
    function get_concesionario(){

    // armamos la consulta
    $query = $this->db-> query('SELECT idconcesinario,nombre,ape_pat,ape_pat FROM Concesionario WHERE clave="AC"');

    // si hay resultados
    if ($query->num_rows() > 0) {
        // almacenamos en una matriz bidimensional
        foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->idconcesinario, ENT_QUOTES)] = 
htmlspecialchars($row->nombre, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
     }
    }
    function get_conductor(){

    // armamos la consulta
    $query = $this->db-> query('SELECT idconductor,nombre_conductor,ap_conductor,am_conductor FROM Conductor 
        WHERE clave="AC" ');

    // si hay resultados
    if ($query->num_rows() > 0) {
        // almacenamos en una matriz bidimensional
        foreach($query->result() as $row)
           $arrDatos[htmlspecialchars($row->idconductor, ENT_QUOTES)] = 
            htmlspecialchars($row->nombre_conductor, ENT_QUOTES).
            htmlspecialchars(" ", ENT_QUOTES).
            htmlspecialchars($row->ap_conductor, ENT_QUOTES).
            htmlspecialchars(" ", ENT_QUOTES).
            htmlspecialchars($row->am_conductor, ENT_QUOTES).
            htmlspecialchars(" ", ENT_QUOTES).
            htmlspecialchars($row->idconductor, ENT_QUOTES);

        $query->free_result();
        return $arrDatos;
     }
    }

    // get all
    function get_all()
    {
        $this->db->order_by($this->id, $this->order);
        return  $this->db->query("SELECT * FROM vehiculos,estatus WHERE estatus.clave=vehiculos.clave")->result();
    }
    function get_all_activo()
    {
        $this->db->order_by($this->id, $this->order);
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion, vehiculos.clave,estatus.descripcion,concesionario.idconcesinario,concesionario.nombre,concesionario.ape_pat,concesionario.ape_mat,conductor.idconductor,conductor.nombre_conductor,conductor.ap_conductor,conductor.am_conductor FROM `vehiculos`,concesionario,conductor,estatus WHERE estatus.clave=vehiculos.clave and concesionario.idconcesinario= vehiculos.idconcesinario and conductor.idconductor=vehiculos.idconductor and conductor.clave='AC' and vehiculos.clave='AC'")->result();
    }
    function get_all_espera()
    {
        $this->db->order_by($this->id, $this->order);
        return  $this->db->query("SELECT * FROM vehiculos,estatus WHERE estatus.clave=vehiculos.clave and vehiculos.clave='ES'")->result();
    }
    function get_all_validado()
    {
        $this->db->order_by($this->id, $this->order);
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion,vehiculos.idconcesinario, vehiculos.clave,estatus.descripcion  FROM vehiculos,estatus WHERE estatus.clave=vehiculos.clave and vehiculos.clave='VA'")->result();
    }
    function get_all_asignado_concesionario()

    {
        $this->db->order_by($this->id, $this->order);
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion,vehiculos.idconcesinario, vehiculos.idconductor, vehiculos.clave,estatus.descripcion,concesionario.nombre,concesionario.ape_pat,concesionario.ape_mat  FROM vehiculos,estatus,concesionario WHERE estatus.clave=vehiculos.clave and vehiculos.clave='AS' AND vehiculos.idconcesinario=concesionario.idconcesinario ")->result();
    }
    function get_all_informacion_completa()

    {
        $this->db->order_by($this->id, $this->order);
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion,vehiculos.idconcesinario, vehiculos.idconductor,conductor.nombre_conductor,conductor.ap_conductor,conductor.am_conductor, vehiculos.clave,estatus.descripcion,concesionario.nombre,concesionario.ape_pat,concesionario.ape_mat  FROM vehiculos,estatus,concesionario,conductor WHERE estatus.clave=vehiculos.clave and vehiculos.clave='IC' AND vehiculos.idconcesinario=concesionario.idconcesinario and vehiculos.idconductor=conductor.idconductor ")->result();
    }
    function get_all_inactivo()
    {
        $this->db->order_by($this->id, $this->order);
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion, vehiculos.clave,estatus.descripcion,concesionario.idconcesinario,concesionario.nombre,concesionario.ape_pat,concesionario.ape_mat,conductor.idconductor,conductor.nombre_conductor,conductor.ap_conductor,conductor.am_conductor FROM `vehiculos`,concesionario,conductor,estatus WHERE estatus.clave=vehiculos.clave and concesionario.idconcesinario= vehiculos.idconcesinario and conductor.idconductor=vehiculos.idconductor and conductor.clave='AC'and vehiculos.clave='IN'")->result();
    }


    // get data by id
    function get_by_id($id)
    {
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion, vehiculos.clave,estatus.descripcion FROM vehiculos,estatus WHERE estatus.clave=vehiculos.clave and vehiculos.idvehiculo=". $id)->row();
    }
    function get_by_id_validado($id)
    {
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion,vehiculos.idconcesinario, vehiculos.clave,estatus.descripcion ,concesionario.nombre,concesionario.ape_pat,concesionario.ape_mat FROM vehiculos,estatus,concesionario WHERE estatus.clave=vehiculos.clave and vehiculos.idvehiculo=". $id)->row();
    }
    function get_by_id_asignado_concesionario($id)
    {
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion,vehiculos.idconcesinario,vehiculos.idconductor, vehiculos.clave,estatus.descripcion ,concesionario.nombre,concesionario.ape_pat,concesionario.ape_mat FROM vehiculos,estatus,concesionario WHERE estatus.clave=vehiculos.clave and vehiculos.idconcesinario=concesionario.idconcesinario  and vehiculos.clave='AS' AND vehiculos.idvehiculo=". $id)->row();
    }
     function get_by_id_informacion_completa($id)
    {
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion,vehiculos.idconcesinario, vehiculos.idconductor,conductor.nombre_conductor,conductor.ap_conductor,conductor.am_conductor, vehiculos.clave,estatus.descripcion,concesionario.nombre,concesionario.ape_pat,concesionario.ape_mat  FROM vehiculos,estatus,concesionario,conductor WHERE estatus.clave=vehiculos.clave and vehiculos.clave='IC' AND vehiculos.idconcesinario=concesionario.idconcesinario and vehiculos.idconductor=conductor.idconductor and vehiculos.idvehiculo=". $id)->row();
    }
    
    // get total rows
    function total_rows($q = NULL) {
        
	$this->db->or_like('niv', $q);
	
	$this->db->from($this->table);
        return $this->db->count_all_results();
    }

    // get data with limit and search
    function get_limit_data($limit, $start = 0, $q = NULL) {
        $this->db->order_by($this->id, $this->order);
        
	$this->db->or_like('niv', $q);
	
	$this->db->limit($limit, $start);
        return $this->db->get($this->table)->result();
    }

    // insert data
    function insert($data)
    {
        $this->db->insert($this->table, $data);
    }

    // update data
    function update($id, $data)
    {
        $this->db->where($this->id, $id);
        $this->db->update($this->table, $data);
    }

    // delete data
    function delete($id)
    {
        $this->db->where($this->id, $id);
        $this->db->delete($this->table);
    }

    function status_conductor($id)
    {
        $this->db->query("UPDATE conductor SET clave='AS' WHERE idconductor=".$id);
        
    }

    
function get_all_RESPALDO()
    {
        $this->db->order_by($this->id, $this->order);
        return  $this->db->query("SELECT vehiculos.idvehiculo,vehiculos.placa,vehiculos.niv,vehiculos.numeroeconomico,vehiculos.marca,vehiculos.modelo,vehiculos.tarjetacirculacion, vehiculos.clave,estatus.descripcion,concesionario.idconcesinario,concesionario.nombre,concesionario.ape_pat,concesionario.ape_mat,conductor.idconductor,conductor.nombre_conductor,conductor.ap_conductor,conductor.am_conductor FROM `vehiculos`,concesionario,conductor,estatus WHERE estatus.clave=vehiculos.clave and concesionario.idconcesinario= vehiculos.idconcesinario and conductor.idconductor=vehiculos.idconductor ")->result();
    }

}

/* End of file Vehiculos_model.php */
/* Location: ./application/models/Vehiculos_model.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-17 17:13:17 */
/* http://harviacode.com */