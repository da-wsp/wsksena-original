<?php

class Model extends CI_Model {
	function __construct () {
		parent::__construct();
		$this->load->database();
	}

	/*
		List of tables
	*/
	function Tables_List () {
		$query = $this->db->query('SHOW TABLES');
		$data = $query->result_array();
		
		$tables = [];
		$i = 0;
		foreach ($data as &$val) {
			foreach ($val as &$table) {
				$tables[$i]['Name'] = $table;
				$tables[$i]['Count'] = $this->db->query("SELECT COUNT(*) FROM `$table`")->row_array()['COUNT(*)'];
				$tables[$i]['Columns'] = count($this->Columns_List($table));
			}
			$i++;
		}
		return $tables;
	}
	/*
		List of lists
	*/
	function Lists_List() {
		$query = $this->db->query('SELECT * FROM `Admin_Lists`');
		
		$lists = [];
		$i = 0;
		foreach ($query->result_array() as &$list) {
			$lists[$i] = $list;
			$i++;
		}
		return $lists;
	}
	/*
		Columns list
	*/
	function Columns_List ($table) {
		$query = $this->db->query("SHOW FULL COLUMNS FROM `$table`");
				
		$data = $query->result_array();
		foreach ($data as &$field) {
			$type = '';
			for ($i=0; $i < strlen($field['Type']); $i++) {
				if ($field['Type'][$i] != '(') {
					$type.=$field['Type']{$i};
				} else break;
			}
			
			if ($type == 'enum' || $type == 'set') {
				$field['Type_Args'] = [];
				$enum = substr($field['Type'],strlen($type));
				
				$tmp = explode("','",$enum); unset($enum);
				$tmp[0] = explode("('",$tmp[0])[1];
				$tmp[count($tmp)-1] = explode("')",$tmp[count($tmp)-1])[0];
				
				$field['Type_Args'] = $tmp;
			} else {
				
				$tmp = explode('(',$field['Type']);
				if (!empty($tmp[1]))
					$tmp = $tmp[1];
				else
					$tmp = null;
				$field['Type_Args'] = !empty($tmp)?explode(')',$tmp)[0]:$tmp;
			}
			$field['Type_Name'] = $type;
			$field['Default'] = !empty($field['Default'])?$field['Default']:'Null';
		}
		return $data;
	}

	/*
		Adding list
	*/
	function AddList (&$data) {
		$adding = isset($data['adding'])?'true':'false';
		$editing = isset($data['editing'])?'true':'false';
		$deleting = isset($data['deleting'])?'true':'false';
		
		$lists = 
		"INSERT INTO 
			`Admin_Lists`(`Name`,`Tbl`,`Adding`,`Editing`,`Deleting`)
		VALUES
			(".$this->db->escape($data['name']).",
			".$this->db->escape($data['table']).",
			'$adding',
			'$editing',
			'$deleting')";
		if ($this->db->query($lists)) {
			$list_id = $this->db->insert_id();
			$return = true;
			foreach ($data['names'] as $key=>&$field) {
				$showinlist = isset($data['showinlist'][$key])?'true':'false';
				$showinform = isset($data['showinform'][$key])?'true':'false';
				$columns = 
					"INSERT INTO 
						`Admin_Columns`(
							`Field`,`Name`,`Input`,`Max`,`Min`,
							`Step`,`SQLQuery`,`Regular`,`Def`,
							`SetEnum`,`ShowInList`,`ShowInForm`,`List_Id`,`Required`) 
					VALUES
						(".$this->db->escape($key).",
						".$this->db->escape($field).",
						".$this->db->escape($data['inputs'][$key]).",
						".$this->db->escape($data['max'][$key]).",
						".$this->db->escape($data['min'][$key]).",
						".$this->db->escape($data['step'][$key]).",
						".$this->db->escape($data['sqlquery'][$key]).",
						".$this->db->escape($data['regular'][$key]).",
						".$this->db->escape($data['def'][$key]).",
						".$this->db->escape($data['setenum'][$key]).",
						$showinlist,
						$showinform,
						$list_id,
						".(isset($data['required'])?'true':'false').")";
				if (!$this->db->query($columns))
					$return = false;
			}
			return $return;
		} else
			return false;

	}

	/*
		Deleting items
	*/

	public function delete($mode,...$identifiers) {
		$mode = ucfirst(mb_strtolower($mode));
		return $this->{'delete'.$mode}(...$identifiers);
	}

	private function deleteList (...$identifiers) {
		$query = "DELETE FROM `Admin_Lists` WHERE `Id` = $identifiers[0]";
		if ($this->db->query($query)) {
			$query = "DELETE FROM `Admin_Columns` WHERE `List_Id` = $identifiers[0]";
			if ($this->db->query($query))
				return true;
			else
				return false;
		} else
			return false;
	}

