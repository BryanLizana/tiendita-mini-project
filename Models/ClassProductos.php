<?php 
namespace Models;
use Includes\DB\DB;
use Includes\Flash\Flash;
/**
 * 
 */
class ClassProductos 
{
    public $pro_id = "";                   
    public $pro_code = "";                 
    public $pro_name = "";                 
    public $pro_description = "";          
    public $pro_precio_unidad = "";        
    public $pro_precio_mayor = "";         
    public $pro_cant_pro_precio_mayor = "";
    public $pro_stock_general = "";        
    public $pro_stock_venta = "";          
    public $pro_stock_almacen = "";        
    public $pro_stock_temp = "";  
    
    public $img_id = "";
    public $pro_img_path="";         
    public $tag_name = "";                 
    public $where_sql_data = "";
    public $item_pro = "";           
               
    
    function __construct()
    {
    //     $db =  new DB();
    //     $db->close();
    //    return $re;
    }


    public function pro_save()
    {
        $db =  new DB();
        $this->pro_code= "CODE"; //campo aún sin uso

        if ( empty($this->pro_id) ) { /// si se manda el id es update else insert


        $sql = "INSERT INTO productos( pro_code, pro_name, pro_description, pro_precio_unidad, pro_precio_mayor, pro_cant_pro_precio_mayor, pro_stock_general, pro_stock_venta, pro_stock_almacen, pro_stock_temp) 
                values( :pro_code, :pro_name, :pro_description, :pro_precio_unidad, :pro_precio_mayor, :pro_cant_pro_precio_mayor, :pro_stock_general, :pro_stock_venta, :pro_stock_almacen, :pro_stock_temp)";
        $data = array(                 
                        'pro_code' => $this->pro_code   ,                 
                        'pro_name' => $this->pro_name   ,                 
                        'pro_description' => $this->pro_description   ,          
                        'pro_precio_unidad' => $this->pro_precio_unidad   ,        
                        'pro_precio_mayor' => $this->pro_precio_mayor   ,         
                        'pro_cant_pro_precio_mayor' => $this->pro_cant_pro_precio_mayor   ,
                        'pro_stock_general' => $this->pro_stock_general   ,        
                        'pro_stock_venta' => $this->pro_stock_venta   ,          
                        'pro_stock_almacen' => $this->pro_stock_almacen   ,        
                        'pro_stock_temp' => $this->pro_stock_temp                 
                        );
        $re = $db->query($sql,$data);  

        $re = $db->lastInsertId();

        }else {

            ///update
        $sql = "UPDATE  productos  SET  pro_code = :pro_code, pro_name = :pro_name, pro_description = :pro_description, 
                pro_precio_unidad = :pro_precio_unidad, pro_precio_mayor = :pro_precio_mayor, pro_cant_pro_precio_mayor = :pro_cant_pro_precio_mayor,
                pro_stock_general = :pro_stock_general, pro_stock_venta = :pro_stock_venta,
                pro_stock_almacen = :pro_stock_almacen, pro_stock_temp = :pro_stock_temp where pro_id = LAST_INSERT_ID(:pro_id) ;   ";
        $data = array(
                    'pro_id' => $this->pro_id   ,                   
                    'pro_code' => $this->pro_code   ,                 
                    'pro_name' => $this->pro_name   ,                 
                    'pro_description' => $this->pro_description   ,          
                    'pro_precio_unidad' => $this->pro_precio_unidad   ,        
                    'pro_precio_mayor' => $this->pro_precio_mayor   ,         
                    'pro_cant_pro_precio_mayor' => $this->pro_cant_pro_precio_mayor   ,
                    'pro_stock_general' => $this->pro_stock_general   ,        
                    'pro_stock_venta' => $this->pro_stock_venta   ,          
                    'pro_stock_almacen' => $this->pro_stock_almacen   ,        
                    'pro_stock_temp' => $this->pro_stock_temp                 
                    );
  
        // echo '<pre>'; var_dump( 'Here' ); echo '</pre>'; die; /***VAR_DUMP_DIE***/
        $re = $db->query($sql,$data);         

        $re = $db->lastInsertId();         
        }

        $db->close();
        return $re; //siempre devolver el id para poder hacer procesos con el mismo

    }

    public function pro_save_img()
    {


         $db =  new DB();
         self::pro_delete_img();  //eliminar img si pasa de tres 
        if ( empty($this->img_id) ) {
            //trouble de id no válidos
            
            $sql = "INSERT INTO producto_imgs(pro_id,pro_img_path) values(:pro_id,:pro_img_path)";
            $data = array('pro_id' => $this->pro_id ,'pro_img_path' =>  $this->pro_img_path);
            $re = $db->query($sql,$data);
            
        }else {
            $sql = "UPDATE producto_imgs SET pro_img_path=:pro_img_path where img_id = :img_id";
            $data = array('img_id' => $this->img_id ,'pro_img_path' =>  $this->pro_img_path);
            $re = $db->query($sql);
        }

         $db->close();
       return $re;
    }

    public function pro_delete_img()
    {
            $db =  new DB();
            $sql = "SELECT count(img_id) as cant_pro_id FROM producto_imgs where pro_id = :pro_id ";
            $data = array('pro_id' => $this->pro_id );
            $re = $db->row($sql,$data);
            // if ( $re['cant_pro_id'] > 2  ) {
            if ( true ) { //solo será una imagen por producto - not page detail : (               
                
                     $sql = "DELETE FROM producto_imgs where pro_id = :pro_id LIMIT 1";
                    $data = array('pro_id' => $this->pro_id );
                    $re = $db->query($sql,$data);
            }
      
            
            $db->close();
           return $re;
    }

