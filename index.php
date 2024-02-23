<?php include('./connect.php') ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

    <title>EOC PM2.5</title>
</head>

<body class="mx-5 p-5">
    <section>
        <div class=" mt-4">
            <div class="text-center mb-5">
                <h3>รายงานผลกระทบต่อสุขภาพของประชาชน 7 กลุ่มโรค โรงพยาบาลสมเด็จ</h3>
            </div>

                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th>โรคหลอดลมอุดกั้น(J44)ER</th>
                                <th>โรคหลอดลมอุดกั้น(J44)OPD</th>
                                <th>โรคหอบหืด(J45,J44.2)ER</th>
                                <th>รคหอบหืด(J45,J44.2)OPD</th>
                                <th>โรคหัวใจขาดเลือดแบบเฉลียบพลัน(I21,I24)ER</th>
                                <th>โรคหัวใจขาดเลือดแบบเฉลียบพลัน(I21,I24)OPD</th>
                                <th>กลุ่มโรคผิวหนังER</th>
                                <th>กลุ่มโรคผิวหนังOPD</th>
                                <th>โรคภาวะหัวใจขาดเลือดแบบเฉียบพลัน(I22)ER</th>
                                <th>โรคภาวะหัวใจขาดเลือดแบบเฉียบพลัน(I22)OPD</th>
                                <th>ลุ่มโรคตาอักเสบ(H10)ER</th>
                                <th>ลุ่มโรคตาอักเสบ(H10)OPD</th>
                                <th>การสัมผัสมลพิษในอากาศ(Z58.1)ER</th>
                                <th>การสัมผัสมลพิษในอากาศ(Z58.1)ER</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            // Get member rows 
                            $result = $conn->query("SELECT v1.vstdate,
                        SUM(CASE WHEN SUBSTR(pdx,1,3) in ('J44','J40','J441','J448','J449') AND v1.spclty IN (15) THEN 1 ELSE 0 END) AS 'ER1',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) in ('J44','J440','J441','J448','J449') AND v1.spclty Not IN (15) THEN 1 ELSE 0 END) AS 'OPD1',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) in ('J45','J450','J451','J452','J458','J459','J442') AND v1.spclty IN (15) THEN 1 ELSE 0 END) AS 'ER2',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) in ('J45','J450','J451','J452','J458','J459','J442') and v1.spclty Not IN (15) THEN 1 ELSE 0 END) AS 'OPD2',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('I21','I24') AND v1.spclty IN (15) THEN 1 ELSE 0 END) AS 'ER3',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('I21','I24') and v1.spclty Not IN (15) THEN 1 ELSE 0 END) AS 'OPD3',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('L30','L50') AND v1.spclty IN (15) THEN 1 ELSE 0 END) AS 'ER4',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('L30','L50') and v1.spclty Not IN (15) THEN 1 ELSE 0 END) AS 'OPD4',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('I22') AND v1.spclty IN (15) THEN 1 ELSE 0 END) AS 'ER5',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('I22') and v1.spclty Not IN (15) THEN 1 ELSE 0 END) AS 'OPD5',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('H10') AND v1.spclty IN (15) THEN 1 ELSE 0 END) AS 'ER6',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('H10') and v1.spclty Not IN (15) THEN 1 ELSE 0 END) AS 'OPD6',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('Z58') AND v1.spclty IN (15) THEN 1 ELSE 0 END) AS 'ER7',
                        SUM(CASE WHEN SUBSTR(pdx,1,3) IN ('Z58') and v1.spclty Not IN (15) THEN 1 ELSE 0 END) AS 'OPD7'
                        FROM vn_stat v1 
                        LEFT JOIN ovst v2 on v1.vn = v2.vn 
                        LEFT JOIN ovstist v3 on v2.ovstist = v3.ovstist
                        where v1.vstdate = CURRENT_DATE() AND v3.ovstist='01'       
                        GROUP BY v1.vstdate WITH ROLLUP;");
                            if ($result->num_rows > 0) {
                                $i = 0;
                                while ($row = $result->fetch_assoc()) {
                                    $i++;
                            ?>
                                    <tr>
                                        <td><?php echo $row['ER1']; ?></td>
                                        <td><?php echo $row['OPD1']; ?></td>
                                        <td><?php echo $row['ER2']; ?></td>
                                        <td><?php echo $row['OPD2']; ?></td>
                                        <td><?php echo $row['ER3']; ?></td>
                                        <td><?php echo $row['OPD3']; ?></td>
                                        <td><?php echo $row['ER4']; ?></td>
                                        <td><?php echo $row['OPD4']; ?></td>
                                        <td><?php echo $row['ER5']; ?></td>
                                        <td><?php echo $row['OPD5']; ?></td>
                                        <td><?php echo $row['ER6']; ?></td>
                                        <td><?php echo $row['OPD6']; ?></td>
                                        <td><?php echo $row['ER7']; ?></td>
                                        <td><?php echo $row['OPD7']; ?></td>
                                    </tr>
                                <?php }
                            } else { ?>
                                <tr>
                                    <td colspan="7">ไม่พบข้อมูล...</td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>

            <!-- Bootstrap JS (optional if you need JavaScript functionality) -->
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>

        </div>
    </section>
</body>

</html>