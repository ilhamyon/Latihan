<?php
header("Content-type: application/octet-stream");
header("Content-Disposition: attachment; filename=kegiatan eselon.xls");//ganti nama sesuai keperluan
header("Pragma: no-cache");
header("Expires: 0");
//disini script laporan anda
?>
 
<h4>Kegiatan Eselon II</h4>



				<table border="1" id="table" style="font-size:12px">
                  <thead>
                    <tr>
                      <th width="3%">No</th>
                      <th>Hari</th>
                      <th>Tanggal</th>
                      <th>Tempat</th>
                      <th width="20%">Acara</th>
                      <th>Jam</th>
                      <th>Disposisi</th>
                      <th>No Undangan</th>
                      <th>Pejabat</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no=1; foreach($data as $row){?>
                    <tr>
                      <td align="center"><?php echo $no;?></td>
                      <td><?php echo ucwords($row['hari']);?></td>
                      <td align="center" width="10%"><?php if($row['tgl_akhir']==null or $row['tgl_akhir']=='0000-00-00'){
                                        echo date('d M Y',strtotime($row['tgl_awal']));
                                      }else{ 
                                        if(date('F y',strtotime($row['tgl_awal']))==date('F y',strtotime($row['tgl_akhir']))){
                                              echo date('d',strtotime($row['tgl_awal']))." - ".date('d M y',strtotime($row['tgl_akhir'])) ;
                                            }else{ 
                                              echo date('d M y',strtotime($row['tgl_awal']))." - ".date('d M y',strtotime($row['tgl_akhir']));
                                              } 
                                          }?></td>
                      <td><?php if($row['tempat']==null){echo ucwords($row['tl']);}else{echo ucwords($row['tempat']);}?></td>
                      <td align="justify"><?php echo ucfirst($row['acara']);?></td>
                      <td><?php echo $row['jam'];?></td>
                      <td><?php echo ucwords($row['disposisi']);?></td>
                      <td><?php echo $row['no_undangan'];?></td>
                      <td><?php echo ucwords($row['penyelenggara']);?></td>
                      
                    </tr>
                    <?php $no++;}?>
                  </tbody>
                </table>