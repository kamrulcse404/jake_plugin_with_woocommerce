<?php
class Jake_Custom_Widget extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'jake_custom';
    }

    public function get_title()
    {
        return esc_html__('Jake Custom', 'jake');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_categories()
    {
        return ['jake_custom'];
    }

    public function get_keywords()
    {
        return ['Jake', 'Custom'];
    }




    protected function register_controls()
    {

        // contact number Tab Start

        $this->start_controls_section(
            'jake_product_show_tab',
            [
                'label' => esc_html__('How many Product you want to show', 'jake'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );


        $this->add_control(
            'jake_number_of_product',
            [
                'label' => esc_html__('Numper of product', 'jake'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => esc_html__('8', 'jake'),
                'placeholder' => esc_html__('Type numper of product', 'jake'),
            ]
        );



        $this->end_controls_section();


        // contact number Tab end
    }







    protected function render()
    {

        $settings = $this->get_settings_for_display();
        $jake_number_of_product = $settings['jake_number_of_product'];

?>


        <div class="row">


            <?php
            $args = array(
                'post_type'      => 'product',
                'posts_per_page' => $jake_number_of_product,
            );

            $products_query = new WP_Query($args);

            if ($products_query->have_posts()) :
                while ($products_query->have_posts()) : $products_query->the_post();
                    $product_id      = get_the_ID();
                    $product_title   = get_the_title();
                    $product_price   = get_post_meta($product_id, '_regular_price', true);
                    $product_permalink = get_permalink(); // Get the product permalink

            ?>
                    <div class="column">
                        <div class="pro-block">
                            <div class="pro-img">
                                <?php
                                if (get_the_post_thumbnail_url()) {
                                ?>
                                    <a href="<?php echo esc_url($product_permalink); ?>">
                                        <img src="<?php echo get_the_post_thumbnail_url(); ?>">
                                    </a>
                                <?php
                                } else {
                                ?>
                                    <a href="<?php echo esc_url($product_permalink); ?>">
                                        <img src="https://bn23il6d5s.wpdns.site/wp-content/uploads/2024/01/no_image.png">
                                    </a>
                                <?php
                                }
                                ?>

                            </div>

                            <div class="pro-details">
                                <a href="<?php echo esc_url($product_permalink); ?>">
                                    <h2><?php echo $product_title; ?></h2>
                                </a>
                                <p><?php echo '$' . $product_price; ?></p>
                                <a class="pro-addcart" style="display: none;" href="<?php echo esc_url(add_query_arg('add-to-cart', $product_id)); ?>">
                                    Add to cart
                                </a>

                                <div class="pro-extra">
                                    <a href="#" class="my-model-kh" id="myLink">
                                        Get Quotes
                                    </a>
                                    <a href="https://bn23il6d5s.wpdns.site/contact-us-for-product/">
                                        Contact us
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php
                endwhile;
                wp_reset_postdata();
            else :
                echo 'No products found.';
            endif;
            ?>




        </div>


        <div class="custom-model-main-kh">
            <div class="custom-model-inner">
                <div class="close-btn">×</div>
                <div class="custom-model-wrap">
                    <div class="pop-up-content-wrap">

                        <!-- <form>
                            <div class="mb-3">
                                <label for="first_name" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>

                            <div class="mb-3">
                                <label for="last_name" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>


                            <div class="mb-3">
                                <label for="last_name" class="form-label">Preferred Contact</label>
                                <select class="form-select">
                                    <option value="1">Phone</option>
                                    <option value="2">Email</option>
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email Address</label>
                                <input type="email" class="form-control" id="email" name="email">
                            </div>

                            <div class="mb-3">
                                <label for="zip_code" class="form-label">Zip Code</label>
                                <input type="text" class="form-control" id="zip_code" name="zip_code">
                            </div>

                            <div class="mb-3">
                                <label for="phone_number" class="form-label">Phone Number</label>
                                <input type="number" class="form-control" id="phone_number" name="phone_number">
                            </div>

                            <div class="mb-3">
                                <label for="comments" class="form-label">Comments</label>
                                <textarea class="form-control" id="comments" rows="3" name="comments"></textarea>
                            </div>


                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form> -->



                        <?php
                        echo do_shortcode('[contact-form-7 id="53b618f" title="Contact form 1"]');
                        ?>



                    </div>
                </div>
            </div>
            <div class="bg-overlay"></div>
        </div>










<?php
    }
}
