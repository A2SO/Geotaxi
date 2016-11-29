<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Conductor extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Conductor_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library(  array('session','ion_auth' ));
        # valida si se encuentra la sesion activa para entrar a la primera pantalla del sistema 
        $this->lang->load('auth');
    }

    public function index()
    {
        $conductor = $this->Conductor_model->get_all();

        $data = array(
            'conductor_data' => $conductor
        );
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view('guest/menuA');
        $this->load->view('conductor/conductor_list', $data);
        $this->load->view('guest/footer');
    }

    public function read($id) 
    {
        $row = $this->Conductor_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idconductor' => $row->idconductor,
		'nombre_conductor' => $row->nombre_conductor,
		'ap_conductor' => $row->ap_conductor,
		'am_conductor' => $row->am_conductor,
		'correo_conductor' => $row->correo_conductor,
		'contrasena' => $row->contrasena,
		'push_c' => $row->push_c,
		'permisoconducir' => $row->permisoconducir,
		'iniciohorario' => $row->iniciohorario,
		'finhorario' => $row->finhorario,
		'latitud' => $row->latitud,
		'longitud' => $row->longitud,
		'clave' => $row->clave,
        'descripcion' => $row->descripcion,
	    );
            $this->load->view('conductor/conductor_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('conductor'));
        }
    }

    public function create() 
    {
        $datos['arrProfesiones'] = $this->Conductor_model->get_clave();
        $data = array(
            'button' => 'Create',
            'action' => site_url('conductor/create_action'),
	    'idconductor' => set_value('idconductor'),
	    'nombre_conductor' => set_value('nombre_conductor'),
	    'ap_conductor' => set_value('ap_conductor'),
	    'am_conductor' => set_value('am_conductor'),
	    'correo_conductor' => set_value('correo_conductor'),
	    'contrasena' => set_value('contrasena'),
	    'push_c' => set_value('push_c'),
	    'permisoconducir' => set_value('permisoconducir'),
	    'iniciohorario' => set_value('iniciohorario'),
	    'finhorario' => set_value('finhorario'),
	    'latitud' => set_value('latitud'),
	    'longitud' => set_value('longitud'),
	    'clave' => set_value('clave'),
        'arrProfesiones' => $this->Conductor_model->get_clave(),
    );

        $this->load->view('conductor/conductor_form', $data,$datos);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nombre_conductor' => $this->input->post('nombre_conductor',TRUE),
		'ap_conductor' => $this->input->post('ap_conductor',TRUE),
		'am_conductor' => $this->input->post('am_conductor',TRUE),
		'correo_conductor' => $this->input->post('correo_conductor',TRUE),
		'contrasena' => $this->input->post('contrasena',TRUE),
		'push_c' => $this->input->post('push_c',TRUE),
		'permisoconducir' => $this->input->post('permisoconducir',TRUE),
		'iniciohorario' => $this->input->post('iniciohorario',TRUE),
		'finhorario' => $this->input->post('finhorario',TRUE),
		'latitud' => $this->input->post('latitud',TRUE),
		'longitud' => $this->input->post('longitud',TRUE),
		'clave' => $this->input->post('clave',TRUE),
	    );

            $this->Conductor_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('conductor'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Conductor_model->get_by_id($id);
        $datos['arrProfesiones'] = $this->Conductor_model->get_clave();


        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('conductor/update_action'),
		'idconductor' => set_value('idconductor', $row->idconductor),
		'nombre_conductor' => set_value('nombre_conductor', $row->nombre_conductor),
		'ap_conductor' => set_value('ap_conductor', $row->ap_conductor),
		'am_conductor' => set_value('am_conductor', $row->am_conductor),
		'correo_conductor' => set_value('correo_conductor', $row->correo_conductor),
		'contrasena' => set_value('contrasena', $row->contrasena),
		'push_c' => set_value('push_c', $row->push_c),
		'permisoconducir' => set_value('permisoconducir', $row->permisoconducir),
		'iniciohorario' => set_value('iniciohorario', $row->iniciohorario),
		'finhorario' => set_value('finhorario', $row->finhorario),
		'latitud' => set_value('latitud', $row->latitud),
		'longitud' => set_value('longitud', $row->longitud),
		'clave' => set_value('clave', $row->clave),
        'arrProfesiones' => $this->Conductor_model->get_clave(),
        'descripcion' => set_value('descripcion', $row->descripcion),
	    );
            $this->load->view('conductor/conductor_form', $data,$datos);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('conductor'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idconductor', TRUE));
        } else {
            $data = array(
		'nombre_conductor' => $this->input->post('nombre_conductor',TRUE),
		'ap_conductor' => $this->input->post('ap_conductor',TRUE),
		'am_conductor' => $this->input->post('am_conductor',TRUE),
		'correo_conductor' => $this->input->post('correo_conductor',TRUE),
		'contrasena' => $this->input->post('contrasena',TRUE),
		'push_c' => $this->input->post('push_c',TRUE),
		'permisoconducir' => $this->input->post('permisoconducir',TRUE),
		'iniciohorario' => $this->input->post('iniciohorario',TRUE),
		'finhorario' => $this->input->post('finhorario',TRUE),
		'latitud' => $this->input->post('latitud',TRUE),
		'longitud' => $this->input->post('longitud',TRUE),
		'clave' => $this->input->post('clave',TRUE),
	    );

            $this->Conductor_model->update($this->input->post('idconductor', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('conductor'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Conductor_model->get_by_id($id);

        if ($row) {
            $this->Conductor_model->delete($id);
            $this->session->set_flashdata('message', 'Delete Record Success');
            redirect(site_url('conductor'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('conductor'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nombre_conductor', 'nombre conductor', 'trim|required');
	$this->form_validation->set_rules('ap_conductor', 'ap conductor', 'trim|required');
	$this->form_validation->set_rules('am_conductor', 'am conductor', 'trim|required');
	$this->form_validation->set_rules('correo_conductor', 'correo conductor', 'trim|required');
	$this->form_validation->set_rules('contrasena', 'contrasena', 'trim|required');
	$this->form_validation->set_rules('push_c', 'push c', 'trim|required');
	$this->form_validation->set_rules('permisoconducir', 'permisoconducir', 'trim|required');
	$this->form_validation->set_rules('iniciohorario', 'iniciohorario', 'trim|required');
	$this->form_validation->set_rules('finhorario', 'finhorario', 'trim|required');
	$this->form_validation->set_rules('latitud', 'latitud', 'trim|required');
	$this->form_validation->set_rules('longitud', 'longitud', 'trim|required');
	$this->form_validation->set_rules('clave', 'clave', 'trim|required');

	$this->form_validation->set_rules('idconductor', 'idconductor', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "conductor.xls";
        $judul = "conductor";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nombre Conductor");
	xlsWriteLabel($tablehead, $kolomhead++, "Ap Conductor");
	xlsWriteLabel($tablehead, $kolomhead++, "Am Conductor");
	xlsWriteLabel($tablehead, $kolomhead++, "Correo Conductor");
	xlsWriteLabel($tablehead, $kolomhead++, "Contrasena");
	xlsWriteLabel($tablehead, $kolomhead++, "Push C");
	xlsWriteLabel($tablehead, $kolomhead++, "Permisoconducir");
	xlsWriteLabel($tablehead, $kolomhead++, "Iniciohorario");
	xlsWriteLabel($tablehead, $kolomhead++, "Finhorario");
	xlsWriteLabel($tablehead, $kolomhead++, "Latitud");
	xlsWriteLabel($tablehead, $kolomhead++, "Longitud");
	xlsWriteLabel($tablehead, $kolomhead++, "Clave");

	foreach ($this->Conductor_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nombre_conductor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ap_conductor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->am_conductor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->correo_conductor);
	    xlsWriteLabel($tablebody, $kolombody++, $data->contrasena);
	    xlsWriteLabel($tablebody, $kolombody++, $data->push_c);
	    xlsWriteLabel($tablebody, $kolombody++, $data->permisoconducir);
	    xlsWriteLabel($tablebody, $kolombody++, $data->iniciohorario);
	    xlsWriteLabel($tablebody, $kolombody++, $data->finhorario);
	    xlsWriteLabel($tablebody, $kolombody++, $data->latitud);
	    xlsWriteLabel($tablebody, $kolombody++, $data->longitud);
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
        header("Content-Disposition: attachment;Filename=conductor.doc");

        $data = array(
            'conductor_data' => $this->Conductor_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('conductor/conductor_doc',$data);
    }

}

/* End of file Conductor.php */
/* Location: ./application/controllers/Conductor.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-16 17:48:15 */
/* http://harviacode.com */