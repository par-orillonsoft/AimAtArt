<?php

if ( ! class_exists('ether_slider_ready_widget'))
{
	class ether_slider_ready_widget extends ether_builder_widget
	{
		protected function get_tiles($widget, $meta = array())
		{
			$tiles = array();

			if (class_exists('ether_tile'))
			{
				$tiles = ether_tile::get_tiles(array('order' => $widget['order'], 'orderby' => $widget['orderby'], 'numberposts' => $widget['numberposts'], 'meta' => $meta), $widget['term']);
			}

			return $tiles;
		}

		protected function get_posts($widget, $post_type, $meta = array(), $select_by = '')
		{
			$widget = ether::extend( array
			(
				'select' => '',
				'taxonomy' => '',
				'term' => ''
			), $widget);

			$args = array('post_type' => $post_type, 'order' => $widget['order'], 'orderby' => $widget['orderby'], 'numberposts' => $widget['numberposts'], 'meta' => $meta);

			if ($post_type == 'post' OR $post_type == 'page')
			{
				$args['text_opt'] = 'excerpt';
			}

			if ($widget['select'] == 'featured')
			{
				$args['meta_key'] = ether::config('prefix').'featured';
				$args['meta_value'] = 'on';
			}

			if ( ! empty($widget['taxonomy']) AND ! empty($widget['term']))
			{
				$args['tax_query'] = array
				(
					array
					(
						'taxonomy' => $widget['taxonomy'],
						'field' => 'slug',
						'terms' => array($widget['term'])
					)
				);
			}

			$posts = array();

			if ($widget['select'] == 'related' AND is_singular($post_type))
			{
				$taxonomy = array('category', 'post_tag');

				if ($post_type != 'post' AND ! empty($widget['taxonomy']))
				{
					$taxonomy = $widget['taxonomy'];
				}

				$posts = ether::get_posts_related($args, $taxonomy);
			}

			if (empty($posts))
			{
				$posts = ether::get_posts($args);
			}

			return $posts;
		}

		protected function get_classes($widget)
		{
			$widget = ether::extend( array
			(
				'slider' => '',
				'autoplay' => '',
				'autoplay_invert' => '',
				'autoplay_interval' => '',
				'scroll' => '',
				'transition' => '',
				'grid_height' => '',
				'navigation' => '',
				'ctrl_arrows' => '',
				'ctrl_pag' => '',
				'ctrl_arrows_pos_x' => '',
				'ctrl_arrows_pos_y' => '',
				'ctrl_arrows_pos_shift_x' => '',
				'ctrl_arrows_pos_shift_y' => '',
				'ctrl_arrows_spacing' => '',
				'ctrl_arrows_full_width' => '',
				'ctrl_pag_pos_x' => '',
				'ctrl_pag_pos_y' => '',
				'ctrl_pag_pos_shift_x' => '',
				'ctrl_pag_pos_shift_y' => '',
				'ctrl_pag_spacing' => '',
				'ctrl_style' => '',
				'ctrl_padding' => '',
				'ctrl_hide_delay' => '',
				'scroll_on_mousewheel' => '',
				'pause_autoplay_on_hover' => '',
				'loop' => '',
				'random_order' => ''
			), $widget);

			$classes = array();

			$classes[] = 'grid';

			if ($widget['slider'] == 'on')
			{
				$classes[] = 'slider';
				$classes[] = 'slider-1';

				if ($widget['autoplay'] == 'on')
				{
					$classes[] = 'autoplay-1';
					$classes[] = 'autoplay-interval-'.$widget['autoplay_interval'];

					if ($widget['autoplay_invert'] == 'on')
					{
						$classes[] = 'autoplay-invert-1';
					}

					if ($widget['pause_autoplay_on_hover'] == 'on')
					{
						$classes[] = 'pause-autoplay-on-hover-1';
					}
				}

				if ( ! empty($widget['scroll']))
				{
					$classes[] = 'scroll-axis-'.$widget['scroll'];
				}

				if ( ! empty($widget['transition']))
				{
					$classes[] = 'transition-'.$widget['transition'];
				}

				if ( ! empty($widget['grid_height']))
				{
					$classes[] = 'grid-height-'.$widget['grid_height'];
				}

				if ($widget['navigation'] != 0)
				{
					if ( ! empty($widget['ctrl_always_visible']) && $widget['ctrl_always_visible'] == 'on')
					{
						$classes[] = 'ctrl-always-visible-1';
					} else
					{
						if ($widget['ctrl_hide_delay'] != 1000)
						{
							$classes[] = 'ctrl-hide-delay-'.$widget['ctrl_hide_delay'];
						}
					}

					if ( ! empty($widget['ctrl_padding']) && is_numeric($widget['ctrl_padding']))
					{
						$classes[] = 'ctrl-padding-'.$widget['ctrl_padding'];
					}
				}

				if ($widget['navigation'] == 1)
				{
					$classes[] = 'ctrl-arrows-1';
				} else if ($widget['navigation'] == 2)
				{
					$classes[] = 'ctrl-pag-1';
				} else if ($widget['navigation'] == 3)
				{
					$classes[] = 'ctrl-pag-1';
					$classes[] = 'ctrl-arrows-1';
				}

				if ($widget['navigation'] == 1 || $widget['navigation'] == 3)
				{
					if ( ! empty($widget['ctrl_arrows_pos_x']))
					{
						$classes[] = 'ctrl-arrows-pos-x-'.$widget['ctrl_arrows_pos_x'];
					}

					if ( ! empty($widget['ctrl_arrows_pos_y']))
					{
						$classes[] = 'ctrl-arrows-pos-y-'.$widget['ctrl_arrows_pos_y'];
					}

					if ( ! empty($widget['ctrl_arrows_pos_shift_x']) && is_numeric($widget['ctrl_arrows_pos_shift_x']))
					{
						$classes[] = 'ctrl-arrows-pos-shift-x-'.$widget['ctrl_arrows_pos_shift_x'];
					}

					if ( ! empty($widget['ctrl_arrows_pos_shift_y']) && is_numeric($widget['ctrl_arrows_pos_shift_y']))
					{
						$classes[] = 'ctrl-arrows-pos-shift-y-'.$widget['ctrl_arrows_pos_shift_y'];
					}

					if ( ! empty($widget['ctrl_arrows_spacing']) && is_numeric($widget['ctrl_arrows_spacing']))
					{
						$classes[] = 'ctrl-arrows-spacing-'.$widget['ctrl_arrows_spacing'];
					}

					if ( $widget['ctrl_arrows_full_width'] == 'on')
					{
						$classes[] = 'ctrl-arrows-full-width-1';
					}
				}

				if ($widget['navigation'] == 2 || $widget['navigation'] == 3)
				{
					if ( ! empty($widget['ctrl_pag_pos_x']))
					{
						$classes[] = 'ctrl-pag-pos-x-'.$widget['ctrl_pag_pos_x'];
					}

					if ( ! empty($widget['ctrl_pag_pos_y']))
					{
						$classes[] = 'ctrl-pag-pos-y-'.$widget['ctrl_pag_pos_y'];
					}

					if ( ! empty($widget['ctrl_pag_pos_shift_x']) && is_numeric($widget['ctrl_pag_pos_shift_x']))
					{
						$classes[] = 'ctrl-pag-pos-shift-x-'.$widget['ctrl_pag_pos_shift_x'];
					}

					if ( ! empty($widget['ctrl_pag_pos_shift_y']) && is_numeric($widget['ctrl_pag_pos_shift_y']) == 'integer')
					{
						$classes[] = 'ctrl-pag-pos-shift-y-'.$widget['ctrl_pag_pos_shift_y'];
					}

					if ( ! empty($widget['ctrl_pag_spacing']) && is_numeric($widget['ctrl_pag_spacing']))
					{
						$classes[] = 'ctrl-pag-spacing-'.$widget['ctrl_pag_spacing'];
					}

				}

				if ($widget['scroll_on_mousewheel'] == 'on')
				{
					$classes[] = 'scroll-on-mousewheel-1';
				}

				$classes[] = 'view-pos-'.$widget['view_pos'];

				$classes[] = 'theme-'.$widget['theme'];

				if ($widget['loop'] == 'on')
				{
					$classes[] = 'loop-1';
				}

				if ($widget['random_order'] == 'on')
				{
					$classes[] = 'random-order-1';
				}

			} else
			{
				//$classes[] = 'slider-0';
			}

			return $classes;
		}

		protected function form_slider($widget)
		{

			$transition = array
			(
				'slide' => ether::langr('Slide'),
				'slideIn' => ether::langr('Slide in'),
				'slideOut' => ether::langr('Slide out'),
				'switch' => ether::langr('Switch'),
				'random' => ether::langr('Random')
			);

			$scroll = array
			(
				'x' => ether::langr('Horizontal'),
				'y' => ether::langr('Vertical'),
				'z' => ether::langr('Fade'),
				'random' => ether::langr('Random')
			);

			$view_pos = array();

			if ( ! empty($widget) AND isset($widget['columns']) AND isset($widget['rows']))
			{
				foreach ($widget as $item)
				{
					if (is_array($item))
					{
						$i = ceil(count($item) / ($widget['rows'] * $widget['columns']));

						for ($j = 0; $j < $i - 1; $j++)
						{
							$k = $j + 1;
							array_push($view_pos, $k);
						}

						break;
					}
				}
			}

			$autoplay_interval = array();

			foreach (array(1, 3, 5, 10, 15, 30, 60) as $value)
			{
				$autoplay_interval[$value] = ($value == 1 ? ether::langr('%s second', $value) : ether::langr('%s seconds', $value));
			}

			$navigation = array
			(
				'0' => ether::langr('Disabled'),
				'1' => ether::langr('Prev/Next buttons'),
				'2' => ether::langr('Pagination'),
				'3' => ether::langr('Prev/Next buttons, pagination')
			);

			$nav_pos_x = array
			(
				'center' => ether::langr('Center (Default)'),
				'left' => ether::langr('Left'),
				'right' => ether::langr('Right')
			);

			$nav_pos_y = array
			(
				'top' => ether::langr('Top (Default)'),
				'center' => ether::langr('Center'),
				'bottom' => ether::langr('Bottom')
			);

			$ctrl_styles = array();

			for ($i = 0; $i < 8; $i++)
			{
				$ctrl_styles[$i] = ($i == 0 ? 'Default' : $i);
			}

			$ctrl_themes = array
			(
				'light' => 'Light',
				'dark' => 'Dark'
			);

			$ctrl_hide_delay = array
			(
				1000 => '1s Default',
				500 => '0.5s',
				250 => '0.25s',
				2500 => '2.5s',
				5000 => '5s',
				10000 => '10s'
			);

			return '<h2 class="ether-tab-title">'.ether::langr('Slider Settings').'</h2>
				<div class="ether-tab-content">
					<div class="cols cols-3">
						<div class="col">
							<label>'.$this->field('checkbox', 'slider', $widget, array('class' => 'ether-cond-field ether-field-slider-options')).' <span class="label-title">'.ether::langr('Slider').'</span></label>
						</div>
						<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-slider-options">
							<label>'.$this->field('checkbox', 'advanced_options', $widget, array('class' => 'ether-cond-field ether-field-advanced-options')).' <span class="label-title">'.ether::langr('Show advanced options').'</span></label>
						</div>
					</div>

					<div class="ether-cond-group ether-action-show-ether-cond-on-ether-field-slider-options">
						<hr />
						<h3 class="ether-section-title">General slider options</h3>
						<div class="cols-4">
							<div class="col">
								<label><span class="label-title">'.ether::langr('Start pos').'</span> '.$this->field('select', 'view_pos', $widget, array('options' => $view_pos)).'</label>
							</div>
							<div class="col"><label><span class="label-title">'.ether::langr('Scroll dir').'</span> '.$this->field('select', 'scroll', $widget, array('options' => $scroll)).'</label>
							</div>
							<div class="col"><label><span class="label-title">'.ether::langr('Transition').'</span> '.$this->field('select', 'transition', $widget, array('options' => $transition)).'</label>
							</div>
							<div class="col">
								<label>'.$this->field('checkbox', 'scroll_on_mousewheel', $widget).' <span class="label-title">'.ether::langr('Scroll on MouseWheel').'</span></label>
							</div>
						</div>

						<div class="cols-4">
							<div class="col">
								<label>'.$this->field('checkbox', 'loop', $widget).' <span class="label-title">'.ether::langr('Loop').'</span></label>
							</div>
							<div class="col">
								<label>'.$this->field('checkbox', 'random_order', $widget).' <span class="label-title">'.ether::langr('Random order').'</span></label>
							</div>
						</div>

						<div class="cols-4">
							<div class="col">
								<label>'.$this->field('checkbox', 'autoplay', $widget, array('class' => 'ether-cond-field ether-field-autoplay')).' <span class="label-title">'.ether::langr('Autoplay').'</span></label>
							</div>
							<div class="col">
								<label class="ether-cond-group ether-action-show-ether-cond-on-ether-field-autoplay">'.$this->field('checkbox', 'autoplay_invert', $widget).' <span class="label-title">'.ether::langr('Invert Autoplay Dir').'</span></label>
							</div>
							<div class="col">
								<label class="ether-cond-group ether-action-show-ether-cond-on-ether-field-autoplay"><span class="label-title">'.ether::langr('Autoplay interval').'</span> '.$this->field('select', 'autoplay_interval', $widget, array('options' => $autoplay_interval)).'</label>
							</div>
							<div class="col">
								<label class="ether-cond-group ether-action-show-ether-cond-on-ether-field-autoplay">'.$this->field('checkbox', 'pause_autoplay_on_hover', $widget).' <span class="label-title">'.ether::langr('Pause autoplay on hover').'</span></label>
							</div>
						</div>

						<hr />
						<h3 class="ether-section-title">General nav options</h3>

						<div class="cols-1">
							<div class="col">
								<label><span class="label-title">'.ether::langr('Nav Style').'</span> '.$this->field('select', 'navigation', $widget, array('options' => $navigation, 'class' => 'ether-cond-field ether-field-nav-options')).'</label>
							</div>
						</div>

						<div class="ether-cond-group ether-action-show-ether-cond-1-ether-cond-2-ether-cond-3-ether-field-nav-options">
							<div class="cols-4">
								<div class="col">
									<label>'.$this->field('checkbox', 'ctrl_always_visible', $widget).' <span class="label-title">'.ether::langr('Always show nav').'</span>
									</label>
								</div>

								<div class="col">
									<label><span class="label-title">'.ether::langr('Nav Style').'</span> '.$this->field('select', 'ctrl_style', $widget, array('options' => $ctrl_styles)).'</label>
								</div>

								<div class="col">
									<label><span class="label-title">'.ether::langr('Theme').'</span> '.$this->field('select', 'theme', $widget, array('options' => $ctrl_themes)).'<small>Mostly affects navigation. Use light for light themes and dark for dark ones</small></label>
								</div>

								<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-advanced-options">
									<label class="">
										<span class="label-title">'.ether::langr('Nav padding').'</span> '.$this->field('text', 'ctrl_padding', $widget, array('value' => '8')).'<small>'.ether::langr('Defines navigation padding from the element bounds. Default value will be used if left blank').'</small>
									</label>
								</div>
							</div>

							<div class="cols-4 ether-cond-group ether-action-show-ether-cond-on-ether-field-advanced-options">
								<div class="col">
									<label><span class="label-title">'.ether::langr('Nav fade out delay').'</span> '.$this->field('select', 'ctrl_hide_delay', $widget, array('options' => $ctrl_hide_delay)).'</label>
								</div>
							</div>
							<hr />
						</div>

						<div class="ether-cond-group ether-action-show-ether-cond-1-ether-cond-3-ether-field-nav-options">
							<h3 class="ether-section-title">Prev/Next Arrows</h3>
							<div class="cols-4">
								<div class="col">
									<label><span class="label-title">'.ether::langr('Arrows horiz pos').'</span> '.$this->field('select', 'ctrl_arrows_pos_x', $widget, array('options' => $nav_pos_x)).'</label>
								</div>
								<div class="col">
									<label><span class="label-title">'.ether::langr('Arrows vert pos').'</span> '.$this->field('select', 'ctrl_arrows_pos_y', $widget, array('options' => $nav_pos_y)).'</label>
								</div>
								<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-advanced-options">
									<label class="">
										<span class="label-title">'.ether::langr('Arrows horiz pos shift').'</span> '.$this->field('text', 'ctrl_arrows_pos_shift_x', $widget).'<small>('.ether::langr('Horiz shift of navigation arrows relative to vorizontal arrows pos value. Default: 0').')</small>
									</label>
								</div>
								<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-advanced-options">
									<label class="">
										<span class="label-title">'.ether::langr('Arrows vert pos shift').'</span> '.$this->field('text', 'ctrl_arrows_pos_shift_y', $widget).'<small>('.ether::langr('Vert shift of navigation arrows relative to vert arrows pos value. Default: 0').')</small>
									</label>
								</div>
							</div>

							<div class="cols-4">
								<div class="col">
									<label>'.$this->field('checkbox', 'ctrl_arrows_full_width', $widget).' <span class="label-title">'.ether::langr('Full width arrows').'</span> <small>Arrows will expand as far as possible from each other within element bounds</small>
									</label>
								</div>
								<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-advanced-options">
									<label class="">
										<span class="label-title">'.ether::langr('Arrows spacing').'</span> '.$this->field('text', 'ctrl_arrows_spacing', $widget).'<small>'.ether::langr('Defines minimum distance of arrow elements from one another. Default value will be used if left blank').'</small>
									</label>
								</div>
							</div>
							<hr />
						</div>

						<div class="ether-cond-group ether-action-show-ether-cond-2-ether-cond-3-ether-field-nav-options">
							<h3 class="ether-section-title">Pagination</h3>
							<div class="cols-4">
								<div class="col">
									<label><span class="label-title">'.ether::langr('Pag horiz pos').'</span> '.$this->field('select', 'ctrl_pag_pos_x', $widget, array('options' => $nav_pos_x)).'</label>
								</div>
								<div class="col">
									<label><span class="label-title">'.ether::langr('Pag vert pos').'</span> '.$this->field('select', 'ctrl_pag_pos_y', $widget, array('options' => $nav_pos_y)).'</label>
								</div>
								<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-advanced-options">
									<label class="">
										<span class="label-title">'.ether::langr('Pag horiz pos shift').'</span> '.$this->field('text', 'ctrl_pag_pos_shift_x', $widget).'<small>('.ether::langr('Horiz shift of navigation pag relative to vorizontal pag pos value. Default: 0').')</small>
									</label>
								</div>
								<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-advanced-options">
									<label class="">
										<span class="label-title">'.ether::langr('Pag vert pos shift').'</span> '.$this->field('text', 'ctrl_pag_pos_shift_y', $widget).'<small>('.ether::langr('Vert shift of navigation pag relative to vert pag pos value. Default: 0').')</small>
									</label>
								</div>
							</div>
							<div class="cols-4">
								<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-advanced-options">
									<label class="">
										<span class="label-title">'.ether::langr('Pagination spacing').'</span> '.$this->field('text', 'ctrl_pag_spacing', $widget).'<small>('.ether::langr('Defines minimum distance of pagination elements from one another. Default value will be used if left blank').')</small>
									</label>
								</div>
							</div>
						</div>
					</div>
				</div>';
		}

		protected function form_posts($widget, $post_type = 'post', $taxonomy = 'category')
		{
			if ($post_type == 'tile' AND ! class_exists('ether_tile'))
			{
				return '';
			}

			$terms = array();
			$terms[''] = ether::langr('All');

			if ( ! empty($taxonomy))
			{
				$taxonomy_object = get_taxonomy($taxonomy);
				$term_objects = get_terms($taxonomy);

				foreach ($term_objects as $term)
				{
					$terms[$term->slug] = $term->name;
				}
			}

			$orderby = array
			(
				'none' => ether::langr('None'),
				'ID' => ether::langr('ID'),
				'title' => ether::langr('Title'),
				'date' => ether::langr('Date'),
				'modified' => ether::langr('Modified'),
				'parent' => ether::langr('Parent'),
				'rand' => ether::langr('Random'),
				'menu_order' => ether::langr('Menu order')
			);

			$order = array
			(
				'ASC' => ether::langr('Ascending'),
				'DESC' => ether::langr('Descending')
			);

			$count = array();
			$count['-1'] = ether::langr('All');

			for ($i = 1; $i <= 30; $i++)
			{
				$count[$i] = $i;
			}

			if ( ! is_array($widget) or empty($widget))
			{
				$widget['numberposts'] = 5;
			}

			$customs = array();
			$post_types = array();
			$taxonomies = array();

			if ($post_type == '')
			{
				$customs = get_post_types(array('_builtin' => FALSE), 'objects');

				$taxonomies[''] = ether::langr('All');

				foreach ($customs as $id => $data)
				{
					$post_types[$id] = $data->labels->name;

					foreach ($data->taxonomies as $tax)
					{

						$taxonomy_object = array(get_taxonomy($tax));

						$taxonomies[$id.'-'.$tax] = $taxonomy_object[0]->labels->name;

						$term_objects = get_terms($tax);

						foreach ($term_objects as $term)
						{
							$terms[$id.'-'.$tax.'-'.$term->slug] = $term->name;
						}
					}
				}
			}

			return ($post_type == '' ?
				'<div class="cols cols-3">
					<div class="col">
						<label><span class="label-title">'.ether::langr('Post type').'</span> '.$this->field('select', 'post_type', $widget, array('options' => $post_types)).'</label>
					</div>
					<div class="col">
						<label><span class="label-title">'.ether::langr('Taxonomy').'</span> '.$this->field('select', 'taxonomy', $widget, array('options' => $taxonomies)).'</label>
					</div>
					<div class="col">
						<label><span class="label-title">'.ether::langr('Term').'</span> '.$this->field('select', 'term', $widget, array('options' => $terms)).'</label>
					</div>
				</div>'
			:
				$this->field('hidden', 'taxonomy', $taxonomy)
			).'
			'.( ! empty($taxonomy) ? '<label><span class="label-title">'.$taxonomy_object->labels->name.'</span> '.$this->field('select', 'term', $widget, array('options' => $terms)).'</label>' : '').'
			<div class="cols-3">
				<div class="col"><label><span class="label-title">'.ether::langr('Order by').'</span> '.$this->field('select', 'orderby', $widget, array('options' => $orderby)).'</label></div>
				<div class="col"><label><span class="label-title">'.ether::langr('Order').'</span> '.$this->field('select', 'order', $widget, array('options' => $order)).'</label></div>
				<div class="col"><label><span class="label-title">'.ether::langr('Count').'</span> '.$this->field('select', 'numberposts', $widget, array('options' => $count)).'</label></div>
			</div>';
		}
	}
}

