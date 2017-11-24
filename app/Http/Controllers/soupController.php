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


       preg_match_all('/abc/', $soup_string,$matches_horizontal_rigth,PREG_PATTERN_ORDER); 
       $result_horizontal_rigth = $matches_horizontal_rigth[0];     
       
       preg_match_all('/cba/', $soup_string,$matches_horizontal_left,PREG_PATTERN_ORDER); 
       $result_horizontal_left = $matches_horizontal_left[0];     

       preg_match_all('/a+(.|\n)+(.|\n)+b+(.|\n)+(.|\n)+c/', $soup_string,$matches_vertical,PREG_PATTERN_ORDER); 
       $result_vertical = $matches_vertical[0];   
       
       preg_match_all('/c+(.|\n)+(.|\n)+b+(.|\n)+(.|\n)+a/', $soup_string,$matches_down,PREG_PATTERN_ORDER); 
       $result_down = $matches_down[0]; 

       preg_match_all('/a+(.|\n)+(.|\n)+(.|\n)+b+(.|\n)+c/', $soup_string,$matches_diagonal_up_rigth,PREG_PATTERN_ORDER); 
       $result_diagonal_up_rigth = $matches_diagonal_up_rigth[0];   
       
       preg_match_all('/+a+(.|\n)+(.|\n)+(.|\n)+(.|\n)b+(.|\n)+(.|\n)+c/', $soup_string,$matches_diagonal_up_left,PREG_PATTERN_ORDER); 
       $result_diagonal_up_left = $matches_diagonal_up_left[0];   
       
       preg_match_all('/a+(.|\n)+(.|\n)+(.|\n)+b+(.|\n)+(.|\n)+(.|\n)+c/', $soup_string,$matches_diagonal_down_rigth,PREG_PATTERN_ORDER); 
       $result_diagonal_down_rigth = $matches_diagonal_down_rigth[0];   
       
       preg_match_all('/a+(.|\n)+b+(.|\n)+(.|\n)+c/', $soup_string,$matches_diagonal_down_left,PREG_PATTERN_ORDER); 
       $result_diagonal_down_left = $matches_diagonal_down_left[0];   
       
       
       return $result_vertical; 
    }
}