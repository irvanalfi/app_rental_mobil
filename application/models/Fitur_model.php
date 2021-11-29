<?php 
    
    defined('BASEPATH') OR exit('No direct script access allowed');
    
    class Fitur_model extends CI_Model {
    
        //menambahkan fitur baru
        public function add_fitur($data)
        {
            $this->db->insert('fitur', $data);
        }

        //mengupdate data fitur
        public function update_fitur()
        {
            $data = [
                "id_mobil"      => $this->input->post('id_mobil', true),
                "supir"         => $this->input->post('supir', true),
                "hrg_supir"     => $this->input->post('hrg_supir', true),
                "ac"            => $this->input->post('ac', true),
                "seat_belt"     => $this->input->post('seat_belt', true),
                "air"           => $this->input->post('air', true),
                "p3k"           => $this->input->post('p3k', true),
                "audio_input"   => $this->input->post('audio_input', true),
                "mp3_player"    => $this->input->post('mp3_player', true),
                "bluetooth"     => $this->input->post('bluetooth', true),
                "video"         => $this->input->post('video', true),
                "central_lock"  => $this->input->post('central_lock', true),
                "ban_serep"     => $this->input->post('ban_serep', true),
                "car_kit"       => $this->input->post('car_kit', true),
                "updated"       => date('Y-m-d H:i:s'),
                "updated_by"    => $this->session->userdata('nama')
            ];

            $this->db->where('id_fitur', $this->input->post('id_fitur'));
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
