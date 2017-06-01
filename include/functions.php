<?php
$errors = array();
function fieldname_as_text($fieldname)
{
    $fieldname = str_replace("_", " ", $fieldname);
    $fieldname = ucfirst($fieldname);
    return $fieldname;
}

// REGISTRATIE
/*function redirect_to($new_location)
{
    header("Location: " . $new_location);
    exit;
}*/

//Function for checking if the query was succesfull
function check_query($resultset)
{
    if (!$resultset) {
        die("database query mislukt :/");
    }
}

//Function that sets the class of a menu item according to the selected menu item
/*function echoSelectedClassIfRequestMatches($requestUri)
{
    $current_file_name = basename($_SERVER['REQUEST_URI'], ".php");
    if ($current_file_name == $requestUri)
        echo 'class="selected"';
}*/

//Validation
function has_precence($value)
{
    return isset($value) && $value !== "";
}

/*function validate_presences($required_fields)
{
    global $errors;
    foreach ($required_fields as $field) {
        $value = trim($_POST[$field]);
        if (!has_precence($value)) {
            $errors[$field] = fieldname_as_text($field) . " mag niet leeg zijn.";
        }
    }
}*/

function form_errors($errors = array())
{
    $output = "";
    if (!empty($errors)) {
        $output .= "<div class=\"error\">";
        $output .= "Voldoe a.u.b aan de volgende eisen :";
        $output .= "<ul>";
        foreach ($errors as $key => $error) {
            $output .= "<li>{$error}</li>";
        }
        $output .= "</ul>";
        $output .= "</div>";
    }
    return $output;
}

/*function find_all_employees()
{
    global $connection;
    $query = "SELECT * FROM Employees";
    $employee_set = mysqli_query($connection, $query);
    check_query($employee_set);
    return $employee_set;
}*/

/*function find_all_customers()
{
    global $connection;
    $query = "SELECT * FROM Customer";
    $customer_set = mysqli_query($connection, $query);
    check_query($customer_set);
    return $customer_set;
}*/

function password_encrypt($password)
{
    $hash_format = "$2y$10$";   // Tells PHP to use Blowfish with a "cost" of 10
    $salt_length = 22;                    // Blowfish salts should be 22-characters or more
    $salt = generate_salt($salt_length);
    $format_and_salt = $hash_format . $salt;
    $hash = crypt($password, $format_and_salt);
    return $hash;
}

function generate_salt($length)
{
// Not 100% unique, not 100% random, but good enough for a salt
// MD5 returns 32 characters
    $unique_random_string = md5(uniqid(mt_rand(), true));

// Valid characters for a salt are [a-zA-Z0-9./]
    $base64_string = base64_encode($unique_random_string);

// But not '+' which is valid in base64 encoding
    $modified_base64_string = str_replace('+', '.', $base64_string);

// Truncate string to the correct length
    $salt = substr($modified_base64_string, 0, $length);
    return $salt;
}

/*function password_check($password, $existing_hash)
{
// existing hash contains format and salt at start
    $hash = crypt($password, $existing_hash);
    if ($hash === $existing_hash) {
        return true;
    } else {
        return false;
    }
}*/

/*function find_user_by_email($email)
{
    global $connection;

    $safe_email = mysqli_real_escape_string($connection, $email);
    $query = "SELECT * ";
    $query .= "FROM Customer ";
    $query .= "WHERE Email = '{$safe_email}' ";
    $query .= "LIMIT 1";
    $user_set = mysqli_query($connection, $query);
    check_query($user_set);
    if ($user = mysqli_fetch_assoc($user_set)) {
        return $user;
    } else {
        return null;
    }
}*/

/*function find_employee_by_email($email)
{
    global $connection;

    $safe_email = mysqli_real_escape_string($connection, $email);
    $query = "SELECT * ";
    $query .= "FROM Employees ";
    $query .= "WHERE User = '{$safe_email}' ";
    $query .= "LIMIT 1";
    $user_set = mysqli_query($connection, $query);
    check_query($user_set);
    if ($user = mysqli_fetch_assoc($user_set)) {
        return $user;
    } else {
        return null;
    }
}*/

/*function attempt_login($email, $password)
{
    $user = find_user_by_email($email);
    if ($user) {
// found user, now check password
        if (password_check($password, $user["Password"])) {
// password matches
            return $user;
        } else {
// password does not match
            return false;
        }
    } else {
// user not found
        return false;
    }
}*/

/*function attempt_employee_login($user, $password)
{
    $user1 = find_employee_by_email($user);
    if ($user1) {
// found user, now check password
        if (password_check($password, $user1["Password"])) {
// password matches
            return $user1;
        } else {
// password does not match
            return false;
        }
    } else {
// user not found
        return false;
    }
}*/

?>