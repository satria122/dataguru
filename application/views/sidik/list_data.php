<?php
            foreach ($dataSidik5 as $sidik) {
              ?>
              <tr>
				<td><?php echo $sidik->nip; ?></td>
                <td style="min-width:100px;"><?php echo $sidik->nama; ?></td>
                <td><?php echo $sidik->jabatan; ?></td>
                <td class="text-center" style="min-width:200px;"><!-- style for lebar kolom -->
					<button class="btn btn-warning btn-sm update-dataSidik" data-nip="<?php echo $sidik->nip; ?>"><i class="glyphicon glyphicon-repeat"></i> Update</button>
					<button class="btn btn-danger btn-sm konfirmasiHapus-sidik" data-nip="<?php echo $sidik->nip; ?>" data-toggle="modal" data-target="#konfirmasiHapus"><i class="glyphicon glyphicon-remove-sign"></i> Delete</button>
				</td>
              </tr>
              <?php
            }
 ?>