<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Vehiculos extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Vehiculos_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library(  array('session','ion_auth' ));
        # valida si se encuentra la sesion activa para entrar a la primera pantalla del sistema 
        $this->lang->load('auth');
    }

    public function index()
    {
        $vehiculos = $this->Vehiculos_model->get_all();

        $data = array(
            'vehiculos_data' => $vehiculos
        );
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view('guest/menuA');
        $this->load->view('vehiculos/vehiculos_list', $data);
        $this->load->view('guest/footer');
    }

    public function espera()
    {
       $vehiculos = $this->Vehiculos_model->get_all_espera();
        $data = array(
            'vehiculos_data' => $vehiculos
        );
        
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view('guest/menuA');
        $this->load->view('vehiculos/vehiculos_list', $data);
        $this->load->view('guest/footer');        
    }
     public function validado()
    {
       $vehiculos = $this->Vehiculos_model->get_all_validado();
        $data = array(
            'vehiculos_data' => $vehiculos
        );
        
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view('guest/menuA');
        $this->load->view('vehiculos/vehiculos_list_validado', $data);
        $this->load->view('guest/footer');        
    }
    public function activo()
    {
       $vehiculos = $this->Vehiculos_model->get_all_activo();
        $data = array(
            'vehiculos_data' => $vehiculos
        );
        
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view('guest/menuA');
        $this->load->view('vehiculos/vehiculos_list', $data);
        $this->load->view('guest/footer');

        
    }
    public function asignado_concesionario()
    {
       $vehiculos = $this->Vehiculos_model->get_all_asignado_concesionario();
        $data = array(
            'vehiculos_data' => $vehiculos
        );
        
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view('guest/menuA');
        $this->load->view('vehiculos/vehiculos_list_asignado_concesionario', $data);
        $this->load->view('guest/footer');

        
    }
    public function inactivo()
    {
       $vehiculos = $this->Vehiculos_model->get_all_inactivo();
        $data = array(
            'vehiculos_data' => $vehiculos
        );
        
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view('guest/menuA');
        $this->load->view('vehiculos/vehiculos_list', $data);
        $this->load->view('guest/footer');

        
    }



    public function read($id) 
    {
        $row = $this->Vehiculos_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idvehiculo' => $row->idvehiculo,
		'placa' => $row->placa,
		'niv' => $row->niv,
		'numeroeconomico' => $row->numeroeconomico,
		'marca' => $row->marca,
		'modelo' => $row->modelo,
		'tarjetacirculacion' => $row->tarjetacirculacion,
        'clave' => $row->clave,
        'descripcion' => $row->descripcion,
	    );
            $this->load->view('vehiculos/vehiculos_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Registro no encontrado');
            redirect(site_url('vehiculos'));
        }
    }
     public function read_validado($id) 
    {
        $row = $this->Vehiculos_model->get_by_id_validado($id);
        if ($row) {
            $data = array(
        'idvehiculo' => $row->idvehiculo,
        'placa' => $row->placa,
        'niv' => $row->niv,
        'numeroeconomico' => $row->numeroeconomico,
        'idconcesinario' => $row->idconcesinario,
        'marca' => $row->marca,
        'modelo' => $row->modelo,
        'tarjetacirculacion' => $row->tarjetacirculacion,
        'clave' => $row->clave,
        'descripcion' => $row->descripcion,
        );
            $this->load->view('vehiculos/vehiculos_read_validado', $data);
        } else {
            $this->session->set_flashdata('message', 'Registro no encontrado');
            redirect(site_url('vehiculos'));
        }
    }

    public function create() 
    {
         $datos['arrProfesiones'] = $this->Vehiculos_model->get_clave();
        $data = array(
            'button' => 'Create',
            'action' => site_url('vehiculos/create_action'),
	    'idvehiculo' => set_value('idvehiculo'),
	    'placa' => set_value('placa'),
	    'niv' => set_value('niv'),
	    'numeroeconomico' => set_value('numeroeconomico'),
	    'marca' => set_value('marca'),
	    'modelo' => set_value('modelo'),
	    'tarjetacirculacion' => set_value('tarjetacirculacion'),
	    'idconcesinario' => set_value('idconcesinario'),
	    'idconductor' => set_value('idconductor'),
	    'clave' => set_value('clave'),
        'arrProfesiones' => $this->Vehiculos_model->get_clave(),
	);
        $this->load->view('vehiculos/vehiculos_form', $data);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'placa' => $this->input->post('placa',TRUE),
		'niv' => $this->input->post('niv',TRUE),
		'numeroeconomico' => $this->input->post('numeroeconomico',TRUE),
		'marca' => $this->input->post('marca',TRUE),
		'modelo' => $this->input->post('modelo',TRUE),
		'tarjetacirculacion' => $this->input->post('tarjetacirculacion',TRUE),
		'idconcesinario' => $this->input->post('idconcesinario',TRUE),
		'idconductor' => $this->input->post('idconductor',TRUE),
		'clave' => $this->input->post('clave',TRUE),
	    );

            $this->Vehiculos_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('vehiculos'));
        }
    }
    
    public function update($id) 
    {   
        
        $row = $this->Vehiculos_model->get_by_id($id);
        //$conductor_status = $this->Vehiculos_model->status_conductor($row->idconductor);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('vehiculos/update_action'),
		'idvehiculo' => set_value('idvehiculo', $row->idvehiculo),
		'placa' => set_value('placa', $row->placa),
		'niv' => set_value('niv', $row->niv),
		'numeroeconomico' => set_value('numeroeconomico', $row->numeroeconomico),
       	'marca' => set_value('marca', $row->marca),
		'modelo' => set_value('modelo', $row->modelo),
		'tarjetacirculacion' => set_value('tarjetacirculacion', $row->tarjetacirculacion),
        'clave' => set_value('clave', $row->clave),
        'arrProfesiones' => $this->Vehiculos_model->get_clave(),
        'descripcion' => set_value('descripcion', $row->descripcion),
	    );
            $this->load->view('vehiculos/vehiculos_form', $data);
        } else {
            $this->session->set_flashdata('message', 'Registro no encontrado');
            redirect(site_url('vehiculos/espera'));
        }
    }
    public function update_validado($id) 
    {   
        
        $row = $this->Vehiculos_model->get_by_id_validado($id);
        //$conductor_status = $this->Vehiculos_model->status_conductor($row->idconductor);
        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('vehiculos/update_action_validado'),
        'idvehiculo' => set_value('idvehiculo', $row->idvehiculo),
        'placa' => set_value('placa', $row->placa),
        'niv' => set_value('niv', $row->niv),
        'numeroeconomico' => set_value('numeroeconomico', $row->numeroeconomico),
        'arrConcesioario' => $this->Vehiculos_model->get_concesionario(),
        'idconcesinario' => set_value('idconcesinario', $row->idconcesinario),
        'nombre' => set_value('nombre', $row->nombre),
        'ape_pat' => set_value('ape_pat', $row->ape_pat),
        'ape_mat' => set_value('ape_mat', $row->ape_mat),
        'marca' => set_value('marca', $row->marca),
        'modelo' => set_value('modelo', $row->modelo),
        'tarjetacirculacion' => set_value('tarjetacirculacion', $row->tarjetacirculacion),
        'clave' => set_value('clave', $row->clave),
        'arrProfesiones' => $this->Vehiculos_model->get_clave(),
        'descripcion' => set_value('descripcion', $row->descripcion),
        );
            $this->load->view('vehiculos/vehiculos_form_validado', $data);
        } else {
            $this->session->set_flashdata('message', 'Registro no encontrado');
            redirect(site_url('vehiculos/validado'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idvehiculo', TRUE));
        } else {
            $data = array(
		'placa' => $this->input->post('placa',TRUE),
		'niv' => $this->input->post('niv',TRUE),
		'numeroeconomico' => $this->input->post('numeroeconomico',TRUE),

		'marca' => $this->input->post('marca',TRUE),
		'modelo' => $this->input->post('modelo',TRUE),
		'tarjetacirculacion' => $this->input->post('tarjetacirculacion',TRUE),
		'clave' => $this->input->post('clave',TRUE),
	    );

            $this->Vehiculos_model->update($this->input->post('idvehiculo', TRUE), $data);
            $this->session->set_flashdata('message', 'Registro actualizado con Éxito');
            redirect(site_url('vehiculos/espera'));
        }
    }
    public function update_action_validado() 
    {
        $this->_rules_validado();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idvehiculo', TRUE));
        } else {
            $data = array(
        'placa' => $this->input->post('placa',TRUE),
        'niv' => $this->input->post('niv',TRUE),
        'numeroeconomico' => $this->input->post('numeroeconomico',TRUE),
        'idconcesinario' => $this->input->post('idconcesinario',TRUE),
        'marca' => $this->input->post('marca',TRUE),
        'modelo' => $this->input->post('modelo',TRUE),
        'tarjetacirculacion' => $this->input->post('tarjetacirculacion',TRUE),
        'clave' => $this->input->post('clave',TRUE),
        );

            $this->Vehiculos_model->update($this->input->post('idvehiculo', TRUE), $data);
            $this->session->set_flashdata('message', 'Registro actualizado con Éxito');
            redirect(site_url('vehiculos/validado'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Vehiculos_model->get_by_id($id);

        if ($row) {
            $this->Vehiculos_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('vehiculos'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('vehiculos'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('placa', 'placa', 'trim|required');
	$this->form_validation->set_rules('niv', 'niv', 'trim|required');
	$this->form_validation->set_rules('numeroeconomico', 'numeroeconomico', 'trim|required');
	$this->form_validation->set_rules('marca', 'marca', 'trim|required');
	$this->form_validation->set_rules('modelo', 'modelo', 'trim|required');
	$this->form_validation->set_rules('tarjetacirculacion', 'tarjetacirculacion', 'trim|required');
	$this->form_validation->set_rules('clave', 'clave', 'trim|required');
	$this->form_validation->set_rules('idvehiculo', 'idvehiculo', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }
    public function _rules_validado() 
    {
    $this->form_validation->set_rules('placa', 'placa', 'trim|required');
    $this->form_validation->set_rules('niv', 'niv', 'trim|required');
    $this->form_validation->set_rules('numeroeconomico', 'numeroeconomico', 'trim|required');
    $this->form_validation->set_rules('idconcesinario', 'idconcesinario', 'trim|required');
    $this->form_validation->set_rules('marca', 'marca', 'trim|required');
    $this->form_validation->set_rules('modelo', 'modelo', 'trim|required');
    $this->form_validation->set_rules('tarjetacirculacion', 'tarjetacirculacion', 'trim|required');
    $this->form_validation->set_rules('idvehiculo', 'idvehiculo', 'trim');   
    $this->form_validation->set_rules('clave', 'clave', 'trim|required');   
    $this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "vehiculos.xls";
        $judul = "vehiculos";
        $tablehead = 0;
        $tablebody = 1;
        $nourut = 1;
        //penulisan header
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control: must-revalidate, post-check=0,pre-check=0");
        header("Content-Type: application/force-download");
        header("Content-Type: application/octet-stream");
        header("Content-Type: application/download");
        header("Content-Disposition: attachment;filename=" . $namaFile . "");
        header("Content-Transfer-Encoding: binary ");

        xlsBOF();

        $kolomhead = 0;
        xlsWriteLabel($tablehead, $kolomhead++, "No");
	xlsWriteLabel($tablehead, $kolomhead++, "Placa");
	xlsWriteLabel($tablehead, $kolomhead++, "Niv");
	xlsWriteLabel($tablehead, $kolomhead++, "Numeroeconomico");
	xlsWriteLabel($tablehead, $kolomhead++, "Marca");
	xlsWriteLabel($tablehead, $kolomhead++, "Modelo");
	xlsWriteLabel($tablehead, $kolomhead++, "Tarjetacirculacion");
	xlsWriteLabel($tablehead, $kolomhead++, "Idconcesinario");
	xlsWriteLabel($tablehead, $kolomhead++, "Idconductor");
	xlsWriteLabel($tablehead, $kolomhead++, "Clave");

	foreach ($this->Vehiculos_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->placa);
	    xlsWriteLabel($tablebody, $kolombody++, $data->niv);
	    xlsWriteLabel($tablebody, $kolombody++, $data->numeroeconomico);
	    xlsWriteLabel($tablebody, $kolombody++, $data->marca);
	    xlsWriteLabel($tablebody, $kolombody++, $data->modelo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->tarjetacirculacion);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idconcesinario);
	    xlsWriteNumber($tablebody, $kolombody++, $data->idconductor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->clave);

	    $tablebody++;
            $nourut++;
        }

        xlsEOF();
        exit();
    }

    public function word()
    {
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition: attachment;Filename=vehiculos.doc");

        $data = array(
            'vehiculos_data' => $this->Vehiculos_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('vehiculos/vehiculos_doc',$data);
    }

}

/* End of file Vehiculos.php */
/* Location: ./application/controllers/Vehiculos.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-17 17:13:17 */
/* http://harviacode.com */