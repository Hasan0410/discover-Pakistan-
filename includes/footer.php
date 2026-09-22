<?php
/**
 * Discover Pakistan - Master Footer Layout
 */
$basePath = (strpos($_SERVER['PHP_SELF'], '/pages/') !== false) ? '../' : './';
?>
  <!-- Flexible Reservation & Inquiry Modal -->
  <div class="modal-backdrop" id="bookingModal" role="dialog" aria-modal="true" aria-labelledby="bookingModalTitle">
    <div class="modal-dialog" style="max-width: 600px;">
      <div class="modal-header">
        <div>
          <span class="eyebrow" style="margin-bottom: 0.25rem;">Flexible Reservation & Customizer</span>
          <h3 id="bookingModalTitle">Configure Experience</h3>
        </div>
        <button class="modal-close-btn" aria-label="Close modal">&times;</button>
      </div>

      <!-- Live Dynamic Price Card -->
      <div style="background: rgba(255,255,255,0.04); padding: 1.25rem; border-radius: var(--radius-sm); margin-bottom: 1.5rem; border: 1px solid var(--border-subtle);">
        <div style="display: flex; justify-content: space-between; align-items: flex-start;">
          <div>
            <p style="font-size: 0.82rem; color: var(--text-muted); margin-bottom: 0.2rem;">Selected Package / Stay:</p>
            <h4 id="bookingItemTitle" style="color: var(--gold-light); font-size: 1.15rem; margin-bottom: 0.4rem;">Grand Karakoram & Hunza Expedition</h4>
            <span class="tag-pill" style="font-size: 0.72rem; border-color: var(--emerald-primary); color: var(--emerald-primary);">🛡️ 100% Free Cancellation (7 Days)</span>
          </div>
          <div style="text-align: right;">
            <p style="font-size: 0.78rem; color: var(--text-muted); margin-bottom: 0.2rem;">Calculated Total:</p>
            <div style="font-size: 1.35rem; font-weight: 700; color: var(--emerald-primary);">PKR <span id="bookingCalculatedTotal">175,000</span></div>
            <p style="font-size: 0.75rem; color: var(--text-light); margin-top: 0.2rem;">Deposit to book (25%): <strong>PKR <span id="bookingDepositAmount">43,750</span></strong></p>
          </div>
        </div>
      </div>

      <form id="bookingForm">
        <input type="hidden" id="bookingItemInput" name="item" value="" />
        
        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="bookName">Full Name *</label>
            <input type="text" id="bookName" class="form-control" placeholder="e.g. Tariq Mehmood" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="bookEmail">Email Address *</label>
            <input type="email" id="bookEmail" class="form-control" placeholder="tariq@example.com" required />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="bookPhone">WhatsApp / Phone *</label>
            <input type="tel" id="bookPhone" class="form-control" placeholder="+92 300 1234567" required />
          </div>
          <div class="form-group">
            <label class="form-label" for="bookDate">Flexible Departure Date *</label>
            <input type="date" id="bookDate" class="form-control" required />
          </div>
        </div>

        <div class="form-row">
          <div class="form-group">
            <label class="form-label" for="bookGuests">Travelers Count (Dynamic Pricing)</label>
            <select id="bookGuests" class="form-control">
              <option value="1">1 Person (Solo Explorer)</option>
              <option value="2" selected>2 Persons (Duo / Couple)</option>
              <option value="3-5">3 - 5 Persons (Family / Small Group)</option>
              <option value="6+">6+ Persons (Group Tour - 10% Discount)</option>
            </select>
          </div>
          <div class="form-group">
            <label class="form-label" for="bookTier">Travel Tier Option</label>
            <select id="bookTier" class="form-control">
              <option value="classic" selected>Luxury Classic (4-Star Inns, Shared Prado)</option>
              <option value="vip">Signature VIP (+25% • 5-Star Serena, Private V8)</option>
              <option value="trekker">Alpine Trekker (-12% • Cottage & Glamping)</option>
            </select>
          </div>
        </div>

        <!-- Flexibility Add-ons Checklist -->
        <div class="form-group" style="margin-top: 0.5rem;">
          <label class="form-label">Flexible Add-ons & Equipment</label>
          <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 0.6rem; font-size: 0.85rem; color: var(--text-light); margin-top: 0.4rem;">
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
              <input type="checkbox" class="booking-addon-check" data-price="25000" />
              <span>4K Drone Videographer (+25k)</span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
              <input type="checkbox" class="booking-addon-check" data-price="8000" />
              <span>High-Altitude Oxygen Kit (+8k)</span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
              <input type="checkbox" class="booking-addon-check" data-price="15000" />
              <span>Dedicated Historian Guide (+15k)</span>
            </label>
            <label style="display: flex; align-items: center; gap: 0.5rem; cursor: pointer;">
              <input type="checkbox" class="booking-addon-check" data-price="7500" />
              <span>Airport VIP Lounge Pass (+7.5k)</span>
            </label>
          </div>
        </div>

        <div class="form-group">
          <label class="form-label" for="bookRequests">Custom Route Preferences & Dietary Needs</label>
          <textarea id="bookRequests" class="form-control" rows="2" placeholder="Tell us if you need custom dates, vegetarian/halal dining, wheelchair access, or specific photography stops..."></textarea>
        </div>

        <div style="display: flex; gap: 1rem; justify-content: flex-end; margin-top: 1.25rem;">
          <button type="button" class="btn btn-outline modal-cancel-btn">Cancel</button>
          <button type="submit" class="btn btn-primary">Confirm & Reserve (25% Deposit)</button>
        </div>
      </form>
    </div>
  </div>

  <!-- Master Footer -->
  <footer class="footer">
    <div class="footer-container">
      <div class="footer-brand">
        <h4>Discover Pakistan</h4>
        <p>The premier travel ecosystem celebrating Pakistan's majestic mountains, lush valleys, coastal highways, and rich Mughal heritage.</p>
      </div>

      <div class="footer-col">
        <h5>Quick Exploration</h5>
        <a href="<?= $basePath ?>pages/destinations.php">All Destinations</a>
        <a href="<?= $basePath ?>pages/hotels.php">Luxury Stays & Resorts</a>
        <a href="<?= $basePath ?>pages/tours.php">Curated Tour Packages</a>
        <a href="<?= $basePath ?>pages/blog.php">Travel Stories & Guides</a>
      </div>

      <div class="footer-col">
        <h5>Company & Trust</h5>
        <a href="<?= $basePath ?>pages/about.html">About Our Mission</a>
        <a href="<?= $basePath ?>pages/contact.php">Concierge & Contact</a>
        <a href="<?= $basePath ?>pages/privacy.html">Privacy Policy</a>
        <a href="<?= $basePath ?>pages/terms.html">Terms & Conditions</a>
      </div>

      <div class="footer-col footer-newsletter">
        <h5>Traveler Club</h5>
        <p>Subscribe for seasonal blossom forecasts, high-altitude road alerts, and exclusive package discounts.</p>
        <form class="newsletter-form">
          <input type="email" placeholder="Your email address" required aria-label="Email address" />
          <button type="submit" class="btn btn-primary btn-sm">Join</button>
        </form>
      </div>
    </div>

    <div class="footer-bottom">
      <div>&copy; 2026 Discover Pakistan Ltd. All rights reserved. Registered Tourism Operator.</div>
      <div style="display: flex; gap: 1.5rem;">
        <a href="<?= $basePath ?>pages/privacy.html">Privacy</a>
        <a href="<?= $basePath ?>pages/terms.html">Terms</a>
        <a href="<?= $basePath ?>admin/index.html">Admin Portal</a>
      </div>
    </div>
  </footer>

  <a href="https://wa.me/<?= $siteWhatsApp ?>" class="nh-whatsapp-btn" target="_blank" aria-label="Chat on WhatsApp" data-tooltip="Chat on WhatsApp"><svg aria-hidden="true" viewBox="0 0 64 64"><circle cx="32" cy="32" r="31" fill="#00c853"/><circle cx="32" cy="29" r="19" fill="none" stroke="#ffffff" stroke-width="5"/><path d="m17 43-3 10 11-4" fill="#ffffff"/><path d="M25 23c.5-.8 1.5-1 2.2-.5l3 2c.7.5.9 1.4.5 2.2l-1.5 2.1c1.8 2.8 4.1 5.1 6.9 6.9l2.1-1.5c.8-.5 1.8-.3 2.2.5l2 3c.5.7.3 1.7-.5 2.2l-1.5 1c-1.8 1.2-4 .9-5.7-.1-5.4-2.8-9.8-7.2-12.6-12.6-1-1.8-1.3-4-.1-5.7l1-1.5Z" fill="#ffffff"/></svg></a>

  <script src="<?= $basePath ?>assets/js/main.js"></script>
</body>
</html>
