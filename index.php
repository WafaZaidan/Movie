<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parsing XML file</title>
          <link rel="stylesheet" href="CSS/Style.css">
    </head>
    <body>




        <table id="t01" >
            <th>Actor</th>
            <th>09:00am - 10:00am - 11:00am - 12:00am</th>
            <tr>
                <?php
                $xmlNodes = simplexml_load_file("movies.xml") or die("Error:Cannont Create Object");


                foreach ($xmlNodes->children() as $movie) {
                   if ($movie->Name == "" ) { $movie->Name ="No movies available";
                   }


                    echo "<td class='CellWithComment'>  $movie->Actor </td> ";

                    echo "<td class='CellWithComment'>  $movie->Name <span class='CellComment'> $movie->director </span> </td></tr>  ";
                }
                ?>

        </table> 

        <form action="uploadedFile.php"
              class="form-inline"
              method ="post"
              enctype="multipart/form-data">
            <input type="hidden"
                   name="MAX_FILE_SIZE"
                   value="10000000"/>
            <div class="form-group">
                <span class="btn btn-default btn-file">
                    <input type="file" name="myfile" id="myfile"/>
                </span>
            </div>
            <button type="submit" class="btn btn-default" <br>Upload an XML file</button>
        </form>
        
          <?php
      
        ?> 
    </body>
</html> 