if ( ! class_exists('ether_plain_text_widget'))
{
	class ether_plain_text_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('plain-text', ether::langr('Plain text'));
			$this->label = ether::langr('Simple plain text widget');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'text_align' => 'left',
				'disable_formatting' => '',
				'classes' => ''
			),
			$this->get_defaults(
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			$text = isset($widget['text']) ? $widget['text'] : '';

			if ($widget['disable_formatting'] != 'on')
			{
				$text = wpautop($text);
			}

			$classes = array();

			if ($widget['text_align'] != 'left')
			{
				$classes[] = 'text-align'.$widget['align'];
			}

			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			$text = '<div'.$this->_class(array(), $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'.$text.'</div>';

			return $text;
		}

		public function form($widget)
		{
			$text_align = array('left' => ether::langr('Left'), 'right' => ether::langr('Right'), 'center' => ether::langr('Center'));

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Text Align').'</span> '.$this->field('select', 'text_align', $widget, array('options' => $text_align)).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label>'.$this->field('checkbox', 'disable_formatting', $widget).' <span class="label-title">'.ether::langr('Disable formatting').'</span></label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Plain text').'</span> '.$this->field('textarea', 'text', $widget).'<small>'.ether::langr('Plain text, shortcodes. Default wordpress formatting will be applied.').'</small></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols col-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_code_widget'))
{
	class ether_code_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('code', ether::langr('Syntax Highlighter'));
			$this->label = ether::langr('Syntax highlighter');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'classes'
			),
			$this->get_defaults(
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			$classes = array('widget', 'code');
			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			ether::stylesheet('shCoreDefault', 'media/stylesheets/libs/sh/shCoreDefault.css');
			ether::script('shCore', 'media/scripts/libs/sh/shCore.js');
			ether::script('shAutoloader', 'media/scripts/libs/sh/shAutoloader.js', array('shCore'));

			$code = isset($widget['code']) ? $widget['code'] : '';

			return '
			<div '.$this->_class($classes).' style="'.$this->set_widget_width_styles($widget).'">
				<pre class="brush: '.$widget['type'].';">'.htmlspecialchars($code).'</pre>
			</div>';

		}

		public function form($widget)
		{
			$types = array
			(
				'as3' => ether::langr('AS3'),
				'applescript' => ether::langr('Apple Script'),
				'bash' => ether::langr('Bash'),
				'csharp' => ether::langr('C#'),
				'coldfusion' => ether::langr('Cold Fusion'),
				'cpp' => ether::langr('C++'),
				'css' => ether::langr('CSS'),
				'delphi' => ether::langr('Delphi'),
				'diff' => ether::langr('Diff'),
				'erlang' => ether::langr('Erlang'),
				'groovy' => ether::langr('Groovy'),
				'javascript' => ether::langr('Java Script'),
				'java' => ether::langr('Java'),
				'javafx' => ether::langr('JavaFX'),
				'perl' => ether::langr('Perl'),
				'php' => ether::langr('PHP'),
				'plain' => ether::langr('Plain'),
				'powershell' => ether::langr('Power Shell'),
				'python' => ether::langr('Python'),
				'ruby' => ether::langr('Ruby'),
				'sass' => ether::langr('SASS'),
				'scala' => ether::langr('Scala'),
				'sql' => ether::langr('SQL'),
				'vb' => ether::langr('Visual Basic'),
				'xml' => ether::langr('XML')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Code type').'</span> '.$this->field('select', 'type', $widget, array('options' => $types)).'</label>
					<label><span class="label-title">'.ether::langr('Code').'</span> '.$this->field('textarea', 'code', $widget).'</label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
				</div>
			</fieldset>';
		}

		public function get_summary ($widget)
		{
			return isset($widget['type']) && ! empty($widget['type']) ? $widget['type'] : '';
		}
	}
}

if ( ! class_exists('ether_rich_text_widget'))
{
	class ether_rich_text_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('rich-text', ether::langr('Rich text'));
			$this->label = ether::langr('Advance text editor powered by TinyMCE');
		}

		public function widget($widget)
		{
			return wpautop($widget['text']);
		}

		public function form($widget)
		{
			ob_start();
			media_buttons($this->get_field_name('text'));
			$mediabuttons = ob_get_clean();

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.( ! user_can_richedit() ? '<p class="ether-error">'.ether::langr('Rich text editor has been disabled. Check your account settings.').'</p>' : '').'
					<div class="wp-editor-tools">
						<!--<a id="content-html" class="hide-if-no-js wp-switch-editor switch-html" onclick="switchEditors.switchto(this);">'.ether::langr('HTML').'</a>
						<a id="content-tmce" class="hide-if-no-js wp-switch-editor switch-tmce" onclick="switchEditors.switchto(this);">'.ether::langr('Visual').'</a>-->
						'.$mediabuttons.'
					</div>
					<div class="wp-editor-wrap">
						<div class="wp-editor-container">
							<textarea'.$this->get_field_atts('text').' name="'.$this->get_field_name('text').'" id="'.$this->get_field_name('text').'" cols="15" class="tinymce">'.(isset($widget['text']) ? wpautop($widget['text']) : '').'</textarea>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_html_widget'))
{
	class ether_html_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('html', ether::langr('HTML'));
			$this->label = ether::langr('Simple HTML widget');
		}

		public function widget($widget)
		{
			return (isset($widget['html']) ? $widget['html'] : '');
		}

		public function form($widget)
		{
			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					<label><span class="label-title">'.ether::langr('HTML code').'</span> '.$this->field('textarea', 'html', $widget).'<small>'.ether::langr('HTML code, shortcodes. No code formatting.').'</small></label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_heading_widget'))
{
	class ether_heading_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('heading', ether::langr('Heading'));
			$this->label = ether::langr('Simple heading widget');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'type' => 'h2',
				'title' => '',
				'classes' => ''
			),
			$this->get_defaults(
				'widget_pos_align', 
				'widget_clearfloat'
			)), $widget);

			if ( ! empty($widget['title']))
			{
				$title = $widget['title'];
			} else
			{
				$title = get_the_title(ether::get_id());

				ether::config('hide_title', TRUE);
			}

			$classes = array();
			$classes = $this->append_classes($classes, $widget, array('widget_alignment','widget_clearfloat'));

			return '<'.$widget['type'].$this->_class($classes, $widget['classes']).((isset($widget['id']) AND ! empty($widget['id'])) ? ' id="'.$widget['id'].'"' : '').' style="'.$this->set_widget_width_styles($widget).'">'.$widget['title'].'</'.$widget['type'].'>';
		}

		public function form($widget)
		{
			$types = array
			(
				'h1' => 'H1',
				'h2' => 'H2',
				'h3' => 'H3',
				'h4' => 'H4',
				'h5' => 'H5',
				'h6' => 'H6'
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
				'.$this->form_widget_general($widget).'
				'.$this->form_widget_clearfloat($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Title').'</span> '.$this->field('text', 'title', $widget).'<small>('.ether::langr('If you leave this field blank, post title will be used').')</small></label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Type').'</span> '.$this->field('select', 'type', $widget, array('options' => $types)).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('ID').'</span> '.$this->field('text', 'id', $widget).'</label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary ($widget)
		{
			return isset($widget['type']) && ! empty($widget['type']) ? $widget['type'] : 'h1';
		}
	}
}

if ( ! class_exists('ether_image_widget'))
{
	class ether_image_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('image', ether::langr('Image'));
			$this->label = ether::langr('Simple Image widget');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'align' => '',
				'frame' => '',
				'show_img_title' => '',
				'img_title_alignment_y' => 'bottom',
				'img_title_alignment_x' => '',
				'use_lightbox' => '',
				'url' => '',
				'image' => '',
				'description' => '',
				'new_tab' => '',
				'classes' => ''
			),
			$this->get_defaults('widget_clearfloat')), $widget);

			$classes = array('widget', 'img');

			$classes = $this->append_classes($classes, $widget, 'widget_alignment');
			$classes = $this->append_classes($classes, $widget, 'widget_clearfloat');

			preg_match('/(\d*)(.*)/', $widget['image_width'], $width_unit);
			$width_unit = $width_unit[2] === '' ? 'px' : $width_unit[2];

			preg_match('/(\d*)(.*)/', $widget['image_height'], $height_unit);
			$height_unit = $height_unit[2] === '' ? 'px' : $height_unit[2];

			$widget = $this->get_data($widget, 'image_dimensions');

			if ($widget['image_crop_width'] > 0 OR $widget['image_crop_height'] > 0)
			{
				$widget['image'] = ether::get_image_thumbnail(ether::get_image_base($widget['image']), $widget['image_crop_width'], $widget['image_crop_height']);
			}

			if ( ! empty($widget['frame']))
			{
				$classes[] = 'frame';
				$classes[] = 'frame-'.$widget['frame'];
			}

			if ( ! empty($widget['description']))
			{
				$classes = $this->append_classes($classes, $widget, 'img_title');
			}

			if ($widget['use_lightbox'] == 'on')
			{
				if (empty($widget['url']))
				{
					$widget['url'] = $widget['image'];
				}
			}

			if ($widget['new_tab'] == 'on')
			{
				if (empty($widget['url']))
				{
					$widget['url'] = $widget['image'];
				}
			}

			$output = '';

			if ( ! empty($widget['url']))
			{
				$output .= '<a href="'.$widget['url'].'"'.$this->_class($classes, $widget['classes']);
				$output .= ($widget['new_tab'] == 'on' ? ' target="_blank"' : '');
				$output .= ($widget['use_lightbox'] == 'on' ? ' rel="lightbox"' : '');
			} else
			{
				$output .= '<span '.$this->_class($classes, $widget['classes']);
			}

			$output .= ' style="';
			$output .= ($width_unit == '%' ? 'width: '.$widget['image_width'].';' : '');
			$output .= ($height_unit == '%' ? 'height: '.$widget['image_height'].';' : '');
			$output .= '"';
			$output .='>';

			$output .= '<img src="'.( ! empty($widget['image']) ? ether::img($widget['image'], 'image') : '').'" ';
			$output .= 'alt="'.( ! empty($widget['description']) ? $widget['description'] : '').'" ';
			$output .= (! empty($widget['image_width']) && $width_unit != '%' ? ' width="'.$widget['image_width'].'" ' : '');
			$output .= (! empty($widget['image_height']) && $height_unit != '%' ? ' height="'.$widget['image_height'].'" ' : '');
			$output .= '/>';

			if ( ! empty($widget['url']))
			{
				$output .= '</a>';
			} else
			{
				$output .= '</span>';
			}

			return $output;
		}

		public function form($widget)
		{
			$aligns = array
			(
				'' => ether::langr('Default'),
				'left' => ether::langr('Left'),
				'right' => ether::langr('Right'),
				'center' => ether::langr('Center')
			);

			$frames = apply_filters('ether_image_frames', array
			(
				'' => ether::langr('Theme default'),
				'1' => ether::langr('Ether frame 1'),
				'2' => ether::langr('Ether frame 2'),
				'reset' => ether::langr('Reset')
			));

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					<p class="ether-info">
						'.ether::langr('Design tip: When laying out images in rows / columns please use Gallery Widget instead of multiple Image Widgets nested inside Columns widget for smoother workflow').'
					</p>
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Align').'</span> '.$this->field('select', 'align', $widget, array('options' => $aligns)).'</label>
					<label><span class="label-title">'.ether::langr('Frame Style').'</span> '.$this->field('select', 'frame', $widget, array('options' => $frames)).'</label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Choose Image').'</h2>
				<div class="ether-tab-content">
					<div class="cols-2">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Image').' <abbr title="required">*</abbr></span> '.$this->field('text', 'image', $widget, array('class' => 'ether-preview upload_image')).'</label>
							<div class="buttonset-1">
								<button type="submit"'.$this->get_field_atts('upload_image').' name="'.$this->get_field_name('upload_image').'" class="builder-button-classic alignright upload_image single callback-builder_image_widget_change">'.ether::langr('Choose Image').'</button>
							</div>
						</div>
						<div class="col">
							<div class="preview-img-wrap">
								<img src="'.((isset($widget['image']) AND ! empty($widget['image'])) ? $widget['image'] : ether::path('media/images/placeholder.png', TRUE)).'" alt="" class="upload_image" />
							</div>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Image Settings').'</h2>
				<div class="ether-tab-content">
					'.$this->form_single_image_title($widget).'
					<div class="cols-2">
						<div class="col"><label><span class="label-title">'.ether::langr('Link URL').'</span> '.$this->field('text', 'url', $widget, array('class' => 'ether-cond-field ether-field-image-widget-link-url')).'</label></div>
						<div class="col ether-cond-group ether-action-show-ether-filter-isnot-ether-cond--ether-field-image-widget-link-url"><label class="label-alt-1">'.$this->field('checkbox', 'use_lightbox', $widget).' <span class="label-title">'.ether::langr('Open "Link URL" in lightbox').'</span></label></div>
					</div>
					<div class="cols-2">
						<div class="col"></div>
						<div class="col ether-cond-group ether-action-show-ether-filter-isnot-ether-cond--ether-field-image-widget-link-url"><label class="label-alt-1">'.$this->field('checkbox', 'new_tab', $widget).' <span class="label-title">'.ether::langr('Open "Link URL" in new tab').'</span></label></div>
					</div>
					'.$this->form_image_dimensions($widget).'
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary($widget)
		{
			return (isset($widget['description']) && ! empty($widget['description']) ? $widget['description'].' ' : '').(isset($widget['url']) && ! empty($widget['url']) ? '- '.$widget['url'] : '');
		}

		public function get_widget_location_preview($widget)
		{
			// if (isset($widget['image']) && ! empty($widget['image']))
			// {
				// $output = '';

				// global $wpdb;

			 //    $link = preg_replace('/-\d+x\d+(?=\.(jpg|jpeg|png|gif)$)/i', '', $widget['image']);
			 //    $image_id = $wpdb->get_var("SELECT ID FROM {$wpdb->posts} WHERE BINARY guid='$link'");
			 //    $size = get_intermediate_image_sizes();
			 //    $size = $size[0];

			 //    $img = wp_get_attachment_image($image_id, $size);

				// $output .='
				// <div class="builder-widget-image-preview">
				// 	'.$img.'
				// </div>';

				// return $output;
			// }

			return '<div class="builder-widget-image-preview"></div>';
		}

		public function set_widget_width_styles($widget)
		{
			$output = '';
			$width;

			if (isset($widget['image_width']) && ! empty($widget['image_width']))
			{
				$width = $widget['image_width'];
			} else if (isset($widget['image_crop_width']) && ! empty($widget['image_crop_width']))
			{
				$width = $widget['image_crop_width'];
			}

			if (isset($width))
			{
				preg_match('/(\d*)(.*)/', $width, $matches);
				$output .= 'width: '.$width.($matches[2] === '' ? 'px' : $matches[2]).';';
			}
			
			return $output;
		}
	}
}

if ( ! class_exists('ether_post_content_widget'))
{
	class ether_post_content_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('post_content', ether::langr('Content'));
			$this->label = ether::langr('This widget will display content from your post editor.');
		}

		public function widget($widget)
		{
			global $post;

			// DO NOT RUN THE_CONTENT FILTER WITH BUILDER HOOK

			remove_filter('the_content', array('ether_builder', 'builder_content'), 999);

			$content = apply_filters('the_content', $post->post_content);

			add_filter('the_content', array('ether_builder', 'builder_content'), 999);

			return $content;
		}

		public function form($widget)
		{
			return '
			<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
			<div class="ether-tab-content">
				<p class="ether-info">'.ether::langr('This widget will display content from your visual editor. Insert it wherever you\'d like visual editor content to appear in relation to Ether Builder widgets.').'</p>
			</div>
			<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
			<div class="ether-tab-content">
				'.$this->form_widget_visibility($widget).'
			</div>';
		}
	}
}

if ( ! class_exists('ether_divider_widget'))
{
	class ether_divider_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('divider', ether::langr('Divider'));
			$this->label = ether::langr('Horizontal bar for dividing separate sections of the page.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'back_to_top' => '',
				'clear' => '',
				'classes' => '',
			), $this->get_defaults(
				'widget_clearfloat',
				'widget_pos_align'
			)), $widget);

			$back_to_top = array
			(
				'alignment' => array
				(
					'left' => ether::langr('Left'),
					'right' => ether::langr('Right'),
					'center' => ether::langr('Center')
				),
				'title' => array
				(
					'0' => ether::langr('Back to top'),
					'1' => ether::langr('^ top'),
					'2' => ether::langr('&uarr; top'),
					'3' => ether::langr('Custom')
				)
			);

			$classes = array('divider', 'style-1');
			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			if ($widget['clear'] == 'on')
			{
				$classes[] = 'clear';
			}

			if ($widget['back_to_top'] == 'on')
			{
				$classes[] = 'clear';
				$classes[] = 'title-align'.$widget['back_to_top_alignment'];

				if ($widget['back_to_top_title'] == '3')
				{
					$back_to_top_title = $widget['back_to_top_custom_title'];
				} else
				{
					$back_to_top_title = $back_to_top['title'][$widget['back_to_top_title']];
				}
			}

			$output = '';

			if ($widget['back_to_top'] == 'on')
			{
				$href = '';

				if (isset($widget['back_to_top_custom_link']) AND ! empty($widget['back_to_top_custom_link']))
				{
					if (substr($widget['back_to_top_custom_link'], 0, 4) == 'http')
					{
						$href = $widget['back_to_top_custom_link'];
					} else
					{
						$href = '#'.$widget['back_to_top_custom_link'];
					}
				}
				$output.= '<a href="'.( ! empty($href) ? $href : '#page').'"'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'"><hr /><span'.$this->_class('back-to-top').'>'.$back_to_top_title.'</span></a>';
			} else
			{
				$output.= '<hr'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'" />';
			}

			return $output;
		}

		public function form($widget)
		{
			$back_to_top = array
			(
				'alignment' => array
				(
					'left' => ether::langr('Left'),
					'right' => ether::langr('Right'),
					'center' => ether::langr('Center')
				),
				'title' => array
				(
					'0' => ether::langr('Back to top'),
					'1' => ether::langr('^ top'),
					'2' => ether::langr('&uarr; top'),
					'3' => ether::langr('Custom')
				)
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">'
					.$this->form_widget_general($widget).
					'<label>'.$this->field('checkbox', 'clear', $widget).'<span class="label-title"> '.ether::langr('Clear divider').'</span> <small>'.ether::langr('Will force divider (and any content that follows) to appear under any left/right aligned object rather than next to it').'</small></label>
					<label>'.$this->field('checkbox', 'back_to_top', $widget, array('class' => 'ether-cond-field ether-field-1')).' <span class="label-title">'.ether::langr('Include back to top link').'</span></label>
					<div class="cols cols-2 ether-cond-group ether-action-show-ether-cond-on-ether-field-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Back to top link alignment').'</span> '.$this->field('select', 'back_to_top_alignment', $widget, array('options' => $back_to_top['alignment'])).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Back to top link title').'</span> '.$this->field('select', 'back_to_top_title', $widget, array('options' => $back_to_top['title'], 'class' => 'ether-cond-field ether-field-2')).'</label>
							<label class="ether-cond-group ether-action-show-ether-cond-3-ether-field-2"><span class="label-title">'.ether::langr('Custom title').'</span> '.$this->field('text', 'back_to_top_custom_title', $widget).'</label>
							<label class=""><span class="label-title">'.ether::langr('Custom link').'</span> '.$this->field('text', 'back_to_top_custom_link', $widget).'</label>
						</div>
					</div>
				</div>

				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_title($widget = NULL)
		{
			$titles = array
			(
				'0' => ether::langr('Back to top'),
				'1' => ether::langr('^ top'),
				'2' => ether::langr('&uarr; top'),
				'3' => ether::langr('Custom')
			);

			$title = isset($widget['back_to_top_custom_title']) && ! empty($widget['back_to_top_custom_title']) ? $widget['back_to_top_custom_title'] : (isset($widget['back_to_top_title']) ? $titles[$widget['back_to_top_title']] : parent::get_title($widget));

			return $title;
		}

		public function get_summary($widget)
		{
			return (isset($widget['back_to_top']) && $widget['back_to_top'] == 'on' ? '#' : '').(isset($widget['back_to_top_custom_link']) ? $widget['back_to_top_custom_link'] : '');
		}
	}
}

if ( ! class_exists('ether_message_widget'))
{
	class ether_message_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('message', ether::langr('Message'));
			$this->label = ether::langr('6 message box types for special notifications');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'type' => 'info',
				'classes' => ''
			), $this->get_defaults(
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			$classes = array('widget', 'msg', 'msg-'.$widget['type']);
			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			return '<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'"><span'.$this->_class('msg-icon').'></span>'.wpautop($widget['text']).'</div>';
		}

		public function form($widget)
		{
			$types = array
			(
				'info' => ether::langr('Info'),
				'warning' => ether::langr('Warning'),
				'error' => ether::langr('Error'),
				'download' => ether::langr('Download'),
				'important-1' => ether::langr('Important'),
				'important-2' => ether::langr('Important alt')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols cols-1">
						<div class="col">
							<div style="width: 85%; float: left;">
								<label><span class="label-title">'.ether::langr('Type').' <abbr title="required">*</abbr></span>'.$this->field('select', 'type', $widget, array('options' => $types)).'</label>
							</div>
							<div style="width: 14%; float: left;" class="builder-message-widget-type-preview">
								<span '.$this->_class(array('msg', 'msg-'.(isset($widget['type']) ? $widget['type'] : 'info'))).'></span>
							</div>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Message').' <abbr title="required">*</abbr></span>'.$this->field('textarea', 'text', $widget).'<small>'.ether::langr('Plain text, shortcodes. Default wordpress formatting will be applied.').'</small></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary ($widget)
		{
			$output = '';

			$output .= (isset($widget['type']) ? $widget['type'] : '');

			return $output;
		}
	}
}

if ( ! class_exists('ether_blockquote_widget'))
{
	class ether_blockquote_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('blockquote', ether::langr('Blockquote'));
			$this->label = ether::langr('Turns given text into a blockquote.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'style' => 1,
				'classes' => ''
			),
			$this->get_defaults('widget_pos_align', 'widget_clearfloat')), $widget);

			$classes = array('widget', 'blockquote', 'blockquote-'.$widget['style']);

			$classes = $this->append_classes($classes, $widget, 'widget_alignment');
			$classes = $this->append_classes($classes, $widget, 'widget_clearfloat');

			return '<blockquote'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'.wpautop($widget['text']).'</blockquote>';
		}

		public function form($widget)
		{
			$styles = apply_filters('ether_blockquote_styles', array
			(
				'' => ether::langr('Theme default'),
				'1' => ether::langr('Ether style 1'),
				'2' => ether::langr('Ether style 2'),
				'3' => ether::langr('Ether style 3'),
			));

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					<p class="ether-info">
						'.ether::langr('Design tip: For a list of Testimonials aligned in a grid please use Testimonials widget instead of nesting Blockquote Widgets in Columns Widget in order to achieve smoother workflow').'
					</p>
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Text').' <abbr title="required">*</abbr></span>'.$this->field('textarea', 'text', $widget).'<small>'.ether::langr('Plain text, shortcodes. Default wordpress formatting will be applied.').'</small></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary ($widget)
		{
			$styles = array
			(
				'' => ether::langr('Theme default'),
				'1' => ether::langr('Ether style 1'),
				'2' => ether::langr('Ether style 2'),
				'3' => ether::langr('Ether style 3'),
			);

			$output = '';

			$output .= (isset($widget['style']) ? 'style: ' . $styles[$widget['style']] : '');

			return $output;
		}
	}
}

