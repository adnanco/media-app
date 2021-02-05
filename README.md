## Ödev Hakkında

Person ve Address tablolarıyla Laravel Repository Pattern kalıbına uygun web ve restfull api geliştirmesi yapmaya çalıştım. Seo'ya uygun olması adına başlıca kullanılan meta taglerini yerleştirdim.

### 1. Kısım
Verilen ödev dökümanlarında her bir opsiyonu dikkatle inceleyerek projeme dahil etmeye çalıştım. Database işlemleri için Sqlite kurup tablo ilişkilerim için Eloquent (ORM) yapısı ile ilerledim. Sayfalara çok yük bindirmemek adına cache mekanizması olarak Redis'i kullandım. 

#### Projeye dahil kullanılan opsiyonlar

- Sqlite
- Redis

#### Site tasarımına yardımcı olması adına;

- Bootstrap 5
- Jquery
- Scss

Asetlerin küçültmesi ve birleştirmesi adına Laravel Mix 


### 2. Kısım

Bu kısımda git üzerinde yeni bir branch oluşturulup yaptığım projeyi yönetim paneline benzemesi ve rest api giriş kontrollerinin sağlanması için Laravel Breeze ile üyelik kayıtı ve girişi sayfalarını ekledim. Rest Api çalıştırılmasını kolaylaştırmak adına girişte Access Token bilgisini oluşturup bellir bir süre cache atayarak ekrana yazdırdım.

Restful Apileri için Postman collection dosyası public klasörü altında yer alıyor.

- [Postman Collection](http://localhost/Medya App.postman_collection.json)
- [Postman Environment](http://localhost/Test Ortamı.postman_environment.json)

Bu kısımda yer alan opsiyonlardan olan RabbidMQ ile ip ve tarihi loglama kısmını yetiştiremedim.

Proje bütün hali ile secondary branch'ında yer alıyor, son işlemler olarak onu dikkate alırsanız çok mutlu olurum :)

## Kurulum

Projey'i geliştirmek için windows üzerinde Docker kurulumu yaptım. Eğer pc'nizde docker yüklü değilse aşağıda bulunan linkten indirebilirsiniz.

[Docker Yükleme](https://www.docker.com/products/docker-desktop)

Projeyi ayağa kaldırmak için terminal üzerinde ana dizinde aşağıda ki komutların çalıştırılması yeterli olacaktır

composer install

./vendor/bin/sail up


