-- public.m_satuan definition
CREATE TABLE public.m_satuan (
	satuan_id serial NOT NULL,
	nm_satuan varchar(15) NOT NULL,
	date_created timetz NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_updated timetz NULL,
	CONSTRAINT m_satuan_pkey PRIMARY KEY (satuan_id)
);
ALTER TABLE m_satuan ADD CONSTRAINT m_satuan_uniquekey UNIQUE (nm_satuan);

-- public.m_produk definition
CREATE TABLE public.m_produk (
	produk_id serial NOT NULL,
	kode varchar(7) NOT NULL,
	nm_produk varchar(50) NOT NULL,
	date_created timetz NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_updated timetz NULL,
	CONSTRAINT m_produk_pkey PRIMARY KEY (produk_id)
);
ALTER TABLE m_produk ADD CONSTRAINT m_produk_uniquekey UNIQUE (kode);

-- public.m_konversi definition
CREATE TABLE public.m_konversi (
	produk_id int NOT NULL,
	satuan_id int NOT NULL,
	konversi int NOT NULL DEFAULT 1,
	date_created timetz NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_updated timetz NULL,
	CONSTRAINT m_konversi_pkey PRIMARY KEY (produk_id, satuan_id)
);
-- public.m_konversi foreign keys
ALTER TABLE public.m_konversi ADD CONSTRAINT m_konversi_fkey1 FOREIGN KEY (produk_id) REFERENCES m_produk(produk_id);
ALTER TABLE public.m_konversi ADD CONSTRAINT m_konversi_fkey2 FOREIGN KEY (satuan_id) REFERENCES m_satuan(satuan_id);

-- public.m_gudang definition
CREATE TABLE public.m_gudang (
	gudang_id serial NOT NULL,
	nm_gudang varchar(25) NOT NULL,
	date_created timetz NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_updated timetz NULL,
	CONSTRAINT m_gudang_pkey PRIMARY KEY (gudang_id)
);
-- public.m_gudang unique
ALTER TABLE m_gudang ADD CONSTRAINT m_gudang_unique1 UNIQUE (nm_gudang);

DROP TYPE IF EXISTS movement;
CREATE TYPE movement AS ENUM ('IN','OUT');
-- public.m_mutasi definition
CREATE TABLE public.m_mutasi (
	mutasi_id serial NOT NULL,
	nm_mutasi varchar(15) NOT NULL,
	tipe movement default 'IN',
	date_created timetz NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_updated timetz NULL,
	CONSTRAINT m_mutasi_pkey PRIMARY KEY (mutasi_id)
);
-- public.m_mutasi unique
ALTER TABLE m_mutasi ADD CONSTRAINT m_mutasi_unique1 UNIQUE (nm_mutasi);

-- public.t_stok definition
CREATE TABLE public.t_stok (
	gudang_id int NOT NULL,
	produk_id int NOT NULL,
	qty int NOT NULL DEFAULT 0,
	date_created timetz NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_updated timetz NULL,
	CONSTRAINT t_stok_pkey PRIMARY KEY (gudang_id, produk_id)
);
-- public.t_stok foreign keys
ALTER TABLE public.t_stok ADD CONSTRAINT t_stok_fkey1 FOREIGN KEY (gudang_id) REFERENCES m_gudang(gudang_id);
ALTER TABLE public.t_stok ADD CONSTRAINT t_stok_fkey2 FOREIGN KEY (produk_id) REFERENCES m_produk(produk_id);


-- public.t_transaksi definition
CREATE TABLE public.t_transaksi (
	transaksi_id serial NOT NULL,
	gudang_id int NOT NULL,
	produk_id int NOT NULL,
	mutasi_id int NOT NULL,
	tanggal date NOT NULL,
	qty int NOT NULL DEFAULT 0,
	date_created timetz NOT NULL DEFAULT CURRENT_TIMESTAMP,
	date_updated timetz NULL,
	CONSTRAINT t_transaksi_pkey PRIMARY KEY (transaksi_id)
);
-- public.t_transaksi foreign keys
ALTER TABLE public.t_transaksi ADD CONSTRAINT t_transaksi_fkey1 FOREIGN KEY (gudang_id) REFERENCES m_gudang(gudang_id);
ALTER TABLE public.t_transaksi ADD CONSTRAINT t_transaksi_fkey2 FOREIGN KEY (produk_id) REFERENCES m_produk(produk_id);
ALTER TABLE public.t_transaksi ADD CONSTRAINT t_transaksi_fkey3 FOREIGN KEY (mutasi_id) REFERENCES m_mutasi(mutasi_id);