if ( ! class_exists('ether_list_widget'))
{
	class ether_list_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('list', ether::langr('List'));
			$this->label = ether::langr('Unordered lists with 12 custom bullets.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'bullet' => '',
				'classes' => '',
				'list_items_layout' => '1'
			),
			$this->get_defaults(
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			$widget['text'] = ether::strip_only($widget['text'], '<ul><li>');
			$elems = explode("\n", $widget['text']);
			$elem_count = count($elems);

			$classes = array('widget', 'bullet-list');
			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			if ( ! empty($widget['bullet']))
			{
				$classes[] = 'custom-bullet';
				$classes[] = $widget['bullet'];
			} else
			{
				$classes[] = 'default-bullet';
			}

			$output = '';

			if ($widget['list_items_layout'] != 'inline')
			{
				$col_count = $widget['list_items_layout'];

				$cols = array();

				for ($i = 0; $i < $col_count; $i++)
				{
					$cols[$i] = array();
				}

				$col_id = 0;

				foreach ($elems as $elem)
				{
					$elem = trim($elem);

					if ( ! empty($elem))
					{
						$cols[$col_id % $col_count][] = $elem;
						$col_id++;
					}
				}

				$output .= '<div '.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">';
				$output .= $col_count > 1 ? '<div'.$this->_class(array('cols', 'cols-'.$col_count)).'>' : '';

				for ($i = 0; $i < $col_count; $i++)
				{
					$output .= $col_count > 1 ? '<div'.$this->_class('col').'>' : '';
					// $output .= '<ul'.$this->_class($classes, $widget['classes']).'>';
					$output .= '<ul>';

					foreach($cols[$i] as $elem)
					{
						$output .= '<li>'.$elem.'</li>';
					}

					$output .= '</ul>';
					$output .= $col_count > 1 ? '</div>' : '';
				}

				$output .= $col_count > 1 ? '</div>' : '';
				$output .= '</div>';
			} else
			{
				if ( ! empty($widget['bullet']))
				{
					$classes[] = 'inline-bullets';
				}

				$output .= '<ul'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">';

				for ($i = 0; $i < count($elems); $i++)
				{
					if ( ! empty($elems[$i]))
					{
						$output .= '<li>'.$elems[$i].'</li>';
					}
				}

				$output .= '</ul>';
			}

			return $output;
		}

		public function form($widget)
		{
			$bullets = array
			(
				'' => ether::langr('Default'),
				'check-1' => ether::langr('Check 1'),
				'check-2' => ether::langr('Check 2'),
				'check-3' => ether::langr('Check 3'),
				'arrow-1' => ether::langr('Arrow 1'),
				'arrow-2' => ether::langr('Arrow 2'),
				'arrow-3' => ether::langr('Arrow 3'),
				'warning-1' => ether::langr('Warning 1'),
				'warning-2' => ether::langr('Warning 2'),
				'warning-3' => ether::langr('Warning 3'),
				'error-1' => ether::langr('Error 1'),
				'error-2' => ether::langr('Error 2'),
				'error-3' => ether::langr('Error 3')
			);

			$list_items_layout = array(
				'1' => ether::langr('1 Column (Default)'),
				'2' => ether::langr('2 Columns'),
				'3' => ether::langr('3 Columns'),
				'4' => ether::langr('4 Columns'),
				'5' => ether::langr('5 Columns'),
				'6' => ether::langr('6 Columns'),
				'8' => ether::langr('8 Columns'),
				'10' => ether::langr('10 Columns'),
				'inline' => ether::langr('Inline')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols cols-2">
						<div class="col">
							<div style="width: 85%; float: left;">
								<label><span class="label-title">'.ether::langr('Bullet').'</span> '.$this->field('select', 'bullet', $widget, array('options' => $bullets)).'</label>
							</div>
							<div style="width: 14%; float: left;" class="builder-list-widget-bullet-preview">
								<span class="builder-widget-icon builder-widget-icon-list builder-list-widget-icon-'.((isset($widget['bullet']) && ! empty($widget['bullet'])) ? $widget['bullet'] : 'default').'"></span>
							</div>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('List Items Layout').'</span> '.$this->field('select', 'list_items_layout', $widget, array('options' => $list_items_layout)).'</label>
						</div>
					</div>

					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Content').' <abbr title="required">*</abbr></span>'.$this->field('textarea', 'text', $widget).'<small>'.ether::langr('Plain text, shortcodes. <strong>One list item per line</strong>.').'</small></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary ($widget)
		{
			$list_items_layout = array(
				'1' => ether::langr('1 Column (Default)'),
				'2' => ether::langr('2 Columns'),
				'3' => ether::langr('3 Columns'),
				'4' => ether::langr('4 Columns'),
				'5' => ether::langr('5 Columns'),
				'6' => ether::langr('6 Columns'),
				'8' => ether::langr('8 Columns'),
				'10' => ether::langr('10 Columns'),
				'inline' => ether::langr('Inline')
			);

			if ( ! empty($widget['list_items_layout']))
			{
				return $list_items_layout[$widget['list_items_layout']];
			}

			return '';
		}
	}
}

if ( ! class_exists('ether_button_widget'))
{
	class ether_button_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('button', ether::langr('Button'));
			$this->label = ether::langr('Predefined button styles for hyperlinks.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'align' => 'left',
				'label' => '',
				'style' => 1,
				'background' => '',
				'color' => '',
				'width' => '',
				//'align' => 'left', //old
				'classes' => ''
			),
			$this->get_defaults('widget_clearfloat')), $widget);

			$styles = array('1' => 'small', '2' => 'medium', '3' => 'big');

			$classes = array('widget', 'button', 'button-'.$styles[$widget['style']], 'align'.$widget['align']);
			$classes = $this->append_classes($classes, $widget, 'widget_clearfloat');

			$has_style = implode('', array($widget['background'], $widget['color'], $widget['width'])) != '';

			return '<a href="'.( ! empty($widget['url']) ? $widget['url'] : '').'"'.$this->_class($classes, $widget['classes']).($has_style ? (' style="'.$this->set_widget_width_styles($widget).( ! empty($widget['background']) ? 'background-color: '.$widget['background'].';' : '').( ! empty($widget['color']) ? 'color: '.$widget['color'].';' : '').'"') : '').'>'.$widget['label'].'</a>';
		}

		public function form($widget)
		{
			$styles = array
			(
				'1' => ether::langr('Small'),
				'2' => ether::langr('Medium'),
				'3' => ether::langr('Big')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
				'.$this->form_widget_general($widget).'
				'.$this->form_widget_clearfloat($widget).'
					<div class="cols-2">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Label').' <abbr title="required">*</abbr></span>'.$this->field('text', 'label', $widget).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('URL').' <abbr title="required">*</abbr></span>'.$this->field('text', 'url', $widget).'</label>
						</div>
					</div>

					<div class="cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
						</div>
					</div>
				</div>

				<h2 class="ether-tab-title">'.ether::langr('Set Colors').'</h2>
				<div class="ether-tab-content">
					<div class="cols-2">
						<div class="col">
							<label class="ether-color"><span class="label-title">'.ether::langr('Background color').'</span> '.$this->field('text', 'background', $widget).'<small>'.ether::langr('hex, rgb or rgba. Overrides default.').'</small></label>
						</div>
						<div class="col">
							<label class="ether-color"><span class="label-title">'.ether::langr('Text color').'</span> '.$this->field('text', 'color', $widget).'<small>'.ether::langr('hex, rgb or rgba. Overrides default.').'</small></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'<small>'.ether::langr('Space-separated').'</small></label>
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
				<div class="cols cols-1">
					<div class="col">
						<hr/>
						<div class="builder-button-widget-preview">
							<p><strong>'.ether::langr('Button Preview').':</strong></p>
							<div class="ether-button-preview ether-button-style-'.(strtolower($styles[isset($widget['style']) && ! empty($widget['style']) ? $widget['style'] : 1])).' '.$this->set_widget_alignment_class($widget).'" style="'.$this->set_widget_width_styles($widget).' '.(isset($widget['background']) && ! empty($widget['background']) ? 'background-color: '.$widget['background'].';' : '').' '.(isset($widget['color']) && ! empty($widget['color']) ? 'color: '.$widget['color'].';' : '').'">
								'.(isset($widget['label']) && ! empty($widget['label']) ? $widget['label'] : ether::langr('Button Text')).'
							</div>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary ($widget)
		{
			$styles = array
			(
				'1' => ether::langr('Small'),
				'2' => ether::langr('Medium'),
				'3' => ether::langr('Big')
			);

			return (isset($widget['style']) && ! empty($widget['style']) ? $styles[$widget['style']].' ' : '').(isset($widget['url']) && ! empty($widget['url']) ? $widget['url'] : '');
		}

		public function get_title ($widget = NULL)
		{
			return '<span style="'.(isset($widget['color']) && ! empty($widget['color']) ? 'color: '.$widget['color'].'; ' : '').(isset($widget['background']) && ! empty($widget['background']) ? 'background-color: '.$widget['background'].'; ' : '').'">'.(isset($widget['label']) && ! empty($widget['label']) ? $widget['label'] : parent::get_title($widget)).'</span>';
		}
	}
}

if ( ! class_exists('ether_video_widget'))
{
	class ether_video_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('video', ether::langr('Video'));
			$this->label = ether::langr('YouTube, Vimeo or Blip.tv');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'url' => '',
				'height' => '',
				'classes' => ''
			),
			$this->get_defaults('widget_pos_align', 'widget_clearfloat')), $widget);

			$classes = array('widget', 'media-wrap');
			$classes = $this->append_classes($classes, $widget, 'widget_clearfloat');

			$classes[] = 'align'.$widget['align'];

			$output = '<div'.$this->_class($classes, $widget['classes']).' style="'.( ! empty($widget['width']) ? 'width: '.$widget['width'].'px;' : NULL).' '.( ! empty($widget['height']) ? 'height: '.$widget['height'].'px;' : NULL).'">';
			$output .= ether::video($widget['url'], ( ! empty($widget['width']) ? $widget['width'] : NULL), ( ! empty($widget['height']) ? $widget['height'] : NULL));
			$output .= '</div>';

			return $output;
		}

		public function form($widget)
		{
			$aligns = array
			(
				'' => ether::langr('Default'),
				'left' => ether::langr('Left'),
				'right' => ether::langr('Right'),
				'center' => ether::langr('Center')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
				'.$this->form_widget_general($widget, true).'
				'.$this->form_widget_clearfloat($widget, true).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('URL').' <abbr title="required">*</abbr></span>'.$this->field('text', 'url', $widget).' <small>'.ether::langr('YouTube, Vimeo or Blip.tv url.').'</small></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
				'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_title($widget = NULL)
		{
			return isset($widget['url']) && ! empty($widget['url']) ? $widget['url'] : parent::get_title($widget);
		}
	}
}

