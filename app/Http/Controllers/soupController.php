<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class soupController extends Controller
{  
    
public function getResults(Request $request){
        
       $array_soup = array();        
       $len_char = $request->len_char;
       $len_row = $request->len_row; 
   
       function char_ran($len_char){   
           $chars = 'ABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVWXYZABCDEFGHIJKLMNOPQRSTUVZ';
           $characters =  str_split($chars); 
           $split_char = ''; 
               
           for ($i = 0 ; $i < $len_char; $i++): 
               $split_char = $split_char.$characters[rand(0, $len_char)]; 
               $array_split = str_split($split_char);
           endfor;
       return $array_split; 
   }

   function get_soup($len_char, $len_row){
       $array_soup = array();       
       for($j = 0 ; $j < $len_row ; $j++): 
       $char_ran =  char_ran($len_char);
       array_push($array_soup, $char_ran);  
       endfor; 
       return $array_soup; 
   }  
function get_results_soup($len_char, $len_row){
   $counter_horizontal_results = 0; 
   $counter_horizontal_results_invert = 0; 
   $counter_vertical_results = 0; 
   $counter_horizontal_results_invert = 0; 
   $counter_diagonal_up_right = 0; 
   $counter_diagonal_up_left = 0;
   $counter_diagonal_down_right = 0; 
   $counter_diagonal_down_left = 0;
   
   $results_soup = get_soup($len_char, $len_row);
   for($vertical = 0 ; $vertical < count($results_soup); $vertical++): 
           for($horizontal = 0 ;$horizontal < count($results_soup[$vertical]); $horizontal ++ ): 
             //encuentra valores horizontales
              if($horizontal < count($results_soup[$vertical])-4 &&
                   $results_soup[$vertical][$horizontal]   == 'O' &&
                   $results_soup[$vertical][$horizontal+1] == 'I' && 
                   $results_soup[$vertical][$horizontal+2] == 'E'):
                   $counter_horizontal_results ++;               
               endif;
               //resultado horizontal invertido 
               if($horizontal > 4 &&
                   $results_soup[$vertical][$horizontal]   == 'O' && 
                   $results_soup[$vertical][$horizontal-1] == 'I' && 
                   $results_soup[$vertical][$horizontal-2] == 'E'): 
                   $counter_horizontal_results_invert ++; 
               endif;
               //resultado vertical 
               if( $vertical < $vertical-4 &&
               $results_soup[$vertical+1][$horizontal] == 'I' &&
                   $results_soup[$vertical][$horizontal]   == 'O' && 
                   $results_soup[$vertical+2][$horizontal] == 'I' &&
                   $results_soup[$vertical+3][$horizontal] == 'E'):
                   $counter_vertical_results ++; 
               endif;
               
               //resultado vertical invertido 
               if( $vertical > 3 &&
                   $results_soup[$vertical][$horizontal]   == 'O' &&   
                   $results_soup[$vertical-1][$horizontal] == 'I' &&
                   $results_soup[$vertical-2][$horizontal] == 'E'):  
                   $counter_horizontal_results_invert ++; 
               endif; 

               //resultado diagonal superior derecha 
               if($horizontal < $horizontal-4 &&
                   $vertical < $vertical -4 && 
                   $results_soup[$vertical][$horizontal]       == 'O'&&
                   $results_soup[$vertical +1][$horizontal -1] == 'I' &&
                   $results_soup[$vertical +2][$horizontal -2] == 'E'): 
                  $counter_diagonal_up_right ++; 
               endif;     

               //resultado diagonal superior izquierda
               if($horizontal > 3 && 
                   $vertical  > 3 &&
                   $results_soup[$vertical][$horizontal]    == 'O'&&
                   $results_soup[$vertical-1][$horizontal-1]== 'I'&&
                   $results_soup[$vertical-2][$horizontal-2]== 'E'): 
                   $counter_diagonal_up_left ++; 
               endif;      
             
               //resultado diagonal inferior derecho 
              if($horizontal < $horizontal-4 && 
                  $vertical < $vertical -4 &&     
                   $results_soup[$vertical][$horizontal]      == 'O'&&
                   $results_soup[$vertical-1][$horizontal+1]  == 'I'&&
                   $results_soup[$vertical-2][$horizontal+2]  == 'E'):
                   $counter_diagonal_down_right ++; 
              endif;   
           //resultado diagonal inferior izquierdo 
           if($horizontal > 3 && 
              $vertical > 3 &&
               $results_soup[$vertical][$horizontal]      == 'O'&&
               $results_soup[$vertical-1][$horizontal-1]  == 'I'&&
               $results_soup[$vertical-2][$horizontal-2]  == 'E'):
               $counter_diagonal_down_left ++; 
           endif;
       endfor;      
   endfor;
   return   '{ "result": '.json_encode($results_soup).', '.
            '"coincidencias":{ '.
            '"coincidencias_horizontales" : '.$counter_horizontal_results.', '.
            '"coincidencias_horizontales_invertidas": '.$counter_horizontal_results_invert.', '. 
            '"coincidencias_verticales": '.$counter_vertical_results.', '. 
            '"coincidencias_verticales_invertidas": '.$counter_horizontal_results_invert.', '. 
            '"coincidencias_diagonal_superior_derecha": '.$counter_diagonal_up_right.', '. 
            '"coincidencias_diagonal_superior_izquierda": '.$counter_diagonal_up_left.', '.
            '"coincidencias_diagonal_inferior_derecha": '.$counter_diagonal_down_right.', '.
            '"coincidencias_diagonal_inferior_izquierda": '.$counter_diagonal_down_left.'}}';
            
        }


  $get_results = get_results_soup($len_row, $len_char); 
  return $get_results; 
    }
}