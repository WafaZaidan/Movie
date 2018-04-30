
<html>
    <head>
        <meta charset="UTF-8">
        <title>Parsing XML file</title>
        <link rel="stylesheet" href="CSS/Style.css">
    </head>
    <body><?php
        const InputKey = 'myfile';
        const AllowedTypes = ['text/xml'];
        if (empty($_FILES[InputKey])) {
            die("File Missing!");
        }

        if ($_FILES[InputKey]['error'] > 0) {
            echo $_FILES[InputKey]['error'];
            die("Handle the error!");
        }

        if (!in_array($_FILES[InputKey]['type'], AllowedTypes)) {
            die("Handle File Type Not Allowed");
        }
        $tmpFile = $_FILES[InputKey]['tmp_name'];
        $dstFile = 'Uploads/' . $_FILES[InputKey]['name'];


        if (file_exists($dstFile)) {

            echo "This file already exists <a href='index.php'>Upload another files</a><br> ";
        }


        $moveResult = move_uploaded_file($tmpFile, $dstFile);

        if (!$moveResult) {
            die("Erro");
        } else {
            echo "Your file has been uploaded! " . "<br>";




            echo "File Name: " . $_FILES["myfile"]["name"] . "<br>";
            echo "File type: " . $_FILES["myfile"]["type"] . "<br>";
            echo "File size: " . ($_FILES["myfile"]["size"] . "<br>");

            if (is_readable($dstFile)) {
                echo " $dstFile is readable" . "<br>";
            }
            if (is_writable($dstFile)) {
                echo " $dstFile is writable" . "<br>";
            }
        }
        ?>



        <table id="t01" >
            <th>Actor</th>
            <th>09:00am - 10:00am - 11:00am - 12:00am</th>
            <tr>
                <?php
                $xmlNodes = simplexml_load_file($dstFile) or die("Error:Cannont Create Object");


                foreach ($xmlNodes->children() as $movie) {
                    if ($movie->Name == "") {
                        $movie->Name = "No movies available";
                    }


                    echo "<td class='CellWithComment'>  $movie->Actor </td> ";

                    echo "<td class='CellWithComment'>  $movie->Name <span class='CellComment'> $movie->director </span> </td></tr>  ";
                }
                ?>

        </table>
        
        <a href='index.php'>Upload more files</a>

    </body></html>