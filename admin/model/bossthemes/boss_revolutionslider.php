<?php
class ModelBossthemesBossRevolutionSlider extends Model {
	public function createdb(){
		$db_file = dirname(__FILE__) . '/boss_revolutionslider.sql';
		if (file_exists($db_file)) {
			$lines = file($db_file);
			
			$templine = '';
			foreach ($lines as $line){
				if (substr($line, 0, 2) == '--' || $line == '')
					continue;
				$templine .= $line;
				if (substr(trim($line), -1, 1) == ';'){
					$this->db->query(str_replace('oc_', DB_PREFIX, $templine));
					$templine = '';
				}
			}
		}
	}

	public function addSlide($data){
		$this->db->query("INSERT INTO " . DB_PREFIX . "btslider_slide SET slider_id = '" . (int)$data['slider_id'] . "', status = '" . (int)$data['status'] . "',slideset = '" . $data['slideset'] . "',caption = '" . $data['caption'] . "', sort_order = '" . (int)$data['sort_order'] . "'");
	}

	public function addSlide_New($slider_id,$data){

		$this->db->query("INSERT INTO " . DB_PREFIX . "btslider_slide SET slider_id = '" . (int)$slider_id . "', status = '" . (int)$data['status'] . "',slideset = '" . json_encode($data['slideset']) . "',caption = '" . $this->db->escape(json_encode($data['caption'])) . "', sort_order = '" . (int)$data['sort_order'] . "'");
	}

	public function editSlide($slide_id,$slider_id,$data){
		$this->db->query("UPDATE " . DB_PREFIX . "btslider_slide SET slider_id = '" . (int)$slider_id . "', slideset = '" . json_encode($data['slideset']) . "',caption = '" . $this->db->escape(json_encode($data['caption'])) . "', status = '" . (int)$data['status'] . "', sort_order = '" . (int)$data['sort_order'] . "' WHERE id = '" . (int)$slide_id . "'");
	}

	public function addSlider($data){

		$this->db->query("INSERT INTO " . DB_PREFIX . "btslider SET setting = '" . json_encode($data['setting']) . "'");

		$slider_id = $this->db->getLastId();

		return $slider_id;
	}

	public function getLastId(){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider s";

		$query = $this->db->query($sql);

		$slider_id = $this->db->getLastId();

		return $slider_id;
	}

	public function editSlider($slider_id,$data){

		$this->db->query("UPDATE " . DB_PREFIX . "btslider SET setting = '" . json_encode($data['setting']) . "' WHERE id = '" . (int)$slider_id . "'");
	}

	public function getModules($group, $store_id = 0){
		$data = array();

		$query = $this->db->query("SELECT * FROM " . DB_PREFIX . "setting WHERE store_id = '" . (int)$store_id . "' AND `group` = '" . $this->db->escape($group) . "'");

		foreach ($query->rows as $result) {
			if (!$result['serialized']) {
				$data[$result['key']] = $result['value'];
			} else {
				$data[$result['key']] = unserialize($result['value']);
			}
		}

		return $data;
	}

	public function getSliders(){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider s";

		$sql .= " GROUP BY s.id";

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function getSlider($slider_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider s WHERE s.id = '" . (int)$slider_id . "'";

		$sql .= " GROUP BY s.id";

		$query = $this->db->query($sql);

		return $query->row;
	}

	public function getSlide($slide_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider_slide ss WHERE ss.id = '" . (int)$slide_id . "'";

		$query = $this->db->query($sql);

		return $query->row;
	}

	public function getSlides($slider_id){
		$sql = "SELECT * FROM " . DB_PREFIX . "btslider_slide ss WHERE ss.slider_id = '" . (int)$slider_id . "'";

		$sql .= " GROUP BY ss.id";

		$sql .= " ORDER BY ss.sort_order";

		$query = $this->db->query($sql);

		return $query->rows;
	}

	public function copySlide($slide_id) {
		$query = $this->db->query("SELECT DISTINCT * FROM " . DB_PREFIX . "btslider_slide WHERE id = '" . (int)$slide_id . "'");

		if ($query->num_rows) {
			$data = array();

			$data = $query->row;
			$this->addSlide($data);
		}
	}

	public function deleteSlider($slider_id){
		$this->db->query("DELETE FROM " . DB_PREFIX . "btslider WHERE id = '" . (int)$slider_id . "'");
	}

	public function deleteSlide($slide_id){
		$this->db->query("DELETE FROM " . DB_PREFIX . "btslider_slide WHERE id = '" . (int)$slide_id . "'");
	}

	public function updateSortSlide($data){
		$count = 1;
		foreach ($data as $slide_id) {
			$query = "UPDATE " . DB_PREFIX . "btslider_slide SET sort_order = " . $count . " WHERE id = " . $slide_id;
			$this->db->query($query);
			$count ++;
		}
	}

	public function getTotalslidesBySliderId($slider_id) {
		$query = $this->db->query("SELECT COUNT(*) AS total FROM " . DB_PREFIX . "btslider_slide WHERE slider_id = '" . (int)$slider_id . "'");

		return $query->row['total'];
	}
}
?>