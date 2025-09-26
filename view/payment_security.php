<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Deepus — Payment Security</title>
  <link rel="stylesheet" href="view/layout/assets/css/style.css">
  <link rel="stylesheet" href="view/layout/assets/css/header-dropdown.css">
  <style>
    body { background: #f6f7fa; }
    .policy-container { max-width: 1100px; margin: 40px auto 0; background: #fff; border-radius: 18px; box-shadow: 0 2px 16px rgba(0,0,0,0.07); padding: 48px 36px; font-family: 'Poppins', sans-serif; }
    .policy-title { font-size: 3.0rem; font-weight: 700; color: #222; margin: 0 0 6px 0; letter-spacing: -2px; }
    .policy-sub { color: #6f6f6f; margin: 0 0 18px 0; }
    .layout { display: flex; gap: 32px; align-items: flex-start; }
    .left { min-width: 260px; }
    .menu-head { font-weight:700; color:#777; letter-spacing:.6px; margin-bottom:10px; }
    .menu { list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 12px; }
    .menu a { display:block; padding:12px 16px; border:1px solid #f0f0f0; border-radius:12px; text-decoration:none; font-weight:600; color:#1b3252; background:#fff; box-shadow:0 1px 2px rgba(0,0,0,0.02); }
    .menu a.active { outline: 2px solid #f6a55b; outline-offset: 0; border-color: #ffd8ba; }
    .help { margin-top:8px; font-size:.95rem; color:#777; }
    .help a { color:#1b3252; text-decoration: underline; font-weight: 600; }
    .right { flex: 1; min-width: 0; }

    .cards { display: flex; flex-direction: column; gap: 14px; margin-top: 10px; }
    .card { display:flex; align-items:center; gap: 10px; background:#fff; border:1px solid #f0f0f0; border-radius: 10px; padding: 12px 14px; box-shadow: 0 1px 2px rgba(0,0,0,0.02); font-weight: 600; color:#444; }
    .badge { display:inline-flex; align-items:center; justify-content:center; width: 22px; height: 22px; border-radius: 6px; font-size: 12px; color:#fff; }
    .b-orange { background:#f6a55b; }
    .b-blue { background:#3aa0ff; }
    .b-green { background:#2bb673; }

    .note { margin-top: 14px; color:#777; font-size: .95rem; }

    @media (max-width: 900px) {
      .policy-container { padding: 24px 16px; }
      .layout { flex-direction: column; gap: 16px; }
      .left { min-width: 0; }
    }
  </style>
</head>
<body>
  <div class="policy-container">
    <div class="layout">
      <aside class="left">
        <div class="menu-head">PAYMENTS & INVOICES</div>
        <ul class="menu">
          <li><a href="index.php?pg=payment">Payment Methods</a></li>
          <li><a class="active" href="index.php?pg=payment_security">Payment Security</a></li>
          <li class="help">Can't find what you're looking for? <a href="index.php?pg=contact">Contact us</a></li>
        </ul>
      </aside>
      <section class="right">
        <h1 class="policy-title">Payment Security</h1>
        <p class="policy-sub">We invest in best-in-class systems and certifications to keep your data safe.</p>

        <div class="cards">
          <div class="card"><span class="badge b-orange">🔒</span> PCI-DSS compliant processing and encryption.</div>
          <div class="card"><span class="badge b-blue">💳</span> Card data is never stored on our servers.</div>
          <div class="card"><span class="badge b-green">✅</span> 3-D Secure / OTP flows where applicable.</div>
        </div>

        <p class="note">If a payment fails, your bank may place a temporary hold. It will auto‑reverse as per their timelines.</p>
      </section>
    </div>
  </div>
</body>
</html>
