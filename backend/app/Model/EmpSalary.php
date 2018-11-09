<?php
class EmpSalary extends AppModel {
	public $name = 'EmpSalary';

	// <-- ----------------------------------------------------------------------------- -->

	/** Author: Akshay Kumar Singh,
	*   Date: 5-11-2018,
	*   Info: Function to add employee data
	*/

	public function add($data1) {
		try {
		$this->create();
		if ($this->save($data1)) {
			$result = true;
			return $result;
        } else {
			$result = false;
			return $result;
        }
		} catch(Exception $e){
			echo "Exception Encountered";
			$e->getMessage();
		}
	}
	// <-- ----------------------------------------------------------------------------- -->

	/** Author: Akshay Kumar Singh,
	*   Date: 5-11-2018,
	*   Info: Function to count employee Salary
	*/

	public function countsalary(){
		try {
		$data=$this->find('count',
		array('fields'=>'DISTINCT EmpSalary.Salary'
		));
		} catch(Exception $e){
			echo "Exception Encountered";
			$e->getMessage();
		}
		return $data;
	}

	// <-- ----------------------------------------------------------------------------- -->

	/** Author: Akshay Kumar Singh,
	*   Date: 5-11-2018,
	*   Info: Pagination Function to view searched data and view all data.
	*/
		public function pagination($no, $sal){
			if($sal){
				try{
					$dat1=$this->find('all',
					array('fields'=>array('DISTINCT Salary'),
					'order' => 'EmpSalary.Salary DESC',
					'limit' => 1,
					'offset' => $sal-1,
					));
		} catch(Exception $e) {
			echo "Exception Encountered";
			$e->getMessage();
		}
			$dat = $dat1[0]['EmpSalary']['Salary'];
			try {
					$totdatacount = $this->find('count',
					array(
						'conditions' => array('EmpSalary.Salary' => $dat)
					));
		} catch(Exception $e) {
			echo "Exception Encountered";
			$e->getMessage();
		}
		try{
			$data=$this->find('all',
					array('conditions'=>array('EmpSalary.Salary' => $dat),
					'order' => 'EmpSalary.Salary DESC',
					'limit' => 10,
					'offset' => ($no-1)*10,
					));
		} catch(Exception $e) {
			echo "Exception Encountered";
			$e->getMessage();
		}
			}
			else {
				try{
					$totdatacount = $this->find('count');
					$data=$this->find('all',
					array(
					'limit' => 10,
					'offset' => ($no-1)*10,
					));
		}  catch(Exception $e) {
			echo "Exception Encountered";
			$e->getMessage();
		}

			}
			return array($totdatacount, $data);
		}
}
?>
