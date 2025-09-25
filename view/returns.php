
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Lagorii — Return & Refund Policy</title>
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
    <div class="policy-title">Deepus  — Return & Refund Policy</div>
    <div class="policy-date">Effective for all orders placed on or after September 1, 2025.</div>
    <div class="policy-keytakeaway-card">
      <div class="policy-keytakeaway-title">KEY TAKEAWAYS</div>
      <div class="policy-keypoints">
        <div class="policy-keypoint"><span class="policy-keypoint-emoji">�</span>Return window: 7 days from delivery (approval after quality check).</div>
        <div class="policy-keypoint"><span class="policy-keypoint-emoji">🛍️</span>Condition: Items must be unused, in original condition, with tags & packaging</div>
        <div class="policy-keypoint"><span class="policy-keypoint-emoji">💳</span>Refunds: Store Credit (₹99/item deduction, instant) or Bank/UPI Refund (₹149–₹199/item deduction, 5–7 days). COD refunds go only to Lagorii Wallet.</div>
        <div class="policy-keypoint"><span class="policy-keypoint-emoji">🌍</span>International Orders: No reverse pickup; customers must self-ship items to Lagorii’s warehouse.</div>
      </div>
    </div>
    <div class="policy-section-title">Main Policy</div>
    <div class="policy-section-subtitle">To initiate returns: <a href="#" style="color:#1b3252;text-decoration:underline;font-weight:600;">Click Here</a></div>
    <ol class="policy-list">
      <li><b>Eligibility for Return</b>
        <ul>
          <li>Return requests allowed within <b>7 days of delivery</b>.</li>
          <li>Products must be unused, original condition, with all tags/labels intact.</li>
          <li>Subject to <b>quality control approval</b>.</li>
        </ul>
      </li>
      <li><b>Non-Returnable Items</b>
        <ul>
          <li>Innerwear</li>
          <li>Socks & Hair Accessories</li>
          <li>Personalized/Customized Products</li>
          <li>Clearance/Final Sale items</li>
        </ul>
      </li>
      <li><b>Refund Methods & Charges</b>
        <ul>
          <li><b>Bank Account / UPI Refunds</b><br>Returns for products under ₹5,000 will have a ₹149 deduction per item.<br>For products ₹5,000 or more, a ₹199 deduction per item will apply.<br>Processed within 5–7 business days after QC</li>
          <li><b>Cash on Delivery (COD) Orders</b><br>Refunds only as Lagorii Wallet store credits</li>
        </ul>
      </li>
      <li><b>International Orders</b>
        <ul>
          <li>No reverse pickup outside India</li>
          <li>Customers must <b>self-ship</b> to Lagorii warehouse</li>
          <li>Refunds can be <b>store credits or original payment refund</b>, as chosen by customer</li>
          <li>Order cancellations are subject to a 5% cancellation fee</li>
        </ul>
      </li>
      <li><b>General Conditions</b>
        <ul>
          <li>Return charges apply <b>per item</b> (not per order)</li>
          <li><b>Shipping charges & payment gateway fees are non-refundable</b></li>
          <li>Refunds are processed only after <b>quality check approval</b></li>
          <li><b>No direct exchanges</b> → customer must place a new order</li>
        </ul>
      </li>
    </ol>
    <div class="policy-note-title" style="margin-top:40px;">Things to note:</div>
    <div class="policy-note-list">
      <div class="policy-note-item"><span class="policy-note-num">1</span>Refunds differ by payment mode (Store Credit vs Bank/UPI vs COD).</div>
      <div class="policy-note-item"><span class="policy-note-num">2</span>Store Credits are fastest (within 48 hrs).</div>
      <div class="policy-note-item"><span class="policy-note-num">3</span>International customers bear self-shipping responsibility.</div>
      <div class="policy-note-item"><span class="policy-note-num">4</span>All refunds are strictly post-QC — rejected returns will not be refunded.</div>
    </div>
    <div style="text-align:center; margin: 48px 0 0 0;">
      <a href="https://wa.me/917892783668" target="_blank" class="policy-support-btn">
        <i class="fa fa-whatsapp"></i> Chat with support
      </a>
    </div>
    <div class="policy-support-row">
      <div class="policy-support-card">
        <i class="fa fa-truck"></i>
        <div class="policy-support-title">FREE SHIPPING</div>
        <div class="policy-support-desc">Free shipping on<br>orders of ₹2000 or more</div>
      </div>
      <div class="policy-support-card">
        <i class="fa fa-phone"></i>
        <div class="policy-support-title">CUSTOMER SERVICE</div>
        <div class="policy-support-desc">+91 96202 37728<br>Mon–Sat · 10am–7pm IST</div>
      </div>
      <div class="policy-support-card" style="box-shadow:0 4px 24px rgba(0,0,0,0.10);background:#fff;">
        <i class="fa fa-lock"></i>
        <div class="policy-support-title">SECURE PAYMENT</div>
        <div class="policy-support-desc">Your payment information is processed securely.<br>(SHA-256 with RSA Encryption)</div>
      </div>
      <div class="policy-support-card">
        <i class="fa fa-envelope"></i>
        <div class="policy-support-title">CONTACT US</div>
        <div class="policy-support-desc">Send us an e-mail at<br>care@lagorii.com</div>
      </div>
    </div>
  </div>
</body>
</html>
