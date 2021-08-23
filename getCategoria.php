<?php 

include("conexiones/conexion.php");
$conexion = conecta();

$output = '';  

if(isset($_POST["categoriaId"]))  
{  
     if($_POST["categoriaId"] != '')  
     {  
         $sql = "SELECT a.idBlog, a.tituloBlog, a.contenidoBlog,b.username,a.fecha_publicacion FROM blog a,usuario b,categoria c 
         WHERE a.idUsuario = b.idUsuario
        and a.idCategoria = c.idCategoria 
        and a.idCategoria = '".$_POST["categoriaId"]."'";  
     }  
     else  
     {  
         $sql = "SELECT * FROM categoria";  
     }  
     $result = mysqli_query($conexion, $sql);  
     while($row = mysqli_fetch_array($result))  
     {  
          $output .= '<div class="col s6 md3">
                        <div class="card-content center" id="blogs">
                        <input type="hidden" name="idBlogs" >
                        <h3>' .$row["tituloBlog"].  '<h3>
                        </div>
                     </div>';  
     }  
     echo $output;  
}  

?>
