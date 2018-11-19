<?php

//autentica.php
session_start();

//estas são as sessoes principais do meu site.
if (!isset($_SESSION['nome']) && !isset($_SESSION['email'])) {
    $msg = md5('Você não é admin');
    header('location:../../login.php?msg=' . $msg);
} 
