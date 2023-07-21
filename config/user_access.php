<?php

return [

    /**
     * todo filter lookups data of faculty & bylaw & ..... according to user access and his permission on this faculty and module
     * used for [Add - Edit - any ] lookup options for this module.
     */
    'lookup_module' => [
        //module_name => permission_name
        'offerings' => 'access_offering',
        'students' => 'access_student',
        'registrations' => 'access_registration',
        'certificates' => 'access_certificate',

        'bylaws' => 'access_bylaw',
        'programs' => 'access_programs',
        'departments' => 'access_department',
        'courses' => 'access_course',
    ],

    /**
     * todo filter lookups data of each listing (filter options =>> faculty & bylaw & .....) according to user access and his permission on this faculty and controllers
     * used for lookups data in each listing of any controller
     */
    'controller_permission' => [
        //permission => Controller Class
        'access_offering' => \App\Http\Controllers\Api\Study\OfferingsController::class,
        'access_student' => \App\Http\Controllers\Api\Users\StudentsController::class,
        'access_registration' => \App\Http\Controllers\Api\Study\RegistrationsController::class,
        'access_certificate' => \App\Http\Controllers\Api\Services\CertificatesController::class,

        'access_faculty' => \App\Http\Controllers\Api\Programs\FacultiesController::class,
        'access_bylaw' => \App\Http\Controllers\Api\Programs\BylawsController::class,
        'access_programs' => \App\Http\Controllers\Api\Programs\ProgramsController::class,
        'access_department' => \App\Http\Controllers\Api\Programs\DepartmentsController::class,
        'access_course' => \App\Http\Controllers\Api\Programs\CoursesController::class,
    ],
];
