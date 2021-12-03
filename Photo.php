<?php
class Photo{

    //agregar y mostrar fotos... crear un form.
    private $html_1 = '<table border=1>';
    private $html_2 = '<tr>';
    private $html_3 = '<td>';
    private $html_4 = '</td>';
    private $html_5 = '</tr>';
    private $html_6 = '</table>';
    
    //verifica q la donde se va almacenar exista
    private function is_valid(){
        $path = "unpload/images";
        if(opendir($path)){
            return opendir($path);
        }
    }
    
    public function addFile()
    {
        if(isset($_FILES['photo'])){
            $errors= array();
            $file_name = $_FILES['photo']['name'];
            $file_size = $_FILES['photo']['size'];
            $file_tmp = $_FILES['photo']['tmp_name'];
            $file_type = $_FILES['photo']['type'];

            $temp = explode('.',$_FILES['photo']['name']);
            $file_ext= strtolower(end($temp));
           
            $expensions= array("jpeg","jpg","png");
           
            if(in_array($file_ext,$expensions)=== false){
               $errors[]="extension not allowed, please choose a JPEG or PNG file.";
            }
           
            if($file_size > 2097152) {
               $errors[]='File size must be excately 2 MB';
            }
           
            if(empty($errors)==true) {
               move_uploaded_file($file_tmp,"unpload/images/".$file_name);
               return "Success";
            }else{
               return $errors;
            }
         
        }
       
    }

    function listarArchivos(  ){
        
        // Abrimos la carpeta que nos pasan como parámetro
        $dir = $this->is_valid();
        // Leo todos los ficheros de la carpeta
        $this->photolist = $this->html_1;
        $this->photolist .= $this->html_2. '<th> PHOTO </th></tr>' ;
        
        while (false !== ($elemento = readdir($dir))){
            // Tratamos los elementos . y .. que tienen todas las carpetas
            if( $elemento != "." && $elemento != ".."){
                // Si es una carpeta
                if( is_dir($dir.$elemento) ){
                    // Muestro la carpeta
                    echo "<p><strong>CARPETA: ". $elemento ."</strong></p>";
                // Si es un fichero
                } else {
                    // Muestro el fichero
                    $this->photolist .= $this->html_2;
                    $this->photolist .= $this->html_3. "<a href='unpload/images/$elemento'>$elemento</a>". $this->html_4 ;    
                        // $this->photolist .= $this->html_2;
                        // // $this->photolist .= $this->html_3.  $this->html_4 ;
                    $this->photolist .= $this->html_5;
                    
                }
            }
        }
        $this->photolist .= $this->html_6;
        return $this->photolist;
    }
}