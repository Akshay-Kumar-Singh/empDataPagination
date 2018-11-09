<?php
App::uses('AppController','Controller');
class EmpSalarysController extends AppController{

	public $components = array('RequestHandler');

	// <-- ----------------------------------------------------------------------------- -->

	// Function to view all data in the database emp_salaries
	// public function index() {
	// 	//$this->layout = false;
	// 	$empSalarys = $this->EmpSalary->find('all');
    //     $data=$this->set(array(
    //         'empSalarys' => $empSalarys,
    //         '_serialize' => array('empSalarys')
	// 	));
	// }

	// <-- ----------------------------------------------------------------------------- -->

	// Function to view searched data according to highest Salary
// 	public function view($id) {
// 		$id = $this->request->params['id'];
// 		$data1=$this->EmpSalary->find('all',
// 		array('fields'=>array('DISTINCT Salary'),
// 		  'order' => 'EmpSalary.Salary DESC',
// 		  'limit' => 1,
// 		  'offset' => $id-1,
// ));

// 		$no=$id-1;
// 		$data1 = $this->EmpSalary->query("SELECT DISTINCT EmpSalary.Salary FROM emp_salaries  EmpSalary order by Salary DESC limit $no,1");
// 		$data = $data1[0]['EmpSalary']['Salary'];
// 		$empSalary = $this->EmpSalary->find('all', array(
// 			'conditions' => array('EmpSalary.Salary' => $data)
// 		));
// 		$this->set(array(
//             'empSalary' => $empSalary,
//             '_serialize' => array('empSalary')
//         ));
// 	}

	// <-- ----------------------------------------------------------------------------- -->
	/** Author: Akshay Kumar Singh,
	*   Date: 5-11-2018,
	*   Info: Function to add employee data
	*/
	public function add() {

		$x = $this->request->is('options');
		$y = $this->request->is('post');
		if($x || $y) {
			try {
				$data1 = $this->request->data;
				} catch (Exception $e){
					echo "Exception Encountered";
					$e->getMessage();
				}
			$message = $this->EmpSalary->add($data1);
				if ($message) {
					$message = 'Saved';
				} else {
					$message = 'Error';
				}
			} else {
				$message = 'No data is present to save';
			}
			$this->set(array(
			'message' => $message,
			'_serialize' => array('message')
		));
	}

	// <-- ----------------------------------------------------------------------------- -->

	/** Author: Akshay Kumar Singh,
	*   Date: 5-11-2018,
	*   Info: Function to count employee Salary
	*/

	public function countsalary(){
		if($this->request->is('post')) {
			try {
				$data = $this->EmpSalary->countsalary();
				} catch(Exception $e) {
				echo "Error Encountered";
				$e->getMessage();
			}
			if(!empty($data)) {
				$this->set(array(
				'SalaryCount' => $data,
				'_serialize' => array('SalaryCount')
				));
			}
		}
	}
	// <-- ----------------------------------------------------------------------------- -->

	/** Author: Akshay Kumar Singh,
	*   Date: 5-11-2018,
	*   Info: Pagination Function to view searched data and view all data.
	*/

public function pagination($no, $sal=''){
		if($this->request->is('post')){
		$no = $this->request->params['no'];
		try {
			$data = array($this->EmpSalary->pagination($no, $sal));
			} catch(Exception $e){
				echo "Exception Encountered";
				$e->getMessage();
			}
			if(!empty($data[0][0])) {
			// print_r($data);
			$response = $this->set(array(
				'totdatacount' => $data[0][0],
				'Data' => $data[0][1],
				'_serialize' => array('totdatacount','Data')
				));
		}
		else {
			$response = $this->set(array('Msg' => 'No Data in database',
			'_serialize' => array('Msg')
		));
		}
	}
}
// <-- --------------------------------------------------------------------------------- -->
	// Pagination given by cakephp
	// public function testPagination($no){
	// 	$this->Paginator->settings= array(
	// 			'limit'=> 2,
	// 			'page' => $no
	// 		);
	// 		$data = $this->Paginator->paginate('EmpSalary');
	// 		$response=$this->set(array(
	// 			'data' => $data,
	// 			'_serialize' => array('data')
	// 			));
	// }

	// <-- ----------------------------------------------------------------------------- -->
}
?>
