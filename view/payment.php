
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deepus — Payment Methods</title>
  <link rel="stylesheet" href="view/layout/assets/css/style.css">
  <link rel="stylesheet" href="view/layout/assets/css/header-dropdown.css">
  <style>
    body { background: #f6f7fa; }
    .policy-container {
      max-width: 1100px;
      margin: 40px auto 0 auto;
      background: #fff;
      border-radius: 18px;
      box-shadow: 0 2px 16px rgba(0,0,0,0.07);
      padding: 48px 36px 0 36px;
      font-family: 'Poppins', sans-serif;
    }
    .policy-title {
      font-size: 3.2rem;
      font-weight: 700;
      color: #222;
      margin-bottom: 8px;
      letter-spacing: -2px;
      line-height: 1.1;
    }
    .policy-title:after {
      content: "";
      display: block;
      width: 120px;
      height: 4px;
      background: #1b3252;
      border-radius: 2px;
      margin: 18px 0 0 0;
    }
    .policy-date {
      color: #888;
      font-size: 1.1rem;
      margin-bottom: 32px;
      margin-top: 8px;
    }
    .policy-keytakeaway-card {
      background: #f8f8f8;
      border-radius: 18px;
      padding: 32px 24px 18px 24px;
      margin-bottom: 40px;
      box-shadow: 0 2px 8px rgba(0,0,0,0.03);
    }
    .policy-keytakeaway-title {
      color: #1b3252;
      font-weight: 700;
      font-size: 1.15rem;
      margin-bottom: 18px;
      letter-spacing: 0.5px;
    }
    .policy-keypoints {
      display: flex;
      flex-direction: column;
      gap: 18px;
    }
    .policy-keypoint {
      display: flex;
      align-items: center;
      background: #fff;
      border-radius: 12px;
      padding: 18px 20px;
      font-size: 1.13rem;
      font-weight: 500;
      box-shadow: 0 1px 4px rgba(0,0,0,0.03);
      gap: 18px;
    }
    .policy-keypoint-emoji {
      font-size: 2rem;
      margin-right: 10px;
      flex-shrink: 0;
    }
    .policy-section-title {
      font-size: 2rem;
      font-weight: 700;
      color: #222;
      margin-top: 32px;
      margin-bottom: 10px;
      letter-spacing: -1px;
    }
    .policy-section-subtitle {
      font-size: 1.1rem;
      color: #1b3252;
      margin-bottom: 0;
      font-weight: 600;
    }
    .policy-list {
      margin-left: 0;
      margin-bottom: 16px;
      padding-left: 0;
    }
    .policy-list > li {
      margin-bottom: 18px;
      font-size: 1.18rem;
      font-weight: 600;
      list-style: none;
    }
    .policy-list > li > b {
      font-size: 1.18rem;
      color: #1b3252;
    }
    .policy-list ul {
      margin-top: 8px;
      margin-bottom: 0;
      padding-left: 24px;
    }
    .policy-list ul li {
      font-size: 1.05rem;
      font-weight: 400;
      margin-bottom: 6px;
      list-style: disc;
    }
    .policy-list li br {
      line-height: 2.2;
    }
    .policy-note-title {
      font-size: 1.35rem;
      font-weight: 700;
      margin-bottom: 10px;
      color: #222;
    }
    .policy-note-list {
      margin: 0;
      padding: 0;
      display: flex;
      flex-direction: column;
      gap: 16px;
    }
    .policy-note-item {
      background: #fff7f0;
      border-radius: 12px;
      display: flex;
      align-items: center;
      padding: 16px 20px;
      font-size: 1.08rem;
      font-weight: 500;
      color: #222;
      gap: 16px;
    }
    .policy-note-num {
      background: #ffe3cc;
      color: #1b3252;
      font-weight: 700;
      font-size: 1.15rem;
      border-radius: 50%;
      width: 32px;
      height: 32px;
      display: flex;
      align-items: center;
      justify-content: center;
      margin-right: 12px;
      flex-shrink: 0;
    }
    .policy-support-row {
      display: flex;
      flex-wrap: wrap;
      gap: 32px;
      margin-top: 56px;
      justify-content: center;
    }
    .policy-support-card {
      background: #fafafa;
      border-radius: 18px;
      box-shadow: 0 2px 12px rgba(0,0,0,0.06);
      padding: 36px 24px 32px 24px;
      flex: 1 1 220px;
      min-width: 220px;
      max-width: 320px;
      text-align: center;
      margin-bottom: 16px;
      display: flex;
      flex-direction: column;
      align-items: center;
      justify-content: center;
    }
    .policy-support-card i, .policy-support-card svg {
      font-size: 2.2rem;
      color: #1b3252;
      margin-bottom: 12px;
    }
    .policy-support-title {
      color: #1b3252;
      font-weight: 700;
      margin-bottom: 8px;
      font-size: 1.1rem;
      letter-spacing: 0.5px;
    }
    .policy-support-desc {
      color: #222;
      font-size: 1.05rem;
      margin-bottom: 0;
    }
    .policy-support-btn {
      margin-top: 32px;
      background: #f77c1e;
      color: #fff;
      border: none;
      border-radius: 12px;
      padding: 16px 38px;
      font-size: 1.18rem;
      font-weight: 700;
      cursor: pointer;
      display: inline-block;
      transition: background 0.2s;
      text-decoration: none;
      box-shadow: 0 2px 8px rgba(0,0,0,0.04);
    }
    .policy-support-btn:hover {
      background: #d65c00;
    }
    @media (max-width: 900px) {
      .policy-container { padding: 16px 2vw; }
      .policy-keytakeaway-card { padding: 18px 6vw 10px 6vw; }
      .policy-support-row { flex-direction: column; gap: 16px; }
      .policy-title { font-size: 2.1rem; }
      .policy-section-title { font-size: 1.3rem; }
    }
  </style>
</head>
<body>
  <div class="policy-container">
    <div style="display:flex; gap:32px;">
      <!-- Left menu -->
      <aside style="min-width:260px;">
        <div style="font-weight:700; color:#777; letter-spacing:.6px; margin-bottom:10px;">PAYMENTS & INVOICES</div>
        <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:12px;">
          <li>
            <a href="#" style="display:block; padding:12px 16px; border:1px solid #f0f0f0; border-radius:12px; text-decoration:none; font-weight:600; color:#1b3252; background:#fff; box-shadow:0 1px 2px rgba(0,0,0,0.02);">
              Payment Methods
            </a>
          </li>
          <li>
            <a href="index.php?pg=payment_security" style="display:block; padding:12px 16px; border:1px solid #f0f0f0; border-radius:12px; text-decoration:none; font-weight:600; color:#1b3252; background:#fff; box-shadow:0 1px 2px rgba(0,0,0,0.02);">
              Payment Security
            </a>
          </li>
          
          <li style="margin-top:8px; font-size:.95rem; color:#777;">
            Can't find what you're looking for?
            <a href="index.php?pg=contact" style="color:#1b3252; text-decoration:underline; font-weight:600;">Contact us</a>
          </li>
        </ul>
      </aside>

      <!-- Right content -->
      <section style="flex:1; min-width:0;">
        <div class="policy-title" style="margin-bottom: 4px;">Payment Methods</div>
        <div class="policy-date" style="margin-top:0;">Updated: September 2025</div>
        <div style="color:#6f6f6f; margin-bottom:18px;">
          We support quick, secure checkout across UPI, cards, netbanking, and more.
        </div>

        <div style="font-weight:700; color:#666; margin:12px 0 16px 0;">We accept:</div>
        <ul style="list-style:none; padding:0; margin:0; display:flex; flex-direction:column; gap:18px;">
          <li style="display:flex; align-items:center; gap:14px;"><img src="view/layout/assets/images/payment%20logo/visa.jpeg" alt="VISA" style="height:22px;"> <span>VISA</span></li>
          <li style="display:flex; align-items:center; gap:14px;"><img src="view/layout/assets/images/payment%20logo/Mastercard.png" alt="Mastercard" style="height:22px;"> <span>Mastercard</span></li>
          <li style="display:flex; align-items:center; gap:14px;"><img src="view/layout/assets/images/payment%20logo/PayPal.png" alt="PayPal" style="height:22px;"> <span>PayPal</span></li>
          <li style="display:flex; align-items:center; gap:14px;"><img src="view/layout/assets/images/payment%20logo/American%20Express.png" alt="American Express" style="height:22px;"> <span>American Express</span></li>
          <li style="display:flex; align-items:center; gap:14px;"><img src="view/layout/assets/images/payment%20logo/NetBanking.png" alt="NetBanking" style="height:22px;"> <span>NetBanking</span></li>
          <li style="display:flex; align-items:center; gap:14px;"><img src="view/layout/assets/images/payment%20logo/UPI.png" alt="UPI" style="height:22px;"> <span>UPI</span></li>
          <li style="display:flex; align-items:center; gap:14px;"><img src="view/layout/assets/images/payment%20logo/RuPay.png" alt="RuPay" style="height:22px;"> <span>RuPay</span></li>
          <li style="display:flex; align-items:center; gap:14px;"><img src="view/layout/assets/images/payment%20logo/Cash_On_Delivery.png" alt="Cash On Delivery" style="height:22px;"> <span>Cash On Delivery</span></li>
        </ul>

        <div style="margin:26px 0; background:#f5f6f7; border:1px solid #eee; padding:16px 18px; border-radius:10px; color:#6f6f6f;">
          Available payment methods may vary by order value or account history. COD may be disabled for repeated rejections or high return patterns.
        </div>

        <div id="payment-security" style="margin-top:28px;">
          <div style="font-weight:700; color:#444; margin-bottom:6px;">Payment Security</div>
          <p style="margin:0; color:#666;">All transactions are processed securely. We do not store your card details. Card data is encrypted with industry standards during transmission.</p>
        </div>

        <div id="gift-cards" style="margin-top:28px;">
          <div style="font-weight:700; color:#444; margin-bottom:6px;">Gift Cards / Store Credits</div>
          <p style="margin:0; color:#666;">You can redeem gift cards or store credits during checkout. They can be combined with other payment methods if the balance is insufficient.</p>
        </div>
      </section>
    </div>
  </div>
</body>
</html>
