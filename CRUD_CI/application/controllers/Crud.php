<?php

class Crud extends CI_Controller
{
    public function index()
    {
        $data['users_data'] = $this->Crud_model->usersData();
        $this->load->view('crud_view', $data);
        $this->load->model('Crud_model', 'ar');

        // $config['base_url'] = 'Crud/index/';
        // $config['total_rows'] = $this->ar->num_rows();
        // $config['per_page'] = 10;
    }
    public function addUsers(){
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');
        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>');

        if ($this->form_validation->run()) {
            
            $result = $this->Crud_model->insertData([
                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'address' => $this->input->post('address')
            ]);
            if ($result) {
                # code...
                $this->session->set_flashdata('inserted', 'Data Successfully Inserted');
            }
        } else {
            $data_error = ['error' => validation_errors()];
            $this->session->set_flashdata($data_error);
            
        }
        redirect('Crud');
    }

    public function editData($id){
        $data['singleData'] = $this->Crud_model->editUserData($id);

        $this->load->view('edit_view', $data);

    }

    public function update($id){
      
        $this->form_validation->set_rules('name', 'Full Name', 'required');
        $this->form_validation->set_rules('designation', 'Designation', 'required');
        $this->form_validation->set_rules('address', 'Address', 'required');

        if ($this->form_validation->run()) {
            
            $result = $this->Crud_model->updateData([

                'name' => $this->input->post('name'),
                'designation' => $this->input->post('designation'),
                'address' => $this->input->post('address')

            ], $id);
            if ($result) {
                # code...
                $this->session->set_flashdata('updated', 'Data Successfully Updated');
            }
        } else { 
            $data_error = ['error' => validation_errors()];
            $this->session->set_flashdata($data_error);
            
        }
        redirect('Crud');
    }

    public function deleteData($id){
        // echo $id;
        $result = $this->Crud_model->deleteUserData($id);
        if ($result == true) {
            # code...
            $this->session->set_flashdata('deleted', 'Data Deleted!!');
        }
        redirect('Crud');
    }
}
