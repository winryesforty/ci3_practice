<?php

public function edit_employee($id,$employee_number)
    {
        $this->form_validation->set_rules('employee_number', 'Employee Number', 'required|trim');

        if($this->form_validation->run() == FALSE)
        {
            $data['employee'] = $this->employee_model->get_employee($id);
            $data['children_infos'] = $this->employee_model->get_children_infos($employee_number);
            $data['academe_infos'] = $this->employee_model->get_academe_infos($employee_number);
            $data['departments'] = $this->employee_model->get_department();
            $data['companies'] = $this->employee_model->get_company();
            $data['ranks'] = $this->employee_model->get_rank();
            $data['statuss'] = $this->employee_model->get_employee_status();
            $data['groups'] = $this->employee_model->get_work_group();
            $data['categories'] = $this->master_file_model->get_category();
            $data['employee_positions'] = $this->master_file_model->get_employees_position();
            $data['main_content'] = 'hr/employee/edit';
            $this->load->view('inc/navbar', $data);
        }
        else
        {
            // GET PREVIOUS DATA.
            $employee = $this->employee_model->get_employee($id);
            $prevImage = $employee->picture;

            if(!empty($_FILES['image']['name'])){ 
                $imageName = $_FILES['image']['name']; 
                 
                // File upload configuration 
                $config['upload_path'] = './uploads/employee/';  
                $config['allowed_types'] = 'jpg|jpeg|png|gif'; 
                 
                // Load and initialize upload library 
                $this->load->library('upload', $config);  
                $this->upload->initialize($config); 

                if(!empty($prevImage) && !empty($imageName)){ 
                     // Remove old file from the server 
                    @unlink('./uploads/employee/'.$prevImage);  

                     // Upload file to server 
                     if($this->upload->do_upload('image')){ 
                        // Uploaded file data 
                        $fileData = $this->upload->data(); 
                        $imgData['file_name'] = $fileData['file_name']; 
                    
                    }else{ 
                        $error = $this->upload->display_errors();  
                    } 
                } 
                
            } 

            if($this->employee_model->update_employee($id,$employee_number))
            {
                $this->session->set_flashdata('success_msg', 'Employment Information Successfully Updated!');
                redirect('employee/index');
            }
        }    
    }