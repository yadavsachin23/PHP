<?php 
include "conn.php";

$sql = "SELECT emp.id,emp.emp_id,emp.name, dept.dept,dept.salary FROM emp INNER JOIN dept ON emp.emp_id = dept.emp_id";
$result = mysqli_query($conn,$sql);

// print_r($result);

echo"<table border='1'>
<tr>
    <th>SNo</th>
    <th>EmpId</th>
    <th>Name</th>
    <th>DeptName</th>
    <th>Salary</th>
</tr>";

while($row = mysqli_fetch_array($result))

  {
  echo "<tr>";
  echo "<td>" . $row['id'] . "</td>";
    echo "<td>" . $row['emp_id'] . "</td>";
    echo "<td>" . $row['name'] . "</td>";
    echo "<td>" . $row['dept'] . "</td>";
    echo "<td>" . $row['salary'] . "</td>";
  echo "</tr>";
  }

echo "</table>";
