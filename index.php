<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <style>
            table {
                width:100%;
            }
            table, th, td {
                border: 1px solid black;
                border-collapse: collapse;
            }
            th, td {
                padding: 15px;
                text-align: left;
            }
            table#t01 tr:nth-child(even) {
                background-color: #eee;
            }
            table#t01 tr:nth-child(odd) {
                background-color: #fff;
            }
            table#t01 th {
                background-color: purple;
                color: white;
            }

            .container {
                position: relative;
                width: 50%;
            }

            .image {
                display: block;
                width: 100%;
                height: auto;
            }

            .overlay {
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0;
                height: 100%;
                width: 100%;
                opacity: 0;
                transition: .5s ease;
                background-color: #008CBA;
            }

            .container:hover .overlay {
                opacity: 1;
            }

            .text {
                color: white;
                font-size: 20px;
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                -ms-transform: translate(-50%, -50%);
                text-align: center; 
            }




            .CellWithComment{position:relative;}

            .CellComment
            {
                visibility: hidden;
                width: auto;
                position:absolute; 
                z-index:100;
                text-align: Left;
                opacity: 0.4;
                transition: opacity 2s;
                border-radius: 6px;
                background-color: #555;
                padding:3px;
                top:-30px; 
                left:0px;
            }   
            .CellWithComment:hover span.CellComment {visibility: visible;opacity: 1;}

        </style>




        <table id="t01" >
            <th>Actor</th>
            <th>09:00am - 10:00am - 11:00am - 12:00am</th>
            <tr>
                <?php
                $xmlNodes = simplexml_load_file("movies.xml") or die("Error:Cannont Create Object");
 

                    foreach ($xmlNodes->children() as $movie) {



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
        </form>asasa
    </body>
</html> sdsad