if ( ! class_exists('ether_table_widget'))
{
	class ether_table_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('table', ether::langr('Table'));
			$this->label = ether::langr('Generate custom table.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'style' => '',
				'header_top' => '',
				'header_left' => '',
				'classes' => ''
			),
			$this->get_defaults(
				'widget_clearfloat',
				'widget_pos_align'

			)), $widget);

			$classes = array('widget', 'table');
			$classes = $this->append_classes($classes, $widget, array('widget_clearfloat', 'widget_alignment'));

			if ( ! empty($widget['style']))
			{
				$classes[] = 'style-'.$widget['style'];
			}

			$output = '<table cellspacing="0"'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;

			$column = 0;
			$row = 0;
			$th_top = ($widget['header_top'] == 'on');
			$th_left = ($widget['header_left'] == 'on');

			$count = count($widget['table_data']);

			for ($i = 0; $i < $count; $i++)
			{
				if ($column == 0)
				{
					$output .= '	<tr>'._n;
				}

				$column++;
				$output .= '		<t'.((($row == 0 AND $th_top) OR ($column == 1 AND $th_left)) ? 'h' : 'd').'>'._n;
				$output .= '			'.$widget['table_data'][$i]._n;
				$output .= '		</t'.((($row == 0 AND $th_top) OR ($column == 1 AND $th_left)) ? 'h' : 'd').'>'._n;

				if ($column == $widget['columns'])
				{
					$output .= '	</tr>'._n;
					$column = 0;
					$row++;
				}
			}

			$output .= '</table>'._n;

			return $output;
		}

		public function form($widget)
		{
			$styles = apply_filters('ether_table_styles', array
			(
				'' => ether::langr('Theme default'),
				'1' => ether::langr('Ether style 1'),
				'2' => ether::langr('Ether style 2')
			));

			if ( ! isset($widget['rows']))
			{
				$widget['rows'] = 1;
			}

			if ( ! isset($widget['columns']))
			{
				$widget['columns'] = 1;
			}

			$widget['rows'] = intval($widget['rows']);
			$widget['columns'] = intval($widget['columns']);

			if ($widget['rows'] < 1)
			{
				$widget['rows'] = 1;
			}

			if ($widget['rows'] > 60)
			{
				$widget['rows'] = 60;
			}

			if ($widget['columns'] < 1)
			{
				$widget['columns'] = 1;
			}

			if ($widget['columns'] > 30)
			{
				$widget['columns'] = 30;
			}

			$table_data = '<table class="table">';

			if ( ! isset($widget['table_data']) OR empty($widget['table_data']))
			{
				$table_data .= '<tr><td>'.$this->field('textarea', 'table_data][', NULL, array('cols' => 10, 'rows' => 3)).'</td></tr>';
			} else
			{
				$column = 0;

				for ($i = 0; $i < count($widget['table_data']); $i++)
				{
					if ($column == 0)
					{
						$table_data .= '<tr>';
					}

					$column++;
					$table_data .= '<td>'.$this->field('textarea', 'table_data][', $widget['table_data'][$i], array('cols' => 10, 'rows' => 3)).'</td>';

					if ($column == $widget['columns'])
					{
						$table_data .= '</tr>';
						$column = 0;
					}
				}
			}

			$table_data .= '</table>';

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
					<div class="cols-2">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Rows').'</span> '.$this->field('text', 'rows', $widget).'</label>
							<label>'.$this->field('checkbox', 'header_top', $widget).' <span class="label-title">'.ether::langr('Highlight first row').'</span></label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Columns').'</span> '.$this->field('text', 'columns', $widget).'</label>
							<label>'.$this->field('checkbox', 'header_left', $widget).' <span class="label-title">'.ether::langr('Highlight first column').'</span></label>

						</div>
					</div>

					'.$this->field('hidden', 'table', $widget).'
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset class="ether-form">
				'.$table_data.'
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_pricing_table_widget'))
{
	class ether_pricing_table_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('pricing-table', ether::langr('Pricing table'));
			$this->label = ether::langr('Generate pricing table.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'style' => 1,
				'columns' => 1,
				'table_currency' => '',
				'aside' => '',
				'table_background' => '',
				'table_price_main' => '',
				'table_price_tail' => '',
				'table_button_label' => '',
				'table_button_url' => '',
				'classes' => ''
			),
			$this->get_defaults(
				'widget_clearfloat',
				'widget_pos_align')), $widget);

			$classes = array('widget', 'prc', 'prc-'.$widget['style'], 'prc-cols-'.$widget['columns']);
			$classes = $this->append_classes($classes, $widget, array('widget_clearfloat', 'widget_alignment'));

			$output = '<table cellspacing="0"'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;
			$even = FALSE;

			$column = 0;
			$row = 0;
			$count = count($widget['table_title']);

			for ($i = 0; $i < $count; $i++)
			{
				if ($column == 0)
				{
					$output .= '	<tr'.$this->_class('prc-title-row').'>'._n;
				}

				$column++;

				$aside = ($i == 0 AND isset($widget['aside']) AND $widget['aside'] == 'on');

				$output .= '		<td'.$this->_class(array('prc-title', ($aside ? 'prc-aside' : ''), ($aside ? 'prc-dummy' : ''))).'>'._n;

				if ( ! $aside)
				{
					$output .= '			<span'.((isset($widget['table_background'][$i]) AND ! empty($widget['table_background'][$i])) ? ' style="background-color: '.$widget['table_background'][$i].';"' : '').'>'.$widget['table_title'][$i].'</span>'._n;
				}

				$output .= '		</td>'._n;

				if ($column == $widget['columns'])
				{
					$output .= '	</tr>'._n;
					$column = 0;
					$row++;
				}
			}

			$column = 0;
			$row = 0;
			$count = count($widget['table_price_main']);

			for ($i = 0; $i < $count; $i++)
			{
				if ($column == 0)
				{
					$output .= '	<tr'.$this->_class(array('prc-price-row', 'prc-'.($even ? 'even' : 'odd'))).'>'._n;
					$even = !$even;
				}

				$column++;

				$aside = ($i == 0 AND isset($widget['aside']) AND $widget['aside'] == 'on');

				$output .= '		<td'.$this->_class(array('prc-price', ($aside ? 'prc-aside' : ''), ($aside ? 'prc-dummy' : ''))).'>'._n;

				if ($aside)
				{
					$output .= '			'.implode('', array($widget['table_currency'][$i], $widget['table_price_main'][$i], $widget['table_price_tail'][$i]))._n;
				} else
				{
					$output .= '			<span><span'.$this->_class('prc-currency').'>'.$widget['table_currency'][$i].'</span><span'.$this->_class('prc-val-min').'>'.$widget['table_price_main'][$i].'</span><sup'.$this->_class('prc-val-tail').'>'.$widget['table_price_tail'][$i].'</sup></span></span>'._n;
				}


				$output .= '		</td>'._n;

				if ($column == $widget['columns'])
				{
					$output .= '	</tr>'._n;
					$column = 0;
					$row++;
				}
			}

			$column = 0;
			$row = 0;
			$count = count($widget['table_desc']);

			for ($i = 0; $i < $count; $i++)
			{
				if ($column == 0)
				{
					$output .= '	<tr'.$this->_class(array('prc-field-row', 'prc-'.($even ? 'even' : 'odd'))).'>'._n;
					$even = !$even;
				}

				$column++;

				$aside = ($i == 0 AND isset($widget['aside']) AND $widget['aside'] == 'on');

				$output .= '		<td'.$this->_class(array('prc-field', ($aside ? 'prc-aside' : ''))).'>'._n;

				if ($aside)
				{
					$output .= '			'.$widget['table_desc'][$i]._n;
				} else
				{
					$output .= '			'.((isset($widget['table_icon'][$i]) AND ! empty($widget['table_icon'][$i])) ? ' <span'.$this->_class(array('prc-icon', $widget['table_icon'][$i])).'></span>' : '').$widget['table_desc'][$i]._n;
				}

				$output .= '		</td>'._n;

				if ($column == $widget['columns'])
				{
					$output .= '	</tr>'._n;
					$column = 0;
					$row++;
				}
			}

			$column = 0;
			$row = 0;
			$count = count($widget['table_button_label']);

			for ($i = 0; $i < $count; $i++)
			{
				if ($column == 0)
				{
					$output .= '	<tr'.$this->_class(array('prc-button-row', 'prc-'.($even ? 'even' : 'odd'))).'>'._n;
					$even = !$even;
				}

				$column++;

				$aside = ($i == 0 AND isset($widget['aside']) AND $widget['aside'] == 'on');

				$output .= '		<td'.$this->_class(array('prc-button', ($aside ? 'prc-aside' : ''), ($aside ? 'prc-dummy' : ''))).'>'._n;

				if ( ! $aside)
				{
					$output .= '			<a href="'.$widget['table_button_url'][$i].'"'.((isset($widget['table_background'][$i]) AND ! empty($widget['table_background'][$i])) ? ' style="background-color: '.$widget['table_background'][$i].';"' : '').'>'.$widget['table_button_label'][$i].'</a>'._n;
				}

				$output .= '		</td>'._n;

				if ($column == $widget['columns'])
				{
					$output .= '	</tr>'._n;
					$column = 0;
					$row++;
				}
			}

			$output .= '</table>'._n;

			return $output;
		}

		public function form($widget)
		{
			$widget = ether::extend( array
			(
				'rows' => 1,
				'columns' => 1
			), $widget);

			$widget['rows'] = intval($widget['rows']);
			$widget['columns'] = intval($widget['columns']);

			if ($widget['rows'] < 1)
			{
				$widget['rows'] = 1;
			}

			if ($widget['rows'] > 60)
			{
				$widget['rows'] = 60;
			}

			if ($widget['columns'] < 1)
			{
				$widget['columns'] = 1;
			}

			if ($widget['columns'] > 30)
			{
				$widget['columns'] = 30;
			}

			$table_columns = '<table class="pricing-table-header pricing-table">';
			$table_columns .= '<tr><th colspan="'.$widget['columns'].'">'.ether::langr('Column name').'</th></tr>';

			if ( ! isset($widget['table_title']) OR empty($widget['table_title']))
			{
				$table_columns .= '<tr><td>
					<label><span class="label-title">'.ether::langr('Title').'</span> '.$this->field('text', 'table_title][').'</span></label>
					<label class="ether-color"><span class="label-title">'.ether::langr('Background').'</span> '.$this->field('text', 'table_background][').'<small>'.ether::langr('hex, rgb or rgba. Overrides default.').'</small></label>
				</td></tr>';
			} else
			{
				$column = 0;

				for ($i = 0; $i < count($widget['table_title']); $i++)
				{
					if ($column == 0)
					{
						$table_columns .= '<tr>';
					}

					$column++;
					$table_columns .= '<td>
						<label><span class="label-title">'.ether::langr('Title').'</span> '.$this->field('text', 'table_title][', $widget['table_title'][$i]).'</label>
						<label class="ether-color">'.ether::langr('Background').' '.$this->field('text', 'table_background][', $widget['table_background'][$i]).'<small>'.ether::langr('hex, rgb or rgba. Overrides default.').'</small></label>
					</td>';

					if ($column == $widget['columns'])
					{
						$table_columns .= '</tr>';
						$column = 0;
					}
				}
			}

			$table_columns .= '</table>';

			$table_price = '<table class="pricing-table-price pricing-table">';
			$table_price .= '<tr><th colspan="'.$widget['columns'].'">'.ether::langr('Column price').'</th></tr>';

			if ( ! isset($widget['table_price_main']) OR empty($widget['table_price_main']))
			{
				$table_price .= '<tr><td>
					<label><span class="label-title">'.ether::langr('Currency').'</span> '.$this->field('text', 'table_currency][').'</label>
					<label><span class="label-title">'.ether::langr('Price (main)').'</span> '.$this->field('text', 'table_price_main][').'</label>
					<label><span class="label-title">'.ether::langr('Price (tail)').'</span> '.$this->field('text', 'table_price_tail][').'</label>
				</td></tr>';
			} else
			{
				$column = 0;

				for ($i = 0; $i < count($widget['table_price_main']); $i++)
				{
					if ($column == 0)
					{
						$table_price .= '<tr>';
					}

					$column++;
					$table_price .= '<td>
						<label><span class="label-title">'.ether::langr('Currency').'</span> '.$this->field('text', 'table_currency][', $widget['table_currency'][$i]).'</label>
						<label><span class="label-title">'.ether::langr('Price (main)').'</span> '.$this->field('text', 'table_price_main][', $widget['table_price_main'][$i]).'</label>
						<label><span class="label-title">'.ether::langr('Price (tail)').'</span> '.$this->field('text', 'table_price_tail][', $widget['table_price_tail'][$i]).'</label>
					</td>';

					if ($column == $widget['columns'])
					{
						$table_price .= '</tr>';
						$column = 0;
					}
				}
			}

			$table_price .= '</table>';

			$table_buttons = '<table class="pricing-table-buttons pricing-table">';
			$table_buttons .= '<tr><th colspan="'.$widget['columns'].'">'.ether::langr('Column button').'</th></tr>';

			if ( ! isset($widget['table_button_label']) OR empty($widget['table_button_label']))
			{
				$table_buttons .= '<td><label><span class="label-title">'.ether::langr('Label').'</span> '.$this->field('text', 'table_button_label][').'</label>
				<label><span class="label-title">'.ether::langr('URL').'</span> '.$this->field('text', 'table_button_url][').'</label></td>';
			} else
			{
				$column = 0;

				for ($i = 0; $i < count($widget['table_button_label']); $i++)
				{
					if ($column == 0)
					{
						$table_buttons .= '<tr>';
					}

					$column++;
					$table_buttons .= '<td><label><span class="label-title">'.ether::langr('Label').'</span> '.$this->field('text', 'table_button_label][', $widget['table_button_label'][$i]).'</label>
					<label><span class="label-title">'.ether::langr('URL').'</span> '.$this->field('text', 'table_button_url][', $widget['table_button_url'][$i]).'</label></td>';

					if ($column == $widget['columns'])
					{
						$table_price .= '</tr>';
						$column = 0;
					}
				}
			}

			$table_buttons .= '</table>';

			$icons = array
			(
				'' => ether::langr('None'),
				'check-1' => ether::langr('Check 1'),
				'check-2' => ether::langr('Check 2'),
				'check-3' => ether::langr('Check 3'),
				'arrow-1' => ether::langr('Arrow 1'),
				'arrow-2' => ether::langr('Arrow 2'),
				'arrow-3' => ether::langr('Arrow 3'),
				'warning-1' => ether::langr('Warning 1'),
				'warning-2' => ether::langr('Warning 2'),
				'warning-3' => ether::langr('Warning 3'),
				'error-1' => ether::langr('Error 1'),
				'error-2' => ether::langr('Error 2'),
				'error-3' => ether::langr('Error 3')
			);

			$table_data = '<table class="pricing-table-data pricing-table">';
			$table_data .= '<tr><th colspan="'.$widget['columns'].'">'.ether::langr('Column data').'</th></tr>';

			if ( ! isset($widget['table_desc']) OR empty($widget['table_desc']))
			{
				$table_data .= '<tr><td><label><span class="label-title">'.ether::langr('Icon').'</span> '.$this->field('select', 'table_icon][', NULL, array('options' => $icons)).'</label>
				<label><span class="label-title">'.ether::langr('Description').'</span> '.$this->field('text', 'table_desc][').'</span></label></td></tr>';
			} else
			{
				$column = 0;

				for ($i = 0; $i < count($widget['table_desc']); $i++)
				{
					if ($column == 0)
					{
						$table_data .= '<tr>';
					}

					$column++;

					$table_data .= '<td><label><span class="label-title">'.ether::langr('Icon').'</span> '.$this->field('select', 'table_icon][', $widget['table_icon'][$i], array('options' => $icons)).'</label>
					<label><span class="label-title">'.ether::langr('Description').'</span> '.$this->field('text', 'table_desc][', $widget['table_desc'][$i]).'</label></td>';

					if ($column == $widget['columns'])
					{
						$table_data .= '</tr>';
						$column = 0;
					}
				}
			}

			$table_data .= '</table>';

			$styles = apply_filters('ether_pricing-table_styles', array
			(
				'1' => ether::langr('Ether Style 1'),
				'2' => ether::langr('Ether Style 2')
			));

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
					<div class="cols-3 cols">
						<div class="col"><label><span class="label-title">'.ether::langr('Rows').'</span> '.$this->field('text', 'rows', $widget).'</label></div>
						<div class="col"><label><span class="label-title">'.ether::langr('Columns').'</span> '.$this->field('text', 'columns', $widget).'</label></div>
						<div class="col"><label class="label-alt-1">'.$this->field('checkbox', 'aside', $widget).' <span class="label-title">'.ether::langr('First column aside').'</span></label></div>
					</div>
				'.$this->field('hidden', 'table', $widget).'
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>
			<fieldset class="ether-form">
				'.$table_columns.'
				'.$table_price.'
				'.$table_data.'
				'.$table_buttons.'
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_pricing_table_2_widget'))
{
	class ether_pricing_table_2_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('pricing-table-2', ether::langr('Pricing table 2'));
			$this->label = ether::langr('Generate pricing table.');
		}

		public function item($widget, $data)
		{
			$output = '';
			$output .= '		<div'.$this->_class('col').'>'._n;
			$output .= '			<div'.$this->_class('prc-item').'>'._n;

			$output .= ' 				<div'.$this->_class('prc-title').((isset($data['table_background']) AND ! empty($data['table_background'])) ? ' style="background-color: '.$data['table_background'].';"' : '').'>';
			$output .= '					'.$data['table_title']._n;
			$output .= '				</div>'._n;

			$output .= ' 				<div'.$this->_class('prc-price').'>'._n;
			$output .= '					<span'.$this->_class('prc-currency').'>'.$data['table_currency'].'</span>'._n;
			$output .= '					<span'.$this->_class('prc-val-min').'>'.$data['table_price_main'].'</span>'._n;
			$output .= '					<sup'.$this->_class('prc-val-tail').'>'.$data['table_price_tail'].'</sup>'._n;
			$output .= '				</div>'._n;

			$output .= '				<div'.$this->_class('.prc-field').'>'._n;
			$output .= '					moo'._n;
			$output .= '				</div>'._n;

			$output .= '				<div'.$this->_class('.prc-button').'>'._n;
			$output .= '					<a href="'.$data['table_button_url'].'"'.((isset($data['table_background']) AND ! empty($data['table_background'])) ? ' style="background-color: '.$data['table_background'].';"' : '').'>'.$data['table_button_label'].'</a>'._n;
			$output .= '				</div>'._n;

			$output .= '			</div>'._n;
			$output .= '		</div>'._n;

			return $output;
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'style' => 1,
				'columns' => 1,
				'rows' => 1,
				'disable_spacing' => '',
				'table_currency' => '',
				'aside' => '',
				'table_title' => '',
				'table_background' => '',
				'table_price_main' => '',
				'table_price_tail' => '',
				'table_button_label' => '',
				'table_button_url' => '',
				'classes' => '',
			),
			$this->get_defaults('widget_clearfloat')), $widget);

			$classes = array('widget', 'prc', 'prc-'.$widget['style']);
			$classes = $this->append_classes($classes, $widget, 'widget_clearfloat');

			$output = '';

			$output .= '<div'.$this->_class($classes, $widget['classes']).'">'._n;
			$output .= '	'.$this->gen_html($widget, 'cols')._n;

			$count = count($widget['table_title']);

			for ($i = 0; $i < $count; $i++)
			{

				if ( ! empty($widget['table_title'][$i]) OR ! empty($widget['table_desc'][$i]))
				{

					$output .= $this->item($widget, array
					(
						'table_title' => $widget['table_title'][$i],
						'table_desc' => $widget['table_desc'][$i],
						'table_currency' => $widget['table_currency'],
						'aside' => $widget['aside'],
						'table_background' => $widget['table_background'][$i],
						'table_price_main' => $widget['table_price_main'][$i],
						'table_price_tail' => $widget['table_price_tail'][$i],
						'table_button_label' => $widget['table_button_label'][$i],
						'table_button_url' => $widget['table_button_url'][$i]
					));
				}
			}

			$output .= '	</div>'._n;
			$output .= '</div>'._n;

			return $output;
		}

		public function group_item($widget, $i)
		{
			$icons = array
			(
				'' => ether::langr('None'),
				'check-1' => ether::langr('Check 1'),
				'check-2' => ether::langr('Check 2'),
				'check-3' => ether::langr('Check 3'),
				'arrow-1' => ether::langr('Arrow 1'),
				'arrow-2' => ether::langr('Arrow 2'),
				'arrow-3' => ether::langr('Arrow 3'),
				'warning-1' => ether::langr('Warning 1'),
				'warning-2' => ether::langr('Warning 2'),
				'warning-3' => ether::langr('Warning 3'),
				'error-1' => ether::langr('Error 1'),
				'error-2' => ether::langr('Error 2'),
				'error-3' => ether::langr('Error 3')
			);

			return '<div class="col"'.(empty($widget) ? ' style="display: none;"' : '').'>
				<div class="group-item">
					<div class="group-item-title">'.ether::langr('Item').'</div>
					<div class="group-item-content">
						<label><span class="label-title">'.ether::langr('Title').'</span> '.$this->group_field('text', 'table_title', $i, $widget).'</span></label>
						<label class="ether-color"><span class="label-title">'.ether::langr('Background').'</span> '.$this->group_field('text', 'table_background', $i, $widget).'<small>'.ether::langr('hex, rgb or rgba. Overrides default.').'</small></label>
						<label><span class="label-title">'.ether::langr('Price (main)').'</span> '.$this->group_field('text', 'table_price_main', $i, $widget).'</label>
						<label><span class="label-title">'.ether::langr('Price (tail)').'</span> '.$this->group_field('text', 'table_price_tail', $i, $widget).'</label>
						<div class="prc-table-cells">
						cells
							<div class="prc-table-cell">
								<div class="prc-table-cell-actions">
									<div class="prc-table-cell-add">add</add>
									<div class="prc-table-cell-remove">remove</add>
								</div>
								<label><span class="label-title">'.ether::langr('Icon').'</span> '.$this->group_field('select', 'table_icon', $i, $widget, $icons).'</label>
								<label><span class="label-title">'.ether::langr('Description').'</span> '.$this->group_field('text', 'table_desc', $i, $widget).'</span></label>
							</div>
						</div>
						<label><span class="label-title">'.ether::langr('Label').'</span> '.$this->group_field('text', 'table_button_label', $i, $widget).'</label>
						<label><span class="label-title">'.ether::langr('URL').'</span> '.$this->group_field('text', 'table_button_url', $i, $widget).'</label>
					</div>
					<div class="group-item-actions">
						<button name="builder-widget-tab-rich" class="builder-widget-group-item-rich">'.ether::langr('Rich Text Editor').'</button>
						<button name="builder-widget-tab-remove" class="builder-widget-group-item-remove">'.ether::langr('Remove').'</button>
					</div>
				</div>
			</div>';
		}

		public function form($widget)
		{
			$styles = apply_filters('ether_pricing_tables_styles', array
			(
				'1' => ether::langr('Ether Style 1'),
				'2' => ether::langr('Ether Style 2')
			));

			$columns = array();

			for ($i = 1; $i <= 6; $i++)
			{
				$columns[$i] = $i;
			}

			$count = 1;

			if (isset($widget['table_desc']) AND count($widget['table_desc']) > 0)
			{
				$count = 0;

				for ($i = 0; $i < count($widget['table_desc']); $i++)
				{
					if ( ! empty($widget['table_title'][$i]) OR ! empty($widget['table_desc'][$i]))
					{
						$count++;
					}
				}
			}

			$boxes = '';

			if (isset($widget['table_title']))
			{
				$column = 0;

				for ($i = 0; $i < count($widget['table_title']); $i++)
				{
					if ( ! empty($widget['table_title'][$i]) OR ! empty($widget['table_desc'][$i]))
					{
						$boxes .= $this->group_item($widget, $i);
					}
				}
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Currency').'</span> '.$this->field('text', 'table_currency', $widget).'</label>
					<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
					<label class="label-alt-1">'.$this->field('checkbox', 'aside', $widget).' <span class="label-title">'.ether::langr('First column aside').'</span></label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Add Items').'</h2>
				<div class="ether-tab-content">
					<div class="sortable-content group-content-wrap">
						<div class="buttonset-1">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
						<div class="group-prototype">'.$this->group_item(array(), -1).'</div>
						<div class="group-content">
							<div class="cols-3 cols">
								'.$boxes.'
							</div>
						</div>
						<div class="buttonset-1" style="display: none;">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
					</div>
				</div>
				'.$this->form_common($widget).'
				'.$this->form_slider($widget).'
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_multi_prototype_widget'))
{
	class ether_multi_prototype_widget extends ether_builder_widget
	{
		protected $multi_type;

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'style' => 1,
				'constrain' => 'on',
				'type' => 'x',
				'current' => 0,
				'classes' => '',
			),
			$this->get_defaults(
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			if (empty($widget['type']))
			{
				$widget['type'] = 'x';
			}

			$classes = array('widget', 'multi', 'multi-'.$widget['style']);
			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			$classes[] = 'type-'.$this->multi_type;
			$classes[] = $this->multi_type.'-'.$widget['type'];

			if ($this->multi_type == 'acc' AND empty($widget['constrain']))
			{
				$classes[] = 'constrain-0';
			}

			if ($this->multi_type == 'tabs' AND $widget['type'] == 'y')
			{
				$classes[] = 'tabs-left';
			}

			$output = '<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;

			$count = count($widget['tabs_content']);

			for ($i = 0; $i < $count; $i++)
			{
				if ( ! empty($widget['tabs_title'][$i]) OR ! empty($widget['tabs_content'][$i]))
				{
					$tab_classes = array('title', 'toggle-button');

					if ( ! empty($widget['current']) AND $widget['current'] == $i)
					{
						$tab_classes[] = 'current';
					}

					$output .= '	<h2'.$this->_class($tab_classes).'>'.$widget['tabs_title'][$i].'</h2>'._n;
					$output .= '	<div'.$this->_class(array('content', 'toggle-content')).'>'.wpautop($widget['tabs_content'][$i]).'</div>'._n;
				}
			}

			$output .= '</div>';

			return $output;
		}

		public function group_item($widget, $i)
		{
			return '<div class="col"'.(empty($widget) ? ' style="display: none;"' : '').'><div class="group-item">
				<div class="group-item-title">'.ether::langr('Item').'</div>
				<div class="group-item-content">
					<label><span class="label-title">'.ether::langr('Title').'</span> '.$this->group_field('text', 'tabs_title', $i, $widget).'</label>
					<label><span class="label-title">'.ether::langr('Content').'</span> '.$this->group_field('textarea', 'tabs_content', $i, $widget).'</label>
				</div>
				<div class="group-item-actions">
					<button name="builder-widget-tab-rich" class="builder-widget-group-item-rich">'.ether::langr('Rich Text Editor').'</button>
					<button name="builder-widget-tab-remove" class="builder-widget-group-item-remove">'.ether::langr('Remove').'</button>
				</div>
			</div></div>';
		}

		public function form($widget)
		{
			$widget = ether::extend( array
			(
				'style' => 1,
				'constrain' => 'on',
				'type' => 'x',
				'current' => 0,
				'classes' => '',
			), $widget);

			$types = array
			(
				'' => ether::langr('Default'),
				'x' => ether::langr('Horizontal'),
				'y' => ether::langr('Vertical')
			);

			$styles = apply_filters('ether_multi_styles', array
			(
				'1' => ether::langr('Ether style 1'),
				'2' => ether::langr('Ether style 2'),
			));

			$count = 0;

			if (isset($widget['tabs_content']) AND count($widget['tabs_content']) > 0)
			{
				$count = 0;

				for ($i = 0; $i < count($widget['tabs_content']); $i++)
				{
					if ( ! empty($widget['tabs_title'][$i]) OR ! empty($widget['tabs_content'][$i]))
					{
						$count++;
					}
				}
			}

			$tabs_indices = array();
			$tabs_indices[''] = ether::langr('None');

			if ($count > 1)
			{
				for ($i = 1; $i <= $count; $i++)
				{
					$tabs_indices[$i] = $i;
				}
			}

			$tabs = '';

			if (isset($widget['tabs_content']))
			{
				$column = 0;

				for ($i = 0; $i < count($widget['tabs_content']); $i++)
				{
					if ( ! empty($widget['tabs_title'][$i]) OR ! empty($widget['tabs_content'][$i]))
					{
						$tabs .= $this->group_item($widget, $i);
					}
				}
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols-2">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
						</div>
						<div class="col">
							'.($this->multi_type == 'tabs' ? '<label><span class="label-title">'.ether::langr('Type').'</span> '.$this->field('select', 'type', $widget, array('options' => $types)).'</label>' : '').'
							'.($this->multi_type == 'acc' ? '<label class="label-alt-1">'.$this->field('checkbox', 'constrain', $widget).' <span class="label-title">'.ether::langr('Constrain').'</span></label>' : '').'
						</div>
					</div>
					<label><span class="label-title">'.ether::langr('Current tab').'</span> '.$this->field('select', 'current', $widget, array('options' => $tabs_indices)).'<small>'.ether::langr('Add some items first if nothing is displayed here').'</small></label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Add Items').'</h2>
				<div class="ether-tab-content">
					<div class="ether-form sortable-content  group-content-wrap">
						<div class="buttonset-1">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
						<div class="group-prototype">'.$this->group_item(array(), -1).'</div>
						<div class="group-content">
							<div class="cols-3 cols">
								'.$tabs.'
							</div>
						</div>
						<div class="buttonset-1" style="display: none;">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary ($widget)
		{
			$types = array
			(
				'' => ether::langr('Default'),
				'x' => ether::langr('Horizontal'),
				'y' => ether::langr('Vertical')
			);

			$styles = apply_filters('ether_multi_styles', array
			(
				'1' => ether::langr('Ether style 1'),
				'2' => ether::langr('Ether style 2'),
			));

			return (isset($widget['style']) ? ether::langr('Style: ').$styles[$widget['style']] : '').' '.(isset($widget['types']) ? ether::langr('Type: ').$types[$widget['types']] : '').' '.(isset($widget['current']) ? ether::langr('Selected tab: ').($widget['current'] != '' ? $widget['current'] : ether::langr('None')) : '');
		}

		public function get_widget_location_preview ($widget)
		{
			$output = '<div class="builder-multi-preview-wrap">';

			if (isset($widget['tabs_title']) && count($widget['tabs_title']) > 1)
			{
				foreach($widget['tabs_title'] as $id => $title)
				{
					if ($title != '' || $widget['tabs_content'][$id] != '')
					{
						$output .= '<div class="builder-multi-preview">
							<span class="builder-multi-preview-title">'
							.$title.
							'</span>
							<span class="builder-multi-preview-content">'
							.substr($widget['tabs_content'][$id], 0, 128).
							'</span>
						</div>';
					}
				}
			}
			$output .= '</div>
			';

			return $output;
		}
	}
}

if ( ! class_exists('ether_tabs_widget'))
{
	class ether_tabs_widget extends ether_multi_prototype_widget
	{
		public function __construct()
		{
			parent::__construct('tabs', ether::langr('Tabs'));
			$this->label = ether::langr('Generate tabbed content.');
			$this->multi_type = 'tabs';
		}
	}
}

if ( ! class_exists('ether_accordion_widget'))
{
	class ether_accordion_widget extends ether_multi_prototype_widget
	{
		public function __construct()
		{
			parent::__construct('accordion', ether::langr('Accordion'));
			$this->label = ether::langr('Generate tabbed content.');
			$this->multi_type = 'acc';
		}

		public function get_widget_location_preview($widget)
		{
			return parent::get_widget_location_preview($widget);
		}
	}
}

if ( ! class_exists('ether_pricing_box_widget'))
{
	class ether_pricing_box_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('pricing-box', ether::langr('Pricing box'));
			$this->label = ether::langr('Cool and elegant pricing boxes.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'cols' => 1,
				'rows' => 1,
				'classes' => '',
				'currency' => '',
			),
			$this->get_defaults(
				'grid_settings', 
				'widget_clearfloat',
				'widget_align_pos'
			)), $widget);

			$classes = array_merge(array('widget', 'prcbox', 'prcbox-1', 'grid'), $this->get_classes($widget));
			$classes = $this->append_classes($classes, $widget, array('widget_clearfloat', 'widget_alignment'));

			$output = '';

			$output .= '<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;
			$output .= '	'.$this->gen_html($widget, 'cols')._n;

			$count = count($widget['box_content']);

			for ($i = 0; $i < $count; $i++)
			{
				if ( ! empty($widget['box_title'][$i]) OR ! empty($widget['box_content'][$i]))
				{
					$output .= '		<div'.$this->_class('col').'>'._n;
					$output .= '			<div'.$this->_class('prcbox-item').'>'._n;
					$output .= '				<h2'.$this->_class('prcbox-title'). 'style="'.((isset($widget['box_background_color'][$i]) AND ! empty($widget['box_background_color'][$i])) ? ' background-color: '.$widget['box_background_color'][$i].';' : '').' '.((isset($widget['box_text_color'][$i]) AND ! empty($widget['box_text_color'][$i])) ? ' color: '.$widget['box_text_color'][$i].';' : '').'">'.$widget['box_title'][$i].'</h2>'._n;
					$output .= '				<p'.$this->_class('prcbox-price').'><span'.$this->_class('prcbox-currency').'>'.$widget['currency'].'</span><span'.$this->_class('prcbox-val-main').'>'.$widget['box_price_main'][$i].'</span><sup'.$this->_class('prcbox-val-tail').'>'.$widget['box_price_tail'][$i].'</sup></span></p>'._n;
					$output .= '				<div'.$this->_class('prcbox-desc').'>'._n;
					$output .= '					'.wpautop($widget['box_content'][$i])._n;
					$output .= '				</div>'._n;
					$output .= '				<a href="'.$widget['box_button_url'][$i].'"'.$this->_class('prcbox-button'). 'style="'.((isset($widget['box_background_color'][$i]) AND ! empty($widget['box_background_color'][$i])) ? ' background-color: '.$widget['box_background_color'][$i].';' : '').' '.((isset($widget['box_text_color'][$i]) AND ! empty($widget['box_text_color'][$i])) ? ' color: '.$widget['box_text_color'][$i].';' : '').'">'.$widget['box_button_label'][$i].'</a>'._n;
					$output .= '			</div>'._n;
					$output .= '		</div>'._n;
				}
			}

			$output .= '	</div>'._n;
			$output .= '</div>'._n;

			return $output;
		}

		public function group_item($widget, $i)
		{
			return '<div class="col"'.(empty($widget) ? ' style="display: none;"' : '').'>
				<div class="group-item">
					<div class="group-item-title">'.ether::langr('Item').'</div>
					<div class="group-item-content">
						<label><span class="label-title">'.ether::langr('Title').'</span> '.$this->group_field('text', 'box_title', $i, $widget).'</label>
						<label class="ether-color"><span class="label-title">'.ether::langr('BG Color').'</span> '.$this->group_field('text', 'box_background_color', $i, $widget).'<small>'.ether::langr('hex, rgb or rgba. Overrides default.').'</small></label>
						<label class="ether-color"><span class="label-title">'.ether::langr('Text Color').'</span> '.$this->group_field('text', 'box_text_color', $i, $widget).'<small>'.ether::langr('hex, rgb or rgba. Overrides default.').'</small></label>
						<div class="cols cols-2">
							<div class="col">
								<label><span class="label-title">'.ether::langr('Price (main)').'</span> '.$this->group_field('text', 'box_price_main', $i, $widget).'</label>
							</div>
							<div class="col">
								<label><span class="label-title">'.ether::langr('Price (tail)').'</span> '.$this->group_field('text', 'box_price_tail', $i, $widget).'</label>
							</div>
						</div>
						<label><span class="label-title">'.ether::langr('Content').'</span> '.$this->group_field('textarea', 'box_content', $i, $widget).'</label>
						<label><span class="label-title">'.ether::langr('Button label').'</span> '.$this->group_field('text', 'box_button_label', $i, $widget).'</label>
						<label><span class="label-title">'.ether::langr('Button url').'</span> '.$this->group_field('text', 'box_button_url', $i, $widget).'</label>
					</div>
					<div class="group-item-actions">
						<button name="builder-widget-tab-rich" class="builder-widget-group-item-rich">'.ether::langr('Rich Text Editor').'</button>
						<button name="builder-widget-tab-remove" class="builder-widget-group-item-remove">'.ether::langr('Remove').'</button>
					</div>
				</div>
			</div>';
		}

		public function form($widget)
		{
			$columns = array();

			for ($i = 1; $i <= 6; $i++)
			{
				$columns[$i] = $i;
			}

			$count = 1;

			if (isset($widget['box_content']) AND count($widget['box_content']) > 0)
			{
				$count = 0;

				for ($i = 0; $i < count($widget['box_content']); $i++)
				{
					if ( ! empty($widget['box_title'][$i]) OR ! empty($widget['box_content'][$i]))
					{
						$count++;
					}
				}
			}

			$boxes = '';

			if (isset($widget['box_content']))
			{
				$column = 0;

				for ($i = 0; $i < count($widget['box_content']); $i++)
				{
					if ( ! empty($widget['box_title'][$i]) OR ! empty($widget['box_content'][$i]))
					{
						$boxes .= $this->group_item($widget, $i);
					}
				}
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Currency').'</span> '.$this->field('text', 'currency', $widget).'</label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Add Items').'</h2>
				<div class="ether-tab-content">
					<div class="sortable-content group-content-wrap">
						<div class="buttonset-1">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
						<div class="group-prototype">'.$this->group_item(array(), -1).'</div>
						<div class="group-content">
							<div class="cols-3 cols">
								'.$boxes.'
							</div>
						</div>
						<div class="buttonset-1" style="display: none;">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
					</div>
				</div>
				'.$this->form_common($widget).'
				'.$this->form_slider($widget).'
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary($widget)
		{
			return $this->get_grid_slider_summary($widget);
		}

		public function get_widget_location_preview ($widget)
		{
			$output = '<div class="builder-multi-preview-wrap">';

			if (isset($widget['box_title']) && count($widget['box_title']) > 1)
			{
				foreach($widget['box_title'] as $id => $title)
				{
					if ($title != '' || $widget['box_content'][$id] != '')
					{
						$output .= '<div class="builder-multi-preview">
							<span class="builder-multi-preview-title">'
							.$title.
							'</span>
							<span class="builder-multi-preview-content">'
							.substr($widget['box_content'][$id], 0, 128).
							'</span>
						</div>';
					}
				}
			}
			$output .= '</div>
			';

			return $output;
		}
	}
}


if ( ! class_exists('ether_posts_feed_widget'))
{
	class ether_posts_feed_widget extends ether_slider_ready_widget
	{
		protected $post_type = 'post';
		protected $post_taxonomy = 'category';

		public function widget($widget)
		{
			$output = '';

			$widget = ether::extend( array_merge(array
			(
				'ratio' => 100,
				'frame' => '',
				'disable_lightbox' => '',
				'style' => 1,
				'rows' => 1,
				'columns' => 1,
				'select' => '',
				'content_hide' => '',
				'link_to_post' => '',
				'classes' => ''
			),
			$this->get_defaults(
				'img_title',
				'img_align_fit',
				'grid_settings',
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			// if empty then it's custom post feed
			if (empty($this->post_type))
			{
				$this->post_type = $widget['post_type'];

				if ( ! empty($widget['taxonomy']))
				{
					if ( ! empty($widget['term']))
					{
						$widget['term'] = substr($widget['term'], strlen($widget['taxonomy']) + 1);
					}

					$this->taxonomy = $widget['taxonomy'] = substr($widget['taxonomy'], strlen($this->post_type) + 1);
				}
			}

			$posts = $this->get_posts($widget, $this->post_type, array('preview_image', 'preview_alt', 'featured'));

			//$classes = array_merge(array('widget', 'gallery'), $this->get_classes($widget));

			$classes = array_merge(array('widget', 'blog-feed-'.$widget['style']), $this->get_classes($widget));

			$classes = $this->append_classes($classes, $widget, array('img_title', 'media_wrap', 'widget_alignment', 'widget_clearfloat'));

			// $classes[] = 'hide-grid-cell-overflow-0';
			$classes[] = 'use-parent-wrap';

			$widget = $this->get_data($widget, array('widget_dimensions', 'image_dimensions'));

			if ($widget['select'] == 'related' AND ! is_singular($this->post_type))
			{
				return '';
			}

			if ($widget['style'] == 2)
			{
				$output .= '<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;
				$output .= '	'.$this->gen_html($widget, 'cols')._n;

				foreach ($posts as $p)
				{
					$output .= '		<div'.$this->_class('col').'>'._n;
					$output .= '			<div'.$this->_class('blog-feed-2-item').'>'._n;

					if ( ! isset($p['meta']['preview_image']) OR empty($p['meta']['preview_image']))
					{
						$images = ether::meta('images', TRUE, $p['id']);

						if (is_array($images) AND count($images) > 0 AND ! empty($images[0]['image_url']))
						{
							$p['meta']['preview_image'] = $images[0]['image_url'];
							$p['meta']['preview_alt'] = $images[0]['image_alt'];
						}
					}

					if (isset($p['meta']['preview_image']) AND ! empty($p['meta']['preview_image']))
					{
						if ($widget['image_crop_width'] > 0 OR $widget['image_crop_height'] > 0)
						{
							$p['meta']['preview_image'] = ether::get_image_thumbnail(ether::get_image_base($p['meta']['preview_image']), $widget['image_crop_width'], $widget['image_crop_height']);
						}
					}

					if (empty($p['meta']['preview_image']))
					{
						$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($p['id']));

						if ( ! empty($thumbnail))
						{
							$p['meta']['preview_image'] = $thumbnail;
						} else
						{
							$p['meta']['preview_image'] = ether::path('media/images/placeholder-empty.png', TRUE);
						}
					}

					$output .= '				<div'.$this->_class(array('media-img', 'media-wrap', 'media-type-img')).'>'.($widget['link_to_post'] == 'on' ? '<a href="'.$p['permalink'].'">' : '').'<img src="'.ether::img($p['meta']['preview_image'], 'preview').'" alt="'.$p['meta']['preview_alt'].'"'.($widget['image_width'] > 0 ? ' width="'.$widget['image_width'].'"' : '').($widget['image_height'] > 0 ? ' height="'.$widget['image_height'].'"' : '').' />'.($widget['link_to_post'] == 'on' ? '</a>' : '');

					if ($widget['frame'] == 2)
					{
						$output .= '<div'.$this->_class('media-helper').'></div>';
					}

					$output .= '</div>'._n;

					$output .= '				<div'.$this->_class('properties').'>'._n;
					$output .= '					<div'.$this->_class(array('author', 'meta')).'>'.$p['author_link'].'</div>'._n;
					$output .= '					<div'.$this->_class(array('pubdate', 'meta')).' pubdate datetime="'.$p['date_ymd'].'">'.$p['date'].'</div>'._n;
					$output .= '					<p'.$this->_class(array('comment', 'meta')).'><a href="'.$p['permalink'].'#comments">'.get_comments_number($p['id']).'</a></p>'._n;

					if ($this->post_type == 'post' OR ! empty($this->post_taxonomy))
					{
						$tags = wp_get_object_terms($p['id'], ($this->post_type == 'post' ? 'post_tag' : $this->post_taxonomy), array('hide_empty' => TRUE));
						$tags_output = '';

						if ( ! empty($tags))
						{
							foreach ($tags as $tag)
							{
								$tags_output[] = '<a href="'.get_term_link($tag).'">'.$tag->name.'</a>';
							}
						}

						if ( ! empty($tags_output))
						{
							$output .= '					<p'.$this->_class(array('tags', 'meta')).'>'.implode(', ', $tags_output).'</a>'._n;
						}
					}

					$output .= '				</div>'._n;

					if ( ! empty($widget['trim_words']) AND $widget['trim_words'] > 0)
					{
						$p['content'] = ether::trim_words($p['content'], $widget['trim_words'], TRUE);
					}

					$output .= '				<div'.$this->_class('header').'>'._n;
					$output .= '					<h2><a href="'.$p['permalink'].'">'.$p['title'].'</a></h2>'._n;
					$output .= '				</div>'._n;

					if (empty($widget['content_hide']))
					{
						$output .= '				<div'.$this->_class('intro').'>'.wpautop($p['content']).'</div>'._n;
					}

					//$output .= '				<a href="'.$p['permalink'].'" class="'.ether::config('builder_widget_prefix').'widget '.ether::config('builder_widget_prefix').'button '.ether::config('builder_widget_prefix').'button-medium '.ether::config('builder_widget_prefix').'alignright">'.ether::langr('View').'</a>'._n;

					if (empty($widget['button_hide']))
					{
						$output .= '				<a href="'.$p['permalink'].'"'.$this->_class('alignright').'>'.ether::langr('View').'</a>'._n;
					}

					if ($p['meta']['featured'] == 'on')
					{
						$output .= '				<div'.$this->_class('featured-1').'><div></div></div>'._n;
					}

					$output .= '			</div>'._n;
					$output .= '		</div>'._n;
				}

				$output .= '	</div>'._n;
				$output .= '</div>'._n;
			} else
			{
				$output .= '<div'.$this->_class($classes, $widget['classes']).'>'._n;
				$output .= '	'.$this->gen_html($widget, 'cols')._n;

				foreach ($posts as $p)
				{
					$output .= '		<div'.$this->_class('col').'>'._n;
					$output .= '			<div'.$this->_class('blog-feed-1-item').'>'._n;

					if ( ! isset($widget['preview_hide']) OR $widget['preview_hide'] != 'on')
					{
						if ( ! isset($p['meta']['preview_image']) OR empty($p['meta']['preview_image']))
						{
							$images = ether::meta('images', TRUE, $p['id']);

							if (is_array($images) AND count($images) > 0 AND ! empty($images[0]['image_url']))
							{
								$p['meta']['preview_image'] = $images[0]['image_url'];
								$p['meta']['preview_alt'] = $images[0]['image_alt'];
							}
						}

						if (isset($p['meta']['preview_image']) AND ! empty($p['meta']['preview_image']))
						{
							if ($widget['image_crop_width'] > 0 OR $widget['image_crop_height'] > 0)
							{
								$p['meta']['preview_image'] = ether::get_image_thumbnail(ether::get_image_base($p['meta']['preview_image']), $widget['image_crop_width'], $widget['image_crop_height']);
							}
						}

						if (empty($p['meta']['preview_image']))
						{
							$thumbnail = wp_get_attachment_url(get_post_thumbnail_id($p['id']));

							if ( ! empty($thumbnail))
							{
								$p['meta']['preview_image'] = $thumbnail;
							} else
							{
								$p['meta']['preview_image'] = ether::path('media/images/placeholder-empty.png', TRUE);
							}
						}

						$output .= '				<div'.$this->_class(array('media-img', 'media-wrap', 'media-type-img')).'>'.($widget['link_to_post'] == 'on' ? '<a href="'.$p['permalink'].'">' : '').'<img src="'.ether::img($p['meta']['preview_image'], 'preview').'" alt="'.$p['meta']['preview_alt'].'"'.($widget['image_width'] > 0 ? ' width="'.$widget['image_width'].'"' : '').($widget['image_height'] > 0 ? ' height="'.$widget['image_height'].'"' : '').' />'.($widget['link_to_post'] == 'on' ? '</a>' : '');

						if ($widget['frame'] == 2)
						{
							$output .= '<div'.$this->_class('media-helper').'></div>';
						}

						$output .= '</div>'._n;
					}

					$output .= '				<div'.$this->_class('header').'>'._n;
					$output .= '					<h2><a href="'.$p['permalink'].'">'.$p['title'].'</a></h2>'._n;
					$output .= '				</div>'._n;

					if (empty($widget['content_hide']))
					{
						$output .= '				<div'.$this->_class('properties').'">'._n;
						//$output .= '					<div  class=".ether::config('builder_widget_prefix').author">'.ether::langr('Posted by %s', $p['author_link']).' </div>'._n;
						$output .= '					<div'.$this->_class('pubdate').' pubdate datetime="'.$p['date_ymd'].'">'.ether::twitter_time($p['timestamp']).'</div>'._n;
						$output .= '				</div>'._n;

						if ( ! empty($widget['trim_words']) AND $widget['trim_words'] > 0)
						{
							$p['content'] = ether::trim_words($p['content'], $widget['trim_words'], TRUE);
						}

						$output .= '				<div'.$this->_class('intro').'>'.wpautop($p['content']).'</div>'._n;
					}

					//$output .= '				<a href="'.$p['permalink'].'" class="'.ether::config('builder_widget_prefix').'widget '.ether::config('builder_widget_prefix').'button  '.ether::config('builder_widget_prefix').'button-medium '.ether::config('builder_widget_prefix').'alignright">'.ether::langr('Read more').'</a>'._n;

					if (empty($widget['button_hide']))
					{
						$output .= '				<a href="'.$p['permalink'].'"'.$this->_class('alignright').'>'.ether::langr('Read more').'</a>'._n;
					}

					if ($p['meta']['featured'] == 'on')
					{
						$output .= '				<div'.$this->_class('featured-1').'><div></div></div>'._n;
					}

					$output .= '			</div>'._n;
					$output .= '		</div>'._n;
				}

				$output .= '	</div>'._n;
				$output .= '</div>'._n;
			}

			return $output;
		}

		public function form($widget)
		{
			$styles = array
			(
				1 => ether::langr('Post style'),
				2 => ether::langr('Gallery style')
			);

			$trims = array
			(
				5,
				10,
				15,
				20,
				25,
				30,
				50,
				100
			);

			$_trims = array();

			foreach ($trims as $words)
			{
				$_trims[$words] = ether::langr('%d words', $words);
			}

			$trims = $_trims;

			$select = array
			(
				'' => ether::langr('All'),
				'related' => ether::langr('Related'),
				'featured' => ether::langr('Featured'),
				'popular' => ether::langr('Popular'),
				'random' => ether::langr('Random')
			);


			if ( ! is_array($widget) OR empty($widget))
			{
				$widget['ratio'] = 100;
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<hr />
					<h3 class="ether-section-title">Content formatting</h3>
					<div class="cols cols-2">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Trim words').'</span> '.$this->field('select', 'trim_words', $widget, array('options' => $trims)).'</label>
						</div>
					</div>
					<div class="cols-3">
						<div class="col">
							<label>'.$this->field('checkbox', 'content_hide', $widget).' <span class="label-title">'.ether::langr('Hide excerpts').'</span></label>
						</div>
						<div class="col">
							<label>'.$this->field('checkbox', 'button_hide', $widget).' <span class="label-title">'.ether::langr('Hide \'more\' button').'</span></label>
						</div>
						<div class="col">
							<label>'.$this->field('checkbox', 'preview_hide', $widget).' <span class="label-title">'.ether::langr('Hide preview image').'</span></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Feed Settings').'</h2>
				<div class="ether-tab-content">
					'.$this->form_posts($widget, $this->post_type, $this->post_taxonomy).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Select by').'</span> '.$this->field('select', 'select', $widget, array('options' => $select)).'</label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Preview Image Settings').'</h2>
				<div class="ether-tab-content">
					'.$this->form_media_frame($widget, FALSE, TRUE).'
					'.$this->form_image_dimensions($widget).'
				</div>
				'.$this->form_common($widget).'
				'.$this->form_slider($widget).'
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary ($widget)
		{
			return 'Category: '.(isset($widget['term']) && ! empty($widget['term']) ? $widget['term'] : 'None').' Order by: '.(isset($widget['orderby']) && ! empty($widget['orderby']) ? $widget['orderby'] : 'None').' Count: '.(isset($widget['numberposts']) && ! empty($widget['numberposts']) ? $widget['numberposts'] : 'None').';'.(isset($widget['style']) && ! empty($widget['style']) ? ' '.$widget['style'] : '');
		}
	}
}

if ( ! class_exists('ether_post_feed_widget'))
{
	class ether_post_feed_widget extends ether_posts_feed_widget
	{
		public function __construct()
		{
			parent::__construct('post-feed', ether::langr('Post feed'));
			$this->label = ether::langr('Add related/featured/recent posts from blog feed');
			$this->post_type = 'post';
			$this->post_taxonomy = 'category';
		}
	}
}

if ( ! class_exists('ether_page_feed_widget'))
{
	class ether_page_feed_widget extends ether_posts_feed_widget
	{
		public function __construct()
		{
			parent::__construct('page-feed', ether::langr('Page feed'));
			$this->label = ether::langr('Add related/featured/recent pages');
			$this->post_type = 'page';
			$this->post_taxonomy = '';
		}
	}
}

if ( ! class_exists('ether_custom_feed_widget'))
{
	class ether_custom_feed_widget extends ether_posts_feed_widget
	{
		public function __construct()
		{
			parent::__construct('custom-feed', ether::langr('Custom post feed'));
			$this->label = ether::langr('Add custom post types feeds');
			$this->post_type = '';
			$this->post_taxonomy = '';
		}
	}
}

if ( ! class_exists('ether_gallery_widget'))
{
	class ether_gallery_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('gallery', ether::langr('Gallery'));
			$this->label = ether::langr('Creates custom gallery of images.');
		}

		public function item($widget, $data, $hidden = FALSE)
		{
			$output = '';

			$image = $data['image_url'];
			$alt = $data['image_alt'];
			$link = $data['image_link'];

			if ( ! empty($image))
			{
				if ($widget['image_crop_width'] > 0 OR $widget['image_crop_height'] > 0)
				{
					$image = ether::get_image_thumbnail(ether::get_image_base($image), $widget['image_crop_width'], $widget['image_crop_height']);
				}

				$output .= _t(5).'		<div'.$this->_class('col').($hidden ? ' style="display: none;"' : '').'>'._n;
				$output .= _t(5).'			<div'.$this->_class('gallery-item').'>'._n;

				$is_video = ether::video($image);

				if ( ! empty($is_video))
				{
					$output .= _t(5).'				<div'.$this->_class('media-video').'>'.$is_video.'</div>'._n;
				} else
				{
					$output .= _t(5).'				';

					if ($widget['disable_lightbox'] != 'on' OR ! empty($link))
					{
						//$output .= '<a href="'.( ! empty($link) ? $link : $image).'"'.$this->_class(array('media-img', 'media-wrap', 'media-type-img')).($widget['disable_lightbox'] == 'on' ? '' : ' rel="lightbox[album-'.$data['album'].']').'">';
						$output .= '<a href="'.( ! empty($link) ? $link : $image).'"'.($widget['disable_lightbox'] == 'on' ? '' : ' rel="lightbox[album-'.$data['album'].']').'">';
					} else
					{
						$output .= '<div'.$this->_class(array('media-img', 'media-wrap', 'media-type-img')).'>';
					}

					$output .= '<img src="'.ether::img($image, 'gallery').'" alt="'.$alt.'"'.($widget['image_width'] > 0 ? ' width="'.$widget['image_width'].'"' : '').($widget['image_height'] > 0 ? ' height="'.$widget['image_height'].'"' : '').' />';

					if ($widget['frame'] == 2)
					{
						$output .= '<div'.$this->_class('media-helper').'></div>';
					}

					if ($widget['disable_lightbox'] != 'on' OR ! empty($link))
					{
						$output .= '</a>';
					} else
					{
						$output .= '</div>';
					}

					$output .= _n;
				}

				$output .= _t(5).'			</div>'._n;
				$output .= _t(5).'		</div>'._n;
			}

			return $output;
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'ratio' => 100,
				'frame' => '',
				'disable_lightbox' => '',
				'term' => '',
				'front_only' => '',
				'classes' => ''
			),
			$this->get_defaults(
				'img_title',
				'img_align_fit',
				'grid_settings',
				'widget_clearfloat',
				'widget_pos_align'
			)), $widget);

			$widget = $this->get_data($widget, array('widget_dimensions', 'image_dimensions'));

			$classes = array_merge(array('widget', 'gallery'), $this->get_classes($widget));

			if ($widget['front_only'] == 'on')
			{
				$widget['slider'] = '';
			}

			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'img_title', 'media_wrap', 'widget_clearfloat'));

			$classes[] = 'use-parent-wrap';

			$output = _t(5).'<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;
			$output .= _t(5).'	'.$this->gen_html($widget, 'cols')._n;

			$album = time();

			if (class_exists('ether_tile') AND ! empty($widget['term']))
			{
				$tiles = $this->get_posts($widget, 'tile', array('url', 'image_url', 'image_alt'));

				foreach ($tiles as $tile)
				{
					if ( ! empty($tile['meta']['image_url']))
					{
						$hidden = $i > 1 ? TRUE : FALSE;

						if (empty($widget['front_only']))
						{
							$hidden = FALSE;
						}

						$output .= $this->item($widget, array
						(
							'image_url' => $tile['meta']['image_url'],
							'image_alt' => $tile['meta']['image_alt'],
							'image_link' => '',
							'album' => $album
						), $hidden);
					}
				}
			} else if (isset($widget['image_url']) AND ! empty($widget['image_url']))
			{
				$count = count($widget['image_url']);

				for ($i = 0; $i < $count; $i++)
				{
					if ( ! empty($widget['image_url'][$i]) OR ! empty($widget['image_alt'][$i]))
					{
						$hidden = $i > 1 ? TRUE : FALSE;

						if (empty($widget['front_only']))
						{
							$hidden = FALSE;
						}

						$output .= $this->item($widget, array
						(
							'image_url' => $widget['image_url'][$i],
							'image_alt' => $widget['image_alt'][$i],
							'image_link' => $widget['image_link'][$i],
							'album' => $album
						), $hidden);
					}
				}
			}

			$output .= _t(5).'	</div>'._n;
			$output .= _t(5).'</div>'._n;

			return $output;
		}

		public function group_item($widget, $i)
		{
			return '<div class="col"'.(empty($widget) ? ' style="display: none;"' : '').'><div class="group-item">
				<div class="group-item-title">'.ether::langr('Item').'</div>
				<div class="group-item-content">
					<div class="preview-img-wrap"><img src="'.($i >= 0 ? $widget['image_url'][$i] : '').'" class="ether-preview upload_image" /></div>
					<label><span class="label-title">'.ether::langr('Image URL').'</span> '.$this->group_field('text', 'image_url', $i, $widget, array('class' => 'upload_image')).'</label>
					<label><span class="label-title">'.ether::langr('Image alt').'</span> '.$this->group_field('text', 'image_alt', $i, $widget).'</label>
					<label><span class="label-title">'.ether::langr('Link URL').'</span> '.$this->field('text', 'image_link][', (isset($widget['image_link'][$i])  ? $widget['image_link'][$i] : '')).'</label>
				</div>
				<div class="group-item-actions">
					<button type="submit"'.$this->get_field_atts('change_item').' name="'.$this->get_field_name('change_item').'" class="builder-widget-gallery-change upload_image single callback-builder_gallery_widget_change builder-widget-group-item-edit-image">'.ether::langr('Edit').'</button>
					<button type="submit"'.$this->get_field_atts('remove_item').' name="'.$this->get_field_name('remove_item').'" class="builder-widget-group-item-remove">'.ether::langr('Remove').'</button>
				</div>
			</div></div>';
		}

		public function form($widget)
		{
			$widget = ether::extend( array
			(
				'ratio' => 100
			), $widget);

			$items = '';

			if (isset($widget['image_url']) AND ! empty($widget['image_url']))
			{
				$count = count($widget['image_url']);

				for ($i = 0; $i < $count; $i++)
				{
					if ( ! isset($widget['image_link']))
					{
						$widget['image_link'] = array();
					}

					if ( ! empty($widget['image_url'][$i]) OR ! empty($widget['image_alt'][$i]))
					{
						$items .= $this->group_item($widget, $i);
					}
				}
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					'.$this->form_posts($widget, 'tile', 'tileset').'
					<div class="cols cols-2">
						<div class="col">
							<label>'.$this->field('checkbox', 'front_only', $widget).' <span class="label-title">'.ether::langr('Front image only').'</span><small>'.ether::langr('Displays first image only, the rest is available via lightbox').'</small></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Add Items').'</h2>
				<div class="ether-tab-content">
					<div class="ether-form sortable-content  group-content-wrap">
						<div class="buttonset-1">
							<button type="submit"'.$this->get_field_atts('add_item').' name="'.$this->get_field_name('add_item').'" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add item').'</button>
							<button type="submit"'.$this->get_field_atts('insert_images').' name="'.$this->get_field_name('insert_images').'" class="builder-button-classic builder-widget-gallery-insert upload_image callback-builder_gallery_widget_insert">'.ether::langr('Insert images').'</button>
						</div>
						<div class="group-prototype">'.$this->group_item(array(), -1).'</div>
						<div class="group-content">
							<div class="cols-3 cols">
								'.$items.'
							</div>
						</div>
						<div class="buttonset-1" style="display: none;">
							<button type="submit"'.$this->get_field_atts('add_item').' name="'.$this->get_field_name('add_item').'" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add item').'</button>
							<button type="submit"'.$this->get_field_atts('insert_images').' name="'.$this->get_field_name('insert_images').'" class="builder-button-classic builder-widget-gallery-insert upload_image callback-builder_gallery_widget_insert">'.ether::langr('Insert images').'</button>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Item Settings').'</h2>
				<div class="ether-tab-content">
					'.$this->form_media_frame($widget).'
					'.$this->form_image_dimensions($widget).'
				</div>
				'.$this->form_common($widget).'
				'.$this->form_slider($widget).'
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_title($widget = NULL)
		{
			$numitems = isset($widget['image_url']) ? count($widget['image_url']) - 1 : 0;

			return $numitems > 0 ? ether::langr('Items: ').$numitems : parent::get_title($widget);
		}

		public function get_summary($widget)
		{
			return $this->get_grid_slider_summary($widget);
		}

		public function get_widget_location_preview($widget)
		{
			// if (isset($widget['image_url']) && ! empty($widget['image_url']))
			// {
				$output = '';

				$output .='<div class="builder-widget-gallery-preview">';

				$output .='</div>';

				return $output;
			// }
		}
	}
}

