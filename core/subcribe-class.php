<?php 
/**
 * Adds sub widget widget.
 */


class Subcribe_Widget extends WP_Widget {

	/**
	 * Register widget with WordPress.
	 */
    function __construct()
    {
        parent::__construct(
            'subcribe_widget',
            esc_html__('Subcribe','sub_domain'),
            array('description' => esc_html__('Widget to display Subcribe','sub_domain'),)
        );
    }
	/**
	 * Front-end display of widget.
	 *
	 * @see WP_Widget::widget()
	 *
	 * @param array $args     Widget arguments.
	 * @param array $instance Saved values from database.
	 */
	public function widget( $args, $instance ) {
		echo $args['before_widget'];
		if ( ! empty( $instance['title'] ) ) {
			echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
        }
        
        //widget content output
        if ($instance['channel'] == NULL){
            echo 'Error, You must input your channel';
        } else{
            echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="default"></div>';
        }
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
		$title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Subcribe', 'sub_domain' );
		$channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( '', 'sub_domain' );
		?>


		<p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
            <?php esc_attr_e( 'Title:', 'sub_domain' ); ?>
            </label> 
        <input 
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $title ); ?>">
            </p>
            
            <!-- Your Channel -->
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
            <?php esc_attr_e( 'Channel:', 'sub_domain' ); ?>
            </label> 
        <input 
            placeholder="Type your channel here"
            required
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
            type="text" 
            value="<?php echo esc_attr( $channel ); ?>">
            </p>
            <!-- End Your Channel -->

            <!-- Setting Layout -->
            <p>
            <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
            <?php esc_attr_e( 'Layout:', 'sub_domain' ); ?>
            </label> 

            <select
            class="widefat" 
            id="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>" 
            name="<?php echo esc_attr( $this->get_field_name( 'layout' ) ); ?>"
            <option>
                <option value="full" <?php echo ($layout == 'full') ? 'selected' : ''; ?>>
                    Full
                </option>
                <option value="default" <?php echo ($layout == 'default') ? 'selected' : ''; ?>>
                    Default
                </option>
        </select>
            </p>
            <!-- End Setting Layout -->


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
		$instance['title'] = ( ! empty( $new_instance['title'] ) ) ? sanitize_text_field( $new_instance['title'] ) : '';

		$instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? sanitize_text_field( $new_instance['channel'] ) : '';
		$instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? sanitize_text_field( $new_instance['layout'] ) : '';


		return $instance;
	}

} // class Foo_Widget




