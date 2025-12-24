<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FAQs - The Wear House</title>
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/feather-icons/dist/feather.min.js"></script>
</head>
<body class="bg-gray-50">


    <main class="container mx-auto px-4 py-12">

        <!-- Hero Section -->
        <section class="bg-indigo-600 text-white rounded-xl p-8 mb-12 text-center">
            <h1 class="text-4xl md:text-5xl font-bold mb-4">Frequently Asked Questions</h1>
            <p class="text-xl">Find answers to the most common questions about shopping with The Wear House.</p>
        </section>

        <!-- FAQ Section -->
        <section class="bg-white p-8 rounded-xl shadow-md">
            <h2 class="text-2xl font-bold mb-6">General Questions</h2>
            
            <div class="space-y-4">
                <!-- FAQ Item 1 -->
                <div class="faq-item border-b border-gray-200 pb-4">
                    <button class="faq-question w-full text-left flex justify-between items-center text-gray-800 font-medium">
                        What is your shipping policy?
                        <i data-feather="chevron-down" class="w-5 h-5"></i>
                    </button>
                    <div class="faq-answer hidden mt-2 text-gray-700">
                        We offer standard shipping (3-5 business days) and express shipping (1-2 business days). Free shipping on orders over $50.
                    </div>
                </div>

                <!-- FAQ Item 2 -->
                <div class="faq-item border-b border-gray-200 pb-4">
                    <button class="faq-question w-full text-left flex justify-between items-center text-gray-800 font-medium">
                        How do I return or exchange an item?
                        <i data-feather="chevron-down" class="w-5 h-5"></i>
                    </button>
                    <div class="faq-answer hidden mt-2 text-gray-700">
                        You can return any item within 30 days of delivery in its original condition. Exchanges are processed within 5-7 business days.
                    </div>
                </div>

                <!-- FAQ Item 3 -->
                <div class="faq-item border-b border-gray-200 pb-4">
                    <button class="faq-question w-full text-left flex justify-between items-center text-gray-800 font-medium">
                        How can I track my order?
                        <i data-feather="chevron-down" class="w-5 h-5"></i>
                    </button>
                    <div class="faq-answer hidden mt-2 text-gray-700">
                        Once your order is shipped, you will receive a tracking number via email. You can track your order on our website.
                    </div>
                </div>

                <!-- FAQ Item 4 -->
                <div class="faq-item border-b border-gray-200 pb-4">
                    <button class="faq-question w-full text-left flex justify-between items-center text-gray-800 font-medium">
                        What payment methods do you accept?
                        <i data-feather="chevron-down" class="w-5 h-5"></i>
                    </button>
                    <div class="faq-answer hidden mt-2 text-gray-700">
                        We accept all major credit/debit cards, PayPal, and Apple Pay.
                    </div>
                </div>

                <!-- FAQ Item 5 -->
                <div class="faq-item border-b border-gray-200 pb-4">
                    <button class="faq-question w-full text-left flex justify-between items-center text-gray-800 font-medium">
                        How do I contact customer service?
                        <i data-feather="chevron-down" class="w-5 h-5"></i>
                    </button>
                    <div class="faq-answer hidden mt-2 text-gray-700">
                        You can email us at <strong>support@thewearhouse.com</strong> or call +1 (555) 123-4567 during our working hours (Mon-Fri, 9 AM - 6 PM).
                    </div>
                </div>
            </div>
        </section>

    </main>


    <script>
        feather.replace();

        // FAQ accordion functionality
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');
            question.addEventListener('click', () => {
                answer.classList.toggle('hidden');
                question.querySelector('i').classList.toggle('rotate-180');
            });
        });
    </script>
</body>
</html>
