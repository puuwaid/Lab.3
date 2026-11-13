<?php

echo "<h1>Lab 3: PHP Arrays</h1>";

// 1. Indexed Arrays
echo "<h2>1. Indexed Arrays</h2>";

$timeSlots = ["Morning", "Afternoon", "Evening"];

echo $timeSlots[0];
echo "<br>";

echo $timeSlots[1];
echo "<br>";

echo $timeSlots[2];
echo "<br>";

// 2. Associative Arrays
echo "<h2>2. Associative Arrays</h2>";

$request = [
    "course" => "IS 6465",
    "topic" => "PHP arrays",
    "status" => "Pending review"
];

echo "Course: " . $request["course"] . "<br>";
echo "Topic: " . $request["topic"] . "<br>";
echo "Status: " . $request["status"] . "<br>";

// 3. Multidimensional Arrays
echo "<h2>3. Multidimensional Arrays</h2>";

$requests = [
    [
        "student" => "Amina",
        "course" => "IS 6465",
        "status" => "Pending review"
    ],
    [
        "student" => "Diego",
        "course" => "IS 6495",
        "status" => "Matched"
    ]
];

foreach ($requests as $request) {
    echo "Student: " . htmlspecialchars($request["student"]) . "<br>";
    echo "Course: " . htmlspecialchars($request["course"]) . "<br>";
    echo "Status: " . htmlspecialchars($request["status"]) . "<br>";
    echo "<br>";
}

// 4. Foreach Loop
echo "<h2>4. Approved Courses</h2>";

$courses = ["IS 6465", "IS 6495", "IS 6570"];

echo "<select>";

foreach ($courses as $course) {
    echo "<option value='" . htmlspecialchars($course, ENT_QUOTES, "UTF-8") . "'>";
    echo htmlspecialchars($course, ENT_QUOTES, "UTF-8");
    echo "</option>";
}

echo "</select>";

?>