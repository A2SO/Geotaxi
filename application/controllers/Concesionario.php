<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Concesionario extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('Concesionario_model');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->library(  array('session','ion_auth' ));
        # valida si se encuentra la sesion activa para entrar a la primera pantalla del sistema 
        $this->lang->load('auth');
    }

    public function index()
    {
        $concesionario = $this->Concesionario_model->get_all();

        $data = array(
            'concesionario_data' => $concesionario
        );
        $this->load->view('guest/head');
        $this->load->view('guest/nav');
        $this->load->view('guest/menuA');
        $this->load->view('concesionario/concesionario_list', $data);
        $this->load->view('guest/footer');
    }

    public function read($id) 
    {
        $row = $this->Concesionario_model->get_by_id($id);
        if ($row) {
            $data = array(
		'idconcesinario' => $row->idconcesinario,
		'nombre' => $row->nombre,
		'ape_pat' => $row->ape_pat,
		'ape_mat' => $row->ape_mat,
		'direccion' => $row->direccion,
		'telefono' => $row->telefono,
		'correo' => $row->correo,
		'contrasena' => $row->contrasena,
		'direccion_doc' => $row->direccion_doc,
		'clave' => $row->clave,
        'descripcion' => $row->descripcion
	    );
            $this->load->view('concesionario/concesionario_read', $data);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('concesionario'));
        }
    }

    public function create() 
    {
        $datos['arrProfesiones'] = $this->Concesionario_model->get_clave();
        $data = array(
            'button' => 'Create',
            'action' => site_url('concesionario/create_action'),
	    'idconcesinario' => set_value('idconcesinario'),
	    'nombre' => set_value('nombre'),
	    'ape_pat' => set_value('ape_pat'),
	    'ape_mat' => set_value('ape_mat'),
	    'direccion' => set_value('direccion'),
	    'telefono' => set_value('telefono'),
	    'correo' => set_value('correo'),
	    'contrasena' => set_value('contrasena'),
	    'direccion_doc' => set_value('direccion_doc'),
	    'clave' => set_value('clave'),
        'arrProfesiones' => $this->Concesionario_model->get_clave(),
	);
        $this->load->view('concesionario/concesionario_form', $data,$datos);
    }
    
    public function create_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->create();
        } else {
            $data = array(
		'nombre' => $this->input->post('nombre',TRUE),
		'ape_pat' => $this->input->post('ape_pat',TRUE),
		'ape_mat' => $this->input->post('ape_mat',TRUE),
		'direccion' => $this->input->post('direccion',TRUE),
		'telefono' => $this->input->post('telefono',TRUE),
		'correo' => $this->input->post('correo',TRUE),
		'contrasena' => $this->input->post('contrasena',TRUE),
		'direccion_doc' => $this->input->post('direccion_doc',TRUE),
		'clave' => $this->input->post('clave',TRUE),
	    );

            $this->Concesionario_model->insert($data);
            $this->session->set_flashdata('message', 'Create Record Success');
            redirect(site_url('concesionario'));
        }
    }
    
    public function update($id) 
    {
        $row = $this->Concesionario_model->get_by_id($id);
        $datos['arrProfesiones'] = $this->Concesionario_model->get_clave();

        if ($row) {
            $data = array(
                'button' => 'Update',
                'action' => site_url('concesionario/update_action'),
		'idconcesinario' => set_value('idconcesinario', $row->idconcesinario),
		'nombre' => set_value('nombre', $row->nombre),
		'ape_pat' => set_value('ape_pat', $row->ape_pat),
		'ape_mat' => set_value('ape_mat', $row->ape_mat),
		'direccion' => set_value('direccion', $row->direccion),
		'telefono' => set_value('telefono', $row->telefono),
		'correo' => set_value('correo', $row->correo),
		'contrasena' => set_value('contrasena', $row->contrasena),
		'direccion_doc' => set_value('direccion_doc', $row->direccion_doc),
		'clave' => set_value('clave', $row->clave),
        'arrProfesiones' => $this->Concesionario_model->get_clave(),
        'descripcion' => set_value('descripcion', $row->descripcion),
	    );
            $this->load->view('concesionario/concesionario_form', $data,$datos);
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('concesionario'));
        }
    }
    
    public function update_action() 
    {
        $this->_rules();

        if ($this->form_validation->run() == FALSE) {
            $this->update($this->input->post('idconcesinario', TRUE));
        } else {
            $data = array(
		'nombre' => $this->input->post('nombre',TRUE),
		'ape_pat' => $this->input->post('ape_pat',TRUE),
		'ape_mat' => $this->input->post('ape_mat',TRUE),
		'direccion' => $this->input->post('direccion',TRUE),
		'telefono' => $this->input->post('telefono',TRUE),
		'correo' => $this->input->post('correo',TRUE),
		'contrasena' => $this->input->post('contrasena',TRUE),
		'direccion_doc' => $this->input->post('direccion_doc',TRUE),
		'clave' => $this->input->post('clave',TRUE),
	    );

            $this->Concesionario_model->update($this->input->post('idconcesinario', TRUE), $data);
            $this->session->set_flashdata('message', 'Update Record Success');
            redirect(site_url('concesionario'));
        }
    }
    
    public function delete($id) 
    {
        $row = $this->Concesionario_model->get_by_id($id);

        if ($row) {
            $this->Concesionario_model->delete($id);
            $this->session->set_flashdata('message', 'Registro eliminado correctamente');
            redirect(site_url('concesionario'));
        } else {
            $this->session->set_flashdata('message', 'Record Not Found');
            redirect(site_url('concesionario'));
        }
    }

    public function _rules() 
    {
	$this->form_validation->set_rules('nombre', 'nombre', 'trim|required');
	$this->form_validation->set_rules('ape_pat', 'ape pat', 'trim|required');
	$this->form_validation->set_rules('ape_mat', 'ape mat', 'trim|required');
	$this->form_validation->set_rules('direccion', 'direccion', 'trim|required');
	$this->form_validation->set_rules('telefono', 'telefono', 'trim|required');
	$this->form_validation->set_rules('correo', 'correo', 'trim|required');
	$this->form_validation->set_rules('contrasena', 'contrasena', 'trim|required');
	$this->form_validation->set_rules('direccion_doc', 'direccion doc', 'trim|required');
	$this->form_validation->set_rules('clave', 'clave', 'trim|required');

	$this->form_validation->set_rules('idconcesinario', 'idconcesinario', 'trim');
	$this->form_validation->set_error_delimiters('<span class="text-danger">', '</span>');
    }

    public function excel()
    {
        $this->load->helper('exportexcel');
        $namaFile = "concesionario.xls";
        $judul = "concesionario";
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
	xlsWriteLabel($tablehead, $kolomhead++, "Nombre");
	xlsWriteLabel($tablehead, $kolomhead++, "Ape Pat");
	xlsWriteLabel($tablehead, $kolomhead++, "Ape Mat");
	xlsWriteLabel($tablehead, $kolomhead++, "Direccion");
	xlsWriteLabel($tablehead, $kolomhead++, "Telefono");
	xlsWriteLabel($tablehead, $kolomhead++, "Correo");
	xlsWriteLabel($tablehead, $kolomhead++, "Contrasena");
	xlsWriteLabel($tablehead, $kolomhead++, "Direccion Doc");
	xlsWriteLabel($tablehead, $kolomhead++, "Clave");

	foreach ($this->Concesionario_model->get_all() as $data) {
            $kolombody = 0;

            //ubah xlsWriteLabel menjadi xlsWriteNumber untuk kolom numeric
            xlsWriteNumber($tablebody, $kolombody++, $nourut);
	    xlsWriteLabel($tablebody, $kolombody++, $data->nombre);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ape_pat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->ape_mat);
	    xlsWriteLabel($tablebody, $kolombody++, $data->direccion);
	    xlsWriteNumber($tablebody, $kolombody++, $data->telefono);
	    xlsWriteLabel($tablebody, $kolombody++, $data->correo);
	    xlsWriteLabel($tablebody, $kolombody++, $data->contrasena);
	    xlsWriteLabel($tablebody, $kolombody++, $data->direccion_doc);
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
        header("Content-Disposition: attachment;Filename=concesionario.doc");

        $data = array(
            'concesionario_data' => $this->Concesionario_model->get_all(),
            'start' => 0
        );
        
        $this->load->view('concesionario/concesionario_doc',$data);
    }

}

/* End of file Concesionario.php */
/* Location: ./application/controllers/Concesionario.php */
/* Please DO NOT modify this information : */
/* Generated by Harviacode Codeigniter CRUD Generator 2016-11-15 18:44:19 */
/* http://harviacode.com */