	private function deleteItem (...$identifiers) {
		$query = "SELECT `Tbl` FROM `Admin_Lists` WHERE `Id` = ".$this->db->escape($identifiers[0]);
		$table = $this->db->query($query)->row()->Tbl;

		$query = "DELETE FROM `$table` WHERE `Id`  = $identifiers[1]";
		if ($this->db->query($query)) {
			return true;
		} else 
			return false;
	}
	/*
		Getting items
	*/
	public function get($mode,...$identifiers) {
		$mode = ucfirst(mb_strtolower($mode));
		return $this->{'get'.$mode}(...$identifiers);
	}

	private function getItem ($list,$item) {
		$list = $this->get('List',$list);

		$query = "SELECT * FROM `$list[Tbl]` WHERE `Id` = $item";

		$query = $this->db->query($query);

		$tmp = $query->result_array();
		return !empty($tmp)?$tmp[0]:[];
	}
	private function getList(...$identifiers) {
		$query = "SELECT * FROM `Admin_Lists` WHERE `Id`=$identifiers[0]";
		$query = $this->db->query($query);

		$data = $query->row_array();

		$query = "SELECT * FROM `Admin_Columns` 
			WHERE `List_Id` = $identifiers[0]";
		$query = $this->db->query($query);
		$data['Columns'] = $query->result_array();
		foreach ($data['Columns'] as &$column) {
			if (!empty($column['SQLQuery'])) {
				$query = $column['SQLQuery'];
				foreach ($data['Columns'] as &$columnsql) {
					if (strstr('%'.$columnsql['Field'].'%',$query))
						$query = str_replace('%'.$columnsql['Field'].'%',$column[$columnsql['Field']],$query);
				}
				$data2 = $this->db->query($query)->result_array();
				foreach ($data2 as $key=>&$val) {
					$val = implode(':',$val);
				}
				$data2 = implode(',',$data2);
				$column['SetEnum'] = $data2;
			}
		}

		return $data;
	}

	public function roster($table, $columns, &$page = 1) {
		$onpage = 20;
		
		$page = $page<0?1:$page;
		$total = 
			$this->db
			->query("SELECT COUNT(*) `Count` FROM `$table`")
			->row()
			->Count;
		$total = round($total/$onpage+0.5);
		$page = $page>$total?$total:$page;

		$limit = $page*$onpage - $onpage;

		$page = ['Current'=>$page, 'Total' => $total];

		$query = "SELECT `Id`,";
		foreach ($columns as &$column) {
			$query.=$column['Field']!='Id'?"`$column[Field]`,":null;
		}
		$query = substr($query,0,strlen($query)-1);

		$query.= " FROM `$table` ORDER BY `Id` DESC LIMIT $limit,$onpage ";

		return $this->db->query($query)->result_array();
	}

	public function add($mode,$data) {
		$mode = ucfirst(mb_strtolower($mode));
		return $this->{'add'.$mode}($data);
	}

	private function addItem ($data) {
		$list = $this->get('List',$data[0]);
		
		$query = "INSERT INTO `$list[Tbl]` SET ";
		foreach ($data[1] as $field=>&$val) {
			if (substr($field,strlen($field)-4)!="_Dir") {
				$query.="`$field`=".$this->db->escape($val).",";
			}
		}
		$query = substr($query,0,strlen($query)-1);
		if ($this->db->query($query)) {
			$insert_id = $this->db->insert_id();

			foreach ($_FILES as $name=>&$file) {
				$folder = $data[1][$name.'_Dir'];
				$folder = str_replace('%Id%',$insert_id,$folder);
				if (!is_dir(dirname($folder))) {
					$tmp = explode('/',dirname($folder));

					$path = '';
					foreach ($tmp as &$dir) {
						$path.=$dir.'/';
						if (!is_dir($path)) {
							echo $path;
							mkdir($path,0777);
						}
					}
				}
				move_uploaded_file($_FILES[$name]['tmp_name'], $folder);
			}
			return true;
		} else
			return false;
	}

	/*
		Editing items
	*/

	public function edit($mode,$data) {
		$mode = ucfirst(mb_strtolower($mode));
		return $this->{'edit'.$mode}($data);
	}

	private function editItem ($data) {
		$list = $this->get('List',$data[0]);
		$item = $this->get('Item',$data[0],$data[1]);

		$query = "UPDATE `$list[Tbl]` SET ";
		foreach ($data[2] as $field=>&$val) {
			if (substr($field,strlen($field)-4)!="_Dir") {
				$query.="`$field`=".$this->db->escape($val).",";
			}
		}
		$query = substr($query,0,strlen($query)-1);
		$query.= " WHERE `Id`=$item[Id]";

		if ($this->db->query($query)) {
			$insert_id = $item['Id'];

			foreach ($_FILES as $name=>&$file) {
				$folder = $data[2][$name.'_Dir'];
				$folder = str_replace('%Id%',$insert_id,$folder);
				if (!is_dir(dirname($folder))) {
					$tmp = explode('/',dirname($folder));

					$path = '';
					foreach ($tmp as &$dir) {
						$path.=$dir.'/';
						if (!is_dir($path)) {
							echo $path;
							@mkdir($path,0777);
						}
					}
				}
				move_uploaded_file($_FILES[$name]['tmp_name'], $folder);
			}
			return true;
		} else
			return false;
	}
}