<html>
<head>
    <title>Sistema de com</title>
  
    <meta content='minimum-scale=1.0, width=device-width, maximum-scale=0.6667, user-scalable=no' name='viewport' />
    <link href="../../css/caja_comentarios.css" rel="stylesheet">
    </head>
    <body>
    <div id="caja_mensajes_div">
        <div id="form">
        <input type="text" id="nick" placeholder="nick">
        <input type="text" id="mensaje" placeholder="Comentario">
        <input type="submit" value="Enviar" id="enviar">
        </div>             
    </div>
    <script src="https://code.jquery.com/jquery-3.1.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.js"></script>
    <script>
      function decode_utf8(s) {
          return decodeURIComponent(escape(s));
      }
    </script>
    <script>
     $(document).ready(function(){
        $.get("bd/com.json",function(data){
              for(var i = data.length-1;i >= 0;i--){
                    $("#caja_mensajes_div").append('<div class="item-com"><p>Fecha mensaje: '+decode_utf8(data[i].fecha)+'<p/><p>Nickname: '+data[i].nick+'<p/><p>Mensaje: '+data[i].con+'<p/>');    
              }       
           });      
         $("#enviar").click(function(){   
           var mensaje =  $("#mensaje").val();
           var nick =  $("#nick").val();
           var fecha = moment().format('MMMM Do YYYY, h:mm:ss a'); // agosto 23º 2019, 4:03:49 pm // August 23rd 2019, 3:59:01 pm;
            if(mensaje != ""){
                
               $.post("crear.php",{"mensaje":mensaje, "nick":nick, "fecha":fecha},function(data){
               $(".item-com").remove();
              var json = JSON.parse(data);
                      console.log(json[0]);
               
              $("#mensaje").val("");
              for(var i = json.length-1;i >= 0;i--){
               
                    $("#caja_mensajes_div").append(
                      '<div class="item-com"><p>Fecha mensaje: '+decode_utf8(json[i].fecha)+'<p/><p>Nickname: '+json[i].nick+'<p/><p>Mensaje: '+json[i].con+'<p/>'
                      );         
              }  
               });
            }else{
            alert("porfavor complete todos los campos");     
            }  
         }); 
     });
    </script>
     
    </body>

</html>