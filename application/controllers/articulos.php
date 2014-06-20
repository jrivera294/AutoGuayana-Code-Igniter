<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Articulos extends CI_Controller{

    public function __construct(){
        parent::__construct();
        $this->load->model('Articulos_model');
        $this->load->library('pagination');
    }

      public function index()
      {
        $query = $this->Articulos_model->getArticulos();
        $data['articulos'] = $query;
        $this->load->view('layouts/header');
        $this->load->view('stock/articulos_view',$data);
        $this->load->view('layouts/footer');
      }


    //carga la vista de registrar articulos
    public function cargarRegistroArticulos(){
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroArticulos_view');
        $this->load->view('layouts/footer');
    }

    /*public function registrarArticulo(){
        $articulo =array(
            'id' => $this->input->post('id'),
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'descripcion' => $this->input->post('descripcion'),
            'modelo' => $this->input->post('modelo'),
            'fabricante' => $this->input->post('fabricante'),
        );

        $result = $this->Stock_model->addArticulo($articulo);
        $this->load->view('layouts/header');
        $this->load->view('stock/articulos_view');
        $this->load->view('layouts/footer');
    }*/

    //introducir los articulos ingresados
    public function registrarArticulo(){
        $articulo = array(
            'id' => $this->input->post('id'),
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'descripcion' => $this->input->post('descripcion'),
            'modelo' => $this->input->post('modelo'),
            'fabricante' => $this->input->post('fabricante')
        );
        echo $articulo['descripcion'];
        echo $articulo['precio'];

        $result = $this->Articulos_model->addArticulo($articulo);
        $data['message_type']=1;
        $data['message']="Articulo registrado satisfactoriamente";
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/registroArticulos_view');
        $this->load->view('layouts/footer');
    }

    //cargaba la vista de gestion articulos

    public function cargarGestionArticulos(/*$actualizacion*/){
        $query = $this->Articulos_model->getArticulos();
        $data['articulos'] = $query;
        /*if ($actualizacion==1){
            $data['message_type']=1;
            $data['message']="Articulo actualizado satisfactoriamente";
        }*/
        $this->load->view('layouts/header',$data);
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/gestionArticulos_view');
        $this->load->view('layouts/footer');
    }

    public function cargarEdicionArticulos(){
        $act=1;
        $articulo = array(
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'descripcion' => $this->input->post('descripcion'),
            'modelo' => $this->input->post('modelo'),
            'fabricante' => $this->input->post('fabricante'),
            'id' => $this->input->post('id')
        );
        $data['articulos']=$articulo;
        /* echo "articulo".  $articulo['precio' ];
         echo "articulo".  $articulo[   'stock' ];
         echo "articulo".  $articulo[   'descripcion'];
         echo "articulo".  $articulo[   'modelo' ];
         echo "articulo".  $articulo[   'fabricante'];*/
       /* $result = $this->Admin_model->updateArticulo($articulo,$this->input->post('id'));
        $data['message_type']=1;
        $data['message']="Articulo Actualizado satisfactoriamente";*/
        $this->load->view('layouts/header');
        $this->load->view('layouts/adminSidebar');
        $this->load->view('admin/edicionArticulos_view',$data);
        $this->load->view('layouts/footer');
    }

    public function editarArticulo(){
        $articulo = array(
            'precio' => $this->input->post('precio'),
            'stock' => $this->input->post('stock'),
            'descripcion' => $this->input->post('descripcion'),
            'modelo' => $this->input->post('modelo'),
            'fabricante' => $this->input->post('fabricante'),
            'id' => $this->input->post('id')
        );
        $data['articulos']=$articulo;
        /* echo "articulo".  $articulo['precio' ];
         echo "articulo".  $articulo[   'stock' ];
         echo "articulo".  $articulo[   'descripcion'];
         echo "articulo".  $articulo[   'modelo' ];
         echo "articulo".  $articulo[   'fabricante'];*/
        $result = $this->Articulos_model->updateArticulo($articulo);

        $data['message_type']=1;
        $data['message']="Articulo Actualizado satisfactoriamente";
       $this->cargarGestionArticulos();
    }

     public function getArticuloFactura(){
        $id= $this->input->post('id_articulo');
        $query = $this->Articulos_model->getArticuloById($id);
        echo json_encode($query);
    }
}

?>
