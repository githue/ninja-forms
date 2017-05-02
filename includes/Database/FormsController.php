<?php
final class NF_Database_FormsController
{
    private $db;
    private $factory;
    private $forms_data = array();
    
    public function __construct()
    {
        global $wpdb;
        $this->db = $wpdb;
        $this->forms_data = $this->setFormsData();
    }
    
    public function setFormsData()
    {
        $sql = "SELECT `id`, `title`, `created_at` FROM `{$this->db->prefix}nf3_forms`";
        $forms_data = $this->db->get_results( $sql, OBJECT_K );
        
        // Provided as array of
        // object {id => Str, title => Str, created_at => Str}
         
        return $forms_data;
    }
    
    public function getFormsData()
    {
        return(  array_values( $this->forms_data ) );
    }
}