<?php
// Get the logged-in user ID from session
include '../connection/conn.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $full_name = $_POST['full_name'];
    $birthday = $_POST['birthday'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $civil_status = $_POST['civil_status'];
    $address = $_POST['address'];
    $contact = $_POST['contact'];
    $user_id = $_POST['user_id'];

    // Fetch user data from the database
    $query = "SELECT * FROM users WHERE user_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        die("User not found."); // Handle cases where user is not found
    }

    // Handle password update only if provided
    $password = !empty($_POST['password']) ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'];

    // Handle profile picture upload
    if (!empty($_FILES['profile_picture']['name'])) {
        $target_dir = "../uploads/";
        $profile_pic = $target_dir . basename($_FILES["profile_picture"]["name"]);
        move_uploaded_file($_FILES["profile_picture"]["tmp_name"], $profile_pic);
    } else {
        $profile_pic = $user['profile_pic']; // Keep old profile picture if none is uploaded
    }

    // Update user profile
    $updateQuery = "UPDATE users SET username=?, full_name=?, birthday=?, age=?, gender=?, civil_status=?, address=?, contact=?, profile_pic=?, password=? WHERE user_id=?";
    $stmt = $conn->prepare($updateQuery);
    $stmt->bind_param("ssssssssssi", $username, $full_name, $birthday, $age, $gender, $civil_status, $address, $contact, $profile_pic, $password, $user_id);

    if ($stmt->execute()) {
        echo "<script>alert('Profile updated successfully!'); window.location.href='profile.php';</script>";
    } else {
        echo "<script>alert('Error updating profile.');</script>";
    }
}
?>