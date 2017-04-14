<?php  
namespace Controllers;
use Models\ClassUsers;
use Includes\Flash\Flash;
/**
 * 
 */
class UserController extends ClassUsers
{
    private $user;

    function __construct()
    {
        # code...
        // $this->user =new ClassUser();
    }

    public function login()
    {


        $r =  self::us_login();
        $flash = new Flash();        
        if ( $r != false ) {
            //existe usuario
            if ( is_array($r)  && count($r[0]) > 0 ) {
                 $_SESSION['user'] = $r[0];
                 $flash->add('success','Se ha logeado con éxito');
            }else {//usuario incorrecto
                
                 $flash->add('error','El usuario o password no es válido');
                
            }
        }else {
            $flash->add('error','Hay campos vacíos, complételos¡');    

        }
    }

    public function crear_usuario()
    {
       $this->us_id = null;
       $this->us_status = 1;
       return self::us_save();
    }

    public function update_usuario()
    {
         $this->us_status = 1;
        return self::us_save();
    }

    public function list_usuarios()
    {
       return self::us_list();
    }
}
