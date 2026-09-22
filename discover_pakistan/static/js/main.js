/**
 * Discover Pakistan - Master Interactive Script
 * Provides mobile menu toggle, search & category filtering, modal booking flow,
 * toast notifications, form validation, and admin dashboard table filters.
 */

document.addEventListener('DOMContentLoaded', () => {
  initNavigation();
  initStickyHeader();
  initScrollReveal();
  initFilterAndSearch();
  initBookingModal();
  initContactForm();
  initNewsletterForm();
  initAdminDashboard();
});

function initScrollReveal() {
  const revealItems = document.querySelectorAll('.section, .nh-split-banner, .nh-step-box, .nh-review-card, .nh-tour-card');
  if (revealItems.length === 0 || !('IntersectionObserver' in window)) return;

  revealItems.forEach((item, index) => {
    item.classList.add('reveal-on-scroll');
    item.style.setProperty('--reveal-delay', `${Math.min(index % 4, 3) * 70}ms`);
  });

  const observer = new IntersectionObserver((entries, revealObserver) => {
    entries.forEach(entry => {
      if (!entry.isIntersecting) return;
      entry.target.classList.add('is-visible');
      revealObserver.unobserve(entry.target);
    });
  }, { threshold: 0.12, rootMargin: '0px 0px -40px' });

  revealItems.forEach(item => observer.observe(item));
}

/* ==========================================================================
   NAVIGATION & MOBILE MENU
   ========================================================================== */
function initNavigation() {
  const menuToggle = document.querySelector('.mobile-menu-toggle');
  const navLinks = document.querySelector('.nav-links');

  if (menuToggle && navLinks) {
    menuToggle.addEventListener('click', (e) => {
      e.stopPropagation();
      navLinks.classList.toggle('open');
      const isExpanded = navLinks.classList.contains('open');
      menuToggle.setAttribute('aria-expanded', isExpanded);
    });

    document.addEventListener('click', (e) => {
      if (!navLinks.contains(e.target) && !menuToggle.contains(e.target)) {
        navLinks.classList.remove('open');
      }
    });
  }

  // Highlight active link based on current path
  const currentPath = window.location.pathname.toLowerCase();
  document.querySelectorAll('.nav-links a').forEach(link => {
    const href = link.getAttribute('href').toLowerCase();
    if (currentPath.endsWith(href) || (href.includes('index') && (currentPath.endsWith('/') || currentPath === ''))) {
      link.classList.add('active');
    }
  });
}

/* ==========================================================================
   STICKY HEADER SCROLL EFFECT
   ========================================================================== */
function initStickyHeader() {
  const topbar = document.querySelector('.topbar');
  if (!topbar) return;

  window.addEventListener('scroll', () => {
    if (window.scrollY > 40) {
      topbar.classList.add('scrolled');
    } else {
      topbar.classList.remove('scrolled');
    }
  }, { passive: true });
}

/* ==========================================================================
   FILTER & INSTANT SEARCH
   ========================================================================== */
function initFilterAndSearch() {
  const filterButtons = document.querySelectorAll('.filter-btn');
  const searchInput = document.querySelector('.search-input');
  const cards = document.querySelectorAll('.cards-grid .card, .cards-grid-3 .card');

  if (filterButtons.length === 0 && !searchInput) return;

  let activeCategory = 'all';
  let searchTerm = '';

  function applyFilters() {
    cards.forEach(card => {
      const category = (card.getAttribute('data-category') || 'all').toLowerCase();
      const title = (card.querySelector('h3')?.textContent || '').toLowerCase();
      const bodyText = (card.querySelector('.card-body')?.textContent || '').toLowerCase();

      const matchesCategory = activeCategory === 'all' || category.includes(activeCategory);
      const matchesSearch = !searchTerm || title.includes(searchTerm) || bodyText.includes(searchTerm);

      if (matchesCategory && matchesSearch) {
        card.style.display = 'flex';
      } else {
        card.style.display = 'none';
      }
    });
  }

  filterButtons.forEach(btn => {
    btn.addEventListener('click', () => {
      filterButtons.forEach(b => b.classList.remove('active'));
      btn.classList.add('active');
      activeCategory = btn.getAttribute('data-filter') || 'all';
      applyFilters();
    });
  });

  if (searchInput) {
    searchInput.addEventListener('input', (e) => {
      searchTerm = e.target.value.trim().toLowerCase();
      applyFilters();
    });
  }
}

/* ==========================================================================
   BOOKING MODAL & DYNAMIC PRICING
   ========================================================================== */
