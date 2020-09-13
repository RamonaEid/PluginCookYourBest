<?php

/**
 * Register the Widget declared in the Class: ramona_latest_news_and_articles
 * https://www.hostinger.com/tutorials/how-to-create-custom-widget-in-wordpress
 */
function ramona_register_widget()
{
    register_widget('ramona_latest_news_and_articles');
}

add_action('widgets_init', 'ramona_register_widget');

/**
 * Adds CookYourBest News & Articles widget
 * Class ramona_latest_news_and_articles
 */
class ramona_latest_news_and_articles extends WP_Widget
{
    /**
     * Register the Widget with WordPress
     */
    function __construct()
    {
        parent::__construct(
        /* widget ID */
            'ramona_latest_news_and_articles',
            /* widget name */
            __('CookYourBest News & Articles', ' ramona_widget_domain'),
            /* widget description */
            array('description' => __('Created by Ramona to enable you to manually add the Latest News & Articles', 'ramona_widget_domain'),)
        );
    }

    /**
     * Front End Display of the Widget
     * @see WP_Widget::widget()
     *
     * @param array $args Widget arguments.
     * @param array $instance Saved values from the database.
     */
    public function widget($args, $instance)
    {
        extract($args);

        /* declare variables */
        $title = apply_filters('widget_title', $instance['title']);
        $text1 = (isset($instance['text1']) && !empty($instance['text1']) ) ? $instance['text1'] : 'First SEO text here';
        $link1 = (isset($instance['link1']) && !empty($instance['link1'])) ? $instance['link1'] : 'First link here';
        $outboundlink1 = isset( $instance['outboundlink1'] ) ? $instance['outboundlink1'] : 0;
        $text2 = (isset($instance['text2']) && !empty($instance['text2'])) ? $instance['text2'] : 'Second SEO text here';
        $link2 = (isset($instance['link2']) && !empty($instance['link2'])) ? $instance['link2'] : 'Second link here';
        $outboundlink2 = isset( $instance['outboundlink2'] ) ? $instance['outboundlink2'] : 0;
        $text3 = (isset($instance['text3']) && !empty($instance['text3'])) ? $instance['text3'] : 'Third SEO text here';
        $link3 = (isset($instance['link3']) && !empty($instance['link3'])) ? $instance['link3'] : 'Third link here';
        $outboundlink3 = isset( $instance['outboundlink3'] ) ? $instance['outboundlink3'] : 0;

        /* begin displaying widget on Front End */
        /* WordPress core before_widget hook (always include ) */
        echo $args['before_widget'];
        /* if title is present */
        if (!empty($title))
            echo $args['before_title'] . $title . $args['after_title'];
        /* output */
        echo '<ul>';
        if ($outboundlink1 && $link1 !== 'First link here') {
            echo '<li><a href="' . $link1 . '" target="_blank">' . $text1 . '</a></li>';
        } else {
            if ($link1 && $link1 !== 'First link here') {
                echo '<li><a href="' . $link1 . '">' . $text1 . '</a></li>';
            } else {
                echo '<li><a name="empty">' . $text1 . '</a></li>';
            }
        }
        if ($outboundlink2 && $link2 !== 'Second link here') {
            echo '<li><a href="' . $link2 . '" target="_blank">' . $text2 . '</a></li>';
        } else {
            if ($link2 && $link2 !== 'Second link here') {
                echo '<li><a href="' . $link2 . '">' . $text2 . '</a></li>';
            } else {
                echo '<li><a name="empty">' . $text2 . '</a></li>';
            }
        }
        if ($outboundlink3 && $link3 !== 'Third link here') {
            echo '<li><a href="' . $link3 . '" target="_blank">' . $text3 . '</a></li>';
        } else {
            if ($link3 && $link3 !== 'Third link here') {
                echo '<li><a href="' . $link3 . '">' . $text3 . '</a></li>';
            } else {
                echo '<li><a name="empty">' . $text3 . '</a></li>';
            }
        }
        echo '</ul>';
        /* WordPress core after_widget hook (always include ) */
        echo $args['after_widget'];
    }

