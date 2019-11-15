<?php
  require_once('includes/load.php');
function exec_sql($sql)
{
  global $db;
  $consulta = $db->query($sql);
          if($result = $db->fetch_assoc($consulta))
            return $result;
          else
            return null;
}
/*--------------------------------------------------------------*/
/* Function for find all database table rows by table name
/*--------------------------------------------------------------*/
function find_all($table) {
   global $db;
   if(tableExists($table))
   {
     return find_by_sql("SELECT * FROM ".$db->escape($table));
   }
}
/*--------------------------------------------------------------*/
/* Function for Perform queries
/*--------------------------------------------------------------*/
function find_by_sql($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}

function find_by_sql_assoc($sql)
{
  global $db;
  $result = $db->query($sql);
  $result_set = $db->fetch_assoc($result);
 return $result_set;
}
/*--------------------------------------------------------------*/
/*  Function for Find data from table by id
/*--------------------------------------------------------------*/
function find_by_id($table,$id)
{
  global $db;
  $id = (int)$id;
    if(tableExists($table)){
          $sql = $db->query("SELECT * FROM {$db->escape($table)} WHERE id='{$db->escape($id)}' LIMIT 1");
          if($result = $db->fetch_assoc($sql))
            return $result;
          else
            return null;
     }
}
/*--------------------------------------------------------------*/
/* Function for Delete data from table by id
/*--------------------------------------------------------------*/
function delete_by_id($table,$id)
{
  global $db;
  if(tableExists($table))
   {
    $sql = "DELETE FROM ".$db->escape($table);
    $sql .= " WHERE id=". $db->escape($id);
    $sql .= " LIMIT 1";
    $db->query($sql);
    return ($db->affected_rows() === 1) ? true : false;
   }
}
/*--------------------------------------------------------------*/
/* Function for Count id  By table name
/*--------------------------------------------------------------*/

