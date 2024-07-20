<?php

return [
    'plural' => 'Showtimes',
    'singular' => 'Showtime',
    'empty' => 'There are no showtimes',
    'select' => 'Select Showtime',
    'trashed' => 'Trashed showtimes',
    'permission' => 'Manage Showtimes',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'Showtimes',
        'show' => 'Show Showtime',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit Showtime',
        'delete' => 'Delete Showtime',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The showtime has been created successfully.',
        'updated' => 'The showtime has been updated successfully.',
        'deleted' => 'The showtime has been deleted successfully.',
    ],
    'attributes' => [
        'start_time' => 'Start Time',
        'end_time' => 'End Time',
        'start_time.date_format' => 'The start time must be in the format HH:MM.',
        'end_time.date_format' => 'The end time must be in the format HH:MM.',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the showtime ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
