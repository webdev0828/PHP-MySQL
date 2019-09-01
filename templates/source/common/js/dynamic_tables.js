// MAJOR TODO: stats table child rows should load records on chunks as much as screen could fit, banners and links in offers table should be paginated
jQuery(function ($) {
    function getParameterByName(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^&#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }

    function getParameterByNamew(name) {
        name = name.replace(/[\[]/, "\\[").replace(/[\]]/, "\\]");
        var regex = new RegExp("[\\?&]" + name + "=([^?#]*)"),
            results = regex.exec(location.search);
        return results === null ? "" : decodeURIComponent(results[1].replace(/\+/g, " "));
    }
/*// Does not work because of column ordering method - FIX
// Pipelining function for DataTables. To be used to the `ajax` option of DataTables
//
    $.fn.dataTable.pipeline = function ( opts ) {
        // Configuration options
        var conf = $.extend( {
            pages: 10,    // number of pages to cache
            url: '',      // script url
            data: null,   // function or object with parameters to send to the server
                          // matching how `ajax.data` works in DataTables
            method: 'GET' // Ajax HTTP method
        }, opts );

        // Private variables for storing the cache
        var cacheLower = -1;
        var cacheUpper = null;
        var cacheLastRequest = null;
        var cacheLastJson = null;

        return function ( request, drawCallback, settings ) {
            var ajax          = false;
            var requestStart  = request.start;
            var drawStart     = request.start;
            var requestLength = request.length;
            var requestEnd    = requestStart + requestLength;

            if ( settings.clearCache ) {
                // API requested that the cache be cleared
                ajax = true;
                settings.clearCache = false;
            }
            else if ( cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper ) {
                // outside cached data - need to make a request
                ajax = true;
            }
            else if ( JSON.stringify( request.order )   !== JSON.stringify( cacheLastRequest.order ) ||
                JSON.stringify( request.columns ) !== JSON.stringify( cacheLastRequest.columns ) ||
                JSON.stringify( request.search )  !== JSON.stringify( cacheLastRequest.search )
            ) {
                // properties changed (ordering, columns, searching)
                ajax = true;
            }

            // Store the request for checking next time around
            cacheLastRequest = $.extend( true, {}, request );

            if ( ajax ) {
                // Need data from the server
                if ( requestStart < cacheLower ) {
                    requestStart = requestStart - (requestLength*(conf.pages-1));

                    if ( requestStart < 0 ) {
                        requestStart = 0;
                    }
                }

                cacheLower = requestStart;
                cacheUpper = requestStart + (requestLength * conf.pages);

                request.start = requestStart;
                request.length = requestLength*conf.pages;

                // Provide the same `data` options as DataTables.
                if ( typeof conf.data === 'function' ) {
                    // As a function it is executed with the data object as an arg
                    // for manipulation. If an object is returned, it is used as the
                    // data object to submit
                    var d = conf.data( request );
                    if ( d ) {
                        $.extend( request, d );
                    }
                }
                else if ( $.isPlainObject( conf.data ) ) {
                    // As an object, the data given extends the default
                    $.extend( request, conf.data );
                }

                settings.jqXHR = $.ajax( {
                    "type":     conf.method,
                    "url":      conf.url,
                    "data":     request,
                    "dataType": "json",
                    "cache":    false,
                    "success":  function ( json ) {
                        cacheLastJson = $.extend(true, {}, json);

                        if ( cacheLower != drawStart ) {
                            json.data.splice( 0, drawStart-cacheLower );
                        }
                        if ( requestLength >= -1 ) {
                            json.data.splice( requestLength, json.data.length );
                        }

                        drawCallback( json );
                    },
                    "error" : function(e){
                        window.location.reload();
                    }
                } );
            }
            else {
                json = $.extend( true, {}, cacheLastJson );
                json.draw = request.draw; // Update the echo for each response
                json.data.splice( 0, requestStart-cacheLower );
                json.data.splice( requestLength, json.data.length );

                drawCallback(json);
            }
        }
    };

// Register an API method that will empty the pipelined data, forcing an Ajax
// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
    $.fn.dataTable.Api.register( 'clearPipeline()', function () {
        return this.iterator( 'table', function ( settings ) {
            settings.clearCache = true;
        } );
    } );*/

    if ($('#dyntable_commission_list').length > 0) {
        $('#dyntable_commission_list').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_report.php?report=" + getParameterByName('report'),
            "bDeferRender": true,
            "aoColumnDefs": [{"bSortable": false, "aTargets": [4]}],
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }
        });
    }
    if ($('#dyntable_commission_list_subs').length > 0) {
        $('#dyntable_commission_list_subs').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_report.php?report=" + getParameterByName('report'),
            "bDeferRender": true,
            "aoColumnDefs": [{"bSortable": false, "aTargets": [4]}],
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });
    }
