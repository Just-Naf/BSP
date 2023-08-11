$query2 = "SELECT setor.*, 
            SUM(sampah.harga_sampah) AS cek, 
            users.username,users.id_users,
            SUM(setor.jumlah_sampah)  AS jumlah_total, 
            SUM(setor.jumlah_sampah * sampah.harga_sampah) AS harga_total 
            FROM setor 
            INNER JOIN users ON  setor.id_users=users.id_users
            INNER JOIN sampah ON setor.id_sampah=sampah.id_sampah
            GROUP BY users.id_users;";