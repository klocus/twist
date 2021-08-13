<?php

namespace Twist\Block;

use Carbon_Fields\Block;
use Carbon_Fields\Field;
use Timber\Timber;

add_action('carbon_fields_register_fields', function () {
    Block::make(__('Example', 'twist'))
        ->add_fields(array(
            Field::make('text', 'title', __('Block Title', 'twist')),
            Field::make('image', 'image', __('Block Image', 'twist')),
            Field::make('rich_text', 'content', __('Block Content', 'twist')),
        ))
        ->set_render_callback(function ($fields, $attributes, $inner) {
            $context = array_merge(Timber::context(), compact(['fields', 'attributes', 'inner']));
	        Timber::render(['blocks/example.twig'], $context);
        });
});
