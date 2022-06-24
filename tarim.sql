CREATE TABLE `tarimsigorta`.`genelmudurluk` (
    `mudurluk_id` INT NOT NULL AUTO_INCREMENT,
    `mudurluk_ad` VARCHAR(50) NOT NULL,
    `mudurluk_soyad` VARCHAR(50) NOT NULL,
    `mudurluk_email` VARCHAR(50) NOT NULL,
    `mudurluk_numara` INT NOT NULL,
    'gmsifre' INT NOT NULL,
    PRIMARY KEY (`mudurluk_id`),
) ENGINE = InnoDB;

CREATE TABLE `tarimsigorta`.`eksper` (
    `eksper_id` INT NOT NULL AUTO_INCREMENT,
    `eksper_ad` VARCHAR(50) NOT NULL,
    `eksper_soyad` VARCHAR(50) NOT NULL,
    `eksper_email` VARCHAR(50) NOT NULL,
    `eksper_sifre` INT NOT NULL,
    `eksper_no` INT NOT NULL,
    'eksper_durum' VARCHAR(50) NOT NULL,
    PRIMARY KEY (`eksper_id`),
    `mudurluk_id` INT NOT NULL,
    FOREIGN KEY (`mudurluk_id`) REFERENCES `genelmudurluk`(`mudurluk_id`),
) ENGINE = InnoDB;

CREATE TABLE `tarimsigorta`.`musteri` (
    `musteri_id` INT NOT NULL AUTO_INCREMENT,
    `musteri_ad` VARCHAR(50) NOT NULL,
    `musteri_soyad` VARCHAR(50) NOT NULL,
    `musteri_email` VARCHAR(50) NOT NULL,
    `musteri_no` INT NOT NULL,
    `musteri_kullanıcıadi` VARCHAR(50) NOT NULL,
    `musteri_sifre` INT NOT NULL,
    `mudurluk_id` INT NOT NULL,
    FOREIGN KEY (`mudurluk_id`) REFERENCES `genelmudurluk`(`mudurluk_id`),
    PRIMARY KEY (`musteri_id`),
) ENGINE = InnoDB;

CREATE TABLE `tarimsigorta`.`tarla` (
    `tarla_id` INT NOT NULL AUTO_INCREMENT,
    `tarla_ad` VARCHAR(50) NOT NULL,
    `tarla_boyut` INT NOT NULL,
    `tarla_konum` VARCHAR(50) NOT NULL,
    `tarla_urun` VARCHAR(50) NOT NULL,
    `tarla_rapor` VARCHAR(50) NOT NULL,
    `tarla_prim` INT NOT NULL,
    `musteri_id` INT NOT NULL,
    `mudurluk_id` INT NOT NULL,
    'eksper_id' INT NOT NULL,
    PRIMARY KEY (`tarla_id`),
    FOREIGN KEY (`musteri_id`) REFERENCES `musteri`(`musteri_id`),
    FOREIGN KEY (`mudurluk_id`) REFERENCES `genelmudurluk`(`mudurluk_id`),
    FOREIGN KEY (`eksper_id`) REFERENCES `eksper`(`eksper_id`),
) ENGINE = InnoDB;

CREATE TABLE 'tarimsigorta'.'kullaniciHasari' (
    'ihbar_id' INT NOT NULL AUTO_INCREMENT,
    'tarla_adi' VARCHAR(50) NOT NULL,
    'hasar_nedeni' VARCHAR(100) NOT NULL,
    'hasar_durumu' VARCHAR(100) NOT NULL,
    'musteri_id' INT NOT NULL,
    'mudurluk_id' INT NOT NULL,
    PRIMARY KEY ('ihbar_id'),
    FOREIGN KEY (`musteri_id`) REFERENCES `musteri`(`musteri_id`),
    FOREIGN KEY (`mudurluk_id`) REFERENCES `genelmudurluk`(`mudurluk_id`),
) ENGINE = InnoDB;

CREATE TABLE 'tarimsigorta'.'hasarformu' (
    'rapor_id' INT NOT NULL AUTO_INCREMENT,
    'tarla_adi' VARCHAR(50) NOT NULL,
    'urun' VARCHAR(50) NOT NULL,
    'cinsi' VARCHAR(50) NOT NULL,
    'agac_basina_dusen_miktar' INT NOT NULL,
    'eksper_sebebi' VARCHAR(100) NOT NULL,
    'hasar_durum' INT NOT NULL,
    'eksper_id' INT NOT NULL,
    PRIMARY KEY ('rapor_id'),
    FOREIGN KEY (`eksper_id`) REFERENCES `eksper`(`eksper_id`),
) ENGINE = InnoDB;    
    
    
