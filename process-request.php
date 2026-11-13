<?php

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    http_response_code(405);
    exit("Method not allowed");
}

$course = trim($_POST["course"] ?? "");
$topic = trim($_POST["topic"] ?? "");
$preferredDate = $_POST["preferreddate"] ?? "";
$preferredTime = $_POST["preferredtime"] ?? "";

// Create errors array
$errors = [];

// Allowed courses and times
$allowedCourses = ["IS 6465", "IS 6495", "IS 6570"];
$allowedTimes = ["Morning", "Afternoon", "Evening"];

// Validate course
if (!in_array($course, $allowedCourses, true)) {
    $errors[] = "Please select a valid course.";
}

// Validate preferred time
if (!in_array($preferredTime, $allowedTimes, true)) {
    $errors[] = "Please select a valid preferred time.";
}

// Validate topic
if ($topic === "") {
    $errors[] = "Please enter a topic.";
} elseif (strlen($topic) > 120) {
    $errors[] = "The topic cannot be more than 120 characters.";
}

// Validate preferred date
$dateObject = DateTime::createFromFormat("!Y-m-d", $preferredDate);

if (
    !$dateObject ||
    $dateObject->format("Y-m-d") !== $preferredDate
) {
    $errors[] = "Please enter a valid preferred date.";
} elseif ($preferredDate < date("Y-m-d")) {
    $errors[] = "The preferred date cannot be in the past.";
}

// Display errors or confirmation
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tutoring Request</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <main class="container py-5">

        <?php if (!empty($errors)): ?>

            <h1>Please fix the following errors</h1>

            <div class="alert alert-danger">
                <ul>
                    <?php foreach ($errors as $error): ?>
                        <li><?php echo htmlspecialchars($error); ?></li>
                    <?php endforeach; ?>
                </ul>
            </div>

            <a href="request-form.html">Go back to the form</a>

        <?php else: ?>

            <h1>Request received!</h1>

            <div class="alert alert-success">
                Your tutoring request has been submitted successfully.
            </div>

            <p><strong>Course:</strong>
                <?php echo htmlspecialchars($course); ?>
            </p>

            <p><strong>Topic:</strong>
                <?php echo htmlspecialchars($topic); ?>
            </p>

            <p><strong>Preferred Date:</strong>
                <?php echo htmlspecialchars($preferredDate); ?>
            </p>

            <p><strong>Preferred Time:</strong>
                <?php echo htmlspecialchars($preferredTime); ?>
            </p>

            <p><strong>Status:</strong> Pending review</p>

            <a href="request-form.html">Submit another request</a>

        <?php endif; ?>

    </main>
</body>
</html>