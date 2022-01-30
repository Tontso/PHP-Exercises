
<form>
    Name: <input type="text" name="name"/></br>
    Phone: <input type="text" name="phone"/></br>
    Age: <input type="text" name="age"/></br>
    Address: <input type="text" name="address"/></br>
    <input type="submit"/>
</form>

<?php

if(isset($_GET['name']) && isset($_GET['phone']) && isset($_GET['age']) && isset($_GET['address'])){
    $name = htmlspecialchars($_GET['name']);
    $age = htmlspecialchars($_GET['age']);
    $phone = htmlspecialchars($_GET['phone']);
    $address = htmlspecialchars($_GET['address']);

    echo "<table border='2'";
    echo "<tr><td style='background-color: orange'>Name</td><td>$name</td></tr>";
    echo "<tr><td style='background-color: orange'>Phone number</td><td>$phone</td></tr>";
    echo "<tr><td style='background-color: orange'>Age</td><td>$age</td></tr>";
    echo "<tr><td style='background-color: orange'>Address</td><td>$address</td></tr>";
    echo "</table>";
}