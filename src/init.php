<?php

if (!defined('ABSPATH')) {
    exit;
}

function read_more_block_assets() {
    wp_enqueue_style(
        'read_more_block-cgb-style-css',
        plugins_url('dist/blocks.style.build.css', __DIR__),
        ['wp-editor'],
        filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' )
    );
}

add_action('enqueue_block_assets', 'read_more_block_assets');

function read_more_block_editor_assets() {
    wp_enqueue_script(
        'read_more_block-js',
        plugins_url('/dist/blocks.build.js', __DIR__),
        ['wp-blocks', 'wp-i18n', 'wp-element', 'wp-editor'],
        filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.build.js' )
    );

    wp_enqueue_style(
        'read_more_block-editor-css', // Handle.
        plugins_url('dist/blocks.editor.build.css', __DIR__),
        ['wp-edit-blocks'],
        filemtime( plugin_dir_path( __DIR__ ) . 'dist/blocks.editor.build.css' )
    );
}

add_action('enqueue_block_editor_assets', 'read_more_block_editor_assets');

register_block_type('klarity/klarity-read-more-block', [
    'render_callback' => 'render_read_more',
    'attributes' => [
        'introBlock' => [
            'type' => 'string',
            'default' => '',
        ],
        'contentBlock' => [
            'type' => 'string',
            'default' => '',
        ],
        'textAlignment' => [
          'type' => 'string',
          'default' => 'left',
      ]
    ]
]);


function render_read_more( $attributes ) {
    $introBlock = $attributes['introBlock'] ?? '';
    $contentBlock = $attributes['contentBlock'] ?? '';
    $textAlignment = $attributes['textAlignment'] ?? 'left';
	// Custom Code fore read more text 2019/05/21
	$readmore_text = $attributes['read_more'] ?? 'Show more';
//	$readless_text = $attributes['read_less'] ?? 'Show less';
    wp_enqueue_script(
        'read-more-block-handler-js',
        plugins_url('/src/block/toggle-expand.js', __DIR__),
        [],
		filemtime(plugin_dir_path(__DIR__).'/src/block/toggle-expand.js')
    );
	return (
		'<div class="text-center">
			<div class="read-more-wrap text-'. $textAlignment .'">
        <p>'. $introBlock .'</p>
        <div class="read-more-target collapsed">
          <p>'. $contentBlock .'</p>
        </div>
      </div>
			<button class="read-more-trigger" data-readmore="'.esc_html($readmore_text).'" onclick="toggleExpand(this)">'.$readmore_text.'</button>
		</div>'
	);
}
