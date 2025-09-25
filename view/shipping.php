<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deepus — Shipping Policy</title>
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
      color: #f77c1e;
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
    <div class="policy-title">Deepus — Shipping Policy</div>
    <div class="policy-section-title" style="font-size:1.3rem; margin-top:24px;">Shipping charges</div>
    <div class="policy-keytakeaway-card" style="margin-bottom:24px;">
      <div class="policy-keytakeaway-title">India</div>
      <div class="policy-keypoints">
        <div class="policy-keypoint">Free shipping on orders above ₹999.</div>
        <div class="policy-keypoint">Standard shipping fee applies for orders below  ₹999  — final amount shown at checkout.</div>
      </div>
      <div class="policy-keytakeaway-title" style="margin-top:18px;">International</div>
      <div class="policy-keypoints">
        <div class="policy-keypoint">Standard: ₹999 — Free for orders above ₹14,999.</div>
        <div class="policy-keypoint">Express: ₹2,499.</div>
        <div class="policy-keypoint">Exact availability & rates appear at checkout.</div>
      </div>
    </div>
    <div class="policy-keytakeaway-card">
      <div class="policy-keytakeaway-title">KEY TAKEAWAYS</div>
      <div class="policy-keypoints">
        <div class="policy-keypoint"><span class="policy-keypoint-emoji">📅</span>Estimated delivery is shown on the cart/checkout pages.</div>
        <div class="policy-keypoint"><span class="policy-keypoint-emoji">🧾</span>Customs/duties (if applicable) are paid by the customer unless collected at checkout.</div>
        <div class="policy-keypoint"><span class="policy-keypoint-emoji">⚠️</span>Delays can happen due to courier, weather, or operational issues.</div>
      </div>
    </div>
    <div class="policy-section-title">Main Policy</div>
    <ol class="policy-list">
      <li><b>📦 Delivery & packaging</b>
        <ul>
          <li>Processing time varies by product.</li>
          <li>Your order ships together when all items are ready.</li>
          <li>Orders are packed securely in sealed, discreet packaging.</li>
        </ul>
      </li>
      <li><b>🌍 International shipping & customs</b>
        <ul>
          <li>International shipping is available; rates and timelines appear at checkout.</li>
          <li>Delivery timelines may increase due to customs processing in the destination country.</li>
          <li>Customs fees, local taxes, and courier processing charges may apply and are the customer’s responsibility unless prepaid at checkout.</li>
          <li>Parcels are sent as “signature not required on delivery.”</li>
        </ul>
      </li>
      <li><b>🚫 Tampered or damaged packages</b>
        <ul>
          <li>If your package arrives tampered, damaged, or opened:
            <ul>
              <li>Do not accept the shipment.</li>
              <li>Take clear photos of the outer package and shipping label.</li>
              <li>Contact support immediately:<br>
                Phone/WhatsApp: +91 6362348468 / +91 9620237728<br>
                Email: care@deepus.com
              </li>
            </ul>
          </li>
        </ul>
      </li>
    </ol>
    <div class="policy-note-title" style="margin-top:40px;">Additional Info:</div>
    <div class="policy-note-list">
      <div class="policy-note-item">Check charges & ETA at checkout.</div>
      <div class="policy-note-item">Place your order; we process items and ship once all are ready.</div>
      <div class="policy-note-item">Track your parcel; details are shared when it leaves our warehouse.</div>
      <div class="policy-note-item">On delivery, inspect the parcel. If tampered, follow the steps above.</div>
      <div class="policy-note-item">For international orders, customs/duty may be applicable.</div>
    </div>
    <div style="text-align:center; margin: 48px 0 0 0;">
      <a href="https://wa.me/919620237728" target="_blank" class="policy-support-btn">
        <i class="fa fa-whatsapp"></i> Need help? Contact us
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
        <div class="policy-support-desc">Send us an e-mail at<br>care@deepus.com</div>
      </div>
    </div>
  </div>
</body>
</html>
