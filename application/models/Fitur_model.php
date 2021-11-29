<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Fitur_model extends CI_Model {
    
        //menambahkan fitur baru
        public function add_fitur($data)
        {
            $this->db->insert('fitur', $data);
        }

        //mengupdate data fitur
        public function update_fitur($data, $id)
        {
            $this->db->where('id_fitur', $id);
            $this->db->update('fitur', $data);
        }

        //mengahpus data fitur
        public function dalete_fitur($id)
        {
            $this->db->where('id_fitur', $id);
            $this->db->delete('fitur');
        }
    
    }
    
    /* End of file ModelName.php */
    
?>