$(document).ready(function() {
    if ($('#dyntable_payment_history').length > 0) {
        $('#dyntable_payment_history').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_history.php?report=3",
            "bDeferRender": true,
            "aoColumnDefs": [{"targets": 'no-sort', "orderable": false}],
            "columns": [{ className: "date-column" },null,null,null],
            "aaSorting": [[0, "desc"]],
            "bFilter": false,
            "bResponsive": true,
            // "autoWidth": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "dom": "<'row'<'col-sm-6 col-sm-offset-6 text-right'l>><'selects'>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>>",
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            },
            "footerCallback": function ( row, data, start, end, display ) {
                if(this.api().rows().count() === 1)
                {
                    $("#dyntable_payment_history tfoot").hide();
                    return;
                }else{
                    $("#dyntable_payment_history tfoot").show();
                }
                var api = this.api(), data;

                // Remove the formatting to get integer data for summation
                var intVal = function ( i ) {
                    return typeof i === 'string' ?
                        i.replace(/[\€]/g, '') * 1 :
                        typeof i === 'number' ?
                            i : 0;
                };
                // Total over this page
                totalCommissions = api
                    .column(1, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                // Total over this page
                totalEarnings = api
                    .column(2, { page: 'current'} )
                    .data()
                    .reduce( function (a, b) {
                        return intVal(a) + intVal(b);
                    }, 0 );
                // Update footer
                $(api.column(1).footer()).html(
                    totalCommissions.toLocaleString(undefined, {minimumFractionDigits: 0, maximumFractionDigits: 0})
                );
                $( api.column(2).footer() ).html(
                    totalEarnings.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €"
                );
            }
        });
            $("div.selects").html('<script type="text/javascript">\
                                    $(document).ready(function() {\
                                    $("div.dataTables_length select").select2({minimumResultsForSearch: Infinity,placeholder: "'+ jstext.language.custom_show +'",allowClear: true});\
                                    });</script>');
    }
});
    $(document).ready(function() {
        if ($('#dyntable_Offers').length > 0) {
            var availableDevicesHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var availableOsHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var availableConnectionHtml='<option value="">'+jstext.language.custom_all+'</option>';
            // var availableCarrierHtml='<option value="">'+jstext.language.custom_all+'</option>';
            //var offer_id = "{$offer_id}"
            var offerstbl = $('#dyntable_Offers').DataTable({
                "dom": "<'row'<'col-sm-6'B<'offers-filter'><'form-group'<'col-sm-4'<'input-group input-group-bgr'f>>>><'col-sm-2 col-sm-offset-4 text-right'l>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>><'selects'>",
                "buttons":[{
                    "extend": "colvis",
                    "columns": ":gt(0)"
                }],
                //"oSearch": {"sSearch": offer_id},
                "searchHighlight": true,
                "bProcessing": true,
                "bServerSide": true,
                "sAjaxSource": "/templates/internals/core_ajax_offers.php",
                "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                    aoData.push({"name": "iOfferFilter", "value": $("#iOfferFilter").val()})
                    oSettings.jqXHR = $.ajax( {
                        "dataType": 'json',
                        "url": sSource,
                        "data": aoData,
                        "success": fnCallback,
                        "error": function(){
                            window.location.reload();
                        }
                    } );
                },
                "bDeferRender": true,
                "aoColumnDefs": [
                    {"type":"html-num-fmt","targets":[9]},
                    {"bVisible":false, "aTargets":[4, 5, 6, 7]},
                    {"width":"8px","aTargets":[0]},
                    {"bSortable": false, "aTargets":[0]},
                    {"className":"dt-body-left","aTargets":[0]},
                    {"className":"dt-body-right","aTargets":[9]}],
                "aaSorting": [[9, "desc"],[1, "asc"]],
                "bFilter": true,
                "bResponsive": true,
                "oLanguage": {
                    "sEmptyTable": langDataTable["sEmptyTable"],
                    "sInfo": langDataTable["sInfo"],
                    "sInfoEmpty": langDataTable["sInfoEmpty"],
                    "sInfoFiltered": langDataTable["sInfoFiltered"],
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": langDataTable["sLengthMenu"],
                    "sLoadingRecords": langDataTable["sLoadingRecords"],
                    "sProcessing": langDataTable["sProcessing"],
                    "sSearch": langDataTable["sSearch"],
                    "sZeroRecords": langDataTable["sZeroRecords"],
                    "oPaginate": {
                        "sFirst": langDataTable["sFirst"],
                        "sLast": langDataTable["sLast"],
                        "sNext": langDataTable["sNext"],
                        "sPrevious": langDataTable["sPrevious"]
                    },
                    "oAria": {
                        "sSortAscending": langDataTable["sSortAscending"],
                        "sSortDescending": langDataTable["sSortDescending"]
                    }
                },
                initComplete: function (oSettings,json) {
                    $.each(json.availableNiche,function (idx,niche) {
                        if (niche.niche !== '') {
                            $('#niche-filter').append('<option>' +niche.niche+ '</option>')
                        }
                    })
                    $.each(json.availableDevices,function (idx,devices) {
                        if (devices != '') {
                            availableDevicesHtml+='<option value="'+ devices+'">' + devices+ '</option>';
                        }
                    });
                    $('#devices-filter').html(availableDevicesHtml);
                    $.each(json.availableOs,function (idx,os) {
                        if (os !== '') {
                            availableOsHtml+='<option>' +os+ '</option>';
                        }
                    })
                    $('#os-filter').html(availableOsHtml);
                    $.each(json.availableConnection,function (idx,connection) {
                        if (connection !== '') {
                            availableConnectionHtml+='<option>' +connection+ '</option>';
                        }
                    })
                    $('#connection-filter').html(availableConnectionHtml);
                    // $.each(json.availableCarrier,function (idx,carriers) {
                    //     if (carriers !== '') {
                    //         availableCarrierHtml+='<option>' +carriers+ '</option>';
                    //     }
                    // })
                    // $('#carrier-filter').html(availableCarrierHtml);
                    $.each(json.availableFlow,function (idx,flow) {
                        if (flow !== '') {
                            $('#flow-filter').append('<option>' +flow+ '</option>')
                        }
                    })
                    $.each(json.allCountries,function (idx,country) {
                        if (country.country_code != '') {
                            $('#country-filter').append('<option value="'+country.country_code+'">'+country.country_name+'</option>')
                        }
                    })
                    $('div.dataTables_filter label').append('<i class="fa fa-search fa-fw" aria-hidden="true" style="text-shadow: none !important;"></i>')
                },
                drawCallback: function (settings) {
                    $('#dyntable_Offers tbody td:nth-child(2)').css('text-align','left')
                    $('#dyntable_Offers tbody td:nth-child(1)').css('padding','0')
                    $('#dyntable_Offers thead th:nth-child(1)').css('width','9px')
                    $('.data-tooltip').each(function () {
                        if ($(this).html() == "") {
                            $(this).remove()
                        }
                    })
                }
            }); 
            $("div.selects").html('<script type="text/javascript">\
                                    $(document).ready(function() {\
                                    $("#iOfferFilter").select2({minimumResultsForSearch: Infinity,placeholder: "'+jstext.language.custom_custom_offer_type+'",allowClear: true});\
                                    $("div.dataTables_length select").select2({minimumResultsForSearch: Infinity,placeholder: "'+ jstext.language.custom_show +'",allowClear: true});\
                                    });</script>');
            $('.offers-filter').html('<div class="col-sm-3">\
                        <select id="iOfferFilter" name="iOfferFilter" type="text" class="form-control" style="width:185px;z-index:5;margin:3px;margin-left:5px;">\
                            <option></option>\
                            <option value="0" selected="selected">'+jstext.language.custom_all+'</option>\
                            <option value="1">HOT</option>\
                            <option value="2">IN-HOUSE</option>\
                            <option value="3">'+jstext.language.custom_custom_running+'</option>\
                        </select></div>');
                    $('.offers-filter').on('change',function (aoData) {
                        offerstbl.draw()
                    })
            $('#dyntable_Offers').on( 'column-visibility.dt', function ( e, settings, column, state ) {
                if(column == 4){
                    $('#devices-filter').html(availableDevicesHtml);
                    $('#devices-filter').on('change',function () {
                        var keyword = $(this).val()
                        offerstbl.columns([4]).search(keyword).draw()
                    })
                }
                if(column == 5){
                    $('#os-filter').html(availableOsHtml);
                    $('#os-filter').on('change',function () {
                        var keyword = $(this).val()
                        offerstbl.columns([5]).search(keyword).draw()
                    })
                }
                if(column == 6){
                    $('#connection-filter').html(availableConnectionHtml);
                    $('#connection-filter').on('change',function () {
                        var keyword = $(this).val()
                        offerstbl.columns([6]).search(keyword).draw()
                    })
                }
                // if(column == 7){
                //     $('#carrier-filter').html(availableCarrierHtml);
                //     $('#carrier-filter').on('change',function () {
                //         var keyword = $(this).val()
                //         offerstbl.columns([7]).search(keyword).draw()
                //     })
                // }
            } );
            var offerDetailRows = [];
            function formatDetails ( d ) {
                $.ajax({
                    url: '/templates/internals/core_ajax_offers_detail.php?id=' + d[10], // TODO: pagination of promo tools
                    dataType:'json',
                    success: function (resp) {
                        var html = ''
                        html += ('<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse in"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4  data-toggle="collapse" data-target="#offer-details-'+d[10]+'"> \
                                        <span class="pull-right"> \
                                            <i class="fa fa-angle-down"></i> \
                                        </span> \
                                        <i class="fa fa-info-circle fa-fw"></i> '+jstext.language.custom_offer_details+' \
                                        </h4> \
                                    </div> \
                                    <div class="portlet-body collapse in" id="offer-details-'+d[10]+'"> \
                        <div class="form-horizontal"> \
                            <div class="form-group"> \
                                <div class="col-md-8"> \
                                    <div class="col-sm-12 offer-description"> \
                                    <strong class="subtitle">'+jstext.language.custom_niche+':</strong> '+resp.data.niche+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_countries+':</strong> '+resp.data.countries+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_devices+':</strong> '+resp.data.devices+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_os+':</strong> '+resp.data.os+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_connection_type+':</strong> '+resp.data.connection+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_mobile_carriers+':</strong> '+resp.data.carrier+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_flow_type+':</strong> '+resp.data.flow_type+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_payout+':</strong> '+resp.sub_payout_details+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_conversion_flow+':</strong> '+resp.data.conversion_flow+'<br />\
                                    <strong class="subtitle">'+jstext.language.custom_restrictions+':</strong> '+resp.data.restrictions+'<br /><br />\
                                    '+jstext.language.custom_need_more_creatives+' '+jstext.language.custom_please+' <a href="javascript:void(Tawk_API.toggle())"><strong>'+jstext.language.custom_contact_manager+'</strong></a> '+jstext.language.custom_for_discussion+'!\
                                    </div> \
                                </div> \
                                <div class="col-md-3" style="float:right;padding-right: 4rem;"> \
                                    <div class="col-sm-12 control-label"> \
                                        <div class="offer-imgs"> \
                                        <img src="/images/offers_thumbs/'+resp.data.offer_image+'" alt="'+resp.data.name+'" title="'+resp.data.name+'">\
                                        </div>\
                                    </div> \
                                </div> \
                            </div> \
                        </div> \
                                    </div> \
                                </div> \
                            </div>')
                        html += ('<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse"> \
                                    <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                        <div class="portlet-title" style="color:#ffffff;"> \
                                                <h4 data-toggle="collapse" data-target="#postbacksholder-'+d[10]+'"> \
                                            <span class="pull-right"> \
                                                <i class="fa fa-angle-down"></i> \
                                            </span> \
                                                <i class="fa fa-server fa-fw"></i> '+jstext.language.custom_sts_postback+' \
                                            </h4> \
                                        </div> \
                                        <div class="portlet-body collapse" id="postbacksholder-'+d[10]+'"> \
                                            <div class="row">\
                                                <div class="col-sm-auto">\
                                                    <button class="btn btn-primary" name="e_postback_set" type="submit" value="1"><i class="fas fa-plus-circle fa-fw"></i> '+jstext.language.custom_add_new+'</button>\
                                                </div>\
                                                <div class="col-sm-auto">\
                                                    <button class="btn btn-primary" name="e_postback_set" type="submit" value="0"><i class="fas fa-minus-circle fa-fw"></i> '+jstext.language.custom_remove+'</button>\
                                                </div>\
                                            </div>')
                                $.each(resp.offer_postbacks, function (idx, data) {
                                    if (data.state == 1) { var pbstate='checked'; } else { var pbstate=''; }
                                    if (data.method == 0) { var pbmethod0='selected="selected"'; } else { var pbmethod0=''; }
                                    if (data.method == 1) { var pbmethod1='selected="selected"'; } else { var pbmethod1=''; }
                                    if(!resp.offer_postbacks.count) { resp.offer_postbacks.count = 0; } resp.offer_postbacks.count++;
                                    var ancounter = resp.offer_postbacks.count;
                                    $("#ancount").text(ancounter);
                                        html += ('<div class="portlet-'+d[10]+'-'+data.id+'" style="border-color:#ECC4FF;"> <!-- TOOD: add/remove buttons should increment this element -->\
                                                    <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #532B72;"> \
                                                            <div class="portlet-title" style="color:#ffffff;"> \
                                                                <h4> \
                                                                    <i class="fa fa-link fa fw"></i> '+jstext.language.custom_offer+' '+d[10]+' - '+resp.data.name+' '+jstext.language.custom_action_notification+' <span id="ancount">#'+ ancounter +'</span> \
                                                                    <span class="pull-right">\
                                                                            <input style="display:none;" name="e_postback_set-'+data.id+'" type="submit" value="0">\
                                                                                <i class="far fa-times-circle fa-fw" title="'+jstext.language.custom_remove+'"></i>\
                                                                            </input>\
                                                                    </span>\
                                                                </h4> \
                                                            </div> \
                                                    </div> \
                                                    <div class="portlet-body"> \
                                                        <div class="row">\
                                                            <div class="form-group">\
                                                                <div class="col-sm-1">\
                                                                    <label class="switch">\
                                                                        <input name="e_postback_state-'+d[10]+'-'+data.id+'" type="checkbox" '+pbstate+'>\
                                                                        <span class="slider round"></span>\
                                                                    </label>\
                                                                </div>\
                                                                <div class="col-sm-1">\
                                                                    <select name="e_method-'+d[10]+'-'+data.id+'" class="method form-control" style="width:110%">\
                                                                        <option></option>\
                                                                        <option value="0" '+pbmethod0+'>GET</option>\
                                                                        <option value="1" '+pbmethod1+'>POST</option>\
                                                                    </select>\
                                                                </div>\
                                                                <div class="col-sm-auto col-sm-offset-8 text-right">\
                                                                    <button class="btn btn-primary" name="e_postback_set" type="submit" value="save">'+jstext.language.custom_save+'</button>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                                        <div class="form-group">\
                                                            <div class="col-sm-12" style="display:contents !important;">\
                                                                <div class="input-group input-group-bgp" style="width:100%"> <!-- TODO: css for the input would be nicer --> \
                                                                    <input style="height: 3.2rem !important;width: 95% !important;" type="url" class="form-control" name="e_postback_url" placeholder="'+data.postback_url+'" value="'+data.postback_url+'" id="e_postback_url" maxlength="2048">\
                                                                    <i class="fa fa-link fa fw" aria-hidden="true" style="text-shadow: none !important;width:auto !important;"></i>\
                                                                </div>\
                                                            </div>\
                                                        </div>\
                                        <!-- TODO: \
                                        TODO: \
                                        add ADD (+) and REMOVE (-) buttons - done but make them work \
                                        show current records from db \
                                        +- increment on each new action notification item and write to/delete from db on submit input button) \
                                        --> \
                                                    </div> \
                                                </div>')
                                });
                                    html += ('<script type="text/javascript">\
                                                $(document).ready(function() {\
                                                    $(".method").select2({minimumResultsForSearch: Infinity,placeholder: "'+jstext.language.custom_method+'",allowClear: true});\
                                                    });\
                                            </script>\
                                        </div> \
                                    </div> \
                                </div>')
                        html += ('<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4  data-toggle="collapse" data-target="#customization-'+d[10]+'"> \
                                        <span class="pull-right"> \
                                            <i class="fa fa-angle-down"></i> \
                                        </span> \
                                        <i class="fa fa-sliders-h fa-fw"></i> '+jstext.language.custom_link_customization+' \
                                        </h4> \
                                    </div> \
                                    <div class="portlet-body collapse" id="customization-'+d[10]+'"> \
                                        <ul class="list-group"> \
                                            <li class="list-group-item"> \
                                                <input class="tid select-selected" type="text" id="sub_id-'+d[10]+'" placeholder="'+jstext.language.custom_sub_id+'" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <input class="tid select-selected" type="text" id="tid-1-'+d[10]+'" placeholder="'+jstext.language.custom_tracking_id+' 1" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <input class="tid select-selected" type="text" id="tid-2-'+d[10]+'" placeholder="'+jstext.language.custom_tracking_id+' 2" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <input class="tid select-selected" type="text" id="tid-3-'+d[10]+'" placeholder="'+jstext.language.custom_tracking_id+' 3" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <input class="tid select-selected" type="text" id="tid-4-'+d[10]+'" placeholder="'+jstext.language.custom_tracking_id+' 4" maxlength="64"> \
                                            </li> \
                                            <li class="list-group-item"> \
                                                <button id="add_parameters-'+d[10]+'" name="submit" class="btn btn-primary"> \
                                                '+jstext.language.custom_apply_tracking+' \
                                                </button> \
                                            </li> \
                                        </ul> \
                                    </div> \
                                </div> \
                            </div>')
                        if(resp.link.length > 0) {
                            html += '<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4  data-toggle="collapse" data-target="#linksholder-'+d[10]+'"> \
                                        <span class="pull-right"> \
                                            <i class="fa fa-angle-down"></i> \
                                        </span> \
                                        <i class="fa fa-link fa-fw"></i> '+jstext.language.custom_links+' \
                                        </h4> \
                                    </div> \
                                    <div class="portlet-body collapse" id="linksholder-'+d[10]+'"> \
                            <div class="row">\
                            <div class="col-md-1">' + // TODO: add All option on filters
                                '<select style="width:100%;" class="link-type" id="landSelect'+d[10]+'"  onchange="filterLinks(' + d[10] + ',\'landChanged\')">' +
                                '<option value="" selected>'+jstext.language.custom_all+'</option>' +
                                '<option value="1">'+jstext.language.custom_landing+'</option>' +
                                '<option value="0">'+jstext.language.custom_pre_landing+'</option>' +
                                '</select><script>$(document).ready(function() { $(".link-type").select2({minimumResultsForSearch: Infinity,placeholder:"'+jstext.language.custom_filter_by_landing+'",allowClear:true}); });</script></div>';
                            if(resp.linktext.length >= 0) {
                                html += '<div class="col-md-2">';
                                html += '<select style="width:100%;" class="link-set" id="linktextSelect' + d[10] + '" onchange="filterLinks(' + d[10] + ',\'linktextChanged\')">';
                                html += '<option></option>';
                                html += '<option value="" selected>' + jstext.language.custom_all + '</option>';
                                $.each(resp.linktext, function (idx, c) {
                                    if (c != "") {
                                        html += '<option>' + c + '</option>';
                                    }
                                });
                                html += '</select><script>$(document).ready(function() { $(".link-set").select2({placeholder: "'+jstext.language.custom_filter_by_set+'",allowClear: true}); });</script></div>';
                            }
                            if(resp.countries.length >= 0) {
                                html += '<div class="col-md-auto">';
                                html += '<select style="width:100%" class="link-geo form-control" id="linkCountriesSelect' + d[10] + '" onchange="filterLinks(' + d[10] + ',\'countryChanged\')">';
                                html += '<option></option>';
                                html += '<option value="" selected>' + jstext.language.custom_all + '</option>';
                                $.each(resp.countries, function (idx, c) {
                                    if (c != "") {
                                        html += '<option>' + c + '</option>';
                                    }
                                });
                                html += '</select><script>$(document).ready(function() { $(".link-geo").select2({placeholder: "'+jstext.language.custom_custom_filter_by_geo+'",allowClear: true}); });</script></div>';
                            }

                            html += '</div>'; // TODO: Filter only HOT and Running, not important
                        }
                        html += '<div id="linksContainer'+d[10]+'">';
                        $.each(resp.link,function (idx,data) {
                            html += ('<div class="portlet banner-port" style="border-color: #ECC4FF;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #532B72;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4> ')
                            var epc=data.earnings / data.hits * 100;
                            var sr=data.conv / data.hits * 100;
                            if (resp.running_links.indexOf(data.id) >= 0) {
                            var running='<span class="badge running" title="'+jstext.language.custom_running_link+'"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                            if(epc >= 0.3 && sr >= 0.3){
                                html+='<span class="label label-success">HOT</span> '+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                            }
                            else{
                                html+=''+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                            }
                            html +=('     </h4> \
                                    </div> \
                                        <div class="portlet-body"><label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> \
                                            <textarea style="font-weight:normal !improtant;" id="direct-link-'+data.id+'" rows="1" class="form-control">'+data.direct_url+'</textarea> \
                                        </div> \
                                </div> \
                            </div>')
                            html += ('<script>$(document).ready(function () { \
                            $("#direct-link-'+data.id+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'!\\n'+jstext.language.custom_good_luck+'!"); \
                            }); \
                            $("#add_parameters-'+d[10]+'").click(function () { \
                                var params = []; \
                                params.push("sub_id=" + $("#sub_id-'+d[10]+'").val()); \
                                params.push("tid1=" + $("#tid-1-'+d[10]+'").val()); \
                                params.push("tid2=" + $("#tid-2-'+d[10]+'").val()); \
                                params.push("tid3=" + $("#tid-3-'+d[10]+'").val()); \
                                params.push("tid4=" + $("#tid-4-'+d[10]+'").val()); \
                                var params_text = "?" + params.join("&"); \
                                $("#direct-link-'+data.id+'").val("'+data.direct_url+'" + params_text);')
                            $.each(resp.banners,function (idx,data) {
                                html += 'var banner_url_' + data.number + ' = "' + data.lnk+'";'
                                var innerVal='<a href="'+data.lnk+'\'+ params_text+\'" target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>';
                                html += '$("#embed-'+data.grp+'-'+data.number+'").val(\''+innerVal+'\');'
                                html += 'var banner_direct_url_' + data.number + ' = "' + data.lnk+'";'
                                var innerVal2=''+data.lnk+'\'+ params_text+\'';
                                html += '$("#banner-direct-link-'+data.grp+'-'+data.number+'").val(\''+innerVal2+'\');'
                            });
                            html+= ('}); \
                        });</script>\
                        <script>$("input").on("keyup",function() {\
                        var maxLength = $(this).attr("maxlength");\
                        if(maxLength == $(this).val().length) {\
                        swal("'+jstext.language.custom_max_length_reached+'\\n'+jstext.language.custom_limit_is+' " + maxLength + "!")\
                        }\
                        })</script>')
                        });
                        html += '</div> \
                                </div> \
                            </div> \
                        </div>';
                        if(resp.banners.length > 0) {
                            html += '<div class="portlet banner-port" style="border-color: #532B72;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4  data-toggle="collapse" data-target="#bannerholder-'+d[10]+'"> \
                                        <span class="pull-right"> \
                                            <i class="fa fa-angle-down"></i> \
                                        </span> \
                                        <i class="fa fa-image fa-fw"></i> '+jstext.language.custom_banners+' \
                                        </h4> \
                                    </div> \
                                    <div class="portlet-body collapse" id="bannerholder-'+d[10]+'"> \
                            <div><div class="row">'
                            html += '<div class="col-md-2">';
                            // if(resp.description.length <= 1) {
                            //     html += ' style="display:none"';
                            // }
                            html += '<select style="width:100%;" class="banner-set form-control" id="descriptionSelect'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'descriptionChanged\')"';
                            // if(resp.description.length <= 1) {
                            //     // html += ' disabled';
                            // }
                            html += ' >';
                            html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                            if(resp.description.length > 0){
                                $.each(resp.description, function (idx, l) {
                                    if(l != ""){
                                        html += '<option>' + l + '</option>';
                                    }
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".banner-set").select2({placeholder:"'+jstext.language.custom_filter_by_set+'",allowClear:true}); });</script></div>';
                            html += '<div class="col-md-2">';
                            // if(resp.language.length <= 1) {
                            //     html += ' style="display:none"';
                            // }
                            html += '<select style="width:100%;" class="banner-language" id="languageSelect' + d[10] + '" onchange="filterBanners(' + d[10] + ',\'languageChanged\')"';
                            // if(resp.language.length <= 1) {
                            //     // html += ' disabled';
                            // }
                            html += ' >';
                            html += '<option value="" selected>' + jstext.language.custom_all + '</option>';
                            if(resp.language.length > 0) {
                                $.each(resp.language, function (idx, l) {
                                    if (l != "") {
                                        html += '<option>' + l + '</option>';
                                    }
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".banner-language").select2({minimumResultsForSearch: Infinity,placeholder:"'+jstext.language.custom_filter_by_language+'",allowClear:true}); });</script></div>';
                            html += '<div class="col-md-auto">';
                            // if(resp.size1.length <= 1) {
                            //     html += ' style="display:none"';
                            // }
                            html += '<select style="width:100%;" class="banner-width form-control" id="size1Select'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'size1Changed\')"';
                            // if(resp.size1.length <= 1) {
                            //     // html += ' disabled';
                            // }
                            html += ' >';
                            html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                            if(resp.size1.length > 0){
                                $.each(resp.size1, function (idx, s1) {
                                    html += '<option>' + s1 + '</option>';
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".banner-width").select2({minimumResultsForSearch: Infinity,placeholder:"'+jstext.language.custom_filter_by_width+'",allowClear:true}); });</script></div>';
                            html += '<div class="col-md-auto">';
                            // if(resp.size2.length <= 1) {
                            //     html += ' style="display:none"';
                            // }
                            html += '<select style="width:100%;" class="banner-height form-control" id="size2Select'+ d[10] +'" onchange="filterBanners(' + d[10] + ',\'size2Changed\')"';
                            if(resp.size2.length <= 1) {
                                // html += ' disabled';
                            }
                            html += ' >';
                            html += '<option value="" selected>'+jstext.language.custom_all+'</option>';
                            if(resp.size2.length > 0){
                                $.each(resp.size2, function (idx, s2) {
                                    html += '<option>' + s2 + '</option>';
                                });
                            }
                            html += '</select><script>$(document).ready(function() { $(".banner-height").select2({minimumResultsForSearch: Infinity,placeholder:"'+jstext.language.custom_filter_by_height+'",allowClear:true}); });</script></div>';
                            html += '</div>';
                        }
                        html += '<div id="bannersContainer'+d[10]+'">';
                        $.each(resp.banners,function (idx,data) {
                            html += '<div class="portlet banner-port" style="border-color: #ECC4FF;">'
                            html += '<div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #532B72;">'
                            html += '<div class="portlet-title">'
                            var epc=data.earnings / data.hits * 100;
                            var sr=data.conv / data.hits * 100;
                            if (resp.running_banners.indexOf(data.number) >= 0) {
                            var running='<span class="badge running" title="'+jstext.language.custom_running_banner+'"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                            if(epc >= 0.3 && sr >= 0.3){
                                html += ('<h4><span class="label label-success">HOT</span> '+resp.data.name+' '+data.description+' '+data.size1+'x'+data.size2+' ('+data.language+') '+running+' <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                            }
                            else{
                                html += ('<h4>'+resp.data.name+' '+data.description+' '+data.size1+'x'+data.size2+' ('+data.language+') '+running+' <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                            }
                            html += '</div>'
                            html += '</div>'
                            html += '<div class="portlet-body">'
                            html += '<ul class="list-group">'
                            html += '<li class="list-group-item">'
                            html += '<label style="width:100%">'
                            html += ('<img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" />')
                            html += '<br/><br/> <i class="fas fa-code fa-fw"></i> '+jstext.language.marketing_source_code
                            html += '</label>'
                            html += '<br/>'
                            html += '<textarea id="embed-'+data.grp+'-'+data.number+'" rows="2" class="form-control" style="font-weight:normal !important;">'
                            html += ('<a href="'+data.lnk+'" target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>')
                            html += '</textarea>'
                            html += '<br/>'
                            html +=('<label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> <textarea style="font-weight:normal !improtant;" id="banner-direct-link-'+data.grp+'-'+data.number+'" rows="1" class="form-control">'+data.lnk+'</textarea>')
                            html += '<br/>'
                            html += '<a href="//static.sublimerevenue.com/'+data.image+'" download><button class="btn btn-primary"><i class="fa fa-download"></i> '+jstext.language.custom_download+'</button></a>'
                            html += '</li>'
                            html += '</ul>'
                            html += '</div>'
                            html += '</div>'
                            html += ('<script>$(document).ready(function () { \
                            $("#embed-'+data.grp+'-'+data.number+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'!\\n'+jstext.language.custom_good_luck+'!"); \
                            }); \
                        })</script>')
                            html += ('<script>$(document).ready(function () { \
                            $("#banner-direct-link-'+data.grp+'-'+data.number+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'!\\n'+jstext.language.custom_good_luck+'!"); \
                            }); \
                        })</script>')
                        });
                        html += '</div> \
                                </div> \
                            </div> \
                        </div>';
                        $('#row-details-' + d[10]).html(html);

                    },
                    error: function () {
                        alert('Unable to fetch details.');
                    }
                })

                return '<div id="row-details-'+d[10]+'">'+langDataTable['sProcessing']+'</div>'
            }

            $('#devices-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([4]).search(keyword).draw()
            })
            $('#os-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([5]).search(keyword).draw()
            })
            $('#connection-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([6]).search(keyword).draw()
            })
            // $('#carrier-filter').on('change',function () {
            //     var keyword = $(this).val()
            //     offerstbl.columns([7]).search(keyword).draw()
            // })
            $('#niche-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([2]).search(keyword).draw()
            })
            $('#flow-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([8]).search(keyword).draw()
            })
            $('#country-filter').on('change',function () {
                var keyword = $(this).val()
                offerstbl.columns([3]).search(keyword).draw()
            })
            $('#dyntable_Offers tbody').on('click', 'tr .row-details-toggle', function () {
                $(this).toggleClass('open')
                var tr = $(this).closest('tr');
                var row = offerstbl.row( tr );
                var data = row.data();
                var idx = $.inArray( tr.attr('id'), offerDetailRows );

                if ( row.child.isShown() ) {
                    tr.removeClass( 'details' );
                    row.child.hide();

                    // Remove from the 'open' array
                    offerDetailRows.splice( idx, 1 );
                } else {
                    tr.addClass( 'details' );
                    row.child( formatDetails(data) ).show()

                    // Add to the 'open' array
                    if ( idx === -1 ) {
                        offerDetailRows.push( tr.attr('id') );
                    }
                }
            } );

            offerstbl.on( 'draw', function () {
                $.each( offerDetailRows, function ( i, id ) {
                    $('#'+id).trigger( 'click' );
                } );
            } );
        }
    });
    if ($('#dyntable_payment_Traffic').length > 0) {
        $('#dyntable_payment_Traffic').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_traffic.php?report=" + getParameterByNamew('page'),
            "bDeferRender": true,
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });
    }

    function unique(list) {
        var result = [];
        $.each(list, function(i, e) {
            if ($.inArray(e, result) == -1) result.push(e);
        });
        return result;
    }

    // postbacks logs
    $(document).ready(function() {

    if ($('#dyntable_Postbacks_Logs').length > 0) {
            var startD = moment.utc().format("YYYY-MM-DD");
            var endD = moment.utc().format("YYYY-MM-DD");
            var availableStatusesHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var availableOffersHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var availableRecordsHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var availableMethodsHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var availableResultsHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var availableHTTPstatusesHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var availablePostbackURLsHtml='<option value="">'+jstext.language.custom_all+'</option>';
            var dyntable_Postbacks_Logs = $('#dyntable_Postbacks_Logs').DataTable({
            "bProcessing": true,
            "bServerSide": true,
            // "autoWidth": true,
            "sAjaxSource": "/templates/internals/core_ajax_postbacks_logs.php",
            "bDeferRender": true,
            "dom": "<'row'<'postback-date-picker'><'col-sm-6 col-sm-offset-4 text-right'l>>" +
            "<'row'<'col-sm-12'tr>>" +
            "<'row'<'col-sm-5'i><'col-sm-7'p>><'selects'>",
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                console.log(sSource);
                aoData.push({"name": "startD", "value": startD})
                aoData.push({"name": "endD", "value": endD})
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            
            "aoColumnDefs": [{"className": "postback_url", "aTargets": [7]}],
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },

                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            },
            // TODO: footer callback to show in filters options only available after date range select based on returned results
            initComplete: function (oSettings,json) {                             

                $.each(json.availableStatuses,function (idx,status) {
                    if (status == '1') {
                        $('#status-filter').append('<option>'+jstext.language.custom_approved+'</option>')
                    } else {
                        $('#status-filter').append('<option>'+jstext.language.custom_rejected+'</option>')
                    }
                })
                $.each(json.availableOffers,function (idx,offer) {
                    //alert(offer);
                    if (offer !== '') {
                        $('#offer-filter').append('<option>' +offer+ '</option>')
                    }
                })
                $.each(json.availableRecords,function (idx,record) {
                    if (record.record !== '') {
                        $('#record-filter').append('<option>' +record+ '</option>')
                    }
                })
                $.each(json.availableMethods,function (idx,method) {
                    if (method == '0') {
                        $('#method-filter').append('<option value="1">'+jstext.language.custom_method+'</option>')
                    } else {
                        $('#method-filter').append('<option value="0">'+jstext.language.custom_method+'</option>')
                    }
                })
                $.each(json.availableResults,function (idx,result) {
                    if (result == '1') {
                        $('#result-filter').append('<option>'+jstext.language.custom_success+'</option>')
                    } else {
                        $('#result-filter').append('<option>'+jstext.language.custom_fail+'</option>')
                    }
                })
                $.each(json.availableHTTPstatuses,function (idx,http) {
                    if (http !== '') {
                        $('#http-filter').append('<option>' +http+ '</option>')
                    }
                })
                $.each(json.availablePostbackURLs,function (idx,purl) {
                    if (purl !== '') {
                        $('#url-filter').append('<option>' +purl+ '</option>')
                    }
                })
            },   

            "footerCallback": function() {
                var api = this.api();
                /*var table = $('#dyntable_Postbacks_Logs').DataTable();
                var data = table.column( 0 ).data();*/
                if (api.context[0].nTFoot !== null) {
                    api.columns().every(function() {
                        var column = this;

                        //console.log(column);
                        //alert(column.index());
                        if (column.index()>1) {
                            
                            var select = $('<select><option value=""></option></select>');
                            /*select.appendTo(
                                $(column.footer()).empty()
                            ).on('change',function() {
                                var val = $.fn.dataTable.util.escapeRegex($(this).val());
                                column.search((val ? val : ''), true, false).draw();
                            });*/
                            var offerHTMLArr = Array();
                            var recordHTMLArr = Array();
                            var methodHTMLArr = Array();
                            var resultHTMLArr = Array();
                            var httpHTMLArr = Array();
                            var urlHTMLArr = Array();

                            var offerHTML = '';
                            var recordHTML = '';
                            var methodHTML = '';
                            var resultHTML = '';
                            var httpHTML = '';
                            var urlHTML = '';
                            var i =0 ;
                            column.data().unique().sort().each(function(d, j) {
                                //alert(column.index());
                                var val = ($(d).is('*')) ? $(d).html():d;
                                var val1 = ($(j).is('*')) ? $(j).html():j;
                                //alert(val1);                                
                                if(column.index() ==2){
                                    offerHTMLArr.push(val);
                                    var newstring = val.substring(val.indexOf('<i class="fas fa-cart-arrow-down fa-fw" style="text-shadow:none !important;"></i> ')+1);
                                    offerHTML += '<option value="' + newstring + '">' + val + '</option>';
                                }
                                if(column.index() ==3){
                                    recordHTML += '<option value="' + val + '">' + val + '</option>';                                    
                                }
                                if(column.index() ==4){
                                    var resMethod = 0;
                                    if(val=='GET'){var resMethod = 1;}else if(val=='undefined'){var resMethod = 0;}
                                    methodHTML += '<option value="' + resMethod + '">' + val + '</option>';                                    
                                }
                                if(column.index() ==5){                                    
                                    resultHTML += '<option value="' + val + '">' + val + '</option>';                                    
                                }
                                if(column.index() ==6){
                                    httpHTML += '<option value="' + val + '">' + val + '</option>';                                    
                                }
                                if(column.index() ==7){
                                    urlHTML += '<option value="' + val + '">' + val + '</option>';                                    
                                }

                                i++;
                            });
                            
                            //console.log(offerHTML);
                            

                            $('#offer-filter').append(offerHTML);
                            $('#record-filter').append(recordHTML);
                            $('#method-filter').append(methodHTML);
                            $('#result-filter').append(resultHTML);
                            $('#http-filter').append(httpHTML);
                            $('#url-filter').append(urlHTML);
                        }
                    });
                }
            },            
        });
        $("div.postback-date-picker").html('\
                                    <div class="col-sm-2">\
                                        <div class="form-group">\
                                                <div class="input-group input-group-bg">\
                                                    <input type="text" id="postback-range" class="form-control dateranger" style="width:100% !important;"/>\
                                                    <i class="fa fa-calendar fa-fw" aria-hidden="true" style="text-shadow: none !important;"></i>\
                                                </div>\
                                        </div>\
                                    </div>\
                            ');
            $("div.selects").html('<script type="text/javascript">\
                                    $(document).ready(function() {\
                                        $("#status-filter").select2({minimumResultsForSearch: Infinity});\
                                        $("#offer-filter").select2();\
                                        $("#record-filter").select2();\
                                        $("#method-filter").select2({minimumResultsForSearch: Infinity});\
                                        $("#result-filter").select2({minimumResultsForSearch: Infinity});\
                                        $("#http-filter").select2({minimumResultsForSearch: Infinity});\
                                        $("#url-filter").select2();\
                                        $("div.dataTables_length select").select2({minimumResultsForSearch: Infinity,placeholder: "'+ jstext.language.custom_show +'",allowClear: true});\
                                    });</script>');
            $('#dyntable_Postbacks_Logs').on('change',function(e, settings, column, state) {
                
                if(column == 1){
                    $('#status-filter').html(availableStatusesHtml);
                    $('#status-filter').on('change',function () {
                        var keyword = $(this).val()
                        // TODO: search for 1 or 0 instead of "Approved" or "Rejected" translatable strings
                        if (keyword == encodeURI(jstext.language.custom_approved)) {
                            dyntable_Postbacks_Logs.columns([1]).search('1').draw()
                        } else {
                            dyntable_Postbacks_Logs.columns([1]).search('0').draw()
                        }
                    })
                }
                if(column == 2){
                    $('#offer-filter').html(availableOffersHtml);
                    $('#offer-filter').on('change',function () {
                        var keyword = $(this).val()
                        dyntable_Postbacks_Logs.columns([2]).search(keyword).draw()
                    })
                }
                if(column == 3){
                    $('#record-filter').html(availableRecordsHtml);
                    $('#record-filter').on('change',function () {
                        var keyword = $(this).val()
                        dyntable_Postbacks_Logs.columns([3]).search(keyword).draw()
                    })
                }
                if(column == 4){
                    $('#method-filter').html(availableMethodsHtml);
                    $('#method-filter').on('change',function () {
                        var $keyword = $(this).val()
                        // TODO: search for 0 or 1 instead of GET or POST
                        if ($keyword == 'GET') {
                            dyntable_Postbacks_Logs.columns([4]).search('0').draw()
                        } else {     // POST
                            dyntable_Postbacks_Logs.columns([4]).search('1').draw()
                        }
                    })
                }
                if(column == 5){
                    $('#result-filter').html(availableResultsHtml);
                    $('#result-filter').on('change',function () {
                        var keyword = $(this).val()
                        dyntable_Postbacks_Logs.columns([5]).search(keyword).draw()
                    })
                }
                if(column == 6){
                    $('#http-filter').html(availableHTTPstatusesHtml);
                    $('#http-filter').on('change',function () {
                        var keyword = $(this).val()
                        dyntable_Postbacks_Logs.columns([6]).search(keyword).draw()
                    })
                }
                if(column == 7){
                    $('#url-filter').html(availablePostbackURLs);
                    $('#url-filter').on('change',function () {
                        var keyword = $(this).val()
                        dyntable_Postbacks_Logs.columns([7]).search(keyword).draw()
                    })
                }
            });
            var trans = JSON.parse($("#trans").val());
            $('#postback-range').daterangepicker({
                startDate: moment.utc(),
                endDate: moment.utc(),
                maxDate: moment.utc(),
                showWeekNumbers: true,
                ranges: {
                    [trans.custom_today]: [moment.utc(), moment.utc()],
                    [trans.custom_yesterday]: [moment.utc().subtract(1, 'days'), moment.utc().subtract(1, 'days')],
                    [trans.custom_last_seven_days]: [moment.utc().subtract(6, 'days'), moment.utc()],
                    [trans.custom_last_thirty_days]: [moment.utc().subtract(29, 'days'), moment.utc()],
                    [trans.custom_this_month]: [moment.utc().startOf('month'), moment.utc().endOf('month')],
                    [trans.custom_last_month]: [moment.utc().subtract(1, 'month').startOf('month'), moment.utc().subtract(1, 'month').endOf('month')],
                    [trans.custom_this_year]: [moment.utc().startOf('year'), moment.utc().endOf('year')],
                    [trans.custom_last_year]: [moment.utc().subtract(1, 'year').startOf('year'), moment.utc().subtract(1, 'year').endOf('year')]
                },
                locale: {
                    "format": "YYYY-MM-DD",
                    "separator": " - ",
                    "applyLabel": trans.custom_apply,
                    "cancelLabel": trans.custom_custom_cancel,
                    "fromLabel": trans.custom_from,
                    "toLabel": trans.custom_to,
                    "customRangeLabel": trans.custom_custom,
                    "weekLabel": trans.custom_w,
                    "daysOfWeek": [
                        trans.custom_su,
                        trans.custom_mo,
                        trans.custom_tu,
                        trans.custom_we,
                        trans.custom_th,
                        trans.custom_fr,
                        trans.custom_sa
                    ],
                    "monthNames": [
                        trans.custom_january,
                        trans.custom_february,
                        trans.custom_march,
                        trans.custom_april,
                        trans.custom_may,
                        trans.custom_june,
                        trans.custom_july,
                        trans.custom_august,
                        trans.custom_september,
                        trans.custom_october,
                        trans.custom_november,
                        trans.custom_december
                    ],
                    "firstDay": 1
                }
            }, function (start, end, label) {
                startD = start.format("YYYY-MM-DD");
                endD = end.format("YYYY-MM-DD");
                dyntable_Postbacks_Logs
                    .columns(0)
                    .search(startD + "-" + endD)
                    .draw();
            });
            $('#status-filter').on('change',function () {
                var keyword = $(this).val()
                dyntable_Postbacks_Logs.columns([1]).search(keyword).draw()
            })
            $('#offer-filter').on('change',function () {
                var keyword = $(this).val()
                dyntable_Postbacks_Logs.columns([2]).search(keyword).draw()
            })
            $('#record-filter').on('change',function () {
                var keyword = $(this).val()
                dyntable_Postbacks_Logs.columns([3]).search(keyword).draw()
            })
            $('#method-filter').on('change',function () {
                var keyword = $(this).val()
                dyntable_Postbacks_Logs.columns([4]).search(keyword).draw()
            })
            $('#result-filter').on('change',function () {
                var keyword = $(this).val()
                dyntable_Postbacks_Logs.columns([5]).search(keyword).draw()
            })
            $('#http-filter').on('change',function () {
                var keyword = $(this).val()
                dyntable_Postbacks_Logs.columns([6]).search(keyword).draw()
            })
            $('#url-filter').on('change',function () {
                var keyword = $(this).val()
                dyntable_Postbacks_Logs.columns([7]).search(keyword).draw()
            })
    }
});
$(document).ready(function() {
        if ($('#dyntable_Stats').length > 0) {
            var startD = moment.utc().format("YYYY-MM-DD");
            var endD = moment.utc().format("YYYY-MM-DD");
            var dyntable_Stats = $('#dyntable_Stats').DataTable({
                // "lengthMenu": [[10, 25, 50, 100,""], [10, 25, 50, 100,""]],
                "bProcessing": true,
                "bServerSide": true,
                "bFilter": true,
                "bResponsive": true,
                // "ajax": $.fn.dataTable.pipeline( {
                "ajax": {
                    "url": "/templates/internals/core_ajax_stats.php",
                    // "url": "/templates/internals/core_ajax_stats_new.php",
                    "data": function (d) {
                        d.startD = moment.utc().format("YYYY-MM-DD")
                        d.endD = moment.utc().format("YYYY-MM-DD")
                        d.aggregate = $('#aggregate').val()
                        d.pages = 10
                    }
                },
                // "rowId" : 'DT_RowId',
                "bDeferRender": true,
                "dom": "<'row'<'date-picker'><'interval-selector'><'col-sm-2 col-sm-offset-6 text-right'l>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-5'i><'col-sm-7'p>><'selects'>",
                "columns": [
                    {"data": "date_", "className": "date-column"},
                    {"data": "raw_visits", render: $.fn.dataTable.render.number(',', '.', 0, '', '')},
                    {
                        "class": "raw_visits details-control",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ''
                    },
                    {"data": "unique_visits", render: $.fn.dataTable.render.number(',', '.', 0, '', '')},
                    {
                        "class": "details-control unique_visits",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    },
                    {"data": "transactions", render: $.fn.dataTable.render.number(',', '.', 0, '', '')},
                    {
                        "class": "details-control transactions",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    },
                    {"data": "sales_ratio", render: $.fn.dataTable.render.number(',', '.', 3, '', '%')},
                    {
                        "class": "details-control sales_ratio",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    },
                    {"data": "epc", render: $.fn.dataTable.render.number(',', '.', 4, '',' €')},
                    {
                        "class": "details-control epc",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    },
                    {"data": "earnings", render: $.fn.dataTable.render.number(',', '.', 2, '', ' €')},
                    {
                        "class": "details-control earnings",
                        "orderable": false,
                        "data": null,
                        "defaultContent": ""
                    }
                ],
                'columnDefs': [
                    {
                        'targets': [2,4,6,8,10],
                        'createdCell':  function (td, cellData, rowData, row, col) {
                            $(td).attr('tabindex', '0');
                        }
                    }
                ],
                "aaSorting": [[0, 'desc']],
                "oLanguage": {
                    "sEmptyTable": langDataTable["sEmptyTable"],
                    "sInfo": langDataTable["sInfo"],
                    "sInfoEmpty": langDataTable["sInfoEmpty"],
                    "sInfoFiltered": langDataTable["sInfoFiltered"],
                    "sInfoPostFix": "",
                    "sInfoThousands": ",",
                    "sLengthMenu": langDataTable["sLengthMenu"],
                    "sLoadingRecords": langDataTable["sLoadingRecords"],
                    "sProcessing": langDataTable["sProcessing"],
                    "sSearch": langDataTable["sSearch"],
                    "sZeroRecords": langDataTable["sZeroRecords"],
                    "oPaginate": {
                        "sFirst": langDataTable["sFirst"],
                        "sLast": langDataTable["sLast"],
                        "sNext": langDataTable["sNext"],
                        "sPrevious": langDataTable["sPrevious"]
                    },
                    "oAria": {
                        "sSortAscending": langDataTable["sSortAscending"],
                        "sSortDescending": langDataTable["sSortDescending"]
                    }
                },
                "footerCallback": function (row, data, start, end, display) {
                    if(this.api().rows().count() === 1)
                    {
                        $("#dyntable_Stats tfoot").hide();
                        return;
                    }else{
                        $("#dyntable_Stats tfoot").show();
                    }
                    var api = this.api(), data;

                    // Remove the formatting to get integer data for summation
                    var intVal = function (i) {
                        return typeof i === 'string' ?
                            i.replace(/[\%,€]/g, '') * 1 :
                            typeof i === 'number' ?
                                i : 0;
                    };

                    totalRaw = api
                        .column(1, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    totalUnique = api
                        .column(3, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    totalTransactions = api
                        .column(5, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);
                    totalEarnings = api
                        .column(11, {page: 'current'})
                        .data()
                        .reduce(function (a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $(api.column(1).footer()).html(
                        totalRaw.toLocaleString()
                    );
                    $(api.column(3).footer()).html(
                        totalUnique.toLocaleString() // should NOT be sum but rather querried based on day/month/year interval selection for the requested date range
                    );
                    $(api.column(5).footer()).html(
                        totalTransactions.toLocaleString()
                    );
                    if (totalUnique === 0) {
                        $(api.column(7).footer()).html(
                            (0).toFixed(3) + "%"
                        );
                    } else {
                        $(api.column(7).footer()).html(
                            (totalTransactions / totalRaw * 100).toFixed(3) + "%"
                        );
                    }
                    if (totalUnique === 0) {
                        $(api.column(9).footer()).html(
                            (0).toFixed(2) + " €"
                        );
                    } else {
                        $(api.column(9).footer()).html(
                            (totalEarnings / totalRaw * 100).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €"
                        );
                    }
                    $(api.column(11).footer()).html(
                        totalEarnings.toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €"
                    );
                }
            });
            $("div.date-picker").html('\
                                    <div class="col-sm-2">\
                                        <div class="form-group">\
                                                <div class="input-group input-group-bg">\
                                                    <input type="text" id="range" class="form-control dateranger" style="width:100% !important;"/>\
                                                    <i class="fa fa-calendar fa-fw" aria-hidden="true" style="text-shadow: none !important;"></i>\
                                                </div>\
                                        </div>\
                                    </div>\
                                    ');
            $("div.interval-selector").html('<div class="col-sm-2">\
                                            <select type="text" id="aggregate" class="form-control" style="width:120px;z-index:10;margin:2rem;">\
                                                    <option></option>\
                                                    <option value="daily" selected="selected">'+ jstext.language.custom_daily+'</option>\
                                                    <option value="monthly">'+ jstext.language.custom_monthly+'</option>\
                                            </select></div>\
                                            ');
            $("div.selects").html('<script type="text/javascript">\
                                    $(document).ready(function() {\
                                    $("#aggregate").select2({minimumResultsForSearch: Infinity,placeholder: "'+ jstext.language.custom_interval +'",allowClear: true});\
                                    $("div.dataTables_length select").select2({minimumResultsForSearch: Infinity,placeholder: "'+ jstext.language.custom_show +'",allowClear: true});\
                                    });</script>');
            /*
             real-time update
             TODO: redraw only today's details and keep row details open, if any
             make it work only for row1 when today is included in date range, make it not close child rows, make it re-calculate top 4 bars stats, too
             does not work because of pipeline
             setInterval( function () {
             dyntable_Stats.ajax.reload( null, false ); // user paging is not reset on reload
             }, 10000 );
             */
            var trans = JSON.parse($("#trans").val());

            $('#range').daterangepicker({
                startDate: moment.utc(),
                endDate: moment.utc(),
                maxDate: moment.utc(),
                showWeekNumbers: true,
                ranges: {
                    [trans.custom_today]: [moment.utc(), moment.utc()],
                    [trans.custom_yesterday]: [moment.utc().subtract(1, 'days'), moment.utc().subtract(1, 'days')],
                    [trans.custom_last_seven_days]: [moment.utc().subtract(6, 'days'), moment.utc()],
                    [trans.custom_last_thirty_days]: [moment.utc().subtract(29, 'days'), moment.utc()],
                    [trans.custom_this_month]: [moment.utc().startOf('month'), moment.utc().endOf('month')],
                    [trans.custom_last_month]: [moment.utc().subtract(1, 'month').startOf('month'), moment.utc().subtract(1, 'month').endOf('month')],
                    [trans.custom_this_year]: [moment.utc().startOf('year'), moment.utc().endOf('year')],
                    [trans.custom_last_year]: [moment.utc().subtract(1, 'year').startOf('year'), moment.utc().subtract(1, 'year').endOf('year')]
                },
                locale: {
                    "format": "YYYY-MM-DD",
                    "separator": " - ",
                    "applyLabel": trans.custom_apply,
                    "cancelLabel": trans.custom_custom_cancel,
                    "fromLabel": trans.custom_from,
                    "toLabel": trans.custom_to,
                    "customRangeLabel": trans.custom_custom,
                    "weekLabel": trans.custom_w,
                    "daysOfWeek": [
                        trans.custom_su,
                        trans.custom_mo,
                        trans.custom_tu,
                        trans.custom_we,
                        trans.custom_th,
                        trans.custom_fr,
                        trans.custom_sa
                    ],
                    "monthNames": [
                        trans.custom_january,
                        trans.custom_february,
                        trans.custom_march,
                        trans.custom_april,
                        trans.custom_may,
                        trans.custom_june,
                        trans.custom_july,
                        trans.custom_august,
                        trans.custom_september,
                        trans.custom_october,
                        trans.custom_november,
                        trans.custom_december
                    ],
                    "firstDay": 1
                }
            }, function (start, end, label) {
                startD = start.format("YYYY-MM-DD");
                endD = end.format("YYYY-MM-DD");
                dyntable_Stats
                    .columns(0)
                    .search(startD + "|" + endD)
                    .draw();
                /*console.log("A new date selection was made: " + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD'));*/
            });
            $('#aggregate').on('change',function () {
                // if ($(this).val() == 'monthly') {
                //     var dddd= moment.utc().subtract(1,'months').format('YYYY-MM-DD').split(' - ');
                //     startD = dddd[0];
                //     endD = dddd[1];
                //     // $('#range').data('daterangepicker').setStartDate(moment.utc().subtract(1,'months').format('YYYY-MM-DD'))
                //     // dyntable_Stats.columns(0).search(moment.utc().subtract(1,'months').format('YYYY-MM-DD').replace(' - ','|')).draw()
                // } else if ($(this).val() == 'yearly') {
                //     var dddd= moment.utc().subtract(1,'years').format('YYYY-MM-DD').split(' - ');
                //     startD = dddd[0];
                //     endD = dddd[1];
                //     // $('#range').data('daterangepicker').setStartDate(moment.utc().subtract(1,'years').format('YYYY-MM-DD'))
                //     // dyntable_Stats.columns(0).search(moment.utc().subtract(1,'years').format('YYYY-MM-DD').replace(' - ','|')).draw()
                // } else {
                //     var dddd= moment.utc().format('YYYY-MM-DD').split(' - ');
                //     startD = dddd[0];
                //     endD = dddd[1];
                //     // $('#range').data('daterangepicker').setStartDate(moment.utc().format('YYYY-MM-DD'))
                //     // dyntable_Stats.columns(0).search(moment.utc().format('YYYY-MM-DD').replace(' - ','|')).draw()
                // }
                // console.log(startD);
                // console.log(endD);
                dyntable_Stats.draw();
            })

            var detailRows = [];
            $('#dyntable_Stats').on('click', 'tbody tr td.details-control, tfoot tr th.details-control', function () {
                var td = $(this);
                var type = td.attr("class");
                var tr = td.closest('tr');
                var idx = $.inArray(tr.attr('id'), detailRows);

                if (type.includes("total")) {
                    var row = tr;
                    if (row.parent().find("tr .div-details").size() > 0) {
                        td.removeClass('details');
                        row.parent().find("tr .div-details").parents("tr").remove();

                        // Remove from the 'open' array
                        detailRows.splice(idx, 1);
                    }
                    else {
                        td.addClass('details');
                        var tr = $("<tr><td colspan='13'></td></tr>");
                        tr.find("td").append(format(row.data(), type));
                        row.parent().append(tr);

                        // Add to the 'open' array
                        if (idx === -1) {
                            detailRows.push(tr.attr('id'));
                        }
                    }
                } else {
                    var row = dyntable_Stats.row(tr);
                    if (row.child.isShown()) {
                        td.removeClass('details');
                        row.child.hide();

                        // Remove from the 'open' array
                        detailRows.splice(idx, 1);
                    }
                    else {
                        td.addClass('details');
                        row.child(format(row.data(), type)).show();

                        // Add to the 'open' array
                        if (idx === -1) {
                            detailRows.push(tr.attr('id'));
                        }
                    }
                }
            });
            $('#dyntable_Stats').on('keyup', 'tbody tr td.details-control, tfoot tr th.details-control', function (event){
                if(event.keyCode == 13){
                    $(this).click();
                }
            });

            // On each draw, loop over the `detailRows` array and show any child rows
            dyntable_Stats.on('draw', function () {
                $.each(detailRows, function (i, id) {
                    $('#' + id + ' td.details-control').trigger('click');
                });
            });
            function format(d, type) {

                var infoT = type.replace(" details-control", "").trim();
                infoT = infoT.replace("details-control ", "").trim();
                var dates = {};
                if (infoT.includes("total")) {
                    infoT = infoT.replace("total ", "").trim();
                    infoT = infoT.replace("total", "").trim();
                    infoT += "_total";
                    dates.startD = startD;
                    dates.endD = endD;
                    var trId="totals";
                    var is_total ="yes";
                } else {
                    dates.startD = startD;
                    dates.endD = endD;
                    var trId=d.dt_RowId;
                    var is_total ="no";
                }
                console.log('-----'+d.actual_date+'----------------');
                console.log(dates.startD);
                console.log(dates.endD);
                var div = $("<div class='div-details' id='div-details-"+trId+"'></div>").text(langDataTable["sProcessing"]);
                $.ajax({
                    url: '/templates/internals/core_ajax_stats_detail.php',
                    data: {startD: dates.startD, endD: dates.endD, info: infoT,aggregate:$('#aggregate').val(),current_date:d.actual_date,is_total:is_total},
                    dataType: 'json',
                    cache: false,
                    success: function (info) {
                        if (infoT.includes("earnings")) {
                            var child_name = jstext.language.custom_earnings;
                        } else if (infoT.includes("epc")) {
                            var child_name = jstext.language.custom_rpm;
                        } else if (infoT.includes("sales_ratio")) {
                            var child_name = jstext.language.custom_sales_ratio;
                        } else if (infoT.includes("transactions")) {
                            var child_name = jstext.language.custom_transactions;
                        } else if (infoT.includes("raw_visits")) {
                            var child_name = jstext.language.custom_raw_visits;
                        } else if (infoT.includes("unique_visits")) {
                            var child_name = jstext.language.custom_unique_visits;
                        }
                        // Countries
                        var filterCountry='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="country_filter" id="country_filter-'+trId+'">' +
                            '<option>All</option>';
                        var countryLi='';
                        var f = "<div align='center'><h4>"+child_name+"</h4></div><ul class='col-sm-2 countries-r'><h4>" + trans.custom_country + "</h4>";
                        for (var g = 0; g < info.country.length; g++) {
                            var data = info.country[g];
                            if (data.n == null || data.n.length === 0)
                                data.n = "N/A";
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            countryLi += "<li class='stats-child'><img border=\"0\" src=\"/images/geo_flags/" + data.n.toLowerCase() + ".png\" class=\"geo_flag\"/> " + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterCountry += "<option>" + data.n + "</option>";
                        }
                        filterCountry += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterCountry;
                        f += countryLi;
                        f += "</ul>"
                        // Tools
                        var filterTools='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tools_filter" id="tools_filter-'+trId+'" >' +
                            '<option value="All">All</option>';
                        var toolsLi='';
                        f += "<ul class='col-sm-4 offer-r'><h4>"+jstext.language.custom_smart_tools+"</h4>";
                        for (var g = 0; g < info.smart_tools.length; g++){
                            var data = info.smart_tools[g];

                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            toolsLi += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterTools += "<option value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                        filterTools += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTools;
                        f += toolsLi;0
                        f += "</ul>"
                        // Offer
                        var filterOffer='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="offer_filter" id="offer_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var offerLi='';
                        f += "<ul class='col-sm-4 offer-r'><h4>"+jstext.language.custom_offer_tools+"</h4>";
                        for (var g = 0; g < info.offer_tools.length; g++){
                            var data = info.offer_tools[g];

                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            offerLi += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterOffer += "<option value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                        filterOffer += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterOffer;
                        f += offerLi;
                        f += "</ul><br><div class='clearfix'></div>"
                        //SubId
                        var filterSubId='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="sub_id_filter" id="sub_id_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var subIdLi='';
                        f += "<ul class='col-sm-2 sub_id-r'><h4>Sub ID</h4>";
                        for (var g = 0; g < info.sub_id.length; g++) {
                            var data = info.sub_id[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            subIdLi += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterSubId += "<option>" + data.n + "</option>"
                        }
                        filterSubId += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterSubId;
                        f += subIdLi;
                        f += "</ul>"
                        //Tid1
                        var filterTid1='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tid1_filter" id="tid1_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var tid1Li='';
                        f += "<ul class='col-sm-2 tid1-r'><h4>" + trans.custom_tracking_id_one + "</h4>";
                        for (var g = 0; g < info.tid1.length; g++) {
                            var data = info.tid1[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            tid1Li += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterTid1 += "<option>" + data.n + "</option>"
                        }
                        filterTid1 += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTid1;
                        f += tid1Li;
                        f += "</ul>"
                        //Tid2
                        var filterTid2='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tid2_filter" id="tid2_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var tid2Li='';
                        f += "<ul class='col-sm-2 tid2-r'><h4>" + trans.custom_tracking_id_two + "</h4>";
                        for (var g = 0; g < info.tid2.length; g++) {
                            var data = info.tid2[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            tid2Li += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterTid2 += "<option>" + data.n + "</option>"
                        }
                        filterTid2 += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTid2;
                        f += tid2Li;
                        f += "</ul>"
                        //Tid3
                        var filterTid3='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tid3_filter" id="tid3_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var tid3Li='';
                        f += "<ul class='col-sm-2 tid3-r'><h4>" + trans.custom_tracking_id_three + "</h4>";
                        for (var g = 0; g < info.tid3.length; g++) {
                            var data = info.tid3[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            tid3Li += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterTid3 += "<option>" + data.n + "</option>"
                        }
                        filterTid3 += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTid3;
                        f += tid3Li;
                        f += "</ul>"
                        // Tid4
                        var filterTid4='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="tid4_filter" id="tid4_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var tid4Li='';
                        f += "<ul class='col-sm-2 tid4-r'><h4>" + trans.custom_tracking_id_four + "</h4>";
                        for (var g = 0; g < info.tid4.length; g++) {
                            var data = info.tid4[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            tid4Li += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterTid4 += "<option>" + data.n + "</option>"
                        }
                        filterTid4 += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterTid4;
                        f += tid4Li;
                        f += "</ul><br><div class='clearfix'></div>";
                        // Tid combinations
                        var filterCombinations='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+d.actual_date+'\',\''+is_total+'\')" name="combinations_filter" id="combinations_filter-'+trId+'" >' +
                            '<option>All</option>';
                        var combinationsLi='';
                        f += "<ul class='col-sm-11 tidcombinations-r'><h4>" + trans.custom_tracking_ids_combinations + "</h4>";
                        for (var g = 0; g < info.combinations.length; g++) {
                            var data = info.combinations[g];
                            if(parseFloat(data.v).toFixed(4) == 0.0000)
                                continue;
                            if(infoT.includes("earnings"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                            }else if(infoT.includes("epc"))
                            {
                                data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                            }else if(infoT.includes("sales_ratio"))
                            {
                                data.v = parseFloat(data.v).toFixed(3) + "%";
                            }else if(infoT.includes("visits") || infoT.includes("transactions"))
                            {
                                data.v = parseFloat(data.v).toLocaleString();
                            }
                            combinationsLi += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
                            filterCombinations += "<option>" + data.n + "</option>"
                        }
                        filterCombinations += '</select>' +
                            '<script>$(document).ready(function() { $(".js-example-basic-single").select2(); });</script><br><br>';
                        f += filterCombinations;
                        f += combinationsLi;
                        f += "</ul>"

                        var resu = $(f);
                        div.html(resu);
                    }
                });
                return div;
            }
        }
    } )

// stats table DataTables end //

    if ($('#dyntable_payment_Tier').length > 0) {
        $('#dyntable_payment_Tier').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_tier.php?report=" + getParameterByNamew('page'),
            "bDeferRender": true,
            "aaSorting": [[0, "desc"]],
            "bFilter": false,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });

        $('#dyntable_payment_Tier').on('click', '.load_more', function () {
            var th = $(this);
            var space = th.data('space');
            var parent = th.data('parent');
            var page_now = th.data('page_now');
            var token = th.data('token');
            //var str = 'Space: ' + space + ', Parent: ' + parent + ', Page Now: ' + page_now;
            var data = {
                'space': space,
                'parent': parent,
                'page_now': page_now,
                'csrf_token': token
            };
            th.html('<i class="fa fa-spinner" aria-hidden="true"></i>');
            //call ajax
            $.ajax({
                url: "templates/internals/core_tier_getchild.php",
                data: data,
                method: "POST",
                dataType: "json"
            }).error(function (err) {
                console.log(err);

            }).done(function () {
                th.html('<i class="fa fa-plus" aria-hidden="true"></i>');
            }).success(function (response) {

                if (response.success) {
                    if (response.output && response.output != '') {
                        th.closest("tr").after(response.output);
                    }
                }

                if (response.end && response.end == 1) {
                    th.hide();
                } else {

                    if (response.page_now) {
                        th.data('page_now', response.page_now);
                    }

                    if (response.space) {
                        th.data('space', response.space);
                    }
                }

            }, 'json');


        });

    }
    if ($('#dyntable_Pending_Debits').length > 0) {
        $('#dyntable_Pending_Debits').dataTable({
            "bProcessing": true,
            "bServerSide": true,
            "sAjaxSource": "/templates/internals/core_ajax_Pending_Debit.php?report=" + getParameterByNamew('page'),
            "bDeferRender": true,
            "aaSorting": [[0, "desc"]],
            "bFilter": true,
            "bResponsive": true,
            "fnServerData": function ( sSource, aoData, fnCallback, oSettings ) {
                oSettings.jqXHR = $.ajax( {
                    "dataType": 'json',
                    "url": sSource,
                    "data": aoData,
                    "success": fnCallback,
                    "error": function(){
                        window.location.reload();
                    }
                } );
            },
            "oLanguage": {
                "sEmptyTable": langDataTable["sEmptyTable"],
                "sInfo": langDataTable["sInfo"],
                "sInfoEmpty": langDataTable["sInfoEmpty"],
                "sInfoFiltered": langDataTable["sInfoFiltered"],
                "sInfoPostFix": "",
                "sInfoThousands": ",",
                "sLengthMenu": langDataTable["sLengthMenu"],
                "sLoadingRecords": langDataTable["sLoadingRecords"],
                "sProcessing": langDataTable["sProcessing"],
                "sSearch": langDataTable["sSearch"],
                "sZeroRecords": langDataTable["sZeroRecords"],
                "oPaginate": {
                    "sFirst": langDataTable["sFirst"],
                    "sLast": langDataTable["sLast"],
                    "sNext": langDataTable["sNext"],
                    "sPrevious": langDataTable["sPrevious"]
                },
                "oAria": {
                    "sSortAscending": langDataTable["sSortAscending"],
                    "sSortDescending": langDataTable["sSortDescending"]
                }
            }

        });
    }
});
function statChildFilter(trId, startD, endD, infoT, current_date,is_total){
    var trans = JSON.parse($("#trans").val());
    var country=$('#country_filter-'+trId).val();
    var subId=$('#sub_id_filter-'+trId).val();
    var tId1=$('#tid1_filter-'+trId).val();
    var tId2=$('#tid2_filter-'+trId).val();
    var tId3=$('#tid3_filter-'+trId).val();
    var tId4=$('#tid4_filter-'+trId).val();
    var combinations=$('#combinations_filter-'+trId).val();
    var smartTools=$('#tools_filter-'+trId).val();
    var offerTools=$('#offer_filter-'+trId).val();
    var dates = {};
    console.log(offerTools);
    console.log(smartTools);
    dates.startD = startD;
    dates.endD = endD;
    $.ajax({
        url: '/templates/internals/core_ajax_stats_detail.php',
        data: {startD: dates.startD, endD: dates.endD,current_date:current_date,is_total:is_total, info: infoT, country: country, subId: subId, tId1: tId1, tId2: tId2, tId3: tId3, tId4: tId4, combinations: combinations, smartTools: smartTools, offerTools: offerTools,aggregate:$('#aggregate').val()},
        dataType: 'json',
        cache: false,
        success: function (info) {
                        if (infoT.includes("earnings")) {
                            var child_name = jstext.language.custom_earnings;
                        } else if (infoT.includes("epc")) {
                            var child_name = jstext.language.custom_rpm;
                        } else if (infoT.includes("sales_ratio")) {
                            var child_name = jstext.language.custom_sales_ratio;
                        } else if (infoT.includes("transactions")) {
                            var child_name = jstext.language.custom_transactions;
                        } else if (infoT.includes("raw_visits")) {
                            var child_name = jstext.language.custom_raw_visits;
                        } else if (infoT.includes("unique_visits")) {
                            var child_name = jstext.language.custom_unique_visits;
                        }
            // Countries
            var filterCountry='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="country_filter" id="country_filter-'+trId+'">';
            var countryLi='';
            var f = "<div align='center'><h4>"+child_name+"</h4></div><ul class='col-sm-2 countries-r'><h4>" + trans.custom_country + "</h4>";
            for (var g = 0; g < info.country.length; g++) {
                var data = info.country[g];
                if (data.n == null || data.n.length === 0)
                    data.n = "N/A";
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                countryLi += "<li class='stats-child'><img border=\"0\" src=\"/images/geo_flags/" + data.n.toLowerCase() + ".png\" class=\"geo_flag\"/> " + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterCountry += '</select><br><br>';
            f += filterCountry;
            f += countryLi;
            f += "</ul>"
            // Tools
            var filterTools='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tools_filter" id="tools_filter-'+trId+'" >';
            '<option value="All">All</option>';
            var toolsLi='';
            f += "<ul class='col-sm-4 offer-r'><h4>"+jstext.language.custom_smart_tools+"</h4>";
            for (var g = 0; g < info.smart_tools.length; g++){
                var data = info.smart_tools[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                toolsLi += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterTools += '</select><br><br>';
            f += filterTools;
            f += toolsLi;
            f += "</ul>"
            // Offer
            var filterOffer='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="offer_filter" id="offer_filter-'+trId+'" >';
            '<option>All</option>';
            var offerLi='';
            f += "<ul class='col-sm-4 offer-r'><h4>"+jstext.language.custom_offer_tools+"</h4>";
            for (var g = 0; g < info.offer_tools.length; g++){
                var data = info.offer_tools[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                offerLi += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterOffer += '</select><br><br>';
            f += filterOffer;
            f += offerLi;
            f += "</ul><br><div class='clearfix'></div>"
            //SubId
            var filterSubId='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="sub_id_filter" id="sub_id_filter-'+trId+'" >';
            '<option>All</option>';
            var subIdLi='';
            f += "<ul class='col-sm-2 sub_id-r'><h4>Sub ID</h4>";
            for (var g = 0; g < info.sub_id.length; g++) {
                var data = info.sub_id[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                subIdLi += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterSubId += '</select><br><br>';
            f += filterSubId;
            f += subIdLi;
            f += "</ul>"
            //Tid1
            var filterTid1='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tid1_filter" id="tid1_filter-'+trId+'" >';
            '<option>All</option>';
            var tid1Li='';
            f += "<ul class='col-sm-2 tid1-r'><h4>" + trans.custom_tracking_id_one + "</h4>";
            for (var g = 0; g < info.tid1.length; g++) {
                var data = info.tid1[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                tid1Li += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterTid1 += '</select><br><br>';
            f += filterTid1;
            f += tid1Li;
            f += "</ul>"
            //Tid2
            var filterTid2='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tid2_filter" id="tid2_filter-'+trId+'" >';
            '<option>All</option>';
            var tid2Li='';
            f += "<ul class='col-sm-2 tid2-r'><h4>" + trans.custom_tracking_id_two + "</h4>";
            for (var g = 0; g < info.tid2.length; g++) {
                var data = info.tid2[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                tid2Li += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterTid2 += '</select><br><br>';
            f += filterTid2;
            f += tid2Li;
            f += "</ul>"
            //Tid3
            var filterTid3='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tid3_filter" id="tid3_filter-'+trId+'" >';
            '<option>All</option>';
            var tid3Li='';
            f += "<ul class='col-sm-2 tid3-r'><h4>" + trans.custom_tracking_id_three + "</h4>";
            for (var g = 0; g < info.tid3.length; g++) {
                var data = info.tid3[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                tid3Li += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterTid3 += '</select><br><br>';
            f += filterTid3;
            f += tid3Li;
            f += "</ul>"
            // Tid4
            var filterTid4='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="tid4_filter" id="tid4_filter-'+trId+'" >';
            '<option>All</option>';
            var tid4Li='';
            f += "<ul class='col-sm-2 tid4-r'><h4>" + trans.custom_tracking_id_four + "</h4>";
            for (var g = 0; g < info.tid4.length; g++) {
                var data = info.tid4[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                tid4Li += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterTid4 += '</select><br><br>';
            f += filterTid4;
            f += tid4Li;
            f += "</ul><br><div class='clearfix'></div>";
            // Tid combinations
            var filterCombinations='<select class="js-example-basic-single form-control" onchange="statChildFilter(\''+trId+'\',\''+dates.startD+'\',\''+dates.endD+'\',\''+infoT+'\',\''+current_date+'\',\''+is_total+'\')" name="combinations_filter" id="combinations_filter-'+trId+'" >';
            '<option>All</option>';
            var combinationsLi='';
            f += "<ul class='col-sm-11 tidcombinations-r'><h4>" + trans.custom_tracking_ids_combinations + "</h4>";
            for (var g = 0; g < info.combinations.length; g++) {
                var data = info.combinations[g];
                if(parseFloat(data.v).toFixed(4) == 0.0000)
                    continue;
                if(infoT.includes("earnings"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 2, maximumFractionDigits: 2}) + " €";
                }else if(infoT.includes("epc"))
                {
                    data.v = parseFloat(data.v).toLocaleString(undefined, {minimumFractionDigits: 4, maximumFractionDigits: 4}) + " €";
                }else if(infoT.includes("sales_ratio"))
                {
                    data.v = parseFloat(data.v).toFixed(3) + "%";
                }else if(infoT.includes("visits") || infoT.includes("transactions"))
                {
                    data.v = parseFloat(data.v).toLocaleString();
                }
                combinationsLi += "<li class='stats-child'>" + data.n + "<span class='stats-data'>" + data.v + "</span></li>"
            }
            filterCombinations += '</select><br><br>';
            f += filterCombinations;
            f += combinationsLi;
            f += "</ul>"
            var resu = $(f);
            $("#div-details-"+trId).html(resu);
        },
        complete: function () {
            $.ajax({
                url: '/templates/internals/core_ajax_stats_details_filters.php',
                data: {startD: dates.startD, endD: dates.endD,current_date:current_date,is_total:is_total, info: infoT, country: country, subId: subId, tId1: tId1, tId2: tId2, tId3: tId3, tId4: tId4, combinations: combinations, smartTools: smartTools, offerTools: offerTools,aggregate:$('#aggregate').val()},
                dataType: 'json',
                cache: false,
                success: function (info) {
                    // Countries
                    var filterCountry= '<option value="All">All</option>';
                    for (var g = 0; g < info.country.length; g++) {
                        var data = info.country[g];
                        if (data.n == null || data.n.length === 0)
                            data.n = "N/A";
                        if(data.n == country){
                            filterCountry += "<option selected>" + data.n + "</option>";
                        }
                        else {
                            filterCountry += "<option>" + data.n + "</option>";
                        }
                    }
                    $('#country_filter-'+trId).html(filterCountry);

                    //SubId
                    var filterSubId='<option value="All">All</option>';
                    for (var g = 0; g < info.sub_id.length; g++) {
                        var data = info.sub_id[g];
                        if(data.n == subId){
                            filterSubId += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterSubId += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#sub_id_filter-'+trId).html(filterSubId);

                    //Tid1
                    var filterTid1='<option value="All">All</option>';
                    for (var g = 0; g < info.tid1.length; g++) {
                        var data = info.tid1[g];
                        if(data.n == tId1){
                            filterTid1 += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterTid1 += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#tid1_filter-'+trId).html(filterTid1);

                    //Tid2
                    var filterTid2='<option value="All">All</option>';
                    for (var g = 0; g < info.tid2.length; g++) {
                        var data = info.tid2[g];
                        if(data.n == tId2){
                            filterTid2 += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterTid2 += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#tid2_filter-'+trId).html(filterTid2);

                    //Tid3
                    var filterTid3='<option value="All">All</option>';
                    for (var g = 0; g < info.tid3.length; g++) {
                        var data = info.tid3[g];
                        if(data.n == tId3){
                            filterTid3 += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterTid3 += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#tid3_filter-'+trId).html(filterTid3);

                    // Tid4
                    var filterTid4='<option value="All">All</option>';
                    for (var g = 0; g < info.tid4.length; g++) {
                        var data = info.tid4[g];
                        if(data.n == tId4){
                            filterTid4 += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterTid4 += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#tid4_filter-'+trId).html(filterTid4);

                    // Tid combinations
                    var filterCombinations='<option value="All">All</option>';
                    for (var g = 0; g < info.combinations.length; g++) {
                        var data = info.combinations[g];
                        if(data.n == combinations){
                            filterCombinations += "<option selected>" + data.n + "</option>"
                        }
                        else{
                            filterCombinations += "<option>" + data.n + "</option>"
                        }
                    }
                    $('#combinations_filter-'+trId).html(filterCombinations);

                    // Tools
                    var filterTools='<option value="All">All</option>';
                    for (var g = 0; g < info.smart_tools.length; g++){
                        var data = info.smart_tools[g];
                        var st=data.src1+" "+data.src2;
                        if(st == smartTools){
                            filterTools += "<option selected value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                        else{
                            filterTools += "<option value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                    }
                    $('#tools_filter-'+trId).html(filterTools);

                    // Offer
                    var filterOffer='<option value="All">All</option>';
                    for (var g = 0; g < info.offer_tools.length; g++){
                        var data = info.offer_tools[g];
                        var ot=data.src1+" "+data.src2;
                        if(ot == offerTools){
                            filterOffer += "<option selected value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                        else{
                            filterOffer += "<option value='"+data.src1+" "+data.src2+"'>" + data.n + "</option>"
                        }
                    }
                    $('#offer_filter-'+trId).html(filterOffer);
                    $('.js-example-basic-single').select2();
                },
            });
        }
    });
}
function filterByLand(offerId){
    var land=$('#landSelect'+offerId).val();
    $.ajax({
        url: '/templates/internals/core_ajax_offers_links.php?id=' + offerId+'&land='+land,
        dataType: 'json',
        success: function (resp) {
            var html = ''
            $.each(resp.link,function (idx,data) {
                html += ('<div class="portlet banner-port" style="border-color: #20003F;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #3A1259;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4> ')
                var epc=data.earnings / data.hits * 100;
                var sr=data.conv / data.hits * 100;
                            if (resp.running_links.indexOf(data.id) >= 0) {
                            var running='<span class="badge running" title="'+jstext.language.custom_running_link+'"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                if(epc >= 0.3 && sr >= 0.3){
                    html+='<span class="label label-success">HOT</span> '+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                else{
                    html+=''+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                html +=('               </h4> \
                                    </div> \
                                        <div class="portlet-body"><label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> \
                                            <textarea style="font-weight:normal !improtant;" id="direct-link-'+data.id+'" rows="1" class="form-control">'+data.direct_url+'</textarea> \
                                        </div> \
                                </div> \
                            </div>')
                html += ('<script>$(document).ready(function () { \
                            $("#direct-link-'+data.id+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'!\\n'+jstext.language.custom_good_luck+'!"); \
                            }); \
                            $("#add_parameters-'+offerId+'").click(function () { \
                                var params = []; \
                                params.push("sub_id=" + $("#sub_id-'+offerId+'").val()); \
                                params.push("tid1=" + $("#tid-1-'+offerId+'").val()); \
                                params.push("tid2=" + $("#tid-2-'+offerId+'").val()); \
                                params.push("tid3=" + $("#tid-3-'+offerId+'").val()); \
                                params.push("tid4=" + $("#tid-4-'+offerId+'").val()); \
                                var params_text = "?" + params.join("&"); \
                                $("#direct-link-'+data.id+'").val("'+data.direct_url+'" + params_text);')
                $.each(resp.banners,function (idx,data) {
                    html += 'var banner_url_' + data.number + ' = "' + data.lnk+'";'
                    var innerVal='<a href="'+data.lnk+' \'+ params_text+\' " target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>';
                    html += '$("#embed-'+data.grp+'-'+data.number+'").val(\''+innerVal+'\');'
                    html += 'var banner_direct_url_' + data.number + ' = "' + data.lnk+'";'
                    var innerVal2=''+data.lnk+'\'+ params_text+\'';
                    html += '$("#banner-direct-link-'+data.grp+'-'+data.number+'").val(\''+innerVal2+'\');'
                });
                html+= ('}); \
                        });</script>')
            });
            $('#linksContainer'+offerId).html(html);
        }
    });
}
function filterLinks(offerId,filterType){
    // alert(filterType);
    var land=$('#landSelect'+offerId).val();
    var country=$('#linkCountriesSelect'+offerId).val();
    var linktext=$('#linktextSelect'+offerId).val();
    $.ajax({
        url: '/templates/internals/core_ajax_offers_links.php?id=' + offerId+'&land='+land+'&country='+country+'&linktext='+linktext+'&changedOption='+filterType,
        dataType: 'json',
        success: function (resp) {
            var html = ''
            if(resp.countries.length > 0){
                var lOptions="";
                lOptions += '<option value="" selected>All</option>';
                $.each(resp.countries, function (idx, l) {
                    if(l != ""){
                        lOptions += '<option>' + l + '</option>';
                    }
                });
                // $('#linkCountriesSelect'+offerId).show();
                // $('#linkCountriesLabel'+offerId).show();
                $('#linkCountriesSelect'+offerId).html(lOptions);
            }
            else if (filterType != "countryChanged"){
                // $('#linkCountriesSelect'+offerId).hide();
                // $('#linkCountriesLabel'+offerId).hide();
                $('#linkCountriesSelect'+offerId).val("");
            }
            if(resp.linktext.length > 0){
                var lOptions="";
                lOptions += '<option value="" selected>All</option>';
                $.each(resp.linktext, function (idx, l) {
                    if(l != ""){
                        lOptions += '<option>' + l + '</option>';
                    }
                });
                // $('#linktextSelect'+offerId).show();
                // $('#linktextLabel'+offerId).show();
                $('#linktextSelect'+offerId).html(lOptions);
            }
            else if (filterType != "linktextChanged"){
                // $('#linktextSelect'+offerId).hide();
                // $('#linktextLabel'+offerId).hide();
                $('#linktextSelect'+offerId).val("");
            }
            $.each(resp.link,function (idx,data) {
                html += ('<div class="portlet banner-port" style="border-color: #ECC4FF;" class="panel-collapse collapse"> \
                                <div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #532B72;"> \
                                    <div class="portlet-title" style="color:#ffffff;"> \
                                        <h4> ')
                var epc=data.earnings / data.hits * 100;
                var sr=data.conv / data.hits * 100;
                            if (resp.running_links.indexOf(data.id) >= 0) {
                            var running='<span class="badge running" title="'+jstext.language.custom_running_link+'"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                if(epc >= 0.3 && sr >= 0.3){
                    html+='<span class="label label-success">HOT</span> '+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                else{
                    html+=''+resp.data.name+' '+data.linktext+' '+data.country+' '+(data.land === 1 ? 'Landing' : 'Pre-landing')+' '+running+'<span style="float:right">EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span> ';
                }
                html +=('               </h4> \
                                    </div> \
                                        <div class="portlet-body"><label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> \
                                            <textarea style="font-weight:normal !improtant;" id="direct-link-'+data.id+'" rows="1" class="form-control">'+data.direct_url+'</textarea> \
                                        </div> \
                                </div> \
                            </div>')
                html += ('<script>$(document).ready(function () { \
                            $("#direct-link-'+data.id+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'!\\n'+jstext.language.custom_good_luck+'!"); \
                            }); \
                            $("#add_parameters-'+offerId+'").click(function () { \
                                var params = []; \
                                params.push("sub_id=" + $("#sub_id-'+offerId+'").val()); \
                                params.push("tid1=" + $("#tid-1-'+offerId+'").val()); \
                                params.push("tid2=" + $("#tid-2-'+offerId+'").val()); \
                                params.push("tid3=" + $("#tid-3-'+offerId+'").val()); \
                                params.push("tid4=" + $("#tid-4-'+offerId+'").val()); \
                                var params_text = "?" + params.join("&"); \
                                $("#direct-link-'+data.id+'").val("'+data.direct_url+'" + params_text);')
                $.each(resp.banners,function (idx,data) {
                    html += 'var banner_url_' + data.number + ' = "' + data.lnk+'";'
                    var innerVal='<a href="'+data.lnk+' \'+ params_text+\' " target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>';
                    html += '$("#embed-'+data.grp+'-'+data.number+'").val(\''+innerVal+'\');'
                    html += 'var banner_direct_url_' + data.number + ' = "' + data.lnk+'";'
                    var innerVal2=''+data.lnk+'\'+ params_text+\'';
                    html += '$("#banner-direct-link-'+data.grp+'-'+data.number+'").val(\''+innerVal2+'\');'
                });
                html+= ('}); \
                        });</script>')
            });
            $('#linksContainer'+offerId).html(html);
        }
    });
}
function filterBanners(offerId,changedOption){
    var description=$('#descriptionSelect'+offerId).val();
    var size1=$('#size1Select'+offerId).val();
    var size2=$('#size2Select'+offerId).val();
    var language=$('#languageSelect'+offerId).val();
    $.ajax({
        url: '/templates/internals/core_ajax_offers_banners.php?id=' + offerId+'&size1='+size1+'&size2='+size2+'&language='+language+'&description='+description+'&changedOption='+changedOption,
        dataType: 'json',
        success: function (resp) {
            var html = '';
            if(resp.language.length > 0){
                var lOptions="";
                lOptions += '<option value="" selected>All</option>';
                $.each(resp.language, function (idx, l) {
                    if(l != ""){
                        lOptions += '<option>' + l + '</option>';
                    }
                });
                $('#languageSelect'+offerId).html(lOptions);
            }
            if(resp.description.length > 0){
                var descriptionOptions="";
                descriptionOptions += '<option value="" selected>All</option>';
                $.each(resp.description, function (idx, l) {
                    if(l != ""){
                        descriptionOptions += '<option>' + l + '</option>';
                    }
                });
                $('#descriptionSelect'+offerId).html(descriptionOptions);
            }
            if(resp.size1.length > 0){
                var size1Options="";
                size1Options += '<option value="" selected>All</option>';
                $.each(resp.size1, function (idx, l) {
                    if(l != ""){
                        size1Options += '<option>' + l + '</option>';
                    }
                });
                $('#size1Select'+offerId).html(size1Options);
            }
            if(resp.size2.length > 0){
                var size2Options="";
                size2Options += '<option value="" selected>All</option>';
                $.each(resp.size2, function (idx, l) {
                    if(l != ""){
                        size2Options += '<option>' + l + '</option>';
                    }
                });
                $('#size2Select'+offerId).html(size2Options);
            }
            $.each(resp.banners,function (idx,data) {
                html += '<div class="portlet banner-port" style="border-color: #ECC4FF;">'
                html += '<div class="portlet-heading" style="background: linear-gradient(to right, rgba(0, 0, 0, 0.40) 0%, rgba(0, 0, 0, 0) 100%), #532B72;">'
                html += '<div class="portlet-title">'
                var epc=data.earnings / data.hits * 100;
                var sr=data.conv / data.hits * 100;
                            if (resp.running_banners.indexOf(data.number) >= 0) {
                            var running='<span class="badge running" title="'+jstext.language.custom_running_banner+'"><i class="fas fa-running fa-2x"></i></span>';
                            } else {
                            var running='';
                            }
                if(epc >= 0.3 && sr >= 0.3){
                    html += ('<h4><span class="label label-success">HOT</span> '+resp.data.name+' '+data.description+' '+data.size1+'x'+data.size2+' ('+data.language+') '+running+'<span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                }else{
                    html += ('<h4>'+resp.data.name+' '+data.description+' '+data.size1+'x'+data.size2+' ('+data.language+') '+running+' <span style="float:right"><span>EPC: '+(data.hits === 0 ? (0).toFixed(4) : epc.toFixed(4))+' €</span></h4>')
                }
                html += '</div>'
                html += '</div>'
                html += '<div class="portlet-body">'
                html += '<ul class="list-group">'
                html += '<li class="list-group-item">'
                html += '<label style="width:100%">'
                html += ('<img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" />')
                html += '<br/><br/> <i class="fas fa-code fa-fw"></i> '+jstext.language.marketing_source_code
                html += '</label>'
                html += '<br/>'
                html += '<textarea id="embed-'+data.grp+'-'+data.number+'" rows="2" class="form-control" style="font-weight:normal !important;">'
                html += ('<a href="'+data.lnk+'" target="_blank" rel="nofollow"><img style="border:0" src="//static.sublimerevenue.com/'+data.image+'" height="'+data.size2+'" width="'+data.size1+'" alt="'+data.alt_tag+'" /></a>')
                html += '</textarea>'
                html += '<br/>'
                html +=('<label><i class="fas fa-link fa-fw"></i> '+jstext.language.marketing_target_url+':</label> <textarea style="font-weight:normal !improtant;" id="banner-direct-link-'+data.grp+'-'+data.number+'" rows="1" class="form-control">'+data.lnk+'</textarea>')
                html += '<br/>'
                html += '<a href="//static.sublimerevenue.com/'+data.image+'" download><button class="btn btn-primary"><i class="fa fa-download"></i> '+jstext.language.custom_download+'</button></a>'
                html += '</li>'
                html += '</ul>'
                html += '</div>'
                html += '</div>'
                html += ('<script>$(document).ready(function () { \
                            $("#embed-'+data.grp+'-'+data.number+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'!\\n'+jstext.language.custom_good_luck+'!"); \
                            }); \
                        })</script>')
                html += ('<script>$(document).ready(function () { \
                            $("#banner-direct-link-'+data.grp+'-'+data.number+'").click(function () { \
                                this.select(); \
                                document.execCommand("copy"); \
                                swal("'+jstext.language.custom_copied_to_clipboard+'!\\n'+jstext.language.custom_good_luck+'!"); \
                            }); \
                        })</script>')
            });
            $('#bannersContainer'+offerId).html(html);
        }
    });
}