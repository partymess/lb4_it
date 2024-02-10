<!DOCTYPE html>
<html>
    <head>
        <title>Лабораторна робота №4</title>
    </head>
    <body>
        <?php
            function write_to_file(string $filename, string $content) {
                $handle = fopen($filename, "w");
                $op_status = fwrite($handle, $content);
                fclose($handle);
                return $op_status;
            }


            function read_from_file(string $filename){
                $handle = fopen($filename, "r");
                $content = fread($handle, filesize($filename));
                fclose($handle);
                return $content;
            }


            $FILE_PATH = "./visits_count.txt";
            $count = "1";
            if (!file_exists($FILE_PATH)){
                write_to_file($FILE_PATH, $count);
            } else {
                $count = read_from_file($FILE_PATH);
                $count = strval(intval($count) + 1);
                write_to_file($FILE_PATH, $count);
            }
            echo "Кількість показів сторінки: $count";
        ?>
    </body>
</html>