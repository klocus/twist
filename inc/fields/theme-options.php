<?php

namespace Twist\Field;

use Carbon_Fields\Container;
use Carbon_Fields\Field;


add_action('carbon_fields_register_fields', function () {
    Container::make('theme_options', __('Theme Options', 'twist'))
        ->add_fields(array(
            Field::make('text', 'twist_text', 'Text Field'),
        ));
});