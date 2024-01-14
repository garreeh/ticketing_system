<div class="modal fade" id="add_item" tabindex="-1" data-backdrop="false" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="background-color:whitesmoke">
            <div class="modal-header">
                <h4 align="left">Add new item </h4>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

            </div>

            <div class="form-group col-md-12" id="msgs"></div>
            <form method="post">
                <?php include "../controllers/add_item_process.php" ?>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group col-md-6">
                            <strong><label for="item_name">Name of item:<small>(do not put special characters - !@#$%^&*()_+-)</small></label></strong>
                            <input type="text" name="item_name" class="form-control form-control-sm" id="item_name" value="" placeholder="" required />
                        </div>
                        <div class="form-group col-md-6">
                            <strong><label for="item_barcode">Code</label></strong>
                            <input type="text" name="item_barcode" class="form-control form-control-sm" id="item_barcode" value="" placeholder="" required />
                        </div>
                    </div>

                    </hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <strong><label for="item_cost">Cost:</label></strong>
                            <input type="text" name="item_cost" class="form-control form-control-sm" id="item_cost" value="" placeholder="" required />
                        </div>


                        <div class="form-group col-md-4">
                            <strong><label for="item_selling_price">Selling Price:</label></strong>
                            <input type="text" name="item_selling_price" class="form-control form-control-sm" id="item_selling_price" value="" placeholder="" required />
                        </div>


                        <div class="form-group col-md-4">
                            <strong><label for="item_category_id">Item category:</label></strong>
                            <select name="item_category_id" class="form-control">
                                <option></option>

                                <?php
                                require_once '../connections/connections.php';
                                $sql = "SELECT  * FROM  item_category";
                                $result = $conn->query($sql);
                                while ($row = $result->fetch_array()) {
                                    echo "<option value=\"" . htmlspecialchars($row['item_category_id']) . "\">" . $row['item_category'] . "</option>";
                                }
                                ?>


                            </select>

                        </div>
                    </div>

                    <hr>
                    <div class="row">
                        <div class="form-group col-md-4">
                            <strong><label for="reoder_level">Reorder level:</label></strong>
                            <input type="text" name="reoder_level" class="form-control form-control-sm" id="reoder_level" value="" placeholder="" required />
                        </div>


                        <div class="form-group col-md-4">
                            <strong><label for="reoder_quantity">Reorder quantity:</label></strong>
                            <input type="text" name="reoder_quantity" class="form-control form-control-sm" id="reoder_quantity" value="" placeholder="" required />
                        </div>


                        <div class="form-group col-md-4">
                            <strong><label for="item_details">Details:</label></strong>
                            <textarea class="form-control" name="item_details" rows="3" placeholder=""></textarea>
                        </div>
                    </div>




                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn btn-primary" value="Save" id="add_item_submit" name="add_item_submit" />
                    <button type="button" class="btn btn btn-danger" data-dismiss="modal">Close</button>
                </div>
            </form>
        </div>
    </div>
</div>