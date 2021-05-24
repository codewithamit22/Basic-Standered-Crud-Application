<?php 

	namespace App\Controller;
	use App\Support\Database;

	/**
	 *  Student management
	 */
	class Student extends Database
	{
		/**
		 *  Add Student
		 */
		public function addNewStudent( $fname,$uname,$email,$cell,$passd,$locn,$pht_nam )
		{

			/**
			 *  Data send to database
			 */
			$data = parent::insert('users',[

				'name'     => $fname,
				'uname'    => $uname,
				'email'    => $email,
				'cell'     => $cell,
				'password' => $passd,
				'location' => $locn,
				'photo' => $this -> fileUpload($pht_nam, 'media/img/students/')

			]);

			/**
			 *  Final massage
			 */
			if($data == true){
				return $mass = '<p class="alert alert-success alert-dismissible fade show">Data added successfully !<button class="btn btn-close"></button></p>';
			}
		}

		/**
		 *  Get all value
		 */
		public function allStudent()
		{
			$data = $this -> all('users', 'DESC');
			return $data;
		}

		/**
		 * Delete Single student
		 */
		public function deleteStudent($id)
		{
			$data = $this-> delete('users',$id);
			/**
			 *  Final massage
			 */
			if($data == true){
				return $mass = '<p class="alert alert-success alert-dismissible fade show">Data delete successfully !<button class="btn btn-close"></button></p>';
			}
		}
		
	}



 ?>