function count_by_id($table){
  global $db;
  if(tableExists($table))
  {
    $sql    = "SELECT COUNT(id) AS total FROM ".$db->escape($table);
    $result = $db->query($sql);
     return($db->fetch_assoc($result));
  }
}
/*--------------------------------------------------------------*/
/* Determine if database table exists
/*--------------------------------------------------------------*/
function tableExists($table){
  global $db;
  $table_exit = $db->query('SHOW TABLES FROM '.DB_NAME.' LIKE "'.$db->escape($table).'"');
      if($table_exit) {
        if($db->num_rows($table_exit) > 0)
              return true;
         else
              return false;
      }
  }
  
  /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function validar_email($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s'  LIMIT 1", $username);
    
	$result = $db->query($sql);
    if($db->num_rows($result)){
     
        return true;
      
    }
   return false;
  }
 /*--------------------------------------------------------------*/
 /* Login with the data provided in $_POST,
 /* coming from the login form.
/*--------------------------------------------------------------*/
  function authenticate($username='', $password='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' or rut ='%s'  LIMIT 1", $username,$username);
    
	$result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
  /*--------------------------------------------------------------*/
  /* Login with the data provided in $_POST,
  /* coming from the login_v2.php form.
  /* If you used this method then remove authenticate function.
 /*--------------------------------------------------------------*/
   function authenticate_v2($username='', $password='') {
     global $db;
     $username = $db->escape($username);
     $password = $db->escape($password);
     $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
     $result = $db->query($sql);
     if($db->num_rows($result)){
       $user = $db->fetch_assoc($result);
       $password_request = sha1($password);
       if($password_request === $user['password'] ){
         return $user;
       }
     }
    return false;
   }


  /*--------------------------------------------------------------*/
  /* Find current log in user by session id
  /*--------------------------------------------------------------*/
  function current_user(){
      static $current_user;
      global $db;
      if(!$current_user){
         if(isset($_SESSION['user_id'])):
             $user_id = intval($_SESSION['user_id']);
             $current_user = find_by_id('users',$user_id);
        endif;
      }
    return $current_user;
  }
  
   function current_user_curso($rut){
      static $current_user;
      global $db;
      
             $current_user = exec_sql("SELECT m.id_curso from users u join participante p on (u.rut = p.rut) join matriculas m on (m.id_participante = p.id )  where u.rut =  '$rut' order by m.fecha");
            
     
    return $current_user;
  }
  
  function level_user($id){
      static $current_user;
      global $db;
      
             $level_user = exec_sql("SELECT user_level from users  where id = '$id' ");
        
     
    return $level_user;
  }
  /*--------------------------------------------------------------*/
  /* Find all user by
  /* Joining users table and user gropus table
  /*--------------------------------------------------------------*/
  function find_all_user(){
      global $db;
      $results = array();
      $sql = "SELECT u.id,u.name,u.username,u.user_level,u.status,u.last_login,";
      $sql .="g.group_name ";
      $sql .="FROM users u ";
      $sql .="LEFT JOIN user_groups g ";
      $sql .="ON g.group_level=u.user_level ORDER BY u.name ASC";
      $result = find_by_sql($sql);
      return $result;
  }
  /*--------------------------------------------------------------*/
  /* Function to update the last log in of a user
  /*--------------------------------------------------------------*/

 function updateLastLogIn($user_id)
	{
		global $db;
    $date = make_date();
    $sql = "UPDATE users SET last_login='{$date}' WHERE id ='{$user_id}' LIMIT 1";
    $result = $db->query($sql);
    return ($result && $db->affected_rows() === 1 ? true : false);
	}

  /*--------------------------------------------------------------*/
  /* Find all Group name
  /*--------------------------------------------------------------*/
  function find_by_groupName($val)
  {
    global $db;
    $sql = "SELECT group_name FROM user_groups WHERE group_name = '{$db->escape($val)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Find group level
  /*--------------------------------------------------------------*/
  function find_by_groupLevel($level)
  {
    global $db;
    $sql = "SELECT group_level FROM user_groups WHERE group_level = '{$db->escape($level)}' LIMIT 1 ";
    $result = $db->query($sql);
    return($db->num_rows($result) === 0 ? true : false);
  }
  /*--------------------------------------------------------------*/
  /* Function for cheaking which user level has access to page
  /*--------------------------------------------------------------*/
   function page_require_level($require_level){
     global $session;
     $current_user = current_user();
     $login_level = find_by_groupLevel($current_user['user_level']);
     //if user not login
     if (!$session->isUserLoggedIn(true)):
            $session->msg('d','Por favor Iniciar sesión...');
            redirect('index.php', false);
      //if Group status Deactive
     elseif($login_level['group_status'] === '0'):
           $session->msg('d','Este nivel de usaurio esta inactivo!');
           redirect('home.php',false);
      //cheackin log in User level and Require level is Less than or equal to
     elseif($current_user['user_level'] <= (int)$require_level):
              return true;
      else:
            $session->msg("d", "¡Lo siento!  no tienes permiso para ver la página.");
            redirect('home.php', false);
        endif;

     }
   /*--------------------------------------------------------------*/
   /* Function for Finding all product name
   /* JOIN with categorie  and media database table
   /*--------------------------------------------------------------*/
  function join_product_table(){
     global $db;
     $sql  =" SELECT p.id,p.name,p.quantity,p.buy_price,p.sale_price,p.media_id,p.date,c.name";
    $sql  .=" AS categorie,m.file_name AS image";
    $sql  .=" FROM products p";
    $sql  .=" LEFT JOIN categories c ON c.id = p.categorie_id";
    $sql  .=" LEFT JOIN media m ON m.id = p.media_id";
    $sql  .=" ORDER BY p.id ASC";
    return find_by_sql($sql);

   }
   
   function listado_cotizacion($id){
     global $db;
    if(!empty($id))
    {

      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	  $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE cc.id_estado = $id and ic.etapa = 1";
      $sql  .=" ORDER BY cc.id DESC";
    }
    else
    {
      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	  $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE  ic.etapa = 1";
      $sql  .=" ORDER BY cc.id DESC";

    }
    
    
    return find_by_sql($sql);

   }

function listado_cotizacion_vendedor($id,$user){
     global $db;
    if(!empty($id))
    {

      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	  $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE cc.id_estado = $id and usuario = $user and ic.etapa = 1";
      $sql  .=" ORDER BY cc.id DESC";
    }
    else
    {
      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	  $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE  usuario = $user and ic.etapa = 1";
      $sql  .=" ORDER BY cc.id DESC";

    }
    
    
    return find_by_sql($sql);

   }

    function listado_cotizacion_c($id){
     global $db;
    if(!empty($id))
    {

      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,cc.cliente, ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	   $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE cc.id_estado = $id and ic.etapa = 2";
      $sql  .=" ORDER BY cc.id DESC";
    }
    else
    {
      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo, cc.cliente, ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	   $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE  ic.etapa = 2";
      $sql  .=" ORDER BY cc.id DESC";

    }
    
    
    return find_by_sql($sql);

   }


    function listado_cotizacion_l($id){
     global $db;
    if(!empty($id))
    {

      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,cc.cliente,ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	  $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE cc.id_estado = $id and ic.etapa = 3";
      $sql  .=" ORDER BY cc.id DESC";
    }
    else
    {
      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,cc.cliente, ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	  $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE  ic.etapa = 3";
      $sql  .=" ORDER BY cc.id DESC";

    }
	
    
    
    return find_by_sql($sql);

   }
   
   function listado_cotizacion_l_vendedor($id,$user){
     global $db;
    if(!empty($id))
    {

      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,cc.cliente,ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	  $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE cc.id_estado = $id and usuario = $user and ic.etapa = 3";
      $sql  .=" ORDER BY cc.id DESC";
    }
    else
    {
      $sql  =" SELECT cc.id,cc.descripcion,cc.fecha, c.nombre,ic.estado,cc.id_estado,cc.modelo,cc.cliente, ct.name as marca, u.name";
      $sql  .=" FROM `cotizacion_cliente` cc";
      $sql  .=" LEFT JOIN clientes c ON cc.cliente = c.id";
      $sql  .=" LEFT JOIN estado_cotizacion ic ON cc.id_estado = ic.id";
      $sql  .=" LEFT JOIN categories ct ON ct.id = cc.marca";
	  $sql  .=" LEFT JOIN users u ON u.id = cc.usuario";
      $sql  .=" WHERE usuario = $user and  ic.etapa = 3";
      $sql  .=" ORDER BY cc.id DESC";

    }
	
    
    
    return find_by_sql($sql);

   }
   
   
  /*--------------------------------------------------------------*/
  /* Function for Finding all product name
  /* Request coming from ajax.php for auto suggest
  /*--------------------------------------------------------------*/

   function find_product_by_title($product_name){
     global $db;
     $p_name = remove_junk($db->escape($product_name));
     $sql = "SELECT name FROM products WHERE name like '%$p_name%' LIMIT 5";
     $result = find_by_sql($sql);
     return $result;
   }

  /*--------------------------------------------------------------*/
  /* Function for Finding all product info by product title
  /* Request coming from ajax.php
  /*--------------------------------------------------------------*/
  function find_all_product_info_by_title($title){
    global $db;
    $sql  = "SELECT * FROM products ";
    $sql .= " WHERE name ='{$title}'";
    $sql .=" LIMIT 1";
    return find_by_sql($sql);
  }

  /*--------------------------------------------------------------*/
  /* Function for Update product quantity
  /*--------------------------------------------------------------*/
  function update_product_qty($qty,$p_id){
    global $db;
    $qty = (int) $qty;
    $id  = (int)$p_id;
    $sql = "UPDATE products SET quantity=quantity -'{$qty}' WHERE id = '{$id}'";
    $result = $db->query($sql);
    return($db->affected_rows() === 1 ? true : false);

  }
  /*--------------------------------------------------------------*/
  /* Function for Display Recent product Added
  /*--------------------------------------------------------------*/
 function find_recent_product_added($limit){
   global $db;
   $sql   = " SELECT p.id,p.name,p.sale_price,p.media_id,c.name AS categorie,";
   $sql  .= "m.file_name AS image FROM products p";
   $sql  .= " LEFT JOIN categories c ON c.id = p.categorie_id";
   $sql  .= " LEFT JOIN media m ON m.id = p.media_id";
   $sql  .= " ORDER BY p.id DESC LIMIT ".$db->escape((int)$limit);
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Find Highest saleing Product
 /*--------------------------------------------------------------*/
 function find_higest_saleing_product($limit){
   global $db;
   $sql  = "SELECT p.name, COUNT(s.product_id) AS totalSold, SUM(s.qty) AS totalQty";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON p.id = s.product_id ";
   $sql .= " GROUP BY s.product_id";
   $sql .= " ORDER BY SUM(s.qty) DESC LIMIT ".$db->escape((int)$limit);
   return $db->query($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for find all sales
 /*--------------------------------------------------------------*/
 function find_all_sale(){
   global $db;
   $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
   $sql .= " FROM sales s";
   $sql .= " LEFT JOIN products p ON s.product_id = p.id";
   $sql .= " ORDER BY s.date DESC";
   return find_by_sql($sql);
 }
 /*--------------------------------------------------------------*/
 /* Function for Display Recent sale
 /*--------------------------------------------------------------*/
function find_recent_sale_added($limit){
  global $db;
  $sql  = "SELECT s.id,s.qty,s.price,s.date,p.name";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " ORDER BY s.date DESC LIMIT ".$db->escape((int)$limit);
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate sales report by two dates
/*--------------------------------------------------------------*/
function find_sale_by_dates($start_date,$end_date){
  global $db;
  $start_date  = date("Y-m-d", strtotime($start_date));
  $end_date    = date("Y-m-d", strtotime($end_date));
  $sql  = "SELECT s.date, p.name,p.sale_price,p.buy_price,";
  $sql .= "COUNT(s.product_id) AS total_records,";
  $sql .= "SUM(s.qty) AS total_sales,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price,";
  $sql .= "SUM(p.buy_price * s.qty) AS total_buying_price ";
  $sql .= "FROM sales s ";
  $sql .= "LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE s.date BETWEEN '{$start_date}' AND '{$end_date}'";
  $sql .= " GROUP BY DATE(s.date),p.name";
  $sql .= " ORDER BY DATE(s.date) DESC";
  return $db->query($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Daily sales report
/*--------------------------------------------------------------*/
function  dailySales($year,$month){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y-%m' ) = '{$year}-{$month}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%e' ),s.product_id";
  return find_by_sql($sql);
}
/*--------------------------------------------------------------*/
/* Function for Generate Monthly sales report
/*--------------------------------------------------------------*/
function  monthlySales($year){
  global $db;
  $sql  = "SELECT s.qty,";
  $sql .= " DATE_FORMAT(s.date, '%Y-%m-%e') AS date,p.name,";
  $sql .= "SUM(p.sale_price * s.qty) AS total_saleing_price";
  $sql .= " FROM sales s";
  $sql .= " LEFT JOIN products p ON s.product_id = p.id";
  $sql .= " WHERE DATE_FORMAT(s.date, '%Y' ) = '{$year}'";
  $sql .= " GROUP BY DATE_FORMAT( s.date,  '%c' ),s.product_id";
  $sql .= " ORDER BY date_format(s.date, '%c' ) ASC";
  return find_by_sql($sql);
}

function devuelve_id_cotizacion(){
  global $db;
  $sql  = "select LAST_INSERT_ID(id) as last from presupuestos order by id desc limit 0,1";
  $result = $db->query($sql);
  $result_set = $db->while_loop($result);
 return $result_set;
}

function devuelve_items_temporales($user){
  global $db;
  $sql  = "select * from tmp where user_id = $user order by id";
   return find_by_sql($sql);
}

function devuelve_cotizacion_proveedor($id){
  global $db;
  $sql  = "select * from cotizacion_cliente cc join categories c on (cc.marca = c.id) join clientes cl on (cc.cliente= cl.id) where cc.id = $id";
   return find_by_sql($sql);
}

function devuelve_items_detalles($id){
  global $db;
  $sql  = "select * from detalle where id_presupuesto = $id";
   return find_by_sql($sql);
}
function devuelve_items_detalles_cliente($id){
  global $db;
  $sql  = "select * from detalle_proveedor dp join porcentaje p on (dp.porcentaje = p.id) where id_presupuesto = $id";
   return find_by_sql($sql);
}

function datos_cotizacion_por_id($id){
	global $db;
  	$sql  = "select * from cotizacion_cliente cc join categories c on (cc.marca = c.id) join clientes cs on (cc.cliente = cs.id) join proveedor p on (cc.proveedor_id = p.id) where cc.id = $id";
   	return exec_sql($sql);
}

function datos__proveedor_apagar($id){
	global $db;
  	$sql  = "SELECT sum(precio*cantidad) as total ,proveedor_id,p.proveedor from detalle_proveedor dp join proveedor p on (dp.proveedor_id = p.id)   WHERE id_presupuesto = $id GROUP BY proveedor_id";
   	return find_by_sql($sql);
}

function datos_detalle_pagos_proveedor($id_presupuesto,$id_proveedor){
	global $db;
  	$sql  = "SELECT * from detalle_proveedor dp join porcentaje p on (dp.porcentaje = p.id)  WHERE id_presupuesto = $id_presupuesto and proveedor_id = $id_proveedor";
   	return find_by_sql($sql);
}
function devuelve_valorreferencia($id){
  global $db;
  $sql  = "select dp.id as iddp,descripcion,cantidad,porcentaje, precio,calculo ,id_presupuesto,proveedor_id,precio_neto_usuario from detalle_proveedor dp join porcentaje p on (dp.porcentaje = p.id) where dp.id_presupuesto = $id order by dp.id";
   return find_by_sql($sql);
}

function ultimocurso($idusuario='') {
    global $db;
    $username = $db->escape($username);
    $password = $db->escape($password);
    $sql  = sprintf("SELECT id,username,password,user_level FROM users WHERE username ='%s' LIMIT 1", $username);
    $result = $db->query($sql);
    if($db->num_rows($result)){
      $user = $db->fetch_assoc($result);
      $password_request = sha1($password);
      if($password_request === $user['password'] ){
        return $user['id'];
      }
    }
   return false;
  }
?>