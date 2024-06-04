<?php
class Products extends CI_Controller {
    public function __construct() {
        parent::__construct();
        $this->load->model('product_model');
        $this->load->library('session');
    }
    


    // Read all products
    
    public function index() {
        $data['products'] = $this->product_model->get_products();
        $this->load->view('index', $data);
    }



    // Create a new product
    public function create() {
        // Load form validation library
        $this->load->library('form_validation');

        // Set validation rules
        $this->form_validation->set_rules('name', 'Name', 'required');
        $this->form_validation->set_rules('discription', 'Discription', 'required');

        if ($this->form_validation->run() == FALSE) {
            // Form validation failed, redirect back to the form with validation errors
            $this->load->view('create');
            
        } else {
            // Form validation passed, proceed with creating the product
            $data = array(
                'name' => $this->input->post('name'),
                'discription' => $this->input->post('discription')
            );
            // Handle file upload
            if (isset($_FILES['image']) && $_FILES['image']['error'] == 0) {
                $upload_path = 'uploads/profile_images/';
                
                if (!is_dir($upload_path)) {
                    mkdir($upload_path, 0777, true);
                }
                $file_name = basename($_FILES['image']['name']);
                
                $file_tmp = $_FILES['image']['tmp_name'];
                $file_path = $upload_path . $file_name . '_' . time();
                if (move_uploaded_file($file_tmp, $file_path)) {
                    $data['Image'] = $file_path;  // Assign the file path to 'image' column
                    // print_r($file_path);
                    // die();
                } else {
                    $data['upload_error'] = 'Failed to move uploaded file.';
                }
            }
            
            
            
            $this->product_model->create_product($data);
            redirect('products');            
        }
    }
    
    
    public function update($id) {
        // Get the product details based on the $id
        $data['product'] = $this->product_model->get_product_by_id($id);
    
        // Load the update view and pass the product details to it
        $this->load->view('update', $data);
    }

    // Perform product update
public function perform_update($id) {
    // Update the product details in the database
    $data = array(
        'name' => $this->input->post('name'),
        'discription' => $this->input->post('discription')
    );

    $this->product_model->update_product($id, $data);

    // Redirect back to the index page with a success message
    $this->session->set_flashdata('success_message', 'Product updated successfully');
    redirect('products');
}

    // Delete a product
    public function delete($id) {
        $this->product_model->delete_product($id);

        $this->session->set_flashdata('success_message', 'Product deleted successfully');
    redirect('products');

    }

    public function home() {
        $this->load->view('home');
    }   
    public function details($product_id) {
        $product = $this->product_model-> get_product_by_id($product_id);
        if (!$product) {
            show_404();
        }
    
        $data['product'] = $product;
        $this->load->view('details', $data);
    }
}

?>
