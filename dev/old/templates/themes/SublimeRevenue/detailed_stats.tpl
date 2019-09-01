{*
    --------------------------------------------------------------------------------------------------------------
    iDevAffiliate HTML Front-End Template for traffic log - new - detailed stats
    --------------------------------------------------------------------------------------------------------------
    Theme Name: Admin Panel
    --------------------------------------------------------------------------------------------------------------
*}


    <div class="panel-group col-md-12 ">
        <div class="panel panel-default" style="border-color:{$portlet_3};">
            <div class="panel-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
                <h4 class="panel-title" style="color:{$portlet_3_text};" data-toggle="collapse" href="#30days-table">
                    Stats Table<span class="pull-right"><i class="fa fa-angle-down"></i></span>
                </h4>
            </div>
            <div id="30days-table" class="panel-collapse collapse in">
                
                <div class="table-scroll">
                    <table id='stats-chart' class="table table-bordered">
                        <thead>
                            <tr>
                        <th data-dyntable-column="date">Date</th>
                        <th data-dyntable-column="uniqueVisits" class="totalth" data-dynatable-sorts="uniqueVisits">Unique Visits</th>
                        <th data-dyntable-column="sales" class="totalth" data-dynatable-sorts="sales">Sales</th>
                        <th data-dyntable-column="salesRatio" class="ratio">Sales Ratio</th>
                        <th data-dyntable-column="earnings" class="totalth" data-dynatable-sorts="earnings">Earnings</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        </tbody>
<!-- TODO: totals
                <tfoot>
<tr>
<td>
<strong>Totals</strong>
</td>
</tr>
                </tfoot>
-->
                    </table>
                </div>
            </div>
        </div>
    </div>
