<?php

/**
 * Main Model trait
 */
trait Model
{
	use Database;

	protected $limit = 10;
	protected $offset = 0;
	protected $order_type = "asc";
	protected $order_column = "id";
	public $errors = [];

	public function findAll()
	{

		$query = "select * from $this->table order by $this->order_column $this->order_type limit $this->limit offset $this->offset";

		return $this->query($query);
	}

	//This function runs query with condtion of equals and not equals only
	public function where($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . " && ";
		}

		foreach ($keys_not as $key) {
			$query .= $key . " != :" . $key . " && ";
		}

		$query = trim($query, characters: " && ");

		$query .= " order by $this->order_column $this->order_type limit $this->limit offset $this->offset";
		$data = array_merge($data, $data_not);

		return $this->query($query, $data);
	}

	public function first($data, $data_not = [])
	{
		$keys = array_keys($data);
		$keys_not = array_keys($data_not);
		$query = "select * from $this->table where ";

		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . " && ";
		}

		foreach ($keys_not as $key) {
			$query .= $key . " != :" . $key . " && ";
		}

		$query = trim($query, " && ");

		$query .= " limit $this->limit offset $this->offset";
		$data = array_merge($data, $data_not);

		$result = $this->query($query, $data);
		if ($result)
			return $result[0];

		return false;
	}

	public function insert($data)
	{
		//Get the Id as the max valude of Id column
		$Id = $this->getMaxId() + 1;

		//Set the Id
		$data["Id"] = $Id;

		/** remove unwanted data **/
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {

				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		if ($data["Id"]) {

			$keys = array_keys($data);

			//Prepare the Id for the new entry
			$Id = $query = "insert into $this->table (" . implode(",", $keys) . ") values (:" . implode(",:", $keys) . ")";

			//return $query;
			return $this->query($query, $data);
		}

		return false;
	}

	public function update($id, $data, $id_column = 'id')
	{

		/** remove unwanted data **/
		if (!empty($this->allowedColumns)) {
			foreach ($data as $key => $value) {

				if (!in_array($key, $this->allowedColumns)) {
					unset($data[$key]);
				}
			}
		}

		$keys = array_keys($data);
		$query = "update $this->table set ";

		foreach ($keys as $key) {
			$query .= $key . " = :" . $key . ", ";
		}

		$query = trim($query, ", ");

		$query .= " where $id_column = :$id_column ";

		$data[$id_column] = $id;

		try {
			$this->query($query, $data);
			return "Update entry successfully";
		} catch (Exception $e) {
			return $e->getMessage();
		}


	}

	public function delete($id, $id_column = 'id')
	{
		$message = "Entry Dedeleted successfully";
		try {
			$data[$id_column] = $id;
			$query = "delete from $this->table where $id_column = :$id_column ";
			$this->query($query, $data);
		} catch (Exception $e) {
			return $e->getMessage();
		}
		return $message;
	}

	public function getMaxId()
	{
		$query = "SELECT MAX(`Id`) AS Id FROM `$this->table`";
		$result = $this->query($query);

		$max = $result[0]->Id;
		return $max;
	}


}