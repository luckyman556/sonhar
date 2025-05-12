document.addEventListener('DOMContentLoaded', () => {
    const cartObserver = new MutationObserver(() => {
        const cartItems = document.querySelectorAll('.wc-block-cart-item__wrap');

        cartItems.forEach((item) => {
            const reactProps = item.closest('[data-block-name="woocommerce/cart-line-item"]')?.__reactProps$;

            if (reactProps) {
                const cartItemData = reactProps.children.props.cartItem.extensions;
                if (cartItemData) {
                    console.log('Custom Data:', cartItemData);

                    if (cartItemData.grouped_product_id) {
                        const badge = document.createElement('div');
                        badge.className = 'grouped-product-id-badge';
                        badge.innerText = `Group ID: ${cartItemData.grouped_product_id}`;
                        item.appendChild(badge);
                    }
                }
            }
        });
    });

    const cartContainer = document.querySelector('.wp-block-woocommerce-cart');
    if (cartContainer) {
        cartObserver.observe(cartContainer, { childList: true, subtree: true });
    }
});