if ( ! class_exists('ether_services_widget'))
{
	class ether_services_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('services', ether::langr('Services'));
			$this->label = ether::langr('Multipurpouse widget for displaying combination of images, titles and content');
		}

		public function item($widget, $data)
		{
			$output = '';
			$output .= '		<div'.$this->_class('col').'>'._n;
			$output .= '			<section'.$this->_class('services-item').'>'._n;

			$title = '';
			$image = '';

			if ( ! isset($widget['title_hide']) OR $widget['title_hide'] != 'on')
			{
				if ( ! empty($data['subtitle']))
				{
					$title .= '				<hgroup>'._n;
					$title .= '					<h2'.$this->_class('title').'>'.( ! empty($data['url']) ? '<a href="'.$data['url'].'">' : '').$data['title'].( ! empty($data['url']) ? '</a>' : '').'</h2>'._n;
					$title .= '					<h3'.$this->_class('subtitle').'>'.$data['subtitle'].'</h3>'._n;
					$title .= '				</hgroup>'._n;
				} else
				{
					$title .= '				<h2'.$this->_class('title').'>'.( ! empty($data['url']) ? '<a href="'.$data['url'].'">' : '').$data['title'].( ! empty($data['url']) ? '</a>' : '').'</h2>'._n;
				}
			}

			if ($widget['type'] != 'text-only' AND $widget['type'] != 'number')
			{
				if (empty($data['image_url']))
				{
					$data['image_url'] = ether::path('media/images/placeholder.png', TRUE);

					$image = '			<img src="'.ether::img($data['image_url'], 'services').'" alt="'.$data['image_alt'].'" width="50" />'._n;
				} else
				{
					$image_url = $data['image_url'];

					if ($widget['image_crop_width'] > 0 OR $widget['image_crop_height'] > 0)
					{
						$image_url = ether::get_image_thumbnail(ether::get_image_base($image_url), $widget['image_crop_width'], $widget['image_crop_height']);
					}

					$is_video = ether::video($image_url);

					if ( ! empty($is_video))
					{
						$image .= '			<div'.$this->_class('media-video').'>'.$is_video.'</div>'._n;
					} else
					{
						$image = '			'.( ! empty($data['url']) ? '<a href="'.$data['url'].'">' : '').'<img src="'.ether::img($image_url, 'services').'" alt="'.$data['image_alt'].'"'.($widget['image_width'] > 0 ? ' width="'.$widget['image_width'].'"' : '').($widget['image_height'] > 0 ? ' height="'.$widget['image_height'].'"' : '').' />'.( ! empty($data['url']) ? '</a>' : '')._n;
					}
				}
			} else if ($widget['type'] == 'number')
			{
				$image = '				<div'.$this->_class('counter').'>'.$data['counter'].'</div>'._n;
			}

			if (isset($widget['title_overhead']) AND $widget['title_overhead'] == 'on')
			{
				$output .= $title;
				$output .= $image;
			} else
			{
				$output .= $image;
				$output .= $title;
			}

			if ($widget['type'] != 'image-only')
			{
				$output .= '				<div'.$this->_class('content').'>'.wpautop($data['content']).'</div>'._n;
			}

			$output .= '			</section>'._n;
			$output .= '		</div>'._n;

			return $output;
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'content_align' => 'left',
				'style' => 1,
				'classes' => '',
				'view_pos' => 0,
			),
			$this->get_defaults(
				'grid_settings',
				'widget_pos_align'
			)), $widget);

			$output = '';

			$classes = array_merge(array('widget', 'services'), $this->get_classes($widget));

			$classes[] = 'grid-height-auto';
			$classes[] = 'services-'.$widget['style'];

			if ($widget['type'] == 'image-only' OR $widget['type'] == 'text-only')
			{
				$classes[] = 'image';
			} else
			{
				$classes[] = $widget['type'].'-'.$widget['content_align'];
			}

			if ($widget['type'] == 'icon')
			{
				$widget['image_width'] = 50;
				$widget['image_height'] = 50;
			} else if ($widget['type'] == 'number' AND $widget['content_align'] == 'center')
			{
				$widget['content_align'] = 'top';
			}

			$widget = $this->get_data($widget, array('widget_dimensions', 'image_dimensions'));

			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			$counter = 1;

			$output .= '<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;
			$output .= '	'.$this->gen_html($widget, 'cols')._n;

			if (class_exists('ether_tile') AND isset($widget['term']) AND ! empty($widget['term']))
			{
				$tiles = $this->get_posts($widget, 'tile', array('url', 'service_subtitle', 'image_url', 'image_alt'));

				foreach ($tiles as $tile)
				{
					$output .= $this->item($widget, array
					(
						'title' => $tile['title'],
						'subtitle' => $tile['subtitle'],
						'content' => $tile['content'],
						'url' => $tile['meta']['url'],
						'image_url' => $tile['meta']['image_url'],
						'image_alt' => $tile['meta']['image_alt'],
						'counter' => $counter
					));

					$counter++;
				}
			} else if (isset($widget['service_content']) AND ! empty($widget['service_content']))
			{
				$count = count($widget['service_content']);

				for ($i = 0; $i < $count; $i++)
				{
					if ( ! empty($widget['service_title'][$i]) OR ! empty($widget['service_content'][$i]) OR ! empty($widget['image_url'][$i]))
					{
						$output .= $this->item($widget, array
						(
							'title' => $widget['service_title'][$i],
							'subtitle' => '',
							'content' => $widget['service_content'][$i],
							'url' => $widget['service_link'][$i],
							'image_url' => $widget['image_url'][$i],
							'image_alt' => $widget['image_alt'][$i],
							'counter' => $counter
						));

						$counter++;
					}
				}
			}

			$output .= '	</div>'._n;
			$output .= '</div>'._n;

			return $output;
		}

		public function group_item($widget, $i)
		{
			return '<div class="col"'.(empty($widget) ? ' style="display: none;"' : '').'><div class="group-item gallery-item">
				<div class="group-item-title">'.ether::langr('Item').'</div>
				<div class="group-item-content">
					<div class="preview-img-wrap">
						<img src="'.($i >= 0 ? $widget['image_url'][$i] : '').'" class="ether-preview upload_image" />
					</div>
					<label><span class="label-title">'.ether::langr('Image URL').'</span> '.$this->group_field('text', 'image_url', $i, $widget, array('class' => 'upload_image')).'</label>
					<label><span class="label-title">'.ether::langr('Image alt').'</span> '.$this->group_field('text', 'image_alt', $i, $widget).'</label>
					<label><span class="label-title">'.ether::langr('Link URL').'</span> '.$this->group_field('text', 'service_link', $i, $widget).'</label>
					<label><span class="label-title">'.ether::langr('Title').'</span> '.$this->group_field('text', 'service_title', $i, $widget).'</label>
					<label><span class="label-title">'.ether::langr('Content').'</span> '.$this->group_field('textarea', 'service_content', $i, $widget).'</label>
				</div>
				<div class="group-item-actions">
					<button name="builder-widget-tab-rich" class="builder-widget-group-item-rich">'.ether::langr('Rich Text Editor').'</button>
					<button type="submit"'.$this->get_field_atts('change_item').' name="'.$this->get_field_name('change_item').'" class="builder-widget-gallery-change upload_image single callback-builder_gallery_widget_change builder-widget-group-item-edit-image">'.ether::langr('Edit').'</button>
					<button name="builder-widget-tab-remove" class="builder-widget-group-item-remove">'.ether::langr('Remove').'</button>
				</div>
			</div></div>';
		}

		public function form($widget)
		{
			$types = array
			(
				'icon' => ether::langr('Icons (50x50 pixels)'),
				'image' => ether::langr('Images'),
				'image-only' => ether::langr('Images only'),
				'text-only' => ether::langr('Text only')
			);

			$aligns = array
			(
				'left' => ether::langr('Left'),
				'right' => ether::langr('Right'),
				'center' => ether::langr('Center')
			);

			$styles = apply_filters('ether_services_styles', array
			(
				'1' => ether::langr('Ether style 1'),
				'2' => ether::langr('Ether style 2')
			));

			$services = '';

			if (isset($widget['service_content']))
			{
				$column = 0;

				for ($i = 0; $i < count($widget['service_content']); $i++)
				{
					if ( ! empty($widget['service_title'][$i]) OR ! empty($widget['service_content'][$i]) OR ! empty($widget['image_url'][$i]))
					{
						$services .= $this->group_item($widget, $i);
					}
				}
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols cols-1">
						<div class="col"><label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label></div>
					</div>
					'.$this->form_posts($widget, 'tile', 'tileset').'
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Add Items').'</h2>
				<div class="ether-tab-content">
					<div class="ether-form sortable-content  group-content-wrap">
						<div class="buttonset-1">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
						<div class="group-prototype">'.$this->group_item(array(), -1).'</div>
						<div class="group-content">
							<div class="cols-3 cols">
								'.$services.'
							</div>
						</div>
						<div class="buttonset-1" style="display: none;">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Item Layout').'</h2>
				<div class="ether-tab-content">
					<p class="ether-info">'.ether::langr('If you want to use custom sized images with your services, please select either Images or Images only as a type.').'</p>
					<div class="cols-3">
						<div class="col"><label><span class="label-title">'.ether::langr('Type').'</span> '.$this->field('select', 'type', $widget, array('options' => $types, 'class' => 'ether-cond-field ether-field-services-type')).'</label></div>
						<div class="col ether-cond-group ether-action-show-ether-filter-isnot-ether-cond-image-only-ether-field-services-type">
							<label class="label-alt-1">'.$this->field('checkbox', 'title_hide', $widget, array('class' => 'ether-cond-field ether-field-hide-services-title')).' <span class="label-title">'.ether::langr('Hide title').'</span></label>
						</div>
						<div class="col ether-cond-group ether-action-show-ether-filter-isnot-ether-filter-any-ether-cond-image-only-ether-field-services-type ether-action-show-ether-filter-isnot-ether-cond-on-ether-field-hide-services-title">
							<label>'.$this->field('checkbox', 'title_overhead', $widget).' <span class="label-title">'.ether::langr('Overhead title').'</span></label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col"><label><span class="label-title">'.ether::langr('Align').'</span> '.$this->field('select', 'content_align', $widget, array('options' => $aligns)).'</label></div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Image Settings').'</h2>
				<div class="ether-tab-content">
				<p class="ether-info">'.ether::langr('If you want to use custom sized images with your services, please select either Images or Images only as a type.').'</p>
				'.$this->form_image_dimensions($widget).'
				</div>
				'.$this->form_common($widget).'
				'.$this->form_slider($widget).'
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary($widget)
		{
			return $this->get_grid_slider_summary($widget);
		}

		public function get_widget_location_preview ($widget)
		{
			$output = '<div class="builder-multi-preview-wrap">';

			if (isset($widget['service_title']) && count($widget['service_title']) > 1)
			{
				foreach($widget['service_title'] as $id => $title)
				{
					if ($title != '' || $widget['service_content'][$id] != '')
					{
						$output .= '<div class="builder-multi-preview">
							<span class="builder-multi-preview-title">'
							.$title.
							'</span>
							<span class="builder-multi-preview-content">'
							.substr($widget['service_content'][$id], 0, 128).
							'</span>
						</div>';
					}
				}
			}
			$output .= '</div>
			';

			return $output;
		}
	}
}

