<?php
/**
 * Created by PhpStorm.
 * User: Akshat
 * Date: 7/16/2017
 * Time: 1:05 PM
 */?>
<div class="container">
    <div class="row">
    <div class="col-lg-6">
        <p style="font-size: 20px" class="">Create Fees Heading</p>
        <?php echo form_open('fees/fees_head', ['class' => 'form-horizontal']); ?>
        <div class="form-group">
            <label for="inputText" class="col-lg-3 control-label">Fees Heading</label>
            <div class="col-lg-9">
                <?php echo form_input(['name' => 'fees_heading', 'class' => 'form-control',
                    'placeholder' => 'Enter Fees Heading',
                    'value' => set_value('fees_heading')]);
                ?>
                <?php echo form_error('fees_heading'); ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputText" class="col-lg-3 control-label">Group Name</label>
            <div class="col-lg-9">
                <?php
                $drop=array();
                foreach($view_drop_fhg as $r){
                    $drop[$r['fees_head_group_name']]=$r['fees_head_group_name'];
                }
                $attribute_class = [
                    'class' => 'form-control',
                    'id' => 'select',
                ];
                echo form_dropdown('group_name', $drop,'', $attribute_class);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputText" class="col-lg-3 control-label">Account Name</label>
            <div class="col-lg-9">
                <?php
                $drop=array();
                foreach($view_drop_anl as $r){
                    $drop[$r['account_name']]=$r['account_name'];
                }
                $attribute_class = [
                    'class' => 'form-control',
                    'id' => 'select',
                ];
                echo form_dropdown('account_name', $drop,'', $attribute_class);
                ?>
            </div>
        </div>
        <div class="form-group">
            <label for="inputText" class="col-lg-3 control-label">Frequency</label>
            <div class="col-lg-9">
                <select class="form-control" name="frequency">
                    <option value="annual">Annual</option>
                    <option value="bi_monthly">Bi Monthly</option>
                    <option value="half_yearly">Half Yearly</option>
                    <option value="monthly">Monthly</option>
                    <option value="one_time">One Time</option>
                    <option value="quaterly">Quaterly</option>
                    <option value="four_monthly">Four Monthly</option>
                    <option value="custom">Custom</option>
                </select>
            </div>
        </div>


        <?php echo form_submit(['name' => 'submit', 'value' => 'Save', 'class' => 'btn btn-info',
            'style' => 'margin-left:45px; margin-top:20px;']),
        form_reset(['name' => 'reset', 'value' => 'reset', 'class' => 'btn btn-warning',
            'style' => 'margin-top:20px;']); ?>


    </div>
    <div class="col-lg-6">
        <div class="checkbox">
            <label>
                <input  type="checkbox" value="jan" class="monthly quaterly"> Jan
            </label><br>
            <label>
                <input type="checkbox" value="feb" class="monthly bi_monthly"> Feb
            </label><br>
            <label>
                <input type="checkbox" value="mar" class="monthly"> Mar
            </label><br>
            <label>
                <input type="checkbox" value="apr" class="monthly quaterly four_monthly half_yearly annual bi_monthly one_time"> Apr
            </label><br>
            <label>
                <input type="checkbox" value="may" class="monthly"> May
            </label><br>
            <label>
                <input type="checkbox" value="jun" class="monthly bi_monthly"> Jun
            </label><br>
            <label>
                <input type="checkbox" value="jul" class="monthly quaterly"> Jul
            </label><br>
            <label>
                <input type="checkbox" value="aug" class="monthly four_monthly bi_monthly"> Aug
            </label><br>
            <label>
                <input type="checkbox" value="sep" class="monthly"> Sep
            </label><br>
            <label>
                <input type="checkbox" value="oct" class="monthly quaterly half_yearly bi_monthly"> Oct
            </label><br>
            <label>
                <input type="checkbox" value="nov" class="monthly"> Nov
            </label><br>
            <label>
                <input type="checkbox" value="dec" class="monthly four_monthly bi_monthly"> Dec
            </label>
        </div>
    </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <table class="table table-hover ">
                <thead>
                <tr class="info">
                    <th>Fees Heading</th>
                    <th>Group</th>
                    <th>Account</th>
                    <th>Frequency</th>
                    <th>Jan</th>
                    <th>Feb</th>
                    <th>Mar</th>
                    <th>Apr</th>
                    <th>May</th>
                    <th>Jun</th>
                    <th>Jul</th>
                    <th>Aug</th>
                    <th>Sep</th>
                    <th>Oct</th>
                    <th>Nov</th>
                    <th>Dec</th>
                </tr>
                </thead>
                <tbody>
                <?php if (count($fhl)): ?>
                    <?php foreach ($fhl as $fees_head_det): ?>
                        <tr class="success">
                            <td><?php echo $fees_head_det->fees_heading ?></td>
                            <td><?php echo $fees_head_det->group_name?></td>
                            <td><?php echo $fees_head_det->account_name ?></td>
                            <td><?php echo $fees_head_det->frequency ?></td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td>No Records Found</td>
                    </tr>
                <?php endif; ?>
                </tbody>
            </table>

        </div>
    </div>
</div>
<script>
$(document).ready(function() {
$("select[name='frequency']").change(function() {
// Get the value selected (convert spaces to underscores for class selection)
var value = $(this).val().replace(' ', '_');

// Clear checks, then check boxes that have class "value"
$(":checkbox").prop("checked",false).filter("."+value).prop("checked",true);
});
});</script>