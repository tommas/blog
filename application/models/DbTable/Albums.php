<?php

class Application_Model_DbTable_Albums extends Zend_Db_Table_Abstract
{

    protected $_name = 'albums';
    
    public function getAlbum($id){
    	$id = (int)$id;
    	$row = $this -> fetchRow('id ='. $id);
    	if (!$row){
    		throw new Exception("Could not find row $id");
    	}
    	return $row -> toArray();    	
    }
    
    public function addAlbum($artist, $title){
    	$data = array(
    			'artist' => $artist,
    			'title' => $title,
    			'date' => new Zend_db_Expr("Now()"),    			
    			);
    	$this -> insert($data);
    }
    
    public function updateAlbum($id, $artist, $title){
    	$data = array(
    			'artist' => $artist,
    			'title' => $title,
    			'date' => new Zend_db_Expr("Now()"),
    			);
    	$this -> update($data, 'id ='. (int)$id);
    }
    
    public function deleteAlbum($id){
    	$this -> delete('id ='. (int)$id);    	
    }

    public function getOnePageOfAlbumEntries($page=1) {
    
    	$query = $this->select();
    	$paginator = new Zend_Paginator(
    			new Zend_Paginator_Adapter_DbTableSelect($query)
    	);
    	$paginator->setItemCountPerPage(5);
    	$paginator->setCurrentPageNumber($page);
    	return $paginator;
    }
    
}

