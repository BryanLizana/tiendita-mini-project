<?php 

namespace Controllers;
/**
 * 
 */
 use Models\ClassProductos;
 use Includes\Flash\Flash;
 
class ProductoController extends ClassProductos
{    

    public $type;
    public $img_name;

    function __construct()
    {
        # code...
    }
    //validar¡¡¡¡¡ allll¡¡
    public function list_tags()
    {
        $tags = self::pro_list_tags();
        return $tags;
    }

    public function crear_producto()
    {
      
       $this->pro_id = null;
       $this->pro_stock_almacen = $this->pro_stock_general - $this->pro_stock_venta;       
       $this->pro_stock_temp = $this->pro_stock_venta;

       return self::pro_save();
    }

    public function update_producto()
    {
       $re_almacen = $this->pro_stock_general - $this->pro_stock_venta;
       $this->pro_stock_almacen  = "$re_almacen";       
       $this->pro_stock_temp = $this->pro_stock_venta;
        return self::pro_save();
    }

    public function list_productos()
    {
       return self::pro_list();
    }

    public function list_productos_venta()
    {
       
       $this->where_sql_data['sql_where'] = " pro_stock_temp > 0 ";
       $this->where_sql_data['sql_where_data'] = null;

       return self::pro_list();
        
    }

    public function list_imgs()
    {
        return self::pro_list_imgs();
    }

    public function save_pro_imgs()
    {


    //    if( $tamano < $tamaño_max){ // Comprovamos el tamaño  
        $destino = ROOT.'/public/uploaded' ; // Carpeta donde se guardata 
        // $sep=explode('image/',$_FILES["file"]["type"]); // Separamos image/ 
        $sep=explode('image/',$this->type); // Separamos image/ 
        $cad = date('yy-m-dhs');
        $cad = $cad;
        $tipo=$sep[1]; // Optenemos el tipo de imagen que es 
        if($tipo == "jpeg" || $tipo == "JPG" || $tipo == "PNG" || true){ // Si el tipo de imagen a subir es el mismo de los permitidos, segimos. Puedes agregar mas tipos de imagen 
        $staus =  move_uploaded_file ( $this->temp, $destino . '/'.$this->img_name .$cad.'.'.$tipo);  // Subimos el archivo 
        
        // } 

            // $this->img_id
            // $this->pro_id ; //YA SE AÑADE ANTES DE LLAMAR A ESTA FN
            $this->pro_img_path =  $this->img_name .$cad.'.'.$tipo;
            self::pro_save_img();
        }
    }


    public function delete_producto()
    {
        return self:: pro_delete();
    }

    public function less_item()
    {
        return self:: pro_less_item();
        
    }
    public function more_item()
    {
       return self:: pro_more_item();
        
    }

    public function update_stock_venta()
    {
        return self::pro_update_stock_venta();
    }    
}
