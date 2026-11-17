<?php

include 'header.php';

$students = [
    ["name" => "Juan Dela Cruz", "grade" => 95],
    ["name" => "Maria Santos", "grade" => 88],
    ["name" => "Pedro Reyes", "grade" => 76],
    ["name" => "Ana Garcia", "grade" => 65],
    ["name" => "Mark Lopez", "grade" => 92]
];

$totalStudents = count($students);
$passed = 0;
$failed = 0;

function getRemark($grade) {

    if ($grade >= 90) {
        return "Excellent";
    } elseif ($grade >= 85) {
        return "Very Good";
    } elseif ($grade >= 75) {
        return "Passed";
    } else {
        return "Failed";
    }
}

function getPerformance($grade) {

    return match (true) {
        $grade >= 90 => "Outstanding",
        $grade >= 85 => "Very Satisfactory",
        $grade >= 75 => "Satisfactory",
        default => "Needs Improvement"
    };
}

?>

<h2>Student Records</h2>

<p>Welcome! This system displays the grades and
performance of our students.</p>

<h3>Student List</h3>

<table>
    <tr>
        <th>No.</th>
        <th>Student Name</th>
        <th>Grade</th>
        <th>Remarks</th>
        <th>Performance</th>
    </tr>

    <?php

    $number = 1;

    foreach ($students as $student) {

        $name = $student["name"];
        $grade = $student["grade"];

        if ($grade >= 75) {
            $status = "PASSED";
            $passed++;
        } else {
            $status = "FAILED";
            $failed++;
        }

        echo "<tr>";
        echo "<td>$number</td>";
        echo "<td>" . htmlspecialchars($name) . "</td>";
        echo "<td>$grade</td>";
        echo "<td>" . getRemark($grade) . "</td>";
        echo "<td>" . getPerformance($grade) . "</td>";
        echo "</tr>";

        $number++;
    }

    ?>

</table>

<h3>Student Summary</h3>

<?php

echo "<p>Student Grade Evaluation:</p>";

for ($i = 0; $i < $totalStudents; $i++) {

    echo "Student " . ($i + 1) . ": "
        . htmlspecialchars($students[$i]["name"])
        . "<br>";
}

?>

<h3>Overall Results</h3>

<p>Total Students: <?php echo $totalStudents; ?></p>
<p>Students Passed: <?php echo $passed; ?></p>
<p>Students Failed: <?php echo $failed; ?></p>

<?php

echo "<h3>Class Performance</h3>";

switch (true) {

    case ($passed == $totalStudents):
        echo "<p>Excellent! Everyone passed!</p>";
        break;

    case ($passed > $failed):
        echo "<p>Good job! Most students passed.</p>";
        break;

    case ($passed == $failed):
        echo "<p>The class has equal passing and failing students.</p>";
        break;

    default:
        echo "<p>More students need improvement.</p>";
        break;
}

echo "<h3>Counting Students Using While Loop</h3>";

$count = 1;

while ($count <= $totalStudents) {
    echo "Student Number: $count <br>";
    $count++;
}

echo "<h3>Do-While Loop Example</h3>";

$attempt = 1;

do {
    echo "Displaying report attempt: $attempt <br>";
    $attempt++;
} while ($attempt <= 3);

$average = array_sum(array_column($students, "grade"))
           / $totalStudents;

$result = ($average >= 75) ? "PASSED" : "FAILED";

?>

<h3>Class Average</h3>

<p>Average Grade: <?php echo number_format($average, 2); ?></p>
<p>Class Result: <?php echo $result; ?></p>

<?php

include 'footer.php';

?>
