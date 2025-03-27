<?php

include ("../header.html");

    if (isset($_POST['submitdetails'])) {

        try {
        
        $title = $_POST['title'];
        
        $developer = $_POST['developer'];

        $publisher = $_POST['publisher'];
        
        $genre = $_POST['genre'];

        $description = $_POST['description'];

        $buyprice = $_POST['buyprice'];

        $saleprice = $_POST['saleprice'];

        $quantity = $_POST['quantity'];
        
        if ($title == '' or $developer == '')
        
        {
        
        echo("You did not complete the insert form correctly <br> ");
        
        }

        else{

            $pdo = new PDO('mysql:host=localhost;dbname=shippingapp; charset=utf8', 'root', '');
            
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            
            $sql = "INSERT INTO Games (title, developer, publisher, genre, description, buyprice, saleprice, quantity, status) 
            VALUES (:title, :developer, :publisher, :genre, :description, :buyprice, :saleprice, :quantity,'Registered')";  //CURDATE() - Method returns current time. Not useful here, but I'll comment it out for safekeeping!
            
            $stmt = $pdo->prepare($sql);

            echo "Hello There!";
            
            $stmt->bindValue(':title', $title);
            
            $stmt->bindValue(':developer', $developer);

            $stmt->bindValue(':publisher', $publisher);

            $stmt->bindValue(':genre', $genre);

            $stmt->bindValue(':description', $description);

            $stmt->bindValue(':buyprice', $buyprice);

            $stmt->bindValue(':saleprice', $saleprice);

            $stmt->bindValue(':quantity', $quantity);

            echo "It does get here!";
            
            $stmt->execute();
            
            //echo "Added try doing another";

            header('location: addGame.php');
        }

    }

catch (PDOException $e) {

$title = 'An error has occurred';

$output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();

}

}

include 'addGame.html'

?>