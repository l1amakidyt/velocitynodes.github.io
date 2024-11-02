// Initialize the basket (userbasket) from localStorage or as an empty array
let userbasket = JSON.parse(localStorage.getItem('userbasket')) || [];

// Update the basket count in the navbar
function updateBasketCount() {
    const basketCount = userbasket.reduce((total, item) => total + item.quantity, 0);
    document.querySelector('.cart-count').textContent = basketCount;
}

// Function to add an item to the basket
function addToBasket(plan, price) {
    // Check if item already exists in the basket
    const existingItem = userbasket.find(item => item.plan === plan);

    if (existingItem) {
        existingItem.quantity += 1; // Increment quantity if it exists
    } else {
        userbasket.push({ plan, price, quantity: 1 }); // Add new item to basket
    }

    // Save the updated basket to localStorage
    localStorage.setItem('userbasket', JSON.stringify(userbasket));

    // Update basket count
    updateBasketCount();
}

// Add event listeners to all "Add to Basket" buttons
document.querySelectorAll('.plan button').forEach(button => {
    button.addEventListener('click', () => {
        const plan = button.parentElement.querySelector('h3').textContent;
        const price = button.parentElement.querySelector('p').textContent;
        addToBasket(plan, price);
        button.textContent = 'Added to Basket';
        button.disabled = true; // Disable button after adding to basket
    });
});

// Update basket count on page load
updateBasketCount();
// Load checkout items from localStorage
function loadCheckout() {
    let userbasket = JSON.parse(localStorage.getItem('userbasket')) || [];
    const checkoutItemsContainer = document.getElementById('checkout-items');
    checkoutItemsContainer.innerHTML = ''; // Clear any existing items

    let total = 0;
    userbasket.forEach(item => {
        const itemTotal = parseFloat(item.price.replace('$', '')) * item.quantity;
        total += itemTotal;

        const row = document.createElement('tr');
        row.innerHTML = `
            <td>${item.plan}</td>
            <td>${item.price}</td>
            <td>${item.quantity}</td>
            <td>$${itemTotal.toFixed(2)}</td>
        `;
        checkoutItemsContainer.appendChild(row);
    });

    document.getElementById('checkout-total').textContent = `Total: $${total.toFixed(2)}`;
    return total.toFixed(2); // Return the total amount for PayPal
}
