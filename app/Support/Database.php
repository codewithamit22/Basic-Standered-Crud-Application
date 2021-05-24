<?php 

	namespace App\Support;
	use mysqli;

	/**
	 * 
	 */
	abstract class Database
	{
			
		private $host    = "localhost";
		private $db_user = "root";
		private $db_pass = "";
		private $db_nam  = "crud_two";

		private $connection;

		/**
		 *  Database connection setup
		 */
		private function connection()
		{
			return $this -> connection = new mysqli( $this -> host, $this -> db_user, $this -> db_pass, $this -> db_nam );
		}

		/**
		 *  File upload management
		 */
		protected function fileUpload($file, $location='', array $file_type=['png','jpg','jpeg','gif'])
		{
			// File info
			$file_name = $file['name'];
			$file_tmp  = $file['tmp_name'];
			$file_size = $file['size'];

			// File extention
			$file_array = explode('.',$file_name);
			$file_exten = strtolower(end($file_array));

			// Unique file name
			$unique_file_name = md5(time().rand()).'.'.$file_exten;

			move_uploaded_file( $file_tmp, $location.$unique_file_name );

			return $unique_file_name;
		}

		/**
		 *  Data Insert to Table
		 */
		protected function insert($table, array $data)
		{
			// echo '<pre>';
			// print_r($data);
			// echo '</pre>';

			// Make SQL column from data
			$arr_key = array_keys($data);
			$arr_col = implode(',',$arr_key);

			// make SQL values from data
			$arr_val    = array_values($data);
			foreach ($arr_val as $value) {
				$form_value[] = "'".$value."'";
			}
			$arr_values = implode(',', $form_value);

			$sql = "INSERT INTO $table ($arr_col) VALUES ($arr_values)";
			$query = $this -> connection() -> query($sql);

			if($query){
				return true;
			}
		}

		/**
		 *  Get all data
		 */
		protected function all($table, $order_by)
		{
			$sql = "SELECT * FROM $table ORDER BY id $order_by";
			$data = $this -> connection() -> query($sql);

			if($data){
				return $data;
			}
		}

		/**
		 * Delete data
		 */
		protected function delete($table, $id)
		{
			$sql = "DELETE FROM $table WHERE id='$id'";
			$data = $this -> connection() -> query($sql);

			if($data){
				return true;
			}
		}
		
	}













 ?>