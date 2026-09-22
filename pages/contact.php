<?php
session_start();
$pageTitle = 'Contact Concierge & Inquiries';
require_once __DIR__ . '/../config/app.php';
require_once __DIR__ . '/../includes/header.php';
?>

<main class="page-shell">
  <section class="section">
    <div class="section-heading">
      <span class="eyebrow">24/7 VIP Concierge</span>
      <h2>Plan Your Expedition with Our Travel Architects</h2>
      <p>Whether you're looking for a bespoke private helicopter tour, a heritage haveli honeymoon, or corporate mountain retreats, our specialists are ready to craft your itinerary.</p>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1.3fr; gap: 2.5rem; margin-bottom: 4rem;">
      <!-- Contact Details & Offices -->
      <div>
        <div style="display: flex; flex-direction: column; gap: 1.5rem;">
          <div style="background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-md); padding: 1.75rem;">
            <div class="contact-card-icon" aria-hidden="true"><svg class="ui-icon" viewBox="0 0 24 24"><path d="M3 21h18M5 21V9h14v12M3 9l9-5 9 5M8 12v5M12 12v5M16 12v5"/><path d="M4 21h16"/></svg></div>
            <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 0.5rem;">Islamabad Headquarters</h3>
            <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.75rem;">Executive Tower, Blue Area, Islamabad, Pakistan</p>
            <p style="font-size: 0.9rem;"><strong>Phone:</strong> +92 (51) 287-4400</p>
            <p style="font-size: 0.9rem;"><strong>WhatsApp VIP:</strong> +92 300 855-9090</p>
            <p style="font-size: 0.9rem;"><strong>Email:</strong> concierge@discoverpakistan.travel</p>
          </div>

          <div style="background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-md); padding: 1.75rem;">
            <div class="contact-card-icon" aria-hidden="true"><svg class="ui-icon" viewBox="0 0 24 24"><path d="m3 20 7.5-13L14 13l2-3 5 10H3Z"/><path d="m10.5 14 2-3 1.5 2"/></svg></div>
            <h3 style="font-family: var(--font-heading); font-size: 1.25rem; margin-bottom: 0.5rem;">Gilgit & Hunza Field Base</h3>
            <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 0.75rem;">Airport Road, Jutial, Gilgit, Gilgit-Baltistan</p>
            <p style="font-size: 0.9rem;"><strong>Field Hotline:</strong> +92 (5811) 455-210</p>
            <p style="font-size: 0.9rem;"><strong>Emergency SAR:</strong> +92 312 900-1122</p>
          </div>
        </div>
      </div>

      <!-- Interactive Contact Form -->
      <div style="background: var(--bg-card); border: 1px solid var(--border-highlight); border-radius: var(--radius-md); padding: 2.25rem; box-shadow: var(--shadow-md);">
        <h3 style="font-family: var(--font-heading); font-size: 1.5rem; margin-bottom: 0.5rem;">Send an Inquiry</h3>
        <p style="font-size: 0.9rem; color: var(--text-muted); margin-bottom: 1.5rem;">Receive a customized proposal and quote within 4 business hours.</p>

        <form id="contactForm">
          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="cName">Your Name *</label>
              <input type="text" id="cName" class="form-control" placeholder="Tariq Mehmood" required />
            </div>
            <div class="form-group">
              <label class="form-label" for="cEmail">Email Address *</label>
              <input type="email" id="cEmail" class="form-control" placeholder="tariq@example.com" required />
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="cPhone">WhatsApp / Mobile *</label>
              <input type="tel" id="cPhone" class="form-control" placeholder="+92 300 1234567" required />
            </div>
            <div class="form-group">
              <label class="form-label" for="cDestination">Preferred Region</label>
              <select id="cDestination" class="form-control">
                <option value="hunza">Hunza Valley & Karakoram</option>
                <option value="skardu">Skardu & Deosai Plateau</option>
                <option value="lahore">Lahore Cultural & Food Trail</option>
                <option value="gwadar">Gwadar & Makran Coastline</option>
                <option value="swat">Swat Valley & Malam Jabba</option>
                <option value="custom">Custom Multi-Region Journey</option>
              </select>
            </div>
          </div>

          <div class="form-row">
            <div class="form-group">
              <label class="form-label" for="cDate">Estimated Travel Month</label>
              <input type="date" id="cDate" class="form-control" />
            </div>
            <div class="form-group">
              <label class="form-label" for="cGroupSize">Party Size</label>
              <select id="cGroupSize" class="form-control">
                <option value="1">Solo Traveler</option>
                <option value="2" selected>Couple (2 Persons)</option>
                <option value="family">Family (3-5 Persons)</option>
                <option value="group">Large Group (6+ Persons)</option>
              </select>
            </div>
          </div>

          <div class="form-group">
            <label class="form-label" for="cMessage">Tell Us About Your Dream Trip *</label>
            <textarea id="cMessage" class="form-control" placeholder="Mention preferred lodging standard, activity interests (photography, trekking, culinary), and special requirements..." required></textarea>
          </div>

          <button type="submit" class="btn btn-primary btn-lg" style="width: 100%;">Submit Concierge Inquiry</button>
        </form>
      </div>
    </div>

    <!-- Frequently Asked Questions -->
    <section class="alternate-section">
      <div class="section-heading text-center">
        <span class="eyebrow">Travel Planning Advice</span>
        <h2>Frequently Asked Questions</h2>
      </div>

      <div style="max-width: 850px; margin: 0 auto; display: flex; flex-direction: column; gap: 1.25rem;">
        <div style="background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); padding: 1.5rem;">
          <h4 style="font-size: 1.1rem; color: var(--gold-light); margin-bottom: 0.5rem;">How do tourist visas for Pakistan work?</h4>
          <p style="font-size: 0.92rem; color: var(--text-light); line-height: 1.6;">Pakistan offers an easy e-Visa and Visa On Arrival (Electronic Travel Authorization) for citizens of over 175 countries through the official NADRA portal. Our concierge provides verified Invitation Letters (LOI) upon tour confirmation.</p>
        </div>

        <div style="background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); padding: 1.5rem;">
          <h4 style="font-size: 1.1rem; color: var(--gold-light); margin-bottom: 0.5rem;">When is the best season to visit Hunza & Skardu?</h4>
          <p style="font-size: 0.92rem; color: var(--text-light); line-height: 1.6;">Spring (April–May) features breathtaking apricot blossoms; Summer (June–August) offers mild mountain temperatures and accessible high passes; Autumn (October–November) transforms the valley into dazzling golden foliage.</p>
        </div>

        <div style="background: var(--bg-card); border: 1px solid var(--border-subtle); border-radius: var(--radius-sm); padding: 1.5rem;">
          <h4 style="font-size: 1.1rem; color: var(--gold-light); margin-bottom: 0.5rem;">What payment methods are accepted?</h4>
          <p style="font-size: 0.92rem; color: var(--text-light); line-height: 1.6;">We accept all major international Credit/Debit Cards (Visa, MasterCard, Amex), direct international SWIFT wire transfers, and local Pakistani 1Link / PayPak / Raast bank transfers.</p>
        </div>
      </div>
    </section>
  </section>
</main>

<?php require_once __DIR__ . '/../includes/footer.php'; ?>
