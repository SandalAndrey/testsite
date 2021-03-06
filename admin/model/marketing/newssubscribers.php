<?php
class ModelMarketingnewssubscribers extends Model {
	public function check_db(){
		 $this->db->query("CREATE TABLE IF NOT EXISTS " . DB_PREFIX . "subscribe (
		  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
		  `email_id` varchar(225) NOT NULL,
		  `name` varchar(225) NOT NULL,
		  PRIMARY KEY (`id`),
		  UNIQUE KEY `Index_2` (`email_id`)
		) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT AUTO_INCREMENT=1 ;");
	}
	
	public function addEmail($data) {
		$this->db->query("INSERT INTO " . DB_PREFIX . "subscribe SET email_id='".$data['email_id']."', name='".$data['email_name']."'");
	}
	
	public function editEmail($id, $data) {
		$this->db->query("UPDATE " . DB_PREFIX . "subscribe SET email_id='".$data['email_id']."', name='".$data['email_name']."' WHERE id = '" . (int)$id . "'");
	}
	
	public function deleteEmail($id) {
		$this->db->query("DELETE FROM " . DB_PREFIX . "subscribe WHERE id = '" . (int)$id . "'");
	}
	
	public function getEmail($id) {
		$query = $this->db->query("SELECT  * FROM " . DB_PREFIX . "subscribe WHERE id = '" . (int)$id . "'");

		return $query->row;
	}
	
	public function getEmails($data,$start,$limit) {
		$sql = "SELECT * FROM " . DB_PREFIX . "subscribe  LIMIT $start,$limit";
			
		$query = $this->db->query($sql);
		
		return $query->rows;
	}
	
	public function exportEmails() {
		$this->check_db();
		
		$sql = "SELECT name,email_id FROM " . DB_PREFIX . "subscribe";
			
		$query = $this->db->query($sql);
		
		return $query->rows;
	}

	public function getTotalEmails($data) {
		$this->check_db();
		
		$sql = "SELECT * FROM " . DB_PREFIX . "subscribe";
			
		$query = $this->db->query($sql);
		
		return $query->num_rows;
	}
	
	public function checkmail($data,$id=FALSE) {
	  
		if ($id) {
			$sql = "SELECT * FROM " . DB_PREFIX . "subscribe WHERE email_id='".$data."' AND id!='".$id."'";
		} else {	
			$sql = "SELECT * FROM " . DB_PREFIX . "subscribe WHERE email_id='".$data."'";
		}
		
		$query = $this->db->query($sql);
		
		return $query->num_rows;
	}
}