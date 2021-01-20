<?php

 //Adds Subscription widget.
 class Subs_Widget extends WP_Widget {
  
    //Registering widget with Wp.
    function __construct() {
      parent::__construct(
        'subs_widget', // Base ID
        esc_html__( 'Subscription Profile Subs', 'sw_domain' ), // Name
        array( 'description' => esc_html__( 'Widget to display subcription and profile', 'sw_domain' ), ) // Args
      );
    }
  
    /**
     * front-end display of widget.
     * @see
     * @param
     * @param
     */
    public function widget( $args, $instance ) {
      echo $args['before_widget']; //to display before widget

      if ( ! empty( $instance['title'] ) ) {
        echo $args['before_title'] . apply_filters( 'widget_title', $instance['title'] ) . $args['after_title'];
      }

      // Widget Content Output
      echo '<div class="g-ytsubscribe" data-channel="'.$instance['channel'].'" data-layout="'.$instance['layout'].'" data-count="'.$instance['count'].'"></div>';

      echo $args['after_widget']; //to display after widget
    }
  
    /**
     * back-end widget form.
     * @see
     * @param
     */
    public function form( $instance ) {
      $title = ! empty( $instance['title'] ) ? $instance['title'] : esc_html__( 'Subs Widget', 'sw_domain' ); 
      
      $channel = ! empty( $instance['channel'] ) ? $instance['channel'] : esc_html__( 'jamescookunibrisbane', 'sw_domain' ); 

      $layout = ! empty( $instance['layout'] ) ? $instance['layout'] : esc_html__( 'default', 'sw_domain' ); 

      $count = ! empty( $instance['count'] ) ? $instance['count'] : esc_html__( 'default', 'sw_domain' ); 
  
      ?>
      
      
      
      <!-- TITLE -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>">
          <?php esc_attr_e( 'Title:', 'sw_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'title' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'title' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $title ); ?>">
      </p>

      <!-- CHANNEL -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>">
          <?php esc_attr_e( 'Channel:', 'sw_domain' ); ?>
        </label> 

        <input 
          class="widefat" 
          id="<?php echo esc_attr( $this->get_field_id( 'channel' ) ); ?>" 
          name="<?php echo esc_attr( $this->get_field_name( 'channel' ) ); ?>" 
          type="text" 
          value="<?php echo esc_attr( $channel ); ?>">
      </p>

      <!-- LAYOUT -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'layout' ) ); ?>">
          <?php esc_attr_e( 'Layout:', 'sw_domain' ); ?>
        </label> 

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

      <!-- COUNT -->
      <p>
        <label for="<?php echo esc_attr( $this->get_field_id( 'count' ) ); ?>">
          <?php esc_attr_e( 'Count:', 'sw_domain' ); ?>
        </label> 

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
      <?php 
    }
  
    /**
     *
     * @see
     * @param
     * @param
     * @return
     */
    public function update( $new_instance, $old_instance ) {
      $instance = array();

      $instance['title'] = ( ! empty( $new_instance['title'] ) ) ? strip_tags( $new_instance['title'] ) : '';

      $instance['channel'] = ( ! empty( $new_instance['channel'] ) ) ? strip_tags( $new_instance['channel'] ) : '';

      $instance['layout'] = ( ! empty( $new_instance['layout'] ) ) ? strip_tags( $new_instance['layout'] ) : '';

      $instance['count'] = ( ! empty( $new_instance['count'] ) ) ? strip_tags( $new_instance['count'] ) : '';
  
      return $instance;
    }
  
  }