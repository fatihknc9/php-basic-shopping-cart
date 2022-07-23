<?php

if (isset($_COOKIE["product"]))
{
    echo count($_COOKIE["product"]);
} else {
    echo 0;
}

?>