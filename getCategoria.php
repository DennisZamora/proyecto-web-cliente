<?php 

include("conexiones/conexion.php");
$conexion = conecta();

$output = '';  

$posted = "<strong><i> Posted by: </i> </strong>";
$date = "<strong><i> on: </i> </strong>";


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
          $output .= '
                    <div class="card z-depth-0"> 
                        <div class="col s6 md3">
                            <div class="card-content center" id="blogs">
                                <input type="hidden" name="idBlogs" >
                                <h3>' .$row["tituloBlog"].  '</h3>
                                <div>' . htmlspecialchars($row["contenidoBlog"]) .'</div>
                                <div>' .$posted .htmlspecialchars($row["username"]) .$date .htmlspecialchars($row["fecha_publicacion"]).'</div>
                            </div>
                            <div class="card-action right-align"> 
                                <button type="submit" name="idBlog" class="btn btn-outline-secondary" value=.$row["idBlog"]> More info </button>
                            </div>
                        </div>    
                    </div>';
                                
     }  
     echo $output;  
}  

?>
