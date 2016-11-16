<?php
// Start the session
session_set_cookie_params(3600,"/");
session_start();

?>

<?php
echo 'working';
echo $_SESSION['name'];
echo $_SESSION['email_id'];

?>