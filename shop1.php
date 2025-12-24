<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | ThreadTrove</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
    <script src="https://unpkg.com/feather-icons"></script>
    <script src="components/navbar.js"></script>
    <script src="components/product-card.js"></script>
    <script src="components/footer.js"></script>
    <script src="components/filter-sidebar.js"></script>
</head>
<body class="bg-gray-50">
    <custom-navbar></custom-navbar>
    
    <main class="container mx-auto px-4 py-8">
        <div class="flex flex-col md:flex-row gap-8">
            <!-- Filter Sidebar -->
            <filter-sidebar></filter-sidebar>
            
            <!-- Main Content -->
            <div class="flex-1">
                <div class="flex flex-col md:flex-row justify-between items-center mb-8">
                    <h1 class="text-2xl font-bold">
                        <span id="page-title">Our Collection</span>
                        <span id="product-count" class="text-gray-500 text-sm ml-2"></span>
                    </h1>
                    
                    <div class="flex items-center gap-4 mt-4 md:mt-0">
                        <div class="flex items-center">
                            <span class="mr-2 text-gray-600">Sort:</span>
                            <select id="sort-select" class="border rounded px-3 py-2">
                                <option value="price_asc">Price: Low to High</option>
                                <option value="price_desc">Price: High to Low</option>
                                <option value="newest">Newest First</option>
                                <option value="popular">Most Popular</option>
                            </select>
                        </div>
                    </div>
                </div>
                
                <!-- Products Grid -->
                <div id="products-grid" class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                    <!-- Product cards will be dynamically inserted here -->
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-center mt-12">
                    <div class="flex gap-2">
                        <button class="pagination-btn bg-gray-200 px-4 py-2 rounded">1</button>
                        <button class="pagination-btn hover:bg-gray-200 px-4 py-2 rounded">2</button>
                        <button class="pagination-btn hover:bg-gray-200 px-4 py-2 rounded">3</button>
                        <button class="pagination-btn hover:bg-gray-200 px-4 py-2 rounded">Next</button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <custom-footer></custom-footer>

    <script src="script1.js"></script>
    <script>
        feather.replace();
        
        // Load products based on URL parameters
        const urlParams = new URLSearchParams(window.location.search);
        let queryString = '';
        
        if (urlParams.has('category')) {
            queryString += `?category=${urlParams.get('category')}`;
            document.getElementById('page-title').textContent = `${urlParams.get('category')} Collection`;
        }
        
        if (urlParams.has('search')) {
            queryString += queryString ? '&' : '?';
            queryString += `search=${urlParams.get('search')}`;
            document.getElementById('page-title').textContent = `Search Results for "${urlParams.get('search')}"`;
        }
        
        if (urlParams.has('new')) {
            queryString += queryString ? '&' : '?';
            queryString += 'new=true';
            document.getElementById('page-title').textContent = 'New Arrivals';
        }
        
        fetchProducts(queryString).then(products => {
            const container = document.getElementById('products-grid');
            document.getElementById('product-count').textContent = `(${products.length} products)`;
            
            products.forEach(product => {
                const card = document.createElement('product-card');
                card.setAttribute('product', JSON.stringify(product));
                container.appendChild(card);
            });
        });
    </script>
</body>
</html>