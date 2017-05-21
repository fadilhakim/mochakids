<div id="order_list">
	<h2> Order </h2>
	
    <table class="table table-bordered table-striped" id="datatable-keytable">
                                    <thead>
                                        <th> ID Order </th>
                                        <th> Name </th>
                                        <th> Grand Total </th>
                                        <th> Status </th>
                                        <th> Create Date </th>
                                        <th> Detail </th>
                                    </thead>
                                    
                                    <tbody>
                                       <?php
										foreach($list_order as $row){
											
											$user = $this->model_user->get_user_detail($row["id_user"]);
									   ?>
                                       <tr>
                                        <td>#<?=$row["id_order"]?>  </td>
                                        <td><?=$user["contact_person"]?>  </td>
                                        <td><?=number_format($row["grand_total"])?> </td>
                                        <td><?=$row["status"]?>  </td>
                                        <td><?=$row["create_date"]?>  </td>
                                        <td><a class="btn btn-primary" href="<?=base_url("profile/order/detail/$row[id_order]")?>"> View </a></td>
                                       </tr>
                                       <?php
										}
									   ?>
                                    </tbody>
                                    
                                </table>
    
</div>