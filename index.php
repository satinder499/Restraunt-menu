<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Menu</title>
    <style>
        .menu-container {
            max-width: 600px;
            margin: 0 auto;
        }
        .menu-item {
            border: 1px solid #ddd;
            border-radius: 5px;
            margin-bottom: 10px;
            overflow: hidden;
            background-color: #f9f9f9;
        }
        .menu-item-details {
            padding: 10px;
        }
        .menu-item-name {
            font-weight: bold;
        }
        .menu-item-description {
            color: #666;
        }
        .menu-item-price {
            font-size: 1.2em;
            color: #3c763d;
        }
    </style>
</head>
<body>
    <h1>Restaurant Menu</h1>
    <div class="menu-container">
        <?php
        // Database connection parameters
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "restaurant_menu";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Fetch data from the database
        $sql = "SELECT id, name, description, price FROM menu_items";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo "<div class='menu-item'>
                        <div class='menu-item-details'>
                            <div class='menu-item-name'>" . $row["name"] . "</div>
                            <div class='menu-item-description'>" . $row["description"] . "</div>
                            <div class='menu-item-price'>$" . $row["price"] . "</div>
                        </div>
                      </div>";
            }
        } else {
            echo "0 results";
        }

        // Close connection
        $conn->close();
        ?>
    </div>
</body>
</html>
