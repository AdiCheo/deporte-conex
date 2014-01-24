<?php
class My_model extends CI_Model
{
		
/*************** Select data ****************************/		
		function select_allrecord_recent($table,$column) //Select all recent added content with limit 10
		{
			return $this->db
			->order_by($column, "desc")
			->get($table,10)
			->result();
		}
		
		function selectall_recent_post($table) //Select all recent added content with limit 5 
		{
			return $this->db
			->order_by("post_date", "desc")
			->get($table,4)
			->result();
		}
		
		
		function select_only($table) //Select table
		{
			return $this->db
			->get($table)
			->result();
		}	
		
		function select_single_record($table,$where) // select wher return  2 dimensional array
		{
			return $this->db
				->where($where)
				->get($table)
				->row();
		}			
		function select_multiple_record($table,$where) // select wher return  2 dimensional array
		{
			return $this->db
				->where($where)
				->get($table)
				->result();
		}							
		function select_multiple_record_order_by($table,$order) //Select all with where condition return array
		
		{
			return $this->db
				->order_by($order,'asc')
				->get($table)
				->result();
		}

/**************Count**********************/
	function count_where($table,$where)
		{
			return $this->db
				->where($where)
				->get($table)
				->num_rows();
		}
	function count_alls($table)
		{
			return $this->db
				->get($table)
				->num_rows();
		}	
		
	/****************sums**************/	
	function sum($table,$where,$column)
		{
			return $this->db
				->select_sum($column)
				->where($where)
				->get($table)
				->num_rows();
		}
		
	function sums($column,$where,$table)
		{
			  	$query = $this->db->select_sum($column);
    			$query = $this->db->where($where);
				$query = $this->db->get($table);	
    			$result = $query->result();
				return $result[0]->rating_value;
		}			
		
		
		
	/********For Pagination*********/
	function record_count($table) {
	        return $this->db->count_all($table);
	    }
	function fetch_post($limit, $start , $table) {
	  	$this->db->limit($limit, $start);
	    $query = $this->db->order_by("prod_release","desc")->get($table);
	 
	    if ($query->num_rows() > 0) {
	         foreach ($query->result() as $row) {
	          	$data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	}		
	function fetch_post1($limit, $start , $table) {
	  	$this->db->limit($limit, $start);
	    $query = $this->db->order_by("prod_release","asc")->get($table);
	 
	    if ($query->num_rows() > 0) {
	         foreach ($query->result() as $row) {
	          	$data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	}
	
	function fetch_post2($limit, $start , $table, $column) {
	  	$this->db->limit($limit, $start);
	    $query = $this->db->order_by($column,"desc")->get($table);
	 
	    if ($query->num_rows() > 0) {
	         foreach ($query->result() as $row) {
	          	$data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	}		
	
	function fetch_postm($limit, $start , $table , $column) {
	  	$this->db->limit($limit, $start);
	    $query = $this->db
		->order_by($column ,"asc")->get($table);
	 
	    if ($query->num_rows() > 0) {
	         foreach ($query->result() as $row) {
	          	$data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	}		
	function fetch_post_club($limit, $start , $table , $column, $where) {
	  	$this->db->limit($limit, $start);
	    $query = $this->db
		->where($where)
		->order_by($column ,"asc")->get($table);
	 
	    if ($query->num_rows() > 0) {
	         foreach ($query->result() as $row) {
	          	$data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	}		
	function fetch_post_prod($limit, $start , $table, $where) {
	  	$this->db->limit($limit, $start);
	    $query = $this->db
		->where($where)
		->get($table);
	 
	    if ($query->num_rows() > 0) {
	         foreach ($query->result() as $row) {
	          	$data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	}	
	
	function fetch_postd($limit, $start , $table , $column) {
	  	$this->db->limit($limit, $start);
	    $query = $this->db->order_by($column ,"desc")->get($table);
	 
	    if ($query->num_rows() > 0) {
	         foreach ($query->result() as $row) {
	          	$data[] = $row;
	            }
	            return $data;
	        }
	        return false;
	}	


/********************************/

/************Insert**********************/
	function inserting($table,$to_insert)
		{
			return $this->db
			 	->insert($table,$to_insert);
		}
	
/************************************/

/*************Delete*********************/
	function delete_where($table,$where)
		
		{
			return $this->db
			->where($where)
			->delete($table);
		}
/*********************************/

/********************Update****************************/		
		
		function update($table,$to_update)// update single
		
		{
			return $this->db
				->update($table,$to_update);
			
		}
		
		function update_all_c($table,$to_update,$where) // update where
		{
		return $this->db
			->where($where)
			->update($table,$to_update);
		}	
		
}?>