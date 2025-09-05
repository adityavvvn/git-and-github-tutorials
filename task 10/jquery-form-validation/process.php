<?php
$errors = [];
$data = [];

// Validate name
if (empty($_POST['name'])) {
    $errors['name'] = 'Name is required.';
}

// Validate email
if (empty($_POST['email'])) {
    $errors['email'] = 'Email is required.';
}

// Validate superheroAlias
if (empty($_POST['superheroAlias'])) {
    $errors['superheroAlias'] = 'Superhero alias is required.';
}

// Return response
if (!empty($errors)) {
    $data['success'] = false;
    $data['errors']  = $errors;
} else {
    $data['success'] = true;
    $data['message'] = 'Success! Your form has been submitted.';
}

echo json_encode($data);
