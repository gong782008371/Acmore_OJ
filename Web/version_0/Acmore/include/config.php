<?php

static $current_host = "localhost";
static $page_cnt_problem = 2;
static $page_cnt_solution = 10;
static $id_language = array("", "G++",);
static $language_id = array("G++"=>1,);

static $id_result = array(0 => "Pending", 
						  1 => "Accept", 
						  2 => "Presentation Error", 
						  3 => "Compile Error", 
						  4 => "Wrong Answer", 
						  5 => "Runtime Error", 
						  6 => "Time Limit Exceeded", 
						  7 => "Memory Limit Exceeded", 
						  8 => "Output Limit Exceeded",);
						  
static $result_id = array("Pending" 				=> 0, 
						  "Accept" 					=> 1, 
						  "Presentation Error" 		=> 2, 
						  "Compile Error" 			=> 3, 
						  "Wrong Answer" 			=> 4, 
						  "Runtime Error" 			=> 5, 
						  "Time Limit Exceeded" 	=> 6, 
						  "Memory Limit Exceeded"	=> 7, 
						  "Output Limit Exceeded"	=> 8,);

?>