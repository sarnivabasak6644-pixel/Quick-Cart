 document.addEventListener("DOMContentLoaded", () => {
            // Add to Cart Logic
            const cartBtns = document.querySelectorAll('.add-to-cart-btn');
            cartBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const productTitle = e.target.closest('.product-card').querySelector('h5').innerText;
                    alert(`${productTitle} added to your cart!`);
                });
            });

            // Buy Now Logic
            const buyBtns = document.querySelectorAll('.buy-now-btn');
            buyBtns.forEach(btn => {
                btn.addEventListener('click', (e) => {
                    const productTitle = e.target.closest('.product-card').querySelector('h5').innerText;
                    window.location.href = `checkout.php?product=${encodeURIComponent(productTitle)}`;
                });
            });
        });