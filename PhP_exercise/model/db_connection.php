
<?php
    $dbhost = "localhost";
    $dbuser = "root";
    $dbpass = "1234";
    $dbname = 'test';

    function createDB()
    {
        global $dbhost, $dbuser, $dbpass,$dbname;
        $link = mysqli_connect($dbhost,$dbuser,$dbpass);
        if(!$link){
            die("Could not connect");
        }else{
            $db_selected = mysqli_select_db($link,$dbname);
            if(!$db_selected){
                $query='create database test';
                if(mysqli_query($link,$query)){
                    echo 'database created successfully';
                }else{
                    echo 'database not created successfully';
                }
            }
        }
    }

    function createTable($conn){
        $query="
        create table if not exists posts(
        id int primary key auto_increment,
        title varchar(30),
        description text,
        image varchar(100),
        status int,
        create_at datetime,
        update_at datetime
        );";

        if($conn->query($query) === TRUE){
            return TRUE;
        }
        return FALSE;
    }

    function openCon(){
        global $dbhost, $dbuser, $dbpass,$dbname;
        $conn = new mysqli($dbhost, $dbuser, $dbpass,$dbname) or die("Connect failed: %s\n". $conn -> error);
        return $conn;   
    }


    function CloseCon($conn)
    {
        $conn->close();
    }   

?>
