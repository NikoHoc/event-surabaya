<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Tools
### Tailwind CSS & DaisyUI
DaisyUI install: npm i -D daisyui@latest

Add daisyUI to tailwind.config.js:\n
module.exports = {
  //...
  plugins: [
    require('daisyui'),
  ],
}

run project:
- npm run dev
- php artisan serve

### jQuery
include this -> <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
### DataTables (for table)
include this ->
<link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
<script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>

usage->
<script>
$(document).ready(function () {
    $('#table').DataTable({
        language: {
            searchPlaceholder: "Cari ...", 
        }
    });
});
</script>

### TinyMCE (text editor)
install: npm install tinymce\t
add new files in resources/js/tinymce.js\t
add this in tinymce.js -> [About Page](https://docs.google.com/document/d/11Pzk1jCyRna7vW9tckGC8AcKR-VKkCtrJdYQ4-pPoss/edit?usp=sharing)\t
include -> @vite('resources/js/tinymce.js')\t
usage-> add class="editor" in textarea\t

tagify(for tags input)
include this ->
<link href="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.css" rel="stylesheet" type="text/css" />
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify"></script>
<script src="https://cdn.jsdelivr.net/npm/@yaireo/tagify/dist/tagify.polyfills.min.js"></script>

usage->
<script>
$(document).ready(function () {
    var input = $('#tags')[0];
    var tagify = new Tagify(input);
});
</script>

### Sweet Alert (for delete confirmation)
include this ->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
usage ->
<script>
$(document).ready(function () {
    $('.delete-form').on('submit', function(event) {
        event.preventDefault(); // Prevent the form from submitting immediately
        let form = $(this);
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                form.off('submit').submit(); // Allow form submission
            }
        });
    });
});
</script>

## Home Pages

#### Event Page
![event page](https://github.com/user-attachments/assets/3cd8bca2-cd4f-45f1-a6cb-61a7caccef76)

#### Event Detail Page
![event detail page](https://github.com/user-attachments/assets/1c8e41dd-c668-4c40-a1b2-50e0978347aa)

## Master Data Pages

### Master Event Category
1. Event category data page
![master event category page](https://github.com/user-attachments/assets/9933088f-b73b-47de-b089-e64b7977f5aa)
2. Event category Form page
![master event category form](https://github.com/user-attachments/assets/8d47a4dd-9b86-484c-8f4e-b1753a1e1663)

### Master Organizer
1. Organizer data page
![master organizer page](https://github.com/user-attachments/assets/50edaa85-b6fd-48ec-8898-b8490a50784e)
2. Organizer form page
![master organizer form](https://github.com/user-attachments/assets/b0af4f7e-48a1-4deb-a643-4fe64cff7380)
3. Detail organizer page
![master organizer detail page](https://github.com/user-attachments/assets/0ca1ff75-e400-4439-b4fd-af4cba92c3a1)


### Master Event
1. Event data page
![master event page](https://github.com/user-attachments/assets/5cc118ec-0224-42be-b47d-dfbaa6dfd9b0)
2. Event form page 1/2
![master event form 1](https://github.com/user-attachments/assets/d1b38ebe-e44b-4b0c-8911-8a77b1fda35b)
3. Event form page 2/2
![master event form 2](https://github.com/user-attachments/assets/e28a7ea8-c2fc-4a5b-b9ca-e56d1524b642)
