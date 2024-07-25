<!doctype html>
<html lang="en" class="h-100">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>BASENGOK | All-in-one solution for your trip to Pulang Pisau Regency</title>

  <link rel="icon" type="image/x-icon" href="assets/favicon.ico">
  <link rel="stylesheet" href="<?= base_url('assets/css/bootstrap.css') ?>">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
  <link href='https://fonts.googleapis.com/css?family=Inter' rel='stylesheet'>
</head>

<?php
// Check if the current page is the home page
$isHomePage = ($_SERVER['REQUEST_URI'] === '/basengok/');
$bgImage = base_url('assets/img/landing.jpg');

// If it is the home page, include the style
if ($isHomePage) {
  echo '<body class="d-flex flex-column h-100">';
  echo '<style>body { background-image: url("' . $bgImage . '"); }</style>';
} else {
  echo '<body class="d-flex flex-column h-100">s';
}
?>

<main class="flex-shrink-0 text-white">