if ( ! class_exists('ether_testimonials_widget'))
{
	class ether_testimonials_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('testimonials', ether::langr('Testimonials'));
			$this->label = ether::langr('Testimonials widget.');
		}

		public function item($widget, $data)
		{
			$output = '';

			$output .= '		<div'.$this->_class('col').'>'._n;
			$output .= '			<div'.$this->_class('quotes-item').'>'._n;
			$output .= '				<blockquote>'.wpautop($data['content']).'</blockquote>'._n;

			if ( ! empty($data['author']))
			{
				$output .= '				<p'.$this->_class('meta').'><a href="'.$data['url'].'">'.$data['author'].'</a></p>'._n;
			}

			$output .= '			</div>'._n;
			$output .= '		</div>'._n;

			return $output;
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'style' => 1,
				'classes' => '',
			),
			$this->get_defaults(
				'widget_pos_align',
				'grid_settings',
				'widget_clearfloat'
			)), $widget);

			$output = '';
			$classes = array_merge(array('widget', 'quotes'), $this->get_classes($widget));

			$classes[] = 'grid-height-auto';
			$classes[] = 'quotes-'.$widget['style'];

			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			$output .= '<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;
			$output .= '	'.$this->gen_html($widget, 'cols')._n;

			if (class_exists('ether_tile') AND isset($widget['term']) AND ! empty($widget['term']))
			{
				$tiles = $this->get_posts($widget, 'tile', array('testimonial_author', 'testimonial_url'));

				foreach ($tiles as $tile)
				{
					$output .= $this->item($widget, array
					(
						'content' => $tile['content'],
						'author' => $tile['meta']['author'],
						'url' => $tile['meta']['url']
					));
				}
			} else if (isset($widget['testimonial_content']) AND ! empty($widget['testimonial_content']))
			{
				$count = count($widget['testimonial_content']);

				for ($i = 0; $i < $count; $i++)
				{
					if ( ! empty($widget['testimonial_author'][$i]) OR ! empty($widget['testimonial_url'][$i]) OR ! empty($widget['testimonial_content'][$i]))
					{
						$output .= $this->item($widget, array
						(
							'content' => $widget['testimonial_content'][$i],
							'author' => $widget['testimonial_author'][$i],
							'url' => $widget['testimonial_url'][$i]
						));
					}
				}
			}

			$output .= '	</div>'._n;
			$output .= '</div>'._n;

			return $output;
		}

		public function group_item($widget, $i)
		{
			return '<div class="col"'.(empty($widget) ? ' style="display: none;"' : '').'><div class="group-item">
				<div class="group-item-title">'.ether::langr('Item').'</div>
				<div class="group-item-content">
					<label><span class="label-title">'.ether::langr('Author').'</span> '.$this->group_field('text', 'testimonial_author', $i, $widget).'</label>
					<label><span class="label-title">'.ether::langr('Author URL').'</span> '.$this->group_field('text', 'testimonial_url', $i, $widget).'</label>
					<label><span class="label-title">'.ether::langr('Content').'</span> '.$this->group_field('textarea', 'testimonial_content', $i, $widget).'</label>
				</div>
				<div class="group-item-actions">
					<button name="builder-widget-tab-rich" class="builder-widget-group-item-rich">'.ether::langr('Rich Text Editor').'</button>
					<button name="builder-widget-tab-remove" class="builder-widget-group-item-remove">'.ether::langr('Remove').'</button>
				</div>
			</div></div>';
		}

		public function form($widget)
		{
			$styles = apply_filters('ether_testimonials_styles', array
			(
				'1' => ether::langr('Ether Style 1'),
				'2' => ether::langr('Ether Style 2')
			));

			$testimonials = '';

			if (isset($widget['testimonial_content']))
			{
				$column = 0;

				for ($i = 0; $i < count($widget['testimonial_content']); $i++)
				{
					if ( ! empty($widget['testimonial_author'][$i]) OR ! empty($widget['testimonial_url'][$i]) OR ! empty($widget['testimonial_content'][$i]))
					{
						$testimonials .= $this->group_item($widget, $i);
					}
				}
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
						</div>
					</div>
					'.$this->form_posts($widget, 'tile', 'tileset').'
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Add Items').'</h2>
				<div class="ether-tab-content">
					<div class="ether-form sortable-content  group-content-wrap">
						<div class="buttonset-1">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
						<div class="group-prototype">'.$this->group_item(array(), -1).'</div>
						<div class="group-content">
							<div class="cols-3 cols">
								'.$testimonials.'
							</div>
						</div>
						<div class="buttonset-1" style="display: none;">
							<button name="builder-widget-group-item-add" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add Item').'</button>
						</div>
					</div>
				</div>
				'.$this->form_common($widget).'
				'.$this->form_slider($widget).'
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}

		public function get_summary($widget)
		{
			return $this->get_grid_slider_summary($widget);
		}

		public function get_widget_location_preview ($widget)
		{
			$output = '<div class="builder-multi-preview-wrap">';

			if (isset($widget['testimonial_title']) && count($widget['testimonial_title']) > 1)
			{
				foreach($widget['testimonial_title'] as $id => $title)
				{
					if ($title != '' || $widget['testimonial_content'][$id] != '')
					{
						$output .= '<div class="builder-multi-preview">
							<span class="builder-multi-preview-title">'
							.$title.
							'</span>
							<span class="builder-multi-preview-content">'
							.substr($widget['testimonial_content'][$id], 0, 128).
							'</span>
						</div>';
					}
				}
			}
			$output .= '</div>
			';

			return $output;
		}
	}
}

