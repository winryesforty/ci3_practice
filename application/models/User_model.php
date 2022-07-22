<?php

class User_model extends CI_Model {

        public $first_name;
        public $middle_name;
        public $last_name;
        public $street_address;
        public $city;
        public $zip_code;
        public $province;
        public $image_name;
        public $image_path;

        public function __construct()
        {
	        $this->load->database();
        }
        public function get_last_ten_entries()
        {
                $query = $this->db->get('user', 10);
                return $query->result();
        }
        public function getAllUser()
	{
		$query = $this->db->get('user');
                return $query->result();
	}
        public function get_user_by_id($id=NULL)
        {
                if($id!==NULL)
                {
                        return $this->db->get_where('user', array("id"=>$id))->result_array();
                }
        }

        public function insert_user()
        {
                $config['upload_path']          = './assets/images/';
                $config['allowed_types']        = 'gif|jpg|png|jfif';
                $config['max_size']             = 19000;
                $config['max_width']            = 1024;
                $config['max_height']           = 768;
                $config['file_name']           = $this->input->post('last_name').$this->input->post('first_name');

                $data = array(
                        'first_name'	=>	$this->input->post('first_name'), 
                        'middle_name'	=>	$this->input->post('middle_name'),
                        'last_name'	=>	$this->input->post('last_name'),
                        'street_address'=>	$this->input->post('street_address'),
                        'city'		=>	$this->input->post('city'),
                        'zip_code'	=>	$this->input->post('zip_code'),
                        'province'	=>	$this->input->post('province'),
                        'image_name'	=>	$config['file_name'].$config['file_ext'],
                        'image_path'	=>	$config['upload_path']
                );
                $this->db->insert('user', $data);
        }

        public function update_user()
        {
                if(!empty($_FILES['user_image']['name']) || $_FILES['user_image']['name']!=="")
                {
                        if($this->input->post('originalImageName')!=="" || !empty($this->input->post('originalImageName')))
                        {
                                unlink("./assets/images/".$this->input->post('originalImageName'));
                        }
                        
                        $config['upload_path']          = './assets/images/';
                        $config['allowed_types']        = 'gif|jpg|png|jfif';
                        $config['max_size']             = 19000;
                        $config['max_width']            = 5024;
                        $config['max_height']           = 5768;
                        $config['file_name']            = $this->input->post('last_name').$this->input->post('first_name');

                        $this->upload->initialize($config); 
                        if ( $this->upload->do_upload('user_image') )
                        {
                                $data = $this->upload->data();
                        
                                $this->image_name       = $data['file_name'];
                                $this->image_path       = $data['file_path'];
                        }
                        else
                        {
                                echo $this->upload->display_errors();
                                exit;
                        }
                }
                else{
                        $this->image_name         = $this->input->post('originalImageName');
                        $this->image_path         = $this->input->post('originalImagePath');
                }
                
                $this->first_name       = $this->input->post('first_name'); // please read the below note
                $this->middle_name      = $this->input->post('middle_name');
                $this->last_name        = $this->input->post('last_name');
                $this->street_address   = $this->input->post('street_address');
                $this->city             = $this->input->post('city');
                $this->zip_code         = $this->input->post('zip_code');
                $this->province         = $this->input->post('province');

                return $this->db->update('user', $this, array('id' => $this->input->post('id')));
        }
        public function delete_user($id=NULL)
        {
                if($id!==NULL)
                {
                        $user = $this->get_user_by_id($id);
                        // var_dump($user[0]['image_name']);
                        // exit;
                        unlink("./assets/images/".$user[0]['image_name']);

                        return $this->db->delete('user', array('id' => $id));
                }
        }

}
