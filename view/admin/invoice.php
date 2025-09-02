<?php
// Standalone Invoice page for a single order
include_once '../../model/connectdb.php';
include_once '../../model/product.php';
include_once '../../model/donhang.php';

// Get order_id from the variable set by admin index.php, or fallback to GET parameter
$order_id = isset($order_id) ? $order_id : (isset($_GET['id']) ? intval($_GET['id']) : 0);

if ($order_id <= 0) {
    echo '<h2>Invalid order ID</h2>';
    echo '<p><a href="index.php?pg=donhang">← Back to Orders</a></p>';
    exit;
}

try {
    $order = get_order_detail($order_id);
    if (!$order) {
        echo '<h2>Order not found</h2>';
        echo '<p>Order ID: ' . htmlspecialchars($order_id) . ' could not be found.</p>';
        echo '<p><a href="index.php?pg=donhang">← Back to Orders</a></p>';
        exit;
    }

    $order_items = get_order_items($order_id);
    if (!$order_items || empty($order_items)) {
        echo '<h2>Order items not found</h2>';
        echo '<p>Order ID: ' . htmlspecialchars($order_id) . ' has no items.</p>';
        echo '<p><a href="index.php?pg=donhang">← Back to Orders</a></p>';
        exit;
    }
} catch (Exception $e) {
    echo '<h2>Database Error</h2>';
    echo '<p>An error occurred while retrieving order information: ' . htmlspecialchars($e->getMessage()) . '</p>';
    echo '<p><a href="index.php?pg=donhang">← Back to Orders</a></p>';
    exit;
}