if ( ! class_exists('ether_twitter_feed_widget'))
{
	class ether_twitter_feed_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('twitter-feed', ether::langr('Twitter feed'));
			$this->label = ether::langr('Tweeter feed');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'classes' => '',
			),
			$this->get_defaults(
				'grid_settings',
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			$output = '';
			$classes = array_merge(array('widget', 'twitter-feed'), $this->get_classes($widget));

			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'grid_structure'));

			$id = rand(1000, 9999);

			if ( ! isset($widget['twitter_id']) OR empty($widget['twitter_id']))
			{
				return '';
			}

			ether::script('twitter.fetcher', 'media/scripts/libs/twitterfetcher.js');

			$count = $widget['columns'] * $widget['rows'];
			$slider = FALSE;

			if (isset($widget['slider']) AND $widget['slider'] == 'on')
			{
				$count = 10;
				$slider = TRUE;
			}

			$output .= '<script type="text/javascript">';

			$output .= 'function twitter_feed_'.$id.'(tweets){';
			$output .= 'var target = document.getElementById(\'twitter-feed-'.$id.'\');';
			$output .= 'var count = tweets.length;';
			$output .= 'var index = 0;';
			$output .= 'var html = \'\';';
			$output .= 'while (index < count)';
			$output .= '{';
			$output .= 'html += \'<div'.$this->_class('twitter-feed-item').'>\';';
			$output .= 'var element = jQuery(tweets[index]);';

			// get rid of span element in then links
			$output .= 'var tweet = jQuery(element[1]); tweet.find(\'a\').each( function() { jQuery(this).text(jQuery(this).text()); });';
			$output .= 'html += \'<span>\' + tweet.html() + \'</span> <a href="\' + jQuery(element[0]).find(\'a\').eq(0).attr(\'href\') + \'">\' + jQuery(element[2]).text() + \'</a>\';';
			$output .= 'html += \'</div>\';';
			$output .= 'index++;';
			$output .= '}';
			$output .= '//console.log(target, count, index, html, jQuery(html));';
			$output .= 'ether.widget_manager.get_elem(\'gridslider\', jQuery(target)).add_elements(jQuery(html));';
			$output .= '}';
			$output .= 'twitterFetcher.fetch(\''.$widget['twitter_id'].'\', \'\', '.$count.', true, true, true, \'\', false, twitter_feed_'.$id.');';
			$output .= '</script>';
			$output .= '<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'" id="twitter-feed-'.$id.'">'._n;
			// $output .= '	'.$this->gen_html($widget, 'cols')._n;

			/*$tweets = ether::twitter_feed($widget['username'], $count);

			foreach ($tweets as $tweet)
			{
				$output .= '		<div'.$this->_class('col').'>'._n;
				$output .= '			<div'.$this->_class('twitter-feed-item').'>'._n;
				$output .= '				<span>'.$tweet['tweet'].'</span> <a href="'.$tweet['link'].'">'.$tweet['time'].'</a>'._n;
				$output .= '			</div>'._n;
				$output .= '		</div>'._n;
			}*/

			// $output .= '	</div>'._n;
			$output .= '</div>'._n;

			return $output;
		}

		public function form($widget)
		{
			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols-1 cols">
						<div class="col"><a href="http://ether-wp.com/blog/changes-in-the-twitter-feed">'.ether::langr('Read about the changes in the Twitter Feed').'</a><label><span class="label-title">'.ether::langr('Twitter ID').'</span> '.$this->field('text', 'twitter_id', $widget).'</label></div>
					</div>
				</div>
				'.$this->form_common($widget).'
				'.$this->form_slider($widget).'
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_flickr_feed_widget'))
{
	class ether_flickr_feed_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('flickr', ether::langr('Flickr feed'));
			$this->label = ether::langr('Creates gallery from your flickr feed.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'ratio' => 100,
				'frame' => '',
				'disable_lightbox' => '',
				'term' => '',
				'classes' => ''
			),
			$this->get_defaults(
				'img_title',
				'img_align_fit',
				'grid_settings',
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			$classes = array_merge(array('widget', 'flickr', 'gallery'), $this->get_classes($widget));


			$widget = $this->get_data($widget, 'widget_dimensions');

			$classes = $this->append_classes($classes, $widget, array('img_title', 'media_wrap', 'widget_alignment', 'grid_structure', 'widget_clearfloat'));
			$classes[] = 'use-parent-wrap';

			$count = 20;

			if (isset($widget['count']) AND $widget['count'] > 0)
			{
				$count = $widget['count'];
			}

			$tags = '';

			if (isset($widget['tags']) AND ! empty($widget['tags']))
			{
				$tags = $widget['tags'];
			}

			$flickr_feed = ether::flickr_feed($widget['flickr_id'], $count, $tags);

			$widget = $this->get_data($widget, 'image_dimensions');


			$output = _t(5).'<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).';">'._n;
			// $output .= _t(5).'	'.$this->gen_html($widget, 'cols')._n;

			$album = time();

			if (is_array($flickr_feed) AND ! empty($flickr_feed))
			{
				foreach ($flickr_feed as $item)
				{
					$image = $item['thumbnail'];
					$alt = $item['title'];

					if ( ! empty($image))
					{
						// $output .= _t(5).'		<div'.$this->_class('col').'>'._n;
						// $output .= _t(5).'			<div'.$this->_class('gallery-item').'>'._n;

						$output .= _t(5).'				';

						if ($widget['disable_lightbox'] != 'on')
						{
							// $output .= '<a href="'.$item['image'].'"'.$this->_class(array('media-img', 'media-wrap', 'media-type-img')).' rel="lightbox[album-'.$album.']">';
							//temp
							//bring back custom styling later
							$output .= '<a href="'.$item['image'].'"'.$this->_class(array()).' rel="lightbox[album-'.$album.']">';
						} else
						{
							$output .= '<div'.$this->_class(array()).'>';
						}

						$output .= '<img src="'.ether::img($image, 'flickr_feed').'" alt="'.$alt.'"'.($widget['image_width'] > 0 ? ' width="'.$widget['image_width'].'"' : '').($widget['image_height'] > 0 ? ' height="'.$widget['image_height'].'"' : '').' />';

						if ($widget['frame'] == 2)
						{
							$output .= '<div'.$this->_class('media-helper').'></div>';
						}

						if ($widget['disable_lightbox'] != 'on')
						{
							$output .= '</a>';
						} else
						{
							$output .= '</div>';
						}

						$output .= _n;

						// $output .= _t(5).'			</div>'._n;
						// $output .= _t(5).'		</div>'._n;
					}
				}
			}

			// $output .= _t(5).'	</div>'._n;
			$output .= _t(5).'</div>'._n;

			return $output;
		}

		public function form($widget)
		{
			$frames = apply_filters('ether_gallery_frames', array
			(
				'' => ether::langr('Theme default'),
				'1' => ether::langr('Ether frame 1'),
				'2' => ether::langr('Ether frame 2')
			));

			$count = array();
			$count['-1'] = ether::langr('-1');

			for ($i = 1; $i <= 20; $i++)
			{
				$count[$i] = $i;
			}

			$ratio = array();

			foreach (array(50, 75, 100, 150, 200) as $value)
			{
				$ratio[$value] = $value.'%';
			}

			$widget = ether::extend( array
			(
				'ratio' => 100
			), $widget);

			$aligns = array
			(
				'' => ether::langr('Default'),
				'left' => ether::langr('Left'),
				'right' => ether::langr('Right'),
				'center' => ether::langr('Center')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols-3">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Flickr ID').'</span> '.$this->field('text', 'flickr_id', $widget).'<small>'.ether::langr('Flickr\'s public feed ID.').'</small></label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Tags').'</span> '.$this->field('text', 'tags', $widget).'<small>'.ether::langr('A comma delimited list of tags to filter the feed by.').'</small></label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Count').'</span> '.$this->field('select', 'count', $widget, array('options' => $count)).'</label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Image Settings').'</h2>
				<div class="ether-tab-content">
					'.$this->form_media_frame($widget).'
					'.$this->form_image_dimensions($widget).'
				</div>
				'.$this->form_common($widget).'
				'.$this->form_slider($widget).'
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_nivo_widget'))
{
	class ether_nivo_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('nivo', ether::langr('Nivo slider'));
			$this->label = ether::langr('Nivo slider');
		}

		public function item($widget, $data)
		{
			$output = '';

			$image = $data['image_url'];
			$alt = $data['image_alt'];

			if ( ! empty($image))
			{
				if ($widget['image_crop_width'] > 0 OR $widget['image_crop_height'] > 0)
				{
					$image = ether::get_image_thumbnail(ether::get_image_base($image), $widget['image_crop_width'], $widget['image_crop_height']);
				}

				$output .= '		<img src="'.ether::img($image, 'nivo').'" alt="'.$alt.'"'.($widget['image_width'] > 0 ? ' width="'.$widget['image_width'].'"' : '').($widget['image_height'] > 0 ? ' height="'.$widget['image_height'].'"' : '').' title="'.$alt.'" />'._n;
			}

			return $output;
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'effect' => 'random',
				'anim_speed' => 500,
				'pause_time' => 3000,
				'align' => '',
				'classes' => ''
			),
			$this->get_defaults('widget_clearfloat')), $widget);

			$classes = array('widget', 'slider-wrapper');
			/*
			if ($widget['width'] !== '')
			{
				preg_match('/(\d*)(.*)/', $widget['width'], $widget_width_unit);
				$widget_width_unit = $widget_width_unit[2] === '' ? 'px' : $widget_width_unit[2];
				$widget['width'] = intval($widget['width']);
			}
			*/
			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			ether::stylesheet('jquery.nivo.slider.css', 'media/stylesheets/libs/nivo-slider/nivo-slider.css');
			ether::stylesheet('jquery.nivo.default.theme', 'media/stylesheets/libs/nivo-slider/default.css');
			ether::script('jquery.nivo.slider', 'media/scripts/libs/jquery.nivo.slider.js', array('jquery'));

			$output = '';

			preg_match('/(\d*)(.*)/', $widget['image_width'], $width_unit);
			$width_unit = $width_unit[2] === '' ? 'px' : $width_unit[2];

			preg_match('/(\d*)(.*)/', $widget['image_height'], $height_unit);
			$height_unit = $height_unit[2] === '' ? 'px' : $height_unit[2];

			$widget = $this->get_data($widget, 'image_dimensions');

			$id = substr(uniqid(), -6);

			$output .= '<script>jQuery(window).load( function() { jQuery("#nivo-slider-'.$id.'").nivoSlider({ effect: \''.$widget['effect'].'\', animSpeed: '.intval($widget['anim_speed']).', pauseTime: '.intval($widget['pause_time']).'}); });</script>'._n;

			$output .= ' <div'.$this->_class($classes, $widget['classes'].' theme-default').' style="'.($widget['image_width'] > 0 ? ' width: '.$widget['image_width'].'px;' : ($widget['image_crop_width'] > 0 ? 'width: '.$widget['image_crop_width'].'px;' : '')).'">'._n;
			$output .= '	<div id="nivo-slider-'.$id.'" class="nivoSlider"'.($widget['image_width'] > 0 ? ' style="width: 100%;"' : '').'>'._n;

			$album = time();

			if (class_exists('ether_tile') AND isset($widget['term']) AND ! empty($widget['term']))
			{
				$tiles = $this->get_posts($widget, 'tile', array('url', 'image_url', 'image_alt'));

				foreach ($tiles as $tile)
				{
					if ( ! empty($tile['meta']['image_url']))
					{
						$output .= $this->item($widget, array
						(
							'image_url' => $tile['meta']['image_url'],
							'image_alt' => $tile['meta']['image_alt']
						));
					}
				}
			} else if (isset($widget['image_url']) AND ! empty($widget['image_url']))
			{
				$count = count($widget['image_url']);

				for ($i = 0; $i < $count; $i++)
				{
					if ( ! empty($widget['image_url'][$i]) OR ! empty($widget['image_alt'][$i]))
					{
						$output .= $this->item($widget, array
						(
							'image_url' => $widget['image_url'][$i],
							'image_alt' => $widget['image_alt'][$i]
						));
					}
				}
			}

			$output .= '	</div>'._n;
			$output .= '</div>'._n;

			return $output;
		}

		public function group_item($widget, $i)
		{
			return '<div class="col"'.(empty($widget) ? ' style="display: none;"' : '').'>
				<div class="group-item">
					<div class="group-item-title">'.ether::langr('Item').'</div>
					<div class="group-item-content">
						<div class="preview-img-wrap"><img src="'.($i >= 0 ? $widget['image_url'][$i] : '').'" class="ether-preview upload_image" /></div>

						<label><span class="label-title">'.ether::langr('Image URL').'</span> '.$this->group_field('text', 'image_url', $i, $widget, array('class' => 'upload_image')).'</label>
						<label><span class="label-title">'.ether::langr('Image alt').'</span> '.$this->group_field('text', 'image_alt', $i, $widget).'</label>
					</div>
					<div class="group-item-actions">
						<button type="submit"'.$this->get_field_atts('change_item').' name="'.$this->get_field_name('change_item').'" class="builder-widget-gallery-change upload_image single callback-builder_gallery_widget_change builder-widget-group-item-edit-image">'.ether::langr('Edit').'</button>
						<button type="submit"'.$this->get_field_atts('remove_item').' name="'.$this->get_field_name('remove_item').'" class="builder-widget-group-item-remove">'.ether::langr('Remove').'</button>
					</div>
				</div>
			</div>';
		}

		public function form($widget)
		{
			$effects = array
			(
				'random' => ether::langr('Random'),
				'sliceDown' => ether::langr('Slice down'),
				'sliceDownLeft' => ether::langr('Slice down left'),
				'sliceUp' => ether::langr('Slice up'),
				'sliceUpLeft' => ether::langr('Slice left'),
				'sliceUpDown' => ether::langr('Slice up/down'),
				'sliceUpDownLeft' => ether::langr('Slice up/down left'),
				'fold' => ether::langr('Fold'),
				'fade' => ether::langr('Fade'),
				'slideInRight' => ether::langr('Slide in right'),
				'slideInLeft' => ether::langr('Slide in left'),
				'boxRandom' => ether::langr('Box random'),
				'boxRain' => ether::langr('Box rain'),
				'boxRainReverse' => ether::langr('Box rain reverse'),
				'boxRainGrow' => ether::langr('Box rain grow'),
				'boxRainGrowReverse' => ether::langr('Box rain grow reverse')
			);

			$aligns = array
			(
				'' => ether::langr('Default'),
				'left' => ether::langr('Left'),
				'right' => ether::langr('Right'),
				'center' => ether::langr('Center')
			);

			$anim_speed = array();

			for ($i = 1; $i <= 10; $i++)
			{
				$anim_speed[$i * 100] = ($i / 10).'s';
			}

			$pause_time = array();

			foreach (array(1, 1.5, 2, 2.5, 3, 3.5, 4, 4.5, 6, 7, 8, 9, 10) as $value)
			{
				$pause_time[$value * 1000] = $value.'s';
			}


			$items = '';

			if (isset($widget['image_url']) AND ! empty($widget['image_url']))
			{
				$count = count($widget['image_url']);

				for ($i = 0; $i < $count; $i++)
				{
					if ( ! empty($widget['image_url'][$i]) OR ! empty($widget['image_alt'][$i]))
					{
						$items .= $this->group_item($widget, $i);
					}
				}
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget Alignment').'</span> '.$this->field('select', 'align', $widget, array('options' => $aligns)).'</label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Add Items').'</h2>
				<div class="ether-tab-content">
					<div class="ether-form sortable-content  group-content-wrap">
						<div class="buttonset-1">
							<button type="submit"'.$this->get_field_atts('add_item').' name="'.$this->get_field_name('add_item').'" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add item').'</button>
							<button type="submit"'.$this->get_field_atts('insert_images').' name="'.$this->get_field_name('insert_images').'" class="builder-button-classic builder-widget-gallery-insert upload_image callback-builder_gallery_widget_insert">'.ether::langr('Insert images').'</button>
						</div>
						<div class="group-prototype">'.$this->group_item(array(), -1).'</div>
						<div class="group-content">
							<div class="cols-3 cols">
								'.$items.'
							</div>
						</div>
						<div class="buttonset-1" style="display: none;">
							<button type="submit"'.$this->get_field_atts('add_item').' name="'.$this->get_field_name('add_item').'" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add item').'</button>
							<button type="submit"'.$this->get_field_atts('insert_images').' name="'.$this->get_field_name('insert_images').'" class="builder-button-classic builder-widget-gallery-insert upload_image callback-builder_gallery_widget_insert">'.ether::langr('Insert images').'</button>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Image Settings').'</h2>
				<div class="ether-tab-content">
					'.$this->form_image_dimensions($widget).'
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Slider Settings').'</h2>
				<div class="ether-tab-content">
					<div class="cols-3">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Transition').'</span> '.$this->field('select', 'effect', $widget, array('options' => $effects)).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Animation speed').'</span> '.$this->field('select', 'anim_speed', $widget, array('options' => $anim_speed)).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Pause time').'</span> '.$this->field('select', 'pause_time', $widget, array('options' => $pause_time)).'</label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
					'.$this->form_posts($widget, 'tile', 'tileset').'
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_roundabout_widget'))
{
	class ether_roundabout_widget extends ether_slider_ready_widget
	{
		public function __construct()
		{
			parent::__construct('roundabout', ether::langr('Roundabout slider'));
			$this->label = ether::langr('Roundabout slider');
		}

		public function item($widget, $data)
		{
			$output = '';

			$image = $data['image_url'];
			$alt = $data['image_alt'];

			if ( ! empty($image))
			{
				if ($widget['image_crop_width'] > 0 OR $widget['image_crop_height'] > 0)
				{
					$image = ether::get_image_thumbnail(ether::get_image_base($image), $widget['image_crop_width'], $widget['image_crop_height']);
				}

				$output .= '		<div><img src="'.ether::img($image, 'roundabout').'" alt="'.$alt.'"'.($widget['image_width'] > 0 ? ' width="'.$widget['image_width'].'"' : '').($widget['image_height'] > 0 ? ' height="'.$widget['image_height'].'"' : '').' title="'.$alt.'" /></div>'._n;
			}

			return $output;
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'autoplay' => '',
				'autoplay_duration' => 1000,
				'duration' => 600,
				'min_opacity' => 0.4,
				'max_opacity' => 1.0,
				'min_scale' => 0.4,
				'max_scale' => 1.0,
				'classes' => ''
			),
			$this->get_defaults('widget_clearfloat')), $widget);

			$classes = array('widget', 'roundabout');

			ether::script('jquery.roundabout', 'media/scripts/libs/jquery.roundabout.js', array('jquery'));

			$output = '';

			$widget = $this->get_data($widget, array('widget_dimensions', 'image_dimensions'));

			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			$output .= '<script>jQuery(window).load( function() { var roundabout_adjust_height = function(e) { var roundabout_height = 0; var $children = jQuery(e.target).children(); $children.each( function() { if (jQuery(this).height() > roundabout_height) roundabout_height = jQuery(this).outerHeight(); }); jQuery(e.target).height(roundabout_height); }; jQuery(".'.ether::config('builder_widget_prefix').'roundabout").bind("childrenUpdated", roundabout_adjust_height).bind("ready", roundabout_adjust_height).roundabout({ autoplay: '.($widget['autoplay'] == 'on' ? 'true' : 'false').', autoplayDuration: '.$widget['autoplay_duration'].', autoplayInitialDelay: '.$widget['autoplay_duration'].', duration: '.$widget['duration'].', minOpacity: '.$widget['min_opacity'].', maxOpacity: '.$widget['max_opacity'].', minScale: '.$widget['min_scale'].', maxScale: '.$widget['max_scale'].', childSelector: "div", responsive: true }).roundabout("relayoutChildren"); });</script>'._n;

			$output .= '<div'.$this->_class($classes, $widget['classes']).' style="margin: 0 auto; '.$this->set_widget_width_styles($widget).'">'._n;

			if (class_exists('ether_tile') AND isset($widget['term']) AND ! empty($widget['term']))
			{
				$tiles = $this->get_posts($widget, 'tile', array('url', 'image_url', 'image_alt'));

				foreach ($tiles as $tile)
				{
					if ( ! empty($tile['meta']['image_url']))
					{
						$output .= $this->item($widget, array
						(
							'image_url' => $tile['meta']['image_url'],
							'image_alt' => $tile['meta']['image_alt']
						));
					}
				}
			} else if (isset($widget['image_url']) AND ! empty($widget['image_url']))
			{
				$count = count($widget['image_url']);

				for ($i = 0; $i < $count; $i++)
				{
					if ( ! empty($widget['image_url'][$i]) OR ! empty($widget['image_alt'][$i]))
					{
						$output .= $this->item($widget, array
						(
							'image_url' => $widget['image_url'][$i],
							'image_alt' => $widget['image_alt'][$i]
						));
					}
				}
			}

			$output .= '</div>'._n;

			return $output;
		}

		public function group_item($widget, $i)
		{
			return '<div class="col"'.(empty($widget) ? ' style="display: none;"' : '').'>
				<div class="group-item">
					<div class="group-item-title">'.ether::langr('Item').'</div>
					<div class="group-item-content">
						<div class="preview-img-wrap"><img src="'.($i >= 0 ? $widget['image_url'][$i] : '').'" class="ether-preview upload_image" /></div>
						<label><span class="label-title">'.ether::langr('Image URL').'</span> '.$this->group_field('text', 'image_url', $i, $widget, array('class' => 'upload_image')).'</label>
						<label><span class="label-title">'.ether::langr('Image alt').'</span> '.$this->group_field('text', 'image_alt', $i, $widget).'</label>
					</div>
					<div class="group-item-actions">
						<button type="submit"'.$this->get_field_atts('change_item').' name="'.$this->get_field_name('change_item').'" class="builder-widget-gallery-change upload_image single callback-builder_gallery_widget_change builder-widget-group-item-edit-image">'.ether::langr('Edit').'</button>
						<button type="submit"'.$this->get_field_atts('remove_item').' name="'.$this->get_field_name('remove_item').'" class="builder-widget-group-item-remove">'.ether::langr('Remove').'</button>
					</div>
				</div>
			</div>';
		}

		public function form($widget)
		{
			$widget = ether::extend( array
			(
				'autoplay' => '',
				'autoplay_duration' => 1000,
				'duration' => 600,
				'min_opacity' => 0.4,
				'max_opacity' => 1.0,
				'min_scale' => 0.4,
				'max_scale' => 1.0
			), $widget);

			$items = '';

			if (isset($widget['image_url']) AND ! empty($widget['image_url']))
			{
				$count = count($widget['image_url']);

				for ($i = 0; $i < $count; $i++)
				{
					if ( ! empty($widget['image_url'][$i]) OR ! empty($widget['image_alt'][$i]))
					{
						$items .= $this->group_item($widget, $i);
					}
				}
			}

			$duration = array();
			$scale = array();

			foreach (array_merge(ether::array_range(100.0, 10, 100.0), ether::array_range(2000.0, 4, 1000.0)) as $value)
			{
				$seconds = ($value / 1000.0);

				$duration[$value] = $value > 1000 ? ether::langr('%s seconds', $seconds) : ether::langr('%s second', $seconds);
			}

			for ($i = 10; $i <= 100; $i += 10)
			{
				$scale[(string)($i / 100.0)] = ether::langr('%s%%', $i);
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					'.$this->form_posts($widget, 'tile', 'tileset').'
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Add Items').'</h2>
				<div class="ether-tab-content">
					<div class="ether-form sortable-content group-content-wrap">
						<div class="buttonset-1">
							<button type="submit"'.$this->get_field_atts('add_item').' name="'.$this->get_field_name('add_item').'" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add item').'</button>
							<button type="submit"'.$this->get_field_atts('insert_images').' name="'.$this->get_field_name('insert_images').'" class="builder-button-classic builder-widget-gallery-insert upload_image callback-builder_gallery_widget_insert">'.ether::langr('Insert images').'</button>
						</div>
						<div class="group-prototype">'.$this->group_item(array(), -1).'</div>
						<div class="group-content">
							<div class="cols-3 cols">
								'.$items.'
							</div>
						</div>
						<div class="buttonset-1" style="display: none;">
							<button type="submit"'.$this->get_field_atts('add_item').' name="'.$this->get_field_name('add_item').'" class="builder-widget-group-item-add builder-button-classic">'.ether::langr('Add item').'</button>
							<button type="submit"'.$this->get_field_atts('insert_images').' name="'.$this->get_field_name('insert_images').'" class="builder-button-classic builder-widget-gallery-insert upload_image callback-builder_gallery_widget_insert">'.ether::langr('Insert images').'</button>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Image Settings').'</h2>
				<div class="ether-tab-content">
					'.$this->form_image_dimensions($widget).'
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Slider Settings').'</h2>
				<div class="ether-tab-content">
					<div class="cols cols-3">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Duration').'</span> '.$this->field('select', 'duration', $widget, array('options' => $duration)).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Min scale').'</span> '.$this->field('select', 'min_scale', $widget, array('options' => $scale)).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Max scale').'</span> '.$this->field('select', 'max_scale', $widget, array('options' => $scale)).'</label>
						</div>
					</div>
					<div class="cols cols-2">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Min opacity').'</span> '.$this->field('select', 'min_opacity', $widget, array('options' => $scale)).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Max opacity').'</span> '.$this->field('select', 'max_opacity', $widget, array('options' => $scale)).'</label>
						</div>
					</div>
					<div class="cols cols-2">
						<div class="col">
							<label>'.$this->field('checkbox', 'autoplay', $widget, array('class' => 'ether-cond-field ether-field-roundabout')).' <span class="label-title">'.ether::langr('Autoplay').'</span></label>
						</div>
						<div class="col ether-cond-group ether-action-show-ether-cond-on-ether-field-roundabout">
							<label><span class="label-title">'.ether::langr('Autoplay duration').'</span> '.$this->field('select', 'autoplay_duration', $widget, array('options' => $duration)).'</label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				<div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_fb_button_widget'))
{
	class ether_fb_button_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('fb-button', ether::langr('Facebook Like Button'));
			$this->label = ether::langr('Facebook Like Button');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'classes' => ''
			),
			$this->get_defaults('widget_clearfloat')), $widget);

			$classes = array();
			$classes = $this->append_classes($classes, $widget, 'widget_clearfloat');

			return '<iframe'.$this->_class(array('widget'), $widget['classes']).' src="//www.facebook.com/plugins/like.php?href='.urlencode($widget['url']).'&amp;send=false&amp;layout='.$widget['type'].'&amp;width='.$widget['width'].'&amp;show_faces='.((isset($widget['show_faces']) AND $widget['show_faces'] == 'on') ? 'true' : 'false').'&amp;action=like&amp;colorscheme='.$widget['color'].'&amp;font&amp;height='.$widget['height'].'&amp;appId='.$widget['appid'].'" scrolling="no" frameborder="0" style="border:none; overflow:hidden;" allowTransparency="true"></iframe>';
		}

		public function form($widget)
		{
			$colors = array
			(
				'light' => ether::langr('Light'),
				'dark' => ether::langr('Dark')
			);

			$types = array
			(
				'' => ether::langr('Standard'),
				'button_count' => ether::langr('Button count'),
				'box_count' => ether::langr('Box count')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Page URL').' <abbr title="required">*</abbr></span>'.$this->field('text', 'url', $widget).'<small>'.ether::langr('The URL to like.').'</small></label>
					<div class="cols-3">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Width').'</span> '.$this->field('text', 'width', $widget).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Height').'</span> '.$this->field('text', 'height', $widget).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Color').'</span> '.$this->field('select', 'color', $widget, array('options' => $colors)).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Type').'</span> '.$this->field('select', 'type', $widget, array('options' => $types)).'</label>
						</div>
						<div class="col">
							<label class="label-alt-1">'.$this->field('checkbox', 'show_faces', $widget).' <span class="label-title">'.ether::langr('Show Faces').'</span><small>'.ether::langr('Show profile photos in the plugin.').'</small></label>
						</div>
					</div>
					<label><span class="label-title">'.ether::langr('Facebook APPID').'</span> '.$this->field('text', 'appid', $widget).'</label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_fb_comments_widget'))
{
	class ether_fb_comments_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('fb-comments', ether::langr('Facebook Comments'));
			$this->label = ether::langr('Facebook Comments');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'classes' => ''
			),
			$this->get_defaults('widget_clearfloat')), $widget);

			$classes = array();
			$classes = $this->append_classes($classes, $widget, 'widget_clearfloat');

			$output = '';
			$output .= '<div id="fb-root"></div>'._n;
			$output .= '<script>(function(d, s, id) {'._n;
			$output .= 'var js, fjs = d.getElementsByTagName(s)[0];'._n;
			$output .= 'if (d.getElementById(id)) return;'._n;
			$output .= 'js = d.createElement(s); js.id = id;'._n;
			$output .= 'js.src = "//connect.facebook.net/en_US/all.js#xfbml=1&appId='.$widget['appid'].'";'._n;
			$output .= 'fjs.parentNode.insertBefore(js, fjs);'._n;
			$output .= '}(document, \'script\', \'facebook-jssdk\'));</script>'._n;

			if (empty($widget['url']))
			{
				$widget['url'] = ether::get_url();
			}

			$output .= '<div'.$this->_class(array('widget'), $widget['classes'].' fb-comments').' data-href="'.$widget['url'].'" data-num-posts="'.$widget['count'].'" data-colorscheme="'.$widget['color'].'"></div>'._n;

			return $output;
		}

		public function form($widget)
		{
			$colors = array
			(
				'light' => ether::langr('Light'),
				'dark' => ether::langr('Dark')
			);

			$count = array();

			for ($i = 1; $i <= 30; $i++)
			{
				$count[$i] = $i;
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Page URL').' <abbr title="required">*</abbr></span>'.$this->field('text', 'url', $widget).'<small>'.ether::langr('The URL to comment on.').'</small></label>
					<label><span class="label-title">'.ether::langr('Number of posts').'</span> '.$this->field('select', 'count', $widget, array('options' => $count)).'</label>
					<label><span class="label-title">'.ether::langr('Color').'</span> '.$this->field('select', 'color', $widget, array('options' => $colors)).'</label>
					<label><span class="label-title">'.ether::langr('Facebook APPID').'</span> '.$this->field('text', 'appid', $widget).'</label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_fb_likebox_widget'))
{
	class ether_fb_likebox_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('fb-likebox', ether::langr('Facebook Like Box'));
			$this->label = ether::langr('Facebook Like Box');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'classes' => ''
			),
			$this->get_defaults('widget_clearfloat')), $widget);

			$classes = array();
			$classes = $this->append_classes($classes, $widget, 'widget_clearfloat');

			return '<iframe'.$this->_class(array('widget'), $widget['classes']).' src="//www.facebook.com/plugins/likebox.php?href='.urlencode($widget['url']).'&amp;width=&amp;height='.$widget['height'].'&amp;colorscheme='.$widget['color'].'&amp;show_faces='.((isset($widget['show_faces']) AND $widget['show_faces'] == 'on') ? 'true' : 'false').'&amp;border_color='.$widget['border_color'].'&amp;stream='.((isset($widget['show_stream']) AND $widget['show_stream'] == 'on') ? 'true' : 'false').'&amp;header='.((isset($widget['show_header']) AND $widget['show_header'] == 'on') ? 'true' : 'false').'&amp;appId='.$widget['appid'].'" scrolling="no" frameborder="0" style="border:none; overflow:hidden; height:590px;" allowTransparency="true"></iframe>';
		}

		public function form($widget)
		{
			$colors = array
			(
				'light' => ether::langr('Light'),
				'dark' => ether::langr('Dark')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Facebook page URL').' <abbr title="required">*</abbr></span>'.$this->field('text', 'url', $widget).'<small>'.ether::langr('The URL of the Facebook Page for this like box.').'</small></label>
					<div class="cols-3">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Height').'</span> '.$this->field('text', 'height', $widget).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Color').'</span> '.$this->field('select', 'color', $widget, array('options' => $colors)).'</label>
						</div>
						<div class="col">
							<label class="ether-color"><span class="label-title">'.ether::langr('Border color').'</span> '.$this->field('text', 'border_color', $widget).'</label>
						</div>
						<div class="col">
							<label class="label-alt-1">'.$this->field('checkbox', 'show_faces', $widget).' <span class="label-title">'.ether::langr('Show Faces').'</span><small>'.ether::langr('Show profile photos in the plugin.').'</small></label>
						</div>
						<div class="col">
							<label class="label-alt-1">'.$this->field('checkbox', 'show_stream', $widget).' <span class="label-title">'.ether::langr('Show stream').'</span><small>'.ether::langr('Show the profile stream for the public profile.').'</small></label>
						</div>
						<div class="col">
							<label class="label-alt-1">'.$this->field('checkbox', 'show_header', $widget).' <span class="label-title">'.ether::langr('Show header').'</span><small>'.ether::langr('Show the "Find us on Facebook" bar at top. Only shown when either stream or faces are present.').'</small></label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Facebook APPID').'</span> '.$this->field('text', 'appid', $widget).'</label>
						</div>
					</di>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_googlemap_widget'))
{
	class ether_googlemap_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('googlemap', ether::langr('Google map'));
			$this->label = ether::langr('Insert a google map with a specified title and location');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'zoom' => 14,
				'view' => 0,
				'show_address' => FALSE,
				'classes' => ''
			),
			$this->get_defaults(
				'widget_clearfloat',
				'widget_pos_align'
			)), $widget);

			$classes = array('widget', 'google-map');
			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			return '<div'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'.ether::google_map($widget['address'], '100%', empty($widget['height']) ? NULL : intval($widget['height']), $widget['zoom'], $widget['view'], ($widget['show_address'] != 'on'), TRUE).'</div>';
		}

		public function form($widget)
		{
			$zoom = array();
			$zoom[''] = ether::langr('Default');

			for ($i = 1; $i <= 20; $i++)
			{
				$zoom[$i] = $i.($i == 14 ? ' ('.ether::langr('Default').')' : '');
			}

			$views = array
			(
				ether::langr('Map'),
				ether::langr('Satellite'),
				ether::langr('Map + Terrain')
			);

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Address').' <abbr title="required">*</abbr></span>'.$this->field('text', 'address', $widget).'<small>'.ether::langr('Marks given location on the map.').'</small></label>
					<div class="cols-2">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Height').'</span> '.$this->field('text', 'height', $widget).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('Zoom').'</span> '.$this->field('select', 'zoom', $widget, array('options' => $zoom)).'</label>
						</div>
						<div class="col">
							<label><span class="label-title">'.ether::langr('View').'</span> '.$this->field('select', 'view', $widget, array('options' => $views)).'</label></label>
						</div>
						<div class="col">
							<label class="label-alt-1">'.$this->field('checkbox', 'show_address', $widget).' <span class="label-title">'.ether::langr('Show address bubble').'</span></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
					<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
				</div>
			</fieldset>';
		}

		public function get_summary($widget)
		{
			$views = array
			(
				ether::langr('Map'),
				ether::langr('Satellite'),
				ether::langr('Map + Terrain')
			);

			$output = '';

			isset($widget['address']) && ! empty($widget['address']) ? $output .= $widget['address'] : '';
			isset($widget['view']) && ! empty($widget['view']) ? $output .= ' '.$views[$widget['view']] : '';

			return $output;
		}
	}
}

