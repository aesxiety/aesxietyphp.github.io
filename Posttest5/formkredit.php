
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <link rel="stylesheet" href="./styles/styles-form.css" >
    <title>Form Pengajuan Kredit</title>
  </head>
  <body>
    <section class="container">
      <div class="logo-form"><img src="./assets/logo-toyota.png" alt=""></div>
      <div class="tagline-form">
        <h3>
          Selamat Datang di Promo Kredit Toyota!
        </h3>
        <h5>
            Rasakan sensasi berkendara dengan nyaman dan hemat bersama kami. 
            Dapatkan penawaran menarik untuk pembelian mobil Toyota Anda. 
            Promo istimewa dengan suku bunga rendah, cicilan ringan, dan tenor fleksibel. 
            Kami siap membantu Anda mewujudkan impian memiliki mobil Toyota idaman.
            Jangan lewatkan kesempatan ini, ajukan kredit sekarang dan raih mobil Toyota impian Anda! 
            Kami memberikan layanan terbaik untuk kepuasan pelanggan.
        </h5>
      </div>
      
      <form action="process.php" method="post" class="form">
          <div class="flex-container">
            <div class="left-form">
              <div class="input-box">
                  <label for="full-name">Full Name</label>
                  <input type="text" name="full-name" placeholder="Enter full name" required />
              </div>

                <div class="input-box">
                <label for="email">Email Address</label>
                <input type="text" name="email" placeholder="Enter email address" required />
                </div>
        
                <div class="input-box">
                    <label for="phone-number">Phone Number</label>
                    <input type="number" name="phone-number" placeholder="Enter phone number" required />
                </div>
          
                  <div class="select-box">
                      <label for="car-type">Tipe Mobil</label>
                      <select name="car-type" id="car-type">
                          <option value="ALL NEW AGYA">ALL NEW AGYA</option>
                          <option value="NEW CALYA">NEW CALYA</option>
                          <option value="NEW RUSH">NEW RUSH</option>
                          <option value="ALL NEW AVANZA">ALL NEW AVANZA</option>
                          <option value="ALL NEW VELOZ">ALL NEW VELOZ</option>
                          <option value="NEW YARIS">NEW YARIS</option>
                          <option value="HIACE">HIACE</option>
                          <option value="ALL NEW YARIS CROSS">ALL NEW YARIS CROSS</option>
                          <option value="ALL NEW RAIZE">ALL NEW RAIZE</option>
                          <option value="ALL NEW ALPHARD-VOXY">ALL NEW ALPHARD-VOXY</option>
                          <option value="ALL NEW INOVA ZENIX">ALL NEW INOVA ZENIX</option>
                          <option value="NEW FORTUNER">NEW FORTUNER</option>
                          <option value="INOVA REBORN">INOVA REBORN</option>
                          <option value="NEW HILUX DOBEL CABIN">NEW HILUX DOBEL CABIN</option>
                          <option value="NEW HILUX SINGLE CABIN">NEW HILUX SINGLE CABIN</option>
                      </select>
                  </div>
          
              </div>
          
              <div class="right-form">
                <div class="select-box">
                  <label for="domisili">Kota/Kabupaten</label>
                  <select name="domisili" id="kabupaten">
                    <option value="">Pilih Kota/Kabupaten </option>
                    "Balikpapan", "Bontang", "Kabupaten Kutai Kartanegara","Kabupaten Kutai Timur","Samarinda"
                    <option value="Balikpapan">Balikpapan</option>
                    <option value="Bontang">Bontang</option>
                    <option value="Kabupaten Kutai Kartanegara">Kabupaten Kutai Kartanegara</option>
                    <option value="Kabupaten Kutai Timur">Kabupaten Kutai Timur</option>
                    <option value="Samarinda">Samarinda</option>
                    <!-- Tambahkan pilihan provinsi lainnya di sini -->
                  </select>
                </div>
                
                <div class="select-box">
                  <label for ="cabang">Cabang</label>
                  <select name="cabang" id="cabang">
                    <!-- Diisi oleh JavaScript -->
                  </select>
                </div>

                <div class="select-box">
                  <label for="metode-kredit">Total Dp</label>
                  <select name="metode-kredit" id="total-dp" >
                    <option value="cash">Pembayaran Cash</option>
                    <option value="15%">Dp 15%</option>
                    <option value="20%">Dp 20%</option>
                    <option value="30%">Dp 30%</option>
                  </select>
                </div>
              </div>
        </div>   
        <button type="submit" name="tambah">Submit</button>
      </form>
    </section>

    <script>
      const kabupatenSelect = document.getElementById("kabupaten");
      const cabangSelect = document.getElementById("cabang");
      
      const cabangData ={
        "Balikpapan": ["Auto200 Balikpapan MT Haryono", "Auto200 Balikpapan Sudirman"],
        "Bontang": ["Auto200 Bontang"],
        "Kabupaten Kutai Kartanegara": ["Auto200 Tenggarong"],
        "Kabupaten Kutai Timur": ["Auto200 Sangata"],
        "Samarinda": ["Auto200 Samarinda"],
        "Pontianak": ["Auto2000 Supadio Pontianak"],
        "Banjarmasin": ["Auto2000 Ahmad Yani Banjarmasin"]
      };

      // Event listener untuk perubahan pada select kabupaten
      kabupatenSelect.addEventListener("change", function () {
        const selectedKabupaten = kabupatenSelect.value;
        const cabangOptions = cabangData[selectedKabupaten] || [];

        // Kosongkan select cabang
        cabangSelect.innerHTML = '<option value="">Pilih Cabang</option>';

        // Isi select cabang dengan opsi yang sesuai
        cabangOptions.forEach((cabang) => {
          const option = document.createElement("option");
          option.value = cabang;
          option.textContent = cabang;
          cabangSelect.appendChild(option);
        });
      });
    </script>
  </body>
</html>