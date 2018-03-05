<?php

$user = "root"; 
$pass = "root"; 
$host = "localhost";
$db   = "system_test";

try {

    $connection = new PDO("mysql:host={$host};dbname={$db}", $user, $pass);
    $users = $connection->query('SELECT * from users');
    $users->setFetchMode(PDO::FETCH_INTO, new stdClass);

    $con = null;

} catch (PDOException $e) {
    echo "Error!: " . $e->getMessage();
}

?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Users</title>
    </head>
    <body>

    <table>
        <thead>
            <th>Id</th>
            <th>Name</th>
            <th>Email</th>
        </thead>
        <tbody>
        <?php foreach($users as $user): ?>
            <tr>
                <td><?php echo $user->id; ?></td>
                <td><?php echo $user->name; ?></td>
                <td><?php echo $user->email; ?></td>        
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>

    </body>
</html>
