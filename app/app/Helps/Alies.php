<?php 

namespace App\Helps;

class Alies
{
    public static function transforme(string $name){
        $ex = explode(' ', $name);
        foreach ($ex as $key => $value) {
            if(!empty($value)){

                if(!empty($alias) && in_array('Maria',$alias) &&  count($alias)  < 2){
                    $alias[] = ucwords($value);  
                }
           
                if(empty($alias) || (ucwords($value) == 'Maria' && count($alias) < 1)){
                    $alias[] = ucwords($value);
                }
            }
        }
        
        $name = (!empty($alias) ? implode(' ',$alias) : $name );
        return $name;
    }
}