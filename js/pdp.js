function changeImage(element) {
    // 1. Swap the src of the main image
    document.getElementById('mainProductImage').src = element.src;
    
    // 2. Remove the 'active-thumb' class from all thumbnails
    let thumbnails = document.querySelectorAll('.thumb-img');
    thumbnails.forEach(thumb => {
        thumb.classList.remove('active-thumb');
    });
    
    // 3. Add 'active-thumb' to the clicked thumbnail
    element.classList.add('active-thumb');
}

// Update the quantity input field safely
function updateQty(change) {
    const qtyInput = document.getElementById('qtyInput');
    let currentQty = parseInt(qtyInput.value);
    
    // Calculate new value
    let newQty = currentQty + change;
    
    // Prevent quantity from dropping below 1 or going unreasonably high (e.g., max 10)
    if (newQty >= 1 && newQty <= 10) {
        qtyInput.value = newQty;
    }
}