<?php include_once 'config/init.php'; ?>

<?php

//Class declarations
$job = new Job;
$category = new Category;

//declaraing php template
$template = new Template('templates/index.html.php');

$page = $_GET['page'] ?? 1;

//passing dynamic value to html.php template
$category_id = isset($_GET['category']) ? $_GET['category'] : null;
if($category_id) {
    $template->title = 'Jobs in ' . $category->getCategoryName($category_id)->name;
    $template->jobs = $job->jobByCategoryPagination(2,$category_id,$page);
} else {
    $template->title = "Latest Jobs";
    $template->jobs = $job->jobPagination(2,$page);
}

//display all categories to template html.php
$template->categories = $category->getAll();
$template->linkStatusAdmin = 'active';
//echo/display template
echo $template;
