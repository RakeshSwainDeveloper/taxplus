<footer class="footer">
    <div class="footer-container">
        <div class="footer-brand">
            <h3>CAPITAL TAX PLUS</h3>
            <p>Your trusted partner in smart tax planning and financial growth.</p>
        </div>

        <div class="footer-links">
            <div class="footer-section">
                <h4>Navigation</h4>
                <ul>
                    <li><a href="{{ url('/') }}">Home</a></li>
                    <li><a href="{{ url('/about') }}">About Us</a></li>
                    <li><a href="{{ url('/services') }}">Services</a></li>
                    <li><a href="{{ url('/contact') }}">Contact</a></li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Contact</h4>
                <ul>
                    <li>
                        <i class="bi bi-envelope-fill"></i>
                        <a href="mailto:info@capitaltaxplus.com">info@capitaltaxplus.com</a>
                    </li>
                    <li>
                        <i class="bi bi-telephone-fill"></i>
                        <a href="tel:1234567880">123-456-7880</a>
                    </li>
                </ul>
            </div>

            <div class="footer-section">
                <h4>Location</h4>
                <ul>
                    <li>
                        <i class="bi bi-geo-alt-fill"></i>
                        <span>123 Finance Street,<br>New York, NY 10001</span>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <div class="footer-bottom">
        <p>© {{ date('Y') }} Capital Tax Plus. All rights reserved.</p>
    </div>
</footer>
