<!-- Scripts -->
<script>
    // Mobile menu toggle
    const mobileMenuBtn = document.getElementById('mobile-menu-btn');
    const mobileMenu = document.getElementById('mobile-menu');
    
    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.toggle('hidden');
        });

        // Close mobile menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!mobileMenuBtn.contains(e.target) && !mobileMenu.contains(e.target)) {
                mobileMenu.classList.add('hidden');
            }
        });
    }

    // Image slider functionality
    function initImageSliders() {
        const sliders = document.querySelectorAll('.image-slider');
        
        sliders.forEach((slider, sliderIndex) => {
            const wrapper = slider.querySelector('.slider-wrapper');
            const images = wrapper.querySelectorAll('img');
            const dots = slider.querySelectorAll('.slider-dot');
            
            let currentIndex = 0;
            const totalImages = images.length;
            
            function updateSlider() {
                wrapper.style.transform = `translateX(-${currentIndex * 100}%)`;
                
                // Update dots
                dots.forEach((dot, index) => {
                    dot.classList.toggle('active', index === currentIndex);
                });
            }
            
            function nextImage() {
                currentIndex = (currentIndex + 1) % totalImages;
                updateSlider();
            }
            
            function prevImage() {
                currentIndex = (currentIndex - 1 + totalImages) % totalImages;
                updateSlider();
            }
            
            function goToSlide(index) {
                currentIndex = index;
                updateSlider();
            }
            
            // Initialize
            updateSlider();
            
            // Dot navigation
            dots.forEach((dot, index) => {
                dot.addEventListener('click', (e) => {
                    e.preventDefault();
                    e.stopPropagation();
                    goToSlide(index);
                });
            });
            
            // Touch/swipe functionality
            let startX = 0;
            let currentX = 0;
            let isDragging = false;
            let startTime = 0;
            
            const container = slider.querySelector('.slider-container');
            
            // Touch events for mobile
            container.addEventListener('touchstart', (e) => {
                startX = e.touches[0].clientX;
                isDragging = true;
                startTime = Date.now();
            }, { passive: true });
            
            container.addEventListener('touchmove', (e) => {
                if (!isDragging) return;
                currentX = e.touches[0].clientX;
            }, { passive: true });
            
            container.addEventListener('touchend', handleEnd);
            
            // Mouse events for desktop
            container.addEventListener('mousedown', (e) => {
                startX = e.clientX;
                isDragging = true;
                startTime = Date.now();
                container.style.cursor = 'grabbing';
                e.preventDefault();
            });
            
            container.addEventListener('mousemove', (e) => {
                if (!isDragging) return;
                e.preventDefault();
                currentX = e.clientX;
            });
            
            container.addEventListener('mouseup', handleEnd);
            container.addEventListener('mouseleave', handleEnd);
            
            function handleEnd() {
                if (!isDragging) return;
                
                const diffX = startX - currentX;
                const diffTime = Date.now() - startTime;
                const threshold = 50;
                const velocity = Math.abs(diffX) / diffTime;
                
                if (Math.abs(diffX) > threshold || velocity > 0.5) {
                    if (diffX > 0) {
                        nextImage();
                    } else {
                        prevImage();
                    }
                }
                
                isDragging = false;
                container.style.cursor = 'grab';
            }
            
            // Auto-play functionality
            let autoPlayInterval;
            
            function startAutoPlay() {
                autoPlayInterval = setInterval(nextImage, 4000);
            }
            
            function stopAutoPlay() {
                clearInterval(autoPlayInterval);
            }
            
            // Start auto-play and pause on hover
            // startAutoPlay();
            // slider.addEventListener('mouseenter', stopAutoPlay);
            // slider.addEventListener('mouseleave', startAutoPlay);
            
            // Keyboard navigation
            slider.addEventListener('keydown', (e) => {
                if (e.key === 'ArrowLeft') {
                    prevImage();
                } else if (e.key === 'ArrowRight') {
                    nextImage();
                }
            });
            
            // Make slider focusable for keyboard navigation
            slider.setAttribute('tabindex', '0');
            container.style.cursor = 'grab';
        });
    }
    
    // Quote modal functionality
    const quoteModal = document.getElementById('quote-modal');
    const selectedCarInput = document.getElementById('selected-car');
    const closeModalBtn = document.getElementById('close-modal');
    const cancelQuoteBtn = document.getElementById('cancel-quote');
    const quoteForm = document.getElementById('quote-form');
    
    // Open quote modal
    document.addEventListener('click', (e) => {
        if (e.target.classList.contains('quote-btn')) {
            e.preventDefault();
            const carName = e.target.getAttribute('data-car');
            selectedCarInput.value = carName + ' with Driver';
            quoteModal.classList.remove('hidden');
            document.body.style.overflow = 'hidden';
        }
    });
    
    // Close quote modal functions
    function closeQuoteModal() {
        quoteModal.classList.add('hidden');
        document.body.style.overflow = '';
    }
    
    if (closeModalBtn) {
        closeModalBtn.addEventListener('click', closeQuoteModal);
    }
    
    if (cancelQuoteBtn) {
        cancelQuoteBtn.addEventListener('click', closeQuoteModal);
    }
    
    // Close modal when clicking outside
    if (quoteModal) {
        quoteModal.addEventListener('click', (e) => {
            if (e.target === quoteModal) {
                closeQuoteModal();
            }
        });
    }
    
    // Handle form submission
    if (quoteForm) {
        quoteForm.addEventListener('submit', (e) => {
            e.preventDefault();
            
            // Show success message
            alert('Thank you for your quote request! We will contact you shortly.');
            
            // Reset form and close modal
            quoteForm.reset();
            closeQuoteModal();
        });
    }
    
    // Smooth scrolling for anchor links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });
    
    // Initialize everything when DOM is loaded
    document.addEventListener('DOMContentLoaded', () => {
        initImageSliders();
        
        // Set minimum date for date input to today
        const dateInput = document.querySelector('input[type="date"]');
        if (dateInput) {
            const today = new Date().toISOString().split('T')[0];
            dateInput.setAttribute('min', today);
        }
    });
    
    // Add loading animation
    window.addEventListener('load', () => {
        document.body.classList.add('loaded');
    });
    
    // Intersection Observer for animations
    const observerOptions = {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, observerOptions);
    
    // Observe car cards for scroll animations
    document.querySelectorAll('.car-card').forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(20px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });


    // Tab and stop management for booking form will be used latter in future
    // let stopCounter = 0;
    // let currentTab = 'oneway';

    // // Tab switching functionality
    // function switchTab(tabName) {
    //     currentTab = tabName;
        
    //     // Reset all tabs to inactive style
    //     document.querySelectorAll('.tab-btn').forEach(btn => {
    //         btn.classList.remove(
    //             'bg-gradient-to-r',
    //             'from-red-500',
    //             'to-orange-500',
    //             'hover:from-red-600',
    //             'hover:to-orange-600',
    //             'font-medium',
    //             'transition-colors'
    //         );
    //         btn.classList.add('bg-black');
    //     });

    //     // Set active tab style
    //     const activeTab = document.getElementById(`tab-${tabName}`);
    //     activeTab.classList.remove('bg-black');
    //     activeTab.classList.add(
    //         'bg-gradient-to-r',
    //         'from-red-500',
    //         'to-orange-500',
    //         'hover:from-red-600',
    //         'hover:to-orange-600',
    //         'font-medium',
    //         'transition-colors'
    //     );


    //     // Update form labels and fields based on tab
    //     const pickupLabel = document.getElementById('pickup-label');
    //     const dropoffContainer = document.getElementById('dropoff-container');
    //     const dropoffLabel = document.getElementById('dropoff-label');
    //     const dateLabel = document.getElementById('date-label');
    //     const dropoffInput = document.getElementById('dropoff-input');
    //     const dateInput = document.getElementById('date-input');
    //     const returnDateContainer = document.getElementById('return-date-container');

    //     switch(tabName) {
    //         case 'oneway':
    //             pickupLabel.textContent = 'Pickup';
    //             dropoffLabel.textContent = 'Drop Off';
    //             dateLabel.textContent = 'Date';
    //             dropoffInput.placeholder = 'Address, Airport, Hotel';
    //             dateInput.type = 'date';
    //             dateInput.value = '2025-09-26';
    //             returnDateContainer.classList.add('hidden');
    //             break;
            
    //         case 'airport-transfer':
    //             pickupLabel.textContent = 'Start Location';
    //             dropoffLabel.textContent = 'Duration';
    //             dateLabel.textContent = 'Date & Time';
    //             dropoffInput.placeholder = 'Duration (e.g., 4 hours)';
    //             dateInput.type = 'datetime-local';
    //             dateInput.value = '2025-09-26T09:00';
    //             returnDateContainer.classList.add('hidden');
    //             break;
            
    //         case 'point-to-point':
    //             pickupLabel.textContent = 'Pickup';
    //             dropoffLabel.textContent = 'Destination';
    //             dateLabel.textContent = 'Outbound Date';
    //             dropoffInput.placeholder = 'Address, Airport, Hotel';
    //             dateInput.type = 'date';
    //             dateInput.value = '2025-09-26';
    //             returnDateContainer.classList.remove('hidden');
    //             break;
    //     }
    // }

    // // Add stop functionality
    // function addStop() {
    //     stopCounter++;
    //     const stopsContainer = document.getElementById('stops-container');
        
    //     const stopHTML = `
    //         <div class="relative stop-item" id="stop-${stopCounter}">
    //             <div class="relative">
    //                 <svg class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    //                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path>
    //                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path>
    //                 </svg>
    //                 <input
    //                     type="text"
    //                     placeholder="Stop Location"
    //                     class="w-full pl-10 pr-10 py-3 md:border-r md:border-secondary focus:border-transparent outline-none transition-all"
    //                 />
    //                 <svg onclick="removeStop(${stopCounter})" class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400 w-5 h-5 cursor-pointer hover:text-gray-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
    //                     <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
    //                 </svg>
    //             </div>
    //         </div>
    //     `;
        
    //     stopsContainer.insertAdjacentHTML('beforeend', stopHTML);
    // }

    // // Remove specific stop
    // function removeStop(id) {
    //     const stopElement = document.getElementById(`stop-${id}`);
    //     if (stopElement) {
    //         stopElement.remove();
    //     }
        
    //     // Hide remove button if no stops left
    //     const stopsContainer = document.getElementById('stops-container');
    // }

    // // Remove all stops
    // function removeAllStops() {
    //     const stopsContainer = document.getElementById('stops-container');
        
    //     stopsContainer.innerHTML = '';
    // }
</script>