function initBookingModal() {
  const modal = document.getElementById('bookingModal');
  const bookingTriggers = document.querySelectorAll('.btn-book-trigger');
  const closeBtn = document.querySelector('.modal-close-btn');
  const cancelBtn = document.querySelector('.modal-cancel-btn');
  const form = document.getElementById('bookingForm');

  if (!modal) return;

  function openModal(title = 'Custom Travel Package', basePrice = 45000) {
    const itemTitleEl = document.getElementById('bookingItemTitle');
    const basePriceEl = document.getElementById('bookingBasePrice');
    const inputItemEl = document.getElementById('bookingItemInput');

    if (itemTitleEl) itemTitleEl.textContent = title;
    if (inputItemEl) inputItemEl.value = title;
    if (basePriceEl) basePriceEl.textContent = Number(basePrice).toLocaleString();

    modal.classList.add('open');
    document.body.style.overflow = 'hidden';
  }

  function closeModal() {
    modal.classList.remove('open');
    document.body.style.overflow = '';
  }

  bookingTriggers.forEach(btn => {
    btn.addEventListener('click', (e) => {
      e.preventDefault();
      const title = btn.getAttribute('data-title') || 'Signature Tour Package';
      const price = btn.getAttribute('data-price') || 85000;
      openModal(title, price);
    });
  });

  if (closeBtn) closeBtn.addEventListener('click', closeModal);
  if (cancelBtn) cancelBtn.addEventListener('click', closeModal);

  modal.addEventListener('click', (e) => {
    if (e.target === modal) closeModal();
  });

  document.addEventListener('keydown', (e) => {
    if (e.key === 'Escape' && modal.classList.contains('open')) {
      closeModal();
    }
  });

  if (form) {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const submitBtn = form.querySelector('button[type="submit"]');
      const originalText = submitBtn.textContent;
      
      submitBtn.disabled = true;
      submitBtn.textContent = 'Processing Reservation...';

      setTimeout(() => {
        submitBtn.disabled = false;
        submitBtn.textContent = originalText;
        closeModal();
        form.reset();
        showToast('Reservation confirmed! Our concierge will contact you within 2 hours.');
      }, 900);
    });
  }
}

/* ==========================================================================
   CONTACT FORM HANDLER
   ========================================================================== */
function initContactForm() {
  const contactForm = document.getElementById('contactForm');
  if (!contactForm) return;

  contactForm.addEventListener('submit', (e) => {
    e.preventDefault();
    const submitBtn = contactForm.querySelector('button[type="submit"]');
    const originalText = submitBtn.textContent;

    submitBtn.disabled = true;
    submitBtn.textContent = 'Sending Message...';

    setTimeout(() => {
      submitBtn.disabled = false;
      submitBtn.textContent = originalText;
      contactForm.reset();
      showToast('Thank you! Your travel inquiry has been received.');
    }, 800);
  });
}

/* ==========================================================================
   NEWSLETTER SUBSCRIPTION
   ========================================================================== */
function initNewsletterForm() {
  const forms = document.querySelectorAll('.newsletter-form');
  forms.forEach(form => {
    form.addEventListener('submit', (e) => {
      e.preventDefault();
      const input = form.querySelector('input[type="email"]');
      if (input && input.value) {
        showToast('Subscribed! Welcome to Discover Pakistan Insider Travel Club.');
        form.reset();
      }
    });
  });
}

/* ==========================================================================
   ADMIN DASHBOARD INTERACTIONS
   ========================================================================== */
function initAdminDashboard() {
  const adminSearch = document.getElementById('adminTableSearch');
  const statusFilter = document.getElementById('adminStatusFilter');
  const tableRows = document.querySelectorAll('.data-table tbody tr');

  if (!adminSearch && !statusFilter) return;

  function filterAdminTable() {
    const term = (adminSearch?.value || '').toLowerCase().trim();
    const status = (statusFilter?.value || 'all').toLowerCase();

    tableRows.forEach(row => {
      const text = row.textContent.toLowerCase();
      const rowStatus = row.getAttribute('data-status') || '';

      const matchTerm = !term || text.includes(term);
      const matchStatus = status === 'all' || rowStatus.toLowerCase() === status;

      if (matchTerm && matchStatus) {
        row.style.display = '';
      } else {
        row.style.display = 'none';
      }
    });
  }

  if (adminSearch) adminSearch.addEventListener('input', filterAdminTable);
  if (statusFilter) statusFilter.addEventListener('change', filterAdminTable);
}

/* ==========================================================================
   TOAST NOTIFICATION UTILITY
   ========================================================================== */
function showToast(message) {
  let container = document.querySelector('.toast-container');
  if (!container) {
    container = document.createElement('div');
    container.className = 'toast-container';
    document.body.appendChild(container);
  }

  const toast = document.createElement('div');
  toast.className = 'toast';
  toast.innerHTML = `
    <svg width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="var(--emerald-primary)" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
      <path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path>
      <polyline points="22 4 12 14.01 9 11.01"></polyline>
    </svg>
    <span>${message}</span>
  `;

  container.appendChild(toast);
  
  // Trigger animation
  requestAnimationFrame(() => {
    toast.classList.add('show');
  });

  setTimeout(() => {
    toast.classList.remove('show');
    setTimeout(() => toast.remove(), 400);
  }, 4500);
}
