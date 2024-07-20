<?php

return [
    'plural' => 'Attendees',
    'singular' => 'Attendee',
    'empty' => 'There are no attendees',
    'select' => 'Select Attendee',
    'trashed' => 'Trashed attendees',
    'permission' => 'Manage Attendees',
    'perPage' => 'Count Results Per Page',
    'actions' => [
        'list' => 'Attendees',
        'show' => 'Show Attendee',
        'create' => 'Create',
        'new' => 'New',
        'edit' => 'Edit Attendee',
        'delete' => 'Delete Attendee',
        'save' => 'Save',
        'filter' => 'Filter',
    ],
    'messages' => [
        'created' => 'The attendee has been created successfully.',
        'updated' => 'The attendee has been updated successfully.',
        'deleted' => 'The attendee has been deleted successfully.',
    ],
    'attributes' => [
        'name' => 'Name',
        'mobile' => 'Mobile',
        'email' => 'Email',
        'event_day_id' => 'Event date',
        'showtime_id' => 'Showtime',
        'movie_id' => 'Movie',
    ],
    'dialogs' => [
        'delete' => [
            'title' => 'Warning !',
            'info' => 'Are you sure you want to delete the attendee ?',
            'confirm' => 'Delete',
            'cancel' => 'Cancel',
        ],
    ],
];
