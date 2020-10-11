<?php

return [

    'home' => 'Home',
    'groups' => 'Groups',
    'group' => 'Group',
    'student' => 'Student',
    'students' => 'Students',
    'list_of_groups' => 'List of Groups',
    'list_of_students' => 'List of Students',
    'ok' => 'OK',
    'start_date' => 'Start Date',
    'end_date' => 'End Date',
    'action' => [
        'action' => 'Action',
        'add' => 'Add',
        'save' => 'Save',
        'create' => 'Create',
        'edit' => 'Edit',
        'update' => 'Update',
        'select' => 'Select',
        'delete' => 'Delete',
        'fill' => 'Fill this',
        'cancel' => 'Cancel',
        'submit' => 'Submit',
        'filter' => 'Filter',
        'clear' => 'Clear'
    ],
    'model' => [
        'group' => [
            'id' => 'Id',
            'number' => 'Number',
            'course' => 'Course',
            'faculty' => 'Faculty'
        ],
        'student' => [
            'id' => 'Id',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'dob' => 'Date of Birth',
            'patronymic' => 'Patronymic'
        ]
    ],
    'success_message' => [
        'group' => [
            'create' => 'Group was created successfully!',
            'update' => 'Group was updated successfully!',
            'delete' => 'Group was deleted successfully!'
        ],
        'student' => [
            'create' => 'Student was created successfully!',
            'update' => 'Student was updated successfully!',
            'delete' => 'Student was deleted successfully!'
        ]
    ],
    'error_message' => [
        'group' => [
            'not_found' => 'Group not found!',
            'has_students' => 'You can not delete group. It has students.',
        ],
        'student' => [
            'not_found' => 'Group not found!',
        ]
    ]
];
