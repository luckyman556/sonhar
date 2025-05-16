<?php

defined('ABSPATH') || exit;

global $product, $post;

do_action('woocommerce_before_add_to_cart_form'); ?>
<!-- Тут початок твого коду -->
<div class="grouped-product-card">
    <?php
	$product = wc_get_product(get_the_ID());
	$sku = $product->get_sku();
	?>
    <div class="price in-grouped-product-card">
        <?php echo $grouped_products[0]->get_price_html();?>
    </div>
    <?php 
		if ($sku) {
			echo '<p class="sku">SKU:<span>' . esc_html($sku) . '</span></p>';
		} 
	?>
    <p class="description"><?php echo $product->get_short_description(); ?></p>
    <div class="receipt">
        <hr class="horisontal-line" />
        <h3 class="sub-title">Twoje krzesło</h3>
        <p class="step-name">Podsumowanie: </p>
        <div>
            <div class="receipt-group-fabric">
                <p class="receipt-bold-text">Grupę tkanin: </p>
                <p class="receipt-text">group #2 35 zł </p>
            </div>
            <div class="receipt-fabric-color">
                <p class="receipt-bold-text">Tkaninę i kolor:</p>
                <p class="receipt-text">Enjoy me/miodowo-złoty</p>
            </div>
            <div class="receipt-chair-leg-color">
                <p class="receipt-bold-text">Kolor nóżek:</p>
                <p class="receipt-text">czarny</p>
            </div>
        </div>
        <div class="receipt-price-container">
            <p class="receipt-price-text">Cena za Twoje krzesło</p>
            <p class="receipt-general-price">595 zł</p>
        </div>
        <div class="receipt-button-container">
            <button class="buy-btn">Wstecz</button>
            <div class="count-container">
                <div class="plus-minus-btn-container">
                    <button class="count-btn">-</button>
                    <span>1</span>
                    <button class="count-btn">+</button>
                </div>
                <button class="step-one-btn">Dodaj do koszyka</button>
            </div>
            
        </div>
        


    </div>
    <h3 class="sub-title">Spersonalizuj swoje krzesło</h3>
    <hr class="horisontal-line" />
    <p class="step-name"><span class="bold-step">Krok 1.</span> Wybierz grupę tkanin: </p>
    <div class=" button-container">
        <?php 
			$previous_post = $post;
			$clothCounter = 0;
			foreach ($grouped_products as $grouped_product_child) {
				$post_object        = get_post($grouped_product_child->get_id());
				$quantites_required = $quantites_required || ($grouped_product_child->is_purchasable() && ! $grouped_product_child->has_options());
				$post               = $post_object; 

				setup_postdata($post);
				$is_cloth = get_field('is_it_tkanina');
				$images = get_field('images');
				$product = wc_get_product(get_the_ID());
				if ($is_cloth) {
					$clothCounter += 1;
					?>
        <button data-cloth-number="<?php  echo $clothCounter;?>"
            class="step-one-btn <?php if ($clothCounter === 1) {echo 'pressed-btn';} ?>">Grupa
            #<?php echo $clothCounter; ?> +<?php echo $product->get_price() ? $product->get_price() : '0';?> zł</button>
        <?php }
			?>

        <?php
				$post = $previous_post;
				setup_postdata($post);
			}
		?>
    </div>
    <hr class="horisontal-line" />
    <p class="step-name"><span class="bold-step">Krok 2.</span> Wybierz tkaninę i kolor</p>
    <div class="step-two-container ">
        <p class="group-of-fabric">Tkaniny Centaur i Toronto</p>
        <div class="fabricContainer">
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>

            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>

        </div>
        <p class="group-of-fabric">Tkanina Enjoy me</p>
        <div class="fabricContainer">
            <div class="fabric">
                <div class="fabric-inner-container">
                    <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <img src="http://localhost/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <img src="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_1.png" alt="Elli">
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <img src="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_4.png" alt="Elli">
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Group-11-1-600x600.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Group-11-1-600x600.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>

            </div>

        </div>
    </div>
    <hr class="horisontal-line" />
    <p class="step-name"><span class="bold-step">Krok 3.</span> Wybierz kolor nóżek</p>
    <div class="step-three-container ">
        <div class="fabricContainer">
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <p class="name-of-chair-leg">Orzechowy <span>#08765</span></p>
            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Group-11-1-600x600.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img src="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <p class="name-of-chair-leg">Dąb naturalny <span> #07654</span></p>
            </div>
            <div class="fabric">
                <div class="fabric-inner-container">
                    <a href="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" data-lightbox="fabrics"
                        data-title="Elli">
                        <img loading="lazy" src="http://localhost:8080/sonhar/wp-content/uploads/2025/04/Elli_2.png" alt="Elli">
                    </a>
                    <svg class="zoom-icon" width="16" height="16" viewBox="0 0 16 16" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <rect width="16" height="16" fill="white" fill-opacity="0.5" />
                        <g clip-path="url(#clip0_239_1009)">
                            <path
                                d="M9.25488 9.93694L11.3495 12.0315H9.72171V13H12.9998V9.72196H12.0313V11.3497L9.9367 9.25513L9.25488 9.93694Z"
                                fill="black" />
                            <path
                                d="M12.0313 6.27805H12.9998V3H9.72171V3.96847H11.3495L9.25488 6.06306L9.9367 6.74693L12.0313 4.65029V6.27805Z"
                                fill="black" />
                            <path
                                d="M3.96847 9.72196H3V13H6.27805V12.0315H4.65029L6.74693 9.93694L6.06306 9.25513L3.96847 11.3497V9.72196Z"
                                fill="black" />
                            <path
                                d="M3 3V6.27805H3.96847V4.65029L6.06306 6.74693L6.74693 6.06306L4.65029 3.96847H6.27805V3H3Z"
                                fill="black" />
                        </g>
                        <defs>
                            <clipPath id="clip0_239_1009">
                                <rect width="10" height="10" fill="white" transform="translate(3 3)" />
                            </clipPath>
                        </defs>
                    </svg>
                </div>
                <p class="name-of-chair-leg">Orzechowy <span>#08765</span></p>
            </div>

        </div>
    </div>


    <button class="step-one-btn button-in-configurator">Podsumowując</button>

