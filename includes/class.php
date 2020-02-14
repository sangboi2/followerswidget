 <?php
 /**
 * Adds Followers_Widget widget.
 */
class Followers_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
	function __construct() {
		parent::__construct(
			'fool_widget', // Base ID
			esc_html__( 'Followers Widget', 'flw_domain' ), // Name
			array( 'description' => esc_html__( 'A follower widget', 'flw_domain' ), ) // Args
		);
	}

	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];

		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
		}

		// Widget output or You can change ul or li list here.

		echo '<div class="g-ytsubscribe" data-channel="GoogleDevelopers" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'" data-theme="'.$instance['theme'].'"></div>'; 
		echo $args['after_widget'];
	}

	/**
	 * Back-end widget form.
	 *
	 * @see WP_Widget::form()
	 *
	 * @param array $instance Previously saved values from database.
	 */
	public function form( $instance ) {

		// Variable with getting set to whatever insatnces in the database
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'New title', 'flw_domain' );
		
		$channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'New title', 'flw_domain' );
		
		$layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'flw_domain' ); 

		$count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'flw_domain' );

		$theme = ! empty( $instance['theme'] ) ? $instance['theme'] : esc_html__( 'default', 'flw_domain' );

		?>

		<!--Title-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); 
				?>"><?php esc_attr_e( 'Title:', 'flw_domain' ); ?></label> 
			<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
			type="text" 
			value="<?php echo esc_attr( $title ); ?>">
		</p>

		<!--Channel-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); 
				?>"><?php esc_attr_e( 'Channel:', 'flw_domain' ); ?></label> 
			<input 
			class="widefat" 
			id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
			name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
			type="text" 
			value="<?php echo esc_attr( $channel ); ?>">
		</p>

		<!--Layout-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); 
				?>"><?php esc_attr_e( 'Layout:', 'flw_domain' ); ?></label> 
			<select 
				class="widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>">

				<option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
					Default
				</option>
				<option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
					Full
				</option>
			</select>
		</p>

		<!--Count-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); 
				?>"><?php esc_attr_e( 'Count:', 'flw_domain' ); ?></label> 
			<select 
				class="widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'count' ) ); ?>">

				<option value="default" <?php echo ($count == 'default') ? 'selected' : ''; ?>>
					Default
				</option>
				<option value="hidden" <?php echo ($count == 'hidden') ? 'selected' : ''; ?>>
					Hidden
				</option>
			</select>
		</p>

		<!--Theme-->
		<p>
			<label for="<?php echo esc_attr( $this->get_field_id( 'theme' ) ); 
				?>"><?php esc_attr_e( 'Theme:', 'flw_domain' ); ?></label> 
			<select 
				class="widefat" 
				id="<?php echo esc_attr( $this->get_field_id( 'theme' ) ); ?>" 
				name="<?php echo esc_attr( $this->get_field_name( 'theme' ) ); ?>">

				<option value="default" <?php echo ($theme == 'default') ? 'selected' : ''; ?>>
					Default
				</option>
				<option value="dark" <?php echo ($theme == 'dark') ? 'selected' : ''; ?>>
					Dark
				</option>
			</select>
		</p>
		<?php 
	}

	/**
	 * Sanitize widget form values as they are saved.
	 *
	 * @see WP_Widget::update()
	 *
	 * @param array $new_instance Values just sent to be saved.
	 * @param array $old_instance Previously saved values from database.
	 *
	 * @return array Updated safe values to be saved.
	 */
	public function update( $new_instance, $old_instance ) {
		$instance = array();
  
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';
  
		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? strip_tags( $new_instance['channel'] ) : '';
  
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';
  
		$instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';

		$instance['theme'] = ( ! empty( $new_instance['theme'] ) ) ? strip_tags( $new_instance['theme'] ) : '';
	
		return $instance;
	  }

} // class Foo_Widget