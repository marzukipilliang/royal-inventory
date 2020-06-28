create database test
go

use test
go


create table t_mutasi_item_tahunan (kode varchar(7),tahun varchar(4),saldo_awal int);
insert into t_mutasi_item_tahunan values ('ORP0001','2018',3);
insert into t_mutasi_item_tahunan values ('ORP0002','2018',0);

create table m_item_stock (kode varchar(7),nama varchar(50),on_stock int);
insert into m_item_stock values ('ORP0001','SANMOL',10);
insert into m_item_stock values ('ORP0002','PANADOL',7);

create table m_mutasi_item_2018 (kode varchar(7),tgl_transaksi date,[in] int, [out] int, saldo_akhir int, keterangan varchar(200), jam_transaksi datetime);
insert into m_mutasi_item_2018 values
('ORP0001', '2018-01-01', 0, 0, 3, 'Saldo Awal Tahun 2018', '2018-01-01 00:00:00');

insert into m_mutasi_item_2018 values
('ORP0001','2018-01-02', 0, 2, 1, 'Transfer ke Depo ABC', '2018-01-02 15:00:00');

insert into m_mutasi_item_2018 values
('ORP0001', '2018-01-02', 2, 0, 3, 'Transfer dari Depo ABC', '2018-01-02 15:44:00');

insert into m_mutasi_item_2018 values
('ORP0001', '2018-01-05', 0, 4, -1, 'Pemakaian Pasien ABC', '2018-01-05 20:00:00');

insert into m_mutasi_item_2018 values
('ORP0001', '2018-01-05', 1, 0, 0, 'Transfer dari Depo CDE', '2018-01-05 20:00:01');

-- 2
insert into m_mutasi_item_2018 values
('ORP0002', '2018-01-01', 0, 0, 0, 'Saldo Awal Tahun 2018', '2018-01-01 00:00:00');

insert into m_mutasi_item_2018 values
('ORP0002', '2018-01-02', 0, 2, -2, 'Transfer ke Depo ABC', '2018-01-02 15:04:00');

insert into m_mutasi_item_2018 values
('ORP0002', '2018-01-02', 2, 0, 0, 'Transfer dari Depo ABC', '2018-01-02 15:44:12');

insert into m_mutasi_item_2018 values
('ORP0002', '2018-01-05', 0, 4, -4, 'Pemakaian Pasien ABC', '2018-01-05 20:00:00');

insert into m_mutasi_item_2018 values
('ORP0002', '2018-01-05', 1, 0, -3, 'Transfer dari Depo CDE', '2018-01-05 20:00:01');

insert into m_mutasi_item_2018 values
('ORP0002', '2018-01-05', 2, 0, 1, 'Transfer dari Depo ABC', '2018-01-05 20:50:23');



--- JAWABAN 
UPDATE t_mutasi_item_tahunan 
	SET saldo_awal=z.mutasi+n.on_stock
FROM t_mutasi_item_tahunan m
	JOIN (
			SELECT a.kode, CAST(a.tgl_transaksi AS VARCHAR(4)) AS tahun, SUM(a.[out]-a.[in]) AS mutasi
				FROM m_mutasi_item_2018 a
				GROUP BY a.kode, CAST(a.tgl_transaksi AS VARCHAR(4))
		)z ON z.kode=m.kode AND z.tahun=m.tahun
	JOIN m_item_stock n ON n.kode=z.kode