    /**
     * Back end Widget form
     * @see WP_Widget::form()
     *
     * @param array $instance Previously saved values from the database.
     * @return string|void Returns the HTML you format.
     */
    public function form($instance)
    {
        if (isset($instance['title']))
            $title = $instance['title'];
        else
            $title = __('Default Title', 'ramona_widget_domain');

        $text1 = !empty($instance['text1']) ? $instance['text1'] : 'First SEO text here';
        $link1 = !empty($instance['link1']) ? $instance['link1'] : 'First link here';
        $outboundlink1 = isset($instance['outboundlink1']) ? $instance['outboundlink1'] : 0;
        $text2 = !empty($instance['text2']) ? $instance['text2'] : 'Second SEO text here';
        $link2 = !empty($instance['link2']) ? $instance['link2'] : 'Second link here';
        $outboundlink2 = isset($instance['outboundlink2']) ? $instance['outboundlink2'] : 0;
        $link3 = !empty($instance['link3']) ? $instance['link3'] : 'Third link here';
        $text3 = !empty($instance['text3']) ? $instance['text3'] : 'Third SEO text here';
        $outboundlink3 = isset($instance['outboundlink3']) ? $instance['outboundlink3'] : 0;
        ?>


        <p>
            <label for="<?php echo $this->get_field_id('title'); ?>"><?php _e('Title:'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('title'); ?>"
                   name="<?php echo $this->get_field_name('title'); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>"/>
        </p>

        <p>
            <label for="<?php echo $this->get_field_id('text1'); ?>"><?php _e('First SEO Article Text'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('text1'); ?>"
                   name="<?php echo $this->get_field_name('text1'); ?>" type="text"
                   value="<?php echo esc_attr($text1); ?>"/>
            <label for="<?php echo $this->get_field_id('link1'); ?>"><?php _e('First Link'); ?></label>
            <input class="widefat" id="<?php echo $this->get_field_id('link1'); ?>"
                   name="<?php echo $this->get_field_name('link1'); ?>" type="text"
                   value="<?php echo esc_attr($link1); ?>"/>
            <input class="widefat" id="<?php echo $this->get_field_id('outboundlink1'); ?>"
                   name="<?php echo $this->get_field_name('outboundlink1'); ?>" type="checkbox"
                   value="<?php echo($outboundlink1); ?>" <?php isset($outboundlink1) ? checked(1, $outboundlink1, true) : checked(0, $outboundlink1, true); ?>/>
            <label for="<?php echo $this->get_field_id('outboundlink1'); ?>" style="font-weight: bolder; background: yellow;"><?php _e('Outbound Link'); ?></label>
        <hr>
        <label for="<?php echo $this->get_field_id('text2'); ?>"><?php _e('Second SEO Article Text'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('text2'); ?>"
               name="<?php echo $this->get_field_name('text2'); ?>" type="text"
               value="<?php echo esc_attr($text2); ?>"/>
        <label for="<?php echo $this->get_field_id('link2'); ?>"><?php _e('Second Link'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('link2'); ?>"
               name="<?php echo $this->get_field_name('link2'); ?>" type="text"
               value="<?php echo esc_attr($link2); ?>"/>
        <input class="widefat" id="<?php echo $this->get_field_id('outboundlink2'); ?>"
               name="<?php echo $this->get_field_name('outboundlink2'); ?>" type="checkbox"
               value="<?php echo($outboundlink2); ?>" <?php isset($outboundlink2) ? checked(1, $outboundlink2, true) : checked(0, $outboundlink2, true); ?>/>
        <label for="<?php echo $this->get_field_id('outboundlink2'); ?>" style="font-weight: bolder; background: yellow;"><?php _e('Outbound Link'); ?></label>
        <hr>
        <label for="<?php echo $this->get_field_id('text3'); ?>"><?php _e('Third SEO Article Text'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('text3'); ?>"
               name="<?php echo $this->get_field_name('text3'); ?>" type="text"
               value="<?php echo esc_attr($text3); ?>"/>
        <label for="<?php echo $this->get_field_id('link3'); ?>"><?php _e('Third Link'); ?></label>
        <input class="widefat" id="<?php echo $this->get_field_id('link3'); ?>"
               name="<?php echo $this->get_field_name('link3'); ?>" type="text"
               value="<?php echo esc_attr($link3); ?>"/>
        <input class="widefat" id="<?php echo $this->get_field_id('outboundlink3'); ?>"
               name="<?php echo $this->get_field_name('outboundlink3'); ?>" type="checkbox"
               value="<?php echo($outboundlink3); ?>" <?php isset($outboundlink3) ? checked(1, $outboundlink3, true) : checked(0, $outboundlink3, true); ?>/>
        <label for="<?php echo $this->get_field_id('outboundlink3'); ?>" style="font-weight: bolder; background: yellow;"><?php _e('Outbound Link'); ?></label>
        </p>

        <?php
    }

    /**
     * Sanitize Widget form values as they are saved.
     * @see WP_Widget::update()
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from the database.
     * @return array Updated safe values to be saved.
     */
    public function update($new_instance, $old_instance)
    {
        $instance = array();
        $instance['title'] = (!empty($new_instance['title'])) ? strip_tags($new_instance['title']) : '';
        $instance['text1'] = (!empty($new_instance['text1'])) ? strip_tags($new_instance['text1']) : '';
        $instance['link1'] = (!empty($new_instance['link1'])) ? strip_tags($new_instance['link1']) : '';
        $instance['outboundlink1'] = isset($new_instance['outboundlink1']) ? 1 : 0;
        $instance['text2'] = (!empty($new_instance['text2'])) ? strip_tags($new_instance['text2']) : '';
        $instance['link2'] = (!empty($new_instance['link2'])) ? strip_tags($new_instance['link2']) : '';
        $instance['outboundlink2'] = isset($new_instance['outboundlink2']) ? 1 : 0;
        $instance['text3'] = (!empty($new_instance['text3'])) ? strip_tags($new_instance['text3']) : '';
        $instance['link3'] = (!empty($new_instance['link3'])) ? strip_tags($new_instance['link3']) : '';
        $instance['outboundlink3'] = isset($new_instance['outboundlink3']) ? 1 : 0;
        return $instance;
    }
}
