<?php include_once 'config/init.php'; ?>

<?php

//Class declarations
$job = new Job;
$category = new Category;

//declaraing php template
$template = new Template('templates/index.html.php');

//passing dynamic value to html.php template
$category_id = isset($_GET['category']) ? $_GET['category'] : null;
if($category_id) {
    $template->title = "Jobs at " . $category->getCategoryName($category_id)->name;
    $template->jobs = $job->getAllByCategory($category_id);
} else {
    $template->title = "Latest Jobs";
    $template->jobs = $job->getAll();
}

//display all categories to template html.php
$template->categories = $category->getAll();

//echo/display template
echo $template;
