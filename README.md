# Cemre Gözde Uyar Kişisel Portfolyo  Websitesi

BİM472 İnternet ve Web Teknolojileri dersi kapsamında yapmış olduğum Kişisel Portfolyo Websitesi’dir.
Bu site, kişisel portfolyo projelerimi sergilemek için oluşturduğum bir web sitesidir. Amacım, yaptığım çalışmaları ve projeleri daha geniş bir kitleye ulaştırmak ve potansiyel işverenler veya işbirlikçilerle bağlantı kurmaktır.

## Özellikler
**Ana Sayfa:** Kısa bir tanıtım ve sitenin amacı.

**Hakkımda:** Detaylı bir biyografi.

**Portfolyo:** Tamamlanmış ve devam eden projeler hakkında detaylı bilgiler.

**İletişim:** Bana ulaşabileceğiniz ve mesaj gönderebileceğiniz bir ekran.

## Kullanılan Teknolojiler:
-	HTML
-	CSS
-	PHP

## Kütüphaneler ve Araçlar:
-	PHP Mailer
-	Google Fonts
-	Boxicons

## Ekran Görüntüleri:

Kullanıcı Girişi Yapılmadığında:
 
 ![alt text](/screenshots/image.png)
 ![alt text](/screenshots/image-1.png)
 ![alt text](/screenshots/image-2.png)
 ![alt text](/screenshots/image-3.png)
 ![alt text](/screenshots/image-4.png)
 ![alt text](/screenshots/image-5.png)
 ![alt text](/screenshots/image-6.png)

Kullanıcı kaydı oluşturulduğunda:

![alt text](/screenshots/image-7.png)

Kullanıcı varsa veya hatalı bir işlem varsa:

![alt text](/screenshots/image-8.png)
 
Kullanıcı giriş yaptıktan sonra açılan sayfa:

![alt text](/screenshots/image-9.png)
 
Bilgiler girilip Ekle tuşuna basıldığında proje başarıyla eklenirse:

![alt text](/screenshots/image-10.png)

Kullanıcı girişi yapıldıktan sonra diğer sayfalardaki Giriş kısmı yerine proje eklenen profil sayfasına yönlendirme yapılır:

![alt text](/screenshots/image-11.png)
 
İletişim sayfasında kullanıcı girişi fark etmeksizin iletilen mesaj bana mail olarak gönderilir:

![alt text](/screenshots/image-12.png)
![alt text](/screenshots/image-13.png)
![alt text](/screenshots/image-14.jpg)

Kullanıcı “admin” kullanıcı adı ile giriş yaparsa yalnızca bu kullanıcıya ait olan proje silme yetkisi vardır:

![alt text](/screenshots/image-15.png) 

## Kurulum
Eğer bu projeyi yerel olarak çalıştırmak isterseniz, aşağıdaki adımları takip edebilirsiniz:
### Gereksinimler
- PHP 7.4 veya daha yeni bir sürüm
- Bir web sunucusu (Apache, Nginx, Xampp vb.)

1. Bu repoyu klonlayın:
	```bash
	git clone https://github.com/cgozde/portfolio-website.git
2. Proje dizinine gidin:
	```bash
	cd [repository name]
3. PHPMailer indirin
	```bash
	git clone https://github.com/PHPMailer/PHPMailer.git
4. contact.php dosyasındaki gerekli ayarları değiştirin
	```bash
	$mail->isSMTP();
        $mail->Host = 'smtp.gmail.com'; //
        $mail->SMTPAuth = true;
        $mail->Username = 'birmail@gmail.com'; // mail adresinizi girin
        $mail->Password = 'birsifre'; //uygulama şifrenizi girin
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587; // SMTP bağlantı noktası

## İletişim
E-posta: cemreuyar0@gmail.com

Linkedin: www.linkedin.com/in/cemre-gozde-uyar