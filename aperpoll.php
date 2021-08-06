<?php
/*
Plugin Name: Aper Poll
Plugin URI:  https://apercloud.com
Description: Use polling functionality to get the answers you need. Aper Poll is easy to use poll plugin for WordPress websites.
Version:     1.0.0
Author:      luis goyburo
Author URI:  https://apercloud.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: aperpoll
*/


add_action( 'graphql_register_types', 'example_extend_wpgraphql_schema' );

function example_extend_wpgraphql_schema() {
  register_graphql_field( 'RootQuery', 'aperField', [
    'type' => 'AperType',
    'description' => __( 'Describe what the field should be used for', 'aperpoll' ),
    'resolve' => function() {
       return
       [
          'count' => 5,
          'testField' => 'test value...',
       ];
    }
  ] );

  register_graphql_object_type( 'AperType', [
    'description' => __( 'Describe what a AperType is', 'aperpoll' ),
    'fields' => [
      'testField' => [
        'type' => 'String',
        'description' => __( 'Describe what testField should be used for', 'aperpoll' ),
      ],
      'count' => [
        'type' => 'Int',
        'description' => __( 'Describe what the count field should be used for', 'aperpoll' ),
      ],
    ],
  ] );
};