if ( ! class_exists('ether_contact_widget'))
{
	class ether_contact_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('contact', ether::langr('Contact form'));
			$this->label = ether::langr('Classic contact form.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'email' => '',
				'button_text' => ether::langr('Send'),
				'sent_message' => ether::langr('Message sent'),
				'classes' => ''
			),
			$this->get_defaults(
				'widget_clearfloat',
				'widget_pos_align'
			)), $widget);

			$classes = array('widget', 'form');
			$classes = $this->append_classes($classes, $widget, array('widget_clearfloat', 'widget_alignment'));

			$contact = '';

			if ((isset($_POST['sent_message']) AND ! empty($_POST['contact_name']) AND ! empty($_POST[base64_encode('email')]) AND ( ! empty($widget['email']) AND $widget['email'] == base64_decode($_POST[base64_encode('email')]))))
			{
				if (class_exists('ether_shortcode'))
				{
					$contact .= _t(5).ether_shortcode::message(array('type' => 'info'), ether::clean($_POST['sent_message']))._n;
				} else
				{
					$contact .= _t(5).wpautop(stripslashes(ether::clean($_POST['sent_message'])))._n;
				}
			}

			$contact .= _t(5).'<form method="post"'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'._n;
			$contact .= _t(5).'	<fieldset>'._n;
			$contact .= _t(5).'		<label><span class="label-title">'.ether::langr('Your name').' <abbr title="required">*</abbr></span> <input type="text" name="contact_name" /></label>'._n;
			$contact .= _t(5).'		<label><span class="label-title">'.ether::langr('Email').' <abbr title="required">*</abbr></span> <input type="email" name="contact_email" /></label>'._n;
			$contact .= _t(5).'		<label><span class="label-title">'.ether::langr('Message').' <abbr title="required">*</abbr></span> <textarea rows="5" cols="20" name="contact_message"></textarea></label>'._n;
			$contact .= _t(5).'		<input type="hidden" name="'.base64_encode('email').'" value="'.base64_encode($widget['email']).'" />'._n;
			$contact .= _t(5).'		<input type="hidden" name="sent_message" value="'.$widget['sent_message'].'" />'._n;
			$contact .= _t(5).'		<div'.$this->_class('buttonset-1').'>'._n;
			$contact .= _t(5).'			<button type="submit"'.$this->_class(array('button', 'button-medium', 'alignright')).'" name="contact"><span>'.$widget['button_text'].'</span></button>'._n;
			$contact .= _t(5).'		</div>'._n;
			$contact .= _t(5).'	</fieldset>'._n;
			$contact .= _t(5).'</form>'._n;

			return $contact;
		}

		public function form($widget)
		{
			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols-2">
						<div class="col"><label><span class="label-title">'.ether::langr('Recepient Email').' <abbr title="required">*</abbr></span>'.$this->field('text', 'email', $widget).'<small>'.ether::langr('Messages will be sent to this address.').'</small></label></div>
						<div class="col"><label><span class="label-title">'.ether::langr('Button title').'</span> '.$this->field('text', 'button_text', $widget).'</label></div>
					</div>
					<label><span class="label-title">'.ether::langr('Sent message').'</span> '.$this->field('textarea', 'sent_message', $widget, array('cols' => 10, 'rows' => 3)).' <small>'.ether::langr('Notification text that appears after succesfull form submision.').'</small></label>
					<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
					<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_template_widget'))
{
	class ether_template_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('template', ether::langr('Template'));
			$this->label = ether::langr('Insert saved builder template.');
		}

		public function widget($widget)
		{
			global $post;

			if (isset($post) AND isset($post->ID) AND isset($widget['template']) AND $post->ID == $widget['template'])
			{
				return '<p class="ether-error">'.ether::langr('Template made from this post cannot be inserted in the same post.').'</p>';
			}

			if (isset($widget['template']))
			{
				return ether_builder::get_the_content($widget['template']);
			}

			return '';
		}

		public function form($widget)
		{
			$layouts = ether_metabox_builder_post::layout_list();
			$templates = array();

			foreach ($layouts as $layout_id => $layout_data)
			{
				$templates[$layout_data['post_id']] = $layout_data['name'];
			}

			global $post;
			$warning = '';

			if ( ! count($layouts))
			{
				$warning .= '<p class="ether-error">'.ether::langr('No saved templates found!').'</p>';
			}
			
			if (isset($post) AND isset($post->ID) AND isset($widget['template']) AND $post->ID == $widget['template'])
			{
				$warning .= '<p class="ether-error">'.ether::langr('Template made from this post cannot be inserted in the same post.').'</p>';
			}

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$warning.'
					<label><span class="label-title">'.ether::langr('Builder template').'</span>'.$this->field('select', 'template', $widget, array('options' => $templates)).'</label>
				</div>
			</fieldset>';
		}

		public function get_summary($widget)
		{
			return isset($widget['template']) && ! empty($widget['template']) ? $widget['template'] : ether::langr('No template selected');
		}
	}
}

if ( ! class_exists('ether_style_widget'))
{
	class ether_style_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('style', ether::langr('Style'));
			$this->label = ether::langr('Add custom styles to your page using CSS.');
		}

		public function widget($widget)
		{
			return '<style type="text/css">'.$widget['css'].'</style>';
		}

		public function form($widget)
		{
			$text_align = array('left' => ether::langr('Left'), 'right' => ether::langr('Right'), 'center' => ether::langr('Center'));

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					<label><span class="label-title">'.ether::langr('Plain CSS').'</span> '.$this->field('textarea', 'css', $widget).'</label>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_link_widget'))
{
	class ether_link_widget extends ether_builder_widget
	{
		public function __construct()
		{
			parent::__construct('link', ether::langr('Link'));
			$this->label = ether::langr('Basic link element.');
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'classes' => ''
			),
			$this->get_defaults(
				'widget_pos_align',
				'widget_clearfloat'
			)), $widget);

			$classes = array('widget', 'link');

			$classes = $this->append_classes($classes, $widget, array('widget_alignment', 'widget_clearfloat'));

			return '<a href="'.$widget['url'].'"'.$this->_class($classes, $widget['classes']).' style="'.$this->set_widget_width_styles($widget).'">'.$widget['title'].'</a>';
		}

		public function form($widget)
		{
			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<label><span class="label-title">'.ether::langr('Title').' <abbr title="required">*</abbr></span>'.$this->field('text', 'title', $widget).'</label>
					<label><span class="label-title">'.ether::langr('URL').' <abbr title="required">*</abbr></span>'.$this->field('text', 'url', $widget).'</label>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_heading_menu_widget'))
{
	class ether_heading_menu_widget extends ether_builder_widget
	{
		protected $headers;

		public function __construct()
		{
			parent::__construct('heading-menu', ether::langr('Heading menu'));
			$this->label = ether::langr('Create menu for sections with headings. Allows to create scrollspy menu.');
			$this->after = TRUE;
			$this->headers = array();
		}

		public function content_filter($widget, $content)
		{
			preg_match_all('/<h(\d+)+([^>]*?)>(.*?)<\/h(\d+)+>/si', $content, $headers);

			if (isset($headers[0]))
			{
				$count = count($headers[0]);

				for ($i = 0; $i < $count; $i++)
				{
					if (isset($widget['h'.$headers[1][$i]]) AND $widget['h'.$headers[1][$i]] == 'on')
					{
						$id = '';

						preg_match('/(id=[\'|"])(.*?)([\'|"])/i', $headers[0][$i], $attributes);

						if (isset($attributes[2]) AND ! empty($attributes[2]))
						{
							$id = $attributes[2];
						} else
						{
							$id = 'toc-'.$i;
							$headers[2][$i] .= ' id="'.$id.'"';
							$replace_count = 1;

							//$content = str_replace($headers[0][$i], '<h'.$headers[1][$i].$headers[2][$i].'>'.$headers[3][$i].'</h'.$headers[1][$i].'>', $content, $replace_count);
							$content = preg_replace('/'.str_replace('/', '\/', $headers[0][$i]).'/', '<h'.$headers[1][$i].$headers[2][$i].'>'.$headers[3][$i].'</h'.$headers[1][$i].'>', $content, $replace_count);
						}

						$this->headers[] = array('id' => $id, 'title' => $headers[3][$i]);
					}
				}
			}

			return $content;
		}

		public function widget($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'h1' => 'on',
				'h2' => 'on',
				'h3' => 'on',
				'fixed' => '',
				'zindex' => '',
				'classes' => ''
			),
			$this->get_defaults('widget_pos_align')), $widget);

			$classes = array('widget', 'heading-menu');

			if ( ! empty($widget['scrollspy']) AND $widget['scrollspy'] == 'on')
			{
				$classes[] = 'scrollspy';
			}

			if ( ! empty($widget['style']))
			{
				$classes[] = 'style-'.$widget['style'];
			}

			$style = '';

			$style .= $this->set_widget_width_styles($widget);

			if ($widget['fixed'] == 'on')
			{
				$style .= ( ! empty($style) ? ' ' : '').'position: fixed;';

				if ($widget['top'] !== '')
				{
					$widget['top'] = ether::unit($widget['top'], 'px');

					$style .= ' top: '.$widget['top'].';';
				}

				if ($widget['left'] !== '')
				{
					$widget['left'] = ether::unit($widget['left'], 'px');

					$style .= ' left: '.$widget['left'].';';
				}

				if ($widget['right'] !== '')
				{
					$widget['right'] = ether::unit($widget['right'], 'px');

					$style .= ' right: '.$widget['right'].';';
				}

				if ($widget['bottom'] !== '')
				{
					$widget['bottom'] = ether::unit($widget['bottom'], 'px');

					$style .= ' bottom: '.$widget['bottom'].';';
				}

				if ( ! empty($widget['zindex']))
				{
					$style .= ' z-index: '.$widget['zindex'].';';
				}
			}

			$classes = $this->append_classes($classes, $widget, 'widget_alignment');

			$output = '<ol'.$this->_class($classes, $widget['classes']).( ! empty($style) ? ' style="'.$style.'"' : '').'>';

			foreach ($this->headers as $h)
			{
				$output .= '<li><a href="#'.$h['id'].'">'.$h['title'].'</a></li>';
			}

			$output .= '</ol>';

			return $output;
		}

		public function form($widget)
		{
			$widget = ether::extend( array_merge(array
			(
				'h1' => 'on',
				'h2' => 'on',
				'h3' => 'on',
				'classes' => ''
			),
			$this->get_defaults('widget_pos_align')), $widget);

			$styles = apply_filters('ether_heading-menu_styles', array
			(
				'' => ether::langr('Theme default'),
				'1' => ether::langr('Ether style 1'),
				'2' => ether::langr('Ether style 2')
			));

			return '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('General').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_general($widget).'
					'.$this->form_widget_clearfloat($widget).'
					<div class="cols cols-2">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Style').'</span> '.$this->field('select', 'style', $widget, array('options' => $styles)).'</label>
							<label>'.$this->field('checkbox', 'scrollspy', $widget).' <span class="label-title">'.ether::langr('Enable scrollspy').'</span></label>
						</div>
						<div class="col">
							<label>'.$this->field('checkbox', 'h1', $widget).' <span class="label-title">'.ether::langr('Use H1').'</span></label>
							<label>'.$this->field('checkbox', 'h2', $widget).' <span class="label-title">'.ether::langr('Use H2').'</span></label>
							<label>'.$this->field('checkbox', 'h3', $widget).' <span class="label-title">'.ether::langr('Use H3').'</span></label>
							<label>'.$this->field('checkbox', 'h4', $widget).' <span class="label-title">'.ether::langr('Use H4').'</span></label>
							<label>'.$this->field('checkbox', 'h5', $widget).' <span class="label-title">'.ether::langr('Use H5').'</span></label>
							<label>'.$this->field('checkbox', 'h6', $widget).' <span class="label-title">'.ether::langr('Use H6').'</span></label>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Positioning').'</h2>
				<div class="ether-tab-content">
					<div class="cols cols-2">
						<div class="col">
							<label>'.$this->field('checkbox', 'fixed', $widget, array('class' => 'ether-cond-field ether-field-headingmenu')).' <span class="label-title">'.ether::langr('Fixed position').'</span></label>
							<label class="ether-cond-group ether-action-show-ether-cond-on-ether-field-headingmenu"><span class="label-title">'.ether::langr('Z-Index').'</span>'.$this->field('text', 'zindex', $widget).'</label>
						</div>
						<div class="col">
							<div class="ether-cond-group ether-action-show-ether-cond-on-ether-field-headingmenu">
								<label><span class="label-title">'.ether::langr('Position top').'</span>'.$this->field('text', 'top', $widget).'</label>
								<label><span class="label-title">'.ether::langr('Position left').'</span>'.$this->field('text', 'left', $widget).'</label>
								<label><span class="label-title">'.ether::langr('Position right').'</span>'.$this->field('text', 'right', $widget).'</label>
								<label><span class="label-title">'.ether::langr('Position bottom').'</span>'.$this->field('text', 'bottom', $widget).'</label>
							</div>
						</div>
					</div>
				</div>
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<div class="cols cols-1">


						<div class="col">
							<label><span class="label-title">'.ether::langr('Additional classes').'</span> '.$this->field('text', 'classes', $widget).'</label>
						</div>
					</div>
					<div class="cols cols-1">
						<div class="col">
							<label><span class="label-title">'.ether::langr('Widget label').'</span> '.$this->field('text', 'admin-label', $widget).'<small>'.ether::langr('Custom widget label which will be shown instead of widget name in the admin view').'</small></label>
						</div>
					</div>
				</div>
			</fieldset>';
		}
	}
}

if ( ! class_exists('ether_row_base_widget'))
{
	class ether_row_base_widget extends ether_builder_widget
	{
		protected $cols;
		protected $col_count;

		public function widget($widget)
		{
			$widget = ether::extend( array
			(
				'classes' => ''
			), $widget);

			$output = _t(5).'<div'.$this->_class(array('cols', 'cols-'.$this->cols), $widget['classes']).'>'._n;

			for ($i = 1; $i <= $this->col_count; $i++)
			{
				$classes_col = '';

				if (isset($widget['classes_col_'.$i]))
				{
					$classes_col = $widget['classes_col_'.$i];
				}

				$output .= _t(5).'	<div'.$this->_class('col', $classes_col).'>'.(isset($widget['col-'.$i]) ? $widget['col-'.$i] : '').'</div>'._n;
			}

			$output .= _t(5).'</div>'._n;

			return $output;
		}

		public function form_after($widget)
		{
			$cols = '<div class="builder-widget-row cols-'.$this->cols.'">';
			$options = '<div class="builder-widget-row-options cols-'.$this->cols.'">';

			for ($i = 1; $i <= $this->col_count; $i++)
			{
				$cols .= '<div class="col builder-widget-column">'.(isset($widget['col-'.$i]) ? $widget['col-'.$i] : '').'</div>';
				$options .= ' <div class="col builder-widget-column-options"><button name="builder-widget-add" class="builder-column-widget-add builder-button-classic"><span>'.ether::langr('Add widget').'</span></button></div>';
			}

			$cols .= '</div>';
			$options .= '</div>';

			return $cols.$options;
		}

		public function form($widget)
		{
			$output = '<fieldset class="ether-form">
				<h2 class="ether-tab-title">'.ether::langr('Misc').'</h2>
				<div class="ether-tab-content">
					'.$this->form_widget_visibility($widget).'
					<label><span class="label-title">'.ether::langr('Additional classes (row)').'</span> '.$this->field('text', 'classes', $widget).'</label>';

			for ($i = 0; $i < $this->col_count; $i++)
			{	
				$output .= '<label><span class="label-title">'.ether::langr('Additional classes (column no. %d)', ($i + 1)).'</span> '.$this->field('text', 'classes_col_'.($i + 1), $widget).'</label>';
			}

			$output .= '
				</div>
			</fieldset>';

			return $output;
		}

		public function get_title ($widget = NULL)
		{
			// return trim(str_ireplace(array('columns', 'column', '+ '), '', parent::get_title($widget)));
			$title = str_ireplace('+ ', '', parent::get_title($widget));
			// $title = str_ireplace(array('Columns', 'Column'), array('<span>Columns</span>', '<span>Column</span>'), $title);
			$title = preg_replace('/(Column(?:s)*)/', '<span>$1</span>', $title);

			return $title;
		}
	}
}

if ( ! class_exists('ether_row1_widget'))
{
	class ether_row1_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-1', ether::langr('1 Column'));
			$this->label = ether::langr('Column. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '1';
			$this->col_count = 1;
		}
	}
}

if ( ! class_exists('ether_row2_widget'))
{
	class ether_row2_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-2', ether::langr('2 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '2';
			$this->col_count = 2;
		}
	}
}

if ( ! class_exists('ether_row3_widget'))
{
	class ether_row3_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-3', ether::langr('3 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '3';
			$this->col_count = 3;
		}
	}
}

if ( ! class_exists('ether_row4_widget'))
{
	class ether_row4_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-4', ether::langr('4 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '4';
			$this->col_count = 4;
		}
	}
}

if ( ! class_exists('ether_row5_widget'))
{
	class ether_row5_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-5', ether::langr('5 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '5';
			$this->col_count = 5;
		}
	}
}

if ( ! class_exists('ether_row6_widget'))
{
	class ether_row6_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-6', ether::langr('6 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '6';
			$this->col_count = 6;
		}
	}
}

if ( ! class_exists('ether_row2d3_1_widget'))
{
	class ether_row2d3_1_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-2d3-1', ether::langr('2/3 + 1/3 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '2d3-1';
			$this->col_count = 2;
		}
	}
}

if ( ! class_exists('ether_row2d3_2_widget'))
{
	class ether_row2d3_2_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-2d3-2', ether::langr('1/3 + 2/3 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '2d3-2';
			$this->col_count = 2;
		}
	}
}

if ( ! class_exists('ether_row3d4_1_widget'))
{
	class ether_row3d4_1_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-3d4-1', ether::langr('3/4 + 1/4 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '3d4-1';
			$this->col_count = 2;
		}
	}
}

if ( ! class_exists('ether_row3d4_2_widget'))
{
	class ether_row3d4_2_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-3d4-2', ether::langr('1/4 + 3/4 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '3d4-2';
			$this->col_count = 2;
		}
	}
}

if ( ! class_exists('ether_row2d4_1_widget'))
{
	class ether_row2d4_1_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-2d4-1', ether::langr('1/2 + 1/4 + 1/4 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '2d4-1';
			$this->col_count = 3;
		}
	}
}

if ( ! class_exists('ether_row2d4_2_widget'))
{
	class ether_row2d4_2_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-2d4-2', ether::langr('1/4 + 1/2 + 1/4 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '2d4-2';
			$this->col_count = 3;
		}
	}
}

if ( ! class_exists('ether_row2d4_3_widget'))
{
	class ether_row2d4_3_widget extends ether_row_base_widget
	{
		public function __construct()
		{
			parent::__construct('row-2d4-3', ether::langr('1/4 + 1/4 + 1/2 Columns'));
			$this->label = ether::langr('Columns. Place widgets inside them to create advanced layouts');
			$this->core = TRUE;
			$this->cols = '2d4-3';
			$this->col_count = 3;
		}
	}
}


// CORE WIDGETS aka rows / cols

ether_builder::register_widget('ether_row1_widget');
ether_builder::register_widget('ether_row2_widget');
ether_builder::register_widget('ether_row3_widget');
ether_builder::register_widget('ether_row4_widget');
ether_builder::register_widget('ether_row5_widget');
ether_builder::register_widget('ether_row6_widget');
ether_builder::register_widget('ether_row2d3_1_widget');
ether_builder::register_widget('ether_row2d3_2_widget');
ether_builder::register_widget('ether_row3d4_1_widget');
ether_builder::register_widget('ether_row3d4_2_widget');
ether_builder::register_widget('ether_row2d4_1_widget');
ether_builder::register_widget('ether_row2d4_2_widget');
ether_builder::register_widget('ether_row2d4_3_widget');


// BUILT IN WIDGETS
ether_builder::register_widget('ether_post_content_widget');
ether_builder::register_widget('ether_divider_widget');
ether_builder::register_widget('ether_image_widget');
ether_builder::register_widget('ether_plain_text_widget');
ether_builder::register_widget('ether_code_widget');
ether_builder::register_widget('ether_rich_text_widget');
ether_builder::register_widget('ether_html_widget');
ether_builder::register_widget('ether_heading_widget');
ether_builder::register_widget('ether_message_widget');
ether_builder::register_widget('ether_blockquote_widget');
ether_builder::register_widget('ether_list_widget');
ether_builder::register_widget('ether_button_widget');
ether_builder::register_widget('ether_video_widget');
ether_builder::register_widget('ether_post_feed_widget');
ether_builder::register_widget('ether_page_feed_widget');
ether_builder::register_widget('ether_custom_feed_widget');
ether_builder::register_widget('ether_gallery_widget');
ether_builder::register_widget('ether_services_widget');
ether_builder::register_widget('ether_testimonials_widget');
ether_builder::register_widget('ether_table_widget');
ether_builder::register_widget('ether_pricing_table_widget');
//ether_builder::register_widget('ether_pricing_table_2_widget');
ether_builder::register_widget('ether_twitter_feed_widget');
ether_builder::register_widget('ether_flickr_feed_widget');
ether_builder::register_widget('ether_tabs_widget');
ether_builder::register_widget('ether_accordion_widget');
ether_builder::register_widget('ether_pricing_box_widget');
ether_builder::register_widget('ether_nivo_widget');
ether_builder::register_widget('ether_roundabout_widget');
ether_builder::register_widget('ether_googlemap_widget');
ether_builder::register_widget('ether_contact_widget');
ether_builder::register_widget('ether_template_widget');
ether_builder::register_widget('ether_style_widget');
ether_builder::register_widget('ether_link_widget');
ether_builder::register_widget('ether_heading_menu_widget');
ether_builder::register_widget('ether_fb_button_widget');
ether_builder::register_widget('ether_fb_comments_widget');
ether_builder::register_widget('ether_fb_likebox_widget');

?>