// Debug information (remove in production)
if (isset($_GET['debug']) && $_GET['debug'] == 1) {
    echo '<div style="background: #f8f9fa; padding: 20px; margin: 20px; border: 1px solid #dee2e6; border-radius: 5px;">';
    echo '<h3>Debug Information:</h3>';
    echo '<p><strong>Order ID:</strong> ' . htmlspecialchars($order_id) . '</p>';
    echo '<pre>Order: ' . print_r($order, true) . '</pre>';
    echo '<pre>Order Items: ' . print_r($order_items, true) . '</pre>';
    echo '<p><strong>Subtotal:</strong> ' . number_format($subtotal, 0, '.', ',') . '</p>';
    echo '<p><strong>Total:</strong> ' . number_format($order['tongtien'], 0, '.', ',') . '</p>';
    echo '</div>';
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="noindex, nofollow">
    <meta name="format-detection" content="telephone=no">
    <title>Invoice #<?= htmlspecialchars($order['ma_donhang'] ?? 'N/A') ?> - Deepus</title>
    <style>
        /* Reset all styles to ensure complete isolation */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        
        html, body {
            margin: 0;
            padding: 0;
            width: 100%;
            height: 100%;
            overflow-x: hidden;
            overflow-y: auto;
            scrollbar-width: none; /* Firefox */
            -ms-overflow-style: none; /* Internet Explorer 10+ */
        }
        
        /* Hide scrollbar for Chrome, Safari and Opera */
        html::-webkit-scrollbar, body::-webkit-scrollbar {
            display: none;
        }
        
        body { 
            font-family: 'Arial', sans-serif;
            background: #ffffff !important;
            color: #333 !important;
            line-height: 1.4;
            font-size: 12px;
            /* Ensure no inherited styles */
            font-weight: normal;
            text-align: left;
            direction: ltr;
        }
        
        /* Override any potential inherited styles */
        body * {
            font-family: inherit !important;
            color: inherit !important;
        }
        
        .invoice-wrapper {
            width: 210mm;
            height: auto;
            margin: 0 auto;
            background: #ffffff !important;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            position: relative;
            z-index: 1000;
            padding: 15mm;
            box-sizing: border-box;
            overflow: visible;
            page-break-inside: avoid;
            break-inside: avoid;
        }
        
        .invoice-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 15mm;
            border-bottom: 2px solid #333;
            padding-bottom: 8mm;
        }
        
        .company-info {
            flex: 1;
            display: flex;
            align-items: center;
            gap: 15px;
        }
        
        .company-logo-img {
            flex-shrink: 0;
        }
        
        .company-logo-img img {
            width: 60px;
            height: 60px;
            object-fit: contain;
        }
        
        .company-text {
            flex: 1;
        }
        
        .company-logo {
            font-size: 24px;
            font-weight: bold;
            color: #333 !important;
            margin-bottom: 5px;
        }
        
        .company-tagline {
            font-size: 14px;
            color: #666 !important;
            margin-bottom: 8px;
        }
        
        .company-details {
            font-size: 10px;
            color: #666 !important;
            line-height: 1.4;
        }
        
        .invoice-title {
            text-align: right;
            flex: 1;
        }
        
        .invoice-title h1 {
            color: #333 !important;
            font-size: 32px;
            margin-bottom: 10px;
            font-weight: bold;
        }
        
        .invoice-number {
            color: #666 !important;
            font-size: 16px;
            font-weight: bold;
            margin-bottom: 5px;
        }
        
        .invoice-date {
            font-size: 12px;
            color: #666 !important;
            margin-bottom: 3px;
        }
        
        .invoice-status {
            font-size: 12px;
            color: #666 !important;
            font-weight: bold;
        }
        
        .invoice-body {
            display: flex;
            gap: 15mm;
            margin-bottom: 15mm;
        }
        
        .bill-to {
            flex: 1;
        }
        
        .bill-to h3 {
            color: #333 !important;
            font-size: 14px;
            margin-bottom: 8px;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        
        .bill-to p {
            font-size: 11px;
            color: #333 !important;
            margin-bottom: 3px;
            line-height: 1.4;
        }
        
        .ship-to {
            flex: 1;
        }
        
        .ship-to h3 {
            color: #333 !important;
            font-size: 14px;
            margin-bottom: 8mm;
            font-weight: bold;
            border-bottom: 1px solid #ccc;
            padding-bottom: 5px;
        }
        
        .ship-to p {
            font-size: 11px;
            color: #333 !important;
            margin-bottom: 3px;
            line-height: 1.4;
        }
        
        .products-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 15mm;
            font-size: 11px;
        }
        
        .products-table th {
            background: #f5f5f5 !important;
            color: #333 !important;
            font-weight: bold;
            padding: 8px 6px;
            text-align: left;
            border: 1px solid #ddd;
            font-size: 11px;
        }
        
        .products-table td {
            padding: 8px 6px;
            border: 1px solid #ddd;
            vertical-align: top;
            background: #ffffff !important;
        }
        
        .product-name {
            font-weight: bold;
            color: #333 !important;
            width: 40%;
        }
        
        .quantity {
            text-align: center;
            color: #333 !important;
            width: 15%;
        }
        
        .price {
            text-align: right;
            color: #333 !important;
            width: 20%;
        }
        
        .total {
            text-align: right;
            font-weight: bold;
            color: #333 !important;
            width: 25%;
        }
        
        .invoice-summary {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 15mm;
        }
        
        .summary-table {
            width: 200px;
            border-collapse: collapse;
        }
        
        .summary-table td {
            padding: 6px 8px;
            border: none;
            font-size: 12px;
        }
        
        .summary-table .label {
            text-align: right;
            color: #666 !important;
            font-weight: normal;
        }
        
        .summary-table .value {
            text-align: right;
            color: #333 !important;
            font-weight: bold;
        }
        
        .summary-table .total-row {
            border-top: 2px solid #333;
            font-size: 14px;
            font-weight: bold;
        }
        
        .invoice-footer {
            margin-top: 15mm;
            padding-top: 8mm;
            border-top: 1px solid #ccc;
            text-align: center;
            font-size: 10px;
            color: #666 !important;
        }
        
        .footer-content {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 8mm;
            flex-direction: row;
        }
        
        .footer-section {
            flex: 1;
            text-align: center;
            padding: 0 5mm;
        }
        
        .footer-section h4 {
            color: #333 !important;
            margin-bottom: 5px;
            font-size: 12px;
            font-weight: bold;
        }
        
        .footer-section p {
            margin-bottom: 3px;
            font-size: 10px;
            color: #666 !important;
        }
        
        .copyright {
            font-size: 10px;
            color: #999 !important;
            border-top: 1px solid #eee;
            padding-top: 5mm;
        }
        
        .action-buttons {
            position: fixed;
            top: 20px;
            right: 20px;
            z-index: 1001;
        }
        
        .btn {
            display: inline-block;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            font-size: 12px;
            margin: 0 5px;
            transition: all 0.3s;
            border: none;
            cursor: pointer;
            font-weight: bold;
        }
        
        .btn-back {
            background: #6c757d !important;
            color: white !important;
        }
        
        .btn-back:hover {
            background: #5a6268 !important;
        }
        
        .btn-print {
            background: #007bff !important;
            color: white !important;
        }
        
        .btn-print:hover {
            background: #0056b3 !important;
        }
        
        .btn-debug:hover {
            background: #218838 !important;
        }
        
        /* Ensure complete isolation from admin panel */
        .main, .dashboard, .container, .dashboard-content {
            display: none !important;
        }
        
        /* Force single page layout */
        .invoice-wrapper {
            page-break-after: avoid !important;
            page-break-before: avoid !important;
            break-after: avoid !important;
            break-before: avoid !important;
            display: block !important;
        }
        
        /* Ensure all content stays together */
        .invoice-wrapper > * {
            page-break-inside: avoid !important;
            break-inside: avoid !important;
        }
        
        /* Ensure content fits on single page */
        .invoice-wrapper * {
            max-height: none !important;
            overflow: visible !important;
        }
        
        /* Force compact layout */
        .invoice-wrapper {
            line-height: 1.1 !important;
        }
        
        .invoice-wrapper p {
            margin-bottom: 0px !important;
        }
        
        .invoice-wrapper h3 {
            margin-bottom: 1px !important;
        }
        
        /* Ensure minimal spacing */
        .invoice-wrapper * {
            margin-top: 0 !important;
            margin-bottom: 0 !important;
        }
        
        .invoice-wrapper .invoice-header {
            margin-bottom: 3mm !important;
        }
        
        .invoice-wrapper .invoice-body {
            margin-bottom: 3mm !important;
        }
        
        .invoice-wrapper .products-table {
            margin-bottom: 2mm !important;
        }
        
        .invoice-wrapper .invoice-summary {
            margin-bottom: 2mm !important;
        }
        
        .invoice-wrapper .invoice-footer {
            margin-top: 2mm !important;
        }
        
        /* Force footer to be horizontal and compact */
        .footer-content {
            flex-direction: row !important;
            align-items: center !important;
            gap: 2mm !important;
        }
        
        .footer-section {
            flex: 1 !important;
            text-align: center !important;
            padding: 0 !important;
        }
        
        .footer-section h4 {
            margin-bottom: 0px !important;
            line-height: 1.0 !important;
        }
        
        .footer-section p {
            margin-bottom: 0px !important;
            line-height: 1.0 !important;
        }
        
        /* Ensure invoice fits on one page */
        .invoice-wrapper {
            max-height: 297mm !important;
            overflow: hidden !important;
        }
        
        /* Force compact layout with minimal spacing */
        .invoice-wrapper > * {
            margin: 0 !important;
            padding: 0 !important;
        }
        
        .invoice-wrapper .invoice-header {
            padding-bottom: 1mm !important;
        }
        
        .invoice-wrapper .invoice-body {
            padding-bottom: 1mm !important;
        }
        
        .invoice-wrapper .products-table {
            padding-bottom: 1mm !important;
        }
        
        .invoice-wrapper .invoice-summary {
            padding-bottom: 1mm !important;
        }
        
        .invoice-wrapper .invoice-footer {
            padding-top: 1mm !important;
        }
        
        /* Ensure minimal spacing between all elements */
        .invoice-wrapper * {
            margin: 0 !important;
            padding: 0 !important;
        }
        
        /* Standard invoice layout with proper spacing */
        .invoice-wrapper {
            line-height: 1.4 !important;
        }
        
        .invoice-wrapper p {
            margin: 0 !important;
            padding: 0 !important;
            line-height: 1.4 !important;
        }
        
        .invoice-wrapper h3 {
            margin: 0 !important;
            padding: 0 !important;
            line-height: 1.4 !important;
        }
        
        .invoice-wrapper h4 {
            margin: 0 !important;
            padding: 0 !important;
            line-height: 1.4 !important;
        }
        
        /* Standard spacing for print */
        @media print {
            .invoice-wrapper {
                transform: scale(1.0) !important;
                transform-origin: top left !important;
                height: auto !important;
                width: 210mm !important;
                max-height: none !important;
                padding: 15mm !important;
            }
            
            /* Hide any browser-added content */
            @page {
                margin: 0 !important;
                size: A4 !important;
            }
            
            /* Force single page */
            html, body {
                height: auto !important;
                width: auto !important;
                overflow: visible !important;
            }
            
            /* Ensure all content fits */
            .invoice-wrapper * {
                max-height: none !important;
                overflow: visible !important;
            }
            
            /* Maintain proper spacing in print */
            .invoice-wrapper .invoice-header {
                margin-bottom: 15mm !important;
                padding-bottom: 8mm !important;
            }
            
            .invoice-wrapper .invoice-body {
                margin-bottom: 15mm !important;
            }
            
            .invoice-wrapper .products-table {
                margin-bottom: 15mm !important;
            }
            
            .invoice-wrapper .invoice-summary {
                margin-bottom: 15mm !important;
            }
            
            .invoice-wrapper .invoice-footer {
                margin-top: 15mm !important;
                padding-top: 8mm !important;
            }
        }
        
        /* Hide any potential sidebar elements */
        .sidebar, .nav, .navigation, .admin-menu {
            display: none !important;
        }
        
        /* Hide any browser-added text */
        .invoice-wrapper::before,
        .invoice-wrapper::after {
            content: none !important;
        }
        
        /* Ensure no extra content is added */
        body::before,
        body::after {
            content: none !important;
        }
        
        @media print {
            .action-buttons {
                display: none !important;
            }
            body {
                background: white !important;
                margin: 0 !important;
                padding: 0 !important;
                overflow: visible !important;
                height: auto !important;
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
            }
            .invoice-wrapper {
                box-shadow: none !important;
                margin: 0 !important;
                width: 210mm !important;
                height: auto !important;
                padding: 4mm !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                max-height: none !important;
                overflow: visible !important;
                page-break-after: avoid !important;
                page-break-before: avoid !important;
                break-after: avoid !important;
                break-before: avoid !important;
            }
            .invoice-header {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                margin-bottom: 6mm !important;
                padding-bottom: 4mm !important;
            }
            .invoice-body {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                margin-bottom: 6mm !important;
                gap: 8mm !important;
            }
            .products-table {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                margin-bottom: 4mm !important;
                font-size: 7px !important;
            }
            .invoice-summary {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                margin-bottom: 4mm !important;
            }
            .invoice-footer {
                page-break-inside: avoid !important;
                break-inside: avoid !important;
                margin-top: 4mm !important;
                padding-top: 2mm !important;
            }
            .products-table th {
                -webkit-print-color-adjust: exact !important;
                color-adjust: exact !important;
                padding: 2px 2px !important;
            }
            .products-table td {
                padding: 2px 2px !important;
            }
            /* Ensure all content is visible in print */
            * {
                visibility: visible !important;
                overflow: visible !important;
            }
            /* Force single page printing */
            .invoice-wrapper {
                page-break-after: avoid !important;
                page-break-before: avoid !important;
            }
        }
        
        @media (max-width: 768px) {
            .invoice-wrapper {
                width: 100% !important;
                height: auto !important;
                padding: 10mm !important;
                margin: 10px !important;
                max-height: none !important;
            }
            
            .invoice-header {
                flex-direction: column;
                gap: 10mm;
            }
            
            .invoice-body {
                flex-direction: column;
                gap: 10mm;
            }
            
            .products-table {
                font-size: 10px;
            }
            
            .products-table th,
            .products-table td {
                padding: 4px 3px;
            }
            
            .action-buttons {
                position: static;
                text-align: center;
                margin-bottom: 20px;
            }
            
            .btn {
                display: block;
                margin: 10px auto;
                width: 150px;
            }
            
            .footer-content {
                flex-direction: column;
                gap: 10mm;
            }
        }
    </style>
