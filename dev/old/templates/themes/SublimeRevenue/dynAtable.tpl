<!-- TODO: table -->
<div class="panel-group col-md-12">
    <div class="panel panel-default" style="border-color:{$portlet_3};">
        <div class="panel-heading"  style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), {$portlet_3};">
            <h4 class="panel-title" style="color:{$portlet_3_text};" data-toggle="collapse" href="#30days-table">
                Stats Table

                <span class="pull-right">
                    <i class="fa fa-angle-down"></i>
                </span>
            </h4>
        </div>

        <div id="30days-table" class="panel-collapse collapse in">
            <table id="stats-chart" class="table table-bordered table-hover tc-table">
                <thead>
                        <th style="width:10%" data-dyntable-column="date">Date</th>
                        <th style="width:15%" data-dyntable-column="rawVisits" class="totalth" data-dynatable-sorts="rawVisits">Raw Visits</th>
                        <th style="width:15%" data-dyntable-column="uniqueVisits" class="totalth" data-dynatable-sorts="uniqueVisits">Unique Visits</th>
                        <th style="width:15%" data-dyntable-column="sales" class="totalth" data-dynatable-sorts="sales">Sales</th>
                        <th style="width:15%" data-dyntable-column="salesRatio" class="ratio">Sales Ratio</th>
                        <th style="width:15%" data-dyntable-column="earnings" class="totalth" data-dynatable-sorts="earnings">Earnings</th>
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
<!-- TODO: sum class totalth and sum class ratio divide by number of rows -->
<script>
var jsonData = `[
 {$chart_array|substr:0:-1}
  ]`;
var response = JSON.parse(jsonData);

$('#stats-chart').dynatable({
  features: {
    paginate: true,
    sort: true,
    pushState: true,
    search: true,
    recordCount: true,
    perPageSelect: true
  },
  dataset: {
    perPageDefault: 1,
    perPageOptions: [1,7,14,30,60,90],
    records: response
  },
  inputs: {
    queries: $('#stats-chart-date')
  }
});
</script>
        </div>
    </div>
</div>
