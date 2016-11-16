<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	
	public function __construct () {
		parent::__construct();
		$this->load->model('Admin/Model');
		$this->load->helper('url');
	}

	public function index() {
		$header = [
			'Lists' => $this->Model->Lists_List(),
			'Controller' => get_class(),
			'Sections' => [
				[
					'Label' => 'Админ-панель',
					'Href' => '/index.php/'.get_class()
				]
			],
		];
		$this->load->view('admin/header.php',$header);
		$this->load->view('admin/admin');
		$this->load->view('admin/footer.php');
	}
	
	public function tablesList() {
		session_start();
		if (isset($_SESSION['listcreated']))
			if ($_SESSION['listcreated'])
				$data['Message'] = [
					'Class' => 'alert_success',
					'Message' => 'Список успешно создан'
				];
			else
				$data['Message'] = [
					'Class' => 'alert_error',
					'Message' => 'Произошла ошибка при создании списка'
				];

		if (isset($_SESSION['listdeleted']))
			if ($_SESSION['listdeleted'])
				$data['Message'] = [
					'Class' => 'alert_success',
					'Message' => 'Список удален'
				];
			else
				$data['Message'] = [
					'Class' => 'alert_error',
					'Message' => 'Произошла ошибка при удалении списка'
				];
		if (isset($_SESSION['itemdeleted']))
			if ($_SESSION['itemdeleted'])
				$data['Message'] = [
					'Class' => 'alert_success',
					'Message' => 'Запись удалена'
				];
			else
				$data['Message'] = [
					'Class' => 'alert_error',
					'Message' => 'Произошла ошибка при удалении записи'
				];
		session_destroy();
		$data['Tables'] = $this->Model->Tables_List();
		$data['Lists'] = $this->Model->Lists_List();
		$data['Controller'] = get_class();

		$header = [
			'Lists' => $this->Model->Lists_List(),
			'Controller' => get_class(),
			'Sections' => [
				[
					'Label' => 'Список таблиц',
					'Href' => '/index.php/'.get_class().'/tableslist'
				]
			],
		];
		$this->load->view('admin/header',$header);
		$this->load->view('admin/tables',$data);
		$this->load->view('admin/footer');
	}
	
	public function create($mode, $identifier) {
		
		
		switch ($mode) {
			case 'submit':
				session_start();
				$_POST['table'] = $identifier;
				if ($this->Model->AddList($_POST))
					$_SESSION['listcreated'] = true;
				else
					$_SESSION['listcreated'] = false;
				header("Location: ".site_url(get_class().'/tableslist'));
				exit;
				break;
			case 'list':
				$this->load->model('Admin/Model');
				
				$data['Columns'] = $this->Model->Columns_List($identifier);
				$data['Table'] = $identifier;
				$data['Controller'] = get_class();
				
				$header = [
					'Lists' => $this->Model->Lists_List(),
					'Controller' => get_class(),
					'Sections' => [
						[
							'Label' => 'Список таблиц',
							'Href' => site_url(get_class().'/tableslist')
						],
						[
							'Label' => $identifier,
						],
						[
							'Label' => 'Выбор полей'
						],
					],
				];
				$this->load->view('admin/header',$header);
				$this->load->view('admin/createlist',$data);
				$this->load->view('admin/footer');
				break;
			case 'accept':
				$columns = [];
				
				$post = &$_POST;
				foreach ($post['check'] as $key=>&$field) {
					if ($field == 'on') {
						$columns[$key] = [];
						$columns[$key]['Required'] = isset($post['required'][$key])?true:false;
						$columns[$key]['Input'] = $post['input'][$key];
						$columns[$key]['Default'] = $post['default'][$key];
						$columns[$key]['Type_Args'] = $post['args'][$key];
						$columns[$key]['Set'] = $post['set'][$key];
						$columns[$key]['Name'] = $post['names'][$key];
						$columns[$key]['Type'] = $post['types'][$key];
					}
				}
				$data['Columns'] = $columns;
				$data['Table'] = $identifier;
				$data['Inputs']['Max'] = ['textarea','range','text','wysiwyg','number','email','password'];
				$data['Inputs']['Min'] = ['textarea','range','text','wysiwyg','number','email','password'];
				$data['Inputs']['Step'] = ['range','number'];
				$data['Inputs']['Sql'] = ['select','radio','checkboxes'];
				$data['Inputs']['Set'] = ['select','radio','checkboxes'];
				$data['Name'] = $post['name'];
				
				$header = [
					'Lists' => $this->Model->Lists_List(),
					'Controller' => get_class(),
					'Sections' => [
						[
							'Label' => 'Список таблиц',
							'Href' => '/index.php/'.get_class().'/tableslist'
						],
						[
							'Label' => $identifier,
						],
						[
							'Label' => 'Выбор полей',
							'Href' => '/index.php/'.get_class().'/create/list/'.$identifier
						],
						[
							'Label' => 'Настройки'
						]
					],
				];
				$this->load->view('admin/header',$header);
				$this->load->view('admin/accept',$data);
				$this->load->view('admin/footer');
				break;
		}
		
		
		
	}

	public function delete($mode, ...$identifiers) {

		switch ($mode) {
			case 'list':
				session_start();
				if ($this->Model->delete('List',...$identifiers))
					$_SESSION['listdeleted'] = true;
				else
					$_SESSION['listdeleted'] = false;
				header("Location: ".site_url(get_class().'/tableslist'));
				exit;
				break;
			case 'item':
				session_start();
				if ($this->Model->delete('Item',...$identifiers))
					$_SESSION['itemdeleted'] = true;
				else
					$_SESSION['itemdeleted'] = false;
				header("Location: ".site_url(get_class().'/listing/'.$identifiers[0]));
				exit;
				break;
		}

	}

	public function listing($identifier, $page = 1) {
		$data = $this->Model->get('List',$identifier);
		session_start();
		if (isset($_SESSION['itemdeleted']))
			if ($_SESSION['itemdeleted'])
				$data['Message'] = [
					'Class' => 'alert_success',
					'Message' => 'Запись удалена'
				];
			else
				$data['Message'] = [
					'Class' => 'alert_error',
					'Message' => 'Произошла ошибка при удалении записи'
				];
		session_destroy();
		$data['Roster'] = $this->Model->roster($data['Tbl'],$data['Columns'],$page);
		$data['Page'] = $page;
		$header = [
			'Lists' => $this->Model->Lists_List(),
			'Controller' => get_class(),
			'Sections' => [
				[
					'Label' => $data['Name']
				]
			],
		];

		$this->load->view('admin/header',$header);
		$this->load->view('admin/list',$data);
		$this->load->view('admin/footer');
	}

	public function add($mode, ...$identifiers) {
		switch ($mode) {
			case 'item':
				$list = $this->Model->get('List',$identifiers[0]);
				if (isset($_GET['submit'])) {
					if ($this->Model->add('Item',[$identifiers[0],$_POST])) {
						$list['Message'] = [
							'Class' => 'alert_success',
							'Message' => 'Запись добавлена'
						];
					} else 
						$list['Message'] = [
							'Class' => 'alert_error',
							'Message' => 'Ошибка при добавлении записи'
						];
				}
				$header = [
					'Lists' => $this->Model->Lists_List(),
					'Controller' => get_class(),
					'Sections' => [
						[
							'Label' => $list['Name'],
							'Href' => '/index.php/'.get_class().'/listing/'.$list['Id']
						],
						[
							'Label' => 'Добавить запись'
						]
					],
				];

				$this->load->view('admin/header',$header);
				$this->load->view('admin/additem',$list);
				$this->load->view('admin/footer');
				break;
		}
	}

	public function edit($mode, ...$identifiers) {
		switch ($mode) {
			case 'item':
				$list = $this->Model->get('List',$identifiers[0]);
				if (isset($_GET['submit'])) {
					if ($this->Model->edit('Item',[$identifiers[0],$identifiers[1],$_POST])) {
						$list['Message'] = [
							'Class' => 'alert_success',
							'Message' => 'Сохранено'
						];
					} else 
						$list['Message'] = [
							'Class' => 'alert_error',
							'Message' => 'Ошибка при сохранении данных'
						];
				}
				$header = [
					'Lists' => $this->Model->Lists_List(),
					'Controller' => get_class(),
					'Data' => $this->Model->get('Item',...$identifiers),
					'Sections' => [
						[
							'Label' => $list['Name'],
							'Href' => '/index.php/'.get_class().'/listing/'.$list['Id']
						],
						[
							'Label' => 'Редактировать запись'
						]
					],
				];

				$this->load->view('admin/header',$header);
				$this->load->view('admin/edititem',$list);
				$this->load->view('admin/footer');
				break;
		}
	}
	
}
