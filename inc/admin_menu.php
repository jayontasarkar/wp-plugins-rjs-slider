<?php 

/**
 * @package rjsslider
 * RJS Slider Settings
 */
class RJS_Slider_Options
{
	protected $option;

	public function __construct()
	{
		$this->option = get_option( 'rjs_slider_settings' );
		$this->register_settings_and_fields();
	}

	/**
	 * Create Admin Menu
	 */
	public function add_menu_page()
	{
		add_options_page( 
			'RJS Slider Settings', 'RJS Slider Options', 'manage_options', 
			'rjs-slider-options', array(RJS_Slider_Options, 'display_options_page')
		);	
	}

	/**
	 * Generate Admin Menu Page
	 */
	public function display_options_page()
	{
	?>
	<div class="wrap">
		<h1>
			<span class="dashicons dashicons-admin-settings" style="font-size: 32px"></span>
			&nbsp;RJS Slider Options
		</h1>
		<form method="post" action="options.php">
			<?php 
			settings_fields( 'rjs_slider_settings' );
			do_settings_sections( 'rjs-slider-options' );
			submit_button('Save Changes');
			?>
		</form>
	</div>
	<?php
	}

	/**
	 * Register Slider Settings & Fields
	 */
	public function register_settings_and_fields()
	{
		register_setting( 'rjs_slider_settings', 'rjs_slider_settings' );
		add_settings_section( 
			'slider_settings_section', 'Main Settings', 
			array($this, 'main_settings_cb'), 'rjs-slider-options' 
		);
		add_settings_section( 
			'img_settings_section', 'Slider Image Settings', 
			array($this, 'main_settings_cb'), 'rjs-slider-options' 
		);
		add_settings_field( 
			'slider_scope', 'Display Options', array($this, 'rjs_slider_scope'), 
			'rjs-slider-options', 'slider_settings_section' 
		);
		add_settings_field( 
			'transition_type', 'Slider Transition', array($this, 'rjs_slider_transition'), 
			'rjs-slider-options', 'slider_settings_section' 
		);
		add_settings_field( 
			'cycle_speed', 'Slider Speed', array($this, 'cycle_speed'), 
			'rjs-slider-options', 'slider_settings_section' 
		);
		add_settings_field( 
			'cycle_timeout', 'Slider Timeout', array($this, 'cycle_timeout'), 
			'rjs-slider-options', 'slider_settings_section' 
		);
		add_settings_field( 
			'slider_caption', 'Display Slider Caption?', array($this, 'rjs_slider_caption'), 
			'rjs-slider-options', 'slider_settings_section' 
		);
		add_settings_field( 
			'img_height', 'Image Height', array($this, 'img_height'), 
			'rjs-slider-options', 'img_settings_section' 
		);
		add_settings_field( 
			'img_width', 'Image Width', array($this, 'img_width'), 
			'rjs-slider-options', 'img_settings_section' 
		);
	}

	public function main_settings_cb()
	{
		
	}

	/**
	 * Form Inputs
	 */
	public function rjs_slider_scope()
	{
		$arr = array(1 => "Only on Posts", 2 => "Only on Pages", 3 => "Both Pages & Posts");
		$scope = isset($this->option['slider_scope']) ? $this->option['slider_scope'] : 3;
		$select  = "<select name='rjs_slider_settings[slider_scope]'>";
		foreach($arr as $key => $value)
		{
			$carry = $key == $scope ? 'selected' : '';
			$select .= "<option value='{$key}' {$carry}>{$value}</option>";
		}
		$select .= "</select>";

		echo $select;
	}

	public function rjs_slider_transition()
	{
		$arr = array('none' => "No Transition", 'fade' => "Fade Transition", 'fadeOut' => "Fadeout Transition" , 'scrollHorz' => 'Scroll Horizontal');
		$scope = isset($this->option['transition_type']) ? $this->option['transition_type'] : 'none';
		$select  = "<select name='rjs_slider_settings[transition_type]'>";
		foreach($arr as $key => $value)
		{
			$carry = $key == $scope ? 'selected' : '';
			$select .= "<option value='{$key}' {$carry}>{$value}</option>";
		}
		$select .= "</select>";

		echo $select;
	}
	public function rjs_slider_caption()
	{
		$caption = $this->option['slider_caption'] == 1 ? 'checked' : ''; 
		echo "<input type='checkbox' value='1' name='rjs_slider_settings[slider_caption]' {$caption} /> show image caption?";
		echo "<p class='description'>if you dispaly caption make sure to provide caption of the slider images</p>";
	}
	public function cycle_speed()
	{
		$speed = isset($this->option['cycle_speed']) ? $this->option['cycle_speed'] : 1500;
		echo "<input name='rjs_slider_settings[cycle_speed]' value='{$speed}' /> <strong>ms</strong>";
	}
	public function  cycle_timeout()
	{
		$timeout = isset($this->option['cycle_timeout']) ? $this->option['cycle_timeout'] : 2000;
		echo "<input name='rjs_slider_settings[cycle_timeout]' value='{$timeout}' /> <strong>ms</strong>";
	}
	public function img_height()
	{
		$height = isset($this->option['img_height']) ? $this->option['img_height'] : 400;
		echo "<input name='rjs_slider_settings[img_height]' value='{$height}' /> <strong>px</strong>";
	}
	public function img_width()
	{
		$width = isset($this->option['img_width']) ? $this->option['img_width'] : 600;
		echo "<input name='rjs_slider_settings[img_width]' value='{$width}' /> <strong>px</strong>";
	}
}

add_action( 'admin_menu', function(){
	RJS_Slider_Options::add_menu_page();
});
add_action( 'admin_init', function(){
	new RJS_Slider_Options();
});