</div>
<!-- Тут кінець твого коду -->
<form class="cart grouped_form"
    action="<?php echo esc_url(apply_filters('woocommerce_add_to_cart_form_action', $product->get_permalink())); ?>"
    method="post" enctype='multipart/form-data'>
    <table cellspacing="0" class="woocommerce-grouped-product-list group_table">
        <tbody>
            <?php
			$quantites_required      = false;
			$previous_post           = $post;
			$grouped_product_columns = apply_filters(
				'woocommerce_grouped_product_columns',
				array(
					'quantity',
					'label',
					'price',
				),
				$product
			);
			$show_add_to_cart_button = false;

			do_action('woocommerce_grouped_product_list_before', $grouped_product_columns, $quantites_required, $product);

			foreach ($grouped_products as $grouped_product_child) {
				$post_object        = get_post($grouped_product_child->get_id());
				$quantites_required = $quantites_required || ($grouped_product_child->is_purchasable() && ! $grouped_product_child->has_options());
				$post               = $post_object; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited

				setup_postdata($post);
				$is_cloth = get_field('is_it_tkanina');


				if ($grouped_product_child->is_in_stock()) {
					$show_add_to_cart_button = true;
				}
				echo '<tr id="product-' . esc_attr($grouped_product_child->get_id()) . '" class="woocommerce-grouped-product-list-item ' . esc_attr(implode(' ', wc_get_product_class('', $grouped_product_child))) . '">';

				// Output columns for each product.
				foreach ($grouped_product_columns as $column_id) {
					$clothData = array(
						'colors' => get_field('images')
					);
					// Solomia add cloch html 
					do_action('woocommerce_grouped_product_list_before_' . $column_id, $grouped_product_child);

					switch ($column_id) {
						case 'quantity':
							ob_start();

							if (! $grouped_product_child->is_purchasable() || $grouped_product_child->has_options() || ! $grouped_product_child->is_in_stock()) {
								woocommerce_template_loop_add_to_cart();
							} elseif ($grouped_product_child->is_sold_individually()) {
								echo '<input type="checkbox" name="' . esc_attr('quantity[' . $grouped_product_child->get_id() . ']') . '" value="1" class="wc-grouped-product-add-to-cart-checkbox" id="' . esc_attr('quantity-' . $grouped_product_child->get_id()) . '" />';
								echo '<label for="' . esc_attr('quantity-' . $grouped_product_child->get_id()) . '" class="screen-reader-text">' . esc_html__('Buy one of this item', 'woocommerce') . '</label>';
							} else {
								do_action('woocommerce_before_add_to_cart_quantity');

								woocommerce_quantity_input(
									array(
										'input_name'  => 'quantity[' . $grouped_product_child->get_id() . ']',
										'input_value' => isset($_POST['quantity'][$grouped_product_child->get_id()]) ? wc_stock_amount(wc_clean(wp_unslash($_POST['quantity'][$grouped_product_child->get_id()]))) : '', // phpcs:ignore WordPress.Security.NonceVerification.Missing
										'min_value'   => apply_filters('woocommerce_quantity_input_min', 0, $grouped_product_child),
										'max_value'   => apply_filters('woocommerce_quantity_input_max', $grouped_product_child->get_max_purchase_quantity(), $grouped_product_child),
										'placeholder' => '0',
									)
								);

								do_action('woocommerce_after_add_to_cart_quantity');
							}

							$value = ob_get_clean();
							break;
						case 'label':
							$value  = '<label for="product-' . esc_attr($grouped_product_child->get_id()) . '">';
							$value .= $grouped_product_child->is_visible() ? '<a href="' . esc_url(apply_filters('woocommerce_grouped_product_list_link', $grouped_product_child->get_permalink(), $grouped_product_child->get_id())) . '">' . $grouped_product_child->get_name() . '</a>' : $grouped_product_child->get_name();
							$value .= '</label>';
							break;
						case 'price':
							$value = $grouped_product_child->get_price_html() . wc_get_stock_html($grouped_product_child);
							break;
						default:
							$value = '';
							break;
					}

					echo '<td class="woocommerce-grouped-product-list-item__' . esc_attr($column_id) . '">' . apply_filters('woocommerce_grouped_product_list_column_' . $column_id, $value, $grouped_product_child) . '</td>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

					do_action('woocommerce_grouped_product_list_after_' . $column_id, $grouped_product_child);
				}

				echo '</tr>';
			}
			$post = $previous_post; // phpcs:ignore WordPress.WP.GlobalVariablesOverride.Prohibited
			setup_postdata($post);

			do_action('woocommerce_grouped_product_list_after', $grouped_product_columns, $quantites_required, $product);
			?>
        </tbody>
    </table>

    <input type="hidden" name="add-to-cart" value="<?php echo esc_attr($product->get_id()); ?>" />

    <?php if ($quantites_required && $show_add_to_cart_button) : ?>

    <?php do_action('woocommerce_before_add_to_cart_button'); ?>

    <button type="submit"
        class="single_add_to_cart_button button alt<?php echo esc_attr(wc_wp_theme_get_element_class_name('button') ? ' ' . wc_wp_theme_get_element_class_name('button') : ''); ?>"><?php echo esc_html($product->single_add_to_cart_text()); ?></button>

    <?php do_action('woocommerce_after_add_to_cart_button'); ?>

    <?php endif; ?>
</form>
<script>
document.addEventListener("DOMContentLoaded", (event) => {

});
</script>
<?php do_action('woocommerce_after_add_to_cart_form'); ?>