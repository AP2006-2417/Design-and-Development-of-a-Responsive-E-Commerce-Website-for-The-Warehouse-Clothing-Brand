// Mock API functions
async function fetchProducts(query = '') {
    // In a real app, this would fetch from your backend API
    const mockProducts = [
        {
            id: 1,
            name: "Men Cotton T-Shirt",
            description: "Premium cotton t-shirt for men",
            price: 799,
            category: "men",
            image_url: "http://static.photos/people/640x360/1",
            is_new: true
        },
        {
            id: 2,
            name: "Women Floral Dress",
            description: "Beautiful floral dress",
            price: 1099,
            category: "women",
            image_url: "http://static.photos/people/640x360/2",
            is_new: false
        },
        {
            id: 3,
            name: "Cute Dangri",
            description: "Stylish kids outfit",
            price: 700,
            category: "kids",
            image_url: "http://static.photos/people/640x360/3",
            is_new: true
        },
        {
            id: 4,
            name: "Men Leather Bracelet",
            description: "Stylish braided leather bracelet",
            price: 699,
            category: "accessories",
            image_url: "http://static.photos/people/640x360/4",
            is_new: false
        }
    ];
    
    // Simulate filtering based on query
    let filteredProducts = [...mockProducts];
    
    const params = new URLSearchParams(query);
    if (params.has('category')) {
        filteredProducts = filteredProducts.filter(p => p.category === params.get('category'));
    }
    
    if (params.has('new')) {
        filteredProducts = filteredProducts.filter(p => p.is_new);
    }
    
    if (params.has('search')) {
        const searchTerm = params.get('search').toLowerCase();
        filteredProducts = filteredProducts.filter(p => 
            p.name.toLowerCase().includes(searchTerm) || 
            p.description.toLowerCase().includes(searchTerm)
        );
    }
    
    if (params.has('limit')) {
        filteredProducts = filteredProducts.slice(0, parseInt(params.get('limit')));
    }
    
    return filteredProducts;
}

async function fetchProduct(id) {
    const products = await fetchProducts();
    return products.find(p => p.id === parseInt(id));
}

// Initialize cart
let cart = JSON.parse(localStorage.getItem('cart')) || [];

function addToCart(product, quantity = 1) {
    const existingItem = cart.find(item => item.product.id === product.id);
    
    if (existingItem) {
        existingItem.quantity += quantity;
    } else {
        cart.push({ product, quantity });
    }
    
    localStorage.setItem('cart', JSON.stringify(cart));
    updateCartCount();
}

function updateCartCount() {
    const count = cart.reduce((total, item) => total + item.quantity, 0);
    document.querySelectorAll('.cart-count').forEach(el => {
        el.textContent = count;
    });
}

// Initialize the page
document.addEventListener('DOMContentLoaded', () => {
    updateCartCount();
    
    // Handle product card clicks
    document.addEventListener('click', (e) => {
        if (e.target.closest('.product-card')) {
            const card = e.target.closest('.product-card');
            const productId = card.dataset.id;
            window.location.href = `product.html?id=${productId}`;
        }
    });
});