<?php

require 'Student.php';

$student = new Student(99);

$id = $student->getId();


var_dump($id);


require  'index-view.php';