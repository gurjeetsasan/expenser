<?php 
	/*
		Author: Gurjeet Singh.
		Date: 09-12-2015
		Description: This page contains all the functions to Add dailies, Delete dailies, Add category, Delete Category.
	*/


	if( $_REQUEST['action'] == 'addDaily'){
		
		$data = array( "ADD Daily" );
		echo json_encode( $data);

	}elseif( $_REQUEST['action'] == 'deleteDaily' ){
		
		$data = array( "Delete Daily"  );
		echo json_encode( $data);

	}elseif ( $_REQUEST['action'] == 'addCategory' ) {
		
		$data = array( "Add Category" );
		echo json_encode( $data);	

	}elseif ( $_REQUEST['action'] == 'deleteCategory' ) {
		
		$data = array( "Delete Category" );
		echo json_encode( $data);

	}else{
		
		$data = array( "Invalid Options" );
		echo json_encode( $data);
	} 	


?>