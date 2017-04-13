<?php 

namespace Models;

/**
 *  Clase que hace referencia a la tabla Usuarios
 */
use Includes\DB\DB;
use Includes\Flash\Flash;


class ClassUsers            
{
    
    private $DB;
    public $us_id;    
    public $us_name;
    public $us_last_name;
    public $us_dni;
    public $us_password;
    public $us_status; // 1 0
    public $us_type; // ADMIN ROOT CLIENTE TRABAJADOR
    public $where_sql_data = "";  
    

    public function __construct()
    {
      
    }

    public function us_login()
    {
        
        if ( !empty($this->us_dni ) && !empty($this->us_password ) ) {
             $this->DB = new DB();
            $sql = "SELECT * FROM usuarios where us_dni = :us_dni AND us_password = :us_password AND us_status = 1";
            $data = array('us_dni' => $this->us_dni  ,'us_password' => $this->us_password  );
            // echo '<pre>'; var_dump( $data ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
            $result = $this->DB->query($sql,$data);
             $this->DB->close();
            if ( !empty($result)) {
                # code...
                return $result;
            }else {
                return "Usuario no encontrado";
            }

        }else {
            return false;
        }
    }


    public function us_save()
    {
        $db =  new DB();
        $this->pro_code= "CODE";
        
        if ( empty($this->pro_id) ) {

        $sql = "INSERT INTO usuarios(us_name,us_last_name,us_dni,us_password,us_status,us_type) values(:us_name,:us_last_name,
                                    :us_dni      ,
                                    :us_password ,
                                    :us_status   ,
                                    :us_type     
                             )";                                
                                 
                                 
                   $data = array(                 
                        'us_name'  =>  $this->us_name,
                        'us_last_name'  =>  $this->us_last_name,
                        'us_dni'  =>  $this->us_dni,
                        'us_password'  =>  $this->us_password,
                        'us_status'  =>  $this->us_status,
                        'us_type'  =>  $this->us_type            
                        );
        $re = $db->query($sql,$data);  

        $re = $db->lastInsertId();

        }else {
        $sql = "UPDATE  productos  SET            
                        us_name = :us_name ,          
                        us_last_name = :us_last_name ,
                        us_dni = :us_dni ,            
                        us_password = :us_password ,  
                        us_status = :us_status ,      
                        us_type = :us_type     
        
                 where us_id = LAST_INSERT_ID(:us_id) ;   ";
                   $data = array(                 
                        'us_id'  =>  $this->us_id,
                        'us_name'  =>  $this->us_name,
                        'us_last_name'  =>  $this->us_last_name,
                        'us_dni'  =>  $this->us_dni,
                        'us_password'  =>  $this->us_password,
                        'us_status'  =>  $this->us_status,
                        'us_type'  =>  $this->us_type            
                        );

            $re = $db->query($sql,$data); 
           

        $re = $db->lastInsertId(); 

        }

        $db->close();
        return $re;

    }


    public function us_list()
    {
       $db =  new DB();
       $data =  null;
       if ( empty($this->us_id)) {
         $sql = "SELECT * FROM usuarios WHERE 1 = 1";

         if (isset($this->where_sql_data['sql_where'])  ) {
            $sql .= ' AND '. $this->where_sql_data['sql_where'];
            $data = $this->where_sql_data['sql_where_data'];
         }


       }else {
         $sql = "SELECT * FROM usuarios WHERE us_id = :us_id";  
         $data = array('us_id' => $this->us_id );
       }

        $re =  $db->query($sql,$data);
        $db->close();
       return $re;
    }



}
