<?php
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('directories.index'));
});
?>