<?php

namespace Twist\Block;

use Carbon_Fields\Block;
use Carbon_Fields\Field;

add_action('carbon_fields_register_fields', function () {
    Block::make(__('Example', 'twist'))
        ->add_fields(array(
            Field::make('text', 'heading', __('Block Heading', 'twist')),
            Field::make('image', 'image', __('Block Image', 'twist')),
            Field::make('rich_text', 'content', __('Block Content', 'twist')),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner) {
            get_template_part('views/block', 'example', compact(['fields', 'attributes', 'inner']));
        });
});