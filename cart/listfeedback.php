<div class="container">
    <div class="row">
        <div class="col-lg-12" style="margin-top: 50px; margin-bottom:20px;">
            <table class="timetable_sub">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Order untuk acara</th>
                        <th>tanggal order</th>
                        <th>action</th>
                    </tr>
                </thead>

                <tbody>
                    <?php
                    $sql = "SELECT o.*, f.order_id as p FROM `orders` as o LEFT JOIN feedback as f ON f.ordeR_id = o.order_id WHERE o.customer_id = '" . $_SESSION['member_id'] . "'";
                    $query = mysqli_query($conn, $sql);
                    $no = 1;
                    foreach ($query as $keys => $row) {

                    ?>
                        <tr>
                            <td><?php echo $no++ ?>
                            </td>
                            <td><?php echo $row['nama_acara'] ?></td>
                            <td><?php echo $row['order_date'] ?></td>
                            <td> <?php if($row['p'] == !null){?>
                                Anda sudah memberikan feedback pada order ini
                            <?php }else{ ?>
                            <a href="../index.php?p=feedback&order_id=<?php echo $row['order_id'] ?>" class="btn btn-primary" id="<?php echo $row['cat_id']; ?>">Berikan feedback</a>
                            <?php }?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>

            </table>
        </div>
    </div>
</div>