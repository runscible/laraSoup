###
larasoup
###
funcionamiento de la aplicación :
//del lado del front: 
 
la aplicacion consiste en generar una sopa de letras a partir de 
dos parametros que llegan por el lado de la vista, uno es el largo de 
las filas de las que consta la sopa , y en segunda instancia la cantidad 
de filas generadas 

//del lado del back

el controlador de la aplicación consta de tres funciones anidadas que 
se retroalimentan entre ellas y permite a la lógica de la aplicaión 
permanecer separada en partes, ellas son: 

*char_ran : genera un array de letras aleatorias a partir de un 
parámetro dado desde el front 

*get_soup : instancia a char_ran dentro de un de un for que va a iterar 
una cantidad de veces establecida 'X' veces desde el lado del front 

*get_results_soup: instancia a get_soup y toma el array ya generado, a 
partir de este itera buscando el primer caracter de la palabra buscada y 
consiguiente dependiendo del orden en que se necesite encontrar (sea 
vertical , horizonta, invertida, diagonal , etc ) 
