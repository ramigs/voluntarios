<?php

require "../resources/libs/password_compat-master/lib/password.php";

echo "Test for functionality of compat library: " . (PasswordCompat\binary\check() ? "Pass" : "Fail");
echo "\n";