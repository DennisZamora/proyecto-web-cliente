<?php 

include("conexiones/conexion.php");
$conexion = conecta();

$output = '';  

if(isset($_POST["categoriaId"]))  
{  
     if($_POST["categoriaId"] != '')  
     {  
         $sql = "SELECT idBlog, tituloBlog, contenidoBlog, fecha_publicacion,  FROM blog WHERE idCategoria = '".$_POST["categoriaId"]."'";  
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
