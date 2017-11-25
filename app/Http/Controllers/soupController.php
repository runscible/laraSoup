<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class soupController extends Controller
{  
    
public function getResults(Request $request){
    
    
       $soup_string = $request->soupArray; 
     //  $soup_array = str_split($soup_string); 
       $result_horizontal_rigth = 0 ; 
       $result_horizontal_left = 0 ; 
       $result_vertical = 0 ; 
       $result_down = 0 ; 
       $result_diagonal_up_rigth = 0;  
       $result_diagonal_up_left = 0;  
       $result_diagonal_down_rigth = 0 ; 
       $result_diagonal_down_left = 0 ; 


       preg_match_all('/oie/', $soup_string,$matches_horizontal_rigth,PREG_PATTERN_ORDER); 
       $result_horizontal_rigth = $matches_horizontal_rigth[0];     
       
       preg_match_all('/eio/', $soup_string,$matches_horizontal_left,PREG_PATTERN_ORDER); 
       $result_horizontal_left = $matches_horizontal_left[0];     

       preg_match_all('/o\w\wi\w\we/', $soup_string,$matches_vertical,PREG_PATTERN_ORDER); 
       $result_vertical = $matches_vertical[0];   
       
       preg_match_all('/o\w\wi\w\we/', $soup_string,$matches_down,PREG_PATTERN_ORDER); 
       $result_down = $matches_down[0]; 

       preg_match_all('/o\w\w\wi\we/', $soup_string,$matches_diagonal_up_rigth,PREG_PATTERN_ORDER); 
       $result_diagonal_up_rigth = $matches_diagonal_up_rigth[0];   
       
       preg_match_all('/o\w\w\w\wi\w\we/', $soup_string,$matches_diagonal_up_left,PREG_PATTERN_ORDER); 
       $result_diagonal_up_left = $matches_diagonal_up_left[0];   
       
       preg_match_all('/o\w\w\wi\w\w\we/', $soup_string,$matches_diagonal_down_rigth,PREG_PATTERN_ORDER); 
       $result_diagonal_down_rigth = $matches_diagonal_down_rigth[0];   
       
       preg_match_all('/o\wi\w\we/', $soup_string,$matches_diagonal_down_left,PREG_PATTERN_ORDER); 
       $result_diagonal_down_left = $matches_diagonal_down_left[0];   
       
       $total = "\r results horizontal right: ".count($result_horizontal_rigth)."\r results horizontal left: ".
       count($result_horizontal_left)."\r results vertical: ".count($result_vertical)." \r results down: ".
       count($result_down)." \r results diagonal up right : ".count($result_diagonal_up_rigth). 
       "\r  results diagonal up left:  ".count($result_diagonal_up_left)."\r results diagonal down right:  ". 
       count($result_diagonal_down_rigth)."\r results diagonal down left  ".count($result_diagonal_up_left);    
       
       return $total; 
    }
}