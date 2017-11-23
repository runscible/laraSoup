<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class soupController extends Controller
{
    
public function getResults(Request $request){        
        $soup_string = $request->soupArray; 
        $soup_array = str_split($soup_string); 
        $counter_horizontal_left = 0 ; 
        $counter_horizontal_rigth = 0 ;  
        $counter_up = 0 ; 
        $counter_down = 0 ;     
        $counter_diagonal_up_left = 0 ; 
        $counter_diagonal_up_rigth = 0 ;
        $counter_diagonal_down_left = 0; 
        $counter_diagonal_down_rigth = 0  ; 
        
        
        
        //contador de coincidencias horizontales ----
        $c = 0 ;
        
        
        for ($i = 0 ; $i < sizeof($soup_array) ; $i++){
            
            $c++; 
            if ($c == 3){
            
            $b_1 = $soup_array[$i-2]; 
            $b_2 = $b_1.$soup_array[$i-1]; 
            $b_3 = $b_2.$soup_array[$i];     
            $c = 0 ;  
                if ($b_3 == 'abc'){
                     
                     $counter_horizontal_rigth  ++;
                 
                    
                }
                  
            }
            
        }
          
        
       
    //coincidencias en el sentido invertido 
        $c = 0 ; 
        while ($a > 0){
            $a--; 
            $c++; 
            if($c == 3  ){
                $b_1 = $soup_array[$i-2]; 
                $b_2 = $b_1.$soup_array[$i-1]; 
                $b_3 = $b_2.$soup_array[$i];     
                $c = 0 ;  
                if ($b_3 == 'abc'){
                    $counter_horizontal_left ++; 
                }
               
            }
        }

       //coincidencias hacia arriba
        $c = 0 ; 
        while (  $i < count($soup_array)){
            $i = $i + 3 ;
            $c ++; 
            if ($c == 3){
                $b_1 = $soup_array[$i-2]; 
                $b_2 = $b_1.$soup_array[$i-1]; 
                $b_3 = $b_2.$soup_array[$i];     
                $c = 0 ;  
                if ($b_3 == 'abc'){
                    $counter_up ++; 
                }
            } 
        }

     
    //coincidencias hacia abajo
        while ($a > 0 ){    
            $a = $a - 3 ;
            $c = 0 ;  
            if ($a < 99 && $c == 3){
                $b_1 = $soup_array[$i-2]; 
                $b_2 = $b_1.$soup_array[$i-1]; 
                $b_3 = $b_2.$soup_array[$i];     
                $c = 0 ;  
                if ($b_3 == 'abc'){
                    $counter_down ++; 
                }
            }
         }
    //coincidencias diagonales arriba a la izquierda    
        $c = 0;
        while ($i < sizeof($soup_array)){
            $i = $i + 3;
              
            if ($i >= 3 && $i < 99 && $c == 3){
                $a_1 = $i + 4;  
                $a_2 = $i + 8;
                if ($a_1 < 99 && $a_2 < 99 ){
                $b_1 = $soup_array[$i];
                $b_2 = $b_1.$soup_array[$a_1];
                $b_3 = $b_2.$soup_array[$a_2];
                
                $c = 0 ; 
                    if ($b_3 == 'abc'){
                        $counter_diagonal_up_left ++; 
                    }
                   
                }
            }
        }
       //coincidencias diagonales arriba a la derecha 
        $c = 0 ; 
        while ($a > 0){
            $c ++; 
            $a = $a - 3; 
            if ( $a < 99){
                $a_1 = $a + 4;  
                $a_2 = $a + 8;
                if ($a_1 < 99 && $a_2 < 99 && $c == 3 ){
                $b_1 = $soup_array[$a];
                $b_2 = $b_1.$soup_array[$a_1];
                $b_3 = $b_2.$soup_array[$a_2];
                    if($b_3 == 'abc'){
                        $counter_diagonal_up_rigth ++; 
                    }
                }
            }
        }
       
    //coincidencias diagonales abajo a la izquierda
        $c = 0 ; 
        for ($i = 6 ; $i < count($soup_array); $i = $i+3){
            
            if ( $i < 99){
                $c ++; 
                $i_1 = $i - 2;  
                $i_2 = $i - 4;
                if ($i_1 < 99 && $i_2 < 99 ){
                $b_1 = $soup_array[$i];
                $b_2 = $b_1.$soup_array[$i_1];
                $b_3 = $b_2.$soup_array[$i_2];
                    if($b_3 == 'abc'){
                        $counter_diagonal_down_left ++; 
                    }
                    
                }
            }
        }    

        //coincidencias diagonales abajo a la derecha
        $c = 0 ; 
        for ($i = 8 ; $i < count($soup_array); $i = $i+3){
            if ( $i < 99){
                $c ++; 
                $i_1 = $i - 4;  
                $i_2 = $i - 8;
                if ($i_1 < 99 && $i_2 < 99 && $c == 3){
                $b_1 = $soup_array[$i];
                $b_2 = $b_1.$soup_array[$i_1];
                $b_3 = $b_2.$soup_array[$i_2];
                    if ($b_3 == 'abc'){
                        $counter_diagonal_down_rigth ++; 
                    }
                }
            }
        } 
        $total = $counter_horizontal_rigth +',' + $counter_horizontal_left 
        +' , ' + $counter_up +', '+ $counter_down + ' , ' + $counter_diagonal_up_rigth 
        + ' , ' + $counter_diagonal_up_left + ' , ' + $counter_diagonal_down_rigth + ', '
        + ' , ' + $counter_diagonal_up_left; 
        return $total;    
    }
}