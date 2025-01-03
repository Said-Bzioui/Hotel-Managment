<?php 
// ---------------------Toast-------------------------
$success = false;
$error = false;
$deleted = false;
$updated = false;
$empty = false;
if (isset($_GET['success'])) {
    $success = true;
}
if (isset($_GET['deleted'])) {
    $deleted = true;
}
if (isset($_GET['updated'])) {
    $updated = true;
}
if (isset($_GET['empty'])) {
    $empty = true;
}

if ($empty) { ?>

<div class="fixed left-2/4 top-5 w-100 h-16 bg-gray-200 rounded-t-md border-red-500  mb-4 toast">
    <div class="container relative p-3 flex items-center w-full h-full  text-white  ">
        <i class="fa-solid fa-circle-exclamation text-red-500 mr-3"></i>
        <p class="text-red-800  font-bold">Tous Les Champ sont Obligatoire </p>
        <span class="h-1 w-full absolute bg-red-500 block left-0 bottom-0  "></span>
    </div>
</div>
<?php } ?>
<!-- Success -->
<?php
if ($success) { ?>

<div class="fixed left-2/3 top-5 w-60 h-16 bg-gray-200 rounded-t-md border-green-500  mb-4 toast">
    <div class="container relative p-3 flex items-center w-full h-full  text-white  ">
        <i class="fa-solid fa-square-check text-green-500 mr-3"></i>
        <p class="text-green-800  font-bold">Ajouté avec succès</p>
        <span class="h-1 w-full absolute bg-green-500 block left-0 bottom-0  "></span>
    </div>
</div>
<?php } ?>
<!-- Update -->
<?php
if ($updated) { ?>

<div class="fixed left-2/3 top-5 w-60 h-16 bg-gray-200 rounded-t-md border-blue-500  mb-4 toast">
    <div class="container relative p-3 flex items-center w-full h-full  text-white  ">
        <i class="fa-solid fa-square-check text-blue-500 mr-3"></i>
        <p class="text-blue-800  font-bold">Modifiére avec succès</p>
        <span class="h-1 w-full absolute bg-blue-500 block left-0 bottom-0  "></span>
    </div>
</div>
<?php } ?>
<!-- deleted -->
<?php
if ($deleted) { ?>

<div class="fixed left-2/3 top-5 w-60 h-16 bg-gray-200 rounded-t-md border-green-500  mb-4 toast">
    <div class="container relative p-3 flex items-center w-full h-full  text-white  ">
        <i class="fa-solid fa-square-check text-green-500 mr-3"></i>
        <p class="text-green-800  font-bold">supprimer avec succès</p>
        <span class="h-1 w-full absolute bg-green-500 block left-0 bottom-0  "></span>
    </div>
</div>
<?php } ?>