    public function pro_list()
    {
       $db =  new DB();
       $data =  null;
       if ( empty($this->pro_id)) {
         $sql = "SELECT * FROM productos WHERE 1 = 1";

         if (isset($this->where_sql_data['sql_where'])  ) {
            $sql .= ' AND '. $this->where_sql_data['sql_where'];
            $data = $this->where_sql_data['sql_where_data'];
         }


       }else {
         $sql = "SELECT * FROM productos WHERE pro_id = :pro_id";  
         $data = array('pro_id' => $this->pro_id );
       }

        $re =  $db->query($sql,$data);
        $db->close();
       return $re;
    }


    public function pro_list_tags()
    {   
       $db =  new DB();

    //     $sql_where = ''; $sql_data_where  = array();
    //    if (!empty($this->where_sql_data)) {
    //        $sql_where =  $this->where_sql_data['where'];
    //        $sql_data_where = $this->where_sql_data['data'];
    //    }

       if (!empty($this->pro_id) ) { //listar tags de un producto
              $sql = "SELECT DISTINC(tag_name) FROM producto_tags WHERE pro_id = :pro_id " ;
              $data = array('pro_id' => $this->pro_id );
              $re = $db->query($sql);
       }else { //listar all tags
           $sql = "SELECT DISTINC(tag_name) FROM producto_tags" ;
           $re = $db->query($sql);
       }

       $db->close();
       return $re;
      
    }

    public function pro_list_imgs()
    {   
        if (is_numeric($this->pro_id)) {
            $db =  new DB();
            $sql = "SELECT * FROM producto_imgs WHERE pro_id = :pro_id";
            $data = array('pro_id' => $this->pro_id);
            $re = $db->query($sql,$data);
            $db->close();
            return $re;
        }
    }

    public function pro_delete()
    {
         $db =  new DB();
        // $sql = "UPDATE productos SET  pro_stock_general = '0', pro_stock_venta = '0',pro_stock_almacen = '0', pro_stock_temp = '0' where pro_id = LAST_INSERT_ID(:pro_id) ; ";
         //delete imgs asociadas
         $sql="DELETE FROM producto_imgs WHERE pro_id = :pro_id";
         $data = array('pro_id' => $this->pro_id );
         $re = $db->query($sql,$data);
         
         
         $sql="DELETE FROM productos WHERE pro_id = :pro_id";
         $data = array('pro_id' => $this->pro_id );
         $re = $db->query($sql,$data);
         $db->close();
            return $re;
    }

    public function pro_more_item()
    {
         $db =  new DB();
       $sql = "UPDATE productos SET pro_stock_temp = (pro_stock_temp + 1) WHERE pro_id = LAST_INSERT_ID(:pro_id)";
        $data = array('pro_id' => $this->pro_id );
         $re = $db->query($sql,$data);
        $db->close();
        return $re;
    }

    public function pro_less_item()
    {
         $db =  new DB();
       $sql = "SELECT pro_stock_temp FROM productos  WHERE pro_id = LAST_INSERT_ID(:pro_id)";
       $data = array('pro_id' => $this->pro_id );
       $cant_sql = $db->row($sql,$data);
       
       if ($cant_sql['pro_stock_temp'] > 0) {
            $sql = "UPDATE productos SET pro_stock_temp = (pro_stock_temp - 1) WHERE pro_id = LAST_INSERT_ID(:pro_id)";
            $data = array('pro_id' => $this->pro_id );
            $re = $db->query($sql,$data);
       }else {
           $re =  false;
       }
      
        $db->close();
        return $re;
    }

    public function pro_cant_mayor()
    {
         $db =  new DB();
        
        $sql = "SELECT pro_cant_pro_precio_mayor FROM productos WHERE pro_id = LAST_INSERT_ID(:pro_id)";
        $data = array('pro_id' => $this->pro_id );
        $re = $db->query($sql,$data);
        $db->close();
        return $re;
    }


    public function pro_update_stock_venta()
    {
        $db =  new DB();
        if ( !empty($this->pro_id) && is_numeric($this->pro_id) ) {
          $sql = "UPDATE productos SET pro_stock_venta = (pro_stock_venta - :less_item_pro) WHERE pro_id = :pro_id";
          $data = array('less_item_pro' => $this->item_pro ,'pro_id'=> $this->pro_id);
        //   echo '<pre>'; var_dump( $data,$sql ); echo '</pre>'; die; /***VAR_DUMP_DIE***/ 
          
           $re = $db->query($sql,$data);
        }else {
           $sql = "UPDATE productos SET pro_stock_temp = pro_stock_venta"; // el temp se actualiza con el stock real de venta 
           $data = array('less_item_pro' => $this->item_pro );
           $re = $db->query($sql,$data);
        }
        $db->close();
        return $re;
    }

    public function pro_update_items_pro()
    {
        $db =  new DB();

        $sql = "UPDATE productos SET pro_stock_temp = pro_stock_venta  WHERE pro_id = :pro_id";
        $data = array('pro_id'=> $this->pro_id);
        //   echo '<pre>'; var_dump( $data,$sql ); echo '</pre>'; die; /***VAR_DUMP_DIE***/         
        $re = $db->query($sql,$data);
        $db->close();
        return $re;

    }
}
