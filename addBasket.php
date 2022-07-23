<?php

if ($_POST)
{
    $id = htmlspecialchars(trim($_POST["id"]));
    if (is_numeric($id)) //CONTROL
    {
        if (isset($_COOKIE["product"]))
        {
            if (isset($_COOKIE["product"][$id])) //CONTROL
            {
                setcookie("product[".$id."]", true, time() - 86400); //DELETE
            } else {
                setcookie("product[".$id."]", true, time() + 86400); //ADD
            }
        } else {
            setcookie("product[".$id."]", true, time() + 86400); //ADD
        }

    }
}

?>