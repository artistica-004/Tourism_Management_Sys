<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inquiries</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css"> <!-- You should include your CSS file here -->
    <!-- Iconscout Link -->
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v2.1.6/css/unicons.css">
    <style>
        /* Add your additional styles here if needed */

        /* Add this CSS rule to your stylesheet */
        input[type="text"] {
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
            color: black;
            /* Change the text color to black */
        }

        body {
            background-color: #eee;
            /* Set the background color for the entire page */
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table,
        th,
        td {
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
        }

        h1 {
            text-align: center;
        }

        form {
            text-align: center;
            margin-top: 20px;
        }

        input[type="text"] {
            padding: 10px;
            width: 300px;
            border-radius: 5px;
            border: 1px solid #ccc;
            margin-right: 10px;
        }

        button[type="submit"] {
            padding: 10px 20px;
            background-color: green;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>

<body>
    <?php
    if (!empty($message)) {
        echo "<p>" . $message . "</p>";
    }
    ?>

    <header class="header">
        <a href="#" class="logo"><i class="fas fa-hiking"></i> travel.com</a>
        <nav class="navbar">
            <div id="nav-close" class="fas fa-times"></div>
            <a href="#home">home</a>
            <a href="#category">Adventures</a>
            <a href="#packages">packages</a>
            <a href="#contact">contact</a>
            <a href="inquiries.php">View Inquiries</a>
        </nav>
    </header>

    <h1>Inquiries</h1>

    <form method="get">
        <input type="text" name="search" placeholder="Search by Name...">
        <button type="submit">Search</button>
    </form>

    <?php
    $serverName = "localhost";
    $Username = "root";
    $password = "";
    $database = "test";

    $conn = mysqli_connect($serverName, $Username, $password, $database);
    if (!$conn) {
        die("Connection Failed: " . mysqli_connect_error());
    }

    $search = isset($_GET['search']) ? $_GET['search'] : '';
    $sql = "SELECT * FROM contact WHERE Name LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    if (!$result) {
        die("Query Failed: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($result) > 0) {
        echo '<table>';
        echo '<thead>';
        echo '<tr>';
        echo '<th>Name</th>';
        echo '<th>Email</th>';
        echo '<th>Phone</th>';
        echo '<th>Subject</th>';
        echo '<th>Message</th>';
        echo '<th>Date</th>';
        echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tr>';
            echo '<td>' . $row['Name'] . '</td>';
            echo '<td>' . $row['Email'] . '</td>';
            echo '<td>' . $row['Phone'] . '</td>';
            echo '<td>' . $row['Subject'] . '</td>';
            echo '<td>' . $row['Message'] . '</td>';
            echo '<td>' . $row['CreatedAt'] . '</td>';
            echo '</tr>';
        }
        echo '</tbody>';
        echo '</table>';
    } else {
        echo "No inquiries found.";
    }

    mysqli_close($conn);
    ?>

</body>

</html>