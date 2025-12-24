@extends('layouts.public')

@section('title', 'Hubungi LKP Abqary - Konsultasi & Pendaftaran')

@section('content')
    <div class="container" style="padding: 60px 20px;">
        <div class="section-title">
            <h2>Mulai Langkah Suksesmu Hari Ini</h2>
            <p>Konsultasikan kebutuhan belajarmu atau langsung mendaftar melalui form di bawah ini. Tim kami siap
                membantumu.</p>
        </div>

        <div class="contact-grid"
            style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 40px;">
            <div class="contact-info">
                <h3>Informasi Kontak</h3>
                <div style="margin-top: 20px;">
                    <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                        <div style="font-size: 1.5rem;">📍</div>
                        <div>
                            <strong>Alamat</strong><br>
                            Jl. H. Mawi Desa Waru Jaya (Depan SMAN 1 Parung) ,<br>
                            Kec. Parung, Kab. Bogor
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                        <div style="font-size: 1.5rem;">📞</div>
                        <div>
                            <strong>Telepon / WhatsApp</strong><br>
                            <a href="https://wa.me/6285719255031?text=Halo%20Admin%20LKP%20Abqary%20Indonesia%2C%20saya%20ingin%20bertanya%20mengenai%20program%20dan%20pendaftaran."
                                target="_blank" style="color: var(--primary-color); font-weight: 600;">+62 857-1925-5031</a>
                        </div>
                    </div>
                    <div style="display: flex; gap: 15px; margin-bottom: 20px;">
                        <div style="font-size: 1.5rem;">✉️</div>
                        <div>
                            <strong>Email</strong><br>
                            generasipembaharuanindonesia@gmail.com
                        </div>
                    </div>
                </div>

                <!-- Google Maps Embed -->
                <div
                    style="margin-top: 20px; border-radius: 8px; overflow: hidden; box-shadow: 0 4px 6px rgba(0,0,0,0.05);">
                    <iframe src="https://maps.google.com/maps?q=-6.4369602,106.7106139&z=17&hl=id&output=embed" width="100%"
                        height="250" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"></iframe>
                </div>
            </div>

            <div class="contact-form-container"
                style="background: #fff; padding: 30px; border-radius: 12px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); border: 1px solid #e5e7eb;">
                <h3>Form Pendaftaran</h3>
                <form id="registrationForm" onsubmit="sendToWhatsapp(event)" style="margin-top: 20px;">
                    <div style="margin-bottom: 15px;">
                        <label for="name" style="display: block; margin-bottom: 5px; font-weight: 600;">Nama Lengkap</label>
                        <input type="text" id="name" name="name"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label for="email" style="display: block; margin-bottom: 5px; font-weight: 600;">Email</label>
                        <input type="email" id="email" name="email"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <label for="phone" style="display: block; margin-bottom: 5px; font-weight: 600;">No. HP /
                            WhatsApp</label>
                        <input type="tel" id="phone" name="phone"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;" required>
                    </div>
                    <div style="margin-bottom: 20px;">
                        <label for="address" style="display: block; margin-bottom: 5px; font-weight: 600;">Alamat</label>
                        <textarea id="address" name="address" rows="3"
                            style="width: 100%; padding: 10px; border: 1px solid #d1d5db; border-radius: 6px;"
                            required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary" style="width: 100%;">Kirim ke WhatsApp</button>
                </form>

                <script>
                    function sendToWhatsapp(e) {
                        e.preventDefault();

                        const name = document.getElementById('name').value;
                        const email = document.getElementById('email').value;
                        const phone = document.getElementById('phone').value;
                        const address = document.getElementById('address').value;

                        const message = `Halo Admin, saya ingin mendaftar dengan data berikut:%0A` +
                            `Nama: ${name}%0A` +
                            `Email: ${email}%0A` +
                            `No HP: ${phone}%0A` +
                            `Alamat: ${address}`;

                        const whatsappUrl = `https://wa.me/6285719255031?text=${message}`;

                        window.open(whatsappUrl, '_blank');
                    }
                </script>
            </div>
        </div>
    </div>
@endsection