<?php
/**
 * Created by PhpStorm.
 * User: Stratege Takam
 * Date: 05/04/2019
 * Time: 16:40
 */

session_start();

unset($_SESSION["user"]);

header("location:../index.php");