</head>
<body>
    <div class="action-buttons">
        <a href="index.php?pg=donhang" class="btn btn-back">← Back</a>
        <button class="btn btn-print" onclick="printInvoice()">Print</button>
        <a href="?debug=1" class="btn btn-debug" style="background: #28a745 !important; color: white !important;">Debug</a>
    </div>
    
    <script>
        // Function to print invoice with proper settings
        function printInvoice() {
            // Hide action buttons before printing
            const actionButtons = document.querySelector('.action-buttons');
            actionButtons.style.display = 'none';
            
            // Ensure the invoice wrapper is fully visible and properly sized
            const invoiceWrapper = document.querySelector('.invoice-wrapper');
            const body = document.body;
            const html = document.documentElement;
            
            // Set print-optimized styles
            body.style.overflow = 'visible';
            body.style.height = 'auto';
            body.style.width = 'auto';
            html.style.height = 'auto';
            html.style.width = 'auto';
            html.style.overflow = 'visible';
            
            invoiceWrapper.style.width = '210mm';
            invoiceWrapper.style.height = 'auto';
            invoiceWrapper.style.margin = '0';
            invoiceWrapper.style.padding = '4mm';
            invoiceWrapper.style.boxShadow = 'none';
            invoiceWrapper.style.pageBreakInside = 'avoid';
            invoiceWrapper.style.overflow = 'visible';
            invoiceWrapper.style.transform = 'scale(1.0)';
            invoiceWrapper.style.transformOrigin = 'top left';
            
            // Force all content to be visible
            const allElements = invoiceWrapper.querySelectorAll('*');
            allElements.forEach(el => {
                el.style.pageBreakInside = 'avoid';
                el.style.breakInside = 'avoid';
            });
            
            // Wait a moment for styles to apply, then print
            setTimeout(() => {
                try {
                    window.print();
                } catch (e) {
                    console.error('Print failed:', e);
                    alert('Print failed. Please try using Ctrl+P or Cmd+P instead.');
                }
                
                // Restore original styles after printing
                setTimeout(() => {
                    actionButtons.style.display = 'flex';
                    body.style.overflow = '';
                    body.style.height = '';
                    body.style.width = '';
                    html.style.height = '';
                    html.style.width = '';
                    html.style.overflow = '';
                    invoiceWrapper.style.width = '';
                    invoiceWrapper.style.height = '';
                    invoiceWrapper.style.margin = '';
                    invoiceWrapper.style.padding = '';
                    invoiceWrapper.style.boxShadow = '';
                    invoiceWrapper.style.pageBreakInside = '';
                    invoiceWrapper.style.transform = '';
                    invoiceWrapper.style.transformOrigin = '';
                    
                    allElements.forEach(el => {
                        el.style.pageBreakInside = '';
                        el.style.breakInside = '';
                    });
                }, 1000);
            }, 100);
        }
        
        // Add keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey || e.metaKey) {
                switch(e.key) {
                    case 'p':
                        e.preventDefault();
                        printInvoice();
                        break;
                }
            }
        });
        
        // Auto-resize for better fit
        function adjustInvoiceSize() {
            const wrapper = document.querySelector('.invoice-wrapper');
            const windowWidth = window.innerWidth;
            
            if (windowWidth < 800) {
                wrapper.style.width = '100%';
                wrapper.style.height = 'auto';
                wrapper.style.padding = '5px';
            } else {
                wrapper.style.width = '210mm';
                wrapper.style.height = '297mm';
                wrapper.style.padding = '10mm';
            }
        }
        
        // Call on load and resize
        window.addEventListener('load', adjustInvoiceSize);
        window.addEventListener('resize', adjustInvoiceSize);
    </script>
    
    <div class="invoice-wrapper">
        <div class="invoice-header">
            <div class="company-info">
                <div class="company-logo-img">
                    <img src="../../view/layout/assets/images/logo.jpg" alt="Deepus">
                </div>
                <div class="company-text">
                    <div class="company-logo">Deepus</div>
                    <div class="company-tagline">Fashion for Everyone</div>
                    <div class="company-details">
                        123 Fashion Street<br>
                        Mumbai, Maharashtra 400001<br>
                        India<br>
                        Phone: +91 98765 43210<br>
                        Email: support@Deepus.com<br>
                        Website: www.Deepus.com
                    </div>
                </div>
            </div>
            
                            <div class="invoice-title">
                    <h1>INVOICE</h1>
                    <div class="invoice-number">#<?= htmlspecialchars($order['ma_donhang'] ?? 'N/A') ?></div>
                    <div class="invoice-date">Date: <?= 
                        isset($order['ngaylap']) && !empty($order['ngaylap']) 
                            ? date('d/m/Y', strtotime($order['ngaylap'])) 
                            : 'N/A' 
                    ?></div>
                    <div class="invoice-status">Status: <?= htmlspecialchars($order['trangthai'] ?? 'N/A') ?></div>
                </div>
        </div>
        
        <div class="invoice-body">
            <div class="bill-to">
                <h3>Bill To:</h3>
                <p><strong><?= htmlspecialchars($order['tendat'] ?? 'N/A') ?></strong></p>
                <p><?= htmlspecialchars($order['diachidat'] ?? 'N/A') ?></p>
                <p>Email: <?= htmlspecialchars($order['emaildat'] ?? 'N/A') ?></p>
                <p>Phone: <?= htmlspecialchars($order['sdtdat'] ?? 'N/A') ?></p>
            </div>
            
            <div class="ship-to">
                <h3>Ship To:</h3>
                <p><strong><?= htmlspecialchars($order['tennhan'] ?? $order['tendat'] ?? 'N/A') ?></strong></p>
                <p><?= htmlspecialchars($order['diachinhan'] ?? $order['diachidat'] ?? 'N/A') ?></p>
                <p>Email: <?= htmlspecialchars($order['emailnhan'] ?? $order['emaildat'] ?? 'N/A') ?></p>
                <p>Phone: <?= htmlspecialchars($order['sdtnhan'] ?? $order['sdtdat'] ?? 'N/A') ?></p>
            </div>
        </div>
        
        <table class="products-table">
        <thead>
            <tr>
                    <th>Product Description</th>
                    <th>Qty</th>
                    <th>Unit Price</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <?php 
            $subtotal = 0;
            foreach ($order_items as $item): 
                $item_total = $item['price'] * $item['soluong'];
                $subtotal += $item_total;
                // Ensure product name exists, fallback to product ID if not
                $product_name = isset($item['product_name']) && !empty($item['product_name']) 
                    ? $item['product_name'] 
                    : 'Product ID: ' . $item['id_product'];
            ?>
                <tr>
                    <td class="product-name"><?= htmlspecialchars($product_name) ?></td>
                    <td class="quantity"><?= intval($item['soluong']) ?></td>
                    <td class="price">₹<?= number_format($item['price'], 0, '.', ',') ?></td>
                    <td class="total">₹<?= number_format($item_total, 0, '.', ',') ?></td>
            </tr>
        <?php endforeach; ?>
        </tbody>
    </table>
        
        <div class="invoice-summary">
            <table class="summary-table">
                <tr>
                    <td class="label">Subtotal:</td>
                    <td class="value">₹<?= number_format($subtotal, 0, '.', ',') ?></td>
                </tr>
                <?php 
                $discount_amount = $subtotal - $order['tongtien'];
                if ($discount_amount > 0): 
                ?>
                <tr>
                    <td class="label">Discount:</td>
                    <td class="value">-₹<?= number_format($discount_amount, 0, '.', ',') ?></td>
                </tr>
                <?php endif; ?>
                <tr class="total-row">
                    <td class="label">Grand Total:</td>
                    <td class="value">₹<?= number_format($order['tongtien'], 0, '.', ',') ?></td>
                </tr>
            </table>
        </div>
        
        <div class="invoice-footer">
            <div class="footer-content">
                <div class="footer-section">
                    <h4>Payment Terms</h4>
                    <p>Net 30 days</p>
                    <p>Payment due upon receipt</p>
                </div>
                <div class="footer-section">
                    <h4>Thank You!</h4>
                    <p>We appreciate your business</p>
                    <p>Your satisfaction is our priority</p>
                </div>
                <div class="footer-section">
                    <h4>Business Hours</h4>
                    <p>Mon-Fri: 9:00 AM - 6:00 PM</p>
                    <p>Sat: 10:00 AM - 4:00 PM</p>
                </div>
            </div>
            <div class="copyright">
                <p>&copy; <?= date('Y') ?> Deepus. All rights reserved. | Fashion for Everyone</p>
            </div>
        </div>
</div